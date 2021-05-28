<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="st.css">
<link rel="stylesheet" type="text/css" href="profile.css">
<?php
session_start();
require_once "st.css";
?>
<?php
require_once "SynergySpace_Nav2.php";
require_once "SynergySpace_Conn.php";
//On page 2
$usernameid = $_SESSION['varname1'];
$username = $_SESSION['varname'];

$sql= ("SELECT * FROM tenants WHERE Email='$username'  ");
    
    $msg= $conn->query($sql);
    $ro = $msg->fetch_assoc();
?>
<body>

	<div class="profile">
		<div class="pn">Welcome Back</div>
		<img src="earth_from_space_close_up-wallpaper-1920x1080.jpg" alt="Profile Image" class="img">
		<div class="pn">name:<?php echo $ro['Name'];?></div>
		<div class=pt>Age: <?php echo $ro['Age']?></div>
		<div class="pd"><i class="materials-icons">person</i> Bio:<?php echo $ro['hobbies']?></div>
	</div>
    <table class="purpleHorizon">
        <tr>
            <th>Lot_ID</th>
            <th>Owner_ID</th>
            <th>Lot_des</th>
        </tr>
    
    
    


<?php
/*// Create database

}*/


/*
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
require_once "SynergySpace_Conn.php";
$limit= 5;
$p= $_GET['p'];
$gettotal= mysqli_num_rows(mysqli_query($conn,"SELECT * FROM Lot"));
$tots= ceil($gettotal/$limit);
if(!isset($p)||$p<=0){
    $offset=0;
}else{
    $offset= ceil($p-1)* $limit;
}
$sql = "SELECT * FROM Lot where Tenant1_id='$usernameid' OR Tenant2_id='$usernameid' OR Tenant3_id='$usernameid' LIMIT $offset,$limit";
$result = $conn->query($sql);
        
//$row = mysqli_fetch_array($result)
    // output data of each row


    while($row = $result->fetch_assoc()) {
        $id=$row["ID"];
        $fname=$row["Owner_ID"];
        $lname=$row["Lot_des"];
        echo"<tr >";
        echo "<td>".'<a href="?msg='.$id.'&p=1'.'">'.$id.'</a>'."</td>";
        echo"<td>".'<a href="?msg='.$id.'&p=1'.'">'.$fname.'</a>'."</td>";
        echo"<td>".'<a href="?msg='.$id.'&p=1'.'">'.$lname.'</a>'."</td></tr>";
    }
    
    echo '<tfoot><tr><td colspan="3">';
    echo "<div class=\"links\">";
   for($i=1; $i<$tots; $i++){
        
       echo  '<a href="?p='.$i.'">'.$i.'</a>';

    }
    echo "</div>";
    echo '</td></tr></tfoot>';
    echo "</table>";
$result->free();
//$conn->close();
?>
<?php
require_once "SynergySpace_Conn.php";
require_once "st.css";
?>
<?php

if (isset($_GET['msg'])) {
    $id= $_GET['msg'];
     $sql= ("SELECT * FROM lot WHERE Tenant1_id='$id' OR Tenant3_id='$id' OR Tenant2_id='$id' ");
    
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
    $id=$row["ID"];
    $fname=$row["Lot_des"];
    $lname=$row["Tenant1_id"];
    $cost=$row["Tenant2_id"];
    $rate=$row["Lot_Rating"]

    # code...

?>
<div id="msg">
<table class="purpleHorizon">
    <tr>
        <td>Lot_ID#:<?php echo $id;?></td>
        <td>Lot_des:<?php echo $fname;?></td>
        <td>Tenant:<?php echo $lname;?></td>
        <td>Tenant:<?php echo $cost;?></td>
        <td>Rating:<?php echo $rate;?></td>
    </tr>
<tr><form action="User_profile.php?p=1" method="post">
        <td>Request Listing</td>
        <td> <input type="number" placeholder="Lot_Id" id="email-3b9a" name="num" ></td>
        <td> <input type="number" placeholder="your id" id="email-3b9a" name="rum" ></td>
        <td> <input type="text" placeholder="Organisation" id="email-3b9a" name="rums" ></td>
        <td><input type="submit" name="insert" value="insert" /></td>
    </form></tr>
</table>
<pre><?php echo $id;?></pre>
<div>
<?php
exit();}
?>
<?php
require_once "SynergySpace_Conn.php";
if($_POST["num"]){
$update = $_POST["num"];
$i=$_POST["rum"];
$j=$_POST["rums"];
$sql = "INSERT INTO Request (Lot_ID,Tenant_ID,Company_Name) Values('$update','$i','$'j) ";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
                        
                    

</body>
</html>