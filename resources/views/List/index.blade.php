@extends('app')

@section('title')
		view list
@endsection

@section('ext')
	<style type="text/css">

		.alert{
			font-size:20px;
		}
	</style>
@endsection

@section('bread')
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li class="active">List</li>
@endsection

@section('Header')
	View List <small>Lihat seluruh list yang ada</small>
@endsection

@section('content')

 <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-body table-responsive">
	<a class="btn btn-primary" href="{{ action('ListPersonController@create') }}" role="button"> Tambah list baru </a>
	<br>
	<br>
	<br>
<table id="example1" class="table table-bordered table-striped">

						<thead>
							<tr>
								<th>Id list</th>
								<th>list</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($res as $row) <tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
				@endforeach --}}
				<td>{{ $row->id }}</td>
				<td>{{ $row->list }}</td>
				<td><a class="btn btn-primary" href="{{ action('ListPersonController@show', [$row->id]) }}" role="button">detail</a></td>
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