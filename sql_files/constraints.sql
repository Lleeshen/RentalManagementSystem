/*
CREATE OR REPLACE TRIGGER LeaseAgreementLength
AFTER INSERT OR UPDATE ON Lease_Agreement
FOR EACH ROW
DECLARE
    DayDiff INTEGER;
BEGIN
    DayDiff := :new.end_date - :new.start_date;
    IF (DayDiff < 180 OR DayDiff > 366)
THEN
    ROLLBACK;
END IF;
END;
/
*/
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

/*
insert into lease_agreement values (7,'2405409801',TO_DATE('2018-01-01','YY-MM-DD'),TO_DATE('2018-07-01','YY-MM-DD'),200,300,'Anna');
*/
