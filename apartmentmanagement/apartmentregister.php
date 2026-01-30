<?php
include('mymethodsbackend.php');
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Apartment Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include('navbar.php');
    ?>

    <!-- Register Content -->
    <div class="auth-container">
        <div class="auth-box2">
            <h2>Apartment Registration</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Apartment Name</label>
                    <input type="text" name="name" required placeholder="apartment name">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" required placeholder="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="password">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" required placeholder="address">
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="contact" required placeholder="phone number">
                </div>

                <button type="submit" class="btns" name="submit">Register</button>
                <br>
                <br>
                <div class="auth-link">
                    <a href="index.php">Login</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $response = register($_POST);
        echo $response;
        header('location:index.php');
    }
    ?>
    <!-- Footer -->

</body>

</html>