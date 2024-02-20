<!--Specifying that we using HTML-->
<!DOCTYPE html>

<!--Specifying that language is English-->
<html lang="en">

    <head>
        <!--Specifying character set-->
        <meta charset="UTF-8"/>
        <!--Title of web page-->
        <title>Teamprotecht</title>
        <!--Attaching css file-->
        <link rel="stylesheet" href="CSS/browse.css" />
        
        <!-- Add java script -->
        <script defer src="JavaScript/script.js"></script>
        <!-- Add icon library -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <!-- Attaching Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Attaching jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Attaching Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    </head>

    <body>
        <!--Creating the navigation bar-->
                <nav>
                    <ul> 
                        <!--3 different tabs with links to each page-->
                        <li><img src="CSS HP/images/logo.png" width="90px" height="65px"></li>
                        <li><a href="Teamprotecht - HomePage.php">Home</a></li>
                        <li><a href="browse.php">Browse</a></li>
                        <li><a href="">About Us</a></li>
                        <li style="float:right"><a href="Product_Basket.php"><i class="fa fa-shopping-basket"></i></a></li>
                        <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
                        
                    </ul>
                </nav>
                

                

                <main>
                  <div class="carousel">
                    <section id="Featured_Phones">
                      <div class="Phones">
                      </div>
                      <div id="FeaturedCarousel" class="carousel slide">
                         <div class="carousel-indicators">
                           <button type="button" data-bs-target="#FeaturedCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                           <button type="button" data-bs-target="#FeaturedCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                           <button type="button" data-bs-target="#FeaturedCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                         </div>
                         <div class="carousel-inner">
                           <div class="carousel-item active">
                             <img src="CSS HP/images/iPhone15.png" class="d-block w-100" alt="iPhone15">
                             <div class="carousel-caption d-none d-md-block">
                               <h3 style="color: white;">The Fabulous IPhone 15</h3>
                             </div>
                           </div>
                           <div class="carousel-item">
                             <img src="CSS HP/images/s23ultra.jpg" class="d-block w-100" alt="s23ultra">
                             <div class="carousel-caption d-none d-md-block">
                               <h3 style="color: white;">Shop the new 23 Ultra</h3>
                        
                               
                             </div>
                           </div>
                           <div class="carousel-item">
                             <img src="CSS HP/images/fold.jpg" class="d-block w-100" alt="fold">
                             <div class="carousel-caption d-none d-md-block">
                               <h5 style="color: white;">Galaxy Fold Available to pre- order</h5>
                               
                               
                             </div>
                           </div>
                         </div>
                         <button class="carousel-control-prev" type="button" data-bs-target="#FeaturedCarousel" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                         </button>
                         <button class="carousel-control-next" type="button" data-bs-target="#FeaturedCarousel" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Next</span>
                         </button>
                       </div>
                      </section>
                  </div>


                    

                  <div class="row">
                    <h1>Featured Products</h1>
                    <div class="column">
                      <img src="CSS HP/images/iphone_15_1.jpg">
                    </div>
                    <div class="column">
                      <img src="CSS HP/images/iphone_15_2.jpg">
                    </div>    
                    <div class="column">
                      <img src="CSS HP/images/iphone_15_3.jpg">
                    </div> 
                    <div class="column">
                      <img src="CSS HP/images/iphone_15_4.jpg">
                    </div>                          
                  </div>

                  
            
                </main>
    </body>