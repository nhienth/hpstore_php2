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
             
              <div class="function-title">Danh sách khách hàng</div>
              <div class="function-table">
                <table class="tabel-list3">
                  <tr>
                    <th>Mã khách hàng</th>
                    <th>Tên đăng nhập</th>
                    <th>Họ tên</th>
                    <th>Hình</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Vai trò</th>
               
                  </tr>

                <?php  foreach($users as $key=>$value):
                    $role = $value->vai_tro != 3 ? "Nhân viên" : "Khách hàng"; 
                ?>

                    <tr>
                      <td><?=$value->ma_khachhang?></td>
                      <td><?=$value->ten_dangnhap?></td>
                      <td><?=$value->ho_ten?></td>
                      <td><img src="uploads/<?=$value->hinh?>" alt=""></td>
                      <td><?=$value->so_dien_thoai?></td>
                      <td><?=$value->email?></td>
                      <td><?=$value->dia_chi?></td>
                      <td><?=$role?></td>   
                  </tr>

                <?php endforeach ?>


            </table>
              </div>
            </div>
          </div>