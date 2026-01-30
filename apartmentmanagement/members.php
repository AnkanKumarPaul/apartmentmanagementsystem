<!-- http://localhost/phppractice/index.php -->
<?php
include('mymethodsbackend.php');
ob_start();
session_start();
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

            ?>Apt.- Member's Table</h1>

        <div class="card1">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">


                    <form action="" method="post">
                        <input type="text" class="search-input" placeholder="Search name..." name="search">
                        <button class="btn btn-outline-primary new-friend-btn" name="searchbtn"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <div>
                        <a href="memberregistration.php">
                            <button class="btn btn-outline-primary new-friend-btn">
                                <i class="fa-solid fa-plus"></i> Add
                            </button>
                        </a>
                    </div>

                </div>

                <!-- table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mt-2">
                        <thead class="thead-light">
                            <tr>
                                <td><b>ID</b></td>
                                <td><b>Name</b></td>
                                <td><b>Email</b></td>
                                <td><b>Address</b></td>
                                <td><b>Contact No.</b></td>
                                <td><b>Maintenance Charges</b></td>
                                <td><b>Maintenance Dues</b></td>
                                <td><b>Status</b></td>
                                <td><b>Action</b></td>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- sample rows -->

                            <?php
                            if (isset($_GET['search'])) {
                                $search = $_GET['search'];
                                $response = getdatabynameofmemb($search);
                            } else {
                                $response = memdisplaygetalldata($_SESSION['email']);
                            }


                            $size = mysqli_num_rows($response); //ei line ta check korche j array hisebe full data asche seta ache kina

                            if ($size > 0) {
                                $index = 1; // index ta 1,2 kore dekhache
                                while ($row = mysqli_fetch_assoc($response))  // ei array mysqli_fetch_assoc($response) er data loop chalia 1 ta 1 ta kore data $row te store korche
                                {
                                    echo '

                            <tr>
                                <td>
                                   ' . $index . '
                                </td>

                                <td>
                                   ' . $row["name"] . '
                                </td>

                                <td>
                                     ' . $row["email"] . '
                                </td>

                                <td>
                                     ' . $row["address"] . '
                                </td>
                                
                                <td>
                                     ' . $row["contact"] . '
                                </td>

                                <td>
                                     ' . $row["maintaincharge"] . '
                                </td>

                                <td>
                                     ' . $row["maintainchargedues"] . '
                                </td>

                                <td>
                                     ' . $row["status"] . '
                                </td>

                                <td>
                                   <a href="editmember.php?memid=' . $row["memid"] . '">  
                                        <button  class="btn btn-outline-primary new-friend-btn">
                                            <i class="fa fa-edit"></i> Edit
                                        </button> 
                                    </a>

                                    <a  href="members.php?memid=' . $row["memid"] . '">
                                        <button  class="btn btn-outline-primary new-friend-btn">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </a>
                                </td>

                            </tr>
                            ';
                                    $index++;
                                }
                            } else {
                                echo "no records found!!";
                            }

                            ?>

                            <!-- email=' . $row["email"]  kon email diye kaj hoche seta target korche -->
                            <!-- <button class="btn btn-sm btn-info"><i class="fa fa-search"></i> Details</button> -->

                            <!-- add more rows as needed -->
                        </tbody>
                    </table>

                </div>
            </div> <!-- card-body -->
        </div> <!-- card -->
    </div> <!-- container -->

    <?php
    if (isset($_GET['memid'])) {
        $memid = $_GET['memid'];

        $response = memdelete($memid);

        if ($response == 1) {
            header('location:members.php');
        } else {
            echo "Somthing went wrong";
        }
    }
    ?>

    <!-- Bootstrap JS (optional, for modals etc.) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>