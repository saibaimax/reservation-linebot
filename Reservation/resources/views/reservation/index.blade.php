@extends('layouts.app')

@section('content')
<!-- フラッシュメッセージ -->
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if ($bookings->isEmpty())
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body text-center">
					<strong style="color:#0000ff">{{ "予約がありませんでした。"}}</strong>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@foreach ($bookings as $booking)
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					申請日時：{{ $booking->created_at->format('Y年m月d日　H時i分') }}
				</div>
					<div class="panel-body">
						<table class="table table-hover table-borderd" border="9">
							<tbody>
								<tr>
									<th class="text-center">名前</th>
									<td class="text-center">{{ $booking->name }}さん</td>
								</tr>
								<tr>
									<th class="text-center">LINE_ID</th>
									<td class="text-center">{{ $booking->line_id }}</td>
								</tr>
								<tr>
									<th class="text-center">予約日時</th>
									<td class="text-center">{{ $booking->booking_date->format('Y年m月d日　H時i分') }}</td>
								</tr>
								<tr>
									<th class="text-center">予約人数</th>
									<td class="text-center">{{ $booking->booking_number }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach
@endsection
