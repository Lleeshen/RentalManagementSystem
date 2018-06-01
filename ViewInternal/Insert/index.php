<?php
echo '
<html>
<head>
<script type="text/javascript">

function TableCheck() {
    document.getElementById("ifT1").style.display = "none";
    document.getElementById("ifT2").style.display = "none";
    document.getElementById("ifT3").style.display = "none";
    document.getElementById("ifT4").style.display = "none";
    document.getElementById("ifT5").style.display = "none";
    document.getElementById("ifT6").style.display = "none";
    document.getElementById("ifT7").style.display = "none";
    document.getElementById("ifT8").style.display = "none";
    if(document.getElementById("t1").selected) {
        console.log("t1 selected");
        document.getElementById("ifT1").style.display = "block";
    } else if(document.getElementById("t2").selected) {
        console.log("t2 selected");
        document.getElementById("ifT2").style.display = "block";
    } else if(document.getElementById("t3").selected) {
        console.log("t3 selected");
        document.getElementById("ifT3").style.display = "block";
    } else if(document.getElementById("t4").selected) {
        console.log("t4 selected");
        document.getElementById("ifT4").style.display = "block";
    } else if(document.getElementById("t5").selected) {
        console.log("t5 selected");
        document.getElementById("ifT5").style.display = "block";
    } else if(document.getElementById("t6").selected) {
        console.log("t6 selected");
        document.getElementById("ifT6").style.display = "block";
    } else if(document.getElementById("t7").selected) {
        console.log("t7 selected");
        document.getElementById("ifT7").style.display = "block";
    } else if(document.getElementById("t8").selected) {
        console.log("t8 selected");
        document.getElementById("ifT8").style.display = "block";
    }
}

function disableEmptyInputs(form) {
    var controls = form.elements;
    for (var i=0, iLen=controls.length; i<iLen; i++) {
        controls[i].disabled = (controls[i].value == "");
    }
}

</script>
</head>
';

echo '
<body>

    <h2>Insert Rental Property Data</h2>

    <a href=".."> Click here to view the tables  </a>
    <p>Choose table to insert to. The options are Branch, Manager, Supervisor, Rental Property, and Lease Agreement.</p>

    <form method="post" onchange="TableCheck();" onsubmit="disableEmptyInputs(this);">
        <select name="tables">
            <option value="Branch" name="branch" id="t1">Branch</option>
            <option value="Employee" name="employee" id="t2">Employee</option>
            <option value="Manager" name="manager" id="t3">Manager</option>
            <option value="Supervisor" name="supervisor" id="t4">Supervisor</option>
            <option value="PropertyOwner" name="owner" id="t5">Property Owner</option>
            <option value="RentalProperty" name="property" id="t6">Rental Property</option>
            <option value="Renter" name="renter" id="t7">Renter</option>
            <option value="LeaseAgreement" name="agreement" id="t8">Lease Agreement</option>
        </select>                          
    </form>
';

$conn=oci_connect('username','password','//dbserver.engr.scu.edu/db11g');
if(!$conn) {
    $e = oci_error();
    print "<br> connection failed:";
    print htmlentities($e['message']);
    exit;
}

echo '
    <div id="ifT1">
        <h3> Branch form </h3>
        <form method="post" action=".">
            <input type="hidden" name="Branch" value=" "/>
            <label for="bId"> Branch Id </label> <br />
            <input type="text" name="bId" id="bId" />
            <br />
            <label for="bPhone"> Phone </label> <br />
            <input type="text" name="bPhone" id="bPhone" />
            <br />
            <h4> Branch Address </h4>
            <label for="bStreet"> Street </label> <br />
            <input type="text" name="bStreet" id="bStreet" />
            <br />
            <label for="bCity"> City </label> <br />
            <input type="text" name="bCity" id="bCity" />
            <br />
            <label for="bZip"> Zip code </label> <br />
            <input type="text" name="bZip" id="bZip" />
            <br />
            <button type="submit"> Submit! </button>
        </form>
    </div>
';

if(!empty($_POST) && isset($_POST["Branch"])) {
    $bId = $_POST["bId"];
    $bPhone = $_POST["bPhone"];
    $bStreet = $_POST["bStreet"];
    $bCity = $_POST["bCity"];
    $bZip = $_POST["bZip"];
    $sql = "INSERT INTO Branch VALUES (:id, :phone, :street, :city, :zip )";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':id', $bId);
    oci_bind_by_name($query, ':phone', $bPhone);
    oci_bind_by_name($query, ':street', $bStreet);
    oci_bind_by_name($query, ':city', $bCity);
    oci_bind_by_name($query, ':zip', $bZip);
    oci_execute($query);
    oci_free_statement($query);
}

echo '
    <div id="ifT2" style="display:none">
        <h3> Employee form </h3>
        <form method="post" action="..">
            <input type="hidden" name="Employee" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
    <div id="ifT3" style="display:none">
        <h3> Manager form </h3>
        <form method="post" action="..">
            <input type="hidden" name="Manager" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
    <div id="ifT4" style="display:none">
        <h3> Supervisor Form </h3>
        <form method="post" action="..">
            <input type="hidden" name="Property" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
    <div id="ifT5" style="display:none">
        <h3> Property Owner Form </h3>
        <form method="post" action="..">
            <input type="hidden" name="Owner" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
    <div id="ifT6" style="display:none">
        <h3> Rental Property Form </h3>
        <form method="post" action="..">
            <input type="hidden" name="Property" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
    <div id="ifT7" style="display:none">
        <h3> Renter Form </h3>
        <form method="post" action="..">
            <input type="hidden" name="Renter" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
    <div id="ifT8" style="display:none">
        <h3> Lease Agreement Form </h3>
        <form method="post" action="..">
            <input type="hidden" name="Agreement" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
</body>
</html>

';

?>
