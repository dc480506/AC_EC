
import pandas as pd
import numpy as np
import pymysql
import sys
mapper = {
    "sem": 0,
    "year": 1,
    "student_pref_table": 2,
    "student_course_table": 3,
    "course_allocate_info_table": 4,
    "course_table": 5,
    "course_app_dept_table": 6,
    "no_of_preferences": 7,
    "host": 8,
    "username": 9,
    "password": 10,
    "dbname": 11,
}
argument = list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n = len(argument)


def check_upper_limit(stu_course, courses, pref_id):
    max_limit = courses[pref_id][1]
    if(len(stu_course[pref_id]) >= max_limit):
        return False
    else:
        return True


def check_applicable(cid, dept_id, courses):
    dept_list = courses[cid][2]
    if dept_id in dept_list:
        return True
    else:
        return False


mydb = pymysql.connect(
    host=argument[mapper['host']],
    user=argument[mapper['username']],
    passwd=argument[mapper['password']],
    database=argument[mapper['dbname']]
)
mycursor = mydb.cursor()
course_query = "SELECT cid,min,max FROM " + \
    argument[mapper['course_table']]+" WHERE sem='" + \
    argument[mapper['sem']]+"' and year='"+argument[mapper['year']]+"'"
mycursor.execute(course_query)
myresult = mycursor.fetchall()
courses = {}
for x in myresult:
    applicable_query = "select dept_id from " + \
        argument[mapper['course_app_dept_table']]+" where cid=%s"
    course_id = (x[0],)
    #mycursor.execute(applicable_query, course_id)
    mycursor.execute(applicable_query, course_id)
    myresult2 = mycursor.fetchall()
    d_list = []
    for dept in myresult2:
        d_list.append(dept)

    l = [x[1], x[2], d_list]
    courses[x[0]] = l

preferences = ""
for x in range(1, int(argument[mapper['no_of_preferences']])):
    preferences += "s.pref"+str(x)+","
preferences += "s.pref"+str(argument[mapper['no_of_preferences']])
student_preference_query = "SELECT s.email_id,s.rollno,s.timestamp,m.gpa,stud.dept_id,"+preferences+" FROM " + \
    argument[mapper['student_pref_table']]+" as s inner join student_marks as m on s.email_id=m.email_id and m.sem=s.sem-2 inner join student as stud on stud.email_id=m.email_id WHERE m.program='"+argument[12]+"' and s.sem='" + \
    argument[mapper['sem']]+"' and s.year='" + \
    argument[mapper['year']]+"' order by gpa DESC, timestamp ASC"
print(student_preference_query)
mycursor.execute(student_preference_query)
myresult = mycursor.fetchall()
# print(myresult)
student = []
for res in myresult:
    l = [res[0], res[1], res[2], res[3], res[4]]
    for x in range(0, int(argument[mapper['no_of_preferences']])):
        l.append(res[(x+5)])
    student.append(l)
# print(myresult)

cols = ['email_id', 'rollno', 'timestamp', 'gpa', 'dept']
for x in range(1, int(argument[mapper['no_of_preferences']])+1):
    cols.append("pref"+str(x))

data = pd.DataFrame(student, columns=cols)
data['timestamp'] = pd.to_datetime(data["timestamp"])
# data=data.sort_values(by='timestamp')
# data.reset_index(inplace=True,drop=True)
stu_course = {}
for key in courses.keys():
    stu_course[key] = []

student_pref_no = {}
# print(data[['timestamp','gpa']].head())
# print(courses)

overlow_by = {}
for i in range(len(data)):
    eid = data.loc[i, 'email_id']
    time = data.loc[i, 'timestamp']
    marks = data.loc[i, 'gpa']
    dept_id = data.loc[i, 'dept']
    pref = data.loc[i, data.columns[5:]].values
    pref = [x for x in pref if x.find("same") == -1 and x in courses]
    for j in range(len(pref)):
        if(check_applicable(pref[j], dept_id, courses)):
            if(check_upper_limit(stu_course, courses, pref[j])):
                stu_course[pref[j]].append(
                    [eid, 1, time, j+1, pref, i, marks, dept_id])
                student_pref_no[eid] = (j+1)
                break
            else:
                student_pref_no[eid] = -1
                overlow_by[pref[j]] = overlow_by.get(pref[j], 0)+1
                continue

count = 0
count2 = 0
count1 = 0
over = []
under = []
unallocated = []
for k, v in student_pref_no.items():
    if(v == -1):
        # print(k)
        count = count+1
        unallocated.append(k)
underflow_stu_list = []

# print("After 1st iteration:")
for cid, v in courses.items():
    if(len(stu_course[cid]) < v[0]):
        under.append(cid)
        underflow_stu_list.extend(x for x in stu_course[cid])
        count2 = count2+1
        query = "INSERT INTO "+argument[mapper['course_allocate_info_table']]+" (cid,sem,year,status,no_of_hits) VALUES('"+cid + \
            "','"+argument[mapper['sem']]+"','"+argument[mapper['year']] + \
                "','UF','0') ON DUPLICATE KEY UPDATE status='UF',no_of_hits=0"
        mycursor.execute(query)
        # print(cid+" UF<br>")
    # print(str(len(stu_course[cid]))+" are there in course "+cid+" whose max is "+str(v[1])+" and min is "+str(v[0]))
    elif(len(stu_course[cid]) <= v[1] and len(stu_course[cid]) >= v[0]):
        query = "INSERT INTO "+argument[mapper['course_allocate_info_table']]+" (cid,sem,year,status,no_of_hits) VALUES('"+cid + \
            "','"+argument[mapper['sem']]+"','"+argument[mapper['year']] + \
                "','IR','0') ON DUPLICATE KEY UPDATE status='IR',no_of_hits=0"
        mycursor.execute(query)
        # print(cid+" IR<br>")
    # else:
    # 	print(cid+" "+str(v[1])+" "+str(v[0])+" "+str(len(stu_course[cid]))+" YO<br>")

# mydb.commit()
# print(str(count1) +" courses are overflow")
# print(str(count2) + " courses are underflow")
# print(str(count) + " are unallocated")
# print("courses who were underflow were "+str(under))
dict1 = {}
for item in student_pref_no.values():
    dict1[item] = dict1.get(item, 0)+1


# for k,v in dict1.items():
# 	print(str(v) +" got prefernce no. "+str(k))
# print()
for cid, hits in overlow_by.items():
    query = "INSERT INTO "+argument[mapper['course_allocate_info_table']]+" (cid,sem,year,status,no_of_hits) VALUES('"+cid+"','"+argument[mapper['sem']] + \
        "','"+argument[mapper['year']]+"','OF','" + \
            str(hits)+"') ON DUPLICATE KEY UPDATE status='OF',no_of_hits='"+str(hits)+"'"
    mycursor.execute(query)
    # print(query)
    # print("Course id "+str(cid)+" has max "+str(courses[cid][-1])+ " was overflowed by "+str(hits))
# mydb.commit()


underflow_stu_list.sort(key=lambda underflow_stu_list: underflow_stu_list[-3])
# print("following is the data of students whose courses have gone underflow")
# for data in underflow_stu_list:
# 	print(data[0])
# print()
# print("list of unallocated students")
# for data in unallocated:
# print(data)
for course, student in stu_course.items():
    query = "UPDATE `"+argument[mapper['course_table']]+"` SET no_of_allocated="+str(len(
        student))+" WHERE cid='"+course+"' and year='"+argument[mapper['year']]+"' and sem='"+argument[mapper['sem']]+"'"
    # print(query)
    mycursor.execute(query)
mydb.commit()
