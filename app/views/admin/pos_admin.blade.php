<!DOCTYPE html>
<html>
<head>
	<title>BeezMode Management</title>
</head>
<body>
	<center>
		List of Companies <br>
		<b>Change at your own risk! Sensitive AF</b>
		<table border="1">
			<thead>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>API_URI</td>
					<td>API_Username</td>
					<td>API_Password</td>
					<td></td>
				</tr>
			</thead>
			@foreach($companies as $c)
				<tr>
					<td>
						{{$c->id}}
					</td>
					<form action="{{URL::to('update_api_connection')}}" method="post">
						<td>
							{{$c->company_name}}
						</td>
						<td>
							<input type="hidden" name="id" value="{{$c->id}}">
							<input type="text" name="api_link" value="{{$c->api_link}}">
						</td>
						<td>
							<input type="text" name="api_username" value="{{$c->api_username}}">
						</td>
						<td>
							<input type="text" name="api_password" value="{{$c->api_password}}">
						</td>
						<td>
							<input type="submit" name="Change">
						</td>
					</form>
				</tr>
			@endforeach
		</table>
	</center>
</body>
</html>