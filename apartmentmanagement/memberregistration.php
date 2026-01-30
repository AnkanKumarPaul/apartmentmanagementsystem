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
            <h2>Members Registration</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label>Member Name</label>
                    <input type="text" name="name" required placeholder="Member name">
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
                    <label>Contact No.</label>
                    <input type="number" name="contact" required placeholder="Contact No.">
                </div>
                <div class="form-group">
                    <label>Maintainence Charge</label>
                    <input type="number" name="maintaincharge" required placeholder="maintaincharge">
                </div>
                <button type="submit" class="btns" name="submit">Register</button>

            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        session_start();
        $email = $_SESSION['email'];
        $_POST['email'] = $email;
        $response = memregister($_POST);
        echo $response;
        header('location:members.php');
    }
    ?>
    <!-- Footer -->

</body>

</html>