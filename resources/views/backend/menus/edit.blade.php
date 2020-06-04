@extends('layouts.master')
@section('title', 'Menu | Create')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<div class="card mb-30">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3>Update Menu</h3>

			<div class="dropdown">
                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-horizontal-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bx bx-show"></i> Add New Navigation
                    </a>
                </div>
            </div>
		</div>

		<div class="card-body">
			<form action="{{ route('menus.update', $menu->label) }}" method="POST">
				@csrf
				@method('PATCH')

				<div class="row mb-5">
					<div class="col-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="false" value="{{ $menu->name }}">
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
							<label for="active">Active</label>
							<select name="active" class="form-control @error('active') is-invalid @enderror">
								<option value="">Select Active State</option>
								<option value="0" {{ $menu->active == 0 ? ' selected' : '' }}>No</option>
								<option value="1" {{ $menu->active == 1 ? ' selected' : '' }}>Yes</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row mb-5">
					<div class="col-12">
						<div class="row">
							@foreach ($roles as $role)
								<div class="col-3">
									<div class="form-check">
								        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" id="roles{{ $role->id }}" {{ in_array($role->id, $menu->currentRoles()) ? ' checked' : '' }}>
								        <label class="form-check-label" for="roles{{ $role->id }}">
								            {{ $role->name }}
								            @if (in_array($role->id, $menu->currentRoles()))
								            	- <a href="{{ route('detach.menu.role', [$menu->label, $role->label]) }}">detach</a>
								            @endif
								        </label>
								    </div>
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Update Menu</button>
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bx bx-arrow-back mr-2"></i>Go Back</a>
			</form>
		</div>
	</div>

@stop