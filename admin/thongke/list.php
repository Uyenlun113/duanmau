<!-- END HEADER -->
<div class="row2">
  <div class="row2 font_title">
    <h1>THỐNG KÊ SẢN PHẨM TRONG DANH MỤC</h1>
  </div>
  <div class="row2 form_content ">
    <form action="#" method="POST">
      <div class="row2 mb10 formds_loai">
        <table class="table align-middle mb-0 bg-white table-bordered">
          <thead class="table-dark">
            <tr class="rounded p-2">
              <th>MÃ LOẠI</th>
              <th>TÊN LOẠI</th>
              <th>SỐ LƯỢNG</th>
              <th>GIÁ NHỎ NHẤT</th>
              <th>GIÁ LỚN NHÁT</th>
              <th>GIÁ TRUNG BÌNH</th>
            </tr>
          </thead>
          <?php 
                    foreach($dsthongke as $thongke){
                        extract($thongke);
                    
                    ?>
          <tr>
            <td><?php echo $id ?></td>
            <td><?php echo $name ?></td>
            <td><?php echo $soluong ?></td>
            <td><?php echo $giamin ?></td>
            <td><?php echo $giamax ?></td>
            <td><?php echo number_format($gia_avg,2) ?></td>
          </tr>
          <?php 
                        } 
                    ?>

        </table>
      </div>
      <div class=" mb10 ">
        <a href="?act=bieudo"> <input class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
      </div>
    </form>
  </div>
</div>




</div>

</body>

</html>