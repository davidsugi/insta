@extends('app')

@section('title')
		view media
@endsection

@section('ext')
	<style type="text/css">

		.alert{
			font-size:20px;
		}
	</style>
@endsection

@section('bread')
	<li><a href="{{ route ('home') }}"><i class="fa fa-dashboard"></i> </a></li><li class="active">Media</li>
@endsection

@section('Header')
	View Media <small>Lihat seluruh media yang ada</small>
@endsection

@section('content')

 <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-body table-responsive">
	<a class="btn btn-primary" href="{{ action('MediaController@create') }}" role="button"> Tambah media baru </a>
	<br>
	<br>
	<br>
<table id="example1" class="table table-bordered table-striped">

						<thead>
							<tr>
								<th>Id Ig media</th>
								<th class="hidden-md hidden-sm hidden-xs">code</th>
								<th class="hidden-xs">owner</th>
								<th>Publish</th>
								<th>Tags</th>
								<th>Tumbnail pic</th>
								<th>display pic</th>
								<th>like</th>
								<th>caption</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($res as $row) <tr>
{{-- 			@foreach ($row->toArray() as $column)
				<td>{{ $column }}</td>
				@endforeach --}}
				<td>{{ $row->ig_id }}</td>
				<td class="hidden-md hidden-sm hidden-xs">{{ $row->code }}</td>
				<td class="hidden-xs">{{ $row->owner_id }}</td>
				<td>{{ $row->dateLabel }}</td>
				<td>{{ $row->tags->tag }}</td>
				<td><a href="{{ $row->thumbnail_src }}"> [link]</a></td>
				<td><a href="{{ $row->display_src }}"> [link]</a></td>
				<td>{{ $row->likes }}</td>
				<td class="caption">{{ $row->caption }}</td>
				<td><a class="btn btn-primary" href="{{ action('MediaController@show', [$row->id]) }}" role="button">detail</a></td>
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