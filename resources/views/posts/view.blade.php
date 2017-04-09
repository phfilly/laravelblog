@extends('structure.top')       
	@include('structure.nav') 
	@extends('structure.messages')

	@section('title','View Post')

	<div class='container'>
		<div class='row'>
			<div class='col-md-9'>
				<div class='panel panel-default'>
					<div class='panel-body'>

							<div class='list-group'>
								<div class='list-group-item'>
									<h1 class='text-uppercase text-center'>{{ $post->title }}</h1>

									<div class='text-center' style='width:100%;'>
										<span class="label label-info">{{ $post->category->name }}</span>
									</div>

									<br>

									@if ( $post->pic != '')
	      								<div style=" background: url('/images/{{ $post->pic }}');" class='post_image'></div>
	      							@else
	      								<div style=" background: url('/images/image_not_found.png');" class='post_image'></div>
	      							@endif
								</div>

      							<div class='list-group-item text-center'>
									<small>
										<span class='glyphicon glyphicon-time'></span> {{ date('M j, Y H:ia', strtotime($post->created_at)) }} by 
											<a href="{{ url('/user/'.$post->user_id)}}">
												<strong>
													<span class='glyphicon glyphicon-user'></span> {{ ucfirst($post->author->name) }}
												</strong>
											</a>
									</small>
								</div>

								<div class='list-group-item'>
										{!! $post->body !!}
								</div>
							</div>
					</div><!-- panel-body end-->
				</div><!-- panel end-->
			</div>
			<div class='col-md-3'>
				<div class="panel panel-default">
					<div class="panel-body">

						<p>Last Updated: {{ $post->updated_at }}</p>
						
						<p>Status: 
						@if ( $post->status == 'Active')
							<span class="badge badge-pill badge-success" id='status_active_{{ $post->id }}'>Active</span>
						@else
							<span class="badge badge-pill badge-warning" id='status_disabled_{{ $post->id }}'>Disabled</span>
						@endif
						</p>

						@if(Auth::user()->id == $post->user_id)

							<!--<a href='/post/my-posts' class="btn btn-primary btn-detail edit-post btn-block">
								<span class='glyphicon glyphicon-pencil'></span> Edit
							</a>-->

                			<!--<button class="btn btn-danger btn-delete delete-post btn-block" value="{{$post->id}}">
                				<span class='glyphicon glyphicon-remove'></span> Delete
                			</button>-->

							<a href='/posts/edit-my-post/{{ $post->id }}' class='btn btn-primary btn-block' >
								<span class='glyphicon glyphicon-pencil'></span> Edit
							</a>

							<!--<form  method='POST' action='/posts/{{ $post->id }}' class='delete'>
								{{ csrf_field() }}
								<button class="btn btn-danger btn-block login-button" type="submit" >
									<span class='glyphicon glyphicon-remove'></span> Delete
								</button> 
							</form>-->

						@else
							<p style="color:red" class='text-center'>No permission to edit or delete</p>
						@endif

						@include('structure.modal')

					</div><!-- panel-body end-->
				</div>
			</div>
		</div>
	</div>
	
@extends('structure.footer')