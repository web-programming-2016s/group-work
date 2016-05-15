<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    die();
};
?>
<html>
    <head>

    </head>
    <body>
    <form method="post" action="action.php">
        <h2>Registreerimine</h2>

        <div>
            <span>
                <?php  if(isset($_SESSION['registerMessage'])){
                    echo $_SESSION['registerMessage'];
                    unset($_SESSION['registerMessage']);
                } ?>
            </span>
        </div>
        <div>
            <label>Kasutajanimi: </label> <input type="text" name="username" maxlength="255" required="required"/>
        </div>
        <div>
            <label>Parool: </label> <input type="password" name="password" maxlength="255" required="required"/>
        </div>
        <input type="hidden" name="action" value="register">
        <input type="submit" value="registreeri" /><br/>
        <a href="login.php" >Logi sisse</a>
    </form>
    </body>
</html>