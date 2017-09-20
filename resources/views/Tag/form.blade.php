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
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('tags.index') }}">Customer</a></li><li class="active">		
		@if (isset($tagres))
			Update tag:{{ $tagres->tag }}
		@else
			Tambah tag
		@endif</li>
@endsection

@section('title')
		@if (isset($tagres))
			Update tag
		@else
			Tambah tag
		@endif
@endsection

@section('Header')
		@if (isset($tagres))
			Update tag<small>Ubah data tag: {{ $tagres->tag }} </small>
		@else
			Tambah tag<small>Tambah tag baru</small>
		@endif
@endsection

@section('content')
		@if (isset($tagres))
			<form action="{{ url('/tags', $tagres->id ) }}" method="POST"><input name="_method" type="hidden" value="PUT">
		@else
			<form action="{{ url('/tags') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('tag') ? ' has-error' : '' }}">
			<label for="tag">Nama</label>
			<input type="text" class="form-control" name="tag" id="tag" placeholder="Masukan nama tag" @if(isset($tagres))
				value="{{ $tagres->tag }}"
			@elseif(isset($errors))
				 value="{{ old('tag') }}"
			@endif>
		@if ($errors->has('tag'))
            <span class="help-block">
                <strong>{{ $errors->first('tag') }}</strong>
            </span>
        @endif
		</fieldset>

	<fieldset class="form-group {{ $errors->has('update_internal') ? ' has-error' : '' }}">
		<label for="update_internal">Interval update</label>
		<select class="js-example-basic-single form-control" name="update_internal">
			@php ($q=0)
				@if(isset($tagres))
					@php ($q=$tagres->update_internal)
				@elseif(isset($errors))
					@php ($q=old('update_internal'))
				@endif>
					<option value="1" {{ $q==1 ? "selected" : ""}}>1 Jam</option>
					<option value="2" {{$q==2 ? "selected" : ""}}>30 menit</option>
					<option value="3" {{$q==3 ? "selected" : ""}}>15 menit</option>
					<option value="4" {{$q==4 ? "selected" : ""}}>tidak pernah</option>
				
			</select>
		@if ($errors->has('update_internal'))
            <span class="help-block">
                <strong>{{ $errors->first('update_internal') }}</strong>
            </span>
        @endif
	</fieldset>

{{-- 
	<div class="radio">
		<label>
			<input type="radio" name="status" id="status1" value="0" checked>
			Aktif
		</label>
	</div>
	<div class="radio">
		<label>
			<input type="radio" name="status" id="status2" value="1">
			non-aktif
		</label>
	</div> --}}
	{{-- 
	<fieldset class="form-group">
		<label class="checkbox">
			<input type="checkbox" id="status" name="status" value="0"> Aktif
		</label>
	</fieldset> --}}
	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection


