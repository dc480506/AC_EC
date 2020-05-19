import pymysql,xlrd,sys
from datetime import timedelta, datetime
n=len(sys.argv)
header,choice=[],[]
header_id={}
preferences=''
percent=''
pm="PM GMT+5:30"
am="AM GMT+5:30"
tp=[]
def convert24am(str1):        
    # first element is 12 
    dt=[]
    dt=str1.split(':')
    if dt[0]=='12':
    	return '00' + ':' + dt[1] + ':' + dt[2]
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
connection = pymysql.connect(host="localhost", user="root", passwd="", database="ac_ec")
cursor = connection.cursor()
file=xlrd.open_workbook(sys.argv[-1])
data = file.sheet_by_index(0)
for y in range(0,data.ncols):
	header.append(data.cell(0,y).value.lower())
for x in range(6,n-1):
	header_id[sys.argv[x].lower()]=header.index(sys.argv[x].lower())
allocate_status=sys.argv[4]
no_of_valid_preferences=sys.argv[5]
sem=sys.argv[1]
year=sys.argv[2]
for z in range(1,int(no_of_valid_preferences)):
	preferences=preferences+'pref'+str(z)+','
	percent=percent+'%s,'
preferences=preferences+'pref'+str(no_of_valid_preferences)
percent=percent+'%s'
type_of_form=str(sys.argv[3])
insertform="""INSERT into student_preference_"""+type_of_form+"""(email_id,sem,year,rollno,timestamp,allocate_status,no_of_valid_preferences,"""+preferences+""") VALUES(%s,%s,%s,%s,%s,%s,%s,"""+percent+""");"""
print(insertform)
for x in range (1,data.nrows):
	email=data.cell(x,header_id[sys.argv[7].lower()]).value
	rollno=data.cell(x,header_id[sys.argv[6].lower()]).value
	#ole automation to normal date time format script
	#d=timedelta(days=data.cell(x,header_id[sys.argv[8].lower()]).value)
	# st=datetime(1899,12,30)
	# date=d+st
	time=data.cell(x,header_id[sys.argv[8].lower()]).value
	if pm in time:
		time=time.replace(pm,'')
		tp=time.split(' ')
		tp[1]=convert24pm(tp[1])
		print(tp)
		time=''
		for q in tp:
			time=time+q+" "
		time=time.strip(' ')	
	elif am in time:
		time=time.replace(am,'')
		tp=time.split(' ')
		tp[1]=convert24am(tp[1])
		print(tp)
		time=''
		for q in tp:
			time=time+q+" "
		time=time.strip(' ')	
	print(time)
	values=[email,sem,year,rollno,time,allocate_status,no_of_valid_preferences]
	for z in range(1,int(no_of_valid_preferences)+1):
		values.append(data.cell(x,header_id[sys.argv[(8+z)].lower()]).value)
	print(values)
	choice=[]
	#execution of query
	cursor.execute(insertform,values)
print("executed query")
#commit the query into db
connection.commit()
print("query commited")
connection.close()