@extends('layouts.master')
@section('title', 'Post | List')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<a href="{{ route('posts.create') }}" class="btn btn-info btn-sm mb-3"><i class="bx bx-add-to-queue mr-3"></i>Create Post</a>

	@if ($posts->count() > 0)
		<table class="table table-bordered">
		    <thead>
		        <tr>
		            <th scope="col">#</th>
		            <th scope="col">Name</th>
		            <th scope="col">Category</th>
		            <th scope="col">View Counter</th>
		            <th scope="col">Published</th>
		            <th scope="col">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	@php
		    		$count = 1;
		    	@endphp
		    	@foreach ($posts as $post)
					<tr>
						<th scope="row">{{ $count++ }}</th>
						<td>{{ $post->title }}</td>
						<td>{{ $post->category->name }}</td>
						<td>{{ $post->view_counter }}</td>
						<td>{{ $post->is_published == 1 ? 'Yes' : 'No' }}</td>
						<td>
							<a href="{{ route('posts.edit', $post->label) }}" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
						</td>
					</tr>
		    	@endforeach
		    </tbody>
		</table>
	@else
		<div class="alert alert-info">
	        {{ __('You have not created a post yet.') }}
	    </div>
	@endif

@stop