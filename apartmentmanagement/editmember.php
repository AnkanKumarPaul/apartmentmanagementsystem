<?php
include('mymethodsbackend.php');
ob_start();

$memid = $_GET['memid']; //ekhane memid ta k ager page theke tanlam

$response = memdisplaygetalldatabyid($memid); //ekhane sob data ja memid te ache segulo k store korlam response a

$member = mysqli_fetch_assoc($response); //jehetu format thik ney tai formal thik korte member er store korlam assoc diye

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
            <h2>
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

                ?>Apt.- Member Edit</h2>
            <form action="" method="POST">
                <input type="hidden" name="memid" value="<?php echo $memid; ?>">

                <div class="form-group">
                    <label>Member Name</label>
                    <input type="text" name="name" placeholder="Member name" value="<?php echo $member['name']; ?>">
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="address" value="<?php echo $member['address']; ?>">
                </div>
                <div class="form-group">
                    <label>Contact No.</label>
                    <input type="number" name="contact" placeholder="Contact No." value="<?php echo $member['contact']; ?>">
                </div>
                <div class="form-group">
                    <label>Maintainence Charge</label>
                    <input type="number" name="maintaincharge" placeholder="maintaincharge" value="<?php echo $member['maintaincharge']; ?>">
                </div>
                <div class="form-group">
                    <label>Maintainence Dues</label>
                    <input type="number" name="maintainchargedues" placeholder="maintainchargedues" value="<?php echo $member['maintainchargedues']; ?>">
                </div>
                <div class="form-group">
                    <label>Status: <?php echo $member['status']; ?></label>
                    <select name="status" required>
                        <option value="">Select</option>
                        <option value="Active" <?php if ($member['status'] == 'Active') ?>>Active</option>
                        <option value="Deactive" <?php if ($member['status'] == 'Deactive') ?>>Deactive</option>
                    </select>
                </div>

                <button type="submit" class="btns" name="submit">Save</button>

            </form>
        </div>
    </div>






    <?php
    if (isset($_POST['submit'])) {
        // session_start();
        $email = $_SESSION['email'];
        $_POST['email'] = $email;
        $response = updatemember($_POST);
        echo $response;
        header('location:members.php');
    }
    ?>

</body>

</html>