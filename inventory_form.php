<?php
include('include/config.php');



if (isset($_POST['submit'])) {
    $cat_id = $_POST['cat_id'];
    $ptype = $_POST['ptype'];
    $subtype = $_POST['subtype'];
    $measurment = $_POST['measurment'];
    //p_code, cat_id,type, subtype,meserment_type,mt,mw,ml

    // wood
    $roll1 = $_POST['mt'];
    $roll2 = $_POST['mw'];
    $roll3 = $_POST['ml'];
    $roll4 = $_POST['cbt'];
    $roll5 = $_POST['cmt'];
    $roll6 = $_POST['qty'];
    //  ply
    $roll7 = $_POST['mt2'];
    $roll8 = $_POST['mw2'];
    $roll9 = $_POST['ml2'];
    $roll10 = $_POST['cbt2'];
    $roll22 = $_POST['cmt2'];
    $roll33 = $_POST['qty2'];

    if ($measurment == '3') {
        $mt = $roll1;
        $mw = $roll2;
        $ml = $roll3;
        $cbt = $roll4;
        $cmt = $roll5;
        $qty = $roll6;
    } else if ($measurment == '4') {
        $mt = $roll7;
        $mw = $roll8;
        $ml = $roll9;
        $cbt = $roll10;
        $cmt = $roll22;
        $qty = $roll33;
    } else {
        $mt = $roll1;
        $mw = $roll2;
        $ml = $roll3;
        $cbt = $roll4;/* 
     $cmt = $roll15;
     $qty = $roll16; */
        $cmt = $roll5;
        $qty = $roll6;
    }
    $quss = "select qty,id,p_code from products where cat_id='$cat_id' and type='$ptype' and subtype='$subtype' and meserment_type='$measurment'and mt='$mt'and  mw='$mw'and ml='$ml' ORDER BY id DESC LIMIT 1";
    $rqss = $db->query($quss);
    $countss = mysqli_num_rows($rqss);
    $rowqss = mysqli_fetch_array($rqss, MYSQLI_ASSOC);
    if ($countss == 0) {
        $query = "INSERT INTO products (p_code, cat_id,type, subtype,meserment_type,mt,mw,ml,cbt,cmt,qty)VALUES('','$cat_id',' $ptype','$subtype','$measurment','$mt','$mw','$ml','$cbt','$cmt','$qty')";
        mysqli_query($db, $query);
        $lastid = $db->insert_id; //mysqli_insert_id($db);
        $pcode = 'P0' . $lastid;
        $query = "UPDATE `products` SET `p_code` = '$pcode'  WHERE id= $lastid";
        $sql = mysqli_query($db, $query);
    } else {
        $qt2 = $rowqss['qty'] + $qty;
        $pid = $rowqss['id'];
        $pcode = $rowqss['p_code'];
        $query = "UPDATE `products` SET `qty` = '$qt2'  WHERE id= $pid";
        $sql = mysqli_query($db, $query);
    }

    $query = "INSERT INTO products_buy (p_code, cat_id,type, subtype,meserment_type,mt,mw,ml,cbt,cmt,qty)VALUES
   ('$pcode','$cat_id',' $ptype','$subtype','$measurment','$mt','$mw','$ml','$cbt','$cmt','$qty')";
    $sql = mysqli_query($db, $query);

    if ($query) {
        echo '<script>alert("Add SuccessFully");
        // window.location="inventory_form.php";
        </script>';
    } else {
        echo '<script>alert("Something went wrong")</script>';
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
                            <h1 class="main-title float-left">Inventory </h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Inventory Stock</li>
                                <li class="breadcrumb-item active">Add Stock</li>
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
                                    <div class="row">

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="category">Catagory<span class="text-danger">*</span></label>
                                                <select class="form-control" name="cat_id" aria-label="Default select example" required>
                                                    <option value="">Select Catagory</option>
                                                    <?php
                                                    $sql = "SELECT * FROM `category` where status='0'";
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
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="category">Type<span class="text-danger">*</span></label>
                                                <select class="form-control" id="statees" name="ptype" aria-label="Default select example" required>
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
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="subtype">Subtype<span class="text-danger">*</span></label>
                                                <select id="subshow" name="subtype" class="form-control" required>
                                                    <option value="">Select SubType </option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-lg-3">
                                            <label for="">Measurment</label>
                                            <select class="form-select form-control" name="measurment" id="mchange" aria-label="Default select example" required>
                                                <option value="">Choose</option>
                                                <?php
                                                $sql = "SELECT*FROM `measurement`";
                                                $query = mysqli_query($db, $sql);
                                                while ($featch = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <option value="<?php echo $featch['id'] ?>">
                                                        <?php echo $featch['name'] ?>
                                                    </option>
                                                <?php  }   ?>
                                            </select>
                                        </div>

                                        <div class="row mt-4" id="wood">
                                            <div class="col-md-2 mb-3">
                                                <label for="">T(inch)</label>
                                                <input type="text" name="mt" class="form-control" placeholder="T(inch)" id="mt" oninput="myFunction2()" required>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="">W(In inch)</label>
                                                <input type="text" name="mw" class="form-control" placeholder="W(In inch)" id="mw" oninput="myFunction2()" required>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="">L(In ft)</label>
                                                <input type="text" name="ml" class="form-control" placeholder="L(In ft)" id="ml" oninput="myFunction2()" required>
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="">QTY</label>
                                                <input type="number" name="qty" class="form-control" placeholder="qty" id="qty" oninput="myFunction2()" required>
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="">CBT</label>
                                                <input type="number" name="cbt" class="form-control" readonly placeholder="Cbt" id="cbt">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="">CMT</label>
                                                <input type="number" name="cmt" class="form-control" readonly placeholder="CMT" id="cmt">
                                            </div>

                                        </div>

                                        <div class="row mt-4" id="ply" style="display:none" ;>
                                            <div class="col-md-2 mb-3">
                                                <label for="">W(ft)</label>
                                                <input type="text" name="mt2" class="form-control" placeholder="W(ft)" id="w" oninput="ply()"  >
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="">L(ft)</label>
                                                <input type="number" name="mw2" class="form-control" placeholder="L(ft)" id="l" oninput="ply()">
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="">QTY</label>
                                                <input type="text" name="qty2" class="form-control" placeholder="qty" id="qtyp" oninput="ply()">
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <label for="">T(mm)</label>
                                                <input type="text" name="ml2" class="form-control" placeholder="T(mm)" id="l2" >
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="">SQFT</label>
                                                <input type="text" name="cbt2" readonly class="form-control" placeholder="SQFT" id="sqft">
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="">SQMT</label>
                                                <input type="text" name="cmt2" readonly class="form-control" placeholder="SQMT" id="sqmt">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary" type="submit" name="submit"> Submit </button>
                                        <button type="reset" class="btn btn-secondary m-l-5"> Cancel </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- end card-->

                        <!-- SHOWING DATA IN TABLE -->
                        <table class="table table-bordered d-none">
                            <thead>
                                <tr>
                                    <th scope="col">Sr no</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Sub Id</th>
                                    <th scope="col">Height</th>
                                    <th scope="col">Width</th>
                                    <th scope="col">Ht</th>
                                    <th scope="col">Cft</th>
                                    <th scope="col">Cmt</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Remark</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // cat_id,sub_type_id,height,width,ht,cft,cmt,qty,price,remark,status
                                $query = "SELECT*FROM products";
                                $no = 0;
                                $sql = mysqli_query($db, $query);
                                while ($showform = mysqli_fetch_assoc($sql)) {
                                    echo "<tr>
                                        <th scope='row'>$no</th>
                                        <td>" . $showform['cat_id'] . "</td>
                                        <td>" . $showform['subtype'] . "</td>
                                        <td>" . $showform['height'] . "</td>
                                        <td>" . $showform['width'] . "</td>
                                        <td>" . $showform['height'] . "</td>
                                        <td>" . $showform['cbt'] . "</td>
                                        <td>" . $showform['cmt'] . "</td>
                                        <td>" . $showform['qty'] . "</td>";

                                    /*   echo "
                                   
                                   <td>".$showform['price']."</td>
                                   <td>".$showform['remark']."</td>
                                   "; */

                                    echo "
                                        <td>" . $showform['status'] . "</td>
                                        <td>
                                        <a href='catogeryupdate.php?id=$showform[id]'><button class='btn btn-sm btn-info'>Edit</button></a>
                                        <a href='catogeryupdate.php?delf=$showform[id]'><button class='btn btn-sm btn-danger'>Delete</button></a>
                                        </tr>";
                                    $no = $no + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <script>
        function myFunction2() {
            var mt1 = document.getElementById("mt").value;
            var mw1 = document.getElementById("mw").value;
            var ml1 = document.getElementById("ml").value;
            var qty1 = document.getElementById("qty").value;
            var cbt3 = +mw1 * +mt1 * +ml1 * +qty1;
            console.log(cbt3);
            document.getElementById("cbt").value = cbt3;

            var cmt3 = +cbt3 / 35.315;
            console.log(cmt3);
            document.getElementById("cmt").value = cmt3;
            //   parseFloat(cmt3 + cmt34).toFixed(2);

        }

        function ply() {
            var w1 = document.getElementById("w").value;
            var l1 = document.getElementById("l").value;
            var qtyp1 = document.getElementById("qtyp").value;

            var sqft3 = +w1 * +l1 * +qtyp1;
            document.getElementById("sqft").value = sqft3;

            var sqmt3 = +sqft3 * 0.092903;
            document.getElementById("sqmt").value = sqmt3;

        }
    </script>
    <script>
        $(document).ready(function() {
            $("#wood").hide()
            $("#ply").hide()
            $("#mchange").change(function() {
                var valchange = $(this).val();
                if (valchange === "3") {
                    $("#wood").show()
                    $("#ply").hide()
                } else if (valchange === "4") {
                    $("#ply").show();
                    $("#wood").hide()
                } else {
                    $("#wood").hide()
                    $("#ply").hide()
                }
            })
        });

        $(document).ready(function() {
            $("#catchange").change(function() {
                var showid = $(this).val();
                $.ajax({
                    url: "deopdown_inventry.php",
                    method: "post",
                    data: {
                        id: showid
                    },
                    dataType: "html",
                    success: function(strMsg) {
                        var html = "<option>Choose</option>";
                        html += strMsg;
                        $("#statees").html(html);
                    }

                })
            })
        });


        $(document).ready(function() {
            $("#statees").change(function() {
                var typechange = $(this).val();

                // alert(typechange);
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
                        $("#subshow").html(html)
                    }
                });
            })
        })
    </script>
    <!-- END content-page -->
    <?php include('include/footer.php'); ?>