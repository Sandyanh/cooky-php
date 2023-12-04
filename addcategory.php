<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooky</title>
    <link rel="icon" type="image/x-icon" href="./uploads/favicon-96x96.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <?php
        include 'connect.php';
        if(isset($_POST['submit'])){
            $categoryName = $_POST['categoryName'];
            $image = $_FILES['image'];
            $imageName = $image['name'];
            $ngaytao = date('Y-m-d H:i:s');
            $sql ="INSERT INTO `category`(`tendanhmuc`, `hinhanh`, `ngaytao`) VALUES ('$categoryName','$imageName','$ngaytao')";
            $conn->exec($sql);
            move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
        }
    ?>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="text-center">
                    <a class="text-decoration-none" href="#">
                        <span class="font-weight-bold">Trang quản trị</span>
                    </a>
                </h3>
            </div>
            <ul class="list-unstyled components">
                <li class="dropdown">
                    <a href="./category.php">
                        <i class="fa-solid fa-table-list"></i><span>Quản lý danh mục</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="index.php?req=product">
                        <i class="fa-solid fa-cart-shopping"></i><span>Quản lý sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="./index.php">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i><span>Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="p-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Quản lý danh mục</li>
                    <li style="color: #333333;" class="breadcrumb-item" aria-current="page">Thêm mới danh mục</li>
                </ol>
            </nav>
            <a class="text-light text-decoration-none btn btn-primary btn-sm mb-3" href="./category.php">
                <i class="fa-solid fa-list-ul"></i> Danh sách danh mục
            </a>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label style="color: #333333;" for="categoryName">Tên danh mục</label>
                    <input type="text" name="categoryName" id="categoryName" class="form-control form-control-sm">
                    <small class="text-danger"></small>
                </div>
                <div class="form-group d-flex align-items-center">
                    <div>
                        <img class='border rounded' id="preview-image" src='https://res.cloudinary.com/do9rcgv5s/image/upload/v1695895241/cooky%20market%20-%20PHP/itcq4ouly2zgyzxqwmeh.jpg' alt='Không có ảnh' height='115' width='115'>
                        <input class="form-control form-control-sm d-none" type="file" id="image" name="image" onchange="previewImage(this)">
                        <label for="image" class="form-label label-for-file mt-3">
                            <i class="fa-solid fa-file-image"></i>&nbsp;Chọn ảnh
                        </label>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="THÊM MỚI" />
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>