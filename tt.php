 

<?php
 
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
     
       $query = "INSERT INTO purchase (uid,p_name,challan_no,si_no,gaddi_no,builty,sgst,cgst,tcs,lbr,total,transporter,due_days,nrtn,cash_amt,check_amt,inv_date)VALUES
     ('$uid','$p_name','$challan_no','$si_no','$gaddi_no','$builty','$sgst','$cgst','$tcs','$lbr','$total','$transporter','$due_days','$nrtn','$cash_amt','$check_amt','$inv_date')";
    mysqli_query($db, $query);
 
      $lastid = $db->insert_id;
    
        $j = 0;
        foreach ($m_type as $m_type2) {
             $mt2 =   $mt[$j];
            $mw2 =   $mw[$j];
            $ml2 =    $ml[$j];
            $cbt2 =  $cbt[$j];
            $cmt3 =  $cmt[$j];
            $qty2 =  $qty[$j];
             $cat_id2 =  $cat_id[$j];
            $ptype2 =  $ptype[$j];
            $subtype2 =  $subtype[$j];
      $query = "INSERT INTO product_item (uid,order_id,p1,p2,p3,p4,p5,qty,m_type,cat_id,ptype,subtype)VALUES
     ('$uid','$lastid','$mt2','$mw2','$ml2','$cbt2','$cmt3','$qty2','$m_type2','$cat_id2','$ptype2','$subtype2')";
     mysqli_query($db, $query);
      $j++;  
   
  } 
    if ($query) {
        echo '<script>alert("Add SuccessFully");
        window.location="purchase-form.php";
        </script>';
    } else {
        echo '<script>alert("Something went wrong")</script>';
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
                            <h1 class="main-title float-left">Purchase Form </h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Add Purchase</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
           
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <form action="" method="POST">
                                   	<table id="example133" class="table">
											  	<tr>
													<th rowspan="2">
													     <div class="form-group">
                                                         <label for="subtype">Party Name<span class="text-danger">*</span></label>
                                                      
                                                           <div class="form-group"> 
                                                           <select class="form-control" name="p_name" required>
                                                          <option value="">Select Partty name</option>
                                                         <option value="ABC KUMAR">ABC KUMAR</option>
                                                        <option value="XYZ SAH">XYZ SAH</option>
                                                        <option value="VICY TRIVEDI">VICY TRIVEDI</option>
                                                   
                                                </select>

                                            </div>
                                                                 </div>
                                                                 </th>
															<th><input type="date" placeholder=" "name="inv_date" class="form-control"></th>
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
                                          <div class="col-lg-1">
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
                                            <select class="form-select form-control" name="m_type[]" id="mchange"
                                            aria-label="Default select example"  >
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
                                                <div class="row" id="wood">
								                   <div class="col-md-2 mb-1">
                                                <label for="">T(inch)</label>
                                                <input type="number" name="mt[]" class="form-control"
                                                    placeholder="T(inch)" id="mt" oninput="myFunction2()" required>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <label for="">W(In inch)</label>
                                                <input type="number" name="mw[]" class="form-control"
                                                    placeholder="W(In inch)" id="mw" oninput="myFunction2()" required>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <label for="">L(In ft)</label>
                                                <input type="number" name="ml[]" class="form-control" placeholder="L(In ft)"
                                                    id="ml" oninput="myFunction2()" required>
                                            </div>
                                            
                                              <div class="col-md-2 mb-1">
                                                <label for="">QTY</label>
                                                <input type="number" name="qty[]" class="form-control" placeholder="qty"
                                                    id="qty" oninput="myFunction2()" required>
                                            </div>
                                            
                                            <div class="col-md-2 mb-1">
                                                <label for="">CFT</label>
                                                <input type="number" name="cbt[]" class="form-control" readonly placeholder="Cbt"
                                                    id="cbt"  >
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <label for="">CMT</label>
                                                <input type="number" name="cmt[]" class="form-control" readonly  placeholder="CMT"
                                                    id="cmt">
                                            </div>
                                      
                                        </div>
                                        
                                              <div class="row" id="ply" style="display:none" ;>
                                            <div class="col-md-2 mb-1">
                                                <label for="">W(ft)</label>
                                                <input type="number" name="mt2" class="form-control"
                                                    placeholder="W(ft)" id="w" oninput="ply()" required>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <label for="">L(ft)</label>
                                                <input type="number" name="mw2" class="form-control"
                                                    placeholder="L(ft)" id="l" oninput="ply()">
                                            </div>
                                            
                                               <div class="col-md-2 mb-1">
                                                <label for="">QTY</label>
                                                <input type="text" name="qty2" class="form-control"
                                                    placeholder="qty" id="qtyp" oninput="ply()">
                                            </div>
                                           
                                            <div class="col-md-2 mb-1">
                                                <label for="">T(mm)</label>
                                                <input type="number" name="ml2" class="form-control" placeholder="T(mm)"
                                                    id="" required>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <label for="">SQFT</label>
                                                <input type="text" name="cbt2" readonly class="form-control" placeholder="SQFT"
                                                    id="sqft">
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <label for="">SQMT</label>
                                                <input type="number" name="cmt2" readonly class="form-control"
                                                    placeholder="SQMT" id="sqmt">
                                            </div>
                                          
                                        </div>
                                        </div>
                                    
                                    </div>
                                         
                                         <div class="row mt-1 p-3  bg-light";>
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
                                        
                                          <div class="row mt-1 p-2"  ;>
                                            <div class="col-md-2 mb-1">
                                                 <input type="number" name="sgst" class="form-control" placeholder="SGST"
                                                    id="" required>
                                            </div>
                                            <div class="col-md-2 mb-1">
                                                <input type="number" name="cgst" class="form-control" placeholder="CGST"
                                                    id="" required>
                                            </div>
                                            
                                               <div class="col-md-2 mb-1">
                                             <input type="number" name="tcs" class="form-control" placeholder="TCS"
                                                    id="" required>
                                            </div>
                                           
                                            <div class="col-md-2 mb-1">
                                               <input type="number" name="lbr" class="form-control" placeholder="LABOUR"
                                                    id="" required>
                                            </div>
                                            <div class="col-md-3 mb-1">
                                             <input type="number" name="mmm" class="form-control" placeholder=" "
                                                    id="" required>
                                            </div>
                                          
                                         </div>
                                          <hr style="border: 1px solid darkblue"  >
                                            <div class="row mt-1 p-2";>
                                               <div class="col-md-6 mb-1">
                                                   <div class="row">
                                                  <div class="col-md-6 mb-1">
                                                   <input type="text" name="transporter" class="form-control" placeholder="Transporter"  id="" required>
                                                  </div>
                                                   <div class="col-md-6 mb-1">
                                                   <input type="text" name="due_days" class="form-control" placeholder="DUE DAYS"  id="" required>
                                                  </div>
                                                   </div>
                                                   
                                                  <div class="row">
                                                  <div class="col-md-12 mb-1">
                                                   <input type="text" name="nrtn" class="form-control" placeholder="NARRATION"  id="" required>
                                                  </div>
                                                  </div>
                                                  <div class="row p-5">
                                                 <div class="form-group  m-b-0">
                                                  <button class="btn btn-primary" type="submit" name="purchase"> Submit   </button>
                                                  <button type="reset" class="btn btn-secondary m-l-5">   Reset  </button>
                                                  <button type="button" class="btn btn-info m-l-5">  Print  </button>
                                                 </div>
                                                  </div>
                                                   
                                               </div>
                                                  <div class="col-md-3 mb-1">
                                                  <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                               <div class="custom-file">
                                               <label class="custom-file-label" for="customFile">Upload Measurement</label>
                                              <input type="file" name="measurement" class="custom-file-input" id="customFile">
                                             </div>
                                            </div>
                                            
                                                 <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                               <div class="custom-file">
                                               <label class="custom-file-label" for="customFile">Upload Hisab Copy</label>
                                              <input type="file" name="hisab_copy" class="custom-file-input" id="customFile">
                                             </div>
                                            </div>
                                            
                                                 <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                               <div class="custom-file">
                                               <label class="custom-file-label" for="customFile">Upload Builty Copy</label>
                                              <input type="file" name="builty" class="custom-file-input" id="customFile">
                                             </div>
                                            </div>
                                            
                                                 <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                               <div class="custom-file">
                                               <label class="custom-file-label" for="customFile">Upload Extra</label>
                                              <input type="file" name="extra" class="custom-file-input" id="customFile">
                                             </div>
                                            </div>
                                            
                                                 <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                               <div class="custom-file">
                                               <label class="custom-file-label" for="customFile">Upload Invoice</label>
                                              <input type="file" name="invoice" class="custom-file-input" id="customFile">
                                             </div>
                                            </div>
                                             
                                              </div>
                                               <div class="col-md-3 mb-1">
                                                   
                                                 <div class="form-group row">
                                              
                                                <div class="col-sm-10">
                                                  <input type="text" class="form-control" name="cash_amt" placeholder="Cash Amt" id="colFormLabelSm"  >
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
    $(document).ready(function () {
        $("#wood").show()
        $("#ply").hide()
        $("#mchange").change(function () {
            var valchange = $(this).val();
            if (valchange === "3") {
                $("#wood").show()
                $("#ply").hide()
            }
            else if (valchange === "4") {
                $("#ply").show();
                $("#wood").hide()
            }
            else {
                $("#wood").hide()
                $("#ply").hide()
            }
        })
    });
 
</script>
   <script>
 
    function myFunction2() {
        var mt1 = document.getElementById("mt").value;
         var mw1 = document.getElementById("mw").value;
        var ml1 = document.getElementById("ml").value;
        var qty1 = document.getElementById("qty").value;
        var cbt3 = +mw1 * +mt1 * +ml1 * +qty1;
        document.getElementById("cbt").value = cbt3;
        
        var cmt3 = +cbt3 / 35.315;
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
var id=0;
   function add_more_field() {
            id = id + 1;
            $( '<div class="row input"><div class="col-lg-1"> <div class="form-group"> <select class="form-control" id="catchange'+id+'" onchange="catchchange(this.value, '+id+')" name="cat_id[]" aria-label="Default select example"> <option value="">Select Catagory</option> <?php $sql = "SELECT * FROM `category` where status='0' order by id desc"; $query = mysqli_query($db, $sql); while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id']; ?>"> <?php echo $featch['catname'] ?> </option> <?php } ?> </select> </div> </div> <div class="col-lg-2"> <div class="form-group">  <select class="form-control"  id="statees'+id+'" onchange="catchchange2(this.value, '+id+')" name="ptype[]" aria-label="Default select example"> <option value="">Select Type</option> <?php $sql = "SELECT * FROM `ptype` where status='0'"; $query = mysqli_query($db, $sql); while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id']; ?>"> <?php echo $featch['ptname'] ?> </option> <?php } ?> </select> </div> </div> <div class="col-lg-2"> <div class="form-group"> <select  id="subshow'+id+'" onchange="catchchange3(this.value, '+id+')" name="subtype[]" class="form-control"> <option value="">Select SupType </option> </select> </div> </div><div class="col-lg-1"> <div class="form-group"> <select class="form-select form-control" name="m_type[]" id="mchange" aria-label="Default select example"  > <option value="0">measurement Type</option> <?php $sql = "SELECT*FROM `measurement` order by id desc"; $query = mysqli_query($db, $sql); while ($featch = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $featch['id'] ?>"> <?php echo $featch['name'] ?> </option> <?php  }   ?> </select> </div> </div><div class="col-lg-5"><div class="row id="wood"> <div class="col-md-2 mb-1"> <input type="number" name="mt[]" class="form-control" placeholder="T(inch)" id="mt'+id+'" oninput="myFunction2()" required> </div> <div class="col-md-2 mb-1"> <input type="number" name="mw[]" class="form-control" placeholder="W(In inch)" id="mw'+id+'" oninput="myFunction2()" required> </div> <div class="col-md-2 mb-1"> <input type="number" name="ml[]" class="form-control" placeholder="L(In ft)" id="ml'+id+'" oninput="myFunction2()" required> </div> <div class="col-md-2 mb-1"> <input type="number" name="qty[]" class="form-control" placeholder="qty" id="qty'+id+'" oninput="myFunction2()" required> </div> <div class="col-md-2 mb-1"> <input type="number" name="cbt[]" class="form-control" readonly placeholder="Cbt" id="cbt'+id+'"  > </div> <div class="col-md-2 mb-1"> <input type="number" name="cmt[]" class="form-control" readonly  placeholder="CMT" id="cmt'+id+'"> </div><div class="row" id="ply" style="display:none" ;> <div class="col-md-2 mb-1"> <label for="">W(ft)</label> <input type="number" name="mt2" class="form-control" placeholder="W(ft)" id="w" oninput="ply()" required> </div> <div class="col-md-2 mb-1"> <label for="">L(ft)</label> <input type="number" name="mw2" class="form-control" placeholder="L(ft)" id="l" oninput="ply()"> </div> <div class="col-md-2 mb-1"> <label for="">QTY</label> <input type="text" name="qty2" class="form-control" placeholder="qty" id="qtyp" oninput="ply()"> </div> <div class="col-md-2 mb-1"> <label for="">T(mm)</label> <input type="number" name="ml2" class="form-control" placeholder="T(mm)" id="" required> </div> <div class="col-md-2 mb-1"> <label for="">SQFT</label> <input type="text" name="cbt2" readonly class="form-control" placeholder="SQFT" id="sqft"> </div> <div class="col-md-2 mb-1"> <label for="">SQMT</label> <input type="number" name="cmt2" readonly class="form-control" placeholder="SQMT" id="sqmt"> </div> </div> </div></div><br><div class=" add_field " onClick="removeDiv(this)" padding: 2px; margin: 1px;"><i class="fas fa-trash" style="color:red;"></i></div>').insertAfter('.input:last');
             return false;
        }
            function removeDiv(elem) {
            id = id - 1; 
            // alert(id);
            $(elem).parent('.input').remove();
        }
             
    </script>
 
 
<!-- END content-page -->
<?php include('include/footer.php'); ?>