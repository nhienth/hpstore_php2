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
             
              <div class="function-title">Danh sách bình luận</div>
              <div class="function-table">
                <table class="tabel-list--normal">
                  <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Số bình luận</th>
                    <th>Mới nhất</th>
                    <th>Cũ nhất</th>
                    <th>Chi tiết</th>
                  </tr>

                  <?php
                  
                  foreach ($listcomment as $comment) {
                    extract($comment);
                    $details = ".?controller=c_0&&action=details-cmt&&proID=".$ma_hanghoa;
                    echo '
                    
                    <tr>
                      <td></td>
                      <td>'.$ten_hanghoa.'</td>
                      <td>'.$so_luong.'</td>
                      <td>'.$moi_nhat.'</td>
                      <td>'.$cu_nhat.'</td>
                      <td><a href="'.$details.'" class="a-edit"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    
                    ';
                  }
                  
                  ?>
                
                <?php

                ?>

            </table>
              </div>
            </div>
          </div>