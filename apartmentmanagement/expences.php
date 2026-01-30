<!-- http://localhost/phppractice/index.php -->
<?php
include('mymethodsbackend.php');
ob_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Table</title>
    <link rel="stylesheet" href="index.css">
    <!-- Bootstrap 4.6 CDN -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" /> -->
    <!-- Font Awesome for icons (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="stylesheet" href="style.css">
</head>

<body class="body1">

    <?php
    include('navbar.php');
    ?>
    <div class="container">
        <h1>
            <?php
            $response = displaygetapartmenttabledata($_SESSION['email']);


            $size = mysqli_num_rows($response); //ei line ta check korche j array hisebe full data asche seta ache kina

            if ($size > 0) {
                $index = 1; // index ta 1,2 kore dekhache
                while ($row = mysqli_fetch_assoc($response))  // ei array mysqli_fetch_assoc($response) er data loop chalia 1 ta 1 ta kore data $row te store korche
                {
                    echo '

                        
                              <b>' . $row["name"] . '</b>
                        
                            ';
                }
            } else {
                echo "no records found!!";
            }

            ?>Apt.- Member's Expences</h1>
    </div>
</body>

</html>