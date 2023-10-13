<?php 
    function loadall_binhluan($idsp){
        $sql = "
            SELECT binhluan.id, binhluan.noidung, taikhoan.user, binhluan.ngaybinhluan FROM `binhluan` 
            LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
            LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
            WHERE sanpham.id = $idsp;
        ";
        $result =  pdo_query($sql);
        return $result;
    }
    function loadal_binhluan($idpro){
        $sql = "select * from binhluan where 1";
        if($idpro>0) $sql.=" AND idpro=.'".$idpro."'";
        $sql.=" order by id desc";
        $listbinhluan=pdo_query($sql);
        return $listbinhluan;
    }
    function insert_binhluan($idpro,$idUser,$noidung){
        $date = date('Y-m-d');
        $sql = "
            INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
            VALUES ('$noidung',$idUser,'$idpro','$date');
        ";
        pdo_execute($sql);
    }
    function delete_binhluan($id) {
        $sql="delete from binhluan where id=".$id;
        pdo_execute($sql);
    }
?>