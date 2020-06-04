@extends('layouts.master')
@section('title', 'Menu | Create')
@section('content')

	<div class="card mb-30">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3>Create Menu</h3>
		</div>

		<div class="card-body">
			<form action="{{ route('menus.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="false">
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<small class="form-text text-muted @error('name') mt-2 @enderror">Enter the menu name</small>
				</div>

				<div class="row mb-5">
					<div class="col-12">
						<div class="row">
							@foreach ($roles as $role)
								<div class="col-3">
									<div class="form-check">
								        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" id="roles{{ $role->id }}">
								        <label class="form-check-label" for="roles{{ $role->id }}">
								            {{ $role->name }}
								        </label>
								    </div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				
				<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Create Menu</button>
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bx bx-arrow-back mr-2"></i>Go Back</a>
			</form>
		</div>
	</div>

@stop