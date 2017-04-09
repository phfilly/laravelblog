@extends('structure.top')       
	@include('structure.nav') 
	@extends('structure.messages')

	@section('title','Edit Post')

	<div class='container'>
		<div class='row'>
			<div class='col-md-9'>
				<div class='panel panel-default'>
					<div class='panel-body'>

							<form method='POST' action='/posts/{{ $post->id }}'>
                  				{{ csrf_field() }}

								<div class='list-group'>
									<div class='list-group-item'>
										
										<label>Title</label>
										<input type='text' name='title' value='{{ $post->title }}' class="form-control" required/>

										<br>

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
										<label>Body</label>
										<textarea class="form-control" id="textarea" rows="3" name='body'>{{ $post->body }}</textarea>
									</div>
								</div>

				                <div class="form-group">
				                    <label>Article Status</label>
				                    <br>
				                      <label class="btn btn-success">
				                           <input type="radio" name="status"  autocomplete="off" value='Active' checked> Active
				                      </label>
				                      <label class="btn btn-danger">
				                        	<input type="radio" name="status" autocomplete="off" value='Disable'> Disable
				                      </label>
				                </div>

								<button class="btn btn-success btn-block login-button" type="submit" style='max-width:150px;margin:auto'>Save</button>  
							</form>
					</div><!-- panel-body end-->
				</div><!-- panel end-->
			</div>
			<div class='col-md-3'>
				<div class="panel panel-default">
					<div class="panel-body">

						<p>Last Updated: {{ $post->updated_at }}</p>				
						<br>
						<a href='/posts/{{ $post->id }}' class='btn btn-danger btn-block'>Cancel</a>

					</div>
				</div>
			</div>
		</div>
	</div>


@extends('structure.footer')