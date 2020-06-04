@extends('layouts.master')
@section('title', 'Users | Update')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<div class="card mb-30">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3>Update User</h3>
		</div>

		<div class="card-body">
			<form action="{{ route('users.update', $user->id) }}" method="POST">
				@csrf
				@method('PATCH')

				<div class="row mb-5">
					<div class="col-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name') }}" autocomplete="false">
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}" autocomplete="false" readonly>
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-12">
						<div class="row">
							@foreach ($roles as $role)
								<div class="col-3">
									<div class="form-check">
								        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" id="roles{{ $role->id }}" {{ in_array($role->id, $user->currentRoles()) ? ' checked' : '' }}>
								        <label class="form-check-label" for="roles{{ $role->id }}">
								            {{ $role->name }}
								            @if (in_array($role->id, $user->currentRoles()))
								            	- <a href="{{ route('detach.role', [$user->id, $role->label]) }}">detach</a>
								            @endif
								        </label>
								    </div>
								</div>
							@endforeach
						</div>
					</div>
				</div>

				<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Update User</button>
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bx bx-arrow-back mr-2"></i>Go Back</a>
			</form>
		</div>
	</div>

@stop