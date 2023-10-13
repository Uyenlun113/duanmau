<?php

function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "update sanpham set trangthai = 1 where id=" . $id;
    pdo_execute($sql);
   
}

function list_category_product($kyw="", $iddm)
{
    $sql="select * from sanpham where trangthai = 0 and iddm=".$iddm;
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listCategoryProduct = pdo_query($sql);
    return  $listCategoryProduct;
}

function loadone_sanpham($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $sanpham = pdo_query_one($sql);
    return $sanpham;
}

function update_sanpham($id, $iddm, $tensp, $giasp, $hinh, $mota)
{
    if ($hinh != "") $sql = "update sanpham set iddm='" . $iddm . "', name='" . $tensp . "',price='" . $giasp . "',img='" . $hinh . "',mota='" . $mota . "' where id=" . $id;
    else $sql = "update sanpham set iddm='" . $iddm . "', name='" . $tensp . "',price='" . $giasp . "',mota='" . $mota . "' where id=" . $id;
    pdo_execute($sql);
}















function loadall_sanpham_home()
{
    $sql = "select * from sanpham where trangthai = 0 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return  $listsanpham;
}
function loadall_sanpham_top10()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
/*function loadall_sanpham($keyw="",$iddm=0){
    $sql="select * from sanpham where 1";
    // where 1 tức là nó đúng
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}*/

// 
/*function loadone_sanpham($id){
    $sql = "select * from sanpham where id = $id";
    $result = pdo_query_one($sql);
    return $result;
}*/
function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}