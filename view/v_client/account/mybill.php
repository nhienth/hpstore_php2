<?php

if(isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    extract($_SESSION['user']);
}

?>


<div class="bottom-nav">
      <div class="bottom-nav--title width-normal">
        <a href="index.php">Trang chủ</a>
        <i class="fas fa-chevron-right"></i>
        <span class="blue">Trang khách hàng</span>
      </div>
    </div>

    <div class="container">
      <div class="section-AF width-normal">
        <div class="account-info--title">
          <div class="info-title--txt">Quản lý tài khoản</div>
          <div class="info-hello">Xin chào, <?=$ho_ten?></div>
        </div>
        <div class="account-info--boxed">
          <div class="account-info--details">
            <div class="info-boxed--title">Thông tin khách hàng</div>
            <div class="account-details--boxed">
              <div class="account-details--img">
                <img src="./uploads/<?=$hinh?>" alt="" />
              </div>
              <div class="account-details--element">
                <i class="fas fa-user"></i> <?=$ho_ten?>
              </div>
              <div class="account-details--element">
                <i class="fas fa-map-marker-alt"></i> <?=$dia_chi?>
              </div>
              <div class="account-details--element">
                <i class="fas fa-phone-alt"></i> <?=$so_dien_thoai?>
              </div>
            
              <a href="index.php?act=update-info" class="btn-update inline">Cập nhật thông tin</a> 
              
            </div>
          </div>
          <div class="account-info--order">
            <div class="info-boxed--title">Chi tiết đơn hàng</div>
            <div class="account-order--list mb50">
              <table class="order-table">
                <tr class="tr-top">
                    <td colspan="5" class="td-top">
                        <div class="td-top--boxed">Thông tin vận chuyển</div>
                    </td>
                </tr>
                <tr>
                  <th>Tên người nhận</th>
                  <th>Địa chỉ nhận</th>
                  <th>Số điện thoại</th>
                  <th>Phương thức giao hàng</th>
                  <th>Ghi chú</th>
                </tr>
                <?php
                    if(isset($bill) && (is_array($bill))) extract($bill);
                    if($van_chuyen == 35000) {
                        $van_chuyen = "Giao hàng nhanh";
                    }else{
                        $van_chuyen = "Giao hàng chậm";
                    }
                ?>
                <tr>
                    <td><?=$ten_khachhang?></td>
                    <td><?=$dia_chi?></td>
                    <td><?=$dien_thoai?></td>
                    <td><?=$van_chuyen?></td>
                    <td><?=$ghi_chu?></td>
                </tr>
                
               
              </table>
            </div>

            <div class="account-order--list">
              <table class="order-table">
                <tr class="tr-top">
                    <td colspan="6" class="td-top">
                        <div class="td-top--boxed">Chi tiết sản phẩm</div>
                    </td>
                </tr>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Hình ảnh</th>
                  <th>Size</th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>
                  <th>Thành tiền</th>
                </tr>

                <?php

                    foreach ($listproduct as $product) {
                        extract($product);
                        echo '
                        <tr>
                            <td>'.$ten_hanghoa.'</td>
                            <td><img class="bill-img" src="./uploads/'.$hinh.'"></td>
                            <td>'.$size.'</td>
                            <td>'.$so_luong.'</td>
                            <td>'.number_format($gia).'đ</td>
                            <td>'.number_format($thanh_tien).'đ</td>
                        </tr>
                        ';
                    }

                ?>
                
               
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>