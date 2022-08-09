

<div class="layout-right">
<div class="right-top">
            <div class="website-title">Trang quản trị websitie</div>
            <div class="admin-info">
              <?php 
           
              ?>
            </div>
          </div>

<div class="right-bgc">
            <div class="layout-function">
             
              <div class="function-title">Sửa danh mục</div>
              <div class="function-table">
              <div class="form-funtcion">
                <form action="" method="post" class="form-add--product">
                    <label for="">Mã danh mục</label>
                    <input type="text" disabled value="<?=$cateInfo->ma_danhmuc?>" >
                    <label for="">Tên danh mục</label>
                    <input type="text" name="tenloai" value="<?=$cateInfo->ten_danhmuc?>"><br>
                    <input type="hidden" name="maloai" value="<?=$cateInfo->ma_danhmuc?>">
                    <!-- <input type="submit" value="CẬP NHẬT" name="capnhat"> -->
                    <button type=submit name="action" value="edited_cate">Cập nhật</button>
                    <button><a href=".?controller=c_0&&action=show_cate">DANH SÁCH<a></button>
                </form>
            </div>
              </div>
            </div>
          </div>