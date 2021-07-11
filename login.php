<?php
include "Include/header.php";
?>
<body>
    <div class="container"  style="background-image: url('assets/img/main (3).jpg');">
        <div class="content" id="login" onsubmit="false">
            <div class="content-header">
                <h4>welcome back</h4>
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
                    <button class="ion-button" type="submit">LOGIN</button>
                </div>
                <div class="expand">
                    <div class="flex">
                        <p>Don't have an account <a href="register.php" target="_blank"
                                rel="noopener noreferrer">Register?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "Include/footer.php";
?>

</body>