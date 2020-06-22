import pymysql,xlrd,sys,re
from datetime import timedelta, datetime
mapper={
		"file_location":0,
		"host":1,
        "username":2,
        "password":3,
        "dbname":4,
        "sem":5,
        "year":6,
        "type_of_form":7,
		"no":8,
        "status":9,
        "npref":10,
        "rollno":11,
        "email":12,
        "timestamp":13,
        "firstpref":14
       }
argument=list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n=len(argument)
start_col=11
no_of_valid_preferences=argument[mapper['npref']]
header,choice=[],[]
header_id={}
preferences=''
percent=''
pm="PM GMT+5:30"
am="AM GMT+5:30"
tp=[]
def sameprefrem(list1):
	cid=''
	for x in range(len(list1)):
		if 'same' not in list1[x]: 
			cid=list1[x]
			for y in range((x+1),len(list1)):
				if list1[y] == cid:
					list1[y]='same as pref '+str(x+1)
	return list1
def convert24am(str1):        
    # first element is 12 
    dt=[]
    dt=str1.split(':')
    if dt[0]=='12':
    	return '00' + ':' + dt[1] + ':' + dt[2]
    elif int(dt[0])<10:
    	return '0' + dt[0] + ':' + dt[1] + ':' + dt[2] 
    else:
    	return str1
def convert24pm(str1):
	dt=[]
	dt=str1.split(':')       
    # first elements is 12    
	if dt[0]=='12':
		return str1          
	else: 
    	# add 12 to hours
		return str(int(dt[0]) + 12) + ':' + dt[1] + ':' + dt[2] 
#database connection
connection = pymysql.connect(host=argument[mapper['host']], user=argument[mapper['username']], passwd=argument[mapper['password']] , database=argument[mapper['dbname']])
cursor = connection.cursor()
file=xlrd.open_workbook(argument[mapper['file_location']])
data = file.sheet_by_index(0)
for y in range(0,data.ncols):
	header.append(data.cell(0,y).value.lower())
try:
	for x in range(start_col,n):
		header_id[argument[x].lower()]=header.index(argument[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'",str(e),)[0]+" is not a column in the uploaded sheet")
    sys.exit(0)
allocate_status=argument[mapper['status']]
sem=argument[mapper['sem']]
year=argument[mapper['year']]
no=argument[mapper['no']]
for z in range(1,int(no_of_valid_preferences)):
	preferences=preferences+'pref'+str(z)+','
	percent=percent+'%s,'
preferences=preferences+'pref'+str(no_of_valid_preferences)
percent=percent+'%s'
type_of_form=str(argument[mapper['type_of_form']])
update_student_form="""UPDATE student_form SET form_filled=1, timestamp=%s WHERE email_id=%s AND sem=%s AND year=%s AND no=%s AND form_type=%s"""
insertform="""INSERT into student_preference_"""+type_of_form+"""(email_id,sem,year,rollno,timestamp,allocate_status,no_of_valid_preferences,"""+preferences+""") VALUES(%s,%s,%s,%s,%s,%s,%s,"""+percent+""");"""
# print(insertform)
try:
	for x in range (1,data.nrows):
		prefer=[]
		email=data.cell(x,header_id[argument[mapper['email']].lower()]).value
		rollno=data.cell(x,header_id[argument[mapper['rollno']].lower()]).value
		#ole automation to normal date time format script
		#d=timedelta(days=data.cell(x,header_id[sys.argv[8].lower()]).value)
		# st=datetime(1899,12,30)
		# date=d+st
		time=data.cell(x,header_id[argument[mapper['timestamp']].lower()]).value
		if pm in time or 'pm' in time or 'PM' in time:
			time=time.replace(pm,'')
			tp=time.split(' ')
			tp[1]=convert24pm(tp[1])
			# print(tp)
			time=''
			for q in tp:
				time=time+q+" "
			time=time.strip(' ')	
		elif am in time or 'am' in time or 'AM' in time:
			time=time.replace(am,'')
			tp=time.split(' ')
			tp[1]=convert24am(tp[1])
			# print(tp)
			time=''
			for q in tp:
				time=time+q+" "
			time=time.strip(' ')	
		# print(time)
		values=[time,email,sem,year,no,type_of_form]
		values2=[email,sem,year,rollno,time,allocate_status,no_of_valid_preferences]
		for z in range(1,int(no_of_valid_preferences)+1):
			prefer.append(data.cell(x,header_id[argument[(mapper['firstpref']+z-1)].lower()]).value)
		prefer=sameprefrem(prefer)
		for val in range(0,len(prefer)):
			values2.append(prefer[val])
		# print(values)
		choice=[]
		#execution of query
		# print(values)
		cursor.execute(update_student_form,values)
		cursor.execute(insertform,values2)
except Exception as e:
    print(str(e))
    sys.exit(0)
#commit the query into db
connection.commit()
print("Successful")
# close the connection
connection.close()