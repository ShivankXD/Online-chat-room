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

  // //for verifiying if connection is done properly
  // echo "Let's chat now!";

  //check if room aldready exists 
  $sql = "SELECT * FROM 'rooms' WHERE roomname ='$room'";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
     if(mysqli_num_rows($result)>0)
     {
      $message= "Please Choose a different room name . This room is aldready claimed ";
      echo '<script language="javascript">';
      echo 'alert(" '.$message.'");';
      echo 'window.location="http://localhost/ONLINECHATROOM";';
      echo '</script>';
     }
     

     //if room is not claimed 
     else{
        $sql="INSERT INTO `rooms` (`sno`, `roomname`, `stime`) VALUES ('1', '$room', '2024-11-09 16:40:02.000000');";
        if(mysqli_query($conn,$sql))
        {
          $message= "Your room is ready and you can chat now!";
          echo '<script language="javascript">';
          echo 'alert(" '.$message.'");';
          echo 'window.location="http://localhost/ONLINECHATROOM/rooms.php?roomname= ' .$room. '";';
          echo '</script>';
        }

     }
  }
  else {
    echo "Error:". mysqli_error($conn);

  }
  ?>