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
             
              <div class="function-title">Chi tiết bình luận</div>
              <div class="function-table">
                <table class="tabel-list--normal">
                    <tr>
                        <td colspan=5> <div class="pro-name--table">Sản phẩm : <?=$ten_hanghoa?></div> </td>
                    </tr>
                  <tr>
                    <th>#</th>
                    <th>Nội dung bình luận</th>
                    <th>Người bình luận</th>
                    <th>Ngày bình luận</th>
                    <th>Chức năng</th>
                  </tr>

                  <?php
                  
                  foreach ($listcomment as $comment) {
                    extract($comment);
                    $delete = ".?controller=c_0&&action=delete-cmt&&cmtID=".$ma_binhluan;
                    echo '
                    
                    <tr>
                      <td></td>
                      <td>'.$noi_dung.'</td>
                      <td>'.$ten_dangnhap.'</td>
                      <td>'.$ngay_binhluan.'</td>
                      <td><a href="'.$delete.'" class="a-delete"><i class="fas fa-trash-alt"></i
                      ></a></td>
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