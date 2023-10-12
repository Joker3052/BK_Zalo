<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
   include_once "config.php";
   $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
   $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  echo $message;
  if(!empty($message)){

    {
       $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                   VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
    }
    
}
elseif(isset($_FILES['file'])) //if file is uploaded
    {
        // echo 'success1';
        $img_name = $_FILES['file']['name']; //getting user uploaded img name
        // $img_type = $_FILES['image']['type']; //getting user uploaded img type
        $tmp_name = $_FILES['file']['tmp_name']; //this temporary name is used to save/move save file in our folder
       
        // explode image and get the last extension like jpeg, png, jpg
        $img_explode = explode('.',$img_name);
        $img_ext = end($img_explode); // here we get the extension of an user upload img file
        $extensions = ["jpeg", "png", "jpg"];// here some vaild img ext and we have store them to array
        if(in_array($img_ext, $extensions) === true) //if user uploaded img ext is macthed woth any array extensions
        {
            // echo 'success2';
             $time =time();// this will returns us current time , because when you aploading 
            //  img in our folder we rename user file with current time , so all current file have a unique name
             
            //move img to particular folder
            $mess = $time.$img_name;
            if(move_uploaded_file($tmp_name,"files/".$mess)) //if img move to our folder sussecfully
            {
              $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
              VALUES ({$incoming_id}, {$outgoing_id}, '{$mess}')") or die();
              echo "succsess";                   
            }                 
        }
       
    }   
}
  else
  {
    header("location: ../login.php");
  }


  