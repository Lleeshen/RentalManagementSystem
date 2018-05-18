<?php
$conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
if(!$conn) {
        $e = oci_error;
        print "<br> connection failed:";
        print htmlentities($e['message']);
        exit;
}
//PHP stuff
echo '
    <!DOCTYPE html>
    <html lang='en'>
        <head>
            <title>Bootstrap Example</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <\head>
        <body>
            <div class="jumbotron jumbotron-fluid">
                <h1> HappyRenter\'s Rental Management Inc.<\h1>
            <\div>
                
        <\body>
    </html>
'
// Log off
OCILogoff($conn);
?>

