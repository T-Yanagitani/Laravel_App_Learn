<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- End Bootstrap -->
		<title> @yield('title') - Laravel_App_Learn</title>
	</head>
	<body>
		<div class="container">
			<nav class="navbar">
				<ul>
					<li><a href={{ route('report.index') }}>INDEX</a>
					<li><a href={{ route('report.foo') }}>foo</a>
				</ul>
			</nav>
			@yield('content')
			<footer>
				<address>&copy; Copyright.</address>
			</footer>
		</div>
	</body>
</html>
