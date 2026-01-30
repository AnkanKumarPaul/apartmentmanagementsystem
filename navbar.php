<!-- <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />

<nav class="navbar">
    <div class="nav-container">

        <h2 class="logo">🏢 Apartment Management</h2>

        <ul class="nav-links">
            <li><a href="Dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
            <li><a href="member.php"><i class="fa-solid fa-user-group"></i> Members</a></li>
            <li><a href="#"><i class="fa-regular fa-money-bill-1"></i> Expenses</a></li>
            <li><a href="#"><i class="fa-solid fa-bell-concierge"></i> Maintenance</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
        </ul>
    </div>
</nav> -->



<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />

<nav class="navbar">
    <div class="nav-container">
        <h2 class="logo">🏢 Apartment Management</h2>

        <ul class="nav-links">
            <?php if (isset($_SESSION['email'])) { ?>
                <li><a href="Dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a></li>
                <li><a href="members.php"><i class="fa-solid fa-user-group"></i> Members</a></li>
                <li><a href="expences.php"><i class="fa-solid fa-scale-balanced"></i> Expenses</a></li>
                <li><a href="maintenance.php"><i class="fa-regular fa-money-bill-1"></i> Maintenance</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></li>
            <?php } else { ?>
                <li><a href="index.php"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                <li><a href="apartmentregister.php"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                <li><a href="apartmentregister.php"><i class="fa-solid fa-circle-exclamation"></i> Help</a></li>
            <?php } ?>
        </ul>

    </div>
</nav>