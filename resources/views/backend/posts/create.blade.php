@extends('layouts.master')
@section('title', 'Post | Create')
@section('content')

	<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
	
		<div class="row">

			<div class="col-8">
				<div class="row">
					<div class="col-7">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="false" placeholder="Enter post title">
							@error('title')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('title') mt-2 @enderror">Enter the post title</small>
						</div>
					</div>

					<div class="col-5">
						<div class="form-group">
							<label for="tagline">Tagline</label>
							<input type="text" class="form-control @error('tagline') is-invalid @enderror" name="tagline" value="{{ old('tagline') }}" autocomplete="false" placeholder="Enter post tagline">
							@error('tagline')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('title') mt-2 @enderror">Enter the post tagline</small>
						</div>
					</div>

					<div class="col-6">
						<div class="form-group">
							<label for="stream_id">Series Collection</label>
							<select name="stream_id" id="stream_id" class="form-control @error('stream_id') is-invalid @enderror">
								<option value="">Select Series Collection</option>
								<option value="0">None</option>
								@foreach ($streams as $stream)
									<option value="{{ $stream->id }}">{{ $stream->title }}</option>
								@endforeach
							</select>
							@error('stream_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('stream_id') mt-2 @enderror">Choose the post series</small>
						</div>
					</div>

					<div class="col-6">
						<div class="form-group">
							<label for="category_id">Category</label>
							<select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
								<option value="">Select Post Category</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
							@error('category_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('category_id') mt-2 @enderror">Choose the post category</small>
						</div>
					</div>


					<div class="col-12">
						<div class="form-group">
							<label for="content">Post Body</label>
							<textarea name="content" id="summernote" class="form-control @error('content') is-invalid @enderror" rows="10">{{ old('content') }}</textarea>
							@error('content')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('content') mt-2 @enderror">Enter post content</small>
						</div>
					</div>

					<div class="col-12">
						<div class="form-group">
							<label for="photos">Add Photos</label>
							<div class="dropzone" id="photos"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-4">
				<div class="card mb-30">
					<div class="card-header d-flex justify-content-between align-items-center">
						<h3>Publish</h3>
					</div>

					<div class="form-group">
							<label for="featured_image">Featured Image</label>
							<input type="file" class="form-control @error('featured_image') is-invalid @enderror" name="featured_image">
							@error('featured_image')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('featured_image') mt-2 @enderror">Upload post image</small>
						</div>

					<div class="card-body">
						<div class="form-group">
							<label for="tags">Tags</label>
							<input type="text" name="tags[]" class="form-control @error('tags') is-invalid @enderror" placeholder="Add post tags">
							@error('tags')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('tags') mt-2 @enderror">Enter post tags</small>
						</div>

						<div class="form-group">
							<label for="keywords">Meta Keywords</label>
							<input type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" placeholder="Add post keywords">
							@error('keywords')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('keywords') mt-2 @enderror">Enter post keywords</small>
						</div>

						<div class="form-group">
							<label for="meta_description">Meta Description</label>
							<textarea name="meta_description" id="meta_description" class="form-control @error('meta_description') is-invalid @enderror" rows="4" placeholder="Add post description">{{ old('meta_description') }}</textarea>
							@error('meta_description')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('meta_description') mt-2 @enderror">Enter post description</small>
						</div>

						<div class="form-group mb-4">
							<label for="is_published">Published</label>
							<select name="is_published" id="is_published" class="form-control @error('is_published') is-invalid @enderror">
								<option value="">Publish Post</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
							@error('is_published')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
							<small class="form-text text-muted @error('is_published') mt-2 @enderror">Select post status</small>
						</div>

						<button type="submit" class="btn btn-primary"><i class="mr-2 bx bx-send"></i>Create Post</button>
						<a href="{{ route('posts.index') }}" class="btn btn-danger"><i class="bx bx-arrow-back mr-2"></i>Cancel</a>
					</div>
				</div>
			</div>

		</div>

	</form>

@stop

@section('scripts')
	<script>
		$(document).ready(function() {
		  $('#summernote').summernote({
		  	placeholder: 'Enter post content here...',
		  	tabsize: 2,
        	height: 350,
		  });

		  var myDropzone = new Dropzone("div#photos", { url: "/file/post"});
		});
	</script>
@stop