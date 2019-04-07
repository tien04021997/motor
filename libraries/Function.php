<?php
    /*
     * get Input
     * */

    /*
     * post Input
     * */

    function postInput($string)
    {
        // Nếu tồn tại $_POST[$string] thì sẽ return ra $_POST[$string], còn nếu ngước lại thì sẽ return ra mã đơn vị trống
        return isset($_POST[$string]) ? $_POST[$string] : '';
    }
?>