<?php include('include/config.php'); ?>
<?php
// category update
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `category` WHERE id='$id'";
    $upshow = mysqli_query($db, $query);
    $feacthdata = mysqli_fetch_assoc($upshow);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $catname = $_POST['catname'];
        $status = $_POST['status'];

        $query = "UPDATE category SET catname = '$catname',status = '$status' WHERE id = '$id'";
        $updateq = mysqli_query($db, $query);
        if ($query) {
            echo "<script>
        alert('Update Successfully..'); 
        window.location='catogery.php'; 
        </script>";

        } else {
            echo "<script>alert('Try Again')</script>";
        }

    }
}

// category delete

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $query = mysqli_query($db, "DELETE FROM category WHERE id = '$id'");
    echo "<script>
    confirm('delete Successfully..'); 
    window.location='catogery.php'; 
    </script>";
}



// pt update 


if (isset($_GET['ptd'])) {
    $id = $_GET['ptd'];
    $sql = "SELECT * FROM `ptype` WHERE id='$id'";
    $query = mysqli_query($db, $sql);
    $fpt = mysqli_fetch_assoc($query);
}

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ptname = $_POST['ptname'];
        $status = $_POST['status'];
        $query = "UPDATE `ptype` SET ptname = '$ptname', status='$status' WHERE `id` = $id;";
        $ptudate = mysqli_query($db, $query);
        echo "
        <script>
        alert('Updata successfully')
        window.location='ptype.php';
        </script>
        
        ";
        die;
    }


// pt delete

if (isset($_GET['pdl'])) {
    $id = $_GET['pdl'];
    $query = "DELETE FROM `ptype` WHERE `id` = '$id'";
    $sql = mysqli_query($db, $query);

    echo "<script>
    alert('Delete Successfully..')
    window.location='ptype.php';
    </script>";
}
 else {
    // echo "<script>
    // alert('Try Again..')
    // </script>";
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



                <div class="row">

                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-hand-pointer-o"></i>
                            </div>

                            <div class="card-body">
                                <!-- pt form -->
                                <!--<form action="" method="POST" data-parsley-validate novalidate>-->
                                <!--    <div class="row">-->
                                <!--        <div class="col-lg-6">-->
                                <!--            <div class="form-group">-->
                                <!--                <label for="userName">Cat Name<span class="text-danger">*</span></label>-->
                                <!--                <input type="text" value="<?php echo "$fpt[ptname]"; ?>" name="ptname"-->
                                <!--                    data-parsley-trigger="change" required placeholder="Enter Cat Name"-->
                                <!--                    class="form-control">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-6">-->
                                <!--            <div class="form-group">-->
                                <!--                <label for="emailAddress">Status<span-->
                                <!--                        class="text-danger">*</span></label>-->
                                <!--                <input type="text" value="<?php echo "$fpt[status]"; ?>" name="status"-->
                                <!--                    data-parsley-trigger="change" required placeholder="Enter Status"-->
                                <!--                    class="form-control" id="status">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="form-group text-right m-b-0">-->
                                <!--        <button class="btn btn-primary" type="submit" name="submit">-->
                                <!--            Update-->
                                <!--        </button>-->
                                <!--        <button type="reset" class="btn btn-secondary m-l-5">-->
                                <!--            Cancel-->
                                <!--        </button>-->
                                <!--    </div>-->
                                <!--</form>-->
                                <!-- pt form  end -->


                                <!-- category -->
                                <form action="" method="POST" data-parsley-validate novalidate>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="userName">Cat Name<span class="text-danger">*</span></label>
                                                <input type="text" value="<?php echo "$feacthdata[catname]"; ?>"
                                                    name="catname" data-parsley-trigger="change" required
                                                    placeholder="Enter Cat Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="emailAddress">Status<span
                                                        class="text-danger">*</span></label>
                                                <!--<input type="text" value="<?php echo "$feacthdata[status]"; ?>"-->
                                                <!--    name="status" data-parsley-trigger="change" required-->
                                                <!--    placeholder="Enter Status" class="form-control" id="status">-->
                                                <select  name="status" class="form-control" id="status">
                                               <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary" type="submit" name="submit">
                                            Update
                                        </button>
                                        <button type="reset" class="btn btn-secondary m-l-5">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                                <!-- category end -->
                            </div>
                        </div>
                        <!-- end card-->
                    </div>
                </div>
            </div>
            <!-- END container-fluid -->

        </div>
        <!-- END content -->

    </div>
    <!-- END content-page -->
    <?php include('include/footer.php'); ?>