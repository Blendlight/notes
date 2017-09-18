<?php
require_once("conf.php");

require_once("includes/php/functions.php");

$default_styles[] = "includes/libraries/bootstrap/css/bootstrap.min.css";
$default_styles[] = "includes/css/style.css";

$default_scripts[] = "includes/libraries/bootstrap/js/jquery.js";

$SCRIPTS = array_merge($default_scripts, isset($SCRIPTS)?$SCRIPTS:array());
$STYLES = array_merge($default_styles, isset($STYLES)?$STYLES:array());

//@session_start();
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?= isset($title)==true?$title:SITE_NAME;?></title>
		<?php
		//load stylesheets
		load_styleSheets($STYLES);

		//load scripts
		load_scripts($SCRIPTS);
		?>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="./"><?= SITE_NAME?></a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<form class="navbar-form navbar-left">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>

						<ul class="navbar-nav nav">
							<li><a href="">Item 1</a></li>
							<li><a href="">Item 2</a></li>
							<li><a href="">Item 3</a></li>
						</ul>
						<ul class="navbar-nav nav navbar-right">
							<li>
								<a href="content_add.php">Add Content</a>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div>
			</div><!-- /.container-fluid -->
		</nav>