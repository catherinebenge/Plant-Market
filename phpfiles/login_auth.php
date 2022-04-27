<?php

  // grab the username & password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // open up the 'teacheraccounts.txt' file
  include('config.php');
  $data = file_get_contents($file_path . '/users.txt');
  $split_users = explode("\n", $data);
  $number_of_users = count($split_users);


  for($i = 0; $i < $number_of_users; $i++){
      $split_line = explode("\n", $data);
      $split_items = explode(",", $split_line[$i]);
      $split_username = $split_items[0];

    if ($username == $split_items[0] && $password == $split_items[1]) {
      setcookie('loggedin', 'yes');
      setcookie('customer', 'yes');
      setcookie('firstname', $split_items[2]);
      setcookie('lastname', $split_items[3]);
      setcookie('username', $split_items[0]); 
       
      header('Location: login.php');
      exit();
    }
    else{
        // if not, send them back to 'admin.php'
        header('Location: login.php?loginerror=yes');
        //exit();
         // print "oops";
    }
  }
 ?>
