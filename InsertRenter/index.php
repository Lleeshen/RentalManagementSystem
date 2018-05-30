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
        <h4 class="display-4"> Get registered as a Renter </h4>
        <form method="post" action="#">
            <div class="form-group">
                <label for="name"> Your name </label>
                <input type="text" class="form-control" id="name" name="name" required/>
            </div>
            <div class="form-group">
                <label for="w_phone"> Renter's Work Phone </label>
                <input type="text" class="form-control" id="w_phone" name="wPhone" required/>
            </div>
            <div class="form-group">
                <label for="h_phone"> Renter's Home Phone </label>
                <input type="text" class="form-control" id="h_phone" name="hPhone"/>
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
            $name = $_POST['name'];
            $workPhone = $_POST['wPhone'];
            $homePhone = $_POST['hPhone'];
            $sql = "INSERT INTO VALUES (:name, :wNum, :hNum)";
            $query = oci_parse($conn, $sql);
            oci_bind_by_name($query, ':name', $name);
            oci_bind_by_name($query, ':wNum', $workPhone);
            oci_bind_by_name($query, ':hNum', $homePhone);
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
