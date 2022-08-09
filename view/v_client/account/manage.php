<?php

if(isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
    extract($_SESSION['user'][0]);
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
            
              <a href=".?controller=c_client&&action=update_acc" class="btn-update inline">Cập nhật thông tin</a> 
              
            </div>
          </div>
          <div class="account-info--order">
            <div class="info-boxed--title">Đơn hàng gần nhất</div>
            <div class="account-order--list">
              <table class="order-table">
                <tr>
                  <th>Mã HĐ</th>
                  <th>Ngày mua</th>
                  <th>Chuyển đến</th>
                  <th>Tổng tiền</th>
                  <th>Tình trạng đơn hàng</th>
                  <th>Chi tiết</th>
                  <th>Khác</th>
                </tr>
                
                <?php
                
                if(is_array($listbill) && ($listbill != [])){
                    foreach ($listbill as $bill) {
                      extract($bill);
                      $details = ".?controller=c_client&&action=mybill&&id=".$ma_hoadon;
                      $khac = "";
                      if($trang_thai == 0){
                        $trang_thai = "Chờ xử lý";
                        $khac = "Hủy đơn hàng";
                      }else if($trang_thai == 1){
                        $trang_thai = "Đã xác nhận";
                      }else if($trang_thai == 2){
                        $trang_thai = "Đang giao hàng";
                      }else if($trang_thai == 3){
                        $trang_thai = "Đã hoàn thành";
                      }else{
                        $trang_thai = "Đã hủy đơn";
                        $khac = "Đặt lại";
                      }
                      $khac_a = "";
                      if($khac == "Hủy đơn hàng") {
                        $quiz = 'onclick="return confirm(\'Xác nhận hủy đơn hàng ?\')"';
                        $khac_href = ".?controller=c_client&&action=cancel_bill&&billID=".$ma_hoadon;
                        $khac_a = '<a '.$quiz.' href="'.$khac_href.'" class="a-fc">'.$khac.'</a>';
                      }else if($khac == "Đặt lại"){
                        $khac_href = ".?controller=c_client&&action=reorder&&billID=".$ma_hoadon;
                        $khac_a = '<a href="'.$khac_href.'" class="a-fc">'.$khac.'</a>';
                      }
                      echo '
                      <tr>
                        <td>'.$ma_hoadon.'</td>
                        <td>'.$ngay_dat.'</td>
                        <td>'.$dia_chi.'</td>
                        <td>'.number_format($tong_tien + $van_chuyen).'đ</td>
                        <td>'.$trang_thai.'</td>
                        <td><a href="'.$details.'" class="a-fc">Xem</a></td>
                        <td>'.$khac_a.'</td>
                      </tr>
                      ';
                    }
                }else{
                  echo '
                  <tr>
                    <td colspan="7">Không có đơn hàng nào</td>
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