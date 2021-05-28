<?php 
	require_once "RepairsConn.php";
	$name = $_POST["email"];
	$pword = $_POST["name"];
	$sql= ("SELECT * FROM User WHERE (email='$name' AND Userpassword='$pword') ");
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
	//echo $row['Userpassword'];
  if($row['Userpassword']==$pword){
        header('Location: Repairs1.php?p=1');
        exit();
      }
     else
     {
     	header('Location: Login.html');
       	
    	exit();
     }
?>