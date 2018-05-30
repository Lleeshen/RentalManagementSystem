<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HappyRenter - New Agreement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"> </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"> </script>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3 class="display-3"> HappyRenter's Rental Management Inc. </h3>
            <br />
            <p> We manage rental properties for land owners and renters. </p>
        </div>
    </div>
    <div class="container">
        <h4 class="display-4"> Make a new agreement </h4>
        <form method="post" action="#">
            <div class="form-group">
                <label for="rent_num"> Rental Property number </label>
                <input type="number" class="form-control" id="rent_num" name="rentNum" required/>
            </div>
            <div class="form-group">
                <label for="renter_phone"> Renter's Work Phone </label>
                <input type="text" class="form-control" id="renter_phone" name="renterPhone" required/>
            </div>
            <div class="form-group">
                <label for="start_date"> Starting day of Lease </label>
                <input type="date" class="form-control" id="start_date" name="startDate" required/>
            </div>
            <div class="form-gorup">
                <label for="end_date"> Ending day of Lease </label>
                <input type="date" class="form-control" id="end_date" name="endDate" required/>
            </div>
            <br />
            <div class="form-group">
                <label for="deposit"> Deposit Amount </label>
                <input type="text" class="form-control" id="deposit" name="deposit" required/>
            </div>
            <div class="form-group">
                <label for="rent"> Monthly Rent </label>
                <input type="text" class="form-control" id="rent" name="rent" required/>
            </div>
            <div class="form-group">
                <label for="sup_name"> Supervisor Name </label>
                <input type="text" class="form-control" id="sup_name" name="sName" required/>
            </div>
            <br />
            <button type="submit" class="btn btn-primary"> Insert </button>
        </form>
    </div>
    <br />
    <div class="container">
    <?php
        $conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
        if(!$conn) {
            $e = oci_error;
            print "<br> connection failed:";
            print htmlentities($e['message']);
            exit;
        )
        if(!empty($_POST)) {
            $rentalNum = $_POST['rentNum'];
            $RenterPhone = $_POST['renterPhone'];
            /*
             *  Date is in yyyy-mm-dd format
             */
            $startDate = TO_DATE($_POST['startDate'], 'yyyy-mm-dd');
            $endDate = TO_DATE($_POST['endDate'], 'yyyy-mm-dd');
            $deposit = $_POST['deposit'];
            $rent = $_POST['rent'];
            $sup_name = $_POST['sName'];
            $sql = "INSERT INTO VALUES (:rNum, :rPhone, :sDate, :eDate, :dpt, :rent, :sname)";
            $query = oci_parse($conn, $sql);
            oci_bind_by_name($query, ':rNum', $rentalNum);
            oci_bind_by_name($query, ':rPhone', $RenterPhone);
            oci_bind_by_name($query, ':sDatei', $startDate);
            oci_bind_by_name($query, 'eDate', $endDate);
            oci_bind_by_name($query, 'dpt', $deposit);
            oci_bind_by_name($query, 'rent', $rent);
            oci_bind_by_name($query, 'sname',$sup_name);
            if(oci_execute($query)) {
                echo "Lease Agreement Successfully Created.";
            }
        }
        //Insert if received input, display message if successful
    ?>
    </div>
    <br />
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <p> Thank you for visiting HappyRenter!</p>
            <a href="..">Return to Home Page</a>
        </div>
    </div>
</body>
</html>
