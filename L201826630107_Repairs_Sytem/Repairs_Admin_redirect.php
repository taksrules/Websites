<?php 
	require_once "RepairsConn.php";
	$name = $_POST["email"];
	$pword = $_POST["name"];
	$sql= ("SELECT * FROM workers WHERE (id='$name' AND Userpassword='$pword') ");
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
	//echo $row['Userpassword'];
  //echo $name;
  if($row['Userpassword']==$pword){
        header('Location: Repairs_Admin.php?p=1?num=1');
        exit();
      }
     else
     {
     	header('Location: Admin_log.html');
       	
    	exit();
     }
?>