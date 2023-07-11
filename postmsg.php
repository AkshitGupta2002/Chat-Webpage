<?php
    //Connecting to the database
    include 'db.php';
    $msg = $_POST['text'];
    $room = $_POST['room'];
    $ip = $_POST['ip'];

    $sql = " insert into `msgs` (`msg`, `room`, `ip`, `stime`) 
             values ('$msg', '$room', '$ip', CURRENT_TIMESTAMP); ";

    mysqli_query($conn, $sql);
    mysqli_close($conn);
    

?>