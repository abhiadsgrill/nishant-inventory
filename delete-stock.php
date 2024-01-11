<?php
include('include/config.php'); ?>
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
                            <h3 class="main-title float-left">Stock List</h3>
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item">Stock</li>
                                <li class="breadcrumb-item active">Stock List/li>
                            </ol>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            
            <?php

                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $sql = "DELETE FROM products WHERE id = '$id'";
                    $result = mysqli_query($db, $sql);
                    if($result)
                    {
                        echo '<script>alert("record deleted successfully")</script>';
                        echo "<script>window.location='dashboard.php';</script>";
                        //echo 'record deleted for id '.$id;
                        //header('location:dashboard.php');
                    }
                }

            ?>



                


            </div>
        </div>
        <!-- END content -->

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".nilgiri").show();
            $(".bamboo").hide();
            $(".plywood").hide();
            $(".wood").hide();

            $("#nilgiri").click(function() {
                console.log("nilgiri clicked");
                $(".nilgiri").show();
                $(".bamboo").hide();
                $(".plywood").hide();
                $(".wood").hide();
            });
            $("#bamboo").click(function() {
                console.log("bamboo clicked");
                $(".bamboo").show();
                $(".nilgiri").hide();
                $(".plywood").hide();
                $(".wood").hide();
            });

            $("#plywood").click(function() {
                console.log("plywood clicked");
                $(".plywood").show();
                $(".bamboo").hide();
                $(".nilgiri").hide();
                $(".wood").hide();
            });

            
            $("#wood").click(function() {
                console.log("plywood clicked");
                $(".wood").show();
                $(".bamboo").hide();
                $(".nilgiri").hide();
                $(".plywood").hide();
            });
        });
    </script>


    <?php include('include/footer.php'); ?>