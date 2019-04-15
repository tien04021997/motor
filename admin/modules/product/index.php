<?php
    $open = 'product';
    require_once  __DIR__."/../../autoload/autoload.php";

    $product
        = $db->fetchAll('product');
?>


<?php require_once __DIR__."/../../layouts/header.php"; ?>

    <!-- Page Heading Nội dung -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách danh mục
            </h1>
            <div class="add-btn-custom add-category-btn">
                <a class="btn btn-success" href="add.php">Thêm mới</a>
            </div>
            <ol class="breadcrumb">
                <li class="">
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Danh mục
                </li>
            </ol>
            <div class="clearfix"></div>
            <!--Thông báo lỗi-->
            <?php require_once __DIR__."/../../../partials/notification.php"; ?>

        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $stt = 1; foreach ($product as $item): ?>
                        <tr>
                            <td>
                                <?php echo $stt ?>
                            </td>
                            <td>
                                <?php echo $item['id'] ?>
                            </td>
                            <td>
                                <?php echo $item['name'] ?>
                            </td>
                            <td>
                                <?php echo $item['slug'] ?>
                            </td>
                            <td>
                                <?php echo $item['created_at'] ?>
                            </td>
                            <td>
                                <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>">
                                    <i class="fa fa-edit"></i> Sửa
                                </a>
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>">
                                    <i class="fa fa-times"></i> Xóa
                                </a>
                            </td>
                        </tr>
                        <?php $stt++ ; endforeach; ?>
                    </tbody>
                </table>
                <!--                <div class="category-pagination pull-right">-->
                <!--                    <nav aria-label="Page navigation example">-->
                <!--                        <ul class="pagination">-->
                <!--                            <li class="page-item">-->
                <!--                                <a class="page-link" href="#" aria-label="Previous">-->
                <!--                                    <span aria-hidden="true">&laquo;</span>-->
                <!--                                    <span class="sr-only">Previous</span>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                            <li class="page-item"><a class="page-link" href="#">1</a></li>-->
                <!--                            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                <!--                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                <!--                            <li class="page-item">-->
                <!--                                <a class="page-link" href="#" aria-label="Next">-->
                <!--                                    <span aria-hidden="true">&raquo;</span>-->
                <!--                                    <span class="sr-only">Next</span>-->
                <!--                                </a>-->
                <!--                            </li>-->
                <!--                        </ul>-->
                <!--                    </nav>-->
                <!--                </div>-->
            </div>
        </div>
    </div>
    <!--End.row-->
<?php require_once  __DIR__."/../../layouts/footer.php"; ?>