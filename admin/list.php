<div class="row2">
  <div class="row2 font_title">
    <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
  </div>
  <div class="row2 form_content ">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table class="table align-middle mb-0 bg-white table-bordered">
          <thead class="table-dark">
            <tr class="rounded p-2">
              <th></th>
              <th>MÃ LOẠI</th>
              <th>TÊN LOẠI</th>
              <th>CHỨC NĂNG</th>
            </tr>
          </thead>

          <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm="index.php?act=suadm&id=".$id;
                        $xoadm="index.php?act=xoadm&id=".$id;
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $danhmuc['id'] . '</td>
                                <td>' . $danhmuc['name'] . '</td>
                                <td><a href="'.$suadm.'"><input type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input type="button" value="Xóa"></a></td>
                            </tr>';
                    }
                    ?>

        </table>
      </div>
      <div class=" mb10 ">
        <input class="mr20" type="button" value="CHỌN TẤT CẢ">
        <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
        <a href="index.php?act=adddm"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
      </div>
    </form>
  </div>
</div>




</div>