<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooky Market - Đăng ký</title>
    <link rel="icon" type="image/x-icon" href="./uploads/favicon-96x96.png">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/page-container.css">
    <link rel="stylesheet" href="./css/signup.css">
</head>
<body>
<?php
    include 'connect.php';
      if(isset($_POST['submit'])){
        $user = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sql = "INSERT INTO `signup`(`username`, `email`, `password`) VALUES ('$user','$email','$pass')";
        $conn->exec($sql);
        if(empty($user)){
          $errorUser = "Username không được để trống";
        }else{
          if(strlen($_POST['username']) < 7){
            $errorUser = "Username phải lớn hơn 6 ký tự";
          }
        }
        if(empty($email)){
          $errorEmail = "Email không được để trống";
        }else{
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorEmail = "Email không đúng định dạng";
          }
        }
        if(empty($pass)){
          $errorPass = "Password không được để trống";
        }else{
          if(strlen($_POST['password']) < 7){
            $errorPass = "Password phải lớn hơn 6 ký tự";
          }
        }
        header("Location: index.php");
      }
    ?>
    <div class="wrapper">
        <header class="header">
            <div class="navigation-bar">
                <div class="logo">
                    <a href="./index.html">
                        <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695381181/cooky%20market%20-%20PHP/cva2ntghjzrlryixcojp.svg"
                            alt="Logo Cooky">
                    </a>
                </div>
                <div class="search-input">
                    <img class="icon-search"
                        src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695381877/cooky%20market%20-%20PHP/lieirqymxmairjpyhrwj.svg"
                        alt="Magnifying Glass">
                    <input tabindex="0" type="text" placeholder="Tìm kiếm sản phẩm...">
                </div>
                <div class="user">
                    <div class="download-app-button">
                        Tải App Cooky
                    </div>
                    <div class="wishlist action n-btn" title="Danh sách yêu thích">
                        <img class="icon"
                            src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695386250/cooky%20market%20-%20PHP/v9hhpbadxib71owdbfkh.svg"
                            alt="Wishlist">
                    </div>
                    <button class="cart-icon action n-btn" title="Giỏ hàng">
                        <img class="icon"
                            src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695386172/cooky%20market%20-%20PHP/fcmcexgvocebzmhuntfm.svg"
                            alt="Cart">
                    </button>
                    <div class="phone action n-btn">
                        <a href="tel:19002041">
                            <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695386173/cooky%20market%20-%20PHP/u5u581opcqe1nlesw2bn.svg"
                                alt="Hotline" class="icon">
                        </a>
                    </div>
                    <div class="hotline action view-city">
                        <span class="user-name">Hà Nội</span>
                        <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695387068/cooky%20market%20-%20PHP/ww9hqjdjddhfcrgdiokz.svg"
                            alt="toggle" class="icon toggle">
                    </div>
                    <div class="hotline action login">
                        <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1695381877/cooky%20market%20-%20PHP/wb5pyhdq2alh6cx8ml82.svg"
                            alt="Login" class="icon">
                        <a class="user-name" href="">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </header>
        <main class="page-container">
            <div class="page-wrapper">
                <div class="home-page-container">
                    <div class="user-wrapper">
                        <div class="user-nav">
                            <a href="./signin.php">Đăng nhập</a>
                            <a href="./signup.php" class="activeLogin">Đăng ký</a>
                        </div>
                        <form action="" id="formAcount" method="POST">
                            <div class="form-group input-login">
                                <input type="text" placeholder="Họ và tên" name="username">
                            </div>
                            <small class="message-error"><?php echo (isset($errorUser)) ? $errorUser : "";?></small>
                            <div class="form-group input-login">
                                <input type="email" placeholder="Email" name="email">
                            </div>
                            <small class="message-error"><?php echo (isset($errorEmail)) ? $errorEmail : "";?></small>
                            <div class="form-group input-login">
                                <input type="password" id="pwd" placeholder="********" name="password">
                            </div>
                            <small class="message-error"><?php echo (isset($errorPass)) ? $errorPass : "";?></small>
                            <input type="submit" class="btn-login-register" value="Đăng ký" name="submit">
                        </form>
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
                                <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1697033902/cooky%20market%20-%20PHP/sri9li0oetshdwb4esa4.jpg"
                                    alt="Dong Cong Dinh" width="100px" height="100px">
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
                                    <img src="https://res.cloudinary.com/do9rcgv5s/image/upload/v1697034728/cooky%20market%20-%20PHP/ypt2uelqogfxzfcro8sl.png"
                                        alt="Tải ứng dụng" width="100px" height="100px">
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