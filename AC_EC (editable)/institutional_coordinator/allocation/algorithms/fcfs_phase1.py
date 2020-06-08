import pandas as pd 
import numpy as np
import pymysql,sys
mapper={
		"sem":0,
		"year":1,
        "student_pref_table":2,
        "student_course_table":3,
        "course_allocate_info_table":4,
        "course_table":5,
        "no_of_preferences":6,
        "host":7,
        "username":8,
        "password":9,
        "dbname":10,
        }
argument=list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n=len(argument)

def check_upper_limit(stu_course,courses,pref_id):
	max_limit=courses[pref_id][1]
	if(len(stu_course[pref_id])>=max_limit):
		return False
	else:
	    return True	

mydb = pymysql.connect(
  host=argument[mapper['host']],
  user=argument[mapper['username']],
  passwd=argument[mapper['password']],
  database=argument[mapper['dbname']]
)

mycursor = mydb.cursor()
course_query="SELECT cid,min,max FROM "+argument[mapper['course_table']]+" WHERE sem='"+argument[mapper['sem']]+"' and year='"+argument[mapper['year']]+"'"
mycursor.execute(course_query)

myresult = mycursor.fetchall()
courses={}
for x in myresult:
  l=[x[1],x[2]]
  courses[x[0]]=l
preferences=""
for x in range(1,int(argument[mapper['no_of_preferences']])):
	preferences+="pref"+str(x)+","
preferences+="pref"+str(argument[mapper['no_of_preferences']])
student_pref_query="SELECT email_id,rollno,timestamp,"+preferences+" FROM "+argument[mapper['student_pref_table']]+" WHERE sem='"+argument[mapper['sem']]+"' and year='"+argument[mapper['year']]+"'" 	

mycursor.execute(student_pref_query)

myresult = mycursor.fetchall()
student=[]

for res in myresult:
	l=[res[0],res[1],res[2]]
	for x in range(0,int(argument[mapper['no_of_preferences']])):
		l.append(res[(x+3)])
	student.append(l)
#print(student)	
cols=['email_id','rollno','timestamp']
for x in range(1,int(argument[mapper['no_of_preferences']])+1):
	cols.append("pref"+str(x))
	
data=pd.DataFrame(student,columns=cols)
data['timestamp']=pd.to_datetime(data["timestamp"])
data=data.sort_values(by='timestamp')
data.reset_index(inplace=True,drop=True)
stu_course={}
for key in courses.keys():
	stu_course[key]=[]

student_pref_no={}
#print(courses)
# print("After sort")
# print(data.head())
overlow_by={}
for i in range(len(data)):
	eid=data.loc[i,'email_id']
	time=data.loc[i,'timestamp']
	pref=data.loc[i,data.columns[3:]].values
	pref=[x for x in pref if x.find("same")==-1 and x in courses]
	for j in range (len(pref)):
		if(check_upper_limit(stu_course,courses,pref[j])):
			stu_course[pref[j]].append([eid,1,time,j+1,pref])
			student_pref_no[eid]=(j+1)
			break
		else:
			student_pref_no[eid]=-1
			overlow_by[pref[j]]=overlow_by.get(pref[j],0)+1
			continue
			
count=0
count2=0
count1=0
over=[]
under=[]
unallocated=[]
for k,v in student_pref_no.items():
	if(v==-1):
		#print(k)
		count=count+1
		unallocated.append(k)
underflow_stu_list=[]

print("After 1st iteration:")
for cid,v in courses.items():
	if(len(stu_course[cid])>v[1]):
		over.append(cid)
		count1=count1+1
	if(len(stu_course[cid])<v[0] and (len(stu_course[cid])!=0)):
		under.append(cid)
		underflow_stu_list.extend(x for x in stu_course[cid])
		count2=count2+1
		query="INSERT INTO "+argument[mapper['course_allocate_info_table']]+" (cid,sem,year,status,no_of_hits) VALUES('"+cid+"','"+argument[mapper['sem']]+"','"+argument[mapper['year']]+"','UF','0') ON DUPLICATE KEY UPDATE status='UF',no_of_hits=0"
		mycursor.execute(query)
		# print(query)
		
	# print(str(len(stu_course[cid]))+" are there in course "+cid+" whose max is "+str(v[1])+" and min is "+str(v[0]))
	if(len(stu_course[cid])<v[1] and len(stu_course[cid])>v[0]):
		query="INSERT INTO "+argument[mapper['course_allocate_info_table']]+" (cid,sem,year,status,no_of_hits) VALUES('"+cid+"','"+argument[mapper['sem']]+"','"+argument[mapper['year']]+"','IR','0') ON DUPLICATE KEY UPDATE status='IR',no_of_hits=0"
		mycursor.execute(query)
		# print(query)
		# print()
# mydb.commit()	
		
# print(str(count1) +" courses are overflow")
# print(str(count2) + " courses are underflow")
# print(str(count) + "are unallocated")
# print("courses who were underflow were "+str(under))
dict1={} 
for item in student_pref_no.values():
	dict1[item]=dict1.get(item,0)+1



# for k,v in dict1.items():
	# print(str(v) +" got prefernce no. "+str(k))
# print()
for cid,hits in overlow_by.items():
	query="INSERT INTO "+argument[mapper['course_allocate_info_table']]+" (cid,sem,year,status,no_of_hits) VALUES('"+cid+"','"+argument[mapper['sem']]+"','"+argument[mapper['year']]+"','OF','"+str(hits)+"') ON DUPLICATE KEY UPDATE status='OF',no_of_hits='"+str(hits)+"'"
	mycursor.execute(query)
	# print(query)
	# print("Course id "+str(cid)+" has max "+str(courses[cid][-1])+ " was overflowed by "+str(hits))
# mydb.commit()

underflow_stu_list.sort(key = lambda underflow_stu_list: underflow_stu_list[2])
# print("following is the data of students whose courses have gone underflow")
# for data in underflow_stu_list:
	# print(data[0])
# print()	
# print("list of unallocated students")
# for data in unallocated:
	# print(data)

for course,student in stu_course.items():
	query="UPDATE `"+argument[mapper['course_table']]+"` SET no_of_allocated="+str(len(student))+" WHERE cid='"+course+"' and year='"+argument[mapper['year']]+"' and sem='"+argument[mapper['sem']]+"'"
	# print(query)
	mycursor.execute(query)
# 	for i in range(len(student)):	
# 		query="INSERT INTO `"+argument[mapper['student_course_table']]+"`(`email_id`, `cid`, `sem`, `year`) VALUES ('"+student[i][0]+"','"+course+"','"+argument[mapper['sem']]+"','"+argument[mapper['year']]+"') ON DUPLICATE KEY UPDATE cid='"+cid+"'"
# 		mycursor.execute(query)
# 		mydb.commit()
# 		query="UPDATE `"+argument[mapper['student_pref_table']]+"` SET allocate_status=1 where email_id='"+student[i][0]+"' and year='"+argument[mapper['year']]+"' and sem='"+argument[mapper['sem']]+"'"
# 		# print(query)
# 		mycursor.execute(query)
mydb.commit()