@extends('structure.top')       
	@include('structure.nav') 
	@include('structure.messages')

	@section('title','Home')

	<div class='container'>
		<div class='col-md-10 col-md-offset-1'>

			<div class='panel-body'>
			 	<form class="form-inline" action='/search' method='post'>

			 		{{ csrf_field() }}

				 	<div class="form-group">
                        <label class="filter-col" style="margin-right:0;" for="pref-search">Search:</label>
                        <input type="text" class="form-control input-sm" id="pref-search" name='search'>
                    </div><!-- form group [search] -->
                    <div class="form-group">
                        <label class="filter-col" style="margin-right:0;" for="pref-orderby">Order by:</label>
                        <select id="pref-orderby" class="form-control">
                            <option>Ascending</option>
                            <option>Descendent</option>
                        </select>                                
                    </div> <!-- form group [order by] --> 
                    <div class="form-group">    
                        <button type="submit" class="btn btn-default filter-col">
                            Filter
                        </button>  
                    </div>
                </form>
			</div>

			@if (isset($details) && $query != '')
				<p> Search results found for: <b> {{ $query }} </b>
			@endif

			<div class='panel panel-default'>
				<div class='panel-heading'>
					<h2>Latest Posts</h2>
				</div>
				<div class='panel-body'>

					@if ( !$posts->count() )
						There is no posts to show. Login and write a new post
					@else
						@foreach($posts as $post)
							<div class='list-group'>
								<div class='list-group-item'>
									<h1 class='text-uppercase'>{{ $post->id }}. {{ $post->title }}</h1>
									<small>
										{{ date('M j, Y H:ia', strtotime($post->created_at)) }} by 
											<a href="{{ url('/user/'.$post->user_id)}}"><strong>{{ ucfirst($post->author->name) }}</strong></a>
									</small> <!--user->name -->
								</div>
								<div class='list-group-item'>
									<p>{{ substr($post->body,0,350) }} {{ strlen($post->body) > 350 ? '...' : "" }}</p>

									<a href='/posts/{{ $post->id }}' title='Read More'>> Read More</a>
								</div>
							</div>
						@endforeach
					@endif

				</div><!-- panel-body end-->
			</div><!-- panel end-->

			<div class='text-center'>
				{!! $posts->links(); !!}
			</div>

		</div>
	</div>

@extends('structure.footer')