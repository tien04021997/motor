<?php
$open = "category";
require_once  __DIR__."/../../autoload/autoload.php";
/*
 * Danh sách danh mục sản phẩm
 */
$category = $db->fetchAll("category");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "name" => postInput("name"),
            "category_id" => postInput("category_id"),
            "price" => postInput("price"),
            "content" => postInput("content"),
            "slug" => to_slug(postInput("name"))
        ];

    $error = [];

    if (postInput("name") == '')
    {
        $error['name'] = "Mời bạn nhập đầy đủ tên sản phẩm";
    }

    if(postInput("category_id") == '')
    {
        $error['category_id'] = "Mời bạn chọn danh mục sản phẩm";
    }

    if (postInput("price") == '')
    {
        $error['price'] = "Mời bạn nhập giá bán";
    }

    if (postInput('content') == ''){
        $error['content'] = "Mời bạn nhập mô tả sản phẩm";
    }

    if( !isset($_FILES['thunbar']))
    {
        $error['thunbar'] = "Mời bạn chọn hình ảnh";
    }

    // Nếu error trống có nghĩa là không có lỗi

    if (empty($error))
    {
        if ( isset($_FILES['thunbar']))
        {
            $file_name = $_FILES['thunbar'].['name'];
            $file_tmp = $_FILES['thunbar'].['tmp_name'];
            $file_type = $_FILES['thunbar'].['type'];
            $file_erro = $_FILES['thunbar'].['error'];

            if ($file_erro == 0)
            {
                $part = ROOT ."product/";
                $data['thunbar'] = $file_name;
            }
        }

        _debug($data);
    }
}

?>


<?php require_once __DIR__."/../../layouts/header.php"; ?>

    <!-- Page Heading Nội dung -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm mới sản phẩm
            </h1>
            <ol class="breadcrumb">
                <li class="">
                    <i class="fa fa-dashboard"></i> <a href="index.php">Dashboard</a>
                </li>
                <li class="">
                    <a href="index.php">Sản phẩm</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Thêm mới
                </li>
            </ol>
            <!--Thông báo lỗi-->
            <?php require_once __DIR__."/../../../partials/notification.php"; ?>


        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputName1" name="name" placeholder="Tên sản phẩm">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger">
                                <?php echo $error['name'] ?>
                            </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Danh mục sản phẩm</label>
                    <div class="col-sm-8">
                        <select class="form-control col-md-8" name="category_id" id="">
                            <option value=""> - Mời bạn chọn danh mục sản phẩm - </option>
                            <?php foreach ($category as $item): ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                            <?php endforeach ?>

                        </select>
                        <?php if (isset($error['category_id'])): ?>
                            <p class="text-danger">
                                <?php echo $error['category_id'] ?>
                            </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Giá sản phẩm</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputPrice" name="price" placeholder="0.0000">
                        <?php if (isset($error['price'])): ?>
                            <p class="text-danger">
                                <?php echo $error['price'] ?>
                            </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputSale" name="sale" placeholder="0%" value="0">

                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="inputThunbar" name="thunbar">
                        <?php if (isset($error['thunbar'])): ?>
                            <p class="text-danger">
                                <?php echo $error['thunbar'] ?>
                            </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Mô tả sản phẩm</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="content" id="" cols="30" rows="5"></textarea>
                        <?php if (isset($error['content'])): ?>
                            <p class="text-danger">
                                <?php echo $error['content'] ?>
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