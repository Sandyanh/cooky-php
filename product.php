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
        $sql = "Select * from product join category on product.cat_id = category.cat_id";
        $stsm = $conn->prepare($sql);
        $stsm->execute();
        $rows = $stsm->fetchAll(PDO::FETCH_ASSOC);
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
                    <a href="./product.php">
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
                    <li class="breadcrumb-item"><a href="./index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
                </ol>
            </nav>
            <div class="d-flex align-items-center mb-2">
                <a class="text-light text-decoration-none btn btn-primary btn-sm mr-2" href="./addproduct.php">
                    <i class="fa-solid fa-plus"></i> Thêm mới sản phẩm
                </a>
            </div>
           
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th class="font-weight-bold w-20px" scope="col">#</th>
                            <th class="font-weight-bold" scope="col">ID</th>
                            <th class="font-weight-bold" scope="col">Tên món ăn</th>
                            <th class="font-weight-bold" scope="col">Hình ảnh</th>
                            <th class="font-weight-bold" scope="col">Giá gốc</th>
                            <th class="font-weight-bold" scope="col">Giảm giá (%)</th>
                            <th class="font-weight-bold" scope="col">Trọng lượng (g)</th>
                            <th class="font-weight-bold" scope="col">Ngày tạo</th>
                            <th class="font-weight-bold" scope="col">Ngày cập nhật</th>
                            <th class="font-weight-bold" scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($rows as $item){
                    ?>
                            <tr class="text-center">
                                <td scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>
                                </td>
                                <td><?php echo $item['product_id'];?></td>
                                <td class="text-primary"><?php echo $item['tensanpham'];?></td>
                                <td><img class="border rounded" src="./uploads/<?php echo $item['hinhanhsp'];?>" alt="" width="100" height="100"></td>
                                <td><?php echo $item['giagoc'];?></td>
                                <td><?php echo $item['giamgia'];?></td>
                                <td><?php echo $item['trongluong'];?></td>
                                <td><?php echo $item['ngaytao'];?></td>
                                <td><?php echo $item['ngaycapnhat'];?></td>
                                <td>
                                    <a href="deleteproduct.php?id=<?php echo $item['product_id'];?>" title="Xóa" class="btn btn-outline-danger btn-sm border border-0 delete-category-button" data-category-id=""><i class="fa-regular fa-trash-can"></i></a>
                                    <a href="editproduct.php?id=<?php echo $item['product_id'];?>" title="Sửa" class="btn btn-outline-info btn-sm border border-0"><i class="fa-regular fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
