@extends('layouts.master')
@section('title', 'Role | Create')
@section('content')

	<div class="card mb-30">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3>Create Role</h3>
		</div>

		<div class="card-body">
			<form action="{{ route('roles.update', $role->label) }}" method="POST">
				@csrf
				@method('PATCH')

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name ?? old('name') }}" autocomplete="false">
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('name') mt-2 @enderror">Enter the menu name</small>
						</div>
					</div>

					<div class="col-6">
						<div class="form-group">
							<label for="ranking">Ranking</label>
							<select name="ranking" class="form-control @error('ranking') is-invalid @enderror" id="ranking">
								<option value="">Select Role Rank</option>
								@foreach ($role->getRanking() as $value)
									<option value="{{ $value }}" {{ $role->ranking === $value ? ' selected' : '' }}>{{ ucfirst($value) }}</option>
								@endforeach
							</select>
							@error('ranking')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('ranking') mt-2 @enderror">Choose ranking for role.</small>
						</div>
					</div>
				</div>
				
				<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Create Role</button>
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bx bx-arrow-back mr-2"></i>Go Back</a>
			</form>
		</div>
	</div>

@stop