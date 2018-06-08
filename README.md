# RentalManagementSystem
By Lyman Shen and Felicia Kuan. 

This is a web application we collaborated on to complete for our Database Systems (COEN 178) final project. 

The objective was to both design and implement a web application called "Happy Renter's Rental Management INC" that manages rental properties on behalf of the clients. It is a DBMS meant to assist a rental manager in keeping track of rental properties and lease agreements. (Therefore, we are technically not disclosing the personal information of our theoretical customers through our display of customer information because this application is meant only for the internal managers and other authorized users of the Rental Management INC.) The assignment was assigned by Professor Rani Mikkileni of Santa Clara University. 

Basic properties: each rental property managed by Happy Renter's is managed by one supervisor, and the database keeps track of the original property owner, current renter, supervisor, address of the rental property, number of rooms, monthly rent, and status that can be "available" or "leased." Basic information on the property owner is also stored in the database, as well as the rental property's start date of availability. 

Basic features and capabilities of the application: Given the user criteria, a list of available rental properties fulfilling those criteria is generated. Users can also search for renters who rented more than one rental property and the average rent for properties in the town, with the town entered as input. Additionally, users are able to search for properties that will expire in the next two months and create a lease agreement using a GUI, which is the web application created by the hardworking Lyman Shen. 

Note: The lease agreement form operates under the assumption that appropriate profiles for renters and property owners were created, and rental properties were registered, prior to attempting to create a new lease agreement. Without completeing the previous tasks, the lease agreement would not successfully be created.

As a precaution to ensure the accuracy and integrity of our data, we enforced the following constraints to prevent users from randomly input data: Lease agreements must be made for a minimum of 6 months and a maximum of a year. We made sure to update our records and change the status of a property to "leased" once a lease agreement for that property has been made. A rental property is removed from a supervisor's list of rental properties once the owner decides not to rent the property out anymore. The rent of a property is increased by 10% with every new lease on the same property.

We used HTML to create the web page and PHP to link our webpage to our Oracle database. An active and running web application as of 6/7/18 is found at: http://www.linux.students.scu.edu/~lshen/RentalManagementSystem

Thank you for reading until the end of our README! :)
