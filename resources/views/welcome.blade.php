@extends('structure.top')       
	@include('structure.nav') 
	@include('structure.messages')

	@section('title','Home')

	<div class='container'>
		<div class='col-md-10 col-md-offset-1'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<h2>Latest Posts</h2>
				</div>
				<div class='panel-body'>

					@foreach($posts as $post)
						<div class='list-group'>
							<div class='list-group-item'>
								<h1 class='text-uppercase'>{{ $post->id }}. {{ $post->title }}</h1>
								<small>
									{{ date('M j, Y H:ia', strtotime($post->created_at)) }} by {{ $post->user_id }}
								</small> <!--user->name -->
							</div>
							<div class='list-group-item'>
								<p>{{ substr($post->body,0,350) }} {{ strlen($post->body) > 350 ? '...' : "" }}</p>

								<a href='/posts/{{ $post->id }}' title='Read More'>> Read More</a>
							</div>
						</div>
					@endforeach
				</div><!-- panel-body end-->
			</div><!-- panel end-->

			<div class='text-center'>
				{!! $posts->links(); !!}
			</div>

		</div>
	</div>

@extends('structure.footer')