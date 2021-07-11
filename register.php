
</body>

<?php
include "Include/header.php";
?>
<body>
    <div class="container">
        <div class="content" id="register" onsubmit="false">
            <div class="content-header">
                <h4>register</h4>
            </div>
            <div class="content-body">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input id="username" type="text" placeholder="Your Username.." data-rule="50" max="50" required>
                    <span class="form-response">
                        <span class="success">
                            <p>Looks good</p>
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" placeholder="Your Password.." data-rule="8" max="8" required>
                    <span class="form-response">
                        <span class="success">
                            <p>Looks good</p>
                        </span>
                    </span>
                </div>
            </div>
            <div class="content-footer">
                <div class="expand">
                    <button class="ion-button" type="submit">create account</button>
                </div>
                <div class="expand">
                    <div class="flex">
                        <p>Already have an account <a href="login.php" target="_blank"
                                rel="noopener noreferrer">Login?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "Include/footer.php";
?>

</body>