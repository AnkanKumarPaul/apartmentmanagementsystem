<?php
include('mymethodsbackend.php');
ob_start();
// session_start();
// $memid = $_GET['email'];

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
            <h2> <?php
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

                    ?>Apt.- <br> Member's Maintenance</h2>
            <form action="" method="POST">

                <div class="form-group">
                    <label>Select Member</label>
                    <select name="memid" onchange="getMemberData(this.value)">
                        <option value="">Select</option>
                        <?php
                        $response = memdisplaygetalldata($_SESSION['email']);
                        while ($row = mysqli_fetch_assoc($response))  // ei array mysqli_fetch_assoc($response) er data loop chalia 1 ta 1 ta kore data $row te store korche
                        {
                            echo '<option value="' . $row["memid"] . '">
                                    ' . $row["name"] . '
                                  </option> ';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Maintenance Charges</label>
                    <input type="number" name="maintaincharge" id="maintaincharge" placeholder="Maintenance Charges" readonly>
                </div>
                <div class="form-group">
                    <label>Maintenance Charges Dues</label>
                    <input type="number" name=" " id="maintainchargedues" placeholder="Maintenance Charges Dues" readonly>
                </div>
                <div class="form-group">
                    <label>Total Maintenance</label>
                    <input type="number" name="TotalMaintenance" id="TotalMaintenance" placeholder="Total Maintenance" readonly>
                </div>
                <div class="form-group">
                    <label>Pay</label>
                    <input type="number" name="Pay" id="Pay" placeholder="Enter Total Pay">
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="Date" required placeholder="Date">
                </div>
                <button type="submit" class="btns" name="submit">Pay</button>

            </form>
        </div>
    </div>



    <?php
    if (isset($_POST['submit'])) {
        // session_start();
        $email = $_SESSION['email'];
        $_POST['email'] = $email;
        $response = addmembermaint($_POST);
        echo $response;
        header('location:members.php');
    }
    ?>


    <script>
        function getMemberData(memid) {

            if (memid === "") {
                return; // nothing selected
            }
            fetch("get_member_details.php?memid=" + memid)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById("maintaincharge").value = data.member.maintaincharge;
                        document.getElementById("maintainchargedues").value = data.member.maintainchargedues;
                        // document.getElementById("memid").value = data.member.maintainchargedues;

                        let maintaincharge = Number(document.getElementById("maintaincharge").value);
                        let maintainchargedues = Number(document.getElementById("maintainchargedues").value);

                        let TotalMaintenance = maintaincharge + maintainchargedues;
                        document.getElementById("TotalMaintenance").value = TotalMaintenance;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error("Error:", error));
        }
    </script>
</body>

</html>