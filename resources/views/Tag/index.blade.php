@extends('app')

@section('title')
		View tag
@endsection

@section('ext')
	<style type="text/css">

		.alert{
			font-size:20px;
		}
	</style>
@endsection

@section('bread')
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li class="active">Tags</li>
@endsection

@section('Header')
	View Tags <small>Lihat seluruh tag yang ada</small>
@endsection

@section('content')

 <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-info">
                                <div class="box-body table-responsive">
	<a class="btn btn-primary" href="{{ action('TagsController@create') }}" role="button"> Tambah tag baru </a>
	<br>
	<br>
	<br>
<table id="example1" class="table table-bordered table-striped">
		<thead>
				<tr>
				<th>Nomor tag</th>
				<th>Tags</th>
				<th>interval update</th>
				<th>last update</th>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
		@foreach ($res as $row)
		<tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
			@endforeach --}}
			<td>{{ $row->id }}</td>
			<td>{{ $row->tag }}</td>
			<td>{{ $row->local }}</td>
			<td>{{ $row->last }}</td>
			<td><a class="btn btn-primary" href="{{ action('TagsController@show', [$row->id]) }}" role="button">detail</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
</div>
</div>
</div>

@endsection

@include("datatablescr")