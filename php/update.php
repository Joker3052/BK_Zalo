<?php
   session_start();
   include_once "config.php";
   $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
   if(mysqli_num_rows($sql) > 0){
     $row = mysqli_fetch_assoc($sql);
   }
   $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
  //  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
   if(!empty($fullname)  && !empty($email))
   {
    //check user email is valid or not
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        //check eamil exist or not
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if((mysqli_num_rows($sql) > 0)&&($email!=$row['email'])) // email exist
        {
            echo "$email - This email already exist!";
        }
        else
        {
            //check user upload file or not
            if(isset($_FILES['image'])) //if file is uploaded
            {
                // echo 'success1';
                $img_name = $_FILES['image']['name']; //getting user uploaded img name
                // $img_type = $_FILES['image']['type']; //getting user uploaded img type
                $tmp_name = $_FILES['image']['tmp_name']; //this temporary name is used to save/move save file in our folder
               
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
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name,"images/".$new_img_name)) //if img move to our folder sussecfully
                    {
                        // echo 'success3';
                        $status = "Active now";// once signed up then his status will be active now
                    //    $random_id = rand(time(),100000000);// create random id for user 
                       //let's  insert all user data inside table
                    //    $sql2 = mysqli_query($conn,"UPDATE users (unique_id, fullname, email, password, img, status) 
                    //    SET ({$random_id}, '{$fullname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')" );
                    // $encrypt_pass = md5($password);
                    $sql2 = mysqli_query($conn,"UPDATE users SET fullname='{$fullname}' ,email='{$email}' , img='{$new_img_name}'
                     WHERE unique_id={$_SESSION['unique_id']}" );
                    //   UPDATE Customers
                    //   SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                    //   WHERE CustomerID = 1;
                       if($sql2)// if these data inserted 
                      {
                        // echo 'success4';
                        echo "success";
                      }
                      else{
                        echo "something went wrong";
                      }
                    }
                   
                }
                else
                {
                    // echo 'pl upload the img1';
                    $status = "Active now";// once signed up then his status will be active now
                    //    $random_id = rand(time(),100000000);// create random id for user 
                       //let's  insert all user data inside table
                    //    $sql2 = mysqli_query($conn,"UPDATE users (unique_id, fullname, email, password, img, status) 
                    //    SET ({$random_id}, '{$fullname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')" );
                    $sql2 = mysqli_query($conn,"UPDATE users SET fullname='{$fullname}' ,email='{$email}' , img='{$row['img']}'
                     WHERE unique_id={$_SESSION['unique_id']}" );
                    //   UPDATE Customers
                    //   SET ContactName = 'Alfred Schmidt', City= 'Frankfurt'
                    //   WHERE CustomerID = 1;
                       if($sql2)// if these data inserted 
                      {
                        // echo 'success4';
                        echo "success";
                      }
                      else{
                        echo "something went wrong";
                      }
                }
            }
            else{
                 echo 'pl upload the img';
            }
        }

        }
        else{
            echo "$email is not a valid email!";
        }

   }
   else{// user haven't signup/login yet
    echo 'required666';
    // header('location: users.php');
   }
?>