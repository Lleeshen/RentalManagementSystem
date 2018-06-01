/*1) Generate list of rental properties available for a specific 
branch along with the manager's name*/
SELECT rental_num, Street, City, Zip, name
FROM Rental_Property, Employee
WHERE Rental_Property.empId = (Select empId From Supervisor
Where managerId = (Select empid from Manager
where branchId = 'b0112')) --put what user inputted here 
AND Rental_Property.empId = Employee.empId
AND status = 1;

/*2) Generate list of supervisors and the properties (with addr)
they supervise */
SELECT Supervisor.empId, rental_num, Street, City, Zip 
FROM Rental_Property NATURAL JOIN Supervisor;

/*3) Generate a list of rental properties by a specific owner, 
listed in a happyRenter’s branch*/ 
SELECT rental_num, Street, City, Zip 
FROM Rental_Property 
WHERE owner_phone = (Select phone from Property_Owner where
	name = (user input));

/*4) Show  a  listing  of  properties  available,  where  the  
properties  should  satisfy  the  criteria (city, no of rooms 
and/or range for rent given as input). */
SELECT rental_num, start_date_of_availability
FROM Rental_Property
WHERE city = (user input) AND num_rooms = (user input)
AND monthly_rent IN (user input);

/*5) Show the number of properties available for rent. */ 
SELECT count(*)
FROM Rental_Property
WHERE status = 1; 

/*6) Create  a  lease  agreement  (See  section  1.1).  The  
information  to  be  entered  into  this agreement  can  be  
input  via  a  Graphical  User  interface  (See  section  2.1)  
or  from  the command line. */

/*7) Show a lease agreement for a renter. */ 
SELECT * FROM Lease_Agreement
WHERE renter_wphone = 
	(Select work_phone from Renter where name = (user input));

/*8) Show the renters who rented more than one rental property.*/
SELECT * FROM Renter 
WHERE work_phone IN (Select distinct renter_wphone 
	from Lease_Agreement
	group by renter_wphone having count(*) > 1);
/*9) Show  the  average  rent  for  properties  in  a  town  
(name of  the  town  is  entered  as  input). You can take the
 average of all the properties that are rented out (in that 
 town) and those available for rent in that town. */
 SELECT Avg(monthly_rent) 
 FROM Rental_Property 
 WHERE City = (user input) AND status = 1; 

 /*10) Show the names and addresses of properties whose leases 
 will expire in next two months (from the current date). */
 SELECT rental_num, Street, City, Zip 
 FROM Rental_Property
 WHERE rental_num = (Select rental_num From Lease_Agreement
 	Where (Select DATEDDIFF(month, CURRENT_DATE(), end_date)
 		From Lease_Agreement) < 2; 
