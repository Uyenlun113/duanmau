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

function list_category_product( $iddm)
{
    $sql="select * from sanpham where trangthai = 0 and iddm=".$iddm;
    $sql .= " order by id desc";
    $listCategoryProduct = pdo_query($sql);
    return  $listCategoryProduct;
}

//Danh sách sản phẩm
function list_product($valueSearch, $iddm)
{
    if($iddm==0){
        $sql = "SELECT * FROM sanpham WHERE trangthai = 0 AND name LIKE '%" . $valueSearch . "%'";
        $sanpham = pdo_query($sql);
        return $sanpham;
    }
    else{
$sql = "SELECT * FROM sanpham WHERE trangthai = 0 AND name LIKE '%" . $valueSearch . "%' AND iddm = " . $iddm;
        $sanpham = pdo_query($sql);
        return $sanpham;
    }
   
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
    $sql = "select * from sanpham where trangthai = 0  order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}