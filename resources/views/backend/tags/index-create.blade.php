@extends('layouts.master')
@section('title', 'Tags | List or Create')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
	
	<div class="row mt-3">
		<div class="col-4">
			<form action="{{ route('tags.store') }}" method="POST">
				@csrf

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="false" placeholder="Enter tag name here">
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<small class="form-text text-muted @error('name') mt-2 @enderror">Enter the tag name</small>
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Enter tag description">{{ old('description') }}</textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<small class="form-text text-muted @error('description') mt-2 @enderror">Enter the tag description</small>
				</div>

				<button type="submit" class="btn btn-sm btn-primary"><i class="mr-2 bx bx-send"></i>Create Tag</button>

			</form>
		</div>
		<div class="col-8">
			@if ($tags->count() > 0)
				<table class="table table-bordered">
				    <thead>
				        <tr>
				            <th scope="col">#</th>
				            <th scope="col">Name</th>
				            <th scope="col">Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php
				    		$count = 1;
				    	@endphp
				    	@foreach ($tags as $tag)
							<tr>
								<th scope="row">{{ $count++ }}</th>
								<td>{{ $tag->name }}</td>
								<td>
									<a href="{{ route('tags.edit', $tag->label) }}" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
								</td>
							</tr>
				    	@endforeach
				    </tbody>
				</table>
			@else
				<div class="alert alert-info">
			        {{ __('You have not created a tag at this time.') }}
			    </div>
			@endif
		</div>
	</div>

@stop