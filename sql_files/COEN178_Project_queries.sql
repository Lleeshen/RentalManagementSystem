/*1) Generate list of rental properties available for a specific 
branch along with the manager's name*/
SELECT rental_num, Street, City, Zip, name
FROM Rental_Property, Employee
WHERE Rental_Property.empId IN (Select empId From Supervisor
Where managerId = (Select empid from Manager
where branchId = (user input))) --put what user inputted here 
AND Rental_Property.empId = Employee.empId
AND status = "available";

/*2) Generate list of supervisors and the properties (with addr)
they supervise */
SELECT Supervisor.empId, rental_num, Street, City, Zip
FROM Rental_Property, Supervisor
WHERE Supervisor.empId = Rental_Property.empId;

/*3) Generate a list of rental properties by a specific owner, 
listed in a happyRenter’s branch*/ 
SELECT rental_num, Street, City, Zip 
FROM Rental_Property 
WHERE owner_phone = (Select phone from Property_Owner where
	name = (user input));

/*4) Show  a  listing  of  properties  available,  where  the  
properties  should  satisfy  the  criteria (city, no of rooms 
and/or range for rent given as input). */
SELECT rental_num, start_date_of_availibility
FROM Rental_Property
WHERE city = 'SJ' AND num_rooms = 3 --user input
AND monthly_rent < 500 AND monthly_rent > 300; -- min and max rent

/*5) Show the number of properties available for rent. */ 
SELECT count(*) AS Available_Property
FROM Rental_Property
WHERE status = "available"; 

/*6) Create  a  lease  agreement  (See  section  1.1).  The  
information  to  be  entered  into  this agreement  can  be  
input  via  a  Graphical  User  interface  (See  section  2.1)  
or  from  the command line. */

/*7) Show a lease agreement for a renter.*/ 
SELECT * FROM Lease_Agreement, Renter
WHERE renter_wphone = work_phone AND
renter_wphone = (user input);

/*8) Show the renters who rented more than one rental property.*/
SELECT * FROM Renter 
WHERE work_phone IN (Select distinct renter_wphone 
	from Lease_Agreement
	group by renter_wphone having count(*) > 1);
/*9) Show  the  average  rent  for  properties  in  a  town  
(name of  the  town  is  entered  as  input). You can take the
 average of all the properties that are rented out (in that 
 town) and those available for rent in that town. */
 SELECT Avg(monthly_rent) AS Average_Rent
 FROM Rental_Property 
 WHERE City = (user input) AND status = "available"; 

 /*10) Show the names and addresses of properties whose leases 
 will expire in next two months (from the current date). */
  SELECT Rental_Property.rental_num, Street, City, Zip, end_date
 FROM Rental_Property, Lease_Agreement
 where Rental_Property.rental_num = Lease_Agreement.rental_num
 AND end_date <= trunc(SYSDATE + 60)
 AND end_date >= trunc(SYSDATE);
