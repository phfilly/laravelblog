<!-- MODAL POPUPS -->

	<div class="modal fade" id="postModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Article Editor</h4>
                </div>

                <div class="modal-body" style='margin:15px;'>
                    <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                    	 {{ csrf_field() }}

                        <div class="form-group">
                            <label>Title</label>
								<input type='text' class='form-control' value='' placeholder='Title' name='title' id='title'/>
                        </div>

                        <div class="form-group">
                            <label>Body</label>
								<textarea class="form-control" id="body" rows="3" name='body'></textarea>
                        </div>

                        <!--<div class="form-group">
                            <label>Category</label>
                                <div id='category'></div>
                        </div>-->

                        <div class="form-group">
				          <label>Article Status</label>
				          <br>
				            <label class="btn btn-success">
				                <input type="radio" name="status" autocomplete="off" value='Active' id='status_active'> Active
				            </label>
				            <label class="btn btn-danger">
				              <input type="radio" name="status" autocomplete="off" value='Disable' id='status_disable'> Disable
				            </label>

				        </div>

                        <small id='last_update' style='float:right'></small>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save</button>
                    <input type="hidden" id="post_id" name="post_id" value="">
                </div>

            </div>
        </div>
    </div>

<!-- MODAL POPUPS END -->