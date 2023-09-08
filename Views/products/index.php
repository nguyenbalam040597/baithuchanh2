<style>
table {
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}

.btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-outline-info {
    color: #17a2b8;
    border-color: #17a2b8;
    background-color: transparent;

}
</style>
<button onclick="window.location.href='index.php?action=create'" class="btn btn-outline-info">Add</button>
<form action="" method="GET" enctype="multipart/form-data">
    <label for="search">Tìm kiếm:</label>
    <input type="text" name="search" id="search" placeholder="Search">

    <input type="submit" value="Tìm kiếm" class=" btn btn-outline-warning">
</form>
<table border=" 1">
    <th>Mã bệnh nhân</th>
    <th>Tên bệnh nhân</th>
    <th>Phòng</th>
    <th>Ngày nhập viện</th>
    <th>Giới tính</th>
    <th>Tình trạng</th>
    <th>Thông tin</th>
    <th>Tùy chọn</th>

    </<tr>

    <!-- Bắt đầu lặp -->
    <?php
    if (isset($_GET['search']))
    {

    
    
        
            ?>
    <tr>
        <td><?php echo $items['ma_benh_nhan'];?> </td>
        <td><?php echo $items['ten_benh_nhan'];?> </td>
        <td><?php echo $items['phong'];?> </td>
        <td><?php echo $items['ngay_nhap_vien'];?> </td>
        <td><?php echo $items['gioi_tinh'];?> </td>
        <td><?php echo $items['tinh_trang'];?> </td>
        <td><?php echo $items['thong_tin'];?> </td>

        <!-- <td><img width="100" src="<?php echo ROOT_URL . $items['image']; ?>" alt=""> </td> -->




        <td>
            <a href=" index.php?action=edit&id=<?php echo $items['id'];?>" class="btn btn-outline-primary">Sua</a> |
            <a href=" index.php?action=show&id=<?php echo $items['id'];?>" class="btn btn-outline-info">Xem</a> |
            <a onclick=" return confirm('Bạn có chắc chắn xóa ?');"
                href="index.php?action=destroy&id=<?php echo $items['id'];?>" class="btn btn-outline-danger">Xoa</a>
        </td>
    </tr>

    <!-- Kết thúc vòng lặp -->
    <?php } else { ?>

    <?php
        
            foreach($items as $r) :
                // echo '<pre>';
                // print_r($r);
                // die();
            ?>
    <tr>
        <td><?php echo $r['ma_benh_nhan'];?> </td>
        <td><?php echo $r['ten_benh_nhan'];?> </td>
        <td><?php echo $r['phong'];?> </td>
        <td><?php echo $r['ngay_nhap_vien'];?> </td>
        <td><?php echo $r['gioi_tinh'];?> </td>
        <td><?php echo $r['tinh_trang'];?> </td>
        <td><?php echo $r['thong_tin'];?> </td>

        <!-- <td><img width="100" src="<?php echo ROOT_URL . $r['image']; ?>" alt=""> </td> -->



        <td>
            <a href=" index.php?action=edit&id=<?php echo $r['ma_benh_nhan'];?>" class="btn btn-success">Sua</a> |
            <a href=" index.php?action=show&id=<?php echo $r['ma_benh_nhan'];?>" class="btn btn-danger">Xem</a> |
            <a onclick=" return confirm('Bạn có chắc chắn xóa ?');"
                href="index.php?action=destroy&id=<?php echo $r['ma_benh_nhan'];?>" class="btn btn-dark">Xoa</a>
        </td>
    </tr>

    <!-- Kết thúc vòng lặp -->
    <?php endforeach; }?>


</table>
<!DOCTYPE html>
<html>

<head>

    <style>
    .pagination {
        display: inline-block;
        padding: 8px;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
        border: 1px solid #4CAF50;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
    </style>
</head>

<body>
    <div class="pagination">
        <?php
        $total_pages = $totalPages; // Tổng số trang
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại

        // In các liên kết đến các trang
        for ($i = 1; $i <= $total_pages; $i++) {
            if (isset($_GET['search']))
            {
                
                echo '<a href="?search='.$_GET['search'].'&page=' . $i . '"';
                if ($i == $current_page) {
                echo ' class="active"';
                }
                echo '>' . $i . '</a>';
            }
            else
            {
                echo '<a href="?page=' . $i . '"';
                if ($i == $current_page) {
                echo ' class="active"';
                }
                echo '>' . $i . '</a>';

            }
        
        }
        ?>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thực hành</title>

    <link rel="stylesheet" href="../estilos/chungestilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<!-- <body>
    <ul>
        <li> <a href="https://www.facebook.com/profile.php?id=100054626933552"><i
                    class="fa-brands fa-facebook-f"></i></a></li>
        <li> <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a></li>
        <li> <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a></li>
        <li> <a href="https://www.tiktok.com/foryou?lang=vi-VN"><i class="fa-brands fa-tiktok"></i></a></li>
        <li> <a href="https://telegram.org/"><i class="fa-brands fa-telegram"></i></a></li>
        <li> <a href="https://web.whatsapp.com/"><i class="fa-brands fa-whatsapp"></i></a></li>
        <li> <a href="https://github.com/nguyenbalam040597"><i class="fa-brands fa-github"></i></a></li>
    </ul>

</body> -->

</html>