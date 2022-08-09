 

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
              <div class="function-title">Thêm danh mục hàng hóa</div>
              
            <div class="form-funtcion">
                <form action=".?controller=c_0&&action=add_cate" method="post" class="form-add--product">
                    <label for="">Mã danh mục</label>
                    <input type="text" disabled placeholder="Auto number" >
                    <label for="">Tên danh mục</label>
                    <input type="text" name="tenloai" id="" value="<?php if(isset($ten_danhmuc)) echo $ten_danhmuc ?>">
                    <!-- <button type="submit" name="themmoi" value="Thêm danh mục"> -->
                    <button type="submit" name="add_cate"> Thêm danh mục</button>
                    <button type="reset">Nhập lại</button>
                    <button> <a href=".?controller=c_0&&action=show_cate"> Danh sách </a></button>
                </form>
            </div>

            </div>
          </div>
