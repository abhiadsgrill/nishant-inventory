<?php
include('include/config.php');
include('include/header.php');
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/fh-3.3.2/r-2.4.1/datatables.min.css" rel="stylesheet" />



<?php
$is_uploaded = 0;
$is_submitted = 0;
if (isset($_POST['submit'])) {
  $excel = $_FILES['importdata']['name'];
  $temp_excel = $_FILES['importdata']['tmp_name'];
  move_uploaded_file($temp_excel, 'uploads/' . $excel);

  echo $excel;
  echo $temp_excel;
  echo "<script>alert('$excel')</script>";
  echo "<script>alert('$temp_excel')</script>";
  $is_uploaded = 1;
}

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
            <div class="breadcrumb-holder" id="head-breadcrumb">
              <h1 class="main-title float-left">Import Day-book</h1>
              <ol class="breadcrumb float-right">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active"> Import Day-book</li>
              </ol>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <?php 



?>
        

        <div class="row">
          <div class="col-md-12">
            <div class="card mb-3">
              <div class="card-header">
                <h3><i class="fa fa-hand-pointer-o"></i> Project based account Report</h3>
              </div>
              <div class="card-body">
                <form method="POST" name="filter2" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                      <label class="form-label btn btn-info form-control"><b>Select csv </b></label>
                      <input type='file' name="importdata" class="form-control" accept="">
                    </div>

                    <div class="col-lg-1 col-md-1 col-12">
                      <button type="submit" name="submit" class="btn btn-info m-l-5"> Import </button>
                    </div>
                  </div>
                </form>
                <hr style="color: black; border: 2px solid black"><br>


              </div>

              <!-- end card-->

            </div>



          </div>



        </div>

        <!-- END container-fluid -->



      </div>

      <!-- END content -->




      <?php
      if($is_uploaded)
      {
        $textFileContent = file_get_contents("uploads/" . $excel);

        // Split the content into lines
        $lines = explode("\n", $textFileContent);


        /*   echo "<pre>";
        print_r($lines);
        echo "</pre>";
        echo "<br>"; */

        $i=0;
        $flag = 0;
        foreach($lines as $line)
        {

            if($flag > 1)
            {
              //$particulars_firm = str_replace(`"`, "",$particulars_firm);
              //$particulars_details = str_replace(`"`, "",$particulars_details);
              //$voucher_type = str_replace(`"`, "",$voucher_type);
              //$voucher_no = str_replace(`"`, "",$voucher_no);
              $query = "INSERT INTO daybook (date, particulars_firm, particulars_details, voucher_type, voucher_no, debit_amount, credit_amount) VALUES('$date','$particulars_firm','$particulars_details','$voucher_type','$voucher_no','$debit_amount','$credit_amount')";
              $result = mysqli_query($db, $query) or die(mysqli_error($db));
             
              $flag -= 1;
            } 

            //echo chop($line) ."<br>";
            //echo "<pre>";
            $data = explode(',',$lines[$i]);
            //print_r($data);
            //echo "</pre>";
            if(sizeof($data) == 6)
            {
              //$flag = 0;
              $date = $data[0]; //date array
              $particulars_firm = $data[1]; // particulars array
              $voucher_type = $data[2]; // voucher type array
              $debit_amount = $data[3] ; //debit amount array
              $credit_amount = $data[4]; //credit amount array

              $flag+=1;
              
            } 
            else if(sizeof($data) == 3)
            {
              $particulars_details = $data[1]; // particulars array
            
            }
            else if(sizeof($data) == 2)
            {
               $voucher_no = $data[0]; // voucher number array
            }

           
            

            /* $date = $data[0]; //date array
            $particulars_firm = $data[1]; // particulars array
            $particulars_details = $data[3]; // particulars array
            $voucher_type = $data[4]; // voucher type array
            $voucher_no = $data[5]; // voucher number array
            $debit_amount = $data[6]; //debit amount array
            $credit_amount = $data[7]; //credit amount array
 */
            $i++;
        }


      }
      else{
        
        echo '
        <div class="container bg-white p-4">
          <h1>NO FILE SELECTED YET</h1><br>
          <h3 class="text-danger">Kindly select any file to show data</h3>
        </div>
        ';
      }
?>
<div class="container my-3 bg-white p-4">
<div class="card-body">

<table id="example1" class="table table-bordered table-responsive-xl table-hover display">
									<thead>
										<tr>
											<th>Date</th>
											<th>Firm</th>
											<th>Particulars</th>
											<th>Voucher Type</th>
											<th>Voucher No</th>
											<th>Debit Amount</th>
											<th>Credit Amount</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$queryu = "SELECT *FROM daybook order by id desc";
										$result = $db->query($queryu);
										$i = 1;
										while ($row = mysqli_fetch_array($result)) {
										?>

											<tr>
												<td><?php echo $row['date']; ?></td>
												<td><?php echo $row['particulars_firm']; ?></td>
												<td><?php echo $row['particulars_details']; ?></td>
												<td><?php echo $row['voucher_type']; ?></td>

												<td><?php echo $row['voucher_no']; ?></td>
												<td><?php echo $row['debit_amount']; ?></td>
												<td><?php echo $row['credit_amount']; ?></td>
											</tr>

										<?php } ?>

									</tbody>
								</table>

                </div>
                    </div>










    </div>
    <?php include('include/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/fh-3.3.2/r-2.4.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>

    <script>
      $(document).ready(function() {
        let table = new DataTable("#example", {
          // ordering: false,
          fixedHeader: {
            header: true,
            footer: true,
          },
          dom: "lBfrtip",
          buttons: ["copy", "csv", "pdf"],
        });
        let table1 = new DataTable("#myTable1", {
          ordering: false,
          fixedHeader: {
            header: true,
            footer: true,
          },
          dom: "lBfrtip",
          buttons: ["copy", "csv", "pdf"],
        });

      });
    </script>