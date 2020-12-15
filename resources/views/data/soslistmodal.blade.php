<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
  <form id="frmTasks" name="frmTasks" class="form-horizontal" method="post" action="{{url('store-incident-comments')}}">
                @csrf
              <div class="modal-body">
                 
                            <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">Incident Id</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control has-error" id="id" name="incident_id" placeholder="id" readonly="">
                                    </div>
                                </div>

                                 <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">Incident Message</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control has-error" id="message" name="message" placeholder="message" readonly="">
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">Comments </label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control has-error" id="names" name="comments" placeholder="Incident Comments" >
                                    </div>
                                </div>

                                <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">Status</label>
                                      <div class="col-sm-9">
                                   <select class="form-control" name="incident_status" required="">
                                     <option value="">Choose Status</option>
                                     <option>In Progress</option>
                                     <option>Actioned</option>
                                     <option>Customer Out of Reach</option>
                                   </select>
                                 </div>
                                </div>

                               {{--  <div class="form-group error">
                                    <label for="inputTask" class="col-sm-3 control-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file">
                                    </div>
                                </div> --}}

                

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
              </div>
          </form>
            </div>
            <!-- /.modal-content -->
          </div>
      </div>