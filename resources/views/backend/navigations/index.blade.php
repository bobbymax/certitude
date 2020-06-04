@extends('layouts.master')
@section('title', 'Navigation | List')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<a href="{{ route('navigations.create') }}" class="btn btn-info btn-sm mb-3"><i class="bx bx-add-to-queue mr-3"></i>Add Navigation</a>
	
	<table class="table table-bordered">
	    <thead>
	        <tr>
	            <th scope="col">#</th>
	            <th scope="col">Name</th>
	            <th scope="col">Route</th>
	            <th scope="col">Menu</th>
	            <th scope="col">Parent</th>
	            <th scope="col">Action</th>
	        </tr>
	    </thead>
	    <tbody>
	    	@php
	    		$count = 1;
	    	@endphp
	    	@foreach ($navigations as $navigation)
				<tr>
					<th scope="row">{{ $count++ }}</th>
					<td>{{ $navigation->name }}</td>
					<td>{{ $navigation->route }}</td>
					<td>{{ $navigation->menu->name }}</td>
					<td>{{ $navigation->parent->name ?? 'None' }}</td>
					<td>
						<a href="{{ route('navigations.edit', $navigation->label) }}" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
					</td>
				</tr>
	    	@endforeach
	    </tbody>
	</table>

@stop