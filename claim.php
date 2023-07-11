<?php

    $room  = $_POST['room'];

    if (strlen($room)>20 or strlen($room)<2){
        echo '<script language="javascript">';
        echo 'alert("Not a valid input (choose between 2 to 20)");';
        echo 'window.location="http://localhost/chatroom"';
        echo '</script>';
    }
    elseif (!ctype_alnum($room)){
        echo '<script language="javascript">';
        echo 'alert("Not an alphanumeric input");';
        echo 'window.location="http://localhost/chatroom"';
        echo '</script>';
    }
    else{
        include 'db.php';
    }


    //check if the room already exist
    $sql = "select * from `rooms` where roomname = '$room' ";
    $result = mysqli_query($conn, $sql);

    if($result){

        if(mysqli_num_rows($result)>0){
            echo '<script language="javascript">';
            echo 'alert("Please choose a different name, this name is already in use");';
            echo 'window.location="http://localhost/chatroom"';
            echo '</script>';
        }else{
            $sql = "insert into `rooms` (`roomname`, `stime`) values ('$room', CURRENT_TIMESTAMP);";
            if (mysqli_query($conn, $sql))
            {
                echo '<script language="javascript">';
                echo 'alert("Room Ready");';
                echo 'window.location="http://localhost/chatroom/rooms.php?roomname=' . $room . '";';
                echo '</script>';               
            }
        }

    }
else{
    echo "Error: " . mysqli_error($conn);
}

?>