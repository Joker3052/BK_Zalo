<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
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
        <section class="form signup" >
            <header>BKzalo</header>
            <form action="#" enctype="multipart/form-data">        
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label >Họ</label>
                        <input type="text" name="fname" placeholder="nhập họ" required>
                    </div>
                    <div class="field input">
                        <label >Tên</label>
                        <input type="text" name="lname" placeholder="nhập tên" required>
                    </div>
                </div>
                    <div class="field input">
                        <label >Đại chỉ email</label>
                        <input type="text" name="email" placeholder="nhập email" required>
                    </div>
                    <div class="field input">
                        <label >Mật khẩu</label>
                        <input type="password" name="password" placeholder="nhập mật khẩu" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label >chọn ảnh</label>
                        <input type="file" name="image" required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="đăng kí">
                    </div>              
            </form>
            <div class="link">Bạn đã có tài khoản? <a href="login.php">đăng nhập ngay</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>