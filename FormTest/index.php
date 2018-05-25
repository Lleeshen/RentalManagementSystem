<!--
   Use this form with an Oracle Datbase with the relation
       FormTest(fullname varchar, age integer)
 -->

<html>
    <head>
        <title>Form Test </title>
    </head>
    <body>
        <?php
            //Connect to database
            $conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
            //If connection successful, proceed
            if($conn) {
            //If reset checkbox is checked remove values from table
            if(isset($_POST['reset'])) {
                $sql = "delete from formtest";
                //Parse SQL query
                $query = oci_parse($conn,$sql);
                //Execute the SQL query
                oci_execute($query);
            }
            }
        ?>
        <h2>Form Submission </h2>
        <!-- Form submits to test.php using the POST method-->
        <form action="test.php" method="POST">
            <!-- First attribute is fullname -->
            Full Name <br />
            <input type="text" name="fullname"> <br /> <br />
            <!-- Second attribute is age -->
            Age <br />
            <input type="number" name="age"> <br /> <br />
            <!-- Submit button to go to other page -->
            <input type="submit" value="Submit!" />
        </form>
    </body>
</html>
