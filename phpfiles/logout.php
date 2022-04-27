<?php

  // destroy all 4 cookies
  setcookie('lastname', '', time()-3600);
  setcookie('firstname', '', time()-3600);
  setcookie('username', '', time()-3600);
  setcookie('loggedin', '', time()-3600);
  setcookie('customer', '', time()-3600);

  header('Location: login.php?action=loggedout');
  
 ?>