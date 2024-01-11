 <?php 
 session_start();
 include('include/config.php');
  if (!empty($_POST["keyword"])) {
  	$queryu ="SELECT * FROM products";
	$res32 = $db->query($queryu);
	 $arr=array();
     if (!empty($res32)) {
      $i=0;
		while($row32=mysqli_fetch_array($res32)){
		           $arr[$i]=$row32;
                    $i++;
	 	}
	  print_r(json_encode($arr));
    } 
    else 
    return json_encode('ABC'); // end if not empty
  
    }  
    
 
   $id=$_REQUEST['id'];
    $cat=$_REQUEST['cat'];
   $ret="SELECT * FROM  products where mt = '$id' and mw='$cat' "; 
  	$res322 = $db->query($ret);
   	while($row322=mysqli_fetch_array($res322)){
		    print_r(json_encode($row322));     
 	}
 	
 
    
  if (! empty($_POST["keyword"])) {
    $search = "{$_POST['keyword']}%";
 	$queryu ="SELECT * FROM products where mt = $search";
	$res32 = $db->query($queryu);
	 $arr=array();
     if (!empty($res32)) {
      $i=0;
		while($row32=mysqli_fetch_array($res32)){
		           $arr[$i] = $row32['mt'].' ('.$row32['mw'].') Qty-'.$row32['qty'].'--'.$row32['ml'];
                    $i++;
	 	}
	  print_r(json_encode($arr));
    }
    
   }
  
                                      
   ?>
 