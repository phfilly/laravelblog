@include('structure.top')       
	@include('structure.nav') 
	@extends('structure.messages')

	@section('title','User Profile')

	<div class='container'>
		<div class='row'>
			<div class='col-md-3'>
				<div class='panel panel-default'>
					<div class='panel-body text-center'>

						<img src='/images/profile_pic.png' class='profile_pic'/>

						<h3 class='text-uppercase'>{{ $user->name }}</h3>

						<a href='mailto:{{ $user->email }}' title='Come in contact!'>{{ $user->email }}</a>
					</div><!-- panel-body end-->
				</div><!-- panel end-->
			</div>
			<div class='col-md-9'>
				<div class="panel panel-default">
					<div class="panel-body">

						<h1>Activty Log</h1>
						<i>Coming Soon...</i>

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