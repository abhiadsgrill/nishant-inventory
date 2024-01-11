<?php
include('include/config.php');
 	
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $cat_id=$_POST['cat_id'];
    $sub_type_id=$_POST['sub_type_id'];
     $type_id=$_POST['type_id'];
    $height=$_POST['height'];
    $width=$_POST['width'];
    $ht=$_POST['ht'];
    $cft=$_POST['cft'];
    $cmt=$_POST['cmt'];
    $qty=$_POST['qty'];
    $price=$_POST['price'];
    $remark=$_POST['remark'];
    $status=$_POST['status'];
    $date=$_POST['date'];
  $query = "INSERT INTO products(cat_id,type_id,sub_type_id,height,width,ht,cft,cmt,qty,price,remark,status)
  VALUES('$cat_id','$type_id','$sub_type_id','$height','$width','$ht','$cft','$cmt','$qty','$price','$remark','$status')";
    mysqli_query($db, $query);
    
    if ($query) {
        echo '<script>alert("Add Stock SuccessFully");
        window.location="catogery.php";
        </script>';
    } else {
        echo '<script>alert("Something went wrong")</script>';
    }

}

$sql=""
 
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
                            <h1 class="main-title float-left">ADD STOCK</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
 

                <div class="row">

                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3>Add Stock</i></h3>
                            </div>

                            <div class="card-body"> 
                                  <form action="" method="POST" >  <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="category">Category<span class="text-danger">*</span></label>
                                                <select class="form-control" id="cont" name="cat_id" aria-label="Default select example">
                                                    <option selected>Select Category</option>
                                                    <?php
                                                    $sql = "SELECT * FROM `category` where status='0'";
                                                    $query = mysqli_query($db, $sql); 
                                                    while ($featch = mysqli_fetch_assoc($query)) {
                                                        ?>
                                                        <option value="<?php echo $featch['id']; ?>">
                                                            <?php echo $featch['catname'] ?>
                                                        </option> 
                                                        <?php   }  ?>
                                                </select> 
                                                </div>
                                        </div>
                                        
                                        
                                        
                                  
                                        
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label for="category">Type<span class="text-danger">*</span></label>
                                             <select id="statees" name="type_id" class="form-control" >
                                             <option>Select Type </option> 
                                        </select>
                                        </div>
                                        </div>
                                   
                                    </div>
                                    <!-- top section end -->

                                    <div class="card-header mt-3">
                                        <h3>Measurment</i></h3>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-2 mb-3">
                                            <label for="">Height</label>
                                            <input type="number" name="height" class="form-control" placeholder="Height"
                                                id="">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">Width</label>
                                            <input type="number" name="width" class="form-control" placeholder="width"
                                                id="">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">H/T</label>
                                            <input type="text" name="ht" class="form-control" placeholder="H/T"
                                                id="">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">CFT/SQFT</label>
                                            <input type="text" name="cft" class="form-control" placeholder="CFT/SQFT"
                                                id="">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="">CMT</label>
                                            <input type="text" name="cmt" class="form-control" placeholder="CMT"
                                                id="">
                                        </div>
                                        <div class="col-md-1 mb-3">
                                            <label for="">Price</label>
                                            <input type="number" name="price" class="form-control" placeholder="Price"
                                                id="">
                                        </div>
                                          <div class="col-md-1 mb-3">
                                            <label for="">Qty</label>
                                            <input type="number" name="qty" class="form-control" placeholder="qty"  id="">
                                        </div>
                                        <div class="col-md-12  mb-3">
                                            <label for="form">Remark</label>
                                            <textarea name="remark" class="form-control" id="" cols="30" rows="4"
                                                placeholder="Remark"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary" type="submit" name="submit">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                            </div>
                            </form>

                        </div>
                    </div>
                    <!-- end card--> 
                    <!-- SHOWING DATA IN TABLE -->
                

                </div>

            </div>






        </div>
        <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
$(document).on("change","#cont",function(){
    var c=$(this).val();
        
        // alert(c);
        $.ajax({
            url:"deopdown_inventry.php",
            method:"post",
            data:{id:c},
            dataType:"html",
            success:function(strMsg){
                
                $("#statees").html(strMsg);
                }

            })
})  



 

    
</script>
<!-- END content-page -->
 <?php include('include/footer.php'); ?>