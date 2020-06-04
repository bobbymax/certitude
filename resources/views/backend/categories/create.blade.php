@extends('layouts.master')
@section('title', 'Category | Create')
@section('content')

	<div class="card mb-30">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3>Create Category</h3>
		</div>

		<div class="card-body">
			<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
				@csrf

				<div class="row">
					<div class="col-6">
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
					</div>

					<div class="col-6">
						<div class="form-group">
							<label for="path">Category Image</label>
							<input type="file" class="form-control @error('path') is-invalid @enderror" name="path">
							@error('path')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('path') mt-2 @enderror">Enter the category image</small>
						</div>
					</div>

					<div class="col-12">
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
							@error('description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('description') mt-2 @enderror">Enter the category description</small>
						</div>
					</div>
				</div>
				
				<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Create Category</button>
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bx bx-arrow-back mr-2"></i>Go Back</a>
			</form>
		</div>
	</div>

@stop