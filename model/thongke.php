<?php
function load_thongke_sp_danhmuc(){
    $sql = "SELECT dm.id, dm.name, COUNT(*) 'soluong', MIN(price) 'giamin', MAX(price) 'giamax', AVG(price) 'gia_avg' FROM danhmuc dm JOIN  sanpham sp ON dm.id=sp.iddm GROUP BY dm.id, dm.name ORDER BY soluong DESC";
    return pdo_query($sql);
}