<?php

	function getPage($pagename) {
		
		global $website_pages;
		
		$path = "$website_pages/$pagename.html";
		
		if(file_exists($path)) {
			return openPage($path);
		} else {
			return openPage("$website_pages/notfound.html");
		}
	}

	function openPage($pageurl) {
		$fh = fopen($pageurl, "r");
		$fc = fread($fh, filesize($pageurl));
		
		fclose($fh);
		
		return $fc;
	}

	function genHome($name) {
		if ($_GET['top1'] ||
		    $_GET['top2'] ||
		    $_GET['top3'] ||
		    $_GET['top4'] ||
		    $_GET['top5'] ||
		    $_GET['top5']) {
			echo '<td><a href="index.php">' . $name . '</a></td>';
		} else {
			echo '<td><a href="index.php"><h1>' . $name . '<h1></a></td>';
		}
	}

	function genTopic($nr, $name) {
		if ($_GET['top' . $nr]) {
			echo '<td><a href="index.php?top' . $nr . '=true"><h1>' . $name . '<h1></a></td>';
		} else {
			echo '<td><a href="index.php?top' . $nr . '=true">' . $name . '</a></td>';
		}
	}

	function renderArticle($topic, $pageName, $day, $month, $year) {
		
		switch ($topic) {
			case ("nature"):
				renderTop1($pageName, $day, $month, $year);
				break;
			
			case ("minimal"):
				renderTop2($pageName, $day, $month, $year);
				break;
			
			case ("utopia"):
				renderTop3($pageName, $day, $month, $year);
				break;
			
			case ("bigdata"):
				renderTop4($pageName, $day, $month, $year);
				break;
			
			case ("studium"):
				renderTop5($pageName, $day, $month, $year);
				break;
			
			default:
				getPage("render_error");
				break;
		}
	}

	function renderTop1($pageName, $day, $month, $year) {
		if ($_GET['top1'] ||
				(!$_GET['top2'] &&
				 !$_GET['top3'] &&
				 !$_GET['top4'] &&
				 !$_GET['top5']) ) { loadArticleContent($pageName, $day, $month, $year); }
	}

	function renderTop2($pageName, $day, $month, $year) {
		if ($_GET['top2'] ||
				(!$_GET['top1'] &&
				 !$_GET['top3'] &&
				 !$_GET['top4'] &&
				 !$_GET['top5']) ) { loadArticleContent($pageName, $day, $month, $year); }
	}

	function renderTop3($pageName, $day, $month, $year) {
		if ($_GET['top3'] ||
				(!$_GET['top2'] &&
				 !$_GET['top1'] &&
				 !$_GET['top4'] &&
				 !$_GET['top5']) ) { loadArticleContent($pageName, $day, $month, $year); }
	}

	function renderTop4($pageName, $day, $month, $year) {
		if ($_GET['top4'] ||
				(!$_GET['top2'] &&
				 !$_GET['top3'] &&
				 !$_GET['top1'] &&
				 !$_GET['top5']) ) { loadArticleContent($pageName, $day, $month, $year); }
	}

	function renderTop5($pageName, $day, $month, $year) {
		if ($_GET['top5'] ||
				(!$_GET['top2'] &&
				 !$_GET['top3'] &&
				 !$_GET['top4'] &&
				 !$_GET['top1']) ) { loadArticleContent($pageName, $day, $month, $year); }
	}

	function renderDate($day, $month, $year) {
		
		echo '<table><tr><td class="date">';
			echo '<br><br><br>';
		
		switch ($month) {
			case (1):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'Januar ' . $year . '<br>';
				break;
			case (2):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'Februar ' . $year . '<br>';
				break;
			case (3):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'M&auml;rz ' . $year . '<br>';
				break;
			case (4):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'April ' . $year . '<br>';
				break;
			case (5):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'Mai ' . $year . '<br>';
				break;
			case (6):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'Juni ' . $year . '<br>';
				break;
			case (7):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'Juli ' . $year . '<br>';
				break;
			case (8):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'August ' . $year . '<br>';
				break;
			case (9):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'September ' . $year . '<br>';
				break;
			case (10):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'Oktober ' . $year . '<br>';
				break;
			case (11):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'November ' . $year . '<br>';
				break;
			case (12):
				echo '<b class="date">' . $day . '.</b><br>';
				echo 'Dezember ' . $year . '<br>';
				break;
			default:
				break;
	}


		echo '</td><td>';
	}

	function loadArticleContent($pageName, $day, $month, $year) {
		
		echo '<div id="section">';
			renderDate($day, $month, $year);
			$pc = getPage($pageName);
			echo "$pc";
			echo '<hr color=#000000 />';
		echo '</td></tr></table>';
		echo '</div>';
	}
?>
