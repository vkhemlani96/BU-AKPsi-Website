<?php

include("/home/content/03/5577503/html/rush/password_protect.php");
ini_set('display_errors', 1);

include("../db/db.php");

// Create connection
$con = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
	echo "Failed to connect to MySQL: " . mysqli_connect_error();

?>


<!DOCTYPE html>
<html lang="en">

	<head>

		<link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
		<title>Deliberation Results | Alpha Kappa Psi Nu Chapter</title>

		<script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

		<script src="../js/jquery.js"></script>
		<script src="../js/jquery.color.js"></script>
		<script src="../js/jquery.floatThead.min.js"></script>

		<style>
			.mdl-textfield__input {
				width: 80px;
			}

			.class {
				width: 80px;
			}
		</style>

	</head>

	<?


	$result = mysqli_query($con,"SELECT SUM(`Interview_Deliberate`), SUM(`Interview_Bid`) FROM $rushTable");
	$row = mysqli_fetch_array($result);
	echo "
<table class='mdl-data-table mdl-js-data-table' style='margin:10px; display:inline-block'>
	<tr>
		<td><div><span><b>Total Deliberations<b></span></div></td>
		<td><div><span>".$row["SUM(`Interview_Deliberate`)"]."</span></div></td>
		<td><div><span><b>Bids Extended</span><b></div></td>
		<td><div><span class=\"bidCount\">".$row["SUM(`Interview_Bid`)"]."</span></div></td>
	</tr>
</table>";

	$result = mysqli_query($con,"SELECT FirstName, LastName, Email, Interview_FinalYes, Interview_FinalNo, Interview_FinalAbstain, Interview_Bid FROM $rushTable WHERE Interview_Deliberate = 1 ORDER BY Interview_Wave, LastName");

	?>

	<table id='table' class='mdl-data-table mdl-js-data-table mdl-shadow--2dp' style='margin:10px'>

		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Yes Votes</th>
			<th>No Votes</th>
			<th>Absentions</th>
			<th>Denominator</th>
			<th>% Yes</th>
			<th>% No</th>
			<th>Bid?</th>
			<th></th>
		</tr>
		<?
		$x = 1;
		while($row = mysqli_fetch_row($result)) {
			$isDone = $row[6] != NULL;
			$yesPerc = $isDone ? round($row[3] / ($row[3] + $row[4]) * 1000)/10 : 0;
		?>

		<tr style="opacity: <? echo ($isDone ? '.5' : '1'); ?>">
			<td><? echo $x++ ?></td>
			<td><b><? echo $row[0] . " " . $row[1] ?></b></td>
			<form method="post" action="deliberation_post.php">
				<input class="mdl-textfield__input" type="hidden" value="<? echo $row[2]; ?>" id="email" name="email" oninput=""/>
				<td>
					<input class="mdl-textfield__input yes" type="number" name="yes" value="<? echo $row[3] ?>"/>
				</td>
				<td>
					<input class="mdl-textfield__input no" type="number" name="no" value="<? echo $row[4] ?>"/>
				</td>
				<td>
					<input class="mdl-textfield__input abs" type="number" name="abs" value="<? echo $row[5] ?>"/>
				</td>
				<td class="update denominator" width="80"><? echo ($isDone ? $row[3] + $row[4] : '--' ); ?></td>
				<td class="update yes_perc" width="80"><? echo ($isDone ? $yesPerc . '%' : '--' ); ?></td>
				<td class="update no_perc" width="80"><? echo ($isDone ? 100 - $yesPerc . '%' : '--' ); ?></td>
				<input class="mdl-textfield__input bidInt" type="hidden" name="bidInt" value="<? echo $row[6]; ?>"/>
				<td class="update bid" width="80"><? echo ($isDone ? $row[6] ? 'Yes' : 'No' : '--')?></td>
				<td class="save"> <input class="submit" type="submit" value="Save"></td>
			</form>
		</tr>


		<?
		};
		mysqli_close($con);
		?>

	</table>

	<div id="demo-toast-example" class="mdl-js-snackbar mdl-snackbar">
		<div class="mdl-snackbar__text"></div>
		<button class="mdl-snackbar__action" type="button"></button>
	</div>

	<script>
		var snackbarContainer = document.querySelector('#demo-toast-example');
		var valChange = function(scope, yes) {
			var yesCount, noCount;

			if (yes) {
				yesCount = parseInt(scope.val() || 0);
				noCount = parseInt(scope.parent().siblings().children(".no").val() || 0)
			} else {
				noCount = parseInt(scope.val() || 0);
				yesCount = parseInt(scope.parent().siblings().children(".yes").val() || 0)
			}
			//			var yesCount = parseInt(yes ? scope.val() || 0 : scope.parent().siblings().children("#yes").val()) ;
			//			var noCount = parseInt(scope.parent().siblings().children("#no").val() || 0);

			var denom = yesCount + noCount;
			scope.parent().siblings(".denominator").html(denom);

			var yesPerc = Math.round(1000 * yesCount / denom)/10;
			var noPerc = Math.round(1000 * noCount / denom)/10;

			scope.parent().siblings(".yes_perc").html(yesPerc + "%");
			scope.parent().siblings(".no_perc").html(noPerc + "%");

			if (noPerc >= 25) {
				scope.parent().siblings(".bidInt").val(0);
				scope.parent().siblings(".bid").html("No");
			} else {
				scope.parent().siblings(".bidInt").val(1);
				scope.parent().siblings(".bid").html("Yes");
			}
		}

		$(".yes").change(function() {
			valChange($(this), true);
		})
		$(".no").change(function() {
			valChange($(this), false);
		})

		$('form').submit(function(e){
			e.preventDefault();
			var form = $(this);

			var quit = false;
			$.each($(this).serializeArray(), function(i, field) {
				if (field.value == "") {
					console.log(field.name);
					alert("Fill out fields forms in row!");
					quit = true;
				}
			});

			if (quit) return;

			$.ajax({
				url:'./deliberation_post.php',
				type:'post',
				data:$(this).serialize(),
				success:function(r){
					if (r == "-1") {
						alert("Failed!");
					} else {
						form.parent().css("opacity", "0.5");
						console.log($(this));
						
						var snackbarContainer = document.querySelector('#demo-toast-example');
						snackbarContainer.MaterialSnackbar.showSnackbar({message: r + " Bids Extended"});
						$(".bidCount").html(r);
					}
				}
			});
		});
		
		$('tr').click(function(e) {
			$(this).css("opacity", "1");
		})

	</script>