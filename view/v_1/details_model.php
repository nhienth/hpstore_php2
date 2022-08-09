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
             
              <div class="function-title">Chi tiết số lượng sản phẩm</div>
              <div class="function-table">
             
                <table class="tabel-list--normal">
                    <tr>
                        <td colspan=4> <div class="pro-name--table"><?=$ten_hanghoa?></div> </td>
                    </tr>
                  <tr>
                    <th>Size sản phẩm</th>
                    <th>Số lượng</th>
                    <th colspan="2">Sửa / Xóa</th>
                  </tr>
            

                <?php
                
                foreach ($listmodel as $hanghoa) {
                    extract($hanghoa);
                    $delete = ".?controller=c_1&&action=delete_model&&mdID=".$ma_model;
                    $edit = ".?controller=c_1&&action=edit_model&&mdID=".$ma_model;

                    echo '   
                    <tr>
                        <td>'.$size.'</td>
                        <td>'.$so_luong.'</td>
                        <td> <a href="'.$edit.'" class="a-edit"><i class="fas fa-edit"></i></a></td>
                        <td> <a href="'.$delete.'" onclick="return confirm(\'Bạn chắc chắn muốn xóa ?\')" class="a-delete"
                        ><i class="fas fa-trash-alt"></i
                      ></a></td>
                    </tr>';
                  
                }
                
                ?>

            </table>
              </div>
            </div>
          </div>