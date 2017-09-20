@extends('app')

@section('ext')
<style type="text/css">

	.command{
		background-color:deepskyblue; 
		padding:5px; 
		width:100%;
		color:white;
		font-size: 30px;
	}
	.blo{
		border-radius:30px;
		padding:30px;
		margin: 10px;
		font-size:1.5em;

	}
	.front{
		background-color:lightsteelblue;
		
		margin-top:100px;

	}
	.back{
		z-index;-1;
		background-color:grey;
		margin-left: 160px;
		margin-top:100px;
		color:grey;
	}
	.back>p{
		display:none;
	}
	.modal-body>p{
		font-size:40px;
	}

	.modal-body>p>span{
		color:red;
	}

	.heads{
		text-align:center;
	}
	.cover {
	  object-fit: cover;
	  width:100%;
	}
	.heads>h2{
		text-align: left;
		margin:5px;
		font-size: 30px;
	}

	@media screen and (min-width: 710px) {
		.buttoned {
			margin-left:30px;
		}
	}
</style>
@endsection

@section('bread')
<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('medias.index') }}"> Media</a></li> <li class="active"> {{ $res->ig_id }} </li>
@endsection

@section('Header')
Detail Media <small>melihat data media {{ $res->ig_id }}</small>
@endsection

@section('title')
Media {{$res->ig_id}}
@endsection

@section('content')
<div class="row command">
	<div class="col-sm-2"> </div>
	Perintah:<a class="btn btn-primary buttoned" href="{{ action('MediaController@edit', $res->id) }}" role="button">edit</a>
	<button class="btn btn-danger buttoned" data-toggle="modal" data-target="#delete">Delete</button>
</div>

<br>
<br>
<div class="row">
	<div class="col-sm-6 col-md-offset-3 col-xs-12 col-sm-offset-2 ">
		<div class="box box-solid box-primary">
			<div class="box-header heads">
				<h2><i class="fa fa-fw fa-instagram"></i> {{ $res->ig_id }}</h2>
				<img src="{{ $res->thumbnail_src }}" class="cover"/>
			</div>
			<div class="box-body table-responsive">
				<h4><i class="fa fa-fw fa-heart"></i> {{ $res->likes }}</h4><br>
				Owner Id:{{ $res->owner_id }}<br>
				{{ $res->caption }}
				<div class="label bg-aqua">{{ $res->tags->tag }}</div>
			</div>
		</div>
	</div>
		</div>
	</div>
</div>

<br>
<br>



<div class="modal fade" id="delete">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Konfirmasi penghapusan</h4>
			</div>
			<div class="modal-body">
				<p>Anda yakin mau menghapus Media <span> {{ $res->ig_id }} </span> ?</p>
			</div>
			<div class="modal-footer">

				<form action="{{ action('MediaController@destroy', $res->id) }}" method="POST"><input name="_method" type="hidden" value="DELETE">
					{{ csrf_field() }}
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@include("datatablescr")