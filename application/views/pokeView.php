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
		<script type="text/javascript">
			$(document).ready(function(){
                $('#poke').click( function() {
                    var counter = $('#poke').val();
                    counter++ ;
                    $('#poke').val(counter);
                });
            });
        </script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="route">
					<a href="main/logout">Logout</a>
				</div>
			</div>
			<h4>Welcome, <?= $user['user']['alias'] ?></h4>
			<p><?= $counts['poke_count'] ?> people poked you!</p>
			<div id="poker">
				<?php if ($pokers)
				{
					foreach ($pokers as $poker)
					{
						echo $poker['alias'] . " poked you " . $poker['poke_count'] . " times.<br />";
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
			    	<tr class="success">
			    		<?php foreach ($pokees as $pokee) { ?>
				        	<td><?= $pokee['name'] ?></td>
				        	<td><?= $pokee['alias'] ?></td>
				        	<td><?= $pokee['email'] ?></td>
				        	<td><?php echo $pokee['poke_count']; ?></td>
				        	<td>
				        		<button <a id ="poke" href="/main/poke/counter" value= 0; ></a>Poke!</button>
				        	</td>
				        	<?php
				        }
				        ?>
			    	</tr>
			    </tbody>
			</table>
		</div>
	</body>
</html>