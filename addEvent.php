<?php
    include('config.php');
?>
<html>
<head>
</head>
<body>
<form method="post" action="action.php">
    <h2>Sündmuse loomine</h2>
    <div>
            <span>
                <?php  if(isset($_SESSION['addEventMessage'])){
                    echo $_SESSION['addEventMessage'];
                    unset($_SESSION['addEventMessage']);
                } ?>
            </span>
    </div>
    <div>
        <label>Pealkiri: </label> <input type="text" name="heading" maxlength="255" required="required"/>
    </div>
    <div>
        <label>Algusaeg: </label> <input type="text" name="start" maxlength="255" required="required"/>
    </div>
    <div>
        <label>Kirjeldus: </label> <textarea name="description" required="required"></textarea>
    </div>
    <input type="hidden" name="action" value="addEvent">
    <input type="submit" value="Loo üritus" /><br/>
    <a href="index.php" >Tagasi</a>
</form>
</body>
</html>