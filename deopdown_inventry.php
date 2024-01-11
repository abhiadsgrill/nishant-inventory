








 
<?php
include('include/config.php');
$con_id=$_POST['id'];
 
  $data=mysqli_query($db,"select * from `ptype` where subtype ='$con_id'")or die(mysqli_error($db));
foreach($data as $value){
     echo "<option value=".$value['id'].">".$value['ptname']."</option>";
}
 
  
$subid = $_POST['sub'];
$query = "SELECT * FROM subtype WHERE ptype_id='$subid'";
$sql = mysqli_query($db, $query);
while ($showsub = mysqli_fetch_assoc($sql)) {
     echo "<option value=". $showsub['id'].">" . $showsub['subtype_name'] ."</option>";
}

$subid2 = $_POST['prod'];
  $query2 = "SELECT products.*,subtype.subtype_name,ptype.ptname,category.catname FROM products INNER JOIN ptype ON products.type = ptype.id INNER JOIN subtype ON subtype.id = products.subtype
  	INNER JOIN category ON products.cat_id = category.id WHERE products.subtype='$subid2'";
$sql2 = mysqli_query($db, $query2);
while ($showsub2 = mysqli_fetch_assoc($sql2)) {
     echo "<option value=". $showsub2['id']."> Product-" . $showsub2['subtype_name'] .", QTY-" . $showsub2['qty'] .", Mw -". $showsub2['mw'] .", Ml-" . $showsub2['ml'] .", Cmt-" . number_format((float)$showsub2['cmt'], 2, '.', '') .", Cbt-" . number_format((float)$showsub2['cbt'], 2, '.', '') ."</option>";
}

?>

 