<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
		<title>Pokes</title>
		<style type="text/css">
			#container {
				width: 1000px;
				margin: 0px auto;
				padding: 10px;
			}
			#header {
				width: 1000px;
				min-height: 20px;
			}
			#route {
				display: inline-block;
				width: 100px;
				padding: 10px;
				float: right;
			}
			#route a {
				display: inline;
				padding: 7px;
			}
			#poker {
				width: 300px;
				height: 150px;
				overflow: scroll;
				margin: 30px 0px;
			}
			.table {
				width: 900px;
				height: 300px;
				overflow: auto;
			}
			button {
				box-shadow: 2px 2px purple;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="route">
					<a href="/main/logout">Logout</a>
				</div>
			</div>
			<h4>Welcome, <?= $user['user']['alias'] ?></h4>
			<p><?= $counts[0]['poke_count'] ?> people poked you!</p>
			<div id="poker">
				<?php
					foreach ($show_pokers as $poker)
					{
						if($poker['poke_count'] > 0){
							echo $poker['poker_alias'] . " poked you " . $poker['poke_count'] . " times.<br />";
						}
					}
				?>
			</div>
			<p>People you may want to poke: </p>
			<table class="table">
			    <thead>
			      <tr>
			        <th>Name</th>
			        <th>Alias</th>
			        <th>Email Address</th>
			        <th>Poke History</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php foreach ($pokes as $poke) { ?>
			    	<form action="/main/poke/<?= $poke['id'] ?>" method="post">
			    		<tr class="success">
				        	<td><?= $poke['name'] ?></td>
				        	<td><?= $poke['alias'] ?></td>
				        	<td><?= $poke['email'] ?></td>
				        	<td><?= $poke['poke_count'] ?></td>
				        	<td>
				        		<input type="submit" value="Poke!">
				        	</td>
			    		</tr>
			    	</form>
			    	<?php
			    	}
			    	?>
			    </tbody>
			</table>
		</div>
	</body>
</html>