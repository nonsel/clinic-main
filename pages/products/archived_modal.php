<!-- ===== ARCHIVED MODAL ==== -->
<?php echo '<div id="archivedModal'.$row['id'].'" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Archvied Confirmation</h4>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to archived selected data below?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">No</button>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_archived" value="Yes"/>
        </div>
    </div>
  </div>
</div>
';?>
<!-- ===== END OF DELETE MODAL ===== -->