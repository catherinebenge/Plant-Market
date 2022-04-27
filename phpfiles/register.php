<! doctype html>
<html>
    <head>
        <title>Final Project | Plant Market</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="only screen and (max-width: 480px)" href="mobile.css">
        <link rel="stylesheet" media="only screen and (min-width: 481px) and (max-width: 850px)" href="medscreen.css">
        <link href="main.css" rel="stylesheet" type="text/css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500&display=swap" rel="stylesheet">
<!--
        <link rel="stylesheet" media="only screen and (max-width: 480px)" href="mobile.css">
        <link rel="stylesheet" media="only screen and (min-width: 481px) and (max-width: 960px)" href="medscreen.css">
        <link rel="stylesheet" media="only screen and (min-width: 961px)" href="widescreen.css">
--> 
    </head>
    <body>
          <div id="nav">
            <a id="shop">Shop <span id="carot">&#x0002B</span></a>
            <a id="hamburger" class="hide">&#9776</a>
            <a id="info" href="info.php">Info</a>
            <h1 class="title"><a href="index.php">Plant Market</a></h1>
            <?php if($_COOKIE['loggedin'] == 'yes' && $_COOKIE['customer'] == 'yes'){
            ?>
                <a id="order-history" href="orderhistory.php">Past Orders</a>
            <?php
            }else{
            ?>
                <a id="login" href="login.php">Login</a>
            <?php
            }
            ?>
            <div id="cart"><a href="cart.php">Cart</a></div>
        </div>
        <div id="nav-links" class="cont">  
            <span>
                <ul id="mobile-links" class="hide">
                    <li class="list-head"><a id="info" href="info.php">Info</a></li>
                    <li class="list-head"><div id="cart"><a href="cart.php">Cart</a></div></li>
                    <?php if($_COOKIE['loggedin'] == 'yes' && $_COOKIE['customer'] == 'yes'){
                    ?>
                        <li class="list-head"><a id="order-history" href="orderhistory.php">Past Orders</a></li>
                        <li class="list-head"><a id="logout" href="logout.php">Logout</a></li>
                    <?php
                    }else{
                    ?>
                       <li class="list-head"><a id="login" href="login.php">Login</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </span>
            <span>
                <ul>
                <li class="list-head">Plants</li>
                <li><a class="list-item" data-type="all">Everything</a></li>
                <li><a class="list-item" data-type="bestseller">Best Sellers</a></li>
                <li><a class="list-item" data-type="succulent">Succulents</a></li>
                <li><a class="list-item" data-type="tropical">Tropicals</a></li>
                <li><a class="list-item" data-type="big">Big Plants</a></li>
                
                </ul>
            </span>
            <span>
                <ul>
                <li class="list-head">Special Stuff</li>
                <li><a class="list-item" data-type="rare">Rare Plants</a></li>
                <li><a class="list-item" data-type="herb">Herbs</a></li>
                </ul>
                
            </span>
                    
            </div>
        
        <div id="form-content">
            <?php

            if ($_GET['unique']) { ?>

              <p>Enter a unique username</p>

            <?php } ?>
            <?php

            if ($_GET['empty']) { ?>

              <p>Enter a password!</p>

            <?php } ?>
            <?php

            if ($_GET['loggedin']) { ?>

              <p>Oops, you're already logged in!</p>

            <?php } ?>
            <?php

            if ($_GET['alphatest']) { ?>

              <p>Your name must be valid.</p>

            <?php } ?>
            <span class="t">Register for an Account</span>
            <br>
            <br>
            <form action="auth_new_user.php" method="POST">

                <span>Username: </span><input type="text" name="username">
                <br>
                <br>
                <span>Password: </span><input type="text" name="password">
                <br>
                <br>
                <span>First Name: </span><input type="text" name="fname">
                <br>
                <br>
                <span>Last Name: </span><input type="text" name="lname">
                <br>
                <br>
                <input class="submission" type="submit">
              </form>
        </div>
       <script>
            var clicked;
            var navTarget = document.getElementById('nav-links')
            var shopBtn = document.getElementById('shop')
            var carot = document.getElementById('carot')
            var mobileLinks = document.getElementById('mobile-links')
            var navLinks = document.querySelectorAll('#nav a')
            var hamburger = document.getElementById('hamburger')
            
//             hamburger.classList.add('hide')
//                  shopBtn.classList.remove('hide')
//                  mobileLinks.classList.add('hide')
//                  for(let i = 0; i < navLinks.length; i++){
//                      navLinks[2].classList.remove('hide')
//                      navLinks[4].classList.remove('hide')
//                      navLinks[5].classList.remove('hide')
  //          }
            shopBtn.addEventListener('click', showNavBar)
            function showNavBar(){
                if (!clicked){
                    clicked = true;
                    navTarget.style.setProperty('height', '300px', 'important');
                    document.getElementById("content").style.marginTop = "300px";
                    //carot.innerHTML = "&#x022C0"
                    carot.innerHTML = "&#x02013"
                }
                else{
                    hideNavBar()
                }
            }
            

            function hideNavBar(){
                navTarget.style.setProperty('height', '0px', 'important');
                document.getElementById("content").style.marginTop = "0px";
                clicked = false;
                carot.innerHTML = "&#x0002B"
            }
            
          //side hamburger nav bar on mobile  
          
          function mobileNav(x) {
              if (x.matches) { // If media query matches
                  hamburger.classList.remove('hide')
                  hamburger.innerHTML = '&#9776'
                  shopBtn.classList.add('hide')
                  mobileLinks.classList.remove('hide')
                  for(let i = 0; i < navLinks.length; i++){
                      navLinks[2].classList.add('hide')
                      navLinks[4].classList.add('hide')
                      navLinks[5].classList.add('hide')
                  }
              hamburger.addEventListener('click', showNavBarMobile)  
              function showNavBarMobile(){
                if (!clicked){
                    clicked = true;
                    navTarget.style.setProperty('width', '100%', 'important');
                    navTarget.style.setProperty('transition', '.5s', 'important');
                    
                }
                else{
                    hideNavBarMobile()
                }
            }
            

            function hideNavBarMobile(){
                navTarget.style.setProperty('width', '0px', 'important');
                navTarget.style.setProperty('transition', '.7s', 'important');
                clicked = false;
            }
                  
                  
                  
              } else {
                  hamburger.classList.add('hide')
                  shopBtn.classList.remove('hide')
                   for(let i = 0; i < navLinks.length; i++){
                      navLinks[2].classList.remove('hide')
                      navLinks[4].classList.remove('hide')
                      navLinks[5].classList.remove('hide')
                   }
                  
              }
            }

            var x = window.matchMedia("(max-width: 850px)")
            mobileNav(x) // Call listener function at run time
            if (x.matches) {
                navTarget.style.setProperty('width', '0', 'important');
                navTarget.style.setProperty('transition', 'none', 'important');
            }else{
                navTarget.style.setProperty('width', '100%', 'important');
                navTarget.style.setProperty('transition', '.5s', 'important');
            }
            
            
            x.addListener(mobileNav) // Attach listener function on state changes
                    
       
        </script>
    </body>
</html>