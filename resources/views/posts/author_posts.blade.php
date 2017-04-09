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
								<th>Category</th>
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
										<b id='title_{{ $post->id }}'>
											<a href='/posts/{{ $post->id }}' title='View Post'>
												<span class='glyphicon glyphicon-eye-open'></span>
											</a>
											{{ $post->title }}
										</b>
									</td>
									<td style='max-width:400px'>
										<i id='body_{{ $post->id }}'>{!! substr($post->body,0,100) !!} {!! strlen($post->body) > 100 ? '...' : "" !!}</i>
									</td>
									<td id='post_status_{{ $post->id }}'>
										@if ( $post->status == 'Active')
											<span class="badge badge-pill badge-success" id='status_active_{{ $post->id }}'>Active</span>
										@else
											<span class="badge badge-pill badge-warning" id='status_disabled_{{ $post->id }}'>Disabled</span>
										@endif
									</td>
									<td id='post_category_{{ $post->id }}'>
										<span class="badge badge-pill badge-info" id='status_active_{{ $post->id }}'>{{ $post->category['name'] == '' ? '-' : $post->category['name']  }}</span>
									</td>
									<td style='vertical-align: middle'>
										<small id='updated_{{ $post->id }}'>{{ date('M j, Y H:i a', strtotime($post->updated_at)) }} </small>
									</td>
									<td>
										<button class="btn btn-primary btn-detail edit-post" value="{{$post->id}}">
											<span class='glyphicon glyphicon-pencil'></span> Edit
										</button>
                            			<button class="btn btn-danger btn-delete delete-post" value="{{$post->id}}">
                            				<span class='glyphicon glyphicon-remove'></span> Delete
                            			</button>
									</td>
								</tr>
							@endforeach
						@endif
					</table>
					<br>

					@include('structure.modal')

			</div><!-- panel end-->

			<div class='text-center'>
				{!! $posts->links(); !!}
			</div>

		</div>
	</div>

	<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('structure.footer')
