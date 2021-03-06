<!DOCTYPE html>
<html lang="ja">
<style>
  body {
    background-color: #fffacd;
  }
  h1 {
    font-size: 16px;
    color: #ff6666;
  }
  #button {
    width: 200px;
    text-align: center;
  }
  #button a {
    padding: 10px 20px;
    display: block;
    border: 1px solid #2a88bd;
    background-color: #FFFFFF;
    color: #2a88bd;
    text-decoration: none;
    box-shadow: 2px 2px 3px #f5deb3;
  }
  #button a:hover {
    background-color: #2a88bd;
    color: #FFFFFF;
  }
</style>
<body>
<h1>予約一覧</h1>
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
									<th class="text-center">予約日時</th>
									<td class="text-center">{{ $booking->booking_date }}</td>
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
<p id="button">
  <a href="https://procir-study.site/nagai127/poem/Reservation/public/">ホームページはこちら</a>
</p>
</body>
</html>
