@include('structure.top')       
	@include('structure.nav') 
	@include('structure.messages')

	@section('title','Categories')

	<div class='container'>
		<div class='col-md-12'>
			<div class='panel panel-default'>
				<div class='panel-heading'>
					<h2>Created Categories</h2>
				</div>

					<table class='table'>
							<tr>
								<th>#</th>
								<th>Category</th>
								<th>Last Update</th>
							</tr>
						@if ( !$categories->count() )
							<tr>
								<td colspan='5'>
									There are no categories to show.
								</td>
							</tr>
						@else
							@foreach($categories as $category)
								<tr id='post_{{ $category->id }}'>
									<td style='vertical-align: middle'>
										<small>{{ $loop->iteration }}</small>
									</td>
									<td style='vertical-align: middle'>
										<b id='title_{{ $category->id }}'>
											{{ $category->name }}
										</b>
									</td>
									<td style='vertical-align: middle'>
										<small id='updated_{{ $category->id }}'>{{ date('M j, Y H:i a', strtotime($category->updated_at)) }} </small>
									</td>
									<!--<td>
										<button class="btn btn-primary btn-detail edit-category" value="{{$category->id}}">
											<span class='glyphicon glyphicon-pencil'></span> Edit
										</button>
                            			<button class="btn btn-danger btn-delete delete-category" value="{{$category->id}}">
                            				<span class='glyphicon glyphicon-remove'></span> Delete
                            			</button>
									</td>-->
								</tr>
							@endforeach
						@endif
					</table>
					<br>

					@include('structure.modal_category')

			</div><!-- panel end-->

			<div class='text-center'>
				@if( isset($categories) )
					{!! $categories->links(); !!}
				@endif
			</div>

		</div>
	</div>

	<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('structure.footer')
