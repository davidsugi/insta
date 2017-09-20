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
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('medias.index') }}">Customer</a></li><li class="active">		
		@if (isset($med))
			Update media:{{ $med->name }}
		@else
			Tambah media
		@endif</li>
@endsection

@section('title')
		@if (isset($med))
			Update media
		@else
			Tambah media
		@endif
@endsection

@section('Header')
		@if (isset($med))
			Update media<small>Ubah data media: {{ $med->name }} </small>
		@else
			Tambah media<small>Tambah media baru</small>
		@endif
@endsection

@section('content')
		@if (isset($med))
			<form action="{{ url('/medias', $med->id ) }}" method="POST"><input name="_method" type="hidden" value="PUT">
		@else
			<form action="{{ url('/medias') }}" method="POST">
		@endif
		 {{ csrf_field() }}
		<fieldset class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
			<label for="name">Nama</label>
			<input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama media" @if(isset($med))
				value="{{ $med->name }}"
			@elseif(isset($errors))
				 value="{{ old('name') }}"
			@endif>
		@if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
		</fieldset>

	<fieldset class="form-group {{ $errors->has('Addres') ? ' has-error' : '' }}">
		<label for="Addres">Alamat</label>
		<input type="text" class="form-control" id="Addres" name="Addres" placeholder="Masukan Alamat" @if(isset($med))
			value="{{ $med->Addres }}"
			@elseif(isset($errors))
				 value="{{ old('Addres') }}"
			@endif>
		@if ($errors->has('Addres'))
            <span class="help-block">
                <strong>{{ $errors->first('Addres') }}</strong>
            </span>
        @endif
	</fieldset>

	<fieldset class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">
		<label for="dob">Tanggal lahir</label>
		<input type="date" class="form-control" id="dob" name="dob" placeholder="Masukan Tanggal lahir" @if(isset($med))
				value="{{ $med->dob->format('Y-m-d') }}"
			@elseif(isset($errors))
				 value="{{ old('dob') }}"
			@endif>
				@if ($errors->has('dob'))
            <span class="help-block">
                <strong>{{ $errors->first('dob') }}</strong>
            </span>
        @endif
	</fieldset>	
		<fieldset class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
			<label for="name">Nomor Telpon/Handphone</label>
			<input type="text" class="form-control" name="phone" id="phone" placeholder="Masukan nomor anda"
			@if(isset($med))
				value="{{ $med->phone }}"
			@elseif(isset($errors))
				 value="{{ old('phone') }}"
			@endif>
			@if ($errors->has('phone'))
	            <span class="help-block">
	                <strong>{{ $errors->first('phone') }}</strong>
	            </span>
	        @endif
		</fieldset>

		<fieldset class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			<label for="name">Email</label>
			<input type="email" class="form-control" name="email" id="email" placeholder="masukan email anda" 
			@if(isset($med))
				value="{{ $med->email }}"
			@elseif(isset($errors))
				 value="{{ old('email') }}"
			@endif>
			@if ($errors->has('email'))
	            <span class="help-block">
	                <strong>{{ $errors->first('email') }}</strong>
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
	<div class="form-group row">
		<label class="col-sm-2">Aktif?</label>
			<div class="col-sm-10">
				<div class="checkbox">
					<label>
						<input name="status" id="status" type="checkbox" value="0" @if(isset($med))
				@if ($med->status==0)
					checked
				@endif
			@else
				checked
			@endif  > 
					</label>
				</div>
			</div>
		</div>{{-- 
	<fieldset class="form-group">
		<label class="checkbox">
			<input type="checkbox" id="status" name="status" value="0"> Aktif
		</label>
	</fieldset> --}}
	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection


