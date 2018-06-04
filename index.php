<?php
echo '
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
        <script type="text/javascript">

function formCheck() {
    var x = document.getElementsByClassName("notAllOp");
    var i;
    for(i = 0; i < x.length; i++) {
        x[i].classList.add("d-none");
    }
    if(document.getElementById("op1").selected) {
        document.getElementById("forOp1").classList.remove("d-none");
    } else if(document.getElementById("op3").selected) {
        document.getElementById("forOp3").classList.remove("d-none");
    } else if(document.getElementById("op4").selected) {
        document.getElementById("forOp4").classList.remove("d-none");
    } else if(document.getElementById("op7").selected) {
        document.getElementById("forOp7").classList.remove("d-none");
    } else if(document.getElementById("op9").selected) {
        document.getElementById("forOp9").classList.remove("d-none");
    }
}

window.onload = formCheck;

        </script>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h3 class="display-3"> HappyRenter\'s Rental Management Inc. </h3>
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
            <form method="post" onclick="formCheck();" action="#">
                <div class="form-group">
                    <label for="action"> Select operation </label>
                    <select class="form-control" id="action" name="oplist">
                        <option id="op1" value="op1"
';
    if(!empty($_POST) && $_POST["oplist"] == "op1") {
        echo ' selected ';
    }
echo '
                            > List availible rental properties for a specific branch  </option>
                        <option id="op2" value="op2"
';
    if(!empty($_POST) && $_POST["oplist"] == "op2") {
        echo ' selected ';
    }
echo '
                        > List supervisor\'s and their properties</option>
                        <option id="op3" value="op3"
';
    if(!empty($_POST) && $_POST["oplist"] == "op3") {
        echo ' selected ';
    }
echo '
                         > List rental properties by an owner </option>
                        <option id="op4" value="op4"
';
    if(!empty($_POST) && $_POST["oplist"] == "op4") {
        echo ' selected ';
    }    
echo '
                        > List availible properties with conditions </option>
                        <option id="op5" value="op5"
';
    if(!empty($_POST) && $_POST["oplist"] == "op5") {
        echo ' selected ';
    }
echo '
                        > Show number of properties availible for rent </option>
                        <option id="op7" value="op7"
';
    if(!empty($_POST) && $_POST["oplist"] == "op7") {
        echo ' selected ';
    }
echo '
                        > Show a lease agreement for a renter </option>
                        <option id="op8" value="op8"
';
    if(!empty($_POST) && $_POST["oplist"] == "op8") {
        echo ' selected ';
    }
echo '
                        > Show renters who rented more than 1 property </option>
                        <option id="op9" value="op9"
';
    if(!empty($_POST) && $_POST["oplist"] == "op9") {
        echo ' selected ';
    }
echo '
                        > Show average rent of properties in a city </option>
                        <option id ="op10" value="op10"
';
    if(!empty($_POST) && $_POST["oplist"] == "op10"){
        echo ' selected ';
    }
echo '
                        > Show Lease Agreements expiring in the next 2 months </option>
                    </select>
                </div>
                <div id="forOp1" class="form-group notAllOp">
                    <label for="bId"> Branch Id </label>
                    <input type="text" class="form-control" id="bId" name="bId"
                    ';
if(!empty($_POST) && isset($_POST["oPhone"])) {
    echo "value = $_POST[bId]  ";
}
echo '              />
                </div>
                <div id="forOp3" class="form-group notAllOp">
                    <label for="oPhone"> Owner\'s phone </label>
                    <input type="text" class="form-control" id="oPhone" name="oPhone" 
';
if(!empty($_POST) && isset($_POST["oPhone"])) {
    echo "value = $_POST[oPhone]  ";
}
echo'
                        />
                </div>
                <div id="forOp4" class="notAllOp">
                    <div class="form-group">
                        <label for="pCity"> City </label>
                        <input type="text" class="form-control" id="pCity" name="pCity"
';
if(!empty($_POST) && isset($_POST["pCity"])) {
    echo "value = $_POST[pCity]  ";
}
echo '
                        />
                    </div>
                    <div class="form-group">
                        <label for="pRooms"> Number of Rooms </label>
                        <input type="text" class="form-control" id="pRooms" name="pRooms"
';
if(!empty($_POST) && isset($_POST["pRooms"])) {
    echo "value = $_POST[pRooms]  ";
}
echo'
                        />
                    </div>
                    <div class="form-group">
                        <label for="pMinRent"> Minimum Rent </label>
                        <input type="text" class="form-control" id="pMinRent" name="pMinRent"
';
if(!empty($_POST) && isset($_POST["pMinRent"])) {
    echo "value = $_POST[pMinRent]  ";
}
echo '
                        />
                    </div>
                    <div class="form-group">
                        <label for="pMaxRent"> Maximum Rent </label>
                        <input type="text" class="form-control" id="pMaxRent" name="pMaxRent"
