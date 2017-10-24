@extends('app')

@section('ext')
	<style type="text/css">
		.container{
			font-size:22px;
		}
		input{
			font-family: "arial";
		}

	</style>
@endsection

@section('bread')
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('listpeople.index') }}">Customer</a></li><li class="active">		
		@if (isset($lis))
			Update List:{{ $lis->list }}
		@else
			Tambah List
		@endif</li>
@endsection

@section('title')
		@if (isset($lis))
			Update List
		@else
			Tambah List
		@endif
@endsection

@section('Header')
		@if (isset($lis))
			Update List<small>Ubah data List: {{ $lis->list }} </small>
		@else
			Tambah List<small>Tambah List baru</small>
		@endif
@endsection

@section('content')
		@if (isset($lis))
			<form action="{{ url('/listpeople', $lis->id ) }}" method="POST"><input list="_method" type="hidden" value="PUT">
		@else
			<form action="{{ url('/listpeople') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('list') ? ' has-error' : '' }}">
			<label for="list">List</label>
			<input type="text" class="form-control" name="list" id="list" placeholder="Masukan nama List" @if(isset($lis))
				value="{{ $lis->list }}"
			@elseif(isset($errors))
				 value="{{ old('list') }}"
			@endif>
		@if ($errors->has('list'))
            <span class="help-block">
                <strong>{{ $errors->first('list') }}</strong>
            </span>
        @endif
		</fieldset>

	
	
	
{{-- 
	<div class="radio">
		<label>
			<input type="radio" list="status" id="status1" value="0" checked>
			Aktif
		</label>
	</div>
	<div class="radio">
		<label>
			<input type="radio" list="status" id="status2" value="1">
			non-aktif
		</label>
	</div> --}}
{{-- 
	<fieldset class="form-group">
		<label class="checkbox">
			<input type="checkbox" id="status" list="status" value="0"> Aktif
		</label>
	</fieldset> --}}
	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection


