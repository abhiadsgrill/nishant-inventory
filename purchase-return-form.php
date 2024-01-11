<?php

$no_invoice = 0;
$qty_exceed = 0;

   include('include/config.php');



   if (isset($_POST['p_name'])) {

       $p_name = $_POST['p_name'];

       $challan_no = $_POST['challan_no'];

       $si_no = $_POST['si_no'];

       $gaddi_no = $_POST['gaddi_no'];

       $builty = $_POST['builty'];

       $sgst = $_POST['sgst'];

       $cgst = $_POST['cgst'];

       $tcs = $_POST['tcs'];

       $lbr = $_POST['lbr'];

       $total = $_POST['total'];

       $transporter = $_POST['transporter'];

       $due_days = $_POST['due_days'];

       $nrtn = $_POST['nrtn'];

       $cash_amt = $_POST['cash_amt'];

       $check_amt = $_POST['check_amt'];

       $inv_date = $_POST['inv_date'];

       $inv_no = $_POST['inv_no'];

       $uid = $_SESSION['admin_id'];



       $cat_id = $_POST['cat_id'];

       $ptype = $_POST['ptype'];

       $subtype = $_POST['subtype'];

       $m_type = $_POST['m_type'];

       $mt = $_POST['mt'];

       $mw = $_POST['mw'];

       $ml = $_POST['ml'];

       $cbt = $_POST['cbt'];

       $cmt = $_POST['cmt'];

       $qty = $_POST['qty'];

       $mt3 = $_POST['mt2'];
       $mw3 = $_POST['mw2'];
       $ml3 = $_POST['ml2'];
       $sqft = $_POST['sqft'];
       $sqmt = $_POST['sqmt'];
       $qty3 = $_POST['qty2'];
       $fi=0;
       
       $upload_measurement = $_FILES['measurement']['name'];
       $upload_hisab_copy = $_FILES['hisab_copy']['name'];
       $upload_builty = $_FILES['builty']['name'];
       $upload_extra = $_FILES['extra']['name'];
       $upload_invoice = $_FILES['invoice']['name'];

       $tmp_upload_measurement = $_FILES['measurement']['tmp_name'];
       $tmp_upload_hisab_copy = $_FILES['hisab_copy']['tmp_name'];
       $tmp_upload_builty = $_FILES['builty']['tmp_name'];
       $tmp_upload_extra = $_FILES['extra']['tmp_name'];
       $tmp_upload_invoice = $_FILES['invoice']['tmp_name'];

/*


       if (file_exists($_FILES['measurement']['tmp_name']) || is_uploaded_file($_FILES['measurement']['tmp_name'])) {
           $upload_measurement = $_FILES['measurement']['name'];
           echo '<script>alert("image taken successfully");</script>';
           $fi++;
       }
       if (file_exists($_FILES['hisab_copy']['tmp_name']) || is_uploaded_file($_FILES['hisab_copy']['tmp_name']) ) {
           $upload_hisab_copy = $_FILES['hisab_copy']['name'];
           echo '<script>alert("image taken successfully");</script>';
           $fi++;
       }
       if (!empty($_FILES['builty'])) {
           $upload_builty = $_FILES['builty']['name'];
           echo '<script>alert("image taken successfully");</script>';
           $fi++;
       }
       if (!empty($_FILES['extra'])) {
           $upload_extra = $_FILES['extra']['name'];
           echo '<script>alert("image taken successfully");</script>';
           $fi++;
       }
       if (!empty($_FILES['invoice'])) {
           $upload_invoice = $_FILES['invoice']['name'];
           echo '<script>alert("image taken successfully");</script>';
           $fi++;
       }

*/



       $query_check = "SELECT * FROM purchase WHERE inv_no = '$inv_no'";
       $result_check = mysqli_query($db, $query_check);
       if(mysqli_num_rows($result_check) < 0)
       {
           
           $no_invoice = 1;
           //exit();
       }
       else
       {
           $query = "INSERT INTO purchase_return (uid,p_name,challan_no,si_no,gaddi_no,builty,sgst,cgst,tcs,lbr,total,transporter,due_days,nrtn,cash_amt,check_amt,inv_date,inv_no,upload_measurement,upload_hisab_copy,upload_builty,upload_extra,upload_invoice) VALUES

           ('$uid','$p_name','$challan_no','$si_no','$gaddi_no','$builty','$sgst','$cgst','$tcs','$lbr','$total','$transporter','$due_days','$nrtn','$cash_amt','$check_amt','$inv_date','$inv_no','$upload_measurement','$upload_hisab_copy','$upload_builty','$upload_extra','$upload_invoice')";
      
              $result = mysqli_query($db, $query) or die(mysqli_error($db)); //trigger_error("CANNOT ABLE TO ADD PURCHASE ITEM",E_USER_ERROR); 
              if ($result) {
                  echo ' <script>alert("purchase data added successfully into purchase table");</script>';
              } else {
                  echo ' <script>alert("not able to add purchase item");</script>';
              }
      


       
       




       
    move_uploaded_file($tmp_upload_measurement, 'uploads/' . $upload_measurement);
    move_uploaded_file($tmp_upload_hisab_copy, 'uploads/' . $upload_hisab_copy);
    move_uploaded_file($tmp_upload_builty, 'uploads/' . $upload_builty);
    move_uploaded_file($tmp_upload_extra, 'uploads/' . $upload_extra);
    move_uploaded_file($tmp_upload_invoice, 'uploads/' . $upload_invoice);


/*


       if ($result) {
           if ($_FILES['measurement']['error'] == UPLOAD_ERR_OK) {
               $upload_measurement_tmp = $_FILES['measurement']['tmp_name'];
               move_uploaded_file($upload_measurement_tmp, 'uploads/' . $upload_measurement);
           }
           if ($_FILES['hisab_copy']['error'] == UPLOAD_ERR_OK) {
               $upload_hisab_copy_tmp = $_FILES['hisab_copy']['tmp_name'];
               move_uploaded_file($upload_hisab_copy_tmp, 'uploads/' . $upload_hisab_copy);
           }
           if ($_FILES['builty']['error'] == UPLOAD_ERR_OK) {
               $upload_builty_tmp = $_FILES['builty']['tmp_name'];
               move_uploaded_file($upload_builty_tmp, 'uploads/' . $upload_builty);
           }
           if ($_FILES['extra']['error'] == UPLOAD_ERR_OK) {
               $upload_extra_tmp = $_FILES['extra']['tmp_name'];
               move_uploaded_file($upload_extra_tmp, 'uploads/' . $upload_extra);
           }
           if ($_FILES['invoice']['error'] == UPLOAD_ERR_OK) {
               $upload_invoice_tmp = $_FILES['invoice']['tmp_name'];
               move_uploaded_file($upload_invoice_tmp, 'uploads/' . $upload_invoice);
           }
       }
*/

       $lastid = $db->insert_id;

       $j = 0;

       foreach ($m_type as $m_type2) {
           $cat_id2 =  $cat_id[$j];
           $ptype2 =  $ptype[$j];
           $subtype2 =  $subtype[$j];
           if ($m_type2 == '4') {
               $mt2 =   $mt3[$j];
               $mw2 =   $mw3[$j];
               $ml2 =   $ml3[$j];
               $cbt2 =  $sqft[$j];
               $cmt3 =  $sqmt[$j];
               $qty2 =  $qty3[$j];
           } else {
               $mt2 =   $mt[$j];
               $mw2 =   $mw[$j];
               $ml2 =   $ml[$j];
               $cbt2 =  $cbt[$j];
               $cmt3 =  $cmt[$j];
               $qty2 =  $qty[$j];
           }


           
           $sql = "SELECT * FROM product_item where p1='$mt2' and p2='$mw2' and p3='$ml2' and m_type='$m_type2' and cat_id='$cat_id2' and subtype='$subtype2'";
           $result = mysqli_query($db, $sql);
           if(!$result)
           {
               die("error: ".mysqli_error($db));
           }
           if (mysqli_num_rows($result) > 0) {
               echo "<script>alert('record for this product is already present ')</script>";
               $check_result = mysqli_fetch_assoc($result);
               $new_qty = $check_result['qty'] - $qty2;
               $updated_id=$check_result['id'];
               $sql = "UPDATE product_item set qty='$new_qty' where id='$updated_id'";
               $result = mysqli_query($db, $sql);
               if($result)
               {
                   echo"<script>alert('record updated successfully')</script> ";
               }
           } else {
               echo "<script>alert('record for this product didn't found')</script>";
               //$query = "INSERT INTO product_item (inv_no,uid,order_id,p1,p2,p3,p4,p5,qty,m_type,cat_id,ptype,subtype)VALUES('$inv_no','$uid','$lastid','$mt2','$mw2','$ml2','$cbt2','$cmt3','$qty2','$m_type2','$cat_id2','$ptype2','$subtype2')";
               $query = "INSERT INTO product_item (uid,order_id,p1,p2,p3,p4,p5,qty,m_type,cat_id,ptype,subtype)VALUES('$uid','$lastid','$mt2','$mw2','$ml2','$cbt2','$cmt3','$qty2','$m_type2','$cat_id2','$ptype2','$subtype2')";
               $xx = mysqli_query($db, $query);
               if($xx)
               {
                   echo "<script>alert('new record inserted into db ')</script>";
               }
           }




           //select from main stock table 
           $quss = "SELECT qty,id FROM products where cat_id='$cat_id2' and type='$ptype2' and subtype='$subtype2' and meserment_type='$m_type2'and mt='$mt2'and  mw='$mw2' and ml='$ml2' ORDER BY id DESC LIMIT 1";
           $rqss = $db->query($quss);
           //$countss=mysqli_num_rows($rqss); //or die(mysqli_error($db));
           //$rowqss=mysqli_fetch_array($rqss,MYSQLI_ASSOC);
           $rowqss = mysqli_fetch_assoc($rqss);
           /* var_dump($rowqss); */
           if (mysqli_num_rows($rqss)==0) {
               echo "<script>console.log('entry not present in the products table')</script>";
               $query = "INSERT INTO products (inv_no, p_code, cat_id,type, subtype,meserment_type,mt,mw,ml,cbt,cmt,qty)VALUES('$inv_no','','$cat_id2',' $ptype2','$subtype2','$m_type2','$mt2','$mw2','$ml2','$cbt2','$cmt3','$qty2')";
               mysqli_query($db, $query);
               $lastid = $db->insert_id; //mysqli_insert_id($db);
               $pcode = 'P0' . $lastid;
               $query = "UPDATE `products` SET `p_code` = '$pcode'  WHERE id= $lastid";
               $sql = mysqli_query($db, $query);
           } else {
               echo "<script>console.log('entry already present in the products table. going to increase the quantity')</script>";
               $qt2 = $rowqss['qty'] - $qty2;
               $pid = $rowqss['id'];
               $pcode = $rowqss['p_code'];
               $query = "UPDATE `products` SET `qty` = '$qt2'  WHERE id= $pid";
               $sql = mysqli_query($db, $query);
           }






           $j++;
       }

       if ($query) {

           echo '<script>alert("Add SuccessFully");

       window.location="purchase-return-form.php";

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
       function catchchange(showid2, srno) {

           //   alert(showid2+'===='+srno);

           // var showid2 = $(this).val();

           $.ajax({

               url: "deopdown_inventry.php",

               method: "post",

               data: {
                   id: showid2
               },

               dataType: "html",

               success: function(strMsg) {

                   var html = "<option>Choose</option>";

                   html += strMsg;

                   $("#statees" + srno).html(html);

               }



           })

       }



       // $("#statees").change(function () {

       function catchchange2(typechange, srno2) {

           //  var typechange = $(this).val();

           $.ajax({

               type: "post",

               url: "deopdown_inventry.php",

               data: {
                   sub: typechange
               },

               dataType: "html",

               success: function(subshow) {

                   var html = "<option>Choose</option>"

                   html += subshow;

                   $("#subshow" + srno2).html(html)

               }

           });

       }



       function catchchange3(typechange2, srno3) {

           // var typechange3 = $(this).val();

           $.ajax({

               type: "post",

               url: "deopdown_inventry.php",

               data: {
                   prod: typechange2
               },

               dataType: "html",

               success: function(subshow_p) {

                   var html = "<option>Choose</option>"

                   html += subshow_p;

                   $("#product" + srno3).html(html)

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

                            <h1 class="main-title float-left">Purchase Return  Form </h1>

                            <ol class="breadcrumb float-right">

                                <li class="breadcrumb-item">Home</li>

                                <li class="breadcrumb-item active">Add Purchase</li>

                            </ol>

                            <div class="clearfix"></div>

                        </div>
                       <?php

                       if($no_invoice)
                       {
                           echo '
                           <div class="alert alert-danger" role="alert">
                           Invoice Number already present. Kindly Enter different invoice number. 
                         </div>
                           ';
                       }
?>
                    </div>

                </div>


                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="card mb-1">




                                <table id="example133" class="table">

                                    <tr>

                                        <th rowspan="2">

                                            <div class="form-group">

                                                <label for="subtype">Party Name<span class="text-danger">*</span></label>



                                                <div class="form-group">

                                                    <select class="form-control" name="p_name" required>

                                                        <option value="">Select Party name</option>

                                                        <option value="ABC KUMAR">ABC KUMAR</option>

                                                        <option value="XYZ SAH">XYZ SAH</option>

                                                        <option value="VICY TRIVEDI">VICY TRIVEDI</option>



                                                    </select>



                                                </div>

                                            </div>

                                        </th>

                                        <th><input type="date" placeholder=" " name="inv_date" class="form-control"></th>

                                        <th><input type="text" placeholder="Challan No" name="challan_no" class="form-control"></th>

                                        <th><input type="text" placeholder="SI No." name="si_no" class="form-control"></th>



                                    </tr>



                                    <tr>

                                        <th><input type="text" placeholder="Invoice No." name="inv_no" class="form-control"></th>

                                        <th><input type="text" placeholder="Gaadi No" name="gaddi_no" class="form-control"></th>

                                        <th><input type="text" placeholder="BUILTY" name="builty" class="form-control"></th>



                                    </tr>



                                </table>

                                <button type="button" class="btn btn-info add_field float-right " onclick="add_more_field();"><i class="fas fa-plus"></i>Add</button>


                                <?php

                                    if($qty_exceed)
                                    {
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                            Plz Enter quantity less than the purchased quantity
                                        </div>
                                        ';
                                    }

                                ?>

                                <div class="row input mt-4">

                                    <div class="col-lg-1">

                                        <div class="form-group">

                                            <label for="category">Catagory<span class="text-danger">*</span></label>

                                            <select class="form-control" id="catchange0" onchange="catchchange(this.value,'0')" name="cat_id[]" required>

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

                                    <div class="col-lg-2">

                                        <div class="form-group">

                                            <label for="category">Type<span class="text-danger">*</span></label>

                                            <select class="form-control" id="statees0" onchange="catchchange2(this.value,'0')" name="ptype[]" required>

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

                                    <div class="col-lg-2">

                                        <div class="form-group">

                                            <label for="subtype">Subtype<span class="text-danger">*</span></label>

                                            <select id="subshow0" name="subtype[]" onchange="catchchange3(this.value,'0')" class="form-control" required>

                                                <option value="">Select SupType </option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-lg-1">

                                        <div class="form-group">

                                            <label for="category">Measurement_<span class="text-danger">*</span></label>

                                            <select class="form-select form-control" name="m_type[]" onchange="mchange2(this.value, 0)" id="mchange" aria-label="Default select example">

                                                <option value="0">Measurement Type</option>

                                                <?php

                                                   $sql = "SELECT*FROM `measurement` order by id desc";

                                                   $query = mysqli_query($db, $sql);

                                                   while ($featch = mysqli_fetch_assoc($query)) {

                                                   ?>

                                                    <option value="<?php echo $featch['id'] ?>">

                                                        <?php echo $featch['name'] ?>

                                                    </option>

                                                <?php  }   ?>

                                            </select>



                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="row" id="wood0">

                                            <div class="col-md-2 mb-1">

                                                <label for="">T(inch)</label>

                                                <input type="number" name="mt[]" class="form-control" placeholder="T(inch)" id="mt0" oninput="myFunction2(0)">

                                            </div>

                                            <div class="col-md-2 mb-1">

                                                <label for="">W(In inch)</label>

                                                <input type="number" name="mw[]" class="form-control" placeholder="W(In inch)" id="mw0" oninput="myFunction2(0)">

                                            </div>

                                            <div class="col-md-2 mb-1">

                                                <label for="">L(In ft)</label>

                                                <input type="number" name="ml[]" class="form-control" placeholder="L(In ft)" id="ml0" oninput="myFunction2(0)">

                                            </div>



                                            <div class="col-md-2 mb-1">

                                                <label for="">QTY</label>

                                                <input type="number" name="qty[]" class="form-control" placeholder="qty" id="qty0" oninput="myFunction2(0)">

                                            </div>



                                            <div class="col-md-2 mb-1">

                                                <label for="">CFT</label>

                                                <input type="number" name="cbt[]" class="form-control" readonly placeholder="Cbt" id="cbt0">

                                            </div>

                                            <div class="col-md-2 mb-1">

                                                <label for="">CMT</label>

                                                <input type="number" name="cmt[]" class="form-control" readonly placeholder="CMT" id="cmt0">

                                            </div>



                                        </div>



                                        <div class="row" id="ply0" style="display:none;">

                                            <div class="col-md-2 mb-1">

                                                <label for="">W(ft)</label>

                                                <input type="text" name="mt2[]" class="form-control" placeholder="W(ft)" id="mt20" oninput="ply(0)">

                                            </div>

                                            <div class="col-md-2 mb-1">

                                                <label for="">L(ft)</label>

                                                <input type="text" name="mw2[]" class="form-control" placeholder="L(ft)" id="mw20" oninput="ply(0)">

                                            </div>

                                            <div class="col-md-2 mb-1">

                                                <label for="">QTY</label>

                                                <input type="text" name="qty2[]" class="form-control" placeholder="qty" id="qty20" oninput="ply(0)">

                                            </div>



                                            <div class="col-md-2 mb-1">

                                                <label for="">T(mm)</label>

                                                <input type="text" name="ml2[]" class="form-control" placeholder="T(mm)" id="ml20">

                                            </div>

                                            <div class="col-md-2 mb-1">

                                                <label for="">SQFT</label>                 

                                                <input type="text" name="sqft[]" readonly class="form-control" placeholder="SQFT" id="sqft0">

                                            </div>

                                            <div class="col-md-2 mb-1">

                                                <label for="">SQMT</label>

                                                <input type="number" name="sqmt[]" readonly class="form-control" placeholder="SQMT" id="sqmt0">

                                            </div>



                                        </div>

                                    </div>
                                </div>



                                <div class="row mt-1 p-3  bg-light" style='display:none;'>

                                    <div class="col-md-2 mb-1">

                                        Total : 0.00

                                    </div>

                                    <div class="col-md-2 mb-1">

                                        Type : 0.00

                                    </div>



                                    <div class="col-md-2 mb-1">

                                        Total : 0.00

                                    </div>



                                    <div class="col-md-2 mb-1">

                                        Total : 0.00

                                    </div>

                                    <div class="col-md-2 mb-1">

                                        Total : 0.00

                                    </div>

                                    <div class="col-md-1 mb-1">

                                        Total : 0.00

                                    </div>



                                </div>



                                <div class="row mt-1 p-2" ;>

                                    <div class="col-md-2 mb-1">

                                        <input type="number" name="sgst" class="form-control" placeholder="SGST" id="" required>

                                    </div>

                                    <div class="col-md-2 mb-1">

                                        <input type="number" name="cgst" class="form-control" placeholder="CGST" id="" required>

                                    </div>



                                    <div class="col-md-2 mb-1">

                                        <input type="number" name="tcs" class="form-control" placeholder="TCS" id="" required>

                                    </div>



                                    <div class="col-md-2 mb-1">

                                        <input type="number" name="lbr" class="form-control" placeholder="LABOUR" id="" required>

                                    </div>

                                    <div class="col-md-3 mb-1">

                                        <input type="number" name="mmm" class="form-control" placeholder=" " id="" required>

                                    </div>



                                </div>

                                <hr style="border: 1px solid darkblue">

                                <div class="row mt-1 p-2" ;>

                                    <div class="col-md-6 mb-1">

                                        <div class="row">

                                            <div class="col-md-6 mb-1">

                                                <input type="text" name="transporter" class="form-control" placeholder="Transporter" id="" required>

                                            </div>

                                            <div class="col-md-6 mb-1">

                                                <input type="text" name="due_days" class="form-control" placeholder="DUE DAYS" id="" required>

                                            </div>

                                        </div>



                                        <div class="row">

                                            <div class="col-md-12 mb-1">

                                                <input type="text" name="nrtn" class="form-control" placeholder="NARRATION" id="" required>

                                            </div>

                                        </div>

                                        <div class="row p-5">

                                            <div class="form-group  m-b-0">

                                                <button class="btn btn-primary" type="submit" name="sales"> Submit </button>

                                                <button type="reset" class="btn btn-secondary m-l-5"> Reset </button>

                                                <!--<button type="button" class="btn btn-info m-l-5">  Print  </button>-->

                                            </div>

                                        </div>



                                    </div>

                                    <div class="col-md-3 mb-1">

                                        <div class="form-check">

                                            <input class="form-check-input" name="upload[]" type="checkbox" value="measurement" id="defaultCheck1">

                                            <div class="custom-file">

                                                <label class="custom-file-label" for="customFile">Upload Measurement</label>

                                                <input type="file" name="measurement" class="custom-file-input" id="measurement" accept="img/png,image/jpg, image/jpeg">

                                                <img id="preview_image" alt="Preview" style="max-width: 400px; max-height: 400px;" onclick="toggleZoom()">




                                                <script>
                                                    const product_image = document.getElementById('measurement');
                                                    const preview_image = document.getElementById('preview_image');

                                                    function previewSelectedImage() {
                                                        const file = product_image.files[0];
                                                        if (file) {
                                                            const reader = new FileReader();
                                                            reader.readAsDataURL(file);
                                                            reader.onload = function(e) {
                                                                preview_image.src = e.target.result;
                                                                let size = preview_image.style.width;
                                                                preview_image.style.width = "100px";
                                                            }
                                                        }
                                                    }
                                                    product_image.addEventListener('change', previewSelectedImage)

                                                    let measurement_iszoom = 0;

                                                    function toggleZoom() {
                                                        //(iszoom===0)?zoomIn() :zoomOut();
                                                        (measurement_iszoom === 0) ? zoomIn(): zoomOut();
                                                    }

                                                    function zoomIn() {
                                                        preview_image.style.width = document.documentElement.scrollWidth + "px";
                                                        measurement_iszoom = 1;
                                                    }

                                                    function zoomOut() {
                                                        preview_image.style.width = "100px";
                                                        measurement_iszoom = 0;

                                                    }
                                                    measurement.addEventListener('change', previewSelectedImage);

                                                    /*
               function imagePreview(fileInput) {
           if (fileInput.files && fileInput.files[0]) {
               var fileReader = new FileReader();
               fileReader.onload = function (event) {
                   $('#preview').html('<img src="'+event.target.result+'" width="300" height="auto"/>');
               };
               fileReader.readAsDataURL(fileInput.files[0]);
           }
       }
       $("#measurement").change(function () {
           imagePreview(this);
       });
           */
                                                </script>

                                                <!--
      <?php
       //$sql = "SELECT * FROM purchase WHERE ";
       ?>
      <a href="uploads/" data-fancybox="group" data-caption="This image has a caption 2">
     <img src="uploads/"  class="w-50 h-50"/>
   </a>
      -->

                                            </div>

                                        </div>



                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" name="upload[]" value="hisab_copy" id="defaultCheck1">

                                            <div class="custom-file">

                                                <label class="custom-file-label" for="customFile">Upload Hisab Copy</label>

                                                <input type="file" name="hisab_copy" class="custom-file-input" id="customFile" accept="img/png,image/jpg, image/jpeg">

                                            </div>

                                        </div>



                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" name="upload[]" value="builty" id="defaultCheck1">

                                            <div class="custom-file">

                                                <label class="custom-file-label" for="customFile">Upload Builty Copy</label>

                                                <input type="file" name="builty" class="custom-file-input" id="customFile" accept="img/png,image/jpg, image/jpeg">

                                            </div>

                                        </div>



                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" name="upload[]" value="extra" id="defaultCheck1">

                                            <div class="custom-file">

                                                <label class="custom-file-label" for="customFile">Upload Extra</label>

                                                <input type="file" name="extra" class="custom-file-input" id="customFile" accept="img/png,image/jpg, image/jpeg">

                                            </div>

                                        </div>



                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" name="upload[]" value="invoice" id="defaultCheck1">

                                            <div class="custom-file">

                                                <label class="custom-file-label" for="customFile">Upload Invoice</label>

                                                <input type="file" name="invoice" class="custom-file-input" id="customFile" accept="img/png,image/jpg, image/jpeg">

                                            </div>

                                        </div>



                                    </div>

                                    <div class="col-md-3 mb-1">



                                        <div class="form-group row">



                                            <div class="col-sm-10">

                                                <input type="text" class="form-control" name="cash_amt" placeholder="Cash Amt" id="colFormLabelSm">

                                            </div>

                                        </div>

                                        <div class="form-group row">



                                            <div class="col-sm-10">

                                                <input type="text" class="form-control" name="check_amt" id="colFormLabel" placeholder="Check Amt">

                                            </div>

                                        </div>


                                        <div class="form-group row">



                                            <div class="col-sm-10">

                                                <input type="text" class="form-control form-control-lg" name="total" id="colFormLabelLg" placeholder="Total" value="₹ 0.00" readonly>

                                            </div>


                                        </div>



                                    </div>

                                </div>

                            </div>

                        </div>

                </form>



            </div>

            <!-- <div class="container">
                <h1>Uploads</h1>
                <div class="row">
                    <div class="col-md-2 bg-info">
                        <label for="preview_imagee">Measurement Uploaded</label>

                    </div>
                    <div class="col-md-2 bg-info">
                        <label for="preview_image1">Measurement Uploaded</label>

                    </div>

                </div>
            </div>
-->

        </div>

        <!-- end card-->

    </div>

</div>

</div>
</div>


</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#wood0").show()
        $("#ply0").hide()
    });

    //   $("#mchange").change(function () {
    function mchange2(valchange, sr) {
        $("#ply" + sr).hide();
        $("#wood" + sr).hide();
        console.log(valchange);
        if (valchange == "3") {
            $("#wood" + sr).show();
            //  $("#ply"+sr).hide();
        } else if (valchange == "4") {
            $("#ply" + sr).show();
            //  $("#wood"+sr).hide();
        } else {
            $("#wood" + sr).show();
            //  $("#ply"+sr).hide();
        }
    }
</script>

<script>
    function myFunction2(sr) {
        var mt1 = document.getElementById("mt" + sr).value;
        var mw1 = document.getElementById("mw" + sr).value;
        var ml1 = document.getElementById("ml" + sr).value;
        var qty1 = document.getElementById("qty" + sr).value;
        var cbt3 = (mw1 * mt1 * ml1 * qty1) / 144;
        document.getElementById("cbt" + sr).value = cbt3;
        var cmt3 = +cbt3 / 35.315;
        document.getElementById("cmt" + sr).value = cmt3;
        //   parseFloat(cmt3 + cmt34).toFixed(2);
    }


    function ply(sr) {
        var mt1 = document.getElementById("mt2" + sr).value;
        var mw1 = document.getElementById("mw2" + sr).value;
        // var ml1 = document.getElementById("ml"+sr).value;
        var qty1 = document.getElementById("qty2" + sr).value;

        var sqft3 = +mt1 * +mw1 * +qty1;
        document.getElementById("sqft" + sr).value = sqft3;

        var sqmt3 = +sqft3 * 0.092903;
        document.getElementById("sqmt" + sr).value = sqmt3;

    }
</script>

<script>
    var id = 0;

    function add_more_field() {
        id = id + 1;
        $('<div class="row input" id="input' + id + '"><div class="col-lg-1"> <div class="form-group"> <select class="form-control" id="catchange' + id + '" onchange="catchchange(this.value, ' + id + ')" name="cat_id[]" aria-label="Default select example"> <option value="">Select Catagory</option> <?php $sql = "SELECT * FROM `category` where status='0' order by id desc";
                                                                                                                                                                                                                                                                                                           $query = mysqli_query($db, $sql);
                                                                                                                                                                                                                                                                                                           while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id']; ?>"> <?php echo $featch['catname'] ?> </option> <?php } ?> </select> </div> </div> <div class="col-lg-2"> <div class="form-group">  <select class="form-control"  id="statees' + id + '" onchange="catchchange2(this.value, ' + id + ')" name="ptype[]" aria-label="Default select example"> <option value="">Select Type</option> <?php $sql = "SELECT * FROM `ptype` where status='0'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       $query = mysqli_query($db, $sql);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id']; ?>"> <?php echo $featch['ptname'] ?> </option> <?php } ?> </select> </div> </div> <div class="col-lg-2"> <div class="form-group"> <select id="subshow' + id + '" onchange="catchchange3(this.value, ' + id + ')" name="subtype[]" class="form-control"> <option value="">Select SupType </option> </select> </div> </div><div class="col-lg-1"> <div class="form-group"> <select class="form-select form-control" name="m_type[]" id="mchange"  onchange="mchange2(this.value, ' + id + ')" aria-label="Default select example"  > <option value="0">measurement Type</option> <?php $sql = "SELECT*FROM `measurement` order by id desc";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           $query = mysqli_query($db, $sql);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id'] ?>"> <?php echo $featch['name'] ?> </option> <?php  }   ?> </select> </div> </div><div class="col-lg-5"><div class="row" id="wood' + id + '"> <div class="col-md-2 mb-1"> <input type="number" name="mt[]" class="form-control" placeholder="T(inch)" id="mt' + id + '" oninput="myFunction2(' + id + ')" > </div> <div class="col-md-2 mb-1"> <input type="number" name="mw[]" class="form-control" placeholder="W(In inch)" id="mw' + id + '" oninput="myFunction2(' + id + ')" > </div> <div class="col-md-2 mb-1"> <input type="number" name="ml[]" class="form-control" placeholder="L(In ft)" id="ml' + id + '" oninput="myFunction2(' + id + ')" > </div> <div class="col-md-2 mb-1"> <input type="number" name="qty[]" class="form-control" placeholder="qty" id="qty' + id + '" oninput="myFunction2(' + id + ')" > </div> <div class="col-md-2 mb-1"> <input type="number" name="cbt[]" class="form-control" readonly placeholder="Cbt" id="cbt' + id + '"  > </div> <div class="col-md-2 mb-1"> <input type="number" name="cmt[]" class="form-control" readonly  placeholder="CMT" id="cmt' + id + '"> </div></div><div class="row" id="ply' + id + '" style="display:none";> <div class="col-md-2 mb-1"> <input type="number" name="mt2[]" class="form-control" placeholder="W(ft)" id="mt2' + id + '" oninput="ply(' + id + ')" > </div> <div class="col-md-2 mb-1"> <input type="number" name="mw2[]" class="form-control" placeholder="L(ft)" id="mw2' + id + '" oninput="ply(' + id + ')"> </div> <div class="col-md-2 mb-1"> <input type="text" name="qty2[]" class="form-control" placeholder="qty" id="qty2' + id + '" oninput="ply(' + id + ')"> </div> <div class="col-md-2 mb-1"><input type="number" name="ml2[]" class="form-control" placeholder="T(mm)" id="ml' + id + '" > </div> <div class="col-md-2 mb-1"> <input type="text" name="sqft[]" readonly class="form-control" placeholder="SQFT" id="sqft' + id + '"> </div> <div class="col-md-2 mb-1"> <input type="number" name="sqmt[]" readonly class="form-control" placeholder="SQMT" id="sqmt' + id + '"> </div></div></div><div class="add_field removeclass" onClick="removeDiv(' + id + ')" padding: 2px; margin: 1px;"><i class="fas fa-trash" style="color:red;"></i></div>').insertAfter('.input:last');
        return false;
    }

    function removeDiv(sr) {
        id = id - 1;
        // alert(id);
        $('#input' + sr).remove();

    }
</script>
<style>
    .removeclass {
        position: absolute;
        right: 10px;
    }
</style>

<!-- END content-page -->

<?php include('include/footer.php'); ?>