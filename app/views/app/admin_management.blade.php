<!DOCTYPE html>
<html>
<head>
	<title>BeezMode Management</title>
</head>
<body>
	<center>
		<form action="{{URL::to('encryptor')}}" method="post">
			UN: <input type="text" name="username"><br>
			PW: <input type="password" name="password"><br>
			<input type="submit" name="Login">
		</form>
	</center>
</body>
</html>