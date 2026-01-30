

<?php
function connect()
{
    $conn = mysqli_connect("localhost", "root", "", "phpdb");
    // connect ta database connect er jonno,
    //  ("localhost- means local host a run hoche", "root- database user name", "", 
    // "phpdb- created data base in mysql")
    return $conn;
}

function register($data)
{
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $address = $data['address'];
    $contact = $data['contact'];

    $conn = connect();
    $sql = "insert into apartment(name, email, password, address, contact) values('$name','$email','$password', '$address', '$contact' )"; // formulla insert into
    $response = mysqli_query($conn, $sql); // database mysqli_query run korar jonno

    if ($response == 1) {
        return "Registration Success";
    } else {
        return "Registration Failed";
    }
}


function memregister($data)
{
    $email = $data['email'];
    $name = $data['name'];
    $password = $data['password'];
    $address = $data['address'];
    $contact = $data['contact'];
    $maintaincharge = $data['maintaincharge'];

    $conn = connect();
    $sql = "insert into member(email, name, password, address, contact, maintaincharge) values('$email', '$name','$password', '$address', '$contact', '$maintaincharge' )"; // formulla insert into
    $response = mysqli_query($conn, $sql); // database mysqli_query run korar jonno

    if ($response == 1) {
        return "Registration Success";
    } else {
        return "Registration Failed";
    }
}



// arun 
// function memberregister($data)
// {
//     $email = $data['email'];  //red colour er gulo frontend je nam asche seigulo   left side er gulo database theke je nam jache se gulo
//     $name = $data['name'];
//     $contact = $data['contact'];
//     $address = $data['address'];
//     $password = $data['password'];
//     $maintaincharge = $data['maintenancecharge'];
//     $dues = $data['dues'];

//     $conn = connect(); //red colour er gulo frontend je nam asche seigulo,   left side er gulo database theke je nam jache se gulo
//     $sql = "insert into member(email,name,contact,address,password,maintaincharge,dues) values('$email','$name','$contact','$address','$password','$maintaincharge','$dues')";
// //insert into kore j gulo segulo database er column er name. ar values er odhe name gulo upore $ diye left side er gulo
//     $response = mysqli_query($conn, $sql);

//     if ($response == 1) {
//         echo "registration successfull";
//     } else {
//         echo "registration failed";
//     }
// }
// function register($data)
// {
//     $name = $data['name'];
//     $email = $data['email'];
//     $password = $data['password'];
//     $address = $data['address'];
//     $contact = $data['contact'];

//     $conn = connect();
//     $sql = "insert into apartment(name, email, password, address, contact) values('$name','$email','$password', '$address', '$contact' )"; // formulla insert into
//     $response = mysqli_query($conn, $sql); // database mysqli_query run korar jonno

//     if ($response == 1) {
//         return "Registration Success";
//     } else {
//         return "Registration Failed";
//     }
// }
function login($data)
{
    $email = $data['email'];
    $password = $data['password'];

    $conn = connect();
    $sql = "SELECT * FROM apartment WHERE email='$email' and password='$password'";

    $response = mysqli_query($conn, $sql);

    return $response;
}

// for dashboard show all data if found
function displaygetalldata()
{
    $conn = connect();
    $sql = "SELECT * FROM apartment";
    $response = mysqli_query($conn, $sql);

    return $response;
}

function displaygetapartmenttabledata($email)
{
    $conn = connect();
    $sql = "SELECT * FROM apartment where email='$email'";
    $response = mysqli_query($conn, $sql);

    return $response;
}

function memdisplaygetalldata($email)
{
    $conn = connect();
    $sql = "SELECT * FROM member where email='$email'";
    $response = mysqli_query($conn, $sql);

    return $response;
}

function memdisplaygetalldatabyid($memid)
{
    $conn = connect();
    $sql = "SELECT * FROM member where memid='$memid'";
    $response = mysqli_query($conn, $sql);

    return $response;
}

// for dashboard show all data if found

// for dashboard show all data if not found

function getdatabyname($name)
{

    $conn = connect();
    $sql = "SELECT * FROM apartment WHERE name like '%$name%'";
    $response = mysqli_query($conn, $sql);

    return $response;
}
// for dashboard show all data if not found

function getdatabynameofmemb($name)
{

    $conn = connect();
    $sql = "SELECT * FROM member WHERE name like '%$name%'";
    $response = mysqli_query($conn, $sql);

    return $response;
}

function addmembermaint($data)
{
    // session_start();
    $email = $_SESSION['email'];

    $maintaincharge = $data['maintaincharge'];
    $maintainchargedues = $data['maintainchargedues'];
    $TotalMaintenance = $data['TotalMaintenance'];
    $Pay = $data['Pay'];
    $Date = $data['Date'];
    $memid = $data['memid'];

    if ($maintainchargedues < 0) {
        return "paid amount cannot be greater than total amount";
    }

    $conn = connect();
    $sql = "insert into maintenance(email, maintaincharge, maintainchargedues, TotalMaintenance, Pay, Date, memid) values('$email', '$maintaincharge', '$maintainchargedues','$TotalMaintenance', '$Pay', '$Date', '$memid' )"; // formulla insert into
    $response = mysqli_query($conn, $sql); // database mysqli_query run korar jonno

    if ($response == 1) {

        $maintainchargedues = $TotalMaintenance - $Pay;
        updateMemberDues($memid, $maintainchargedues);
        return "Maintanance Added Success";
    } else {
        return "Maintanance Added Failed";
    }
}


function updateMemberDues($memid, $maintainchargedues)
{

    $conn = connect();

    $sql = "UPDATE member set maintainchargedues='$maintainchargedues' where memid='$memid' ";
    $response = mysqli_query($conn, $sql);

    return $response;
}


function updatemember($data)
{
    $memid = $data['memid'];
    $name = $data['name'];
    $address = $data['address'];
    $contact = $data['contact'];
    $maintaincharge = $data['maintaincharge'];
    $maintainchargedues = $data['maintainchargedues'];
    $status = $data['status'];

    $conn = connect();
    $sql = "UPDATE member SET 
                name = '$name',
                address = '$address',
                contact = '$contact',
                maintaincharge = '$maintaincharge',
                maintainchargedues = '$maintainchargedues',
                status = '$status'
            WHERE memid = '$memid'";
    $response = mysqli_query($conn, $sql); // database mysqli_query run korar jonno

    if ($response == 1) {
        return "Registration Success";
    } else {
        return "Registration Failed";
    }
}




function delete($email)
{
    $conn = connect();
    $sql = "DELETE FROM apartment WHERE  email='$email'"; // delete formula
    $response = mysqli_query($conn, $sql);

    return $response;
}

function memdelete($memid)
{
    $conn = connect();
    $sql = "DELETE FROM member WHERE  memid='$memid'"; // delete formula
    $response = mysqli_query($conn, $sql);

    return $response;
}

?>
