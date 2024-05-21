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
    <div class="layer"></div>
    <div class="main" >
    <div class="left">
       <img src="facebook.png" alt="">
        <p >conect with friends and the world around you on facebook</p>

    </div>
    <div class="right">
        <form action="login.php" method="POST" >
            <div class="form_body">
                <?php if(isset($user_error)){ echo $user_error ;} ?>
                <input type="text" placeholder="Email" name='email' required >
                <?php if(isset($pass_error)){ echo $pass_error ;} ?>
                <input type="password" placeholder="password" name='password' required >
        <button type="submit" class="login" >log in</button>
        <a id='new_account' href="register.php">create new account</a>
<hr>
</form>
</div>
   </header> 
</body>
</html>