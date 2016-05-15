<?php
include('config.php');
?>

<html>
<head>
<style>
    td{
        border: solid 1px gray;
    }
    thead{
        background: darkgray;
    }
</style>
</head>
<body>
<h2>Avaleht</h2>

<div>
            <h3>
                <?php  if(isset($_SESSION['indexMessage'])){
                    echo $_SESSION['indexMessage'];
                    unset($_SESSION['indexMessage']);
                } ?>
            </h3><br/>
</div>

<a href="logout.php" >Logi välja</a><br/><br/>
<a href="addEvent.php" >Lisa üritus</a><br/><br/>
<h2>Ürituste loetelu</h2>
<?php include('eventTable.php'); ?>
</body>
</html>
