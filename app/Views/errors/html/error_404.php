<!-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>

	<style>
		div.logo {
			height: 200px;
			width: 155px;
			display: inline-block;
			opacity: 0.08;
			position: absolute;
			top: 2rem;
			left: 50%;
			margin-left: -73px;
		}

		body {
			height: 100%;
			background: #fafafa;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #777;
			font-weight: 300;
		}

		h1 {
			font-weight: lighter;
			letter-spacing: 0.8;
			font-size: 3rem;
			margin-top: 0;
			margin-bottom: 0;
			color: #222;
		}

		.wrap {
			max-width: 1024px;
			margin: 5rem auto;
			padding: 2rem;
			background: #fff;
			text-align: center;
			border: 1px solid #efefef;
			border-radius: 0.5rem;
			position: relative;
		}

		pre {
			white-space: normal;
			margin-top: 1.5rem;
		}

		code {
			background: #fafafa;
			border: 1px solid #efefef;
			padding: 0.5rem 1rem;
			border-radius: 5px;
			display: block;
		}

		p {
			margin-top: 1.5rem;
		}

		.footer {
			margin-top: 2rem;
			border-top: 1px solid #efefef;
			padding: 1em 2em 0 2em;
			font-size: 85%;
			color: #999;
		}

		a:active,
		a:link,
		a:visited {
			color: #dd4814;
		}
	</style>
</head>

<body>
	<div class="wrap">
		<h1>404 - File Not Found</h1>

		<p>
			<?php if (!empty($message) && $message !== '(null)') : ?>
				<?= esc($message) ?>
			<?php else : ?>
				Sorry! Cannot seem to find the page you were looking for.
			<?php endif ?>
		</p>
	</div>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>404 Not Found!</title>
	<!-- Fontawesome Icon -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		@import url(https://fonts.googleapis.com/css?family=Droid+Sans:400,700);

		* {
			cursor: url('https://puu.sh/j1a8v/067742b89d.ico'), default;
		}

		body {
			background: #041222;
			text-align: center;
			font-family: 'Droid Sans', sans-serif;
		}

		.big {
			font-size: 60pt;
			margin-top: 30px;
			margin-bottom: 0;
			color: #ecf0f1;
			text-shadow: 0px 4px 0px rgba(150, 150, 150, 1);
		}

		.not-found {
			font-size: 17pt;
			color: #ecf0f1;
		}

		#err-icon {
			font-size: 80pt;
			color: #bdc3c7;
			margin-top: 150px;
			text-shadow: 0px 4px 0px rgba(150, 150, 150, 1);
			-webkit-transition: 0.5s;
		}

		#err-icon:hover {
			-webkit-transform: scale(1.1);
			color: #e74c3c;
			text-shadow: 0px 4px 0px rgba(192, 57, 43, 1);
		}

		p {
			color: rgba(189, 195, 199, 1.0);
			font-weight: bold;
		}

		@keyframes slidedown {
			0% {
				opacity: 0;
				transform: rotateX(-180deq);
			}

			50% {
				transform: rotateX(-40deg);
			}

			100% {
				opacity: 1;
				transform: rotateX(0deg);
			}
		}

		.slide {
			transform-origin: top center;
			animation: slidedown 1000ms ease-in-out forwards;
		}
	</style>
</head>

<body>
	<div class="slide">
		<i id="err-icon" class="fa fa-exclamation-circle"></i>
		<p class="big">404</p>
		<p class="not-found">Page Not Found</p>
		<?php if (!empty($message) && $message !== '(null)') : ?>
			<p><?= esc($message) ?></p>
		<?php else : ?>
			<p>The file or directory you are looking for isn't here!</p>
		<?php endif ?>
	</div>
</body>

</html>