import pymysql,xlrd,sys
from datetime import timedelta, datetime
n=len(sys.argv)
header=[]
header_id={}
preferences=''
percent=''
choice=[]
#database connection
connection = pymysql.connect(host="localhost", user="root", passwd="", database="ac_ec")
cursor = connection.cursor()
file=xlrd.open_workbook(sys.argv[-1])
data = file.sheet_by_index(0)
for y in range(0,data.ncols):
	header.append(data.cell(0,y).value.lower())
for x in range(7,n-1):
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
	email=data.cell(x,header_id[sys.argv[8].lower()]).value
	rollno=data.cell(x,header_id[sys.argv[7].lower()]).value
	#ole automation to normal date time format script
	d=timedelta(days=data.cell(x,header_id[sys.argv[9].lower()]).value)
	st=datetime(1899,12,30)
	date=d+st
	print(date)
	values=[email,sem,year,rollno,date,allocate_status,no_of_valid_preferences]
	for z in range(1,int(no_of_valid_preferences)+1):
		values.append(data.cell(x,header_id[sys.argv[(9+z)].lower()]).value)
	print(values)
	choice=[]
	#execution of query
	cursor.execute(insertform,values)
print("executed query")
#commit the query into db
connection.commit()
print("query commited")
connection.close()