<!DOCTYPE html>
<html>

<head>
    <title>Form Example</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
    }

    .form-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
        border: none;
        border-radius: 4px;
        color: #fff;
        background-color: #007bff;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #0069d9;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Add Item</h2>

        <form action="index.php?action=store" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="ten_benh_nhan" class="form-label">Tên bệnh nhân:</label>
                <input type="text" name="ten_benh_nhan" id="ten_benh_nhan" class="form-control">
            </div>

            <div class="form-group">
                <label for="phong" class="form-label">Phòng:</label>
                <input type="number" name="phong" id="phong" class="form-control">
            </div>

            <div class="form-group">
                <label for="ngay_nhap_vien" class="form-label">Ngày nhập viện:</label>
                <input type="date" name="ngay_nhap_vien" id="ngay_nhap_vien" class="form-control">
            </div>

            <div class="form-group">
                <label for="gioi_tinh" class="form-label">Giới tính:</label>
                <select name="gioi_tinh" id="gioi_tinh" class="form-control">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tinh_trang" class="form-label">Tình trạng:</label>
                <select name="tinh_trang" id="tinh_trang" class="form-control">
                    <option value="Nhẹ">Nhẹ</option>
                    <option value="Bình thường">Bình thường</option>
                    <option value="Nguy hiểm">Nguy hiểm</option>

                </select>
            </div>
            <div class="form-group">
                <label for="thong_tin" class="form-label">Thông tin:</label>
                <input type="text" name="thong_tin" id="thong_tin" class="form-control">
            </div>


            <input type="submit" value="Add" class="btn btn-primary">
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>