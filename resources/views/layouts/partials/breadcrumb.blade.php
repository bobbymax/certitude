<div class="breadcrumb-area">
    <h1>
    	@if ($breadcrumb['entity'] == null)
    		{{ ucwords($breadcrumb['prefix']) }}
    	@else
    		{{ ucwords($breadcrumb['entity']) }}
    	@endif
    </h1>

    @if ($breadcrumb['entity'] != null)
    	<ol class="breadcrumb">
	        <li class="item"><a href="{{ route('dashboard') }}"><i class='bx bx-home-alt'></i></a></li>

	        <li class="item">{{ ucwords($breadcrumb['entity']) ?? '' }}</li>
			
			@if ($breadcrumb['value'] != null)
				<li class="item">
					@if (is_array($breadcrumb['value']))
						{{ ucwords($breadcrumb['value'][0]) }}
					@else
						{{ ucwords($breadcrumb['value']) }}
					@endif
				</li>
			@endif

			@if ($breadcrumb['action'] != null)
				<li class="item">{{ ucwords($breadcrumb['action']) }}</li>
			@endif
	    </ol>
    @endif
</div>