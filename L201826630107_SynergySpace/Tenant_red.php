
<?php 
session_start();
	require_once "SynergySpace_Conn.php";
	$name = $_POST["email"];
	$pword = $_POST["name"];
	$sql= ("SELECT * FROM tenants WHERE (Email='$name' AND Password='$pword') ");
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
	//echo $row['Userpassword'];
  //echo $name;

  if($row['Password']==$pword){
    $_SESSION['varname'] = $row['Email'];
    
    $_SESSION['varname1'] = $row['Tenant_id'];
        header('Location: Tenant_profile.php?p=1&num=1');
        exit();
        //On page 1
        
      }
     else
     {
     	header('Location: Tenant_login.html');
       	
    	exit();
     }
?>