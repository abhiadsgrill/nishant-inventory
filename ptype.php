<?php
include('include/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pt = $_POST['pt'];
    $subtype = $_POST['subtype'];
    $query = "INSERT INTO ptype(ptname,subtype)VALUES('$pt','$subtype')";
    mysqli_query($db, $query);
    if ($query) {
        echo '<script>alert("Add SuccessFully");
        window.location="ptype.php";
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
                            <h1 class="main-title float-left">Product type</h1>
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
                                <form action="" method="POST"  >
                                        
                                        <div class="row">
                                                <div class="form-group col-md-7">
                                                    <label for="userName">Product Name<span
                                                    class="text-danger">*</span></label>
                                                    <input type="text" name="pt" data-parsley-trigger="change"
                                                    placeholder="Enter Type Name" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-5">
                                                <label for="category">Category Type<span class="text-danger">*</span></label>
                                                <select class="form-control" name="subtype" aria-label="Default select example">
                                                    <option selected>Select Category</option>
                                                    <option value="0">Main Category </option>
                                                    <?php
                                                    $sql = "SELECT * FROM `category` where status='0' order by id desc";
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

                            </div>
                        </div>
                        <!-- end card-->


                        <!-- SHOWING DATA IN TABLE -->
                    
                       <table id="example1" class="table table-bordered table-hover display">
                            <thead>
                                <tr>
                                    <th scope="col">Sr no</th>
                                    <th scope="col">Type Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                       $sql="SELECT ptype.*,category.catname FROM ptype INNER JOIN category ON ptype.subtype = category.id  order by ptype.id desc";
                                        $query=mysqli_query($db,$sql);
                                        $no = 1;
                                while ($showdata = mysqli_fetch_assoc($query)) {
                                    echo "<tr>
                                        <th scope='row'>$no</th>
                                        <td>$showdata[ptname]</td>
                                        <td>$showdata[catname]</td>
                                        <td>
                                        <a href='product_update.php?ptd=$showdata[id]'><button class='btn btn-sm btn-info'>Edit</button></a>
                                        <a href='#'><button class='btn btn-sm btn-danger'>Delete</button></a>
                                        </tr>";
                                    $no = $no + 1;
                                }
                                ?>
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