<div class="row2">
  <div class="row2 font_title mb">
    <h1>DANH SÁCH SẢN PHẨM</h1>
  </div>
  <div class="mb-3">
    <div class="mb10">
      <input class="mr20" type="button" value="CHỌN TẤT CẢ">
      <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
      <a href="index.php?act=addsp"><input class="mr20" type="button" value="NHẬP THÊM"></a>
    </div>
    <form action="index.php?act=listsp" method="post">
      <input type="text" name="valueSearch" id="">
      <select name="iddm" id="">
        <option value="0">Tất cả</option>
        <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="' . $id . '">' . $name . '</option>';
            }
            ?>
      </select>
      <input type="submit" name="listok" value="GO">
    </form>
  </div>

  <div class="row2 form_content">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table class="table align-middle mb-0 bg-white table-bordered">
          <thead class="table-dark">
            <tr class="rounded p-2">
              <th></th>
              <th>MÃ LOẠI</th>
              <th>TÊN SẢN PHẨM</th>
              <th>HÌNH</th>
              <th>GIÁ</th>
              <th>LƯỢT XEM</th>
              <th>CHỨC NĂNG</th>
            </tr>
          </thead>
          <tbody>
            <?php
                        foreach ($listsanpham as $sanpham) {
                            extract($sanpham);
                            $suasp = "index.php?act=suasp&id=" . $id;
                            $xoasp = "index.php?act=xoasp&id=" . $id;
                            $hinhpath = "../upload/" . $img;
                            $hinh = (is_file($hinhpath)) ? "<img src='" . $hinhpath . "' height='80'>" : "không có hình";

                            echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $hinh . '</td>
                                <td>' . $price . '</td>
                                <td>' . $luotxem . '</td>
                                <td>
                                    <a href="' . $suasp . '"><input type="button" value="Sửa"></a> 
                                    <a href="' . $xoasp . '"><input type="button" value="Xóa"></a>
                                </td>
                            </tr>';
                        }
                        ?>
          </tbody>
        </table>
      </div>

    </form>
  </div>
</div>