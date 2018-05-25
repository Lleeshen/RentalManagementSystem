<html>
    <head>
        <title> Form Test Results </title>
    </head>
    <body>
<?php
        // Connect to Oracle database
        // Data base need to have relation
        //   FormTest(fullname varchar, age integer)
        // for form to work
        $conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
        //Show error and don't load the page if unsuccessful connection
        if(!$conn) {
            $e = oci_error;
            print "<br> connection failed:";
            print htmlentities($e['message']);
            exit;
        }
        //Only insert if there is valid data
        if(!empty($_POST) && ($_POST['fullname'] != "" &&  $_POST['age'] != '')) {
            //Store form data from index.php as variables
            $fullname = $_POST['fullname'];
            $age = $_POST['age'];
            echo "Your name is $fullname <br />";
            echo "Your age is $age <br />";
            //Parse query
            $query = oci_parse($conn, "INSERT INTO FormTest VALUES (:v1, :v2)");
            //Subsitute names with variables
            oci_bind_by_name($query,':v1',$fullname);
            oci_bind_by_name($query,':v2',$age);
            //Execute query
            oci_execute($query);
        }
        //Testing to show what is in FormTest
        $sql = "select * from FormTest";
        //Parse query
        $query = oci_parse($conn,$sql);
        //Execute query
        oci_execute($query);
        //Store number of attributes
        $num_col = oci_num_fields($query);
        //Define table
        echo "<table border=1>";
        //Define table header with attribute name
        echo "<tr><th>Full name</th> <th>Age</th></tr>";
        //Get each row of query
        while(oci_fetch($query)) {
            echo "<tr>";
            for ($i=1;$i <= $num_col; $i++) {
                //Get each attribute of the row of query fetched
                $col_value = oci_result($query,$i);
                //Put the value in table data
                echo "<td>$col_value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        //Free connection
        OCIFreeStatement($query);
        OCILogOFF($conn);        
?>
    <br />
    <h3> Go back to main page</h3>
    <!-- Form to allow reset FormTest table
         Links back to index.php   -->
    <form action="index.php" method="POST">
        <!-- Check the box to reset the table -->
        <input type="checkbox" name="reset" value="true"> Reset table <br />
        <input type="submit" value="Submit" />
    </form>
    </body>
</html>
