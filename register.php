<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="database.css">
    <title>facebook</title>
</head>
<body>
   <header> 
<div class="signup" id="signup">
    <div class="top">
        <div>
        <h2>sign up</h2>
        <p>it is easy</p>
    </div>
    </div>
    <hr>
    <form method="POST" action="register_post.php"> 
        <div class="Signup_body">
           
        <div class="Name">
                <?php if(isset($name_error)){echo $name_error ;} ?>
                <input type="text" placeholder="first name" name="first_name"  class="same" required>
                <input type="text" placeholder="last name" name="last_name" class="same" required>
        </div>
        
            <div class="Button">
            
            <?php if(isset($email_error)){echo $email_error ; }?>

                <input type="text" placeholder="email" name="email"  autocapitalize="off" required>
                <?php if(isset($phone_error)){echo $phone_error ; }?>
                <input type="text" placeholder="phone number" name="phone" required>
                
                <?php if(isset($password_error)){ echo $password_error ; }?>

                <input type="password" placeholder="password" name="password" required>
            </div>
     </div>
     <div class="Birthday">
        <p class="text ">Birthday</p>
        <input type="date" id="birthday" name="birthday">
<div class="Content">
    <p> People Who Use Our Services May Have Uploaded For Contact Information To Facebook. <span class="Blue "> Learn More</span></p>
    <p> By Clicking Sign Up, You agree to uor Terms, <span class="Blue "> Privacy Policy and Cookies Policy </span>. You may receive
    SMS
Notifications from us and can opt out any time.
</p>
</div>
<button type="submit" class="signin" name="signup">Sign Up</button>

<a id='has_account' href="index.php">Already has account</a>
    </form>
</div>
   </header> 
</body>
</html>