<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BKzalo</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <section class="chat-area">
           <header>
           <?php 
           $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fullname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
           </header> 
           <div class="chat-box">
            <!-- <div class="chat outgoing">
                <div class="details">
                    <p>123456</p>
                </div>
            </div>   
            <div class="chat incoming">
                <img src="pic/pic1.jpg" alt="">
                <div class="details">
                    <p>123456</p>
                </div>
            </div> -->
            
        </div>
        <form action="#" class="typing-area" autocomplete="off">
            <!-- use to hiden inputs to send msg_sender_id and msg_receiver_id -->
            <!-- msg_sender_id -->
            <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']?>" hidden>
            <!-- msg_receiver_id -->
            <input type="text" name="incoming_id" value="<?php echo $user_id?>" hidden> 
            <input type="text" name="message" class="input-field" placeholder="Type a message here...">
            <button><i class="fa-solid fa-paper-plane"></i></button>
            <!-- <button><i class="fa-solid fa-heart"></i></button> -->
            <!-- <button><i class="fa-solid fa-thumbs-up"></i></button> -->
        </form>
        </section>
    </div>
    <script src="javascript/chat.js"></script>
</body>
</html>