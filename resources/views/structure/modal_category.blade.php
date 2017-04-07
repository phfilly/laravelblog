<!-- MODAL POPUPS -->

	<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Category Editor</h4>
                </div>

                <div class="modal-body" style='margin:15px;'>
                    <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                    	 {{ csrf_field() }}

                        <div class="form-group">
                            <label>Category</label>
								<input type='text' class='form-control' value='' placeholder='Category' name='name' id='name'/>
                        </div>

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