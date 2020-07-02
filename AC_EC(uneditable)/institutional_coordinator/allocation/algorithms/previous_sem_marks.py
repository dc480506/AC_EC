def check_upper_limit(stu_course,courses,pref_id):
	max_limit=courses[pref_id][1]
	if(len(stu_course[pref_id])>=max_limit):
		return False
	else:
	    return True	
def check_applicable(cid,dept_id,courses):
    dept_list=courses[cid][2]
    if dept_id in dept_list:
        return True
    else:
        return False
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
		"pref_percent_table":6,
		"pref_student_alloted_table":7,
		"course_app_dept_table":8,
        "no_of_preferences":9,
        "host":10,
        "username":11,
        "password":12,
        "dbname":13,
        }
argument=list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n=len(argument)
mydb = pymysql.connect(
  host=argument[mapper['host']],
  user=argument[mapper['username']],
  passwd=argument[mapper['password']],
  database=argument[mapper['dbname']]
)
mycursor = mydb.cursor()

# Retrieving courses and their max min
course_query="SELECT cid,min,max FROM "+argument[mapper['course_table']]+" WHERE sem='"+argument[mapper['sem']]+"' and year='"+argument[mapper['year']]+"'"
mycursor.execute(course_query)

myresult = mycursor.fetchall()
courses={}
for x in myresult:
  #Retrieving Applicable dept for a course
  applicable_query="select dept_id from "+argument[mapper['course_app_dept_table']]+" where cid=%s"
  course_id=(x[0],)
  #mycursor.execute(applicable_query, course_id)
  mycursor.execute(applicable_query, course_id)
  myresult2 = mycursor.fetchall()
  d_list=[]
  for dept in myresult2:
    d_list.append(dept)
    
  
  
  l=[x[1],x[2],d_list]
  courses[x[0]]=l


preferences=""
for x in range(1,int(argument[mapper['no_of_preferences']])):
	preferences+="pref"+str(x)+","
preferences+="pref"+str(argument[mapper['no_of_preferences']])
	
# Retrieve student preference 
student_preference_query="SELECT s.email_id,s.rollno,s.timestamp,m.gpa,stud.dept_id,"+preferences+" FROM "+argument[mapper['student_pref_table']]+" as s inner join student_marks as m on s.email_id=m.email_id and m.sem=s.sem-2 inner join student as stud on stud.email_id=m.email_id WHERE s.sem='"+argument[mapper['sem']]+"' and s.year='"+argument[mapper['year']]+"' order by gpa DESC, timestamp ASC"
mycursor.execute(student_preference_query)

myresult = mycursor.fetchall()
student=[]

for res in myresult:
	l=[res[0],res[1],res[2],res[3],res[4]]
	for x in range(0,int(argument[mapper['no_of_preferences']])):
		l.append(res[(x+5)])
	student.append(l)
# print(student)	

cols=['email_id','rollno','timestamp','gpa','dept']
for x in range(1,int(argument[mapper['no_of_preferences']])+1):
	cols.append("pref"+str(x))
data=pd.DataFrame(student,columns=cols)
total_responses=len(data.index)
data['timestamp']=pd.to_datetime(data["timestamp"])
#data=data.sort_values(by='timestamp')
#data.reset_index(inplace=True,drop=True)
stu_course={}   # key: cid , val: allocated students for this course 
for key in courses.keys():
	stu_course[key]=[]

student_pref_no={} # student preference
#print(data[['timestamp','gpa']].head())
#print(courses)
"""
DATA STRUCTURE EXPLAINATION
A) courses(key=course id ,values= list of max min and sub list of dept_id for which the course is applicable
B)stu_course(key=course_id,values=(will constain list of students who have been allocated the course)for every student 8 things are stored.
1)email_id 
2)1 or 0(allocate status)
3)timestamp 
4)prefernce_no allocated 
5)index as per the dataframe(sorted asc by timestamp and dec by gpa)
6)marks==gpa
7)dept_id
C)student_pref_no key=email_id value=pref no allocated (-1 means unallocated)
D)underflow_stu_list list having data of underflow student which stores the 8 elements discussed in point B
E)under,over courses which are underflow and overflow respectively





"""
overlow_by={}
for i in range(len(data)):
	eid=data.loc[i,'email_id']
	time=data.loc[i,'timestamp']
	marks=data.loc[i,'gpa']
	dept_id=data.loc[i,'dept']
	pref=data.loc[i,data.columns[5:]].values
	pref=[x for x in pref if x.find("same")==-1 and x in courses]
	pref_true_no=[]
	trueno=1
	# i=0
	for h in data.loc[i,data.columns[5:]].values:
		if h.find("same")==-1 and h in courses:
			pref_true_no.append([h,trueno])
			# pref_true_no.append()
		trueno+=1
	for j in range (len(pref)):
		if(check_applicable(pref[j],dept_id,courses)):
			if(check_upper_limit(stu_course,courses,pref[j])):
				stu_course[pref[j]].append([eid,1,time,j+1,pref,i,marks,dept_id])
				student_pref_no[eid]=(j+1)
				# student_pref_no[eid]=pref_true_no[j][1]
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
for k,v in courses.items():
	if(len(stu_course[k])>v[1]):
		over.append(k)
		count1=count1+1
	if(len(stu_course[k])<v[0]):
		under.append(k)
		underflow_stu_list.extend(x for x in stu_course[k])
		count2=count2+1
		
	print(str(len(stu_course[k]))+" are there in course "+k+" whose max is "+str(v[1])+" and min is "+str(v[0]))
	print()	
