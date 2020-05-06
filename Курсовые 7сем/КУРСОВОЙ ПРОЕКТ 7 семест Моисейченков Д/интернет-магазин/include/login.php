<div id="modal">
    <div class="login__wrapper">
        <div class="login__title">Authorization</div>
        <form>
            <p class="incorrect-logpas" style="text-align: center; font-size:18px; color:#e74c3c;">Sorry! Incorrect login or password</p>
            <label class="login__name"><input id="auth_login" type="text" placeholder="Login" required></label>
            <label class="label__password"><input id="auth_password" type="password" placeholder="Password" required></label>

            <button id="auth_button">Submit</button>
            <a class="create__acc" href="registration.php">Create An Account?</a>
            <a class="lost__pass" href="#">Lost Password?</a>
        </form>
        <form>
            <p class="incorrect-email" style="text-align: center; font-size:18px; color:#e74c3c;">Sorry! Incorrect email</p>
            <label style="margin-top: 7px;" class="login__name forgotpassword hide">
                <input id="forgot_email" type="email" placeholder="Enter email" required>
                <button style="margin:0;" id="forgot_button">SEND Email</button>
            </label>
            <p class="check_mailbox" style="text-align: center; font-size:18px; color:#fff;">We have sent you a new password</p>
        </form>
    </div>
</div>