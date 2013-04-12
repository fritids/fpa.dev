<?php
/* Template Name: DB Test */

$con = mysqli_connect("localhost","root","root","fpa_playground");

$players = mysqli_query($con, "SELECT * FROM players");

while($player = mysqli_fetch_array($players)) {
	$first = $player['first_name'];
	$last = $player['last_name'];
	//$full = $first . " " . $last;
	$sex = strtoupper($player['sex']);
	mysqli_query($con,"UPDATE players SET sex='$sex' WHERE first_name='$first' AND last_name='$last'");
}

mysqli_close($con);
?>