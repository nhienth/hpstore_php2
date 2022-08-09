<?php

// $countPro = countAll_hanghoa();
// $countCate = countAll_danhmuc();
// $countAcc = countAll_khachhang();
// $coungNew = countAll_tintuc();
// $countCMT = countAll_binhluan();
// $countBill = countAll_hoadon();

$countPro = 12;
$countCate = 12;
$countAcc = 12;
$coungNew = 12;
$countCMT = 12;
$countBill = 12;

?>

<div class="layout-right">
          <div class="right-top">
            <div class="website-title">Trang quản trị websitie</div>
            <div class="admin-info">
              <?php 
                  // if(isset($_SESSION['user'])) {
                  //   $hinh = $_SESSION['user']['hinh'];
                  //   echo '
                  //   <div class="admin-name">'.$_SESSION['user']['ten_dangnhap'].'</div>
                  //   <div class="admin-img"><img src="../uploads/'.$hinh.'"></div>
                  //   ';
                  // }
              ?>
            </div>
          </div>
          <div class="right-bgc">
            <div class="right-main">
              <div class="right-main--boxed">
                <div class="main-boxed--content">
                  <div class="boxed-content--txt">Tài khoản</div>
                  <div class="boxed-content--count"><?=$countAcc?></div>
                </div>
                <div class="main-boxed--icon">
                  <i class="fas fa-user-circle"></i>
                </div>
              </div>

              <div class="right-main--boxed">
                <div class="main-boxed--content">
                  <div class="boxed-content--txt">Danh mục</div>
                  <div class="boxed-content--count"><?=$countCate?></div>
                </div>
                <div class="main-boxed--icon">
                  <i class="fas fa-copyright"></i>
                </div>
              </div>

              <div class="right-main--boxed">
                <div class="main-boxed--content">
                  <div class="boxed-content--txt">Sản phẩm</div>
                  <div class="boxed-content--count"><?=$countPro?></div>
                </div>
                <div class="main-boxed--icon">
                  <i class="fas fa-volleyball-ball"></i>
                </div>
              </div>

              <div class="right-main--boxed">
                <div class="main-boxed--content">
                  <div class="boxed-content--txt">Đơn hàng</div>
                  <div class="boxed-content--count"><?=$countBill?></div>
                </div>
                <div class="main-boxed--icon">
                  <i class="fas fa-people-carry"></i>
                </div>
              </div>

              <div class="right-main--boxed">
                <div class="main-boxed--content">
                  <div class="boxed-content--txt">Tin tức</div>
                  <div class="boxed-content--count"><?=$coungNew?></div>
                </div>
                <div class="main-boxed--icon">
                  <i class="fas fa-newspaper"></i>
                </div>
              </div>

              <div class="right-main--boxed">
                <div class="main-boxed--content">
                  <div class="boxed-content--txt">Bình luận</div>
                  <div class="boxed-content--count"><?=$countCMT?></div>
                </div>
                <div class="main-boxed--icon">
                  <i class="fas fa-comment-alt"></i>
                </div>
              </div>
            </div>

            <?php 
            
            if(isset($newbill) && ($newbill > 0)) {
              echo '
              <div class="noti-bill">
                <i class="fas fa-bell"></i> Bạn có '.$newbill.' đơn hàng mới cần xử lý
              </div>
              ';
            }

            if(isset($check_kho)) {
                foreach ($check_kho as $pro) {
                  extract($pro);
                  $ten_hanghoa = loadTen_hanghoa($ma_hanghoa);
                  $edit_a = "index.php?act=edit-SL&&id=".$ma_model;
                  echo '
                  <div class="noti-bill" style="margin-top:30px">
                    <i class="fas fa-bell"></i>
                    Sản phẩm '.$ten_hanghoa.' - '.$size.' đã hết hàng !
                    <a href="'.$edit_a.'"">Cập nhật</a>
                  </div>
                  ';
                }
            }
            
            ?>
          </div>
        </div>
      </div>
    </div>