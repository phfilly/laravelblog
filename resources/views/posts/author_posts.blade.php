@extends('structure.top')       
	@include('structure.nav') 
	@include('structure.messages')

	@section('title','My Posts')

	<div class='container'>
		<div class='col-md-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<h2>My Posts</h2>
				</div>

					<table class='table'>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Body</th>
								<th>Status</th>
								<th>Last Update</th>
								<th>Action</th>
							</tr>
						@if ( !$posts->count() )
							<tr>
								<td colspan='5'>
									There is no posts to show. Login and write a new post
								</td>
							</tr>
						@else
							@foreach($posts as $post)
								<tr id='post_{{ $post->id }}'>
									<td style='vertical-align: middle'>
										<small>{{ $loop->iteration }}</small>
									</td>
									<td style='vertical-align: middle'>
										<b id='title_{{ $post->id }}'>{{ $post->title }}</b>
									</td>
									<td style='max-width:400px'>
										<i id='body_{{ $post->id }}'>{{ substr($post->body,0,100) }} {{ strlen($post->body) > 100 ? '...' : "" }}</i>
									</td>
									<td id='post_status_{{ $post->id }}'>
										@if ( $post->status == 'Active')
											<span class="badge badge-pill badge-success" id='status_active_{{ $post->id }}'>Active</span>
										@else
											<span class="badge badge-pill badge-warning" id='status_disabled_{{ $post->id }}'>Disabled</span>
										@endif
									</td>
									<td style='vertical-align: middle'>
										<small id='updated_{{ $post->id }}'>{{ date('M j, Y H:i a', strtotime($post->updated_at)) }} </small>
									</td>
									<td>
										<button class="btn btn-primary btn-detail edit-post" value="{{$post->id}}">Edit</button>
                            			<button class="btn btn-danger btn-delete delete-post" value="{{$post->id}}">Delete</button>
									</td>
								</tr>
							@endforeach
						@endif
					</table>
					<br>

					<!-- MODAL POPUPS -->

					<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

			</div><!-- panel end-->

			<div class='text-center'>
				{!! $posts->links(); !!}
			</div>

		</div>
	</div>

	<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('structure.footer')
