@extends('layouts.master')
@section('title', 'Tags | Update')
@section('content')
	<form action="{{ route('tags.update', $tag->label) }}" method="POST">
		@csrf
		@method('PATCH')

		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $tag->name ?? old('name') }}" autocomplete="false" placeholder="Enter tag name here">
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<small class="form-text text-muted @error('name') mt-2 @enderror">Enter the tag name</small>
		</div>

		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Enter tag description">{{ $tag->description ?? old('description') }}</textarea>
			@error('description')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
			<small class="form-text text-muted @error('description') mt-2 @enderror">Enter the tag description</small>
		</div>

		<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Update Tag</button>
		<a href="{{ url()->previous() }}" class="btn btn-sm btn-warning"><i class="bx bx-arrow-back mr-2"></i>Go Back</a>
	</form>
@stop