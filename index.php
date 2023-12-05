<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooky Market - Trang chủ</title>
    <link rel="icon" type="image/x-icon" href="./uploads/favicon-96x96.png">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/page-container.css">
    <link rel="stylesheet" href="./css/product-detail.css">
</head>

<body>
    <?php
        include 'connect.php';
        $sql = "Select * from product join category on product.cat_id = category.cat_id";
        $stsm = $conn->prepare($sql);
        $stsm->execute();
        $rows = $stsm->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="app">
        <header class="header">
            <div class="navigation-bar">
                <div class="logo">
                    <a href="./index.html">
                        <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695381181/cooky%20market%20-%20PHP/cva2ntghjzrlryixcojp.svg" alt="Logo Cooky">
                    </a>
                </div>
                <div class="search-input">
                    <img class="icon-search" src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695381877/cooky%20market%20-%20PHP/lieirqymxmairjpyhrwj.svg" alt="Magnifying Glass">
                    <input tabindex="0" type="text" placeholder="Tìm kiếm sản phẩm...">
                </div>
                <div class="user">
                    <div class="download-app-button">
                        Tải App Cooky
                    </div>
                    <div class="wishlist action n-btn" title="Danh sách yêu thích">
                        <img class="icon" src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695386250/cooky%20market%20-%20PHP/v9hhpbadxib71owdbfkh.svg" alt="Wishlist">
                    </div>
                    <button class="cart-icon action n-btn" title="Giỏ hàng">
                        <img class="icon" src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695386172/cooky%20market%20-%20PHP/fcmcexgvocebzmhuntfm.svg" alt="Cart">
                    </button>
                    <div class="phone action n-btn">
                        <a href="tel:19002041">
                            <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695386173/cooky%20market%20-%20PHP/u5u581opcqe1nlesw2bn.svg" alt="Hotline" class="icon">
                        </a>
                    </div>
                    <div class="hotline action view-city">
                        <span class="user-name">Hà Nội</span>
                        <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695387068/cooky%20market%20-%20PHP/ww9hqjdjddhfcrgdiokz.svg" alt="toggle" class="icon toggle">
                    </div>
                    <div class="hotline action login">
                        <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695381877/cooky%20market%20-%20PHP/wb5pyhdq2alh6cx8ml82.svg" alt="Login" class="icon">
                        <a class="user-name" href="signin.php">
                            <?php
                            session_start();
                            $username = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : 'Đăng nhập';
                            echo $username;
                            ?>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <main class="page-container">
            <div class="page-wrapper">
                <div class="home-page-container">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="https://image.cooky.vn/abn/s1065x333/600d94ae-f782-43ad-9c7a-e6c60f78ade5.png" alt="Image 1">
                            </div>
                        </div>
                    </div>
                    <div class="short-link-list">
                        <div class="swiper-container swiper-container-pointer-events">
                            <div class="swiper-wrapper">
                                <div class="category-slider">
                                    <?php
                                    foreach($rows as $item){
                                    ?>
                                            <div class="category-item">
                                                <div class="icon">
                                                    <img class="img-fit" src="./uploads/<?php echo $item['hinhanh'];?>" alt="">
                                                </div>
                                                <div class="label text-ellipsis-two-lines"><?php echo $item['tendanhmuc'];?></div>
                                            </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="group-product-content">
                        <div class="title">Ưu Đãi 1K Đến 15K</div>
                        <div class="content-product-container">
                            <div class="promotion-box">
                                
                                    <?php
                                    foreach($rows as $item){
                                        extract($item);
                                    ?>
                                        <div class="product-basic-info">
                                            <a class="link-absolute" title="Nạc Dăm Heo Cooky (Thịt Tươi) Đồng Nai" href="https://www.cooky.vn/market/nac-dam-heo-cooky-thit-tuoi-dong-nai-9595"><a>
                                                <div class="cover-box">
                                                    <div class="promotion-photo">
                                                        <div class="package-default">
                                                            <img src="./uploads/<?php echo $hinhanhsp;?>" alt="" loading="lazy" class="img-fit">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="promotion-name two-lines"><?php echo $tensanpham;?></div>
                                                <div class="d-flex-center-middle">
                                                    <div class="price-action">
                                                        <div class="unti-price"><?php echo $giagoc;?></div>
                                                        <div class="sale-price"><?php echo $giamgia;?></div>
                                                    </div>
                                                    <div class="button-add-to-cart" title="Thêm vào giỏ hàng">
                                                        <div>
                                                            <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695381877/cooky%20market%20-%20PHP/r8rvqbn5onuryh7hstio.svg" alt="Thêm vào giỏ hàng">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="page-container">
                <div class="page-wrapper">
                    <div class="row">
                        <div class="column">
                            <div class="copyright-img">
                                <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1697033902/cooky%20market%20-%20PHP/sri9li0oetshdwb4esa4.jpg" alt="Dong Cong Dinh" width="100px" height="100px">
                            </div>
                            <div class="text-copyright">
                                <h4>CÔNG TY CỔ PHẦN COOKY</h4>
                                <p>Cooky.vn là cửa hàng cung cấp thực phẩm sạch và uy tín</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="footer-title">Về chúng tôi</div>
                            <div class="footer-list">
                                <ul>
                                    <li>Wiki</li>
                                    <li>Giới thiệu</li>
                                    <li>Liên hệ</li>
                                    <li>Quên mật khẩu</li>
                                </ul>
                            </div>
                        </div>
                        <div class="column">
                            <div class="footer-title">Chính sách mua hàng</div>
                            <div class="footer-list">
                                <ul>
                                    <li>Chính sách & Bảo mật</li>
                                    <li>Quy định sử dụng</li>
                                    <li>Giải quyết khiếu nại</li>
                                    <li>Quy chế hoạt động</li>
                                    <li>Quy định đăng tin</li>
                                </ul>
                            </div>
                        </div>
                        <div class="column">
                            <div class="footer-title">Ứng dụng</div>
                            <div class="download">
                                <a href="https://apps.apple.com/us/app/cooky-mealkit-delivery/id1056621751">
                                    <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1697034728/cooky%20market%20-%20PHP/ypt2uelqogfxzfcro8sl.png" alt="Tải ứng dụng" width="100px" height="100px">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>