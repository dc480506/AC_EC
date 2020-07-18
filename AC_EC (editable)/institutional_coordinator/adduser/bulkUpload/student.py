import pymysql
import xlrd
import sys
import re
mapper = {
    "added": 0,
    "timestamp": 1,
    "fname": 2,
    "lname": 3,
    "mname": 4,
    "sem": 5,
    "year_of_admission": 6,
    "dept": 7,
    "email": 8,
    "rollno": 9,
    "file_location": 10,
    "host": 11,
    "username": 12,
    "password": 13,
    "dbname": 14,
    "program": 15,
    "upload_constraint": 16,
}
header = []
header_id = {}
start_col = 2
argument = list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n = len(argument)
# dept={'COMP':'1','IT':'2','EXTC':'3','ETRX':'4','MECH':'5'}
# database connection
connection = pymysql.connect(host=argument[mapper['host']], user=argument[mapper['username']],
                             passwd=argument[mapper['password']], database=argument[mapper['dbname']])
cursor = connection.cursor()
file = xlrd.open_workbook(argument[mapper["file_location"]])
data = file.sheet_by_index(0)
for y in range(0, data.ncols):
    header.append(data.cell(0, y).value.lower())
try:
    for x in range(start_col, n-7):
        header_id[argument[x].lower()] = header.index(argument[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'", str(e),)
          [0]+" is not a column in the uploaded sheet")
    sys.exit(0)
ts = argument[mapper["timestamp"]]
added_by = argument[mapper["added"]]
insert = """INSERT into student(email_id,rollno,fname,mname,lname,year_of_admission,dept_id,current_sem,timestamp,adding_email_id,program) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,'""" + \
    argument[mapper['program']] + """');"""

update = "update student set rollno=%s,fname=%s,mname=%s,lname=%s,year_of_admission=%s,dept_id=%s,current_sem=%s,timestamp=%s,adding_email_id=%s,program=%s where email_id=%s;"

insert_student_login="""Insert into login_role(username,email_id,password,password_set,role) VALUES(%s,%s,%s,%s,%s);"""
password_set=0
role="student"

inserted_records_count = 0
updated_records_count = 0

try:
    for x in range(1, data.nrows):
        email = data.cell(
            x, header_id[argument[mapper['email']].lower()]).value
        # print(email)
        rollno = data.cell(
            x, header_id[argument[mapper['rollno']].lower()]).value
        username=int(rollno)
        password=rollno
        # print(rollno)
        fname = data.cell(
            x, header_id[argument[mapper['fname']].lower()]).value
        # print(fname)
        mname = data.cell(
            x, header_id[argument[mapper['mname']].lower()]).value
        # print(mname)
        lname = data.cell(
            x, header_id[argument[mapper['lname']].lower()]).value
        # print(lname)
        year_of_admission = data.cell(
            x, header_id[argument[mapper['year_of_admission']].lower()]).value
        # print(year_of_admission)
        dept = data.cell(x, header_id[argument[mapper['dept']].lower()]).value
        # print(dept)
        current_sem = data.cell(
            x, header_id[argument[mapper['sem']].lower()]).value
        # print(current_sem)
        values = (email, rollno, fname, mname, lname,
                  year_of_admission, dept, current_sem, ts, added_by)
        values_login=(username,email,password,password_set,role)
        # executing query
        try:
            if argument[mapper['upload_constraint']] == "2":
                values = (rollno, fname, mname, lname,
                          year_of_admission, dept, current_sem, ts, added_by, argument[mapper['program']], email)
                updated_records_count += cursor.execute(update, values)
            else:
                cursor.execute(insert, values)
                cursor.execute(insert_student_login, values_login)
                inserted_records_count += 1
        except Exception as e:
            if "Duplicate entry" in str(e):
                if argument[mapper['upload_constraint']] == "0":
                    pass
                elif argument[mapper['upload_constraint']] == "1":
                    values = (rollno, fname, mname, lname,
                              year_of_admission, dept, current_sem, ts, added_by, argument[mapper['program']], email)
                    try:
                        cursor.execute(update, values)
                        updated_records_count += 1
                    except Exception as e:
                        print("error+" + e)
                        sys.exit(0)
                else:
                    print("error+Email: "+email+" Rollno: " +
                          str(int(rollno)) + " has duplicate entry.")
                    sys.exit(0)

            elif "foreign key constraint fails" in str(e):
                print("error+Department id: "+str(int(dept)) +
                      " does not exist/(if present, wrong value) in the table.")
                sys.exit(0)
            else:
                print(e)
                sys.exit(0)

except Exception as e:
    print("error+", e)
    sys.exit(0)
# print("executed query")
# commiting the query into db
connection.commit()
print('Successful+{"insertedRecords":%d,"updatedRecords":%d,"totalRecords": %d}' %
      (inserted_records_count, updated_records_count, data.nrows-1))
connection.close()
