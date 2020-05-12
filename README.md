# REST_API
rest api with with CRUD operation using various methods like GET, POST,DELETE etc.

step 1: please open the xamp server and create a database named = 'vaibhav'

step 2: after creating database import the student.sql file provide in this folder(freastal) 
        in the import section of phpmyadmin.

'''''''''"""the api is ready for use""''''''''''

step 3: open postman 

step 4: run the following tests

----------------------------------test for GET request (FETCH  STUDENT DATA---------------------------------------------

set the method = get and url = 'http://localhost/freastal/read.php' and send
this will provide all the entries in the table studentinfo.

----------------------------------test for GET request single object (FETCH STUDENT DATA)--------------------------------

set the method = get and url = 'http://localhost/freastal/read_single.php?id=1' and send
this will provide a single object(row) in the table studentinfo.
we can change the id to get diffrent object.


------------------------------------test for POST request (SAVE STUDENT DATA) ---------------------------------------

set method = POST and url = 'http://localhost/freastal/create.php' and 
in header add key = 'Content-Type' and value = 'application/json' and
in body go to raw add a JSON object like 
{
	"name": "rohinish",
	"age":"21",
	"std":"11"
}
and then send this will add object in the database.


---------------------------------------test for POST request (EDIT STUDENT DATA) --------------------------------------

set method = POST and url = 'http://localhost/freastal/update.php' and 
in header add key = 'Content-Type' and value = 'application/json' and
in body go to raw add a JSON object like 
{
	"name": "rohinish",
	"age":"21",
	"std":"11",
	"id":"5"
}
and then send this will update object in the database on the basis of given id.


----------------------------------------test for DELETE request (DELETE STUDENT DATA) ----------------------------------

set method = DELETE and url = 'http://localhost/freastal/delete.php' and 
in header add key = 'Content-Type' and value = 'application/json' and
in body go to raw add a JSON object like 
{
	"id":"5"
}
and then send this will delete object in the database on the basis of the given id
