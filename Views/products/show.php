<!DOCTYPE html>
<html>

<head>
    <title>Table Example</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .table-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .table-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        font-weight: 700;
    }
    </style>
</head>

<body>
    <div class="table-container">
        <h2 class="table-title">Item Details</h2>

        <table border="1">
            <tr>
                <th>Tên bệnh nhân</th>
                <td><?= $row['ten_benh_nhan'];?></td>
            </tr>
            <tr>
                <th>Phòng</th>
                <td><?= $row['phong'];?></td>
            </tr>
            <tr>
                <th>Ngày nhập viện</th>
                <td><?= $row['ngay_nhap_vien'];?></td>
            </tr>
            <tr>
                <th>Giới tính </th>
                <td><?= $row['gioi_tinh'];?></td>
            </tr>
            <tr>
                <th>Tình trạng</th>
                <td><?= $row['tinh_trang'];?></td>
            </tr>
            <tr>
                <th>Thông tin</th>
                <td><?= $row['thong_tin'];?></td>
            </tr>

        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>