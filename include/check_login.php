<?php
if(isset($_SESSION['admin']) && $_SESSION['admin']!=''){
	//echo '<script>alert("Access denied");window.location.assign("dashboard.php");</script>';
}
else{
	echo '<script>alert("Access denied");window.location.assign("index.php");</script>';
}
?>