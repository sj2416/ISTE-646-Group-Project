<?php
$title = "prof";
require "checkToken.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Dashboard Template for Bootstrap</title>
		<link href="./css/bootstrap.min.css" rel="stylesheet">
		<link href="./css/dashboard.css" rel="stylesheet">
		<script src="./js/ie-emulation-modes-warning.js"></script>
		<style type="text/css"></style>
		<script src="./js/jquery.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
		<script src="./js/holder.js"></script>
		<script src="./js/ie10-viewport-bug-workaround.js"></script>
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header" >
					<a class="navbar-brand" href="index.php"><img style="width:35px;height:30px;margin-top: -5px;" src="./img/logo.jpg">
				</div>
				<b><font size="3">The Approval System</a><a href="login.php?out=1" style="right:50px; position:fixed;margin-top: 10px;">Sign out</a></font></b>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<h3>Your Actions</h3>
					<ul class="nav nav-sidebar">
						<li><a href="createSessions.php" class="active">Create Sessions</a></li>
						<li><a href="createSubmissions.php">Create Submissions</a></li>
						<li><a href="topicApproval.php">Topic Approvals</a></li>
					</ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">Set Number of Sessions</h1>
					<div class="row placeholders">
						<div class="col-xs-7 col-sm-9 placeholder">
							<div class="panel panel-default">
								<div class="panel-body">
									<form id="login-form" action="./php/createSessions.php" method="post" role="form" style="display: block;">
										<div class="form-group" style="text-align: left;">
											<label for="university" style="width:25%">University</label>
											<select class="form-control">
												<option selection="default">Please select a university</option>
												<option>RIT</option>
												<option>UofR</option>
											</select>
										</div>
										<div class="form-group" style="text-align: left;">
											<label for="numOfSession" style="width:25%;">Number Of Sessions</label>
											<select class="form-control">
												<option selection="default">Please select a number</option>
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
												<option>8</option>
												<option>9</option>
												<option>10</option>
											</select>
										</div>
										<button type="submit" class="btn btn-default">Set Sessions</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>