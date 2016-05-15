<?php
if($_POST) {
    $noAccessCheck = true;
    include('config.php');
    session_start();
    switch ($_POST['action']) {
        case 'login':
            $sql = 'SELECT * FROM ' . $userTable . ' WHERE user="' . $_POST['username'] . '" AND pass=PASSWORD("' . $_POST['password'] . '");';
            if($res = mysqli_query($con, $sql)){
                $user = mysqli_fetch_assoc($res);
                if($user){
                    $_SESSION['loginMessage'] = '';
                    $_SESSION['user'] = $user;
                    header('Location: index.php');
                }else{
                    $_SESSION['loginMessage'] = 'Sisenemine ebaõnnestus';
                    header('Location: login.php');
                }
            }else{
                $_SESSION['loginMessage'] = 'Sisenemine ebaõnnestus';
                header('Location: login.php');
            }
            break;
        case 'register':
            $sql = 'SELECT * FROM ' . $userTable . ' WHERE user="' . $_POST['username'] . '"';
            if($res = mysqli_query($con, $sql)){
                if(mysqli_num_rows($res)){
                    $_SESSION['registerMessage'] = 'Registreerimine ebaõnnestus';
                    header('Location: register.php');
                }else{
                    $sql = 'INSERT INTO ' . $userTable . ' (user, pass) VALUES ("' . $_POST['username'] . '", PASSWORD("' . $_POST['password'] . '"));';
                    if(mysqli_query($con, $sql)){
                        $_SESSION['loginMessage'] = 'Registreerimine õnnestus, palun logi sisse';
                        header('Location: login.php');
                    }else{
                        $_SESSION['registerMessage'] = 'Registreerimine ebaõnnestus';
                        header('Location: register.php');
                    }
                }
            }else{
                $_SESSION['registerMessage'] = 'Registreerimine ebaõnnestus';
                header('Location: register.php');
            }
            break;
        case 'addEvent':
            $sql = 'INSERT INTO ' . $eventTable . ' (heading, description, start, ownerID) VALUES ("' . $_POST['heading'] . '", "' . $_POST['description'] . '", "' . $_POST['start'] . '", "' . $_SESSION['user']['id'] . '");';
            if(mysqli_query($con, $sql)){
                $_SESSION['indexMessage'] = 'Ürituse loomine õnnestus';
                header('Location: index.php');
            }else{
                $_SESSION['addEventMessage'] = 'Ürituse loomine ebaõnnestus';
                header('Location: addEvent.php');
            }
            break;
        case 'delete':
            $sql = 'DELETE FROM ' . $eventTable . ' WHERE id ="' . $_POST['eventID'] . '"';
            if(mysqli_query($con, $sql)){
                $sql = 'DELETE FROM ' . $attendingTable . ' WHERE eventID ="' . $_POST['eventID'] . '"';
                if(mysqli_query($con, $sql)){
                    $_SESSION['indexMessage'] = 'Ürituse kustutamine õnnestus';
                    header('Location: index.php');
                }else{
                    $_SESSION['indexMessage'] = 'Ürituse kustutamine ebaõnnestus';
                    header('Location: index.php');
                }
            }else{
                $_SESSION['indexMessage'] = 'Ürituse kustutamine ebaõnnestus';
                header('Location: index.php');
            }
            break;
        case 'cancel':
            $sql = 'DELETE FROM ' . $attendingTable . ' WHERE userID="' . $_SESSION['user']['id'] . '" AND eventID ="' . $_POST['eventID'] . '"';
            if(mysqli_query($con, $sql)){
                $_SESSION['indexMessage'] = 'Tühistamine õnnestus';
                header('Location: index.php');
            }else{
                $_SESSION['indexMessage'] = 'Tühistamine ebaõnnestus';
                header('Location: index.php');
            }
            break;
        case 'join':
            $eventID = $_POST['eventID'];
            $sql = 'INSERT INTO ' . $attendingTable . ' (userID, eventID) VALUES ("' . $_SESSION['user']['id'] . '" ,"' . $_POST['eventID'] . '");';
            if(mysqli_query($con, $sql)){
                $_SESSION['indexMessage'] = 'Osalemine õnnestus';
                header('Location: index.php');
            }else{
                $_SESSION['indexMessage'] = 'Osalemine ebaõnnestus';
                header('Location: index.php');
            }
            break;
        default:
            header('Location: index.php');
            break;
    }
}else{
    header('Location: index.php');
}
?>