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
        <h4 class="display-4"> Register as Property Owner </h4>
        <form method="post" action="#">
            <div class="form-group">
                <label for="name"> Name </label>
                <input type="text" class="form-control" id="name" name="Name" required/>
            </div>
            <div class="form-group">
                <label for="phone"> Phone </label>
                <input type="text" class="form-control" id="phone" name="Phone" required/>
            </div>
            <fieldset>
            <legend> Address  </legend>
            <div class="form-group">
                <label for="street"> Street </label>
                <input type="text" class="form-control" id="street" name="Street" required/>
            </div>
            <div class="form-gorup">
                <label for="city"> City </label>
                <input type="text" class="form-control" id="city" name="City" required/>
            </div>
            <br />
            <div class="form-group">
                <label for="zip"> Zip Code </label>
                <input type="text" class="form-control" id="zip" name="Zip" required/>
            </div>
            </fieldset>
            <br />
            <button type="submit" class="btn btn-primary"> Insert </button>
        </form>
    </div>
    <br />
    <div class="container">
    <p>
    <?php
        if(!empty($_POST)) {
            $Name = $_POST['Name'];
            $Phone = $_POST['Phone'];
            $Street = $_POST['Street'];
            $City = $_POST['City'];
            $Zip = $_POST['Zip'];
            $conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
            if(!$conn) {
                $e = oci_error;
                print "<br> connection failed:";
                print htmlentities($e['message']);
                exit;
            }
            $sql = "INSERT INTO Property_Owner VALUES (:name, :phone, :street, :city, :zip)";
            $query = oci_parse($conn, $sql);
            oci_bind_by_name($query, ':name', $Name);
            oci_bind_by_name($query, ':phone', $Phone);
            oci_bind_by_name($query, ':street', $Street);
            oci_bind_by_name($query, ':city', $City);
            oci_bind_by_name($query, ':zip', $Zip);
            if(oci_execute($query)) {
                echo "Property Owner Successfully Registered.";
            }
        }
        //Insert if received input, display message if successful
    ?>
    </p>
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
