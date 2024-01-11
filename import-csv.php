
<?php include('include/config.php'); ?>
<?php include('include/header.php'); ?>

<div id="main">
	<?php include('include/nav.php'); ?>



	<?php include('include/sidebar.php'); ?>

<?php



$CSVvar = fopen("uploads/DayBook_filtered.csv", "r");
if ($CSVvar !== FALSE) {
?>
	<html>
	<head>
		<style>
			table,th,td {
				border: 1px solid black;
			}
		</style>
	</head>
	<div>
		<table style="border:1px solid black">
        


<?php	
    
    $data=fgetcsv($CSVvar,1000,',');
    if(!empty($data)) {
    echo '
    

    <thead>
    <tr>
    <th><b>'.$data[0].'</b></th>
    <th><b>'.$data[1].' </b></th>
    <th><b>'.$data[2].'</b></th>
    <th><b>'.$data[3].' </b></th>
    </tr>
</thead>

    ';
    }
?>

<?php
	while (! feof($CSVvar)) {
		$data = fgetcsv($CSVvar, 1000, ",");
		if (! empty($data)) {
			?>
			<tr>
				<td><?php echo $data[0]; ?></td>
				<td> <?php echo $data[1]?></td>
				<td><?php echo $data[2]; ?></td>
				<td><?php echo $data[3]; ?></td>
				<td> <?php echo $data[4]?></td>
			</tr>
<?php }?>
<?php
	}
	?>
		</table>
	</div>
	</html>
<?php
}
fclose($CSVvar);
?>
