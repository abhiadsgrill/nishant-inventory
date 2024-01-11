<?php

$multiple_invoice = 0;

include('include/config.php');



if (isset($_POST['p_name'])) {





    $cat_id = $_POST['cat_id'];
    $ptype = $_POST['ptype'];
    $subtype = $_POST['subtype'];
    $product = $_POST['product'];
    $p_qty = $_POST['p_qty'];
    $user_id = $_SESSION['admin_id'];

    $j = 0;




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


    /*    
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
    $qty3 = $_POST['qty2']; */


    $fi = 0;

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

    //m_type, due_date
    $query_check = "SELECT * FROM purchase WHERE inv_no = '$inv_no'";
    $result_check = mysqli_query($db, $query_check);
    if(mysqli_num_rows($result_check) > 0)
    {
        
        $multiple_invoice = 1;
        //exit();
    }
    else{
        

    $query = "INSERT INTO sale (uid,p_name,challan_no,si_no,gaddi_no,builty,sgst,cgst,tcs,lbr,total,transporter,due_days,nrtn,cash_amt,check_amt,inv_date,inv_no,upload_measurement,upload_hisab_copy,upload_builty,upload_extra,upload_invoice) VALUES

 ('$uid','$p_name','$challan_no','$si_no','$gaddi_no','$builty','$sgst','$cgst','$tcs','$lbr','$total','$transporter','$due_days','$nrtn','$cash_amt','$check_amt','$inv_date','$inv_no','$upload_measurement','$upload_hisab_copy','$upload_builty','$upload_extra','$upload_invoice')";

    $result = mysqli_query($db, $query) or die(mysqli_error($db)); //trigger_error("CANNOT ABLE TO ADD PURCHASE ITEM",E_USER_ERROR); 
    if ($result) {
        echo ' <script>alert("sale data added successfully into sale table");</script>';
    } else {
        echo ' <script>alert("not able to add the entry into sale table");</script>';
    }






        
    move_uploaded_file($tmp_upload_measurement, 'uploads/' . $upload_measurement);
    move_uploaded_file($tmp_upload_hisab_copy, 'uploads/' . $upload_hisab_copy);
    move_uploaded_file($tmp_upload_builty, 'uploads/' . $upload_builty);
    move_uploaded_file($tmp_upload_extra, 'uploads/' . $upload_extra);
    move_uploaded_file($tmp_upload_invoice, 'uploads/' . $upload_invoice);



    $lastid = $db->insert_id;

   /*  $j = 0;

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
        if (!$result) {
            die("error: " . mysqli_error($db));
        }
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('record for this product is already present ')</script>";
            $check_result = mysqli_fetch_assoc($result);
            $new_qty = $check_result['qty'] - $qty2;
            $updated_id = $check_result['+id+'];
            $sql = "UPDATE product_item set qty='$new_qty' where id='$updated_id'";
            $result = mysqli_query($db, $sql);
            if ($result) {
                echo "<script>alert('record updated successfully')</script> ";
            }
        } else {
            echo "<script>alert('record for this product didn't found')</script>";
            //$query = "INSERT INTO product_item (inv_no,uid,order_id,p1,p2,p3,p4,p5,qty,m_type,cat_id,ptype,subtype)VALUES('$inv_no','$uid','$lastid','$mt2','$mw2','$ml2','$cbt2','$cmt3','$qty2','$m_type2','$cat_id2','$ptype2','$subtype2')";
            $query = "INSERT INTO product_item (uid,order_id,p1,p2,p3,p4,p5,qty,m_type,cat_id,ptype,subtype)VALUES('$uid','$lastid','$mt2','$mw2','$ml2','$cbt2','$cmt3','$qty2','$m_type2','$cat_id2','$ptype2','$subtype2')";
            $xx = mysqli_query($db, $query);
            if ($xx) {
                echo "<script>alert('new record inserted into db ')</script>";
            }
        }




        $j++;
    }
 */

    

    foreach ($product as $product_id) {

        $cat_id2 =   $cat_id[$j];
        $ptype2 =    $ptype[$j];
        $subtype2 =  $subtype[$j];
        $qty22 =  $p_qty[$j];


        $iid = $product[$j];
        $sql_option_prod = "SELECT * FROM products WHERE id='$iid'";
        $result_option_prod = mysqli_query($db, $sql_option_prod);
        $row_option_prod = mysqli_fetch_assoc($result_option_prod);
        $option_ml = $row_option_prod['ml'];
        $option_mw = $row_option_prod['mw'];
        $option_mt = $row_option_prod['mt'];
        $option_qty = $row_option_prod['qty'];
        $option_cbt = $row_option_prod['cbt'];
        $option_cmt = $row_option_prod['cmt'];
        $option_p_code = $row_option_prod['p_code'];


        $query = "INSERT INTO products_sale (inv_no,inv_date,cat_id,type, subtype,sale_p_id,uid,qty,ml,mw,mt,cbt,cmt,p_code)VALUES('$inv_no','$inv_date',' $cat_id2','$ptype2','$subtype2','$product_id','$user_id','$qty22','$option_ml','$option_mw','$option_mt','$option_cbt','$option_cmt','$option_p_code')";
        mysqli_query($db, $query);



        $j++;


        if ($query) {
            echo "<script> alert('inserted inside products_sale table') </script>";

            //$id3 = $_GET['+id+'][0];
            //$id1 = $_GET['prod'][0];
            //$idd=$_POST['prod'][0];

            $updated_qty = $option_qty - $qty22;
            $product_qtydown = "UPDATE products SET qty=$updated_qty WHERE id= '$iid'";
            mysqli_query($db, $product_qtydown);
            echo '<script>alert("Add SuccessFully");
    window.location="sales-stock-2.php";
    </script>';
        } else {
            echo '<script>alert("Something went wrong")</script>';
        }
    }

    if ($query) {

        echo '<script>alert("Add SuccessFully");

    window.location="sales-stock-2.php";

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
                console.log(subshow_p);

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

                            <h1 class="main-title float-left">Sales Form </h1>

                            <ol class="breadcrumb float-right">

                                <li class="breadcrumb-item">Sales Stock</li>

                                <li class="breadcrumb-item active">Add Sales</li>

                            </ol>

                            <div class="clearfix"></div>

                        </div>
                        <?php

                            if($multiple_invoice)
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

                                <div class="row input mt-4">

                                    <div class="col-lg-2 pl-2 ml-2">

                                        <div class="form-group">

                                            <label for="category" class="ml-2">Catagory<span class="text-danger">*</span></label>

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

                                                <option value="">Select SubType </option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="product">Products<span class="text-danger">*</span></label>
                                            <select id="product0" name="product[]" class="form-control" required>
                                                <option value="">Select Product </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <label for="subtype">Qty<span class="text-danger">*</span></label>
                                            <input type="number" min="0" name="p_qty[]" class="form-control" required>
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

                                                <!-- <img id="preview_image" alt="Preview" style="max-width: 400px; max-height: 400px;" onclick="toggleZoom()">
 -->



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
        alert('button pressed');
         id = id + 1;
         $('<div class="row input pl-2" id="input' + id + '"><div class="col-lg-2"> <div class="form-group"> <select class="form-control" id="catchange' + id + '" onchange="catchchange(this.value, ' + id + ')" name="cat_id[]" aria-label="Default select example"> <option value="">Select Catagory</option> <?php $sql = "SELECT * FROM `category` where status='0' order by id desc";
                                                                                                                                                                                                                                                                                                            $query = mysqli_query($db, $sql);
                                                                                                                                                                                                                                                                                                            while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id']; ?>"> <?php echo $featch['catname'] ?> </option> <?php } ?> </select> </div> </div> <div class="col-lg-2"> <div class="form-group">  <select class="form-control"  id="statees' + id + '" onchange="catchchange2(this.value, ' + id + ')" name="ptype[]" aria-label="Default select example"> <option value="">Select Type</option> <?php $sql = "SELECT * FROM `ptype` where status='0'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        $query = mysqli_query($db, $sql);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id']; ?>"> <?php echo $featch['ptname'] ?> </option> <?php } ?> </select> </div> </div> <div class="col-lg-2"> <div class="form-group"> <select id="subshow' + id + '" onchange="catchchange3(this.value, ' + id + ')" name="subtype[]" class="form-control"> <option value="">Select SubType </option> </select> </div> </div><div class="col-lg-4"><div class="form-group"><select id="product'+ id +'" name="product[]" class="form-control" required><option value="">Select Product</option></select></div></div><div class="col-lg-1"><div class="form-group"><input type="number" min="0" name="p_qty[]" class="form-control" required></div></div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         <div class="add_field removeclass" onClick="removeDiv(' + id + ')" padding: 2px; margin: 1px;"><i class="fas fa-trash" style="color:red;"></i></div>').insertAfter('.input:last');
        
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