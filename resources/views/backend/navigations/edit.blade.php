@extends('layouts.master')
@section('title', 'Navigations | Update')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<div class="card mb-30">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3>Update Navigation</h3>
		</div>

		<div class="card-body">
			<form action="{{ route('navigations.update', $navigation->label) }}" method="POST">
				@csrf
				@method('PATCH')

				<div class="row mb-5">
					<div class="col-4">
						<div class="form-group">
							<label for="menu_id">Menu Name</label>
							<select name="menu_id" id="menu_id" class="form-control @error('menu_id') is-invalid @enderror">
								<option value="">Select Menu for Navigation</option>
								@foreach ($menus as $menu)
									<option value="{{ $menu->id }}" {{ $navigation->menu->id == $menu->id ? ' selected' : '' }}>{{ $menu->name }}</option>
								@endforeach
							</select>
							@error('menu_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $navigation->name ?? old('name') }}" autocomplete="false">
							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="icon_class">Icon</label>
							<input type="text" class="form-control @error('icon_class') is-invalid @enderror" name="icon_class" value="{{ $navigation->icon_class ?? old('icon_class') }}" autocomplete="false">
							@error('icon_class')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label for="parent_id">Parent</label>
							<select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
								<option value="">Select Parent</option>
								<option value="0" {{ $navigation->parent == 0 ? ' selected' : '' }}>None</option>
								@foreach ($navs as $nav)
									<option value="{{ $nav->id }}" {{ $navigation->parent_id == $nav->id ? ' selected' : '' }}>{{ $nav->name }}</option>
								@endforeach
							</select>
							@error('parent_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label for="url">Url</label>
							<input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $navigation->url ?? old('url') }}" autocomplete="false">
							@error('url')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label for="route">Naviation Route</label>
							<input type="text" class="form-control @error('route') is-invalid @enderror" name="route" value="{{ $navigation->route ?? old('route') }}" autocomplete="false">
							@error('route')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-3">
						<div class="form-group">
							<label for="active">Active</label>
							<select name="active" id="active" class="form-control @error('active') is-invalid @enderror">
								<option value="">Is Navigation active?</option>
								<option value="0" {{ $navigation->active == 0 ? ' selected' : '' }}>No</option>
								<option value="1" {{ $navigation->active == 1 ? ' selected' : '' }}>Yes</option>
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
								        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" id="roles{{ $role->id }}" {{ in_array($role->id, $navigation->currentRoles()) ? ' checked' : '' }}>
								        <label class="form-check-label" for="roles{{ $role->id }}">
								            {{ $role->name }}
								            @if (in_array($role->id, $navigation->currentRoles()))
								            	- <a href="{{ route('detach.nav.role', [$navigation->label, $role->label]) }}">detach</a>
								            @endif
								        </label>
								    </div>
								</div>
							@endforeach
						</div>
					</div>
				</div>

				<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Update Navigation</button>
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bx bx-arrow-back mr-2"></i>Go Back</a>
			</form>
		</div>
	</div>

@stop