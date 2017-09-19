@extends('layouts.app') @section('content')
<div class="container p-t-md">
	<div class="row">



		<div class="col-md-4" style="margin-top: 10px">
			<div class="list-group m-b-md">
				<a href="/profile" class="list-group-item "> Profile</a> <a href="#"
					class="list-group-item active"> Security</a> <a href="/membership"
					class="list-group-item"> Membership</a> <a href="/preferences"
					class="list-group-item"> Preferences</a>
			</div>
		</div>


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
