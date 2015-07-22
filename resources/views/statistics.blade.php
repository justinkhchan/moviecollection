@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Statistics</div>

				<div class="panel-body">
					Number of movies: {!! $numMovies !!}
					<br />
					Movies with price defined: {!! $numPriceDefined !!}
					<br />
					Sum of prices: {!! $totalSum !!}
					<br />
					Sum of prices (assuming price is ${!! $assumePrice !!}): {!! $totalSumAssume !!}
					<br />
					Average Price (exclude undefined): {!! $avgExcludeUndef !!}
					<br />
					Average Price (include undefined): {!! $avgIncludeUndef !!}
					<br />
					Median Price: {!! $medianPrice !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
