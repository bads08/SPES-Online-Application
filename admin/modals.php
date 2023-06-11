<!-- MODAL FOR APPROVING APPLICANR-->
<div class="modal fade" id="modal-approve">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <center><p>Are you sure to <span class="text-success">Approved</span> this Applicant?</p></center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="approvedBtn" value="<?php echo $get_id;?>">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<!-- MODAL FOR DIS-APPROVING APPLICANT -->
        <div class="modal fade" id="modal-dis-approve">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmation</h4>
              </div>
              <div class="modal-body">
                <center><p>Are you sure to <span class="text-red">Dis-Approved</span> this Applicant?</p></center>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="rejectBtn" value="<?php echo $get_id;?>">Confirm</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <!-- MODAL FOR IMAGE VIEWER 
        <div class="modal fade in modal-image-viewer">
                    <div class="modal-dialog modal-SM">
                      <div class="modal-content bg-purple">
                        <div class="modal-body">
                          <center><img src="" alt="img" width="200px" class="modal-get-image"></center>
                        </div>
                        <div class="modal-footer">
                         <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                       </div>
                      </div>
                    </div>
                  </div>-->