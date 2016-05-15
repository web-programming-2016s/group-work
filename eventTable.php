<?php
$sql = "SELECT * FROM " . $eventTable;
if ($res = mysqli_query($con, $sql)) {
    if (mysqli_num_rows($res)) {
        echo '<table>
    <thead>
    <tr>
        <td>Nimi</td>
        <td>Algus</td>
        <td>Kirjeldus</td>
        <td>Osalus</td>
    </tr>
    </thead>
    <tbody>';
        while ($event = mysqli_fetch_assoc($res)) {
            echo '<tr><form method="post" action="action.php"> ';
            echo '<td>' . $event['heading'] . '</td><td>' . $event['start'] . '</td><td>' . $event['description'] . '</td><td>';
            if ($event['ownerID'] == $_SESSION['user']['id']) {
                echo '<input type="submit" value="Kustuta" />';
                echo '<input type="hidden" name="action" value="delete" />';
            } else {
                $subSql = 'SELECT * FROM ' . $attendingTable . ' WHERE eventID="' . $event['id'] . '" AND userID="' . $_SESSION['user']['id'] . '"';
                if ($subRes = mysqli_query($con, $subSql)) {
                    if (mysqli_num_rows($subRes)) {
                        echo '<input type="submit" value="Tühista osalemine" />';
                        echo '<input type="hidden" name="action" value="cancel" />';
                    } else {
                        echo '<input type="submit" value="Osale" />';
                        echo '<input type="hidden" name="action" value="join" />';
                    }
                } else {
                    echo '<input type="submit" value="Osale" />';
                    echo '<input type="hidden" name="action" value="join" />';
                }
            }
            echo '<input type="hidden" name="eventID" value="' . $event['id'] . '" />';
            echo '</td></form></tr>';
        }
        echo '</tbody>
</table>';
    }else{
        echo '<h3>Üritusi ei leitud</h3>';
    }
}
?>