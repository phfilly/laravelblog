@extends('structure.top')       
	@include('structure.nav') 
	@include('structure.messages')

	@section('title','Home')

	<div class='container'>
		<div class='col-md-9'>

			<div class='panel panel-default'>
				<div class='panel-heading'>
					<h2>
						<span class='glyphicon glyphicon-bullhorn'></span>
						LATEST ARTICLES
					</h2>

					@if (isset($details))
						<p> Search results found for: <b class='orange-text'> "{{ $query }}" </b> Ordered by <b class='orange-text'>{{ $orderBy }}</b>
					@endif

				</div>
				<div class='panel-body'>

					@if ( isset($posts) && !$posts->count())
						There is no posts to show. Login and write a new post
					@elseif (isset($posts))

						@foreach($posts as $post)
							<div class='list-group'>
								<div class='list-group-item'>
									<h1 class='text-uppercase text-center'>{{ $post->title }}</h1>

									<div class='text-center' style='width:100%;'>
										<span class="label label-info">{{ $post->category['name'] }}</span>
									</div>

									<br>

									<a href="/posts/{{ $post->id }}" class="thumbnail">
		      							@if ( $post->pic != '')
		      								<div style=" background: url('/images/{{ $post->pic }}');" class='post_image'></div>
		      							@else
		      								<div style=" background: url('/images/image_not_found.png');" class='post_image'></div>
		      							@endif
		    						</a>
								</div>
								<div class='list-group-item text-center'>
									<p>{!! substr($post->body,0,350) !!} {!! strlen($post->body) > 350 ? '...' : "" !!}</p>

									<br>
											<a href='/posts/{{ $post->id }}' title='Read More' class='read_more'>Read More</a>
									<br>
									<br>
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
							</div>
							<hr>
						@endforeach

					@else
						There is no posts to show. Login and write a new post
					@endif

				</div><!-- panel-body end-->
			</div><!-- panel end-->

			<div class='text-center'>
				@if( isset($posts) )
					{!! $posts->links(); !!}
				@endif
			</div>

		</div><!-- md-12 end-->
		<div class='col-md-3'>
			<div class='panel panel-default'>
				<div class='panel-body'>

				 	<form class="form-inline" action='/search' method='post'>

				 		{{ csrf_field() }}

					 	<div class="form-group">
	                        <label style="margin-right:0;" >SEARCH</label>
	                        <input type="text" class="form-control input-sm" id="search" name='search'>
	                    </div>

	                    <br>

	                    <div class="form-group">
	                        <label style="margin-right:0;" >ORDER BY</label>
	                        <select class="form-control" name='orderBy' style='width:100%;'>
	                        	@if ( isset($orderBy) && $orderBy == 'ASC')
	                            	<option value='ASC' selected>Newest</option>
	                            	<option value='DESC'>Oldest</option>
	                           	@elseif ( isset($orderBy) && orderBy == 'DESC')
	                           		<option value='DESC' selected>Oldest</option>
	                           		<option value='ASC'>Newest</option>
	                           	@else
	                           		<option value='ASC'>Newest</option>
	                            	<option value='DESC'>Oldest</option>
	                            @endif
	                        </select>                                
	                    </div>

	                    <br><br>

	                    <div class="form-group">    
	                        <button type="submit" class="btn btn-block btn-primary">
	                           <span class='glyphicon glyphicon-filter'></span> Filter
	                        </button>  
	                    </div>

	                </form>

	            </div>
            </div>
		</div><!-- md-3 end-->

		<div class='col-md-3'>
			<div class='panel panel-default'>
				<div class='panel-body'>
					<h5><b>CATEGORIES</b></h5>	
						<ul class="nav nav-pills">
							@if ( isset($categories) && !$categories->count())
								There is no categories loaded
							@elseif (isset($categories))
								@foreach($categories as $category)
									<li role="presentation">
									  	<a href='/categories/{{ $category->id }}'>{{ $category->name }}</a>
									</li>
								@endforeach
							@endif
						</ul>
				</div>
			</div>
		</div>
	</div>

@extends('structure.footer')