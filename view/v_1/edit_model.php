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
              <div class="function-title">Cập nhật số lượng sản phẩm</div>
              
            <div class="form-funtcion">
                <form action=".?controller=c_1&&action=edited_model" method="post" class="form-add--product" enctype="multipart/form-data">
                    <?php 
                        if(is_array($model)) extract($model);
                        $ten_hanghoa = productDB::getNameProbyId($ma_hanghoa);
                    ?>
                    <div class="pro-quantity">
                        <div class="pro-quantity--name"><?=$ten_hanghoa?></div>
                    </div>
                    <input type="hidden" name="ma_model" value="<?=$ma_model?>">
                    <label for="size">Size</label>
                    <input type="text" name="size" id="size" value="<?=$size?>">
                    <label for="sl">Số lượng</label>
                    <input type="text" name="so_luong" id="sl" value="<?=$so_luong?>">
        
                    <button type="submit" name="edit_model">Cập nhật</button>
                    <button type="reset">Nhập lại</button>
                    <button> <a href=".?controller=c_1&&action=show_model"> Danh sách </a></button>
                </form>
            </div>

            </div>
          </div>
