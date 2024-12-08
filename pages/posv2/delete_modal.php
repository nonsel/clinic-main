<?php echo '<div id="deleteModal'.$row['id'].'" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Delete Confirmation</h4>
        </div>
        <div class="modal-body">
        
             <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>
            <p>Are you sure you want to delete selected data below?</p>
        </div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-danger btn-sm" name="btn_delete" value="Remove"/>
        </div>
    </div>
  </div>
</form>
</div>';?>