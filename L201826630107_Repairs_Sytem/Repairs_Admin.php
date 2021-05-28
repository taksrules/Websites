<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="st.css">
<?php
require_once "st.css";
?>
<?php
require_once "Repairs_Admin_nav.php";
require_once "RepairsConn.php";

?>
<body>
    <table class="purpleHorizon">
        <tr>
            <th>Order#</th>
            <th>Customer</th>
            <th>Status</th>
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
$limit= 5;
$p= $_GET['p'];
$gettotal= mysqli_num_rows(mysqli_query($conn,"SELECT * FROM Orders"));
$tots= ceil($gettotal/$limit);
if(!isset($p)||$p<=0){
    $offset=0;
}else{
    $offset= ceil($p-1)* $limit;
}
$sql = "SELECT * FROM Orders LIMIT $offset,$limit";
$result = $conn->query($sql);
        
//$row = mysqli_fetch_array($result)
    // output data of each row


    while($row = $result->fetch_assoc()) {
        $id=$row["Order_id"];
        $fname=$row["Worker_ID"];
        $lname=$row["status"];
        echo"<tr >";
        echo "<td>".'<a href="?msg=&p='.$id.'&p=1'.'">'.$id.'</a>'."</td>";
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
require_once "RepairsConn.php";
require_once "st.css";
?>
<?php

if (isset($_GET['msg'])) {
    $id= $_GET['msg'];
     $sql= ("SELECT * FROM Orders WHERE Order_id='$id' ");
    
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
    $ids=$row["Order_id"];
    $fname=$row["status"];
    $lname=$row["Job_d"];
    $cost=$row["Cost"]

    # code...

?>
<div id="msg">
<table class="purpleHorizon">
    <tr>
        <td>Order#:<?php echo $ids;?></td>
        <td>Status:<?php echo $fname;?></td>
        <td>Job des:<?php echo $lname;?></td>
        <td>Cost:<?php echo $cost;?></td>
    </tr>
    <tr><form action="Repairs_Admin.php?p=1" method="post">
        <td>ADD costs</td>
        <td> <input type="number" placeholder="$" id="email-3b9a" name="num" ></td>
        <td> <input type="number" placeholder="id" id="email-3b9a" name="rum" ></td>
        <td><input type="submit" name="insert" value="insert" /></td>
    </form></tr>
</table>
<pre><?php echo $ids;?></pre>
<div>
<?php
exit();}
?>
<?php
require_once "RepairsConn.php";
if($_POST["num"]){
$update = $_POST["num"];
$i=$_POST["rum"];
$sql = "UPDATE Orders SET cost='$update' WHERE Order_id='$i'";
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