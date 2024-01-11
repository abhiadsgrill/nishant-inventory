<?php
include('include/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catname = $_POST['catname'];
    $status = $_POST['status'];

    $query = "INSERT INTO category(catname,status)VALUES('$catname','$status')";
    mysqli_query($db, $query);
    if ($query) {
        echo '<script>alert("Add SuccessFully");
        window.location="catogery.php";
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
                            <h1 class="main-title float-left">Catogery</h1>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <!-- <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Parsley JavaScript form validation library</h4>
                  <p>You can find examples and documentation about Parsley form validation library here: <a target="_blank" href="http://parsleyjs.org/">Parsley documentation</a></p>
            </div> -->


                <div class="row">

                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-hand-pointer-o"></i>
                            </div>

                            <div class="card-body">

                                <form action="" method="POST" >

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row d-flex justify-content-center align-items-center">
                                                <div class="form-group col-md-6">
                                                    <label for="userName">Cat Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="catname" data-parsley-trigger="change" required
                                                    placeholder="Enter Cat Name" class="form-control" required>
                                                </div>
                                                <div class="form-group text-right m-b-0 mb-0 col-md-6">
                                                    <button class="btn btn-primary" type="submit" name="submit">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-secondary m-l-5">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>

                                    

                                </form>

                            </div>
                        </div>
                        <!-- end card-->


                        <!-- SHOWING DATA IN TABLE -->
                        
                        		
								  	<div class="table-responsive">
									<table id="example1" class="table table-bordered table-hover display">
													<thead>
														<tr>
												    	 <th>Sr no</th>
                                                        <th>Cat Name</th>
                                                        <th>Status</th>
                                                        <th >Action</th>
															 
														</tr>
													</thead> 
													<tbody>
													    
					                      <?php 
                                    $query = "SELECT * FROM `category` order by id desc";
                                    $shotable = mysqli_query($db, $query);
                                    $no=0;
                                    while ($showdata = mysqli_fetch_assoc($shotable)) {
                                        
                                       ?>
                                       <tr>
                                    <td> <?php echo ++$no; ?></td>
                                    <td> <?php echo $showdata['catname']; ?></td>
                                    <td><?php  if($showdata['status']=='0')
                                    {
                                        echo "Active";
                                    }
                                        else{
                                            echo "Inactive";
                                        }
                                    
                                    
                                    ?></td>
                                    <td>        
                                         <a href='catogeryupdate.php?id=<?php echo $showdata['id']; ?>'><button class='btn btn-sm btn-info'>Edit</button></a>
                                        <a href='catogeryupdate.php?del=<?php echo $showdata['id']; ?>'><button class='btn btn-sm btn-danger'>Delete</button></a>
                                        </td>
                                </tr>
                                <?php }   ?>
                                      
                            </tbody>
                        </table>
                  
                    </div>

                </div>

<!-- Button trigger modal -->
 
 


            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->
 <?php include('include/footer.php'); ?>