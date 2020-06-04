@extends('layouts.master')
@section('title', 'Category | List')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<a href="{{ route('categories.create') }}" class="btn btn-info btn-sm mb-3"><i class="bx bx-add-to-queue mr-3"></i>Add Category</a>
	@if ($categories->count() > 0)
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
		    	@foreach ($categories as $category)
					<tr>
						<th scope="row">{{ $count++ }}</th>
						<td>{{ $category->name }}</td>
						<td>
							<a href="{{ route('categories.edit', $category->label) }}" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
						</td>
					</tr>
		    	@endforeach
		    </tbody>
		</table>
	@else
		<div class="alert alert-info">
	        {{ __('You have not created a category at this time.') }}
	    </div>
	@endif

@stop