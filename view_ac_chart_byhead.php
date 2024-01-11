<?php   
  include('include/config.php');  
  $ac_head=$_POST['ac_head'];
  $queryus ="SELECT * FROM payment_type where status='0' and  ac_head='$ac_head' order by payment_type_name asc ";                                                 
  $results = $db->query($queryus);    
  ?>
  <option value="">--Chart of Accounts --</option> 
  <?php
  while($rows=mysqli_fetch_array($results))                                                    
  {
 ?>                                                    
   <option value="<?php echo $rows['id']; ?>"><?php echo $rows['payment_type_name']; ?></option>                                                    
   <?php                                                    
   }                                                    
  ?>     
