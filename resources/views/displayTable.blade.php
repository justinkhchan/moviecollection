@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Display Table</div>

				<div class="panel-body">
					Display table:
					<br /><br />
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Title</th>
								<th>Date Bought</th>
								<th>Price</th>
								<th>Bought From</th>
								<th>Rotten Tomatoes Rating</th>
								<th>Notes</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($movies as $movie)
								<tr>
									<td>{!! $movie->title !!}</td>
									<td>{!! $movie->bought !!}</td>
									<td>{!! $movie->price !!}</td>
									<td>{!! $movie->bought_from !!}</td>
									<td>{!! $movie->rt_rating !!}</td>
									<td>{!! $movie->other_notes !!}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
