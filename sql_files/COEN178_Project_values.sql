/*Insert into Branch*/
Insert into Branch values('b0112', '2284571234', 
	'123 Marsh Dr.', 'SJ', '34678');
Insert into Branch values('b1111', '4086667712', 
	'666 Devil Ln', 'SF', '45673');

/*Insert into Employee*/
Insert into Employee values('a2345', 'Sandy', '4081234567', 
	'Manager');
Insert into Employee values('b2345', 'Anna', '4569013456', 
	'Supervisor');
Insert into Employee values('c3456', 'Darren', '7008009000',
	'Supervisor');
Insert into Employee values('d8885', 'Jim', '6430976709',
	'Manager');
Insert into Employee values('d1136', 'Rita', '6530869911',
	'Supervisor');

/*Insert into Manager*/
Insert into Manager values('a2345', 'b0112');
Insert into Manager values('d8885', 'b1111');

/*Insert into Supervisor*/
Insert into Supervisor values('b2345', 'a2345');
Insert into Supervisor values('c3456', 'a2345');
Insert into Supervisor values('d1136', 'd8885');

/*Insert into Property Owner*/
Insert into Property_Owner values('Johnny', '5106786789', 
	'456 Jello Rd', 'FMT', '12345');
Insert into Property_Owner values('Samuel', '4089915467', 
	'45 Icy St', 'NY', '67836');
Insert into Property_Owner values('Katherine', '2225679901',
	'2208 Creamy Ct', 'NY', '67836');
Insert into Property_Owner values('Rose', '4567938001', 
	'3 Twix Terrace', 'BKNY', '88951');
Insert into Property_Owner values('Alex', '5671110009',
	'990 Sushi St','BKNY', '88951');
Insert into Property_Owner values('Chelsea', '6507902213',
	'764 Apple Dr', 'LA', '76401');
Insert into Property_Owner values('Ariana', '7682229997',
	'648 Banana Ct', 'SF', '68976');

/*Insert into Rental_property*/
Insert into Rental_Property values(13, 1, '345 Sunny St.', 
	'SJ', '34678', 3, 450.3, TO_DATE('2018-03-23','YY-MM-DD'),
	'5106786789', 'b2345');
Insert into Rental_Property values(15, 0, '105 Eggy Dr.', 
	'LA', '56709', 4, 560.1, TO_DATE('2018-05-19','YY-MM-DD'), 
	'4089915467', 'b2345');
Insert into Rental_Property values(2, 1, '789 Bunny Ln', 'SC',
	'98051', 2, 320.56, TO_DATE('2018-06-28','YY-MM-DD'),
	'5106786789', 'c3456');
Insert into Rental_Property values(14, 1, '23 Cake Rd', 'SJ',
	'34678', 1, 100.0, TO_DATE('2018-03-23','YY-MM-DD'),
	'4089915467', 'b2345');
Insert into Rental_Property values(10, 0, '46 Truffle Ct', 
	'LA', '56709', 6, 900.70, TO_DATE('2018-07-01','YY-MM-DD'), 
	'2225679901', 'c3456'); 
Insert into Rental_Property values(1, 0, '106 Kitkat Ct', 
	'BKNY', '88951', 2, 400.8, TO_DATE('2018-07-14','YY-MM-DD'), 
	'4567938001', 'd1136'); 
Insert into Rental_Property values(5, 1, '33 Skittle Rd', 
	'BKNY', '88951', 9, 999.99, TO_DATE('2020-01-01','YY-MM-DD'), 
	'5671110009', 'd1136'); 
Insert into Rental_Property values(9, 0, '556 M&M Ln', 'BKNY', 
	'88951', 2, 250.5, TO_DATE('2021-01-01','YY-MM-DD'),
	'4567938001', 'd1136');
Insert into Rental_Property values(10, 1, '90 Mochi St', 
	'BKNY', '88951', 4, 760.2, TO_DATE('2018-02-20','YY-MM-DD'),
	'4567938001', 'd1136');
