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
		font-size:15px;
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
<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li><a href="{{ route ('tags.index') }}"> Tags</a></li> <li class="active"> {{ $res->tag }} </li>
@endsection

@section('Header')
Detail Tags <small>melihat data tag {{ $res->tag }}</small>
@endsection

@section('title')
Tags {{$res->tag}}
@endsection

@section('content')
<div class="row command">
	<div class="col-sm-2"> </div>
	Perintah:<a class="btn btn-primary buttoned" href="{{ action('TagsController@edit', $res->id) }}" role="button">edit</a>
	<button class="btn btn-danger buttoned" data-toggle="modal" data-target="#delete">Delete</button>
</div>

<br>
<div class="row">
	<div class="col-lg-6 col-lg-offset-3 col-xs-12">
		<div class="box box-solid bg-navy">
			<div class="box-header">
				<h1 class="box-title"> Detail Tag: {{ $res->tag }} </h1>
			</div>
			<div class="box-body table-responsive">

				<p> Nomor history: {{ $res->id }} </p>
				<p> Tag: {{ $res->tag }} </p>
				<p> update interval: {{ $res->local }} </p>
				<p> Latest update: {{ $res->last }} </p>
			</div>
		</div>
	</div>
</div>



<br>
<br>



@if(null!==$med->toArray())
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header table-responsive">
				<H2 class="box-title">List Media dengan tag {{ $res->tag }} </H2>
			</div>
			<div class="box-body table-responsive">
				
					<table id="example1" class="table table-bordered table-striped">

						<thead>
							<tr>
								<th>Id Ig media</th>
								<th class="hidden-md hidden-sm hidden-xs">code</th>
								<th class="hidden-xs">Owner</th>
								<th>Publish</th>
								<th>Tumbnail pic</th>
								<th>display pic</th>
								<th>like</th>
								<th>caption</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($med as $row) <tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
				@endforeach --}}
				<td><a href="{{ route('medias.show', $row->id) }}">{{ $row->ig_id }}<a/></td>
				<td class="hidden-md hidden-sm hidden-xs">{{ $row->code }}</td>
				<td class="hidden-xs">{{ $row->owner_id }}</td>
				<td>{{ $row->dateLabel }}</td>
				<td><a href="{{ $row->thumbnail_src }}"> [link]</a></td>
				<td><a href="{{ $row->display_src }}"> [link]</a></td>
				<td>{{ $row->likes }}</td>
				<td class="caption">{{ $row->caption }}</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
</div>
</div>
</div>



	@endif




{{-- 				@php($i=1)
@if(null!==$med->toArray())
@foreach ($med as $row)

			<td>{{ $row->id }}</td>
			<td>{{ $row->name }}</td>
			<td>{{ $row->startLabel }}</td>
			<td>{{ $row->endLabel }}</td>
			<td>{{ H::money($row->fee) }}</td>
			<td>{{ H::money($row->renewal_fee) }}</td>
			<td>{{ $row->tag->name }}</td>
			<td>{{ $row->registrar->registrar }}</td>
		</tr>
		@if ($i==4)		
			<div class="row">
		@endif
<div class="col-md-6 col-xs-12 col-lg-3">
		<div class="box box-solid box-primary">
			<div class="box-header heads">
				<img src="{{ $row->thumbnail_src }}"/>
			</div>
			<div class="box-body table-responsive">
				{{ $row->caption }}
			</div>
		</div>
	</div>
	@if ($i==4)		
			</div>
			@php($i=0)
		@endif
	@php($i++)
	@endforeach --}}


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
					<p>Anda yakin mau menghapus Tags <span> {{ $res->name }} </span> ?</p>
				</div>
				<div class="modal-footer">

					<form action="{{ action('TagsController@destroy', $res->id) }}" method="POST"><input name="_method" type="hidden" value="DELETE">
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