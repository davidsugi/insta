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
	.caption{
		font-size:10px;
	}
	@media screen and (min-width: 710px) {
		.buttoned {
			margin-left:30px;
		}
	}
</style>
@endsection

@section('bread')
<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('listpeople.index') }}"> List</a></li> <li class="active"> {{ $res->list }} </li>
@endsection

@section('Header')
Detail List <small>melihat data list {{ $res->list }}</small>
@endsection

@section('title')
List {{$res->list}}
@endsection

@section('content')
<div class="row command">
	<div class="col-sm-2"> </div>
	Perintah:<a class="btn btn-primary buttoned" href="{{ action('ListPersonController@edit', $res->id) }}" role="button">edit</a>
	<button class="btn btn-danger buttoned" data-toggle="modal" data-target="#delete">Delete</button>
</div>

<br>
<div class="row">
	<div class="col-lg-6 col-lg-offset-3 col-xs-12">
		<div class="box box-solid bg-navy">
			<div class="box-header">
				<h1 class="box-title"> Detail List: {{ $res->list }} </h1>
			</div>
			<div class="box-body table-responsive">
				<p> Nomor list: {{ $res->id }} </p>
				<p> Nama List: {{ $res->list }} </p>
			</div>
		</div>
	</div>
</div>



<br>
<br>



@if(null!==$det->toArray())
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header table-responsive">
				<H2 class="box-title">List Username IG dengan list {{ $res->list }} </H2>
			</div>
			<div class="col-sm-2"> </div>
	Perintah:<a class="btn btn-primary buttoned" href="{{ action('DetailListController@edit', $res->id) }}" role="button">Add +</a>

			<div class="box-body table-responsive">
				
					<table id="example1" class="table table-bordered table-striped">

						<thead>
							<tr>
								<th>Id</th>
								<th>Username</th>
								<th>Name</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($det as $row) <tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
				@endforeach --}}
				<td>{{ $row->username }}</td>
				<td><a href="{{ route('detaillist.show', $row->id) }}">{{ $row->name }}<a/></td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
</div>
</div>
</div>



	@endif


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
					<p>Anda yakin mau menghapus List <span> {{ $res->name }} </span> ?</p>
				</div>
				<div class="modal-footer">

					<form action="{{ action('ListPersonController@destroy', $res->id) }}" method="POST"><input name="_method" type="hidden" value="DELETE">
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