<?php
//session_start();

// Include the database connection code
include('connection.php');
include('login.php');  // Added semicolon here
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header('Location: loginmain.php');
    exit();
}

// Get the username from the session variable
$username = $_SESSION['username'];

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RINOVA Store</title>
    <link rel="stylesheet" type="text/css" href="cccccc.css" />
    <link rel="stylesheet" type="text/css" href="productcss.css" />
    <link rel="shortcut icon" href="images/shortcut.jfif" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

 <!-- Add CSS for the "Add to Cart" button -->
 <style>
        .add-to-cart-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-to-cart-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>


</head>
<body>

<h1>Welcome, <?php echo $username; ?>!</h1>


    <!--==Navigation================================-->
    <nav class="navigation">
        <!--logo-------->
        <a href="index.html" class="logo">
            <span>e</span>RINOVA
        </a>
        <!--menu-btn---->
        <input type="checkbox" class="menu-btn" id="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="nav-icon"></span>
        </label>
        <!--menu-------->
        <ul class="menu">
            <li><a href="index.html" class="active">Home</a></li>
            <li><a href="#category">Categories</a></li>
            <li><a href="#popular-bundle-pack">Our Packages</a></li>
            <li><a href="#download-app">Our App</a></li>
            <li><a href="cart.html">add to cart-btn</a></li>
            
        </ul>
        <!--right-nav-(cart-like)-->
        <div class="right-nav">
            <!--like----->
            
            <!--right-nav-(cart-like)-->
<div class="right-nav">
    <!--register----->
    <a href="registration.html" class="register">
        Register
    </a>
    <!--login----->
    <a href="loginmain.php" class="login">
        Login
    </a>
    <!--like----->
    
</div>

        </div>
    </nav>
    <!--nav-end--------------------->
    <!--==Search-banner=======================================-->
    <section id="search-banner">
        <!--bg--------->
        <img src="images/backk2.jfif" class="bg-1" alt="bg">
        <img src="images/bg5.jfif" class="bg-2" alt="bg-2">
        <!--text------->
        <div class="search-banner-text">
            <h1>Order Your daily Groceries</h1>
            <strong>#Free Delivery</strong>
            <!--search-box------>
            <form action="" class="search-box">
                <!--icon------>
                <i class="fas fa-search"></i>
                <!--input----->
                <input type="text" class="search-input" placeholder="Search your daily groceries" name="search" required>
                <!--btn------->
                <input type="submit" class="search-btn" value="Search">
            </form>
        </div>
    </section>
    <!--search-banner-end--------------->
    <!--==category=========================================-->
    <section id="category">
        <!--heading---------------->
        <div class="category-heading">
            <h2>Category</h2>
            <span>All</span>
        </div>
        <!--box-container---------->
        <div class="category-container">
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/fishlogo.jfif" alt="Fish">
                <span>Fish & Meat</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/veglogo.jfif" alt="Fish">
                <span>Vegatbles</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/capsulelogo.jfif" alt="Fish">
                <span>Medicine</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/babylogo.jfif" alt="Fish">
                <span>Baby</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/officelogo.jfif" alt="Fish">
                <span>Office</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/beautylogo.jfif" alt="Fish">
                <span>Beauty</span>
            </a>
            <!--box---------------->
            <a href="#" class="category-box">
                <img src="images/gardeninglogo.jfif" alt="Fish">
                <span>Gardening</span>
            </a>
        </div>
        
    </section>
    <!--category-end----------------------------------->
    <!-- Products section -->
    
    <section id="popular-product">
        <div class="product-heading">
            <h3>Popular Product</h3>
            <span>All</span>
        </div>

        <div class="product-container">
          
    <?php
// Retrieve products from the database
$productQuery = 'select * from products';


//$result = $connect->query($sql);
$productResult = mysqli_query($connect, $productQuery);


// Check if there are products
if ($productResult) {
    // Fetch and display products
   while ($row = mysqli_fetch_assoc($productResult)) {
       $productID = $row['productID'];
        $productName = $row['productName'];
        $productPrice = $row['productPrice'];
        $quantity = $row['quantity'];
        $category = $row['category'];
        $image = $row['image'];

        // Display product information (you can customize this based on your layout)
        echo "<div class = 'product-box'>";
        echo "<img class='product-box img product-box strong' src='$image' alt='$productName'>";
        echo "<p class='cart-btn'>ID: $productID</p>";
        echo "<p>Name: $productName</p>";
        echo "<p>Price: $productPrice</p>";
        echo "<p>Quantity: $quantity</p>";
        echo "<p>category: $category</p>";

         // Add an "Add to Cart" button with a link to cart.html
         echo "<form action='cart.php' method='post'>";
         echo "<input type='hidden' name='productID' value='$productID'>";
         echo "<input type='submit' class='add-to-cart-btn' value='Add to Cart'>";
         echo "</form>";
        
        echo "</div>";
   }
}
 else {
    echo "Error retrieving products: " . mysqli_error($connect);

 }

 


