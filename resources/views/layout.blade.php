<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- End Bootstrap -->
		<link href="{{ asset( '/css/stylesheet.css' )}}" rel="stylesheet">
		<title>@yield('title') - Laravel App Learn</title>
	</head>
	<body class="bg-body-tertiary">
		<header>
			<nav class="navbar navbar-expand-lg bg-body-tertiary container-fluid fixed-top">
				<ul class="navbar-nav">
					<li class="nav-item"><a href={{ route('report.index') }}>Laravel App Learn</a>
				</ul>
			</nav>
		</header>
		<div id="contents" class="container" style="padding-top: 50px; padding-bottom: 50px;">
			@yield('content')<?= "\n" ?>
		</div>
		<footer class="bg-body-tertiary">
			<address style="text-align: center;">&copy; Copyright.</address>
		</footer>
	</body>
</html>