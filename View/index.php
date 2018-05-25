<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Property Tables</title>
    <style type="text/css">
        .noDisplay {
            display:none;
        }
    </style>
    <script type="text/javascript">
function TableCheck() {
        document.getElementById("ifT1").style.display = 'none';
        document.getElementById("ifT2").style.display = 'none';
        document.getElementById("ifT3").style.display = 'none';
        document.getElementById("ifT4").style.display = 'none';
        document.getElementById("ifT5").style.display = 'none';
        if(document.getElementById("t1").selected) {
            console.log("t1 selected");
            document.getElementById("ifT1").style.display = 'block';                
        } else if(document.getElementById("t2").selected) {
            console.log("t2 selected");
            document.getElementById("ifT2").style.display = 'block';
        } else if(document.getElementById("t3").selected) {
            console.log("t3 selected");
            document.getElementById("ifT3").style.display = 'block';
        } else if(document.getElementById("t4").selected) {
            console.log("t4 selected");
            document.getElementById("ifT4").style.display = 'block';
        } else if(document.getElementById("t5").selected) {
            console.log("t5 selected");
            document.getElementById("ifT5").style.display = 'block';
        }
}

    </script>
</head>
<body>
    <h1> View and insert Rental Property Data </h1>
    <br /> <br />
<?php
if(empty($_POST)) {
    echo '<a href="Insert">Click here to insert data</a>';
} else {
    //Retrieve Form input, show insert Successful
    if(isset($_POST["Branch"])){

    } else if (isset($_POST["Manager"])) {

    } else if (isset($_POST["Supervisor"])) {

    } else if (isset($_POST["Property"])) {

    } else if (isset($_POST["Agreement"])) {
    }  
    echo '<a href="Insert">Click here to insert data again</a>';
}
?>
    <br /> <br /> 
    <h2>Show Rental Property Data </h2>
    <p> Choose which type of data to show in menu. </p>
    <form method="post" onchange="TableCheck();" action="#">
        <select name="tables">
            <option value="Branch" name="branch" id="t1">Branch</option>
            <option value="Manager" name="manager" id="t2">Manager</option>
            <option value="Supervisor" name="supervisor" id="t3">Supervisor</option>
            <option value="RentalProperty" name="property" id="t4">Rental Property</option>
            <option value="LeaseAgreement" name="agreement" id="t5">Lease Agreement</option>
        </select> 
    </form>
    <div id="ifT1" class="noDisplay">
        <h3> Branch </h3>
<?php
    //Display Branch table
?>
    </div>
    <div id="ifT2" class="noDisplay">
        <h3> Manager </h3> 
<?php
    //Display Manager table
?>
    </div>
    <div id="ifT3" class="noDisplay">
        <h3> Supervisor </h3>
<?php
    //Display Supervisor table
?>
    </div>
    <div id="ifT4" class="noDisplay">
        <h3> Rental Property </h3>
<?php
    //Dispaly Rental Property table
?>
    </div>
    <div id="ifT5" class="noDisplay">
        <h3> Lease Agreement </h3>
<?php
    //Display Lease Agreement table
?>
    </div>
</body>
</html>
