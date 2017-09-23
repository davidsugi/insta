@extends('app')

@section('title')
		view API
@endsection

@section('ext')
	<style type="text/css">

		.alert{
			font-size:20px;
		}
	</style>
@endsection

@section('bread')
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li class="active">Client API</li>
@endsection

@section('Header')
	View API <small>Lihat seluruh client API yang ada</small>
@endsection

@section('content')
 <div id="app">
 <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-body">
			
					<passport-clients></passport-clients>
					<passport-authorized-clients></passport-authorized-clients>
					<passport-personal-access-tokens></passport-personal-access-tokens>
</div>
</div>
</div>
</div>
</div>

@endsection

@push('script')
	    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
@endpush