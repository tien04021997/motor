<?php
    $open = "category";
    require_once  __DIR__."/../../autoload/autoload.php";

    $id = intval(getInput('id'));
    //    _debug($id);

    $EditCategory = $db->fetchID("category", $id);
    //    Nếu không tồn tại id ($EditCategory) thì sẽ trả về trang danh mục sản phẩm
    if (empty($EditCategory))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }

    /*
     * Kiểm tra danh mục có sản phẩm chưa
     * */

    $num = $db->delete('category', $id);
    if ($num > 0)
    {
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("category");
    }
    else
    {
        $_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("category");
    }

?>
