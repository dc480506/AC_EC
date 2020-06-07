def check_upper_limit(stu_course,courses,pref_id):
	max_limit=courses[pref_id][1]
	if(len(stu_course[pref_id])>=max_limit):
		return False
	else:
	    return True	

import pandas as pd 
import numpy as np
import pymysql,sys

mydb = pymysql.connect(
  host="localhost",
  user="root",
  passwd="",
  database="dummy"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT cid,min,max FROM audit_course")

myresult = mycursor.fetchall()
courses={}
for x in myresult:
  l=[x[1],x[2]]
  courses[x[0]]=l


	

mycursor.execute("SELECT s.email_id,s.rollno,s.timestamp,s.pref1,s.pref2,s.pref3,s.pref4,s.pref5,s.pref6,s.pref7,s.pref8,m.gpa FROM student_preference_audit as s inner join student_marks as m on s.email_id=m.email_id and s.sem=m.sem order by gpa DESC, timestamp ASC")

myresult = mycursor.fetchall()
student=[]

for res in myresult:
	l=[res[0],res[1],res[2],res[3],res[4],res[5],res[6],res[7],res[8],res[9],res[10],res[11]]
	student.append(l)
#print(student)	

cols=['email_id','rollno','timestamp','pref1','pref2','pref3','pref4','pref5','pref6','pref7','pref8','gpa']
	
data=pd.DataFrame(student,columns=cols)
data['timestamp']=pd.to_datetime(data["timestamp"])
#data=data.sort_values(by='timestamp')
#data.reset_index(inplace=True,drop=True)
stu_course={}
for key in courses.keys():
	stu_course[key]=[]

student_pref_no={}
#print(data[['timestamp','gpa']].head())
#print(courses)

overlow_by={}
for i in range(len(data)):
	eid=data.loc[i,'email_id']
	time=data.loc[i,'timestamp']
	marks=data.loc[i,'gpa']
	pref=data.loc[i,data.columns[3:10]].values
	pref=[x for x in pref if x.find("same")==-1]
	for j in range (len(pref)):
		if(check_upper_limit(stu_course,courses,pref[j])):
			stu_course[pref[j]].append([eid,1,time,j+1,pref,i,marks])
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
for k,v in courses.items():
	if(len(stu_course[k])>v[1]):
		over.append(k)
		count1=count1+1
	if(len(stu_course[k])<v[0] and (len(stu_course[k])!=0)):
		under.append(k)
		underflow_stu_list.extend(x for x in stu_course[k])
		count2=count2+1
		
	print(str(len(stu_course[k]))+" are there in course "+k+" whose max is "+str(v[1])+" and min is "+str(v[0]))
	print()	
		
print(str(count1) +" courses are overflow")
print(str(count2) + " courses are underflow")
print(str(count) + " are unallocated")
print("following are students whose courses are underflow")
print("name--->prefernce_no---->gpa")
underflow_stu_list.sort(key = lambda underflow_stu_list: underflow_stu_list[-2])
for v in underflow_stu_list:
	print(v[0]+"--->"+str(v[3])+"--->"+str(v[-1]))
print(len(underflow_stu_list))	



loop=0
for v in underflow_stu_list: 
    print(v[0],end=',')
print('length',len(underflow_stu_list))
print("#################################################")    
while (len(underflow_stu_list)!=0):
	for s in underflow_stu_list:
		
		prefl=s[4]
		email=s[0]
		time=s[2]
		k=s[-2]
		curr_marks=s[-1]
		o=underflow_stu_list.index(s)
		if(s[3]==len(prefl)):
			print(email +" "+str(s[3])+" "+str(len(prefl))+" pref list exhuasted")
			unallocated.append(email)
			del underflow_stu_list[o]
			temp=stu_course[prefl[s[3]-1]]
			temp=[k for k in temp if k[0]!=email]
			stu_course[prefl[s[3]-1]]=temp
		

					
		for i in range(s[3],len(s[4])):
			
			
			#previous_pref_no=prefl[i]
			print("previous course which "+email+" opted "+prefl[s[3]-1])
			#print(email+" "+str(i)+ " "+str(len(prefl)))
			next_pref=prefl[i]
			if(i>=len(prefl)-1):
				unallocated.append(email)
				del underflow_stu_list[o]
				temp=stu_course[prefl[s[3]-1]]
				temp=[k for k in temp if k[0]!=email]
				stu_course[prefl[s[3]-1]]=temp
				print(email,"unallocated added")
			else:
				if(next_pref in under):
					print("sorry the course is scraped")
					continue
				
				elif(check_upper_limit(stu_course,courses,next_pref)):
					# print(email,'in else if.')
					stu_course[next_pref].append([email,1,time,i+1,prefl,k,marks])
					student_pref_no[email]=i+1
					# print('before',underflow_stu_list[o])
					del underflow_stu_list[o]
					temp=stu_course[prefl[s[3]-1]]
					temp=[k for k in temp if k[0]!=email]
					stu_course[prefl[s[3]-1]]=temp
					# print('after',underflow_stu_list[o])
					print('Curr Student: '+email+' got course '+prefl[i]+" as the course was not overflowed")
					break
				else:
					# print(email,'in else else.')
					last_stu=stu_course[next_pref][-1]
					if(last_stu[-1]<curr_marks):
						print(str(next_pref)+ " course is overflowed. so curr_stu displace "+str(last_stu[0]))
						print("curr_stu marks "+str(curr_marks)+" displace stu marks"+str(last_stu[-1]))
						stu_course[next_pref].pop()
						temp=stu_course[prefl[s[3]-1]]
						temp=[k for k in temp if k[0]!=email]
						stu_course[prefl[s[3]-1]]=temp
						#print(str(len(stu_course[next_pref]))+ "length of stu_course after pop")
						del underflow_stu_list[o]
						underflow_stu_list.append(last_stu)
						underflow_stu_list.sort(key = lambda underflow_stu_list: underflow_stu_list[-2]) 
						stu_course[prefl[i]].append([email,1,time,i+1,prefl,k,curr_marks])
						student_pref_no[email]=i+1
						print('Curr Student:'+email+' got course '+prefl[i])
						break
					elif(last_stu[-1]==curr_marks):
						print("curr_stu marks "+str(curr_marks)+" same as last stu marks"+str(last_stu[-1]))
						if(last_stu[2]>time):
							print(str((stu_course[next_pref]))+ "is overflowed. so curr_stu displace "+str(last_stu[0]))
							print("curr_stu time "+str(time)+" displace stu time"+str(last_stu[2]))
							stu_course[next_pref].pop()
							temp=stu_course[prefl[s[3]-1]]
							temp=[k for k in temp if k[0]!=email]
							stu_course[prefl[s[3]-1]]=temp
							del underflow_stu_list[o]
							underflow_stu_list.append(last_stu)
							underflow_stu_list.sort(key = lambda underflow_stu_list: underflow_stu_list[-2])
							stu_course[prefl[i]].append([email,1,time,i+1,prefl,k,curr_marks])
							student_pref_no[email]=i+1
							print('Curr Student:'+email+' got course '+prefl[i])
						else:
							continue
							
					else:
						# print('continue')
						# print(email,'in else.')
						continue
						

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


		


print(dict1)
print(overlow_by)
print(len(overlow_by))
print(len(courses))
print(under)




# sql updations
table_name_1='student_audit'
table_name_2='student_preference_audit'
table_name_3='audit_course'
sem=5
year='2020-21'

for course,student in stu_course.items():
	query="UPDATE `"+table_name_3+"` SET no_of_allocated="+str(len(student))+" where cid='"+course+"' and year='"+year+"' and sem="+str(sem)
	# print(query)
	mycursor.execute(query)
	mydb.commit()
	for i in range(len(student)):	
		query="INSERT INTO `"+table_name_1+"`(`email_id`, `cid`, `sem`, `year`) VALUES ('"+student[i][0]+"','"+course+"',"+str(sem)+",'"+year+"')"
		mycursor.execute(query)
		mydb.commit()
		query="UPDATE `"+table_name_2+"` SET allocate_status=1 where email_id='"+student[i][0]+"' and year='"+year+"' and sem="+str(sem)
		# print(query)
		mycursor.execute(query)
		mydb.commit()
		# print("INSERT INTO `"+table_name+"`(`email_id`, `cid`, `sem`, `year`) VALUES ('"+student[i][0]+"','"+course+"',"+str(sem)+",'"+year+"')")