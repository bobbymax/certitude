@extends('layouts.master')
@section('title', 'Navigations | Create')
@section('content')

	<div class="card mb-30">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3>Create Navigation</h3>
		</div>

		<div class="card-body">
			<form action="{{ route('navigations.store') }}" method="POST">
				@csrf

				<div class="row mb-5">
					<div class="col-4">
						<div class="form-group">
							<label for="menu_id">Menu Name</label>
							<select name="menu_id" id="menu_id" class="form-control @error('menu_id') is-invalid @enderror">
								<option value="">Select Menu for Navigation</option>
								@foreach ($menus as $menu)
									<option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? ' selected' : '' }}>{{ $menu->name }}</option>
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
							<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="false">
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
							<input type="text" class="form-control @error('icon_class') is-invalid @enderror" name="icon_class" value="{{ old('icon_class') }}" autocomplete="false">
							@error('icon_class')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="parent_id">Parent</label>
							<select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
								<option value="">Select Parent</option>
								<option value="0">None</option>
								@foreach ($navs as $nav)
									<option value="{{ $nav->id }}" {{ old('parent_id') == $nav->id ? ' selected' : '' }}>{{ $nav->name }}</option>
								@endforeach
							</select>
							@error('parent_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="url">Url</label>
							<input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" autocomplete="false">
							@error('url')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="route">Naviation Route</label>
							<input type="text" class="form-control @error('route') is-invalid @enderror" name="route" value="{{ old('route') }}" autocomplete="false">
							@error('route')
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

				<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Create Navigation</button>
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bx bx-arrow-back mr-2"></i>Go Back</a>
			</form>
		</div>
	</div>

@stop