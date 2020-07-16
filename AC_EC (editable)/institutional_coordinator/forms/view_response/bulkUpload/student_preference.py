import pymysql
import xlrd
import sys
import re
import json
from datetime import timedelta, datetime
mapper = {
    "file_location": 0,
    "host": 1,
    "username": 2,
    "password": 3,
    "dbname": 4,
    "sem": 5,
    "year": 6,
    "form_id": 7,
    "upload_constraint": 8,
    "status": 9,
    "npref": 10,
    "rollno": 11,
    "email": 12,
    "timestamp": 13,
    "firstpref": 14
}
argument = list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n = len(argument)
start_col = 11
no_of_valid_preferences = argument[mapper['npref']]
header, choice = [], []
header_id = {}
preferences = ''
update_preferences = ''
percent = ''
pm = "PM GMT+5:30"
am = "AM GMT+5:30"
tp = []


def sameprefrem(list1):
    cid = ''
    for x in range(len(list1)):
        if 'same' not in list1[x]:
            cid = list1[x]
            for y in range((x+1), len(list1)):
                if list1[y] == cid:
                    list1[y] = 'same as pref '+str(x+1)
    return list1


def convert24am(str1):
    # first element is 12
    dt = []
    dt = str1.split(':')
    if dt[0] == '12':
        return '00' + ':' + dt[1] + ':' + dt[2]
    elif int(dt[0]) < 10:
        return '0' + dt[0] + ':' + dt[1] + ':' + dt[2]
    else:
        return str1


def convert24pm(str1):
    dt = []
    dt = str1.split(':')
    # first elements is 12
    if dt[0] == '12':
        return str1
    else:
        # add 12 to hours
        return str(int(dt[0]) + 12) + ':' + dt[1] + ':' + dt[2]


# database connection
connection = pymysql.connect(host=argument[mapper['host']], user=argument[mapper['username']],
                             passwd=argument[mapper['password']], database=argument[mapper['dbname']])
cursor = connection.cursor()
file = xlrd.open_workbook(argument[mapper['file_location']])
data = file.sheet_by_index(0)
for y in range(0, data.ncols):
    header.append(data.cell(0, y).value.lower())
try:
    for x in range(start_col, n):
        header_id[argument[x].lower()] = header.index(argument[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'", str(e),)
          [0]+" is not a column in the uploaded sheet")
    sys.exit(0)
allocate_status = argument[mapper['status']]
sem = argument[mapper['sem']]
year = argument[mapper['year']]
upload_constraint = argument[mapper['upload_constraint']]
for z in range(1, int(no_of_valid_preferences)+1):
    preferences = preferences+'pref'+str(z)+','
    update_preferences = update_preferences + 'pref'+str(z)+"=%s,"
    percent = percent + '%s,'
preferences = preferences[:-1]
percent = percent[:-1]
update_preferences = update_preferences[:-1]


form_id = str(argument[mapper['form_id']])
update_student_form = """UPDATE student_form SET form_filled=1, timestamp=%s WHERE email_id=%s AND form_id=%s"""
insertform = """INSERT into student_preferences(email_id,form_id,sem,year,rollno,timestamp,allocate_status,no_of_valid_preferences,""" + \
    preferences + """) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,""" + percent + """);"""
updateform = 'update student_preferences set sem=%s,year=%s,rollno=%s,timestamp=%s,allocate_status=%s,no_of_valid_preferences=%s,' + \
    update_preferences+' where email_id=%s and form_id=%s'
# print(insertform)

inserted_records_count = 0
updated_records_count = 0
invalid_students = []
try:
    for x in range(1, data.nrows):
        prefer = []
        email = data.cell(
            x, header_id[argument[mapper['email']].lower()]).value
        rollno = data.cell(
            x, header_id[argument[mapper['rollno']].lower()]).value
        # ole automation to normal date time format script
        # d=timedelta(days=data.cell(x,header_id[sys.argv[8].lower()]).value)
        # st=datetime(1899,12,30)
        # date=d+st
        time = data.cell(
            x, header_id[argument[mapper['timestamp']].lower()]).value
        if pm in time or 'pm' in time or 'PM' in time:
            time = time.replace(pm, '')
            tp = time.split(' ')
            tp[1] = convert24pm(tp[1])
            # print(tp)
            time = ''
            for q in tp:
                time = time+q+" "
            time = time.strip(' ')
        elif am in time or 'am' in time or 'AM' in time:
            time = time.replace(am, '')
            tp = time.split(' ')
            tp[1] = convert24am(tp[1])
            # print(tp)
            time = ''
            for q in tp:
                time = time+q+" "
            time = time.strip(' ')
        # print(time)
        values = [time, email,  form_id]
        values2 = [email, form_id, sem, year, rollno, time,
                   allocate_status, no_of_valid_preferences]
        for z in range(1, int(no_of_valid_preferences)+1):
            prefer.append(
                data.cell(x, header_id[argument[(mapper['firstpref']+z-1)].lower()]).value)
        prefer = sameprefrem(prefer)
        for val in range(0, len(prefer)):
            values2.append(prefer[val])
        # print(values)
        choice = []
        # execution of query
        # print(values)
        cursor.execute(update_student_form, values)
        try:
            if upload_constraint == "2":
                values2 = [sem, year, rollno, time,
                           allocate_status, no_of_valid_preferences]
                values2.extend(prefer)
                values2.extend([email, form_id])
                updated_records_count += cursor.execute(updateform, values2)
            else:
                cursor.execute(insertform, values2)
                inserted_records_count += 1
        except Exception as e:

            if "foreign key constraint fails" in str(e):
                invalid_students.append(email)
                # print("error+Email: "+email+" Rollno: "+str(int(rollno)) +
                #       " is not/(if present, wrong value) in student table.")
                # sys.exit(0)
            elif "Duplicate entry" in str(e):
                if upload_constraint == "0":
                    pass
                elif upload_constraint == "1":
                    values2 = [sem, year, rollno, time,
                               allocate_status, no_of_valid_preferences]
                    values2.extend(prefer)
                    values2.extend([email, form_id])
                    # print(updateform)
                    # print('\n', values2)
                    # sys.exit(0)
                    updated_records_count += cursor.execute(
                        updateform, values2)
                else:
                    print(upload_constraint)
                    print("error+Email: "+email+" Rollno: " +
                          str(int(rollno)) + " has a duplicate entry.")
                    sys.exit(0)
            else:
                print("error+", e)
                sys.exit(0)
except Exception as e:
    print("error+", str(e))
    sys.exit(0)
# commit the query into db
connection.commit()
print('Successful+{"insertedRecords":%d,"updatedRecords":%d,"totalRecords": %d,"invalidEntries":%s}' %
      (inserted_records_count, updated_records_count, data.nrows-1, json.dumps(invalid_students)))
# close the connection
connection.close()
