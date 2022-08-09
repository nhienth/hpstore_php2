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
    <link rel="stylesheet" href="./content/css/reset.css">
    <link rel="stylesheet" href="./content/css/app.css">
    <link rel="stylesheet" href="./content/css/main.css">
    <link rel="stylesheet" href="./content/css/admin.css">
    <link rel="stylesheet" href="./content/css/admin-form.css">
    <title>HPstore - Quản trị website</title>
  </head>
  <body>
    <div class="container">
      <div class="admin-layout">
        <div class="layout-left">
          <div class="left-logo">
            <img src="./content/images/home/logo.png" alt="">
          </div>
          <div class="left-emelent">
            <div class="left-element--content">
              <a href=".?controller=c_1&&action=default" class="none-after"><i class="fas fa-tv"></i> Trang chủ admin</a>
            </div>
          </div>
          <div class="left-emelent">
            <div class="left-element--title">Quản lý tài khoản</div>
            <div class="left-element--content">
              <!-- <div class="more-function">
                <a href=".?controller=c_1&&action=add_user">Thêm tài khoản</a>
                <a href=".?controller=c_1&&action=show_user">Danh sách</a>
              </div> -->
              <a href=".?controller=c_1&&action=show_user"><i class="fas fa-user"></i> Tài khoản</a>
            </div>
          </div>
          <div class="left-emelent">
            <div class="left-element--title">Quản lý danh mục</div>
            <div class="left-element--content">
              <div class="more-function">
                <a href=".?controller=c_1&&action=add_cate">Thêm danh mục</a>
                <a href=".?controller=c_1&&action=show_cate">Danh sách</a>
              </div>
              <a href=".?controller=c_1&&action=show_cate"><i class="fas fa-copyright"></i> Danh mục</a>
            </div>
          </div>
          <div class="left-emelent">
            <div class="left-element--title">Quản lý sản phẩm</div>
            <div class="left-element--content">
              <div class="more-function">
                <a href=".?controller=c_1&&action=add_pro">Thêm sản phẩm</a>
                <a href=".?controller=c_1&&action=show_product">Danh sách</a>
                <a href=".?controller=c_1&&action=show_model">Kho hàng</a>
              </div>
              <a href=".?controller=c_1&&action=show_product"><i class="fas fa-volleyball-ball"></i> Sản phẩm</a>
            </div>
          </div>
          
          
          
          
        </div>
        