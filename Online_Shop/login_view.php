<nav>
    <div id="nav" class="float-left">
        <fieldset id="nav_fieldset">
            <legend>Menu</legend>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?page=about_us">About Us</a></li>
                <li><a href="index.php?page=contacts">Contacts</a></li>
                <li><a href="index.php?page=catalog">Catalog</a></li>
                <li><a href="index.php?page=blog">Blog</a></li>
            </ul>
        </fieldset>
    </div>
</nav>
<main class="float-left">
    <div class="catalog border">
        <div class="sub-container">
            <div class="login-form float-left">
                <h3>Log in</h3>
                <div>
                    <form action="login.php" method="post">
                        <div class="label float-left">
                            <label for="username">Username</label>&nbsp;&nbsp;
                        </div>
                        <input type="text" name="username" id="username" class="login border float-left" required><br><br>
                        <div class="label float-left">
                            <label for="password">Password</label>&nbsp;&nbsp;
                        </div>
                        <input type="password" name="password" id="password"  class="login border float-left" required><br><br>

                        <div class="rememberme">
                            <div class="float-left">
                                <input type="checkbox" id="run">
                            </div>
                            <div class="float-left">
                                <label for="run" id="rememberusername">Remember username</label>
                            </div>
                        </div>
                        <br>
                        <input type="submit" value="Log in" name="login" class="border">
                    </form>
                </div>
                <br>

                <?php
                if (!$loginSuccess) {
                    echo "<div class='error'>$message</div>";
                }
                ?>

            </div>
            <div class="login-form float-left">
                <h3>Is this your first time here?</h3>
                <p><cite>For full access to our website you'll need to take a minute to create a new account for yourself on this web site.</cite></p>
                <div>
                    <form action="login.php" method="post">
                        <div class="label float-left">
                            <label for="new-user" class="form-label">Username</label>&nbsp;&nbsp;
                        </div>
                        <input type="text" name="new-user" id="username"class="login border float-left" required><br><br>
                        <div class="label float-left">
                            <label for="new-pass" class="form-label">Password</label>&nbsp;&nbsp;
                        </div>
                        <input type="password" name="new-pass" id="password"class="login border float-left" required><br><br>
                        <div class="label float-left">
                            <label for="confirm-pass" class="form-label">Confirm password</label>&nbsp;&nbsp;
                        </div>
                        <input type="password" name="confirm-pass" id="confirm-password"class="login border float-left" required><br><br>
                        <input type="submit" name="register" value="Register" class="border">
                    </form>
                </div>
                <br>
                <?php
                if ($usernameExist) {
                    echo "<div class='error'>$message</div>";
                } elseif (!$passwordsMatch) {
                    echo "<div class='error'>$message</div>";
                }
                ?>
            </div>
        </div>
    </div>
</main>