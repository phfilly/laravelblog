@extends('structure.top')       
	@include('structure.nav') 
	@extends('structure.messages')

	@section('title','User Profile')

	<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
				<div class='panel panel-default'>
					<div class='panel-body'>

					PIC
							
					</div><!-- panel-body end-->
				</div><!-- panel end-->
			</div>
			<div class='col-md-9'>
				<div class="panel panel-default">
					<div class="panel-body">

						<h1 class='text-uppercase'>{{ $user_posts->author->name }}</h1>
						<a href='mailto:{{ $user->email }}' title='Come in contact!'>{{ $user_posts->author->email }}</a>

						<hr>

						<h3>Activity Feed</h3>



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