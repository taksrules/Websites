
<?php 
session_start();
	require_once "SynergySpace_Conn.php";
	$name = $_POST["email"];
	$pword = $_POST["name"];
	$sql= ("SELECT * FROM onwers WHERE (Email='$name' AND Password='$pword') ");
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
	//echo $row['Userpassword'];
  //echo $name;

  if($row['Password']==$pword){
    $_SESSION['varname'] = $row['Email'];
    $_SESSION['varname2'] = $row['Owner_id'];
        header('Location: User_profile.php?p=1&num=1');
        exit();
        //On page 1
        
      }
     else
     {
     	header('Location: Land-lord-Login.html');
       	
    	exit();
     }
?>