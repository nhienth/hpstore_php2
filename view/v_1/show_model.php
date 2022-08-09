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
             
              <div class="function-title">Danh sách sản phẩm</div>
              <div class="function-table">
                <table class="tabel-list">
                  <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá</th>
                    <th>Tổng số lượng</th>
                    <th>Nhập</th>
                    <th>Chi tiết</th>
                  </tr>
                 
                
                <?php
                
                    foreach($models as $model):
                    extract($model);
                    $add = ".?controller=c_1&&action=add_model&&proID=".$ma_hanghoa;
                    $details = ".?controller=c_1&&action=details_model&&proID=".$ma_hanghoa;
                ?>

                <tr>
                    <td><?=$ma_hanghoa?></td>
                    <td style="width:25%">
                      <span
                        ><?=$ten_hanghoa?></span
                      >
                    </td>
                    <td>
                    <img src="uploads/<?=$hinh?>">
                    </td>
                    <td><?=number_format($don_gia)?>đ</td>
                    <td style="width:20%"><?=$SUMSL?></td>
                    <td><a href="<?=$add?>" class="a-add"><i class="fas fa-plus"></i></a></td>
                    <td><a href="<?=$details?>" class="a-edit"><i class="fas fa-eye"></i></a></td>
                  </tr>


                <?php endforeach ?>


            </table>
              </div>
            </div>
          </div>