print("<br>&&&&&&&&&&&&&&&&&&&&&&&&",under,"&&&&&&&&&&&&&&&&&&<br>")		
print(str(count1) +" courses are overflow")
print(str(count2) + " courses are underflow")
print(str(count) + " are unallocated")
print("following are students whose courses are underflow")
print("name--->prefernce_no---->gpa")
underflow_stu_list.sort(key = lambda underflow_stu_list: underflow_stu_list[-3])
for v in underflow_stu_list:
	print("<br><br>!!!!!!!!!!",v[0]+"--->"+str(v[3])+"--->"+str(v[-1]),"!!!!!!<br><br>")
print(len(underflow_stu_list))	



loop=0
for v in underflow_stu_list: 
    print(v[0],end=',')
print('length',len(underflow_stu_list))
print("#################################################")    
# while (len(underflow_stu_list)!=0):
rem_underflow_stu_list=[]
while (len(underflow_stu_list)!=len(rem_underflow_stu_list)):
	for s in underflow_stu_list:
		#print("<br>@@@!!!!!@@@@@!!!!!@@@@@!!!!!",len(underflow_stu_list),"@@@!!!!!@@@@@!!!!!@@@@@!!!!!<br>")
		#s=> [emailid,allocate_status(0,1),timestamp,preference_alloted,preference_list,sorting order index,marks,dept_id]
		#	print("<br>-------------------",s[0],s[4][s[3]],"------------<br>")
		prefl=s[4]
		email=s[0]
		time=s[2]
		k=s[-3]
		curr_marks=s[-2]
		dept_id=s[-1]
		o=s
		print(s)
		if(s[3]==len(prefl)):
			print(email +" "+str(s[3])+" "+str(len(prefl))+" pref list exhuasted")
			unallocated.append(email)
			# del underflow_stu_list[o]
			rem_underflow_stu_list.append(o)
			temp=stu_course[prefl[s[3]-1]]
			temp=[k for k in temp if k[0]!=email]
			stu_course[prefl[s[3]-1]]=temp
			student_pref_no[email]=-1
			continue

					
		for i in range(s[3],len(s[4])+1):
			
			
			#previous_pref_no=prefl[i]
			print("previous course which "+email+" opted "+prefl[s[3]-1])
			#print(email+" "+str(i)+ " "+str(len(prefl)))
			
			if(i==len(prefl)):
				unallocated.append(email)
				# del underflow_stu_list[o]
				rem_underflow_stu_list.append(o)

				temp=stu_course[prefl[s[3]-1]]
				temp=[k for k in temp if k[0]!=email]
				stu_course[prefl[s[3]-1]]=temp
				student_pref_no[email]=-1
				print(email,"unallocated added")
			else:
				next_pref=prefl[i]
				if(next_pref in under):
					print("sorry the course "+next_pref+" is scraped")
					continue
				
				elif(check_applicable(next_pref,dept_id,courses)):
					if(check_upper_limit(stu_course,courses,next_pref)):
						stu_course[next_pref].append([email,1,time,i+1,prefl,k,curr_marks,dept_id])
						student_pref_no[email]=i+1
						# print('before',underflow_stu_list[o])
						# del underflow_stu_list[o]
						rem_underflow_stu_list.append(o)
						temp=stu_course[prefl[s[3]-1]]
						temp=[k for k in temp if k[0]!=email]
						stu_course[prefl[s[3]-1]]=temp
						temp_list=stu_course[prefl[i]]
						temp_list.sort(key=lambda temp_list:temp_list[-3])
						stu_course[prefl[i]]=temp_list
						# print('after',underflow_stu_list[o])
						print('Curr Student: '+email+' got course '+prefl[i]+" as the course was not overflowed")
						break
					else:
						# print(email,'in else else.')
						last_stu=stu_course[next_pref][-1]
						if(last_stu[-2]<curr_marks):
							print(str(next_pref)+ " course is overflowed. so curr_stu displace "+str(last_stu[0]))
							print("curr_stu marks "+str(curr_marks)+" displace stu marks"+str(last_stu[-1]))
							stu_course[next_pref].pop()
							temp=stu_course[prefl[s[3]-1]]
							temp=[k for k in temp if k[0]!=email]
							stu_course[prefl[s[3]-1]]=temp
							#print(str(len(stu_course[next_pref]))+ "length of stu_course after pop")
							# del underflow_stu_list[o]
							rem_underflow_stu_list.append(o)

							underflow_stu_list.append(last_stu)
							underflow_stu_list.sort(key = lambda underflow_stu_list: underflow_stu_list[-3]) 
							stu_course[prefl[i]].append([email,1,time,i+1,prefl,k,curr_marks,dept_id])
							temp_list=stu_course[prefl[i]]
							temp_list.sort(key=lambda temp_list:temp_list[-3])
							stu_course[prefl[i]]=temp_list
							student_pref_no[email]=i+1
							print('Curr Student:'+email+' got course '+prefl[i])
							break
						elif(last_stu[-2]==curr_marks):
							print("curr_stu marks "+str(curr_marks)+" same as last stu marks"+str(last_stu[-1]))
							if(last_stu[2]>time):
								# print(str((stu_course[next_pref]))+ "is overflowed. so curr_stu displace "+str(last_stu[0]))
								print("curr_stu time "+str(time)+" displace stu time"+str(last_stu[2]))
								stu_course[next_pref].pop()
								temp=stu_course[prefl[s[3]-1]]
								temp=[k for k in temp if k[0]!=email]
								stu_course[prefl[s[3]-1]]=temp
								# del underflow_stu_list[o]
								rem_underflow_stu_list.append(o)

								underflow_stu_list.append(last_stu)
								underflow_stu_list.sort(key = lambda underflow_stu_list: underflow_stu_list[-3])
								stu_course[prefl[i]].append([email,1,time,i+1,prefl,k,curr_marks,dept_id])
								temp_list=stu_course[prefl[i]]
								temp_list.sort(key=lambda temp_list:temp_list[-3])
								stu_course[prefl[i]]=temp_list
								student_pref_no[email]=i+1
								print('Curr Student:'+email+' got course '+prefl[i])
								break
							else:
								continue
								
						else:
							# print('continue')
							# print(email,'in else.')
							continue
	print("<br><br>^^^^^^^^^^",rem_underflow_stu_list,"^^^^^^^^^^<br><br>")					
	for o in rem_underflow_stu_list:
		underflow_stu_list.remove(o)
	rem_underflow_stu_list=[]
	print("after iteration "+str(loop+1))				
	for v in underflow_stu_list: 
		print(v[0],end=',')
		print(student_pref_no[v[0]])
	print('length',len(underflow_stu_list))
	loop=loop+1
	if(loop==20):
		break




