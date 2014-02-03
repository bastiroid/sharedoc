<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

    <div class="container">
        <div class="form">
            <div class="form_header">
                
                    <h1>Login To Your Sharedoc</h1>
                
            </div>
            <div id="login" class="form-action show">
                <form action="" method="post">
                    <ul>
                        <li>
                            <label for="email"></label>
                            <input type="text" placeholder="Email" name="email" id="email" value="<?= escape(Input::get('email')) ?>"/>
                        </li>
                        <li>
                            <label for="password"></label>
                            <input type="password" placeholder="Password" />
                        </li>
                        <li>
                            <label for="remember">
                            <input type="checkbox" name="remember" id="remember">
                                Remember me
                            </label>
                        </li>
                        <li>
                            <input type="hidden" name="token" value="<?= Token::generate(); ?>">
                            <input type="submit" value="Login" class="loginbtn" />
                        </li>
                    </ul> 
                        <?php if (isset($status)) : ?>
                        <p><?= $status; ?></p>
                        <?php endif; ?>                
                </form>
            </div>
            <div class="form_footer">
                
                    <p><a href="signup.php">Not a member yet? Sign up here</a></p>
                
            </div>            
        </div>
    </div>
</body>
</html>