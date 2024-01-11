<?php
include('include/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mname = $_POST['mname'];

    $query = "INSERT INTO mesurment(name)VALUES('$mname')";
    mysqli_query($db, $query);
    if ($query) {
        echo '<script>alert("Add SuccessFully");
        window.location="measurment.php";
        </script>';
    } else {
        echo '<script>alert("Something went wrong")</script>';
    }
}



//featch data form db


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
                            <h1 class="main-title float-left">Measurment</h1>
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
                                <h3>Measurment</h3>
                            </div>

                            <div class="card-body">

                                <form action="" method="POST" data-parsley-validate novalidate>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row d-flex justify-content-center align-items-center">

                                                <div class="form-group col-md-7">
                                                    <label for="userName">Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="mname" data-parsley-trigger="change" required
                                                    placeholder="Enter Name" class="form-control">
                                                </div>
                                                <div class="form-group text-right mb-0 col-md-5">
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
                        <!-- <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sr no</th>
                                    <th scope="col">Type Name</th>
                                    <th scope="col">Parent Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = "SELECT * FROM `category`";
                                $shotable = mysqli_query($db, $query);
                                $no = 1;
                                while ($showdata = mysqli_fetch_assoc($shotable)) {
                                    echo "<tr>
                                        <th scope='row'>$no</th>
                                        <td>$showdata[catname]</td>
                                        <td>$showdata[status]</td>
                                        <td>
                                        <a href='catogeryupdate.php?id=$showdata[id]'><button class='btn btn-sm btn-info'>Edit</button></a>
                                        <a href='#'><button class='btn btn-sm btn-danger'>Delete</button></a>
                                        </tr>";
                                    $no = $no + 1;
                                }
                                ?>
                            </tbody>
                        </table> -->

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