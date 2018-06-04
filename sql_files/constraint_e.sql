/*Q2 */
Create or Replace Function RentRaise( p_rent in Lease_Agreement.rent_amt%type)
RETURN NUMBER 
IS
l_rent Lease_Agreement.rent_amt%type;
l_increase Lease_Agreement.rent_amt%type;
l_cnt Integer;

BEGIN
	Select rent_amt into l_rent from Lease_Agreement
	where rent_amt = l_rent 
	group by rental_num having count(*) > 1;
	
	Select 


salary into l_salary from AlphaCoEmp where upper(name) = upper(p_name);
	l_raise := l_salary * (percentRaise/100);

	Select count(*) into l_cnt from Emp_Work
	where upper(name) = upper(p_name);

	if l_cnt >= 1 THEN
		l_raise := l_raise + 1000;
	End IF;
	return l_raise;
END;
/
Show Errors;



CREATE Or Replace TRIGGER increaserent_trig
	AFTER INSERT OR UPDATE ON Lease_Agreement
	FOR EACH ROW
	BEGIN
		UPDATE Lease_Agreement
		SET rent_amt = rent_amt * 1.1,
		deposit_amt = deposit_amt * 1.1 
		WHERE rent_amt = :new.rent_amt
		AND deposit_amt = :new.deposit_amt
		AND rental_num = (SELECT rental_num 
		FROM Lease_Agreement
                GROUP BY rental_num HAVING count(*) > 1);
	END;	
/
Show errors;
