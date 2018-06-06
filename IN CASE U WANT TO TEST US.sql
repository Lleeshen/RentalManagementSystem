/*These are a compilation of SQL commands and sample values for your convenience if you intend to test our web application and
our promise of whether our operations truly perform as we said they would. 
The values provided are possible inputs you could provide in the form and will yield search results observable in the database.

Query 1: Generate list of rental properties available for a specific 
branch along with the manager's name. 
The following query will display all rental properties, each of the properties' statuses, and the employee ids of the supervisor*/
SELECT rental_num, Street, City, Zip, name, status, empid
FROM Rental_Property, Employee
WHERE Rental_Property.empId = Employee.empId
ORDER BY rental_num; 

--This next query will display which manager(the employeeid on the right) oversees which supervisors (employee id on the left)
SELECT * FROM Supervisor;

--Manager name and id with the branch he/she manages
SELECT Manager.empid, name, branchId
FROM Manager, Employee
WHERE Manager.empid = Employee.empid;


/*Now, input the following branchid to obtain the avaiable rental properties belonging to an existing branch:
  b0112 
 
 You may check the above tables to see if the rental properties above with Supervisor ids 
 were indeed the supervisors managed by the manager produced by this query
 
 Query 2: Does not require user input.
 
 Query 3: Generate a list of rental properties by a specific owner, 
listed in a HappyRenter’s branch.

The following query generates all rental properties, the phone of the owner listed as the second to last
parameter, called owner_phone.*/

SELECT * FROM Rental_Property;

/*use this owner phone number to generate the rental properties owned by the person.

  7682229997.
  
You may check in the above table whether the rental properties displayed below are listed with the phone number you entered.

Query 4: Show  a  listing  of  properties  available,  where  the  
properties  should  satisfy  the  criteria (city, no of rooms 
and/or range for rent given as input). 

SELECT * FROM Rental_Property WHERE status = 'available';

/* This gives you all available rental properties and entering:

  'SJ' for city, 3 for number of rooms, $300 & $500 for minimum and maximum rent values, respectively, 
  
You should get several results.

Query 5: No input necessary.

Query 6: Creating a new Lease Agreement

The following are values you may insert into a new lease agreement form on our web application.
You may insert anything, but the following values are certain to not violate any constraints.
10
2405409801
08-10-2018
03-20-2019
900.7
900.7
Rita

Query 7: Show a lease agreement for a renter.

The form takes in a renter phone number, and one possible renter number you could enter is:
  2405409801
  
Spoilers: This renter lived in several properties.

Query 8: No input needed 

Query 9: Show  the  average  rent  for  properties  in  a  town  
(name of  the  town  is  entered  as  input). You can take the
 average of all the properties that are rented out (in that 
 town) and those available for rent in that town. We are implementing the latter.
 
 A town with several available properties is :
    BKNY
    
 To validate that our average is correct, you may take the following query that displays the rents 
 of all available properties in BKNY, and you may find the average yourself.*/
 
 SELECT * FROM Rental_Property 
 WHERE City = 'BKNY';
 
 /*Query 10: No input needed. However, I must note that today is 6/6/18, as of now, there is one property that will
 expire within 2 months, on July 1st. Therefore, after July 1st, if you see no results, that is why. */



1) Show properties by branch: 

2) Owner's phone: 7682229997

9: BKNY

Show average rent: city : BKNY
3) Renter's work phone possibilities:
 
5449008721

