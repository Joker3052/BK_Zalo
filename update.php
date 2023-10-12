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
        <section class="form update userUpdate" >
            <header> <div class="content">
            <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
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
            </div></header>
            <form action="#"  enctype="multipart/form-data">        
                <div class="error-txt"></div>
                    <div class="field input">
                        <label >Họ và tên</label>
                        <input type="text" name="fullname" value="<?=$row['fullname'] ?>" required>
                    </div>
                    <div class="field input">
                        <label >Địa chỉ email</label>
                        <input type="text" name="email" value="<?=$row['email']?>" required>
                    </div>
                    <div class="field input">
                        <label >Mật khẩu</label>
                        <input type="password" name="password" value="<?=$row['password'] ?>" readonly>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label >chọn ảnh</label>
                        <input type="file"  name="image" >
                    </div>
                    <div class="field button">
                        <input type="submit" value="cập nhật">
                    </div>              
            </form>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/update.js"></script>
</body>
</html>