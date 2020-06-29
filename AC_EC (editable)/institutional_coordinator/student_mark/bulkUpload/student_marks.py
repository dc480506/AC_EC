import pymysql,xlrd,sys,re
mapper={
		"sem":0,
		"year":1,
		"insert_by":2,
		"insert_col_name":3,
        "marks":4,
        "file_location":5,
        "host":6,
        "username":7,
        "password":8,
        "dbname":9,
        }
header=[]
header_id={}
start_col=3
argument=list(map(str.strip, sys.argv[1].strip('[]').split(',')))
n=len(argument)
class Gpaoutofbounds(Exception):
	pass
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
if argument[mapper['insert_by']]=='rollno':
	insert="""INSERT into student_marks(email_id,rollno,sem,year,gpa) SELECT email_id,%s,%s,%s,%s FROM student WHERE rollno=%s;"""
elif argument[mapper['insert_by']]=='email_id':
	insert="""INSERT into student_marks(email_id,rollno,sem,year,gpa) SELECT %s,rollno,%s,%s,%s FROM student WHERE email_id=%s;"""
sem=argument[mapper['sem']]
year=argument[mapper['year']]
try:
	for x in range (1,data.nrows):
		insert_col_name=data.cell(x,header_id[argument[mapper['insert_col_name']].lower()]).value
		#print(email)
		marks=data.cell(x,header_id[argument[mapper['marks']].lower()]).value
		try:
			if float(marks)>10.00:
				raise Gpaoutofbounds
				break
		except Gpaoutofbounds:
			print('Gpa of student '+insert_col_name+' is '+str(marks)+' which is greater than 10')
			sys.exit(0)
		#print(rollno)
		values=(insert_col_name,sem,year,marks,insert_col_name)
		#executing query
		try:
			cursor.execute(insert,values)
		except Exception as e:
			if "foreign key constraint fails" in str(e):
				print(argument[mapper['insert_by']]+": "+str(insert_col_name)+" is not/(if present, wrong) in student table.")
			elif "Duplicate entry" in str(e):
				print(argument[mapper['insert_by']]+": "+str(insert_col_name)+" has a duplicate value.")
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