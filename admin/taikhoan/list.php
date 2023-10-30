<div class="row2">
  <div class="row2 font_title">
    <h1>DANH SÁCH TÀI KHOẢN</h1>
  </div>

  <div class="mb10 ">
    <input class="mr20" type="button" value="CHỌN TẤT CẢ">
    <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
  </div>

  <div class="row2 form_content ">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table class="table align-middle mb-0 bg-white table-bordered">
          <thead class="table-dark">
            <tr class="rounded p-2">
              <th></th>
              <th>MÃ TÀI KHOẢN</th>
              <th>TÊN ĐĂNG NHẬP</th>
              <th>MẬT KHẨU</th>
              <th>EMAIL</th>
              <th>ĐỊA CHỈ</th>
              <th>ĐIỆN THOẠI</th>
              <th>VAI TRÒ</th>
              <th>CHỨC NĂNG</th>
            </tr>
          </thead>

          <?php
                    foreach ($listtaikhoan as $taikhoan) {
                        extract($taikhoan);
                        $suatk="index.php?act=suatk&id=".$id;
                        $xoatk="index.php?act=xoatk&id=".$id;
                        echo '<tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>' . $taikhoan['id'] . '</td>
                                <td>' . $taikhoan['user'] . '</td>
                                <td>' . $taikhoan['pass'] . '</td>
                                <td>' . $taikhoan['email'] . '</td>
                                <td>' . $taikhoan['address'] . '</td>
                                <td>' . $taikhoan['tel'] . '</td>
                                <td>' . ($taikhoan['role'] == 0 ? 'Admin' : 'Khách hàng') . '</td>
                                <td><a href="'.$suatk.'"><input type="button" value="Sửa"></a> <a href="'.$xoatk.'"><input type="button" value="Xóa"></a></td>
                            </tr>';
                    }
                    ?>

        </table>
      </div>

    </form>
  </div>
</div>




</div>