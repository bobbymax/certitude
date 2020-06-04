@extends('layouts.master')
@section('title', 'Menu | List')
@section('content')

	@if (session('status'))
		<div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif

	<a href="{{ route('menus.create') }}" class="btn btn-info btn-sm mb-3"><i class="bx bx-add-to-queue mr-3"></i>Add Menu</a>
	
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
	    	@foreach ($menus as $menu)
				<tr>
					<th scope="row">{{ $count++ }}</th>
					<td>{{ $menu->name }}</td>
					<td>
						<a href="{{ route('menus.edit', $menu->label) }}" class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
					</td>
				</tr>
	    	@endforeach
	    </tbody>
	</table>

@stop