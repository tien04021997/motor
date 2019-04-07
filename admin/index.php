<?php
    require_once  __DIR__."/autoload/autoload.php";
    $db = new Database ;
    $category = $db->fetchAll("category");
    var_dump($category);
?>


<?php require_once __DIR__."/layouts/header.php"; ?>

            <!-- Page Heading Nội dung -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       Xin chào bạn đến với trang quản trị của Admin <small>Statistics Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="">
                            <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Home
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
<?php require_once  __DIR__."/layouts/footer.php"; ?>