// Close the database connection
mysqli_close($connect);
?>
          
       </div>
    </section>
   
    
    <!--==Clients===============================================-->
    <section id="clients">
        <!--heading---------------->
        <div class="client-heading">
            <h3>What Our Client's Say</h3>
        </div>
        <!--box-container---------->
        <div class="client-box-container">
            <!--box------------->
            <div class="client-box">
                <!--==profile===-->
                <div class="client-profile">
                    <!--img--->
                    <img src="images/client2.jfif" alt="client">
                    <!--text-->
                    <div class="profile-text">
                        <strong>James Mcavoy</strong>
                        <span>CEO</span>
                    </div>
                </div>
                <!--==Rating======-->
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!--==comments===-->
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat ea id, itaque architecto atque mollitia aperiam voluptatem consequatur incidunt sed placeat, harum recusandae quaerat at hic labore eius laborum quas!</p>
            </div>
            <!--box------------->
            <div class="client-box">
                <!--==profile===-->
                <div class="client-profile">
                    <!--img--->
                    <img src="images/ayaan.jpg" alt="client">
                    <!--text-->
                    <div class="profile-text">
                        <strong>Muhammed Ahyaan</strong>
                        <span>Software Developer</span>
                    </div>
                </div>
                <!--==Rating======-->
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!--==comments===-->
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat ea id, itaque architecto atque mollitia aperiam voluptatem consequatur incidunt sed placeat, harum recusandae quaerat at hic labore eius laborum quas!</p>
            </div>
            <!--box------------->
            <div class="client-box">
                <!--==profile===-->
                <div class="client-profile">
                    <!--img--->
                    <img src="images/client3.jfif" alt="client">
                    <!--text-->
                    <div class="profile-text">
                        <strong>Ava Alex</strong>
                        <span>Marketer</span>
                    </div>
                </div>
                <!--==Rating======-->
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <!--==comments===-->
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat ea id, itaque architecto atque mollitia aperiam voluptatem consequatur incidunt sed placeat, harum recusandae quaerat at hic labore eius laborum quas!</p>
            </div>
        </div>
    </section>
    <!--client-section-end---------->
    <!--==Partnre-logo================================-->
    <section id="partner">
        <!--heading------------>
        <div class="partner-heading">
            <h3>Our Trusted Partner</h3>
        </div>
        <!--logo-container----->
        <div class="logo-container">
            <img src="images/adidas.jfif" alt="logo">
            <img src="images/skechers.jfif" alt="logo">
            <img src="images/mc d.jfif" alt="logo">
            <img src="images/paragon.jfif" alt="logo">
        </div>
    </section>
    <!--logo-section-end--------------------->
    <!--==download-app====================================-->
    <section id="download-app">
        <!--img----------------------->
        <div class="app-img">
            <img src="images/app.jfif" alt="app">
        </div>
        <!--text---------------------->
        <div class="download-app-text">
            <strong>Download App</strong>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id officiis, ratione, non doloribus similique nam aliquam doloremque, ipsa neque voluptas at recusandae est cumque ipsum. Vel sint libero odit placeat?</p>
            <!--btns------->
            <div class="download-btns">
                <a href="#"><img src="images/app store.jfif" alt=""></a>
               
               
            </div>
        </div>
    </section>
    <!--download-app-section-end------------------------->
    <!--==Footer=============================================-->
    <footer>
        <div class="footer-container">
            <!--logo-container------>
            <div class="footer-logo">
                <a href="#"><span>e</span>Grocery</a>
                <!--social----->
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <!--links------------------------->
        <div class="footer-links">
            <strong>Product</strong>
            <ul>
                <li><a href="#">Clothes</a></li>
                <li><a href="#">Packages</a></li>
                <li><a href="#">Popular</a></li>
                <li><a href="#">New</a></li>
            </ul>
        </div>
        <!--links------------------------->
        <div class="footer-links">
            <strong>Category</strong>
            <ul>
                <li><a href="#">Beauty</a></li>
                <li><a href="#">Meats</a></li>
                <li><a href="#">Kids</a></li>
                <li><a href="#">Clothes</a></li>
            </ul>
        </div>
        <!--links-------------------------->
        <div class="footer-links">
            <strong>Contact</strong>
            <ul>
                <li><a href="#">Phone : +123456789</a></li>
                <li><a href="#">Email : Example@gmail.com</a></li>
            </ul>
        </div>
        </div>
    </footer>
<!-- ... Your existing HTML content ... -->

<!-- Add a script tag just before the closing </body> tag -->


<script>
    error_reporting(E_ALL);
ini_set('display_errors', 1);
        // Add an event listener for all "Add to Cart" buttons
        const cartButtons = document.querySelectorAll(".cart-btn");

        cartButtons.forEach(button => {
            button.addEventListener("click", function () {
                // Get the unique product identifier from the data attribute
                const productId = this.getAttribute("data-product-id");

                // Redirect to the cart page with the product identifier as a query parameter
                window.location.href = `cart.html?product=${productId}`;
            });
        });
    </script>



</body>
</html>

