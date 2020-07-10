import pymysql
import xlrd
import sys
import re
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
    "program": 10
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
    for x in range(start_col, n-6):
        header_id[argument[x].lower()] = header.index(argument[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'", str(e),)
          [0]+" is not a column in the uploaded sheet")
    sys.exit(0)
if argument[mapper['insert_by']] == 'rollno':
    select_student = "SELECT email_id,rollno FROM student WHERE rollno=%s;"
    insert = """INSERT into student_marks(email_id,rollno,sem,year,gpa,program) VALUES (%s,%s,%s,%s,%s,'""" + \
        argument[mapper['program']] + \
        """') on DUPLICATE KEY UPDATE gpa=%s,year=%s;"""
elif argument[mapper['insert_by']] == 'email_id':
    select_student = "SELECT email_id,rollno FROM student WHERE email_id=%s;"
    insert = """INSERT into student_marks(email_id,rollno,sem,year,gpa,program) VALUES (%s,%s,%s,%s,%s,'""" + \
        argument[mapper['program']] + \
        """') on DUPLICATE KEY UPDATE gpa=%s,year=%s;"""
sem = argument[mapper['sem']]
year = argument[mapper['year']]
student_mapper = {'email_id': 0, 'rollno': 1}
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
        # print(student_data[0][0]+" "+str(student_data[0][1]))
        try:
            if student_data_count == 0:
                raise StudentDataNotExists
                break
        except StudentDataNotExists:
            print('Data of student with '+argument[mapper['insert_by']]+': '+str(
                insert_col_name)+' does not exists/(if exists, wrong value) in the student table')
            sys.exit(0)
        # print(rollno)
        # values=(insert_col_name,sem,year,marks,insert_col_name)
        # executing query
        values = (student_data[0][student_mapper['email_id']], student_data[0]
                  [student_mapper['rollno']], sem, year, marks, marks, year)
        cursor.execute(insert, values)
except Exception as e:
    print(str(e))
    sys.exit(0)
# print("executed query")
# commiting the query into db
connection.commit()
print("Successful")
connection.close()
