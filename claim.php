<?php 
  $room = $_POST['room'];  //getting value of post from the form 


// checking string size 
  if(strlen($room)>20 or strlen($room)<2)
  {
    $message= "Please choose a name between 2 to 20 characters ";
    echo '<script language="javascript">';
    echo 'alert(" '.$message.'");';
    echo 'window.location="http://localhost/ONLINECHATROOM";';
    echo '</script>';
  }

  //checking whether room name is alphanumeric 
  else if(!ctype_alnum($room))
  {
    $message= "Please choose an alphanumeric room name  ";
    echo '<script language="javascript">';
    echo 'alert(" '.$message.'");';
    echo 'window.location="http://localhost/ONLINECHATROOM";';
    echo '</script>';
  } 
  else{
    //connecting to  the database
    include 'db_connect.php'; 
  }

  //for verifiying if connection is done properly
  echo "Let's chat now!";

  ?>