print("courses after 2nd iteration")			
count1=0
count2=0
for k,v in courses.items():
	if(len(stu_course[k])>v[1]):
		over.append(k)
		count1=count1+1
	if(len(stu_course[k])<v[0] and (len(stu_course[k])!=0)):
		under.append(k)
		print('v',len(stu_course[k]))
		underflow_stu_list.extend(x for x in stu_course[k])
		count2=count2+1
		
	print(str(len(stu_course[k]))+" are there in course "+k+" whose max is "+str(v[1])+" and min is "+str(v[0]))
	print()	
		
print(str(count1) +" courses are overflow")
print(str(count2) + " courses are underflow")
print(str(count) + "are unallocated")	

count11=0
count22=0
#print(student_pref_no)
dict1={}
for item in student_pref_no.values():
	dict1[item]=dict1.get(item,0)+1


		


# print(dict1)
# print(overlow_by)
# print(len(overlow_by))
# print(len(courses))
# print(under)




# sql updations
print("<br>$$$^6^^",len(stu_course),"<br>")
for course,student in stu_course.items():
	
	query="UPDATE `"+argument[mapper['course_table']]+"` SET no_of_allocated="+str(len(student))+" where cid='"+course+"' and year='"+argument[mapper['year']]+"' and sem="+argument[mapper['sem']]
	mycursor.execute(query)
	# mydb.commit()
	for i in range(len(student)):	
		# try:
		query="INSERT INTO `"+argument[mapper['student_course_table']]+"`(`email_id`, `cid`, `sem`, `year`) VALUES ('"+student[i][0]+"','"+course+"',"+argument[mapper['sem']]+",'"+argument[mapper['year']]+"')"
		mycursor.execute(query)
		# mydb.commit()
		query="UPDATE `"+argument[mapper['student_pref_table']]+"` SET allocate_status=1 where email_id='"+student[i][0]+"' and year='"+argument[mapper['year']]+"' and sem="+argument[mapper['sem']]
		# print(query)
		mycursor.execute(query)
		query="INSERT INTO `"+argument[mapper['pref_student_alloted_table']]+"` (email_id,pref_no) VALUES('"+student[i][0]+"','"+str(student_pref_no[student[i][0]])+"')"
		mycursor.execute(query)
		# except:
		# 	pass
for k,v in dict1.items():
	query="INSERT INTO `"+argument[mapper['pref_percent_table']]+"`(`pref_no`,`no_of_stu`,`percent`) VALUES('"+str(k)+"','"+str(v)+"','"+str(round(v/total_responses,4)*100)+"')"
	mycursor.execute(query)
# for k,v in student_pref_no.items():
# 	if v!=-1:
# 		query="INSERT INTO `"+argument[mapper['pref_student_alloted_table']]+"` (email_id,pref_no) VALUES('"+str(k)+"','"+str(v)+"')"
# 		mycursor.execute(query)
mydb.commit()
		# print("INSERT INTO `"+table_name+"`(`email_id`, `cid`, `sem`, `year`) VALUES ('"+student[i][0]+"','"+course+"',"+str(sem)+",'"+year+"')")
