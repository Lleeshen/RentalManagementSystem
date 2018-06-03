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
            <label for="bId"> New Branch Id </label> <br />
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
    if(oci_execute($query)) {
        echo 'Insert Branch successful.';
    }
    oci_free_statement($query);
}

echo '
    <div id="ifT2" style="display:none">
        <h3> Employee form </h3>
        <form method="post" action=".">
            <input type="hidden" name="Employee" value=" "/>
            <label for="empId"> New employee id </label> <br />
            <input type="text" name="eId" id="empId"/>
            <br />
            <label for="eName"> Name </label> <br />
            <input type="text" name="eName" id="eName" />
            <br />
            <label for="ePhone"> Phone </label> <br />
            <input type="text" name="ePhone" id="ePhone" />
            <br />
            <select name="eDes">
                <option value="Manager"> Manager </option>
                <option value="Supervisor"> Supervisor </option>
            </select>
            <br />
            <button type="submit"> Submit! </button>
        </form>
    </div>

';

if(!empty($_POST) && isset($_POST["Employee"])) {
    $empId = $_POST["eId"];
    $empName = $_POST["eName"];
    $empPhone = $_POST["ePhone"];
    $empPosition = $_POST["eDes"];
    $sql = "INSERT INTO Employee VALUES (:id, :name, :phone, :des )";
    $query = oci_parse($conn,$sql);
    oci_bind_by_name($query, ':id',$empId);
    oci_bind_by_name($query,':name',$empName);
    oci_bind_by_name($query,':phone',$empPhone);
    oci_bind_by_name($query,':des',$empPosition);
    if(oci_execute($query)) {
        echo 'Insert employee successful. Please also fill relevant Manager or Supervisor form.';
    }
    oci_free_statement($query);
}

echo '
    <div id="ifT3" style="display:none">
        <h3> Manager form </h3>
        <form method="post" action=".">
            <input type="hidden" name="Manager" value=" "/>
            <label for="manId"> Your employee id </label> <br />
            <input type="text" name="mId" id="manId"/>
            <br />
            <label for="mBid"> The Branch you will be managing </label> <br />
            <input type="text" name="mBid" id="mBid" />
            <br />
            <button type="submit"> Submit! </button>
        </form>
    </div>
';

if(!empty($_POST) && isset($_POST["Manager"])) {
    $manId = $_POST["mId"];
    $manBranch = $_POST["mBid"];
    $sql = "INSERT INTO Manager VALUES (:manager, :branch)";
    $query = oci_parse($conn,$sql);
    oci_bind_by_name($query,':manager',$manId);
    oci_bind_by_name($query,':branch',$manBranch);
    if(oci_execute($query)) {
        echo 'Insert Manager successful.';
    }
    oci_free_statement($query);
}

echo '
    <div id="ifT4" style="display:none">
        <h3> Supervisor Form </h3>
        <form method="post" action=".">
            <input type="hidden" name="Supervisor" value=" "/>
            <label for="supId"> Your employee id </label> <br />
            <input type="text" name="supId" id="supId" />
            <br />
            <label for="supManId"> Your manager\'s employee id </label> <br />
            <input type="text" name="manId" id="supManId" />
            <br />
            <button type="submit"> Submit! </button>
        </form>
    </div>
';

if(!empty($_POST) && isset($_POST["Supervisor"])) {
    $supId = $_POST["supId"];
    $manId = $_POST["manId"];
    $sql = "INSERT INTO Supervisor VALUES (:supervisor, :manager)";
    $query = oci_parse($conn,$sql);
    oci_bind_by_name($query,':supervisor',$supId);
    oci_bind_by_name($query,':manager',$manId);
    if(oci_execute($query)) {
        echo 'Insert Supervisor successful.';
    }
    oci_free_statement($query);
}

echo '
    <div id="ifT5" style="display:none">
        <h3> Property Owner Form </h3>
        <form method="post" action=".">
            <input type="hidden" name="Owner" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
    <div id="ifT6" style="display:none">
        <h3> Rental Property Form </h3>
        <form method="post" action=".">
            <input type="hidden" name="Property" value=" "/>
            <label for="rentalNum"> Rental Number </label> <br />
            <input type="number" name="rentalNum" id="rentalNUm" />
            <br />
            <input type="hidden" name="Status" value=0 />
            <h4> Property Address </h4>
            <label for="pStreet"> Street </label> <br />
            <input type="text" name="pStreet" id="pStreet" />
            <br />
            <label for="pCity"> City </label> <br />
            <input type="text" name="pCity" id="pCity" /> <br />
            <br />
            <label for="pZip"> Zip code </label> <br />
            <input type="text" name="pZip" id="pZip" />
            <br /> <br />
            <label for="pNumRooms"> Number of rooms </label> <br />
            <input type="number" name="numRooms" id="pNumRooms" />
            <br />
            <label for="pMonthly"> Monthly Rent </label> <br />
            <input type="text" name="pMonthly" id="pMonthly" />
            <br />
            <label for="pSDate"> Start date of availibility </label> <br />
            <input type="date" name="pSDate" id="pSDate" />
            <br />
            <label for="pOPhone"> Owner\'s phone </label> <br />
            <input type="text" name="pOPhone" id="pOPhone" />
            <br />
            <label for="pSid"> Supervisor\'s id </label> <br />
            <input type="text" name="pSid" id="pSid" />
            <br />
            <button type="submit"> Submit! </button>
        </form>
    </div>
';

if(!empty($_POST) && isset($_POST["Property"])) {
    $pNum = $_POST["rentalNum"];
    $pStatus = $_POST["Status"];
    $pStreet = $_POST["pStreet"];
    $pCity = $_POST["pCity"];
    $pZip = $_POST["pZip"];
    $pRooms = $_POST["numRooms"];
    $pRent = $_POST["pMonthly"];
    $pStart = $_POST["pSDate"];
    $pPhone = $_POST["pOPhone"];
    $pSupId = $_POST["pSid"];
    $sql = "INSERT INTO Rental_Property VALUES (:num, :status, :street, :city, :zip, :rooms, :rent, TO_DATE(:sDate, 'yyyy-mm-dd'), :phone, :sup )";
    $query = oci_parse($conn, $sql);
    oci_bind_by_name($query, ':num', $pNum);
    oci_bind_by_name($query, ':status', $pStatus);
    oci_bind_by_name($query, ':street', $pStreet);
    oci_bind_by_name($query, ':city', $pCity);
    oci_bind_by_name($query, ':zip', $pZip);
    oci_bind_by_name($query, ':rooms', $pRooms);
    oci_bind_by_name($query, ':rent', $pRent);
    oci_bind_by_name($query, ':sdate', $pStart);
    oci_bind_by_name($query, ':phone', $pPhone);
    oci_bind_by_name($query, ':sup', $pSupId);
    if(oci_execute($query)) {
        echo 'Insert Rental Property successful.';
    }
    oci_free_statement($query);
}

echo '
    <div id="ifT7" style="display:none">
        <h3> Renter Form </h3>
        <form method="post" action=".">
            <input type="hidden" name="Renter" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
    <div id="ifT8" style="display:none">
        <h3> Lease Agreement Form </h3>
        <form method="post" action=".">
            <input type="hidden" name="Agreement" value=" "/>
            <button type="submit"> Submit! </button>
        </form>
    </div>
</body>
</html>

';

?>
