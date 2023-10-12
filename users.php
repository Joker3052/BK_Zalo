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
    <style>img[alt="www.000webhost.com"]{display:none;}</style>
  </head>
<body>
    <div class="wrapper">
        <section class="users">
           <header>
            <div class="content">
            
            <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
            <a href="update.php">
                <img src="php/images/<?php echo $row['img'] ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fullname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div></a>
            </div>
            <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
           </header>
           <div class="search">
            <span class="text" >Tìm kiếm</span>
            <input type="text" placeholder="nhập tên người cần tìm kiếm....">
            <button><i class="fas fa-search"></i></button>
           </div>
           <div class="users-list">
            <!-- <a href="#">
            <div class="content">
                <img src="pic/pic1.jpg" alt="">
                <div class="details">
                    <span>Coding Nepal</span>
                    <p>Active now</p>
                </div>
            </div>
            <div class="status-dot"><i class="fas fa-circle"></i></div>
            </a> -->
           </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>