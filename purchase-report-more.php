<?php
include('include/config.php'); ?>
<?php include('include/header.php'); ?>

<?php
$inv_no = $_GET['inv_no'];
?>

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
              <h3 class="main-title float-left">Purchase Report</h3>
              <ol class="breadcrumb float-right">
                <td class="breadcrumb-item">Inventory Stock </td>
                <td class="breadcrumb-item active">Purchase Report/li>
              </ol>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->


      <?php
      $query = "SELECT * FROM PURCHASE WHERE inv_no='$inv_no'";
      $result = $db->query($query);
      while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $uid = $row['uid'];
        $p_name = $row['p_name'];
        $challan_no = $row['challan_no'];
        $si_no = $row['si_no'];
        $gaddi_no = $row['gaddi_no'];
        $builty = $row['builty'];
        $m_type = $row['m_type'];
        $sgst = $row['sgst'];
        $cgst = $row['cgst'];
        $tcs = $row['tcs'];
        $lbr = $row['lbr'];
        $total = $row['total'];
        $transporter = $row['transporter'];
        $due_date = $row['due_date'];
        $due_days = $row['due_days'];
        $nrtn = $row['nrtn'];
        $cash_amt = $row['cash_amt'];
        $check_amt = $row['check_amt'];
        $inv_date = $row['inv_date'];
        $date = $row['date'];
        $upload_measurement = $row['upload_measurement'];
        $upload_hisab_copy = $row['upload_measurement'];
        $upload_builty = $row['upload_builty'];
        $upload_extra = $row['upload_extra'];
        $upload_invoice = $row['upload_invoice'];
      }
      ?>


      <div class="container bg-light">
        <h2 class="fw-bold py-4 my-4 bg-info text-white text-center">Showing Details for Invoice No. :: <?php echo $inv_no; ?></h2>
        <table class="table bg-light">
          <tbody>
            <tr>
              <td>Party Name : <?php echo $p_name; ?> </td>
              <td>Challan No. : <?php echo $challan_no; ?> </td>
              <td>SI No. : <?php echo $si_no; ?> </td>
              <td>Gaadi No. : <?php echo $gaddi_no; ?> </td>
            </tr>
            <tr>

              <td>TCS : <?php echo $tcs; ?> </td>
              <td>Labour : <?php echo $lbr; ?> </td>
              <td>Transporter : <?php echo $transporter; ?> </td>
              <td>Due Date : <?php echo $due_date; ?> </td>
            </tr>
            <tr>

              <td>Due Days : <?php echo $due_days; ?> </td>
              <td>Narration : <?php echo $nrtn; ?> </td>
              <td>Cash Amount : <?php echo $cash_amt; ?> </td>
              <td>Cheque Amount : <?php echo $check_amt; ?> </td>
            </tr>
            <tr>

              <td>Invoice Date : <?php echo $inv_date; ?> </td>
              <td>Purchase Created On : <?php echo $date; ?> </td>
            </tr>
          </tbody>
        </table>
        <br>


        <?php 
          $sql = "SELECT * FROM products WHERE inv_no='$inv_no'" or die(mysqli_error($db));
          $result = $db->query($sql);
          
          while ($product_row = mysqli_fetch_array($result)) {
            $ml = $product_row["ml"];
            $mw = $product_row['mw'];
            $mt = $product_row["mt"];
            $cat_id = $product_row['cat_id'];
            $type = $product_row["type"];
            $subtype = $product_row['subtype'];
            $qty = $product_row['qty'];
            $measurement = $product_row['meserment_type'];
          }
          
          $sql_category = "SELECT catname FROM category WHERE id='$cat_id'";
          $result_category = $db->query($sql_category);
          $category_name="";
          if($result_category)
          {
            while($category_row = mysqli_fetch_array($result_category))
            {
              $category_name = $category_row['catname'];
            }
          }

          $sql_measurement = "SELECT name FROM measurement WHERE id='$measurement'";
          $result_measurement = $db->query($sql_measurement);
          $measurement_name ="";
          if($result_measurement)
          {
            while($measurement_row = mysqli_fetch_array($result_measurement))
            { 
              $measurement_name = $measurement_row["name"];
            }
          }

          $sql_subtype = "SELECT subtype_name FROM subtype WHERE id='$subtype'";
          $result_subtype = $db->query($sql_subtype);
          $subtype_name="";
          if($result_subtype)
          {
            while($subtype_row = mysqli_fetch_array($result_subtype))
            {
              $subtype_name = $subtype_row["subtype_name"];
            }
          }

          $sql_ptype = "SELECT ptname FROM ptype WHERE id='$type' ";
          $result_ptype = $db->query($sql_ptype);
          $ptype_name = "";
          if($result_ptype)
          {
            while($ptype_row = mysqli_fetch_array($result_ptype))
            {
              $ptype_name = $ptype_row["ptname"];
            }
          }
          
        ?>
        <h1 class="container mt-10 mb-4">Products</h1>
        <div class="container">

        <table class="table bg-light">
        <thead>
            <tr>
              <th scope="col">Category</th>
              <th scope="col">Type</th>
              <th scope="col">Sub Type</th>
              <th scope="col">Measurement</th>
              <th scope="col">T(inch)</th>
              <th scope="col">W(inch)</th>
              <th scope="col">L(inch)</th>
              <th scope="col">Quantity</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> <?php echo $category_name; ?> </td>
              <td> <?php echo $ptype_name; ?> </td>
              <td><?php echo $subtype_name; ?> </td>
              <td><?php echo $measurement_name;?></td>
              <td><?php echo $mt; ?> </td>
              <td><?php echo $mw; ?> </td>
              <td><?php echo $ml; ?> </td>
              <td><?php echo $qty; ?> </td>
            </tr>
          </tbody>
        </table>

        </div>

        <h1 class="container mt-10 mb-4">Uploads</h1>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Measurement</th>
              <th scope="col">Hisab Copy</th>
              <th scope="col">Builty</th>
              <th scope="col">Extra</th>
              <th scope="col">Invoice</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              
          <td>Measurement Photo: <img src="<?php echo "uploads/" . $upload_measurement ?>" alt="Measurement Photo" style="max-height:100px; max-width:100px;"> </td>
          <td>Hisab Copy Photo: <img src="<?php echo "uploads/" . $upload_hisab_copy ?>" alt="Measurement Photo" style="max-height:100px; max-width:100px;"> </td>
          <td>Builty Photo: <img src="<?php echo "uploads/" . $upload_builty ?>" alt="Measurement Photo" style="max-height:100px; max-width:100px;"> </td>
          <td>Extras Photo: <img src="<?php echo "uploads/" . $upload_extra ?>" alt="Measurement Photo" style="max-height:100px; max-width:100px;"> </td>
          <td>Invoice Photo: <img src="<?php echo "uploads/" . $upload_invoice ?>" alt="Measurement Photo" style="max-height:100px; max-width:100px;"> </td>
            </tr>
          </tbody>
        </table>



        
      </div>


    </div>

    <?php include('include/footer.php'); ?>