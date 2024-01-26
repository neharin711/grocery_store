<!DOCTYPE html>
<html>
<head>
<?php include 'connection.php'; ?>

    <title>Grocery Store Admin</title>
    <link rel="stylesheet" type="text/css" href="admin css.css"/>
</head>
<body>
    <header>
        <h1>Grocery Store Admin Panel</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="admin.php">Dashboard</a></li>
            <li><a href="products.php">Manage Products</a></li>
            <li><a href="orders.php">Manage Orders</a></li>
            <li><a href="customers.php">Manage Customers</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    
    <main>
        <!-- Admin Dashboard -->
        <section id="dashboard">
            <h2>Dashboard</h2>
            <!-- Display important information and statistics about the store. -->
        </section>

        <!-- Manage Products -->
        <section id="products">
            <h2>Manage Products</h2>
            <a href="add_product.html">Add New Product</a>
            <!-- List of products with options to edit or delete them. -->
        </section>

        <!-- Manage Orders -->
        <section id="orders">
            <h2>Manage Orders</h2>
            <a href="category.php">category list</a>
            <!-- List of orders with options to view details or update order status. -->
        </section>

        <!-- Manage Customers -->
        <section id="customers">
            <h2>Manage Customers</h2>
            <a href="registeredusers.php">view details of registred users</a>
            <!-- List of registered customers with options to view their profiles or manage their accounts. -->
        </section>
    </main>
    
    <footer>
        <p>&copy; Rinova Grocery Store</p>
    </footer>
</body>
</html>
