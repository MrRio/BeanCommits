<?php include_once('logic.php') ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Beanstalk Commit Feed</title>
	<meta name="viewport" content="initial-scale=1.0">

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="application/js/load-more.js"></script>

	<?php $html->css(); ?>
</head>
<body>
	<div class="header">
		<section class="container">
			<h1 class="float-left"><?=$config['header_title']?></h1>
			<a href="<?=$html->baseUrl()?>" class="button float-right small">RESET</a>
		</section>
	</div>
	