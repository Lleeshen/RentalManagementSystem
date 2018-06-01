<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Property Tables</title>
</head>
<body>
    <h1> View and insert Rental Property Data </h1>
    <span><a href="Insert">Click here to insert values </a> </span>
    <br /> <br /> 
    <h2>Show Rental Property Data </h2>
    <p> Choose which type of data to show in menu. </p>
    <form method="post"  action=".">
        <select name="tables">
            <option value="Branch">Branch</option>
            <option value="Employee">Employee</option>
            <option value="Manager">Manager</option>
            <option value="Supervisor">Supervisor</option>
            <option value="Property_Owner"> Property Owner </option>
            <option value="Rental_Property">Rental Property</option>
            <option value="Renter" name="renter">Renter</option>
            <option value="Lease_Agreement" name="agreement">Lease Agreement</option>
        </select>
        <br /> <br />
        <button type="submit"> Display table </button>
    </form>
<?php
    //Table name is input
    if(!empty($_POST)) {
        $conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
        if(!$conn) {
            $e = oci_error();
            echo 'Connection failed';
            echo htmlentities($e['message']);
        }
        if(isset($_POST["tables"])){
            $tName = $_POST["tables"];
        }
    
        $sql = "select * from ".$tName;
        $query = oci_parse($conn,$sql);
        oci_execute($query);
        $num_col = oci_num_fields($query);
        echo "<h3>$tName</h3>";
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
    }
?>
</body>
</html>
