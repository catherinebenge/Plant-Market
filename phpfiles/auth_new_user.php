<?php
     $username = $_POST['username'];
     $password = $_POST['password'];
     $firstname = $_POST['fname'];
     $lastname = $_POST['lname'];

     include('config.php');
     $filename = $file_path.'/users.txt';


    $data = file_get_contents($file_path . '/users.txt');

    $split_users = explode("\n", $data);
    $number_of_users = count($split_users);

  for($i = 0; $i < $number_of_users; $i++){
      $split_line = explode("\n", $data);
      
      $split_items = explode(",", $split_line[$i]);
      $split_username = $split_items[0];
      $split_email = $split_items[2];
      
    if ($username == $split_items[0]) {
      header('Location: register.php?unique=no');
      exit();
        
    }
    if($password == ""){
       header('Location: register.php?empty=yes');
       exit(); 
    }
  }
    if(isset($_COOKIE['loggedin'])){
        header('Location: register.php?loggedin=yes');
        exit();
   }
    if (ctype_alpha($firstname) && ctype_alpha($lastname)) {
       setcookie('loggedin', 'yes');
       setcookie('customer', 'yes');
       setcookie('firstname', $firstname);
       setcookie('lastname', $lastname);
       setcookie('username', $username); 
       file_put_contents( $filename, $username.','.$password.",".$firstname.",".$lastname."\n", FILE_APPEND);
       header('Location: register.php');
       exit();
        
    } else {
        header('Location: register.php?alphatest=fail');
        exit();
    }
?>