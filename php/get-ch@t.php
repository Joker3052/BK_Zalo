<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
   include_once "config.php";
   $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
   $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
   $output="";
           $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id= {$outgoing_id} AND incoming_msg_id = {$incoming_id})
        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_msg_id'] === $outgoing_id)// a sender
            { 
                $img_name = $row['msg']; 
       
        // explode image and get the last extension like jpeg, png, jpg
        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode); // here we get the extension of an user upload img file
        $extensions = ["jpeg", "png", "jpg"];// here some vaild img ext and we have store them to array
        if(in_array($img_ext, $extensions) === true)
        {
            $output .= '<div class="chat outgoing">
                            <div class="details">
                            <img class="img-text" src="php/files/'. $row['msg'] .'" alt="">
                            </div>
                            </div>';
        }
        else{
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                            </div>
                            </div>';
    }
            }else // a receiver
            {
                $img_name = $row['msg']; 
       
                // explode image and get the last extension like jpeg, png, jpg
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode); // here we get the extension of an user upload img file
                $extensions = ["jpeg", "png", "jpg"];// here some vaild img ext and we have store them to array
                if(in_array($img_ext, $extensions) === true)
                {
                    $output .= '<div class="chat incoming">
                    <img class="img-user" src="php/images/'.$row['img'].'" alt="">
                                    <div class="details">
                                    <img class="img-text" src="php/files/'. $row['msg'] .'" alt="">
                                    </div>
                                    </div>';
                }
                else{
                $output .= '<div class="chat incoming">
                            <img class="img-user" src="php/images/'.$row['img'].'" alt="">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                            </div>
                            </div>';
            }
            }
        }

        // $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
        // WHERE (outgoing_msg_id= {$outgoing_id} AND incoming_msg_id = {$incoming_id})
        // OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
// $query = mysqli_query($conn, $sql);
// if(mysqli_num_rows($query) > 0){
//     while($row = mysqli_fetch_assoc($query)){
//         if($row['outgoing_msg_id'] === $outgoing_id)
//{
//             $output .= '<div class="chat outgoing">
//                         <div class="details">
//                             <p>'. $row['msg'] .'</p>
//                         </div>
//                         </div>';
//         }else{
//             $output .= '<div class="chat incoming">
//                         <img src="php/images/'.$row['img'].'" alt="">
//                         <div class="details">
//                             <p>'. $row['msg'] .'</p>
//                         </div>
//                         </div>';
//         }
//     }
    }else{
        $output .= '<div class="text">không có tín nhắn nào giữa 2 bạn!</div>';
    }
    echo $output;
  
}
  else
  {
    header("location: ../login.php");
  }


  