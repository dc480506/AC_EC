import pymysql,xlrd,sys,re
mapper={
		"added":0,
		"timestamp":1,
        "fname":2,
        "lname":3,
        "mname":4,
        "sem":5,
        "year_of_admission":6,
        "dept":7,
        "email":8,
        "rollno":9,
        "file_location":10,
        "host":11,
        "username":12,
        "password":13,
        "dbname":14,
       }
header=[]
header_id={}
start_col=2
argument=list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n=len(argument)
# dept={'COMP':'1','IT':'2','EXTC':'3','ETRX':'4','MECH':'5'}
#database connection
connection = pymysql.connect(host=argument[mapper['host']], user=argument[mapper['username']], passwd=argument[mapper['password']], database=argument[mapper['dbname']])
cursor = connection.cursor()
file=xlrd.open_workbook(argument[mapper["file_location"]])
data = file.sheet_by_index(0)
for y in range(0,data.ncols):
	header.append(data.cell(0,y).value.lower())
try:
	for x in range(start_col,n-5):
		header_id[argument[x].lower()]=header.index(argument[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'",str(e),)[0]+" is not a column in the uploaded sheet")
    sys.exit(0)
ts=argument[mapper["timestamp"]]
added_by=argument[mapper["added"]]
insert="""INSERT into student(email_id,rollno,fname,mname,lname,year_of_admission,dept_id,current_sem,timestamp,adding_email_id) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);"""
try:
	for x in range (1,data.nrows):
		email=data.cell(x,header_id[argument[mapper['email']].lower()]).value
		#print(email)
		rollno=data.cell(x,header_id[argument[mapper['rollno']].lower()]).value
		#print(rollno)
		fname=data.cell(x,header_id[argument[mapper['fname']].lower()]).value
		#print(fname)
		mname=data.cell(x,header_id[argument[mapper['mname']].lower()]).value
		#print(mname)
		lname=data.cell(x,header_id[argument[mapper['lname']].lower()]).value
		#print(lname)
		year_of_admission=data.cell(x,header_id[argument[mapper['year_of_admission']].lower()]).value
		#print(year_of_admission)
		dept=data.cell(x,header_id[argument[mapper['dept']].lower()]).value
		#print(dept)
		current_sem=data.cell(x,header_id[argument[mapper['sem']].lower()]).value
		#print(current_sem)
		values=(email,rollno,fname,mname,lname,year_of_admission,dept,current_sem,ts,added_by)
		#executing query
		try:
			cursor.execute(insert,values)
		except Exception as e:
			if "Duplicate entry" in str(e):
				print("Email: "+email+" Rollno: "+str(int(rollno))+" has duplicate entry.")
			elif "foreign key constraint fails" in str(e):
				print("Department id: "+str(int(dept))+" does not exist/(if present, wrong value) in the table.")
			print("The upload was unsuccessful.")
			sys.exit(0)
except Exception as e:
    print(str(e))
    sys.exit(0)
# print("executed query")
#commiting the query into db
connection.commit()
print("Successful")
connection.close()