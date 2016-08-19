<?php require_once 'config.php'; ?>
<?php require_once 'functions.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css" type="text/css">
		<title>Kroovy's Blog | Home</title>
	</head>

	<body>
	<div id="header">
		<table>
		<?php
			genHome("#HOME");
			genTopic(1, "#NATUR");
			genTopic(2, "#MINIMALISMUS");
			genTopic(3, "#UTOPIA");
			genTopic(4, "#BIGDATA");
			genTopic(5, "#STUDIUM");
			$ip = $_SERVER['REMOTE_ADDR'];
			shell_exec("./count.sh $ip");
		?>
		</table>
		<hr color=#000000 />
	</div>

	<div id="impressum">
		<a class="impressum" href="impressum.php">Impressum & Disclaimer</a>
	</div>

	<div id="aside">
	</div>

		<?php
			renderArticle("utopia", "rathaus", 24, 3, 2016);
		?>
	</body>
</html>
