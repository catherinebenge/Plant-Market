<! doctype html>
<html>
    <head>
        <title>Final Project | Plant Market</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" media="only screen and (max-width: 480px)" href="mobile.css">
        <link rel="stylesheet" media="only screen and (min-width: 481px) and (max-width: 850px)" href="medscreen.css">
        <link href="main.css" rel="stylesheet" type="text/css">
        
<!--        google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500&display=swap" rel="stylesheet">
<!--
        <link rel="stylesheet" media="only screen and (max-width: 480px)" href="mobile.css">
        <link rel="stylesheet" media="only screen and (min-width: 481px) and (max-width: 960px)" href="medscreen.css">
        <link rel="stylesheet" media="only screen and (min-width: 961px)" href="widescreen.css">
--> 
    <style>
    </style>
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
        
        <div id="content">
            <script src="assets.js"></script>
            
<!--
         <div class="product">
            <img class="img" src="assets/plant_photos/ginseng.jpg" width="100%">
            <span class="name">Ficus Ginseng</span>
            <span class="price">$30</span>
         </div> 
         <div class="product">
            <img class="img" src="assets/plant_photos/ginseng.jpg" width="100%">
            <span class="name">Ficus Ginseng</span>
            <span class="price">$30</span>
         </div> 
-->
            
            <script>
             
            //js for the plant photo displays, can be appended to cart and led to full page on click
            //setting refs up here
            var content = document.getElementById('content')
        for(i = 0; i < images.length; i++){
            //building container, inserting images, prices, etc. - all coming in from assets array
            var newImgContainer = document.createElement('div')
            content.appendChild(newImgContainer)
            newImgContainer.classList.add('product')
            newImgContainer.dataset.type = tags[i]
            
            var newImg = document.createElement('img')
            newImg.classList.add('img')
            newImg.src = images[i]
            newImg.style.width= '100%'
            newImg.setAttribute("loading","lazy")
            newImgContainer.appendChild(newImg)
            
            var plantName = document.createElement('span')
            plantName.classList.add('name')
            plantName.innerHTML = names[i]
            newImgContainer.appendChild(plantName)
            
            var plantPrice = document.createElement('span')
            plantPrice.classList.add('price')
            plantPrice.innerHTML = '$' + prices[i]
            newImgContainer.appendChild(plantPrice)
            
            var popup = document.createElement('div')
            popup.classList.add('popup')
            var popupLink = document.createElement('a')
            popupLink.setAttribute("href","addcart.php")
            newImgContainer.appendChild(popup)
            popup.appendChild(popupLink)
              
            var popupButton = document.createElement('button')
            popupButton.dataset.index = i;
            let index = popupButton.dataset.index
            popupButton.innerHTML = 'Add to Cart'
            popupLink.appendChild(popupButton)
            
            var x;
            popupButton.onclick = function(){ 
                x ++;
                console.log(x)
                index = event.currentTarget.dataset.index
                document.cookie = "img="+images[index];
                document.cookie = "name="+names[index];
                document.cookie = "price="+prices[index];
                
                }
            
        }

            //filtering system for navigation
            var plantList = document.getElementById('plant-list')
            var filters = document.querySelectorAll('.list-item')

                for(let i=0; i < filters.length; i++){
                   filters[i].addEventListener('click',filter)
                   function filter() {
                       let type = event.currentTarget.dataset.type
                       
                       let allProducts = document.querySelectorAll('.product')
                       for (let j = 0; j < allProducts.length; j++) {
                        allProducts[j].classList.add('hide')
                        
                           if(type == allProducts[j].dataset.type){
                               allProducts[j].classList.remove('hide')
                           }else if(type == 'all'){
                               allProducts[j].classList.remove('hide')
                           }
                      }
                       
                   }
                }
             
             //cart popup
             var cartModal = document.querySelectorAll('.popup')
             var product = document.querySelectorAll('.product')
             for(let i=0; i < product.length; i++){
            //console.log(product)
             product[i].addEventListener('mouseover', modalForCart)
             function modalForCart(){
                 cartModal[i].style.height = "30px";
                 //cartModal.style.overflow = "visible";
                 cartModal[i].style.opacity = "1";
                 
             }
             cartModal[i].addEventListener('mouseover', hoverFeature)
             function hoverFeature() {
                 cartModal[i].style.backgroundColor = "#b3f4a6";
             }
             cartModal[i].addEventListener('mouseout', hoverFeature2)
             function hoverFeature2() {
                 cartModal[i].style.backgroundColor = "#90e07f";
             }
             product[i].addEventListener('mouseout',modalOut)
              function modalOut(){
                 cartModal[i].style.height = "20px";
                 //cartModal.style.overflow = "hidden";
                 cartModal[i].style.opacity = "0";
             }
             }
                
                
                
            </script>
            
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