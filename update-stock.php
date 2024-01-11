<?php
include('include/config.php'); ?>
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
                        <div class="breadcrumb-holder py-3">
                            <h3 class="main-title float-left">Update Stock</h3>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"></li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                

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

                <?php
                
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    echo $id;
                }

                if(isset($_POST['update_btn']))
                {
                    $ml = $_POST['ml'][0];
                    $mw = $_POST['mw'][0];
                    $mt = $_POST['mt'][0];
                    $qty = $_POST['qty'][0];
                    echo "<script>console.log(ml is ".$ml.")</script>";
                    //echo "<script>console.log('button pressed')</script>";
                    $sql_update = "UPDATE products SET ml='$ml', mt='$mt', mw='$mw', qty='$qty' WHERE id = '$id'";
                    $result_update = mysqli_query($db, $sql_update);
                    if($result_update)
                    {
                        echo "<script>alert('record updated successfully')</script>";
                        echo "<script> window.location = 'dashboard.php'; </script>";

                    }
                    
                }


                $sql = "SELECT products.*,subtype.subtype_name,ptype.ptname,category.catname, products.id as pb_id, measurement.name as ms_name FROM products INNER JOIN ptype ON products.type = ptype.id INNER JOIN subtype ON subtype.id = products.subtype 
                INNER JOIN category ON products.cat_id = category.id INNER JOIN measurement ON products.meserment_type = measurement.id where products.id = '$id' ";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <table class="table bg-white">
          <tbody>
            <tr>
              <td>Category : <?php echo $row['catname']; ?> </td>
              <td>Type : <?php echo $row['ptname']; ?> </td>
              <td>Sub Type : <?php echo $row['subtype_name'];?> </td>
              <td>Measurement : <?php echo $row['ms_name']; ?> </td>
            </tr>
            <tr>
              <td>Length : <?php echo $row['ml']; ?> </td>
              <td>Width : <?php echo $row['mw']; ?> </td>
              <td>Thickness  : <?php echo $row['mt'];?> </td>
              <td>Quantity: <?php echo $row['qty']; ?> </td>
            </tr>
            
          </tbody>
        </table>
        <br>

            <form method="POST" action="">

                <div class="row input mt-4 bg-white px-2 py-4">

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

                    <button class="btn bg-primary text-white ml-2 mt-2" type="submit" name="update_btn">UPDATE</button>
                    <button class="btn bg-danger text-white ml-2 mt-2" >CANCEL</button>
                </div>

            </form>






            </div>
        </div>
        <!-- END content -->

        
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

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".nilgiri").show();
            $(".bamboo").hide();
            $(".plywood").hide();
            $(".wood").hide();

            $("#nilgiri").click(function() {
                console.log("nilgiri clicked");
                $(".nilgiri").show();
                $(".bamboo").hide();
                $(".plywood").hide();
                $(".wood").hide();
            });
            $("#bamboo").click(function() {
                console.log("bamboo clicked");
                $(".bamboo").show();
                $(".nilgiri").hide();
                $(".plywood").hide();
                $(".wood").hide();
            });

            $("#plywood").click(function() {
                console.log("plywood clicked");
                $(".plywood").show();
                $(".bamboo").hide();
                $(".nilgiri").hide();
                $(".wood").hide();
            });


            $("#wood").click(function() {
                console.log("plywood clicked");
                $(".wood").show();
                $(".bamboo").hide();
                $(".nilgiri").hide();
                $(".plywood").hide();
            });
        });
    </script>


    <?php include('include/footer.php'); ?>