<?php
$title = "prof";
require "checkToken.php";

if(isset($_POST['change_status'])){
  $id = strip_tags(trim($_POST['id']));
  $status = strip_tags(trim($_POST['status']));

  $data = new DataLayer();
  $data->updateStatus($id, $status);
}
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
						<li><a href="topicApproval.php">Students Submissions</a></li>
					</ul>
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">Set Number of Sessions</h1>
					<div class="row placeholders">
						<div class="col-xs-7 col-sm-9 placeholder">
							<div class="panel panel-default">
								<div class="panel-body">
									<table class="table table-hover" data-role="table" id="movie-table" data-filter="true" data-input="#filterTable-input" >
										<thead>
											<tr>
                        <th>Student</th>
                        <th>Topic</th>
                        <th>Current Status</th>
                        <th colspan="2">Change Status</th>
                      </tr>
										<thead>
										<tbody>
									    <?php
                        $data = new DataLayer();
                        $res = $data->getAll();
                        foreach($res as $row){
                          echo "<tr>
                                  <form method='post' action='topicApproval.php'>
                                  <td>$row[2]</td>
                                  <td>$row[3]</td>
                                  <td>$row[5]</td>
                                  <td>
                                    <select name='status' id='status'>
                                      <option value='pending'>Pending</option>
                                      <option value='approved'>Approved</option>
                                      <option value='denied'>Denied</option>
                                    </select>
                                  </td>
                                  <td>
                                    <input type='hidden' name='id' id='id' value='$row[0]' />
                                    <input type='submit' name='change_status' value='update'/>
                                  </td>
                                  </form>
                                </tr>";
                        }
									    ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>