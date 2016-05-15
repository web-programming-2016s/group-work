<?php
include "config.php";
include "header.php";
?>
<p>
<a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Data</a><br/>
</p>
<table id="ghatable" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
<thead>
     <tr>
          <th>ID</th>
          <th>Product name</th>
          <th>Condition</th>
          <th>Contact</th>
          <th>Info</th>
          <th>Action</th>
     </tr>
</thead>
<tbody>

<!--Code from a tutorial alt-web.blogspot.com & http://alt-web.com/ 23-42 -->
<?php
$res = $mysqli->query("SELECT * FROM personal");
while ($row = $res->fetch_assoc()):
?>
     <tr>
          <td><?php echo $row['id_personal'] ?></td>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['gender'] ?></td>
          <td><?php echo $row['telp'] ?></td>
          <td><?php echo $row['address'] ?></td>
          <td>
          <a href="update.php?u=<?php echo $row['id_personal'] ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
          <a onclick="return confirm('Are you want deleting data')" href="delete.php?d=<?php echo $row['id_personal'] ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
          </td>
     </tr>
<?php
endwhile;
?>
</tbody>
</table>	    
<?php
include "footer.php";
?>