<?php 
session_start();
	require_once "SynergySpace_Conn.php";
	$name = $_POST["name"];
  $email=$_POST["email"];
	$pword = $_POST["Password"];
  $pnum=$_POST["phone"];
  $hobbies=$_POST["text"];
  $age=$_POST['text-1'];
  $acc_type=$_POST["select"];

	
	//echo $row['Userpassword'];
  //echo $name;

  if($acc_type=="Tenant"){
    $_SESSION['varname'] = $email;
    $sql1= ("INSERT INTO tenants(Name,Email,Password,Phone_Num,hobbies,Age) Values ('$name','$email','$pword','$pnum','$hobbies','$age') ");
    $g= $conn->query($sql1);
    $sql= ("SELECT * FROM tenants WHERE (Email='$name') ");
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
    $_SESSION['varname1'] = $row['Tenant_id'];
        header('Location: Tenant_profile.php?p=1&num=1');
        exit();
        //On page 1
        
      }
     else if("Land Lord"==$acc_type)
     {
    $_SESSION['varname'] = $email;
    $sql1= ("INSERT INTO onwers(Name,Email,Password,Phone_Num,Age) Values ('$name','$email','$pword','$pnum','$age') ");
    $g= $conn->query($sql1);
    $sql= ("SELECT * FROM onwers WHERE (Email='$name') ");
    $msg= $conn->query($sql);
    $row = $msg->fetch_assoc();
    $_SESSION['varname1'] = $row['Tenant_id'];
        header('Location: User_profile.php?p=1&num=1');
        exit();
        //On page 1
     	
     }
     else
     {
      header('Location: Tenant_login.html');
        
      exit();
     }
?>