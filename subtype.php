<?php
include('include/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['sname'];
    $adtype= $_POST['adtype'];
    $query = "INSERT INTO subtype(name,type)VALUES('$name','$adtype')";
    mysqli_query($db, $query);
    if ($query) {
        echo '<script>alert("Add SuccessFully");
        window.location="subtype.php";
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
                            <h1 class="main-title float-left">Type</h1>
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
                                <form action="" method="POST" >

                                    <div class="row">
                                        <div class="form-group col-md-7">
                                            <label for="userName">Sub Type<span class="text-danger">*</span></label>
                                            <input type="text" name="sname" data-parsley-trigger="change"
                                                placeholder="Enter Type Name" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="category">Type<span class="text-danger">*</span></label>
                                            <select class="form-control" name="adtype"
                                                aria-label="Default select example">
                                                <option value="">Select Category</option>
                                                <?php
                                                $sql = "SELECT * FROM `type`";
                                                $query = mysqli_query($db, $sql);
                                                while ($featch = mysqli_fetch_assoc($query)) {
                                                    ?>
                                                    <option value="<?php echo $featch['id']; ?>">
                                                        <?php echo "$featch[ttype]" ?>
                                                    </option>

                                                    <?php
                                                }
                                                ;
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

                        </div>
                    </div>
                    <!-- end card-->
                </div>
            </div>
        </div>
        <!-- END content-page -->
        <?php include('include/footer.php'); ?>