import pymysql,xlrd,sys,re
mapper={
        "added":1,
        "timestamp":2,
        "fname_col":3,
        "mname_col":4,
        "lname_col":5,
        "eid_col":6,
        "fcode_col":7,
        "email_col":8,
        "department_col":9,
        "post_col":10,
        "host":11,
        "username_db":13,
        "password_db":15,
        "dbname":14,
        "file_location":12,
       }
header=[]
header_id={}
end_col=5
startcol_index=3
passw=""
file=xlrd.open_workbook(sys.argv[mapper['file_location']])
data = file.sheet_by_index(0)
for y in range(0,data.ncols):
    header.append(data.cell(0,y).value.lower())
# print(header)
if len(sys.argv) != 16:
    end_col=4
else:
    passw=sys.argv[mapper['password_db']]
try:
    for x in range(startcol_index,len(sys.argv)-end_col):
        # print(sys.argv[x])
        header_id[sys.argv[x].lower()]=header.index(sys.argv[x].lower())
except Exception as e:
    print(re.findall(r"'(.*?)'",str(e),)[0]+" is not a column in the uploaded sheet")
    sys.exit(0)
insert_faculty="""Insert into faculty(email_id,faculty_code,fname,mname,lname,employee_id,dept_id,post,added_by,timestamp) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);"""
connection = pymysql.connect(host=sys.argv[mapper['host']], 
                            user=sys.argv[mapper['username_db']],
                            passwd=passw,
                            database=sys.argv[mapper['dbname']])
cursor = connection.cursor()
timestamp=sys.argv[mapper['timestamp']]
added=sys.argv[mapper['added']]
try:
    for x in range(1,data.nrows):
        # print(header_id[sys.argv[mapper['cid_col']]])
        fname=data.cell(x,header_id[sys.argv[mapper['fname_col']].lower()]).value
        # print(fname)
        mname=data.cell(x,header_id[sys.argv[mapper['mname_col']].lower()]).value
        # print(mname)
        lname=data.cell(x,header_id[sys.argv[mapper['lname_col']].lower()]).value
        # print(lname)
        eid=data.cell(x,header_id[sys.argv[mapper['eid_col']].lower()]).value
        # print(eid)
        fcode=data.cell(x,header_id[sys.argv[mapper['fcode_col']].lower()]).value
        # print(fcode)
        email=data.cell(x,header_id[sys.argv[mapper['email_col']].lower()]).value
        # print(email)
        dept_id=data.cell(x,header_id[sys.argv[mapper['department_col']].lower()]).value
        # print(dept_id)
        post=data.cell(x,header_id[sys.argv[mapper['post_col']].lower()]).value
        # print(post)
        values=(email,fcode,fname,mname,lname,eid,dept_id,post,added,timestamp)
        cursor.execute(insert_faculty,values)
except Exception as e:
    print(str(e))
    sys.exit(0)
connection.commit()
print("Successful")
connection.close()