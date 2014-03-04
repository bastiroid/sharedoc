<div id="login" class="form-action show">
    <form action="" method="post">
        <ul>
            <li>
                <label for="password_current">Current password</label>
                <input type="password" placeholder="Current password" name="password_current" id="password_current" />
            </li>
            <li>
                <label for="password_new">New password</label>
                <input type="password" placeholder="New password" name="password_new" id="password_new" />
            </li>
            <li>
                <label for="password_new_again">New password again</label>
                <input type="password" placeholder="New password again" name="password_new_again" id="password_new_again" />
            </li>
            <li>
                <input type="hidden" name="token" value="<?= Token::generate(); ?>">
                <input type="submit" value="Change password" class="loginbtn" />
            </li>
        </ul> 
        <?php if (isset($status)) : ?>
        <p><?= $status; ?></p>
    <?php endif; ?>                
</form>
</div>