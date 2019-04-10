<?php
    $open = "category";
    require_once  __DIR__."/../../autoload/autoload.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
            [
                "name" => postInput("name"),
                "slug" => to_slug(postInput("name"))
            ];

        $error = [];

        if (postInput("name") == '')
        {
            $error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
        }

        // Nếu error trống có nghĩa là không có lỗi
        if (empty($error))
        {
            $id_insert = $db->insert('category', $data);
            if ($id_insert > 0)
            {
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("category");
            }
            else
            {
                // Thêm thất bại
                $_SESSION['error'] = "Thêm mới thất bại";

            }
        }
    }

?>


<?php require_once __DIR__."/../../layouts/header.php"; ?>

    <!-- Page Heading Nội dung -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm mới danh mục
            </h1>
            <ol class="breadcrumb">
                <li class="">
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li class="">
                     <a href="index.php">Danh mục</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Thêm mới
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputName1" name="name" placeholder="Tên danh mục thêm mới">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger">
                                <?php echo $error['name'] ?>
                            </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php require_once  __DIR__."/../../layouts/footer.php"; ?>