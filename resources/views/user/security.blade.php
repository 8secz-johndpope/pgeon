@extends('layouts.app')
@section('content')
<div class="container p-t-md">
	<div class="row">



		@component('user.menu',['current_menu' => 'security'])
		@endcomponent


		<div class="col-md-8" style="margin-top: 10px">
			<form action="/profile" method="POST">
				<ul class="list-group media-list media-list-stream">
					<li class="list-group-item media p-a">
						<div class="input-group">
							<label for="email">Email</label>
							<p>
								{{$user->email}} <small><a href="#" style="color: #24c4bc">(change)</a></small>
							</p>
						</div>
						<div class="input-group" style="margin-bottom: 0">
							<label for="password">Password</label> <a
								class="btn btn-sm btn-default-outline" href="password/reset"
								style="margin-top: 6px">Reset Your Password</a>
						</div>
					</li>
				</ul>
				{{ csrf_field() }}
			</form>
		</div>





	</div>
</div>
@endsection