';
if(!empty($_POST) && isset($_POST["pMaxRent"])) {
    echo "value = $_POST[pMaxRent]  ";
}
echo '
                        />
                    </div>
                </div>
                <div id="forOp7" class="form-group notAllOp">
                    <label for="rWPhone"> Renter\'s Work Phone </label>
                    <input type="text" class="form-control" id="rWPhone" name="rWPhone"
';
if(!empty($_POST) && isset($_POST["rWPhone"])) {
    echo "value = $_POST[rWPhone]  ";
}
echo '
                        />
                </div>
                <div id="forOp9" class="form-group notAllOp">
                    <label for="pCity"> City </label>
                    <input type="text" class="form-control" id="pCity" name="pCity"
';
    if(!empty($_POST) && isset($_POST["pCity"])) {
        echo "value = $_POST[pCity]";
    }
echo '
                    />
                </div>
                <button type="submit" class="btn btn-primary">Do this action! </button>
            </form>
        </div>
        <br /> <br />
';
            $conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
            if(!$conn) {
                $e = oci_error();
                print "<br> connection failed:";
                print htmlentities($e['message']);
                exit;
            }
            if(!empty($_POST)) {
                $sql_main = $_POST["oplist"];
                //Initiliaze variable to prevent error
                $numCol = 0;
                //Choose Table operations
                if($sql_main == "op1") {
                    // query 1 not working
                    $bId = $_POST["bId"];
                    $sql = "
                        SELECT rental_num, Street, City, Zip, name
                        FROM Rental_Property, Employee
                        WHERE Rental_Property.empId IN  (
                            Select empId 
                            From Supervisor
                            WHERE managerId = (
                                SELECT empid 
                                FROM Manager 
                                WHERE branchId = '$bId' 
                            )
                        ) 
                        AND Rental_Property.empId = Employee.empId
                        AND status = 1
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                } else  if ($sql_main == "op2") {
                    $sql = "
                        SELECT Supervisor.empId, rental_num, Street, City, Zip
                        FROM Rental_Property, Supervisor
                        WHERE Supervisor.empId = Rental_Property.empId
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                } else if ($sql_main == "op3") {
                    $oPhone = $_POST["oPhone"];
                    $sql = "
                        SELECT rental_num, Street, City, Zip 
                        FROM Rental_Property 
                        WHERE owner_phone = $oPhone
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                } else if ($sql_main == "op4") {
                    $pCity = $_POST["pCity"];
                    $pRooms = $_POST["pRooms"];
                    $minRent = $_POST["pMinRent"];
                    $maxRent = $_POST["pMaxRent"];
                    $sql = "
                        SELECT rental_num, start_date_of_availibility
                        FROM Rental_Property
                        WHERE city = '$pCity' AND num_rooms = $pRooms
                        AND monthly_rent < ' $maxRent' AND monthly_rent > $minRent
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                } else if ($sql_main == "op5") {
                    $sql = "
                        SELECT COUNT(*)
                        FROM Rental_Property
                        WHERE status = 1
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                } else if ($sql_main == "op7") {
                    $rPhone = $_POST["rWPhone"];
                    $sql = "
                        SELECT * 
                        FROM Lease_Agreement
                        WHERE renter_wphone = $rPhone
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                } else if ($sql_main == "op8") {
                    $sql = "
                        SELECT *
                        FROM Renter
                        WHERE work_phone IN (
                            SELECT DISTINCT renter_wphone
                            FROM Lease_Agreement
                            GROUP BY renter_wphone
                            HAVING COUNT(*) > 1
                        )
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                } else if ($sql_main == "op9") {
                    $city = $_POST["pCity"];
                    $sql = "
                        SELECT AVG(monthly_rent)
                        FROM Rental_Property
                        WHERE city = '$city' AND status = 1
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                } else if ($sql_main == "op10") {
                    $sql = "
                        SELECT Rental_Property.rental_num, Street, City, Zip, end_date
                        FROM Rental_Property, Lease_Agreement
                        WHERE Rental_Property.rental_num = Lease_Agreement.rental_num
                        AND end_date <= trunc(SYSDATE + 60)
                        AND end_date >= trunc(SYSDATE)
                    ";
                    $query = oci_parse($conn,$sql);
                    oci_execute($query);
                    $numCol = oci_num_fields($query);
                }
                //Display Table
                echo '<div class="container">';
                echo '<table class="table">';
                echo '<thead class="thead-light">';
                    echo '<tr>';
                    for($i = 1; $i <= $numCol; $i++) {
                        $colName = oci_field_name($query,$i);
                        echo "<th> $colName </th>";
                    }
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                    while(oci_fetch($query)) {
                        echo '<tr>';
                        for($i = 1; $i <= $numCol; $i++) {
                            $colValue = oci_result($query,$i);
                            echo "<td> $colValue </td>";
                        }
                        echo '</tr>';
                    }
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                oci_close($conn);
            }
        ?>
    </body>   
</html>

