<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>HappyRenter - Home</title>
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
            <h4 class="display-4"> We have many operations to help you </h4>
            <p> 
                Are you a new property owner, or a new renter? Choose the option to get registered. <br />
                Are you already an owner or renter? There is also an option to create an agreement.
            </p>
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    Choose item to insert
                </button>
                <div class="dropdown-menu">
                    <!-- Will need links to forms to insert only those things -->
                    <a class="dropdown-item" href="InsertPropOwner">Get registered as property owner</a>
                    <a class="dropdown-item" href="InsertRenter">Get registered as renter</a>
                    <a class="dropdown-item" href="InsertLeaseAgreement">Make a lease agreement</a>
                </div>
            </div>
            <br /> 
            <p>
                Want information about properties?
                Choose your desired operation.
            </p>
            <!-- Links to this page -->
            <form method="post" action="#">
                <div class="form-group">
                    <label for="action"> Select operation </label>
                    <select class="form-control" id="action" name="oplist">
                        <option id="op1"> Show availible properties </option>
                        <option id="op2"> Show Lease Agreements expiring soon </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Do this action! </button>
            </form>
        </div>
        <?php
            $conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
            if(!$conn) {
                $e = oci_error();
                print "<br> connection failed:";
                print htmlentities($e['message']);
                exit;
            }
            //Show Table operations
            oci_close($conn);
        ?>
    </body>   
</html>

