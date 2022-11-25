<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}");
    $output = "";
    if(mysqli_num_rows($sql) > 0){
    //    while($row =mysqli_fetch_assoc($sql))
    //    {
    //     $output .= ' <a href="#">
    //     <div class="content">
    //         <img src="php/images/'.$row['img'].'" alt="">
    //         <div class="details">
    //             <span>'.$row['fname']. " " . $row['lname'].'</span>
                
    //         </div>
    //     </div>
    //     <div class="status-dot"><i class="fas fa-circle"></i></div>
    //     </a>';
    //    }
    include_once('data.php');
    }
    else
    {
        $output .= "hiện không có người dùng nào khác";
    }
    echo $output;
