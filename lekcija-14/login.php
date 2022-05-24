<div class="login-form">
        <form action="index.php" method="POST">
            <h2>Login Form</h2>
                <div class="data">
                    <p>Enter username:</p>
                     <input type="text" name="username" id="username" required><br />
                </div>
                <div class="data">
                    <p>Enter password:</p>
                    <input type="password" name="password" id="password" required><br />        
                </div>
                <div class="submit">
                    <input type="submit" value="Login"> </br>
                </div>
                <p class="error"><?php echo $error; ?></p>     
        </form>
</div>    