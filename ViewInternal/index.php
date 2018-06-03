<?php
echo '
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
            <option value="Branch" 
';
        if(!empty($_POST) && $_POST["tables"] == "Branch") {
            echo ' selected ';
        }
echo '
                >Branch</option>
            <option value="Employee"
';
        if(!empty($_POST) && $_POST["tables"] == "Employee") {
            echo ' selected ';
        }
echo '
    >Employee</option>
            <option value="Manager"
';
        if(!empty($_POST) && $_POST["tables"] == "Manager") {
            echo ' selected ';
        }
        
echo'
                >Manager</option>
            <option value="Supervisor"
';
        if(!empty($_POST) && $_POST["tables"] == "Supervisor") {
            echo ' selected ';
        }

echo'
                >Supervisor</option>
            <option value="Property_Owner"
';
        if(!empty($_POST) && $_POST["tables"] == "Property_Owner") {
            echo ' selected ';
        }
echo '
                > Property Owner </option>
            <option value="Rental_Property"
';
        if(!empty($_POST) && $_POST["tables"] == "Rental_Property") {
            echo ' selected ';
        }

echo '
                >Rental Property</option>
            <option value="Renter" 
';
        if(!empty($_POST) && $_POST["tables"] == "Renter") {
            echo ' selected ';
        } 
echo '
                >Renter</option>
            <option value="Lease_Agreement"
';
        if(!empty($_POST) && $_POST["tables"] == "Lease_Agreement") {
            echo ' selected ';
        }
echo '
                >Lease Agreement</option>
        </select>
        <br /> <br />
        <button type="submit"> Display table </button>
    </form>
';

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
echo '
</body>
</html>
';

?>
