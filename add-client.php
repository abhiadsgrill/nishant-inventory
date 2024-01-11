 

 

	<?php 

include('include/config.php'); 

if (isset($_POST['add'])) { 
$name = $_POST['name']; 
$phone = $_POST['phone']; 
$address = $_POST['address']; 
$city = $_POST['city']; 
$gstno = $_POST['gstno']; 
$email = $_POST['email']; 

$client_id = $_POST['client_id']; 
//project_manager_id		
if($client_id!=''){
  $queryu ="update pm_clients set name='$name',  phone='$phone', email='$email', gstno='$gstno', city='$city', address='$address' where id = '$client_id'";
  $rs = $db->query($queryu); 
  if($rs){ 
    echo "<script>alert('updated successfully');
    window.location = 'client-list.php';
    </script>";
    exit();
  }
}


    $sql="SELECT id FROM pm_clients  WHERE phone='$phone'";
        $check =  $db->query($sql);
        $count_row = $check->num_rows;		
        if ($count_row == 0){	
$qu = "Insert Into pm_clients (name, phone, email, gstno, city, address) 
        Values('$name', '$phone', '$email', '$gstno', '$city', '$address')";
$rs = $db->query($qu); 
  if($rs){      
    echo "<script>alert('add successfully');
    window.location = 'add-client.php';

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

                                <h1 class="main-title float-left">Vendor</h1>

                                <ol class="breadcrumb float-right">

                                    <li class="breadcrumb-item">Home</li>

                                    <li class="breadcrumb-item active">Add Vendor </li>

                                </ol>

                                <div class="clearfix"></div>

                        </div>

                </div>

        </div>

    

        <div class="row">

        

          <div class="col-md-12">						

          <div class="card">

        <div class="card-body">

          <h4 class="card-title mb-4">Add Vendor</h4>
          <?php if(isset($_GET['act'])){
									$pid=$_GET['pid'];
                  $queryu1 ="SELECT * FROM pm_clients where id='$pid' ";
                  $result1 = $db->query($queryu1);
                  $row1=mysqli_fetch_array($result1);
                  }
                                ?>
          <form method='POST' action=''>
            <div class="row jumbotron box8">
              <div class="col-sm-4 form-group">
                <label for="name-f">Client Name</label>
                <input type="hidden" class="form-control" name="client_id" id="client_id" value="<?= $row1['id']?>">
                <input type="text" class="form-control" name="name" id="name-f"  value="<?= $row1['name']?>" placeholder="" required>
              </div>
              <div class="col-sm-4 form-group">

<label for="name-f">Client Phone</label>

<input type="text" class="form-control" name="phone" id="name-f" value="<?= $row1['phone']?>"   placeholder="" required>

</div>
<div class="col-sm-4 form-group">

<label for="name-f">Client Email</label>

<input type="text" class="form-control" name="email" id="name-f" value="<?= $row1['email']?>"  placeholder="" required>

</div>
<div class="col-sm-3 form-group">
<label for="name-f">GST NO</label>
<input type='text' class="form-control" name="gstno" value="<?= $row1['gstno']?>"  required>
</div>
<div class="col-sm-3 form-group">
<label for="name-f">Client City</label>
<input type='text' class="form-control" name="city" value="<?= $row1['city']?>"  required>
</div>
<div class="col-sm-6 form-group">

<label for="name-f">Client Address</label>
<textarea class="form-control" name="address" required><?= $row1['address']?></textarea>
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

 

