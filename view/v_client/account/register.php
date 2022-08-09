

    <div class="bottom-nav">
      <div class="bottom-nav--title width-normal">
        <a href="index.php">Trang chủ</a>
        <i class="fas fa-chevron-right"></i>
        <span class="blue">Đăng ký tài khoản</span>
      </div> 
    </div>

    <section class="section-row width-normal">
      <div class="login-block">
        <div class="login-title">Đăng ký tài khoản</div>
        <div class="login-title--else">
          Nếu chưa có tài khoản vui lòng đăng ký tại đây
        </div>
    
        <?php
              if(isset($thongbao) && ($thongbao != "")) {
                echo '<div class="thongbaos"><i class="fas fa-bell"></i> '.$thongbao.'</div>';
              }
        ?>
              <form action="index.php?act=dangki" method="post" class="login-form" enctype="multipart/form-data">
                    <label for="tendn">Tên đăng nhập<span class="red">*</span></label>
                    <input type="text" name="user" id="tendn" value="<?php if(isset($user)) echo $user ?>">
                    <label for="pass">Mật khẩu<span class="red">*</span></label>
                    <input type="password" name="pass" id="pass" value="<?php if(isset($pass)) echo $pass ?>">
                    <label for="pass">Họ tên<span class="red">*</span></label>
                    <input type="text" name="name" id="name" value="<?php if(isset($name)) echo $name ?>">
                    <label for="hinh">Hình ảnh<span class="red">*</span></label>
                    <input type="file" name="avatar" id="hinh" class="margin-bottom-20">
                    <label for="email">Email<span class="red">*</span></label>
                    <input type="email" name="email" id="email" value="<?php if(isset($email)) echo $email ?>">
                    <label for="phone">Số điện thoại<span class="red">*</span></label>
                    <input type="text" name="phone" id="phone" value="<?php if(isset($phone)) echo $phone ?>">
                    <label for="address">Địa chỉ<span class="red">*</span></label>
                    <input type="text" name="address" id="address" value="<?php if(isset($address)) echo $address ?>">
                    <!-- <input type="submit" name="btn-add" value="Thêm tài khoản" > -->
                    <div class="box-button">
                      <button class="btn-submit" name="btn-add" type="submit">Đăng ký</button>
                      <button class="btn-login" name="dangnhap">
                        <a href="index.php?act=dangnhap">Đăng nhập</a> 
                      </button>
                    </div>

            </form>
        
      </div>
    </section>

   