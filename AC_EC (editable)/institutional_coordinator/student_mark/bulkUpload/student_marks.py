
import pymysql
import xlrd
import sys
import re
import json
mapper = {
    "sem": 0,
    "year": 1,
    "insert_by": 2,
    "insert_col_name": 3,
    "marks": 4,
    "file_location": 5,
    "host": 6,
    "username": 7,
    "password": 8,
    "dbname": 9,
    "program": 10,
    "upload_constraint": 11,
    "role": 12,
    "uploader_dept": 13
}
header = []
header_id = {}
start_col = 3
argument = list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n = len(argument)


class Gpaoutofbounds(Exception):
    pass


class StudentDataNotExists(Exception):
    pass

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
    for x in range(start_col, n-9):
        header_id[argument[x].lower()] = header.index(argument[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'", str(e),)
          [0]+" is not a column in the uploaded sheet")
    sys.exit(0)
if argument[mapper['insert_by']] == 'rollno':
    select_student = "SELECT email_id,rollno,dept_id FROM student WHERE rollno=%s;"
    insert = """INSERT into student_marks(email_id,rollno,sem,year,gpa,program) VALUES (%s,%s,%s,%s,%s,'""" + \
        argument[mapper['program']] + \
        """') on DUPLICATE KEY UPDATE gpa=%s,year=%s;"""
    update="Update student_marks set email_id=%s,sem=%s,year=%s,gpa=%s,program=%s where rollno=%s"
elif argument[mapper['insert_by']] == 'email_id':
    select_student = "SELECT email_id,rollno,dept_id FROM student WHERE email_id=%s;"
    insert = """INSERT into student_marks(email_id,rollno,sem,year,gpa,program) VALUES (%s,%s,%s,%s,%s,'""" + \
        argument[mapper['program']] + \
        """') on DUPLICATE KEY UPDATE gpa=%s,year=%s;"""
    update="Update student_marks set rollno=%s,sem=%s,year=%s,gpa=%s,program=%s where email_id=%s"
sem = argument[mapper['sem']]
year = argument[mapper['year']]
student_mapper = {'email_id': 0, 'rollno': 1,'dept_id':2}
login_role = argument[mapper['role']]
inserted_records_count = 0
updated_records_count = 0
errors = {"wrongDept": []}

def insert_record(update_values, values_insert):
    global updated_records_count, inserted_records_count, argument
    if argument[mapper['upload_constraint']] == "2":
        updated_records_count += cursor.execute(update, update_values)
    else:
        cursor.execute(insert, values)
        inserted_records_count += 1

try:
    for x in range(1, data.nrows):
        insert_col_name = data.cell(
            x, header_id[argument[mapper['insert_col_name']].lower()]).value
        # print(email)
        marks = data.cell(
            x, header_id[argument[mapper['marks']].lower()]).value
        try:
            if float(marks) > 10.00:
                raise Gpaoutofbounds
                break
        except Gpaoutofbounds:
            print('Gpa of student with '+argument[mapper['insert_col_name']]+': '+str(
                insert_col_name)+' is '+str(marks)+' which is greater than 10')
            sys.exit(0)
        
        cursor.execute(select_student, insert_col_name)
        student_data = cursor.fetchall()
        student_data_count = cursor.rowcount
 
        try:
            if student_data_count == 0:
                raise StudentDataNotExists
                break
        except StudentDataNotExists:
            print('Data of student with '+argument[mapper['insert_by']]+': '+str(
                insert_col_name)+' does not exists/(if exists, wrong value) in the student table')
            sys.exit(0)
 
        dept=student_data[0][student_mapper['dept_id']]
        # print(dept)
        email=student_data[0][student_mapper['email_id']]
        rollno=student_data[0][student_mapper['rollno']]
        values = (email, rollno, sem, year, marks, marks, year)
        if argument[mapper['insert_by']] == 'rollno':
            update_values=(email,sem,year,marks,rollno)
        elif argument[mapper['insert_by']] == 'email_id':
            update_values=(rollno,sem,year,marks,email)
      


        # executing query
        try:
            if login_role in ['faculty_co', 'HOD']:
                if int(dept) == int(argument[mapper["uploader_dept"]]):
                    insert_record(update_values, values)
                else:
                    errors['wrongDept'].append({"email": email, "dept": dept})
            elif login_role in ['inst_coor']:
                insert_record(update_values, values)
        except Exception as e:
            if "Duplicate entry" in str(e):
                if argument[mapper['upload_constraint']] == "0":
                    pass
                elif argument[mapper['upload_constraint']] == "1":
                    try:
                        cursor.execute(update, update_values)
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
    print(str(e))
    sys.exit(0)
connection.commit()
output = {"insertedRecords": inserted_records_count,
          "updatedRecords": updated_records_count, "totalRecords": data.nrows-1, "errors": errors}
print('Successful+%s' %
      (json.dumps(output)))
connection.close()






'''
import pymysql
import xlrd
import sys
import re
import json
mapper = {
    "sem": 0,
    "year": 1,
    "insert_by": 2,
    "insert_col_name": 3,
    "marks": 4,
    "file_location": 5,
    "host": 6,
    "username": 7,
    "password": 8,
    "dbname": 9,
    "program": 10,
    "upload_constraint": 11,
    "role": 12,
    "uploader_dept": 13
}
header = []
header_id = {}
start_col = 3
argument = list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n = len(argument)


class Gpaoutofbounds(Exception):
    pass


class StudentDataNotExists(Exception):
    pass

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
    for x in range(start_col, n-9):
        header_id[argument[x].lower()] = header.index(argument[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'", str(e),)
          [0]+" is not a column in the uploaded sheet")
    sys.exit(0)
if argument[mapper['insert_by']] == 'rollno':
    select_student = "SELECT email_id,rollno,dept_id FROM student WHERE rollno=%s;"
    insert = """INSERT into student_marks(email_id,rollno,sem,year,gpa,program) VALUES (%s,%s,%s,%s,%s,'""" + \
        argument[mapper['program']] + \
        """') on DUPLICATE KEY UPDATE gpa=%s,year=%s;"""
    update="Update student_marks set email_id=%s,sem=%s,year=%s,gpa=%s,program=%s where rollno=%s"
elif argument[mapper['insert_by']] == 'email_id':
    select_student = "SELECT email_id,rollno,dept_id FROM student WHERE email_id=%s;"
    insert = """INSERT into student_marks(email_id,rollno,sem,year,gpa,program) VALUES (%s,%s,%s,%s,%s,'""" + \
        argument[mapper['program']] + \
        """') on DUPLICATE KEY UPDATE gpa=%s,year=%s;"""
    update="Update student_marks set rollno=%s,sem=%s,year=%s,gpa=%s,program=%s where email_id=%s"
sem = argument[mapper['sem']]
year = argument[mapper['year']]
student_mapper = {'email_id': 0, 'rollno': 1}
login_role = argument[mapper['role']]
inserted_records_count = 0
updated_records_count = 0
errors = {"wrongDept": []}

def insert_record(update_values, values_insert):
    global updated_records_count, inserted_records_count, argument
    if argument[mapper['upload_constraint']] == "2":
        updated_records_count += cursor.execute(update, update_values)
    else:
        cursor.execute(insert, values)
        inserted_records_count += 1

try:
    for x in range(1, data.nrows):
        insert_col_name = data.cell(
            x, header_id[argument[mapper['insert_col_name']].lower()]).value
        # print(email)
        marks = data.cell(
            x, header_id[argument[mapper['marks']].lower()]).value
        try:
            if float(marks) > 10.00:
                raise Gpaoutofbounds
                break
        except Gpaoutofbounds:
            print('Gpa of student with '+argument[mapper['insert_col_name']]+': '+str(
                insert_col_name)+' is '+str(marks)+' which is greater than 10')
            sys.exit(0)
        
        cursor.execute(select_student, insert_col_name)
        student_data = cursor.fetchall()
        student_data_count = cursor.rowcount
 
        try:
            if student_data_count == 0:
                raise StudentDataNotExists
                break
        except StudentDataNotExists:
            print('Data of student with '+argument[mapper['insert_by']]+': '+str(
                insert_col_name)+' does not exists/(if exists, wrong value) in the student table')
            sys.exit(0)
 
        # dept=student_data[0][student_mapper['dept_id']]
        # print(dept)
        email=student_data[0][student_mapper['email_id']]
        rollno=student_data[0][student_mapper['rollno']]
        values = (email, rollno, sem, year, marks, marks, year)
        if argument[mapper['insert_by']] == 'rollno':
            update_values=(email,sem,year,marks,rollno)
        elif argument[mapper['insert_by']] == 'email_id':
            update_values=(rollno,sem,year,marks,email)
      


        # executing query
        try:
            if login_role in ['faculty_co', 'HOD']:
                if 2 == int(argument[mapper["uploader_dept"]]):
                    insert_record(update_values, values)
                else:
                    errors['wrongDept'].append({"email": email, "dept": 2})
            elif login_role in ['inst_coor']:
                insert_record(update_values, values)
        except Exception as e:
            if "Duplicate entry" in str(e):
                if argument[mapper['upload_constraint']] == "0":
                    pass
                elif argument[mapper['upload_constraint']] == "1":
                    try:
                        cursor.execute(update, update_values)
                        updated_records_count += 1
                    except Exception as e:
                        print("error+" + e)
                        sys.exit(0)
                else:
                    print("error+Email: "+email+" Rollno: " +
                          str(int(rollno)) + " has duplicate entry.")
                    sys.exit(0)

            elif "foreign key constraint fails" in str(e):
                print("error+Department id: 2"+
                      " does not exist/(if present, wrong value) in the table.")
                sys.exit(0)
            else:
                print(e)
                sys.exit(0)

 
except Exception as e:
    print(str(e))
    sys.exit(0)
connection.commit()
output = {"insertedRecords": inserted_records_count,
          "updatedRecords": updated_records_count, "totalRecords": data.nrows-1, "errors": errors}
print('Successful+%s' %
      (json.dumps(output)))
connection.close()
'''



