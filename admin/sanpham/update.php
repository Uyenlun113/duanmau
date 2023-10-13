<?php
if (is_array($sanpham)) {
    extract($sanpham);
    $idsp =  $id;
    $tensp = $name;
}
$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "không có hình";
}
?>
<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT SẢN PHẨM</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <select name="iddm" id="">
                    <option value="0" selected>Tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        if ($iddm == $id) echo '<option value="' . $id . '" selected>' . $name . '</option>';
                        else echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <input type="text" name="tensp" placeholder="nhập vào tên sản phẩm" value="<?= $tensp ?>">
            </div>
            <div class="row2 mb10">
                <label>Giá sản phẩm </label> <br>
                <input type="text" name="giasp" value="<?= $price ?>">
            </div>
            <div class="row2 mb10">
                <label>Hình </label> <br>
                <input type="file" name="hinh">
                <?= $hinh ?>
            </div>
            <div class="row2 mb10">
                <label>Mô tả </label> <br>
                <textarea name="mota" id="" cols="30" rows="10"><?= $mota ?></textarea>
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?= $idsp ?>">
                <input class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
                <input class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
            </div>
        </form>
    </div>
</div>