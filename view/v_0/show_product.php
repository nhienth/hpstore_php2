<div class="layout-right">
<div class="right-top">
            <div class="website-title">Trang quản trị websitie</div>
            <div class="admin-info">
              <?php 
                //   if(isset($_SESSION['user'])) {
                //     $hinh = $_SESSION['user']['hinh'];
                //     echo '
                //     <div class="admin-name">'.$_SESSION['user']['ten_dangnhap'].'</div>
                //     <div class="admin-img"><img src="../uploads/'.$hinh.'"></div>
                //     ';
                //   }
              ?>
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
                    <th>Loại hàng</th>
                    <th>Đơn giá</th>
                    <th>Giảm giá (%)</th>
                    <th>Ngày nhập</th>
                    <th>Mô tả</th>
                    <th colspan="2">Sửa / Xóa</th>
                  </tr>
                 
                
                <?php
                
                    foreach($products as $key=>$value):
                    $edit = ".?controller=c_0&&action=edit_pro&&proID=".$value->ma_hanghoa;
                    $delete = ".?controller=c_0&&action=delete_pro&&proID=".$value->ma_hanghoa;
                ?>

                <tr>
                    <td><?=$value->ma_hanghoa?></td>
                    <td>
                      <span
                        ><?=$value->ten_hanghoa?></span
                      >
                    </td>
                    <td>
                    <img src="uploads/<?=$value->hinh?>">
                    </td>
                    <td><?=$value->ten_danhmuc?></td>
                    <td><?=number_format($value->don_gia)?></td>
                    <td><?=$value->giam_gia?></td>
                    <td><?=$value->ngay_nhap?></td>
                    <td>
                      <span>
                      <?=$value->mo_ta?>
                      </span>
                    </td>

                    <td>
                      <a href="<?=$edit?>" class="a-edit"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                      <a href="<?=$delete?>" onclick="return confirm('Bạn chắc chắn muốn xóa ?')" class="a-delete"
                        ><i class="fas fa-trash-alt"></i
                      ></a>
                    </td>
                  </tr>


                <?php endforeach ?>


            </table>
              </div>
            </div>
          </div>