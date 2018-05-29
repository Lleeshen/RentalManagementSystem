/* Branch(branchId, phone, address) */
CREATE TABLE Branch (
    branchId VARCHAR(5),
    Phone VARCHAR(15),
    /* Address is Street, City, Zip */
    Street VARCHAR(15),
    City VARCHAR(10),
    Zip VARCHAR(10)
)

/* Employee(empId, name, phone, job_designation) */
CREATE TABLE Employee (
    empId VARCHAR(5),
    name VARCHAR(10),
    phone VARCHAR(15),
    job_designation VARCHAR(15)
);
