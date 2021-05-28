<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" type="text/css" href="st.css">
<?php
require_once "main.css";

?>
<body>
<div class="table100 ver2 m-b-110">
    <table data-vertable="ver2">
        <tr>
            <th>#</th>
            <th>from</th>
            <th>to</th>
        </tr>
    

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
	echo "Connection Succesiful!";
}
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
        echo "<td class=\"column100 column1\">".$id."</td>";
        echo"<td class=\"column100 column2\">".$fname."</td>";
        echo"<td class=\"column100 column3\">".$lname."</td></tr>";
    }
    echo "</table>";
    
   for($i=1; $i<$tots; $i++){
       echo  '<a href="?p='.$i.'">'.$i.'</a>';
    }
$result->free();

//$conn->close();
?>

                        
                    

</body>
</html>