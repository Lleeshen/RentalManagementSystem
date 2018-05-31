<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Property Tables</title>
</head>
<body>
    <h1> View and insert Rental Property Data </h1>
    
    <br /> <br /> 
    <h2>Show Rental Property Data </h2>
    <p> Choose which type of data to show in menu. </p>
    <form method="post"  action=".">
        <select name="tables">
            <option value="Branch" name="branch">Branch</option>
            <option value="Employee" name="employee">Employee</option>
            <option value="Manager" name="manager">Manager</option>
            <option value="Supervisor" name="supervisor">Supervisor</option>
            <option value="Owner" name="owner"> Property Owner </option>
            <option value="RentalProperty" name="property">Rental Property</option>
            <option value="Renter" name="renter">Renter</option>
            <option value="LeaseAgreement" name="agreement">Lease Agreement</option>
        </select>
        <button type="submit"> Display table </button>
    </form>
<?php
    //Table name is input
    $conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
    if(!$conn) {
        $e = oci_error();
        echo 'Connection failed';
        echo htmlentities($e['message']);
    }
    $tName = "";
    if(!empty($_POST)) {
        if(isset($_POST["branch"])){
            $tName = "Branch";
        } else if (isset($_POST["employee"])) {
            $tName = "Employee";
        } else if (isset($_POST["manager"])) {
            $tName = "Manager";
        } else if (isset($_POST["supervisor"])) {
            $tName = "Supervisor";
        } else if (isset($_POST["owner"])) {
            $tName = "Property_Owner";
        } else if (isset($_POST["property"])) {
            $tName = "Rental_Property";
        } else if (isset($_POST["renter"])) {
            $tName = "Renter";
        } else if (isset($_POST["agreement"]) {
            $tName = "Lease_Agreement";
        }
    }   
    $sql = "select * from $tName";
    $query = oci_parse($conn,$sql);
    oci_execute($query);
    $num_col = oci_num_fields($query);

    echo '<table border=1>';
    echo '<tr>';
    for($i = 1; $i <= $num_col; $i++) {
        $col_name = oci_field_name($query,$i);
        echo "<th> $col_name </th>";
    }   
    echo '</tr>';
    while(oci_fetch($query)) {
        echo '<tr>';
        for($i=1;$i <= $num_col; $i++) {
            $col_value = oci_result($query,$i);
            echo "<td>$col_value</td>";
        }   
        echo '</tr>';
    }   
    echo '</table>';
    oci_free_statement($query);
    oci_close($conn);
?>
</body>
</html>
