/* When  a  lease  agreement  is  created,  the  status  for  the  property  should  be  changed  to leased. */

CREATE OR REPLACE TRIGGER LeaseAgreementStatusUpdate
AFTER INSERT ON Lease_Agreement
FOR EACH ROW
BEGIN
    UPDATE Rental_Property
    SET status = 'leased'
    WHERE rental_num = :new.rental_num;
END;
/
show errors;

/* With  every  new  lease,  a  10%  increase  in  rent  should  be  added  to  the  rent  from  the previous lease. 
*/

CREATE Or Replace TRIGGER increaseRent
    FOR INSERT ON Lease_Agreement
        COMPOUND TRIGGER

    newRentalNum    INTEGER;
    newRentalDate   DATE;
    dateToChange    DATE;

    BEFORE EACH ROW IS
    BEGIN
        newRentalNum := :new.rental_num;
        newRentalDate:= :new.start_date;
        SELECT MAX(start_date)
        INTO dateToChange
        FROM Lease_Agreement
        WHERE rental_num = newRentalNum
            AND start_date < newRentalDate;
    END BEFORE EACH ROW;

    AFTER STATEMENT IS
    BEGIN
        UPDATE Lease_Agreement
        SET rent_amt = rent_amt * 1.1
        WHERE rental_num = newRentalNum AND start_date = dateToChange;
    END AFTER STATEMENT;
    
END increaseRent;
/
show errors;

/* Test wtih
Select * FROM Lease_Agreement;
INSERT INTO Lease_Agreement VALUES(8,'4327785567',TO_DATE('2018-03-01','YY-MM-DD'),TO_DATE('2018-10-01','YY-MM-DD'),200.0,300.0,'Anna');
SELECT * FROM Lease_Agreement