Insert into Rental_Property values(8, 0, '210 Pasta Place',
	'BKNY', '88951', 2, 210.9, TO_DATE('2021-01-01','YY-MM-DD'),
	'4567938001', 'd1136');
Insert into Rental_Property values(6, 0, '18 Vanilla Dr',
	'BKNY', '88951', 2, 190.8, TO_DATE('2018-06-15','YY-MM-DD'),
	'2225679901','d1136');
Insert into Rental_Property values(7, 0, '666 Orange Dr',
	'BKNY', '88951', 4, 472.5, TO_DATE('2018-07-22','YY-MM-DD'),
	'6507902213', 'd1136');
Insert into Rental_Property values(4, 1, '436 Pear Place',
	'LA', '67864', 3, 301.6, TO_DATE('2018-06-01','YY-MM-DD'),
	'7682229997', 'c3456');
Insert into Rental_Property values(21, 1, '740 Coconut Ct',
	'LA', '67864', 6, 999.0, TO_DATE('2018-06-01','YY-MM-DD'),
	'7682229997', 'c3456');
Insert into Rental_Property values(19, 1, '157 Rice Rd', 'LA',
	'67864', 2, 350.5, TO_DATE('2018-06-01','YY-MM-DD'),
	'7682229997', 'b2345');


/*Insert into Renter*/
Insert into Renter values('Andy', '3457329087', '2405409801');
Insert into Renter values('Annie', '6439018760', '2345970009');
Insert into Renter values('Albert', '6782002222', '5449008721');
Insert into Renter values('Anakin', '6439018760', '123986003');
Insert into Renter values('Allen', '4679007895', '4327785567');

/*Insert into Lease_Agreement */
Insert into Lease_Agreement values(15, '2405409801',  
	TO_DATE('2018-05-19','YY-MM-DD'),  TO_DATE('2019-04-29',
	'YY-MM-DD'), 560.1, 560.1, 'Anna');
Insert into Lease_Agreement values(2, '2405409801', 
	TO_DATE('2012-04-20','YY-MM-DD'), TO_DATE('2013-03-19',
	'YY-MM-DD'), 320.56, 320.56, 'Darren');
Insert into Lease_Agreement values(8, '2405409801',
	TO_DATE('2013-03-20','YY-MM-DD'), TO_DATE('2014-01-01',
	'YY-MM-DD'), 210.9, 210.9, 'Rita');
Insert into Lease_Agreement values(8, '4327785567',
	TO_DATE('2015-01-10','YY-MM-DD'), TO_DATE('2015-09-01',
	'YY-MM-DD'), 210.9, 210.9, 'Rita');
Insert into Lease_Agreement values(8, '5449008721',
	TO_DATE('2016-01-01','YY-MM-DD'), TO_DATE('2016-12-30',
	'YY-MM-DD'), 210.9, 210.9, 'Rita');
Insert into Lease_Agreement values(10, '2345970009', 
	TO_DATE('2014-09-30','YY-MM-DD'), 
	TO_DATE('2015-07-01','YY-MM-DD'), 900.7, 900.7, 'Rita');
Insert into Lease_Agreement values(9, '5449008721', 
	TO_DATE('2009-01-01','YY-MM-DD'),  TO_DATE('2009-09-01',
	'YY-MM-DD'), 250.5, 250.5, 'Rita');
Insert into Lease_Agreement values(6, '5449008721',
	 TO_DATE('2018-01-01','YY-MM-DD'), TO_DATE('2018-06-15',
	 'YY-MM-DD'), 190.8, 190.8, 'Rita');
Insert into Lease_Agreement values(7, '123986003',
	TO_DATE('2017-05-31','YY-MM-DD'),  TO_DATE('2018-03-22',
	'YY-MM-DD'), 472.5, 472.5, 'Rita');

