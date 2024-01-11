<?php 

include('include/config.php'); 

if (isset($_POST['add'])) { 

$payment_type_name = $_POST['payment_type_name']; 
$ac_id=$_POST['ac_id']; 
if($ac_id!=''){
  $queryu ="update ac_heads set ac_name='$payment_type_name' where id = '$ac_id'";
  $db->query($queryu);
  echo "<script>alert('updated successfully'); window.location = 'ac_heads.php'; </script>";
} else {
    $sql="SELECT id FROM  ac_heads  WHERE ac_name='$payment_type_name'";
        $check =  $db->query($sql);
        $count_row = $check->num_rows;	
        if ($count_row == 0){	
$qu = "Insert Into ac_heads (ac_name) Values('$payment_type_name')";
$rs = $db->query($qu); 

  if($rs){      

    echo "<script>alert('add successfully');

    window.location = 'ac_heads.php';

    </script>";

}else{



    echo "<script>alert('Please Try Again');

     </script>";

}

        } else {

             echo "<script>alert('Already added This Type');

     </script>";

        }

}
}




?>

<?php include('include/header.php'); ?>



<div id="main"> 

<?php include('include/nav.php'); ?> 



<?php include('include/sidebar.php'); ?>







<div class="content-page">



    <!-- Start content -->

    <div class="content">

        

        <div class="container-fluid">





        <div class="row">

                <div class="col-xl-12">

                        <div class="breadcrumb-holder">

                                <h1 class="main-title float-left">Account Head</h1>

                                <ol class="breadcrumb float-right">

                                    <li class="breadcrumb-item">Home</li>

                                    <li class="breadcrumb-item active">Add Account Head</li>

                                </ol>

                                <div class="clearfix"></div>

                        </div>

                </div>

        </div>

    

        <div class="row">

        

          <div class="col-md-12">						

          <div class="card">

        <div class="card-body">

          <h4 class="card-title mb-4">Add Account Head</h4>

          <form method='POST' action=''>
          <?php
$ac_head=0;
if(isset($_GET['pid'])){
  $ac_head=$_GET['pid'];
$queryus ="SELECT * FROM ac_heads where id='$ac_head'";
$results = $db->query($queryus);
$rows1=mysqli_fetch_array($results);
}
?>
            <div class="row jumbotron box8">

              <div class="col-sm-6 form-group">

                <label for="name-f">Account Head</label>
                <input type='hidden' name='ac_id' value="<?=$rows1['id']?>">
                <input type="text" class="form-control" name="payment_type_name" value="<?=$rows1['ac_name']?>" id="name-f" placeholder="Account Head" required>

              </div>



           <div class="col-sm-12 form-group mb-0 my-3">

                <input type='submit'  name='add' value='submit' class="btn btn-primary float-end">

              </div>



            </div>

          </form>

        </div>

        <!-- end card body -->

      </div>

                    <!-- end card-->					

                </div>



        </div>











        </div>

        <!-- END container-fluid -->



    </div>

    <!-- END content -->



</div>

<!-- END content-page -->

<?php include('include/footer.php'); ?>

 

