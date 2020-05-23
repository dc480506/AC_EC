import pymysql,xlrd,sys,re
# print(sys.argv[1])
args=list(map(str.strip, sys.argv[1].strip('[]').split(',')))
mapper={"sem":0,
        "year":1,
        "email_id":2,
        "timestamp":3,
        "cname_col":4,
        "cid_col":5,
        "floating_dept_col":6,
        "min_col":7,
        "max_col":8,
        "applicable_dept_col":9,
        "file_location":10,
        "host":11,
        "username_db":12,
        "password_db":13,
        "dbname":14,
       }
startcol_index=4
header=[]
header_id={}
# print(args)
file=xlrd.open_workbook(args[mapper['file_location']])
data = file.sheet_by_index(0)
for y in range(0,data.ncols):
	header.append(data.cell(0,y).value.lower())
# print(header)
try:
    for x in range(startcol_index,len(args)-5):
        # print(args[x])
        header_id[args[x].lower()]=header.index(args[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'",str(e),)[0]+" is not a column in the uploaded sheet")
    sys.exit(0)
# print(header_id) #VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)
connection = pymysql.connect(host=args[mapper['host']], 
                            user=args[mapper['username_db']],
                            passwd=args[mapper['password_db']],
                            database=args[mapper['dbname']])
cursor = connection.cursor()
insert_audit="""INSERT INTO audit_course(cid,sem,year,cname,dept_id,min,max,email_id,timestamp,currently_active) VALUES """    
# print(header_id)
insert_audit_applicable="""INSERT INTO audit_course_applicable_dept VALUES """
sem=args[mapper['sem']]
# print(sem)
year=args[mapper['year']]
# print(year)
timestamp=args[mapper['timestamp']]
# print(timestamp)
email_id=args[mapper['email_id']]
# print(email_id)
try:
    for x in range(1,data.nrows):
        # print(header_id[args[mapper['cid_col']]])
        cid=data.cell(x,header_id[args[mapper['cid_col']].lower()]).value
        # print(cid)
        cname=data.cell(x,header_id[args[mapper['cname_col']].lower()]).value
        # print(cname)
        dept_id=data.cell(x,header_id[args[mapper['floating_dept_col']].lower()]).value
        # print(dept_id)
        min=data.cell(x,header_id[args[mapper['min_col']].lower()]).value
        # print(min)
        max=data.cell(x,header_id[args[mapper['max_col']].lower()]).value
        # print(max)
        values=(cid,sem,year,cname,dept_id,min,max,email_id,timestamp,0)
        audit_table_query=insert_audit + str(values)
        applicable_dept=list(map(str.strip,data.cell(x,header_id[args[mapper['applicable_dept_col']].lower()]).value.split(",")))
        values=""
        for i in range(len(applicable_dept)):
            values+="('{}','{}','{}','{}'),".format(cid,sem,year,applicable_dept[i])
        values=values[0:len(values)-1]
        audit_applicable_table_query=insert_audit_applicable +str(values)
        # print(audit_table_query)
        # print(audit_applicable_table_query)
        # print(values)
        cursor.execute(audit_table_query)
        cursor.execute(audit_applicable_table_query)
except Exception as e:
    print(str(e))
    sys.exit(0)
connection.commit()
print("Successful")


    
    
