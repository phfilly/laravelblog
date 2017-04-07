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
									<h1 class='text-uppercase'>{{ $post->title }}</h1>
									<small>
										{{ date('M j, Y H:ia', strtotime($post->created_at)) }} by 
										<a href="{{ url('/user/'.$post->user_id)}}"><strong>{{ ucfirst($post->author->name) }}</strong></a>
									</small>
								</div>
								<div class='list-group-item'>
										{{ $post->body }}
								</div>
							</div>
					</div><!-- panel-body end-->
				</div><!-- panel end-->
			</div>
			<div class='col-md-3'>
				<div class="panel panel-default">
					<div class="panel-body">

						<p>Last Updated: {{ $post->updated_at }}</p>
						<br>

						@if(Auth::user()->id == $post->user_id)
							<a href='/posts/edit/{{ $post->id }}' class='btn btn-primary btn-block' >
								<span class='glyphicon glyphicon-pencil'></span> Edit
							</a>

							<form  method='POST' action='/posts/{{ $post->id }}' class='delete'>
								{{ csrf_field() }}
								<button class="btn btn-danger btn-block login-button" type="submit" >
									<span class='glyphicon glyphicon-remove'></span> Delete
								</button>  <!-- onClick='deletePost({{$post->id}})'-->
							</form>

						@else
							<p style="color:red" class='text-center'>No permission to edit or delete</p>
						@endif

					</div><!-- panel-body end-->
				</div>
			</div>
		</div>
	</div>

	<script>
		var token = "{{ Session::token() }}";
		var url = "{{ route('home') }}";
	</script>
	
@extends('structure.footer')