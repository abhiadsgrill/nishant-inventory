

<?php
 
include('include/config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

 
  if (isset($_POST['submit'])) {
    /*   echo 'hi';
      echo '  
                alert("hi");
            '; */
    $inv_no = $_POST['inv_no'];
    $inv_date = $_POST['date'];

    
    $cat_id = $_POST['cat_id'];
    $ptype = $_POST['ptype'];
    $subtype = $_POST['subtype'];
    $product = $_POST['product'];
    $p_qty = $_POST['p_qty'];
    $user_id = $_SESSION['admin_id'];
    
    $j = 0;
    
    
    //echo $_POST['product'][0];
    //echo $product[0];
    //echo '  
                //console.log(here\n)
                //alert($iid);
           // ';
        foreach ($product as $product_id) {
            
            $cat_id2 =   $cat_id[$j];
            $ptype2 =    $ptype[$j];
            $subtype2 =  $subtype[$j];
            $qty22 =  $p_qty[$j];


            $iid = $product[$j];
            $sql_option_prod = "SELECT * FROM products WHERE id='$iid'";
            $result_option_prod = mysqli_query($db,$sql_option_prod);
            $row_option_prod = mysqli_fetch_assoc($result_option_prod);
            $option_ml = $row_option_prod['ml'];
            $option_mw = $row_option_prod['mw'];
            $option_mt = $row_option_prod['mt'];
            $option_qty = $row_option_prod['qty'];
            $option_cbt = $row_option_prod['cbt'];
            $option_cmt = $row_option_prod['cmt'];
            $option_p_code = $row_option_p_code['p_code'];

            
     $query = "INSERT INTO products_sale (inv_no,inv_date,cat_id,type, subtype,sale_p_id,uid,qty,ml,mw,mt,cbt,cmt,p_code)VALUES('$inv_no','$inv_date',' $cat_id2','$ptype2','$subtype2','$product_id','$user_id','$qty22','$option_ml','$option_mw','$option_mt','$option_cbt','$option_cmt','$option_p_code')";
        mysqli_query($db, $query);

      
            
      $j++;  
      
     
    if ($query) {
        
        //$id3 = $_GET['id'][0];
        //$id1 = $_GET['prod'][0];
        //$idd=$_POST['prod'][0];
       
        $updated_qty = $option_qty - $qty22;
        $product_qtydown = "UPDATE products SET qty=$updated_qty WHERE id= '$iid'";
        mysqli_query($db, $product_qtydown);
        echo '<script>alert("Add SuccessFully");
        window.location="sales_stock.php";
        </script>';
    } else {
        echo '<script>alert("Something went wrong")</script>';
    }
}
}


?>
<?php include('include/header.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>
 
 
      function catchchange(showid2, srno){
        //   alert(showid2+'===='+srno);
           // var showid2 = $(this).val();
            $.ajax({
                url: "deopdown_inventry.php",
                method: "post",
                data: { id: showid2 },
                dataType: "html",
                success: function (strMsg) {
                    var html = "<option>Choose</option>";
                    html += strMsg;
                    $("#statees"+srno).html(html);
                }

            })
      }
   
       // $("#statees").change(function () {
           function catchchange2(typechange, srno2){
          //  var typechange = $(this).val();
            $.ajax({
                type: "post",
                url: "deopdown_inventry.php",
                data: { sub: typechange },
                dataType: "html",
                success: function (subshow) {
                    var html = "<option>Choose</option>"
                    html += subshow;
                    $("#subshow"+srno2).html(html)
                }
            });
        }
        
        function catchchange3(typechange2, srno3){
            // var typechange3 = $(this).val();
                $.ajax({
                type: "post",
                url: "deopdown_inventry.php",
                data: { prod: typechange2 },
                dataType: "html",
                success: function (subshow_p) {
                    console.log(subshow_p)
                    var html = "<option>Choose</option>"
                    html += subshow_p;
                    $("#product"+srno3).html(html)
                }
            });
        }
   
</script>
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
                            <h1 class="main-title float-left">Sales Inventory </h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Add Sales</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
           
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3>Add Form</i></h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                       <button type="button" class="btn btn-info add_field float-right " onclick="add_more_field()"><i class="fas fa-plus"></i>Add</button>
                                         <div class="row">
                                          <div class="col-lg-6">
                                         <label for="category">Invoice Number<span class="text-danger">*</span></label>
                                         <input type="text" name="inv_no" class="form-control" required >
                                        </div>
                                         <div class="col-lg-6">
                                         <label for="category">Date<span class="text-danger">*</span></label>
                                         <input type="date" name="date" class="form-control" >
                                        </div>
                                         </div>
                                       
                                         
                                    <div class="row input mt-4">
                                        <!-- category start -->
                                          <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="category">Catagory<span class="text-danger">*</span></label>
                                                <select class="form-control" id="catchange0"  onchange="catchchange(this.value,'0')" name="cat_id[]" required>
                                                    <option value="">Select Catagory</option>
                                                    <?php
                                                    $sql = "SELECT * FROM `category` where status='0' order by id desc";
                                                    $query = mysqli_query($db, $sql);
                                                    while ($featch = mysqli_fetch_assoc($query)) {
                                                        ?>
                                                        <option value="<?php echo $featch['id']; ?>">
                                                            <?php echo $featch['catname'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <!-- category end  -->

                                        <!-- type start -->
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="category">Type<span class="text-danger">*</span></label>
                                                <select class="form-control" id="statees0" onchange="catchchange2(this.value,'0')" name="ptype[]"  required>
                                                    <option value="">Select Type</option>
                                                    <?php
                                                    $sql = "SELECT * FROM `ptype` where status='0'";
                                                    $query = mysqli_query($db, $sql);
                                                    while ($featch = mysqli_fetch_assoc($query)) {
                                                        ?>
                                                        <option value="<?php echo $featch['id']; ?>">
                                                            <?php echo $featch['ptname'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <!-- type end -->

                                        <!-- subtype start -->
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="subtype">Subtype<span class="text-danger">*</span></label>
                                                <select id="subshow0" name="subtype[]" onchange="catchchange3(this.value,'0')" class="form-control" required>
                                                    <option value="">Select Sub Type </option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- subtype end -->
                                        
                                           
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="product">Products<span class="text-danger">*</span></label>
                                                <select id="product0"  name="product[]" class="form-control" required>
                                                    <option value="">Select Product </option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                         <div class="col-lg-1">
                                            <div class="form-group">
                                                <label for="subtype">Qty<span class="text-danger">*</span></label>
                                                 <input type="number" min="0" name="p_qty[]" class="form-control"  required>
                                            </div>
                                        </div>
                                    
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

                
                </div>
            </div>
        </div>
    </div>


</div>
<script> 
var id=0;
   function add_more_field() {
            id = id + 1;
            $( '<div class="row input"><div class="col-lg-2"> <div class="form-group"> <select class="form-control" id="catchange'+id+'" onchange="catchchange(this.value, '+id+')" name="cat_id[]" aria-label="Default select example"> <option value="">Select Catagory</option> <?php $sql = "SELECT * FROM `category` where status='0' order by id desc"; $query = mysqli_query($db, $sql); while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id']; ?>"> <?php echo $featch['catname'] ?> </option> <?php } ?> </select> </div> </div> <div class="col-lg-2"> <div class="form-group">  <select class="form-control"  id="statees'+id+'" onchange="catchchange2(this.value, '+id+')" name="ptype[]" aria-label="Default select example"> <option value="">Select Type</option> <?php $sql = "SELECT * FROM `ptype` where status='0'"; $query = mysqli_query($db, $sql); while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id']; ?>"> <?php echo $featch['ptname'] ?> </option> <?php } ?> </select> </div> </div> <div class="col-lg-2"> <div class="form-group"> <select  id="subshow'+id+'" onchange="catchchange3(this.value, '+id+')" name="subtype[]" class="form-control"> <option value="">Select SupType </option> </select> </div> </div> <div class="col-lg-4"> <div class="form-group">  <select id="product'+id+'"name="product[]" class="form-control"> <option value="">Select Product </option> </select> </div> </div><div class="col-lg-1"> <div class="form-group"> <input type="number" min="0" name="p_qty[]" class="form-control" > </div> </div><br><div class=" add_field " onClick="removeDiv(this)" padding: 2px; margin: 1px;"><i class="fas fa-trash" style="color:red;"></i></div>').insertAfter('.input:last');
             return false;
        }
            function removeDiv(elem) {
            id = id - 1; 
            // alert(id);
            $(elem).parent('.input').remove();
        }
             
    </script>
  

  <script>
 
  
</script>
 
<!-- END content-page -->
<?php include('include/footer.php'); ?>