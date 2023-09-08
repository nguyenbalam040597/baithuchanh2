<?php
// Ket noi voi database
class Product
{
    // lay ta ca du lieu
    public static function all($page = 1, $limit = 10)
    {
        global $conn;
        $start = ($page - 1) * $limit;

        // Tạo câu truy vấn SQL với LIMIT và OFFSET để phân trang
        $sql = "SELECT * FROM `products` LIMIT $limit OFFSET $start";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $stmt->fetchAll();

        // Đếm tổng số bản ghi
        $countSql = "SELECT COUNT(*) as total FROM `products`";
        $countStmt = $conn->query($countSql);
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        $totalRecords = $countResult['total'];

        // Tính toán số trang và trang hiện tại
        $totalPages = ceil($totalRecords / $limit);

        // Trả về một mảng chứa kết quả tất cả các bản ghi và thông tin phân trang
        return [
            'rows' => $rows, // Tất cả các bản ghi
            'totalPages' => $totalPages, // Tổng số trang
            'currentPage' => $page // Trang hiện tại
        ];
    }


    // lay chi tiet 1 du lieu
    public static function find($id)
    {
        global $conn;
        $sql = "SELECT * FROM `products` WHERE ma_benh_nhan = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
    }

    // Them moi du lieu
    public static function store($data)
    {
        global $conn;
    
        $Tenbenhnhan = $data['ten_benh_nhan'];
        $Phong = $data['phong'];
        $Ngaynhapvien = $data['ngay_nhap_vien'];
        $Gioitinh = $data['gioi_tinh'];
        $Tinhtrang = $data['tinh_trang'];
        $Thongtin = $data['thong_tin'];


        // if (isset($_FILES['image'])) {
        //     if (!$_FILES['image']['error']) {
        //         move_uploaded_file($_FILES['image']['tmp_name'], ROOT_DIR . '/public/uploads/' . $_FILES['image']['name']);
        //         $Image = '/public/uploads/' . $_FILES['image']['name'];
        //     }
        // }

        $sql = "INSERT INTO `products` 
            (`ten_benh_nhan`, `phong`, `ngay_nhap_vien`, `gioi_tinh`, `tinh_trang`,`thong_tin`) 
            VALUES 
            ('$Tenbenhnhan', '$Phong','$Ngaynhapvien', '$Gioitinh', '$Tinhtrang', '$Thongtin')";
        //Thuc hien truy van
        $conn->exec($sql);
        return true;
    }

    // Cap nhat du lieu
    public static function update($id, $data, $conn)
{
    $Tenbenhnhan = $data['ten_benh_nhan'];
    $Phong = $data['phong'];
    $Ngaynhapvien = $data['ngay_nhap_vien'];
    $Gioitinh = $data['gioi_tinh'];
    $Tinhtrang = $data['tinh_trang'];
    $Thongtin = $data['thong_tin'];
        
    $sql = "UPDATE `products` SET `ten_benh_nhan` = '$Tenbenhnhan', `phong` = '$Phong', `ngay_nhap_vien` = '$Ngaynhapvien', `gioi_tinh` = '$Gioitinh', `tinh_trang` = '$Tinhtrang', `thong_tin` = '$Thongtin' WHERE `ma_benh_nhan` = $id";
    
    // Thực hiện truy vấn
    $conn->exec($sql);
    return true;
}
    //Xoa du lieu
    public static function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM products WHERE `ma_benh_nhan` = $id";
        // Thuc thi SQL
        $conn->exec($sql);
        return true;
    }

    // xem du lieu
    public static function show($id)
    {
        global $conn;
        $sql = "SELECT * FROM `products` WHERE `ma_benh_nhan` = $id";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch();
        return $row;
        // thuc thi sql
        $conn->exec($sql);
        return true;
    }
    // tim kiêm
    // public static function search($name)
    // {
    //     global $conn;
    //     $sql = "SELECT * FROM `users` WHERE name like '%$name%'";
    //     $stmt = $conn->query($sql);
    //     $stmt->setFetchMode(PDO::FETCH_ASSOC);
    //     $row = $stmt->fetch();
    //     return $row;
    //     // thuc thi sql
    //     $conn->exec($sql);
    //     return true;
    // }
    // public static function search($name)
    // {
    //     global $conn;
    //     $sql = "SELECT * FROM `users` WHERE name LIKE :name";
    //     $stmt = $conn->prepare($sql);
    //     $stmt->bindValue(':name', '%' . $name . '%');
    //     $stmt->execute();
    //     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $rows;
    // }
    public static function search1($name, $page = 1, $limit = 10){
        global $conn;
        $start = ($page - 1) * $limit;

        // Tạo câu truy vấn SQL với LIMIT và OFFSET để phân trang
        $sql = "SELECT * FROM `products` WHERE name like '%$name%' LIMIT $limit OFFSET $start";
        $stmt = $conn->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows  = $stmt->fetch();

        // Đếm tổng số bản ghi
        $countSql = "SELECT COUNT(*) as total FROM `products` WHERE name like '%$name%'";
        $countStmt = $conn->query($countSql);
        $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);
        $totalRecords = $countResult['total'];

        // Tính toán số trang và trang hiện tại
        $totalPages = ceil($totalRecords / $limit);

        // Trả về một mảng chứa kết quả tìm kiếm và thông tin phân trang
        return [
            'rows' => $rows, // Kết quả tìm kiếm
            'totalPages' => $totalPages, // Tổng số trang
            'currentPage' => $page // Trang hiện tại
        ];
    }
}