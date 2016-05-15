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
        <h2>Sisse logimine</h2>
        <div>
            <span>
                <?php  if(isset($_SESSION['loginMessage'])){
                    echo $_SESSION['loginMessage'];
                    unset($_SESSION['loginMessage']);
                } ?>
            </span>
        </div>
        <div>
            <label>Kasutajanimi: </label> <input type="text" name="username" maxlength="255" required="required"/>
        </div>
        <div>
            <label>Parool: </label> <input type="password" name="password" maxlength="255" required="required"/>
        </div>
        <input type="hidden" name="action" value="login">
        <input type="submit" value="Logi sisse" /><br/>
        <a href="register.php" >Registreeri</a>
    </form>
    </body>
</html>