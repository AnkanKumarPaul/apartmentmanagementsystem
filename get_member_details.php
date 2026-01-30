<?php
include('mymethodsbackend.php');

header('Content-Type: application/json');

$memid = $_GET['memid'];
 
$response = memdisplaygetalldatabyid($memid);
$size = mysqli_num_rows($response);

if ($size == 1) {
    $member = mysqli_fetch_assoc($response);
    echo json_encode([
        "success" => true,
        "member" => $member
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Member not found"
    ]);
}
