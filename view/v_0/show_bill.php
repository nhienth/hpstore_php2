<div class="layout-right">
<div class="right-top">
            <div class="website-title">Trang quản trị websitie</div>
            <div class="admin-info">
   
            </div>
          </div>

<div class="right-bgc">
            <div class="layout-function">
            <?php
              
              if(isset($thongbao) && ($thongbao != "")) {
              echo ' <div class="thongbao"><i class="fas fa-bell"></i> '.$thongbao.'</div>';
              }
          
          ?>
             
              <div class="function-title">Danh sách đơn hàng</div>
              <div class="function-table">
             
                <table class="tabel-list--normal">
                  <tr>
                    <th>Mã đơn</th>
                    <th>Người đặt hàng</th>
                    <th>Tổng tiền</th>
                    <th>Hình thức thanh toán</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật trạng thái</th>
                    <th>Xem chi tiết</th>
                  </tr>
            

                <?php
                
                foreach ($listhoadon as $hoadon) {
                    extract($hoadon);
                    $details = ".?controller=c_0&&action=details_bill&&billID=".$ma_hoadon;
                    if($thanh_toan == 0){
                      $thanh_toan = "Thanh toán khi nhận hàng";
                    }else{
                      $thanh_toan = "Thanh toán online";
                    }

                    if($trang_thai == 0){
                      $trang_thai_t = "Đơn hàng mới";
                      $bgc = "sandybrown";
                    }else if($trang_thai == 1){
                      $trang_thai_t = "Đã xác nhận";
                      $bgc = "royalblue";
                    }else if($trang_thai == 2){
                      $trang_thai_t = "Đang giao hàng";
                      $bgc = "mediumturquoise";
                    }else if($trang_thai == 3){
                      $trang_thai_t = "Đã hoàn thành";
                      $bgc = "lightseagreen";
                    }else{
                      $trang_thai_t = "Đã hủy";
                      $bgc = "dimgray";
                    }
                ?>
                    <tr>
                      <td><?=$ma_hoadon?></td>
                      <td><?=$ten_khachhang?></td>
                      <td><?=number_format($tong_tien)?>đ</td>
                      <td> <?=$thanh_toan?></td>
                      <td><div class="<?=$bgc?> status-bill"> <?=$trang_thai_t?></div></td>
                      <td>
                        <?php
                            if($trang_thai_t != "Đã hủy") {
                        ?>
                            <form action=".?controller=c_0&&action=edit_bill" method="post" class="bill-form">
                              <input type="hidden" name="ma_hoadon" value="<?=$ma_hoadon?>">
                              <select name="trang_thai" id="select-<?=$ma_hoadon?>">
                              <option value="0">Đơn hàng mới</option>
                              <option value="1">Đã xác nhận</option>
                              <option value="2">Đang giao hàng</option>
                              <option value="3">Đã hoàn thành</option>
                              </select>
                              <button type="submit" name="btn-update">Cập nhật</button>
                            </form>
                            <script>
                                var select = document.querySelector('#select-<?=$ma_hoadon?>');
                                select.children['<?=$trang_thai?>'].selected = true;
                            </script>

                        <?php } ?>
                      
                        
                      </td>
                      <td><a href="<?=$details?>" class="a-edit"><i class="fas fa-eye"></i></a></td>
                    </tr>
                  
                <?php  }  ?>

                </table>
              </div>
            </div>
          </div>
          

         