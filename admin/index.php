<?php
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";

include "header.php";

include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "header.php";

if (isset($_GET['act']) && $_GET ["act"] != "") {
    $act = $_GET ['act'];
    switch($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadall_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

            // case 'addsp' :
            //     if(isset($_POST['themmoi']) && $_POST['themmoi']) {
            //         $iddm = $_POST['iddm'];
            //         $tensach = $_POST['tensp'];
            //         $giasach = $_POST['tensp'];
            //         $mota = $_POST['tensp'];
            //         $hinh = $_POST['tensp'];
            //         $target_dir = "../upload/";
            //         $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
            //         if(move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {}
            //         else{

            //         }   
            //         insert_sanpham($tensach, $giasach, $hinh, $mota, $iddm);
            //         $thongbao = "Thêm thành công";               
            //     }
            //     $listdanhmuc = loadall_danhmuc();
            //     include "sanpham/add.php";
            //     break;
            // case 'listsp':
            //     if(isset($_POST['listok']) && $_POST['listok']){
            //         $kyw = $_POST['kyw'];
            //         $iddm = $_POST['iddm'];
            //     }else{
            //         $kyw = '';
            //         $iddm = 0;
            //     }
            //     $listdanhmuc = loadall_danhmuc();
            //     $listsanpham = loadall_sanpham($kyw, $iddm);
            //     include "sanpham/list.php";
            //     break;
        }
}
?>
