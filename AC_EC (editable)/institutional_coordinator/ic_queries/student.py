import pymysql,xlrd,sys
n=len(sys.argv)
header=[]
header_id={}
dept={'COMP':'1','IT':'2','EXTC':'3','ETRX':'4','MECH':'5'}
#database connection
connection = pymysql.connect(host="localhost", user="root", passwd="", database="ac_ec")
cursor = connection.cursor()
file=xlrd.open_workbook(sys.argv[-1])
data = file.sheet_by_index(0)
for y in range(0,data.ncols):
	header.append(data.cell(0,y).value.lower())
for x in range(1,n-1):
	header_id[sys.argv[x].lower()]=header.index(sys.argv[x].lower())

insert="""INSERT into student(email_id,rollno,fname,mname,lname,year_of_admission,dept_id,current_sem,form_filled) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s);"""
for x in range (1,data.nrows):
	email=data.cell(x,header_id[sys.argv[7].lower()]).value
	#print(email)
	rollno=data.cell(x,header_id[sys.argv[8].lower()]).value
	#print(rollno)
	fname=data.cell(x,header_id[sys.argv[1].lower()]).value
	#print(fname)
	mname=data.cell(x,header_id[sys.argv[3].lower()]).value
	#print(mname)
	lname=data.cell(x,header_id[sys.argv[2].lower()]).value
	#print(lname)
	year_of_admission=data.cell(x,header_id[sys.argv[5].lower()]).value
	#print(year_of_admission)
	dept=data.cell(x,header_id[sys.argv[6].lower()]).value
	#print(dept)
	current_sem=data.cell(x,header_id[sys.argv[4].lower()]).value
	#print(current_sem)
	values=(email,rollno,fname,mname,lname,year_of_admission,dept,current_sem,'0')
	#executing query
	cursor.execute(insert,values)

print("executed query")
#commiting the query into db
connection.commit()
print("query commited")
connection.close()