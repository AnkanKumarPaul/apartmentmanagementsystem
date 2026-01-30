<?php
include('mymethodsbackend.php');
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Apartment Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <?php
    include('navbar.php');
    ?>
    <!-- Login Content -->
    <div class="auth-container">
        <div class="auth-box">
            <h2> Apartment Login </h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" required placeholder="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="password">
                </div>
                <button type="submit" class="btns" name="submit">Login</button>
                <br>
                <br>
                <div class="auth-link">
                    <a href="apartmentregister.php">Register</a>
                </div>

            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $response = login($_POST);
        $records = mysqli_num_rows($response);
        if ($records == 1) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            // header('location:dashboard.php');
            echo "login successful";
            header('location:dashboard.php');
        } else {
            echo "login unsuccessfull";
        }
    }
    ?>
</body>

</html>