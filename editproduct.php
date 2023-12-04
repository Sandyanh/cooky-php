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
        $id = $_GET['id'];
        $sql = "SELECT * FROM `product` WHERE product_id = $id";
        $stsm = $conn ->prepare($sql);
        $stsm->execute();
        $rows = $stsm->fetch(PDO::FETCH_ASSOC);
        if(isset($_POST['submit'])){
            $productName = $_POST['productName'];
            $cat_id = $_POST['cat_id'];
            $image = $_FILES['image'];
            $imageName = $image['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $weight = $_POST['weight'];
            $ngaytao = date('Y-m-d H:i:s');
            if(empty($imageName)){
                $sql = "UPDATE `product` SET `tensanpham`='$productName',`giagoc`='$price',`giamgia`='$discount',`trongluong`='$weight',`ngaytao`='$ngaytao',`cat_id`='$cat_id' WHERE product_id = $id";
            }else{
                $sql = "UPDATE `product` SET `tensanpham`='$productName',`hinhanhsp`='$imageName',`giagoc`='$price',`giamgia`='$discount',`trongluong`='$weight',`ngaytao`='$ngaytao',`cat_id`='$cat_id' WHERE product_id = $id";
            }
            $conn->exec($sql);
            move_uploaded_file($image['tmp_name'],'uploads/'.$imageName);
            header("Location: product.php");
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
                    <li class="breadcrumb-item active" aria-current="page">Quản lý sản phẩm</li>
                    <li class="breadcrumb-item" style="color: #333333;" aria-current="page">Thêm mới sản phẩm</li>
                </ol>
            </nav>
            <a class="text-light text-decoration-none btn btn-primary btn-sm mb-3" href="./product.php">
                <i class="fa-solid fa-list-ul"></i> Danh sách sản phẩm
            </a>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col">
                        <label for="productName" style="color: #333333;">Tên sản phẩm</label>
                        <input type="text" name="productName" id="productName" class="form-control form-control-sm" value="<?php echo $rows['tensanpham'];?>">
                        <small class="text-danger"></small>
                    </div>
                    <div class="form-group col">
                        <label for="productName" style="color: #333333;">Danh mục</label>
                        <select name="cat_id" class="form-control form-control-sm">
                        <?php
                            $sql = "SELECT * FROM `category`";
                            $stsm = $conn->prepare($sql);
                            $stsm->execute();
                            $rows = $stsm->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $item){
                                extract($item);
                                echo '<option value="' . $id . '" ' . ($cat_id == $id ? 'selected' : '') . '>' . $item['tendanhmuc'] . '</option>';
                        ?>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label style="color: #333333;" for="price">Giá gốc</label>
                        <input type="number" name="price" id="price" class="form-control form-control-sm" value="<?php echo $rows['giagoc'];?>">
                        <small class="text-danger"></small>
                    </div>
                    <div class="form-group col">
                        <label style="color: #333333;" for="discount">Giảm giá</label>
                        <input type="number" name="discount" id="discount" class="form-control form-control-sm" value="<?php echo $rows['giamgia'];?>">
                        <small class="text-danger"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label style="color: #333333;" for="weight">Trọng lượng (g)</label>
                    <input type="number" name="weight" id="weight" class="form-control form-control-sm" value="<?php echo $rows['trongluong'];?>">
                    <small class="text-danger"></small>
                </div>
                <div class="form-group d-flex align-items-center">
                    <div>
                        <img src="./uploads/<?php echo $rows['hinhanhsp'];?>" alt="" width="100" height="100">
                        <input class="form-control form-control-sm d-none" type="file" id="image" name="image" onchange="previewImage(this)">
                        <label for="image" class="form-label label-for-file mt-3">
                            <i class="fa-solid fa-file-image"></i>&nbsp;Chọn ảnh
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="CẬP NHẬT" />
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
