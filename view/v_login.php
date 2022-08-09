<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="icon"
      href="//bizweb.dktcdn.net/100/180/515/themes/683553/assets/favicon.png?1624423469475"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script
      src="https://kit.fontawesome.com/497e58feb8.js"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <link rel="stylesheet" href="./content/css/reset.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link rel="stylesheet" href="content/css/app.css" />
    <link rel="stylesheet" href="content/css/header.css" />
    <link rel="stylesheet" href="content/css/footer.css" />
    <link rel="stylesheet" href="content/css/main.css" />
    <link rel="stylesheet" href="content/css/login.css" />
    <link rel="stylesheet" href="content/css/product.css" />
    <link rel="stylesheet" href="content/css/details.css" />
    <link rel="stylesheet" href="content/css/comment.css" />
    <link rel="stylesheet" href="content/css/cart.css" />
    <link rel="stylesheet" href="content/css/check-out.css" />
    <title>Cửa hàng bóng chuyển HPstore</title>
  </head>
  <body>

    <header class="header">
      <div class="header-top">
        <div class="header-top-logo">
          <a href="index.php"><img src="./content/images/home/logo.png" /></a>
        </div>
        <div class="header-top-search">
          <!-- <div class="header-inputSearch"> -->
          <form action="index.php?act=hanghoa" method="post">
            <input type="text" placeholder="Bạn cần tìm gì hôm nay ?" name="kyw" />
            <button type="submit" name="timkiem">
              <i class="fas fa-search"></i>
            </button>
          </form>
          <!-- </div> -->
        </div>
        <div class="header-top-phone">
          <!-- <ion-icon name="phone-portrait-outline"></ion-icon> -->
          <div class="phone-icon">
            <i class="fas fa-mobile-alt"></i>
          </div>
          <div class="phone-number">0866100339
           </div>
        </div>
        <div class="header-top-account">
          <div class="account-hover">
            <?php
            
            if(isset($_SESSION['user'])){
              extract($_SESSION['user'][0]);
            ?>
              <ul>

                <li><a href=".?controller=manage_acc">Quản lý tài khoản</a></li>
                <li><a href=".?controller=change_pass">Đổi mật khẩu</a></li>
                <li><a href="index.php?controller=logout">Đăng xuất</a></li>
                <?php if($vai_tro == 1) echo '<li><a href="./admin/index.php">Quản trị website</a></li>';?>
              </ul>
            <?php } else { ?>
            
              <ul>
                <li><a href=".?controller=login">Đăng nhập</a></li>
                <li><a href=".?controller=singup">Đăng ký</a></li>
                <li>
                  <a href=".?controller=forget_pass">Quên mật khẩu</a>
                </li>
              </ul>

            <?php } ?>
            
          </div>
         

          <div class="account-icon"><i class="fas fa-user"></i></div>
          <div class="account-content">
              <?php

                if(isset($_SESSION['user'])){
                  extract($_SESSION['user'][0]);
                  echo '<h4 class="account-title">'.$ten_dangnhap.'</h4>
                  <p class="account-hello">Xin chào</p>';
                }else{
                  echo '<h4 class="account-title">Tài khoản</h4>
                  <p class="account-hello">Xin chào</p>';
                }
              ?>

          </div>
      
        </div>
        <div class="header-top-cart">
          <div class="cart-icon">
            <a href=".?controller=viewcart" style="color: white"
              ><i class="fas fa-shopping-bag"></i
            ></a>
          </div>
          <?php 
              $tong_cart = 0;
              if(isset($_SESSION['cart']) && ($_SESSION['cart'] != [])) {
                foreach ($_SESSION['cart'] as $cart) {
                  $tong_cart+= $cart[5];
                }
              }
          ?>
          <div class="cart-count"><?=$tong_cart?></div>
        </div>
      </div>
    </header>

    <div class="main-navagation">
      <nav class="navigation-horizontal width-normal">
        <ul>

        <?php $categories = CategoryDB::get_categories(); ?>

        <?php foreach($categories as $key=>$value): ?>
            <li>
                <a href=".?controller=catepro&&iddm=<?php echo $value -> ma_danhmuc ?>"><?php echo $value -> ten_danhmuc ?><span></span><span></span><span></span><span></span></a>
            </li>
        <?php endforeach ?>

          <li>
            <a href="#"
              >Blog bóng chuyền <span></span><span></span><span></span
              ><span></span
            ></a>
          </li>
          <li>
            <a href="#"
              >Tin tức - sự kiện <span></span><span></span><span></span
              ><span></span
            ></a>
          </li>
          <li>
            <a href="#"
              >Đánh giá sản phẩm <span></span><span></span><span></span
              ><span></span
            ></a>
          </li>
          <li>
            <a href="#"
              >Flash Sale 2020 <span> </span><span></span><span></span
              ><span></span
            ></a>
          </li>
        </ul>
      </nav>
    </div>
	<!-- ---MAIN--- -->

    <div class="bottom-nav">
      <div class="bottom-nav--title width-normal">
        <a href="index.php">Trang chủ</a>
        <i class="fas fa-chevron-right"></i>
        <span class="blue">Đăng nhập tài khoản</span>
      </div>
    </div>

    <section class="section-row width-normal">
      <div class="login-block">
        <div class="login-title">Đăng nhập tài khoản</div>
        <div class="login-title--else">
          Nếu bạn đã có tài khoản, đăng nhập tại đây
        </div>
        <form action="" method="post" class="login-form" enctype="multipart/form-data">
          <label for="user">Tên đăng nhập<span class="red">*</span></label>
          <input type="text" id="user" name="user" value="<?php if(isset($user)) echo $user ?>" placeholder="Tên đăng nhập" />
          <label for="pass">Mật khẩu<span class="red">*</span></label>
          <input type="password" id="pass" name="pass" placeholder="Mật khẩu" />
          <button class="btn-submit" type="submit" name="controller" value="login" >Đăng nhập</button>
        </form>
        <?php
              if(isset($thongbao) && ($thongbao != "")) {
                echo '<div class="thongbaos"><i class="fas fa-bell"></i> '.$thongbao.'</div>';
              }
        ?>
        <div class="login-register">
          Bạn chưa có tài khoản. Đăng ký <a href=".?controller=register">tại đây</a>.
        </div>
        <a href=".?controller=forgetPass" class="login-forget">Quên mật khẩu?</a>
      </div>
    </section>

	<!-- ----------- -->
	<footer>
      <div class="footer">
        <div class="footer-about footer-row">
          <div class="footer-title">Về chúng tôi</div>
          <ul>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="#">Liên hệ</a></li>
          </ul>
        </div>
        <div class="footer-category footer-row">
          <div class="footer-title">Danh mục</div>
          <ul>
            <li><a href="#">giày bóng chuyền</a></li>
            <li><a href="#">đồng phục bóng chuyền</a></li>
            <li><a href="#">phụ kiện bóng chuyền</a></li>
            <li><a href="#">lưu niệm bóng chuyền</a></li>
            <li><a href="#">blog bóng chuyền</a></li>
            <li><a href="#">tin tức - sự kiện</a></li>
            <li><a href="#">đánh giá sản phẩm</a></li>
            <li><a href="#">flash sale 2022</a></li>
          </ul>
        </div>
        <div class="footer-support footer-row">
          <div class="footer-title">Hỗ trợ khách hàng</div>
          <ul>
            <li><a href="#">Hướng dẫn mua hàng</a></li>
            <li><a href="#">Hướng dẫn chọn size</a></li>
            <li><a href="#">Bảo hành - đổi trả</a></li>
            <li><a href="#">Phản hồi - góp ý</a></li>
          </ul>
        </div>
        <div class="footer-advise footer-row">
          <div class="footer-title">Tư vấn - hỗ trợ</div>
          <div class="advise-holine">
            <div class="hotline-content">
              <p class="hotline-title">Hotline 1</p>
              <p class="hotline-phone">0866100339</p>
            </div>
            <div class="hotline-content">
              <p class="hotline-title">Hotline 2</p>
              <p class="hotline-phone">0866100339</p>
            </div>
          </div>
          <div class="transport-connect">
            <div class="transport">
              <div class="transport-connect-title">Đối tác vận chuyển</div>
              <div class="transport-img">
                <img src="./content/images/footer/payment_1.png" />
                <img src="./content/images/footer/payment_2.png" />
                <img src="./content/images/footer/payment_3.png" />
              </div>
            </div>
            <div class="connect">
              <div class="transport-connect-title">Kết nối với chúng tôi</div>
              <div class="connect-icon">
                <img src="./content/images/footer/icon-fb.jpg" />
                <div class="connect-content">Facebook</div>
              </div>
              <div class="connect-icon">
                <img src="./content/images/footer/icon-twitter.jpg" />
                <div class="connect-content">Twiiter</div>
              </div>
              <div class="connect-icon">
                <img src="./content/images/footer/icon-google-plus.jpg" />
                <div class="connect-content">Gooole+</div>
              </div>
              <div class="connect-icon">
                <img src="./content/images/footer/icon-youtube.jpg" />
                <div class="connect-content">Youtube</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div class="fixed-fb"></div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <!-- <i class="fas fa-arrow-up"></i> -->
    </button>
    <script
      data-require="jquery@3.1.1"
      data-semver="3.1.1"
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"
    ></script>
    <script src="./content/js/stylling.js"></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-1.11.0.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script src="./content/js/Slider.js"></script>
    <script src="./content/js/app.js"></script>
  </body>
</html>