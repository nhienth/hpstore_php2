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
             
              <div class="function-title">Danh sách danh mục</div>
              <div class="function-table">
                <table class="tabel-list1">
                  <tr>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th colspan="2">Sửa / Xóa</th>
                  </tr>

                <?php 
                    foreach($categories as $key=>$value):
                    $edit = ".?controller=c_1&&action=edit_cate&&cateID=".$value->ma_danhmuc;
                    $delete = ".?controller=c_1&&action=delete_cate&&cateID=".$value->ma_danhmuc;
                ?>

                <tr>
                    <td><?=$value->ma_danhmuc?></td>
                    <td>
                      <span
                        ><?=$value->ten_danhmuc?></span
                      >
                    </td>
                    <td>
                      <a href="<?=$edit?>" class="a-edit"><i class="fas fa-edit" ></i></a>
                    </td>
                    <td>
                      <a href="<?=$delete?>" onclick="return confirm('Bạn chắc chắn muốn xóa ?')" class="a-delete"
                        ><i class="fas fa-trash-alt" ></i
                      ></a>
                    </td>
                </tr>

                <?php endforeach ?>
                


            </table>
              </div>
            </div>
          </div>