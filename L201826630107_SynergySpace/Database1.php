<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="st.css">
<?php
require_once "st.css";
?>
<?php
require_once "nav.html";
require_once "Conn.php";

?>
<body>
    <table class="purpleHorizon">
        <tr>
            <th>#</th>
            <th>from</th>
            <th>to</th>
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
$gettotal= mysqli_num_rows(mysqli_query($conn,"SELECT * FROM MyGuests"));
$tots= ceil($gettotal/$limit);
if(!isset($p)||$p<=0){
    $offset=0;
}else{
    $offset= ceil($p-1)* $limit;
}
$sql = "SELECT * FROM MyGuests LIMIT $offset,$limit";
$result = $conn->query($sql);
        
//$row = mysqli_fetch_array($result)
    // output data of each row


    while($row = $result->fetch_assoc()) {
        $id=$row["id"];
        $fname=$row["firstname"];
        $lname=$row["lastname"];
        echo"<tr >";
        echo "<td>".'<a href="?msg='.$id.'">'.$id.'</a>'."</td>";
        echo"<td>".'<a href="?msg='.$id.'">'.$fname.'</a>'."</td>";
        echo"<td>".'<a href="?msg='.$id.'">'.$lname.'</a>'."</td></tr>";
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
require_once "Conn.php";
require_once "st.css";
?>
<?php

if (isset($_GET['msg'])) {
    $id= $_GET['msg'];
     $sql= ("SELECT * FROM MyGuests WHERE id='$id' ");
    
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
    $id=$row["id"];
    $fname=$row["firstname"];
    $lname=$row["lastname"];

    # code...

?>
<div id="msg">
<table class="purpleHorizon">
    <tr>
        <td>#:<?php echo $id;?></td>
        <td>From:<?php echo $fname;?></td>
        <td>to:<?php echo $lname;?></td>
    </tr>
</table>
<pre><?php echo $id;?></pre>
<div>
<?php
exit();}
?>
                        
                    

</body>
</html>