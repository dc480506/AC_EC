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
        "role":11,
        "host":12,
        "username_db":14,
        "password_db":16,
        "dbname":15,
        "file_location":13,
        
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
if len(sys.argv) != 17:
    end_col=4
else:
    passw=sys.argv[mapper['password_db']]
try:
    for x in range(startcol_index,len(sys.argv)-end_col):
        # print(sys.argv[x])
        header_id[sys.argv[x].lower()]=header.index(sys.argv[x].lower())
except Exception as e:
    # print(e)
    print(re.findall(r"'(.*?)'",str(e),)[0]+" is not a column in the uploaded sheet")
    sys.exit(0)
insert_faculty="""Insert into faculty(email_id,faculty_code,employee_id,fname,mname,lname,dept_id,post,added_by,timestamp,role) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s);"""
# print (insert_faculty)
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
        role=data.cell(x,header_id[sys.argv[mapper['role']].lower()]).value
        # print(role)
        values=(email,fcode,eid,fname,mname,lname,dept_id,post,added,timestamp,role)
        try:
            cursor.execute(insert_faculty,values)
        except Exception as e:
            if "Duplicate entry" in str(e):
                print("Email: "+email+" Short name: "+str(fcode)+" Employee id: "+str(int(eid))+" Department id: "+str(int(dept_id))+" has duplicate entry.")
            elif "foreign key constraint fails" in str(e):
                print("Department id: "+str(int(dept_id))+ "does not exist/(if present, wrong value) in the table.")
            print("The upload was unsuccessful.")
            print(values)
            # print(e)
            sys.exit(0)
except Exception as e:
    print(str(e))
    sys.exit(0)
connection.commit()
print("Successful")
connection.close()