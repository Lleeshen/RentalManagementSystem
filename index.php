<?php
$conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
if(!$conn) {
        $e = oci_error;
        print "<br> connection failed:";
        print htmlentities($e['message']);
        exit;
}
//PHP stuff
echo "
    <!DOCTYPE html>
    <html lang='en'>
        <head>
            <meta charset='utf-8'>
            <title>HappyRenter - Home</title>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'> </script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js'> </script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js'> </script>
        </head>
        <body>
            <div class='jumbotron jumbotron-fluid'>
                <div class='container'>
                    <h2 class='display-3'> HappyRenter's Rental Management Inc. </h2>
                </div>
            </div>
        </body>
                
    </html>
";
// Log off
OCILogoff($conn);
?>

