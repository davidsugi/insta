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
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('detaillist.index') }}">Customer</a></li><li class="active">		
		@if (isset($lis))
			Update List Nama:{{ $lis->username }}
		@else
			Tambah List Nama
		@endif</li>
@endsection

@section('title')
		@if (isset($lis))
			Update List Nama
		@else
			Tambah List Nama
		@endif
@endsection

@section('Header')
		@if (isset($lis))
			Update List Nama<small>Ubah data List Nama: {{ $lis->username }} </small>
		@else
			Tambah List Nama<small>Tambah List Nama baru</small>
		@endif
@endsection

@section('content')
		@if (isset($lis))
			<form action="{{ url('/detaillist', $lis->id ) }}" method="POST"><input username="_method" type="hidden" value="PUT">
		@else
			<form action="{{ url('/detaillist') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
			<label for="username">Username</label>
			<input type="text" class="form-control" name="username" id="username" placeholder="Masukan List Nama" @if(isset($lis))
				value="{{ $lis->username }}"
			@elseif(isset($errors))
				 value="{{ old('username') }}"
			@endif>
		@if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
		</fieldset>

		@if (isset($lis))
			<form action="{{ url('/detaillist', $lis->id ) }}" method="POST"><input name="_method" type="hidden" value="PUT">
		@else
			<form action="{{ url('/detaillist') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="naem">Nama</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Masukan List Nama" @if(isset($lis))
				value="{{ $lis->name }}"
			@elseif(isset($errors))
				 value="{{ old('name') }}"
			@endif>
		@if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
		</fieldset>
	@php($q=1)
				@if(isset($lis))
				 @php( $q=$lis->list_id )
				 @elseif(isset($idList))
				 @php( $q=$idList )
				@elseif(isset($errors))
					 @php($q=old('list_id'))
				
				@endif
		@if (isset($lis))
			<form action="{{ url('/detaillist', $lis->id ) }}" method="POST"><input name="_method" type="hidden" value="PUT">
		@else
			<form action="{{ url('/detaillist') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('list_id') ? ' has-error' : '' }}">
			<label for="username">List</label>
			<select type="text" class="form-control" name="list_id" id="list_id">
		
			@foreach ($lisn as $listname)
				 @if ($q==$listname->id)
					<option value="{{ $listname->id }}" selected>{{ $listname->list }}</option>
				@else
					<option value="{{ $listname->id }}">{{ $listname->list }}</option>
				@endif
				

				
			@endforeach

			</select>
			
		</fieldset>
	
	
{{-- 
	<div class="radio">
		<label>
			<input type="radio" username="status" id="status1" value="0" checked>
			Aktif
		</label>
	</div>
	<div class="radio">
		<label>
			<input type="radio" username="status" id="status2" value="1">
			non-aktif
		</label>
	</div> --}}
{{-- 
	<fieldset class="form-group">
		<label class="checkbox">
			<input type="checkbox" id="status" username="status" value="0"> Aktif
		</label>
	</fieldset> --}}
	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection


