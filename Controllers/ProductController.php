<?php
require_once 'Models/Product.php';
class ProductController {
    // Hien thi danh sach records => table
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 1; // Số bản ghi hiển thị trên mỗi trang
    
            $searchResult = Product::search1($search, $page, $limit);
            $items = $searchResult['rows'];
            $totalPages = $searchResult['totalPages'];
            $currentPage = $searchResult['currentPage'];
        } else {
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5; // Số bản ghi hiển thị trên mỗi trang
    
            $allResult = Product::all($page, $limit);
            $items = $allResult['rows'];
            $totalPages = $allResult['totalPages'];
            $currentPage = $allResult['currentPage'];
        }
    
        // Truyền dữ liệu xuống view
        require_once 'Views/products/index.php';
    }
    // Hien thi form them moi
    public function create(){
        require_once 'Views/products/create.php';
    }
    // Xu ly them moi
    public function store(){
        // Goi model
        Product::store($_POST);
        // Chuyen huong ve trang danh sach
        echo '<script>window.location.href = "index.php?controllers=product&action=index&success=1";</script>';

    }
    // Hien thi form chinh sua
    public function edit(){
        $id = $_GET['id'];
        $row = Product::find($id);
        // Truyen xuong view
        require_once 'Views/products/edit.php';
    }
    // Xu ly chinh sua
    public function update() {
        $id = $_POST['id'];
        $data = $_POST;
        Product::update($id, $data);
        // Chuyển hướng về trang danh sách
        header("Location: index.php?controller=product&action=index");
    }

    // Xoa
    public function destroy(){
        $id = $_GET['id'];
        Product::delete($id);
        // Chuyen huong ve trang danh sach
        echo '<script>window.location.href = "index.php?controllers=product&action=index&success=1";</script>';
    }
    // Xem chi tiet
    public function show(){
        $id = $_GET['id'];
        $row = Product::find($id);

        // Truyen xuong view
        require_once 'views/products/show.php';
    }
    public function search(){
        $search = $_GET['search'];
        $items = Product::search1($search);
        // Truyen xuong view
        require_once 'Views/products/index.php';
    }

    
}