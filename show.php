<?php
require('conn.php');
?>
<table class = "table table-bordered alert-warning table-hover">
<thead>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Action</th>
</thead>
    <tbody>
    	<?php
    		$quser=mysqli_query($conn,"call spReadUsers;");
    		while($urow=mysqli_fetch_array($quser)){
    	?>
    	<tr>
    		<td><?php echo $urow['firstname']; ?></td>
    		<td><?php echo $urow['lastname']; ?></td>
			<td><button class="btn btn-success" data-toggle="modal" data-target="view-modal" id="update" value="<?php echo $urow['id']; ?>" ><span class = "glyphicon glyphicon-pencil">
			</span> Update</button> | 
			<button class="btn btn-danger delete" id="delete" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
			<?php include('update_modal.php'); ?>
			</td>
		</tr>
		
    	<?php
        }?>
    </tbody>
</table>
