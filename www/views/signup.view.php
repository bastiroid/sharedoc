<div class="container">
        <div class="form2">
            <div class="form_header">
                
                    <h1>Signup for Sharedoc</h1>
                
            </div>
            <div id="login" class="form-action show">
                <form action="" method="post">
                    <ul>
                        <li>
                            <label for="first_name"></label>
                            <input type="text" placeholder="First Name" name="first_name" id="first_name" value="<?= escape(Input::get('first_name')) ?>">
                        </li>

                        <li>
                            <label for="last_name"></label>
                            <input type="text" placeholder="Last Name" name="last_name" id="last_name" value="<?= escape(Input::get('last_name')) ?>">
                        </li>
                        <li>
                            <label for="email"></label>
                            <input type="text" placeholder="Email" name="email" id="email" value="<?= escape(Input::get('email')) ?>"/>
                        </li>
                        <li>
                            <label for="password"></label>
                            <input type="password" placeholder="Password" name="password" id="password" />
                        </li>
                        <li>
                            <label for="password"></label>
                            <input type="password" placeholder="Password Again" name="pwd_again" id="pwd_again" />
                        </li>
                        <li>
                            <input type="hidden" name="token" value="<?= Token::generate(); ?>">
                            <input type="submit" value="Create your account" class="signupbtn" />
                        </li>
                    </ul> 
                        <?php if (isset($status)) : ?>
                        <p><?= $status; ?></p>
                        <?php endif; ?>                
                </form>
            </div>
                        
        </div>
    </div>