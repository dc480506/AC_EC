import pymysql
import xlrd
import sys
import re
import json
# print(sys.argv[1])
args = list(map(str.strip, sys.argv[1].strip('[]').split(',')))
mapper = {"sem": 0,
          "year": 1,
          "email_id": 2,
          "timestamp": 3,
          "cname_col": 4,
          "cid_col": 5,
          "floating_dept_col": 6,
          "min_col": 7,
          "max_col": 8,
          "applicable_dept_col": 9,
          "file_location": 10,
          "host": 11,
          "username_db": 12,
          "password_db": 13,
          "dbname": 14,
          "program": 15,
          "course_type_id": 16,
          "login_role": 17,
          "uploader_dept_id": 18,
          "is_closed_elective": 19
          }
startcol_index = 4
header = []
header_id = {}
# print(args)
file = xlrd.open_workbook(args[mapper['file_location']])
data = file.sheet_by_index(0)
for y in range(0, data.ncols):
    header.append(data.cell(0, y).value.lower())
# print(header)
try:
    for x in range(startcol_index, len(args)-10):
        # print(args[x])
        header_id[args[x].lower()] = header.index(args[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'", str(e),)
          [0]+" is not a column in the uploaded sheet")
    sys.exit(0)
# print(header_id) #VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)
connection = pymysql.connect(host=args[mapper['host']],
                             user=args[mapper['username_db']],
                             passwd=args[mapper['password_db']],
                             database=args[mapper['dbname']])
cursor = connection.cursor()
insert_audit = """INSERT INTO course(cid,sem,year,cname,min,max,email_id,timestamp,currently_active,program,course_type_id) VALUES """
# print(header_id)
insert_audit_floating = """INSERT INTO course_floating_dept VALUES """
insert_audit_applicable = """INSERT INTO course_applicable_dept VALUES """
sem = args[mapper['sem']]
# print(sem)
year = args[mapper['year']]
# print(year)
timestamp = args[mapper['timestamp']]
# print(timestamp)
email_id = args[mapper['email_id']]
# print(email_id)

program = args[mapper['program']]
course_type_id = args[mapper['course_type_id']]
uploader_role = args[mapper['login_role']]
uploader_dept_id = args[mapper['uploader_dept_id']]
is_closed_elective = int(args[mapper['is_closed_elective']])
errors = {"invalidFloatingDept": [],
          "invalidApplicableDept": [], "courseNotValidForDept": []}

course_type_applicable_depts = []
try:
    sql = "select * from course_type_applicable_dept where course_type_id='%s'" % course_type_id
    cursor.execute(sql)
    for rec in cursor.fetchall():
        course_type_applicable_depts.append(int(rec[1]))
except Exception as e:
    print("error+"+str(e))
    sys.exit(0)


def is_valid_applicable_dept(course_type_applicable_depts, applicable_depts):
    for dept in applicable_depts:
        if dept not in course_type_applicable_depts:
            return False
    return True


def is_valid_closed_elective(floating_dept, applicable_dept):
    if len(floating_dept) == 1 and len(applicable_dept) == 1 and floating_dept[0] == applicable_dept[0]:
        return True
    else:
        return False


def exec_queries(queries, cid, cname, floating_dept, applicable_dept, course_type_applicable_depts):
    global errors, is_closed_elective
    if is_closed_elective:

        if not is_valid_closed_elective(floating_dept, applicable_dept):
            errors['invalidApplicableDept'].append(
                {"cid": cid, "cname": cname})
            return
    else:
        if not is_valid_applicable_dept(course_type_applicable_depts, applicable_dept):
            errors['courseNotValidForDept'].append(
                {"cid": cid, "cname": cname})
            return
    for query in queries:
        cursor.execute(query)


try:
    for x in range(1, data.nrows):
        # print(header_id[args[mapper['cid_col']]])
        cid = data.cell(x, header_id[args[mapper['cid_col']].lower()]).value
        # print(cid)
        cname = data.cell(
            x, header_id[args[mapper['cname_col']].lower()]).value
        # print(cname)
        min = data.cell(x, header_id[args[mapper['min_col']].lower()]).value
        # print(min)
        max = data.cell(x, header_id[args[mapper['max_col']].lower()]).value
        # print(max)
        values = (cid, sem, year, cname, min, max, email_id,
                  timestamp, '1', program, course_type_id)
        audit_table_query = insert_audit + str(values)
        # **********Floating dept**********
        floating_dept = list(map(float, str(data.cell(
            x, header_id[args[mapper['floating_dept_col']].lower()]).value).split(",")))
        values = ""
        for i in range(len(floating_dept)):
            values += "('{}','{}','{}','{}','{}','{}'),".format(cid, course_type_id, program,
                                                                sem, year, floating_dept[i])
        values = values[0:len(values)-1]
        audit_floating_table_query = insert_audit_floating + str(values)
        # **********Applicable dept**********
        applicable_dept = list(map(float, str(data.cell(
            x, header_id[args[mapper['applicable_dept_col']].lower()]).value).split(",")))
        values = ""
        for i in range(len(applicable_dept)):
            values += "('{}','{}','{}','{}','{}','{}'),".format(cid,
                                                                sem, year, applicable_dept[i], course_type_id, program)
        values = values[0:len(values)-1]
        audit_applicable_table_query = insert_audit_applicable + str(values)
        # print(audit_table_query)
        # print(audit_applicable_table_query)
        # print(values)
        if (uploader_role in ['HOD', 'faculty_co']):
            if (int(uploader_dept_id) in floating_dept):
                exec_queries(
                    [audit_table_query, audit_floating_table_query, audit_applicable_table_query], cid, cname, floating_dept, applicable_dept, course_type_applicable_depts)

            else:
                errors['invalidFloatingDept'].append(
                    {"cid": cid, 'cname': cname})
        elif uploader_role == 'inst_coor':
            exec_queries(
                [audit_table_query, audit_floating_table_query, audit_applicable_table_query], cid, cname, floating_dept, applicable_dept, course_type_applicable_depts)


except Exception as e:
    print("error+"+str(e))
    sys.exit(0)
connection.commit()
print("successful+"+json.dumps(errors))
