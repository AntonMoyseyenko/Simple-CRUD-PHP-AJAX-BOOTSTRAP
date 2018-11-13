<?php require('conn.php'); ?>
<div class="modal fade" id="view-modal<?php echo $urow['id']; ?>" tabindex="-1" role="dialog">
    <?php
           $n=mysqli_query($conn,"select * from tbUsers where id='".$urow['id']."'");
           $nrow=mysqli_fetch_array($n);
               
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
        <div class = "modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center><h3 class = "text-success modal-title">Update User</h3></center>
        </div>
            
            <div class="modal-body">
            
            First Name: <input type="text" value="<?php echo $nrow['firstname']; ?>" id="ufirstname<?php echo $urow['id']; ?>" class="form-control">
            Last Name: <input type="text" value="<?php echo $nrow['lastname']; ?>" id="ulastname<?php echo $urow['id']; ?>" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | 
                <button type="button" class="btn btn-success" id="save" value="<?php echo $urow['id']; ?>" data-dismiss="modal"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
            </div>
            
        </div>
    </div>
</div>