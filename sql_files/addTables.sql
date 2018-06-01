/* Address is Street, City, Zip for all tables */

/* Branch(branchId, phone, address) */
CREATE TABLE Branch (
    branchId VARCHAR(5) PRIMARY KEY,
    Phone VARCHAR(15),
    Street VARCHAR(15),
    City VARCHAR(10),
    Zip VARCHAR(10)
);
/* Employee(empId, name, phone, job_designation) */
CREATE TABLE Employee (
    empId VARCHAR(5) PRIMARY KEY,
    name VARCHAR(10),
    phone VARCHAR(15),
    job_designation VARCHAR(15)
);

/* Manager(empId, branchId) */
CREATE TABLE Manager (
    empId VARCHAR(5) PRIMARY KEY,
    branchId VARCHAR(5),
    Foreign key (empid) references Employee(empid),
    Foreign key (branchid) references Branch(branchid)
);

/* Supervisor(empId managerId) */
CREATE TABLE Supervisor (
    empId VARCHAR(5) PRIMARY KEY,
    managerId VARCHAR(5),
    Foreign key (empid) references Employee(empid),
    Foreign key (managerid) references Manager(empid)
);

/* Property_Owner(name, permanent address, phone) */
CREATE TABLE Property_Owner (
    name VARCHAR(10),
    phone VARCHAR(15) PRIMARY KEY,
    Street VARCHAR(15),
    City VARCHAR(10),
    Zip VARCHAR(10)
);

/* Rental_Property(rental_num, owner, address, number of rooms, monthly rent, start date of availability, phonoe, supId) */
CREATE TABLE Rental_Property (
    rental_num INTEGER PRIMARY KEY,
    status INTEGER,
    Street VARCHAR(15),
    City VARCHAR(10),
    Zip VARCHAR(10),
    num_rooms INTEGER,
    monthly_rent NUMERIC(5,2),
    start_date_of_availibility DATE,
    owner_phone VARCHAR(15),
    empId VARCHAR(15), --Supervisor id
    Foreign key (owner_phone) references Property_Owner (phone),
    Foreign key (empId) references Supervisor (empid)
);
/* Renter(renter_name, home_phone, work_phone) */
CREATE TABLE Renter (
    name VARCHAR(10),
    home_phone VARCHAR(15),
    work_phone VARCHAR(15) PRIMARY KEY
);
/* Lease_Agreement(rental_num, start_lease_date, end_lease_date, renter_home_phone,
renter_work_phone, deposit_amt, rent_amt, supervisor_name) */
CREATE TABLE Lease_Agreement (
    rental_num INTEGER,
    renter_wphone VARCHAR(15),
    start_date DATE,
    end_date DATE,
    deposit_amt NUMERIC(5,2),
    rent_amt NUMERIC(5,2),
    sup_name VARCHAR(10),
    PRIMARY KEY (rental_num,start_date),
    Foreign Key (rental_num) references Rental_Property (rental_num),
    Foreign Key (renter_wphone) references Renter (work_phone)
);
