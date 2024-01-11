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
        $catname = $_POST['catname'];
        $query = "UPDATE `ptype` SET ptname = '$ptname', subtype='$catname' WHERE `id` = $id;";
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
                         <form action="" method="POST" data-parsley-validate novalidate>
                                        
                                        <div class="row">
                                                <div class="form-group col-md-7">
                                                    <label for="userName">Product Name<span
                                                    class="text-danger">*</span></label>
                                                    <input type="text" name="ptname"  value="<?php echo "$fpt[ptname]"; ?>" data-parsley-trigger="change"
                                                    placeholder="Enter Type Name" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-5">
                                                <label for="category">Product Type<span class="text-danger">*</span></label>
                                                <select class="form-control" name="catname"  value="<?php echo "$fpt[catname]"; ?>" aria-label="Default select example">
                                                    <option selected>Select Category</option>
                                                    <option value="0">Main Category </option>
                                                    <?php
                                                    $sql = "SELECT * FROM `category` where status='0'  order by id desc";
                                                    $query = mysqli_query($db, $sql);
                                                    while ($featch = mysqli_fetch_assoc($query)) {
                                                        ?>
                                                        <option value="<?php echo $featch['id'];?>">
                                                            <?php echo "$featch[catname]" ?>
                                                        </option>

                                                        <?php
                                                    };
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary" type="submit" name="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary m-l-5">
                                                Cancel
                                            </button>
                                            </div> 
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