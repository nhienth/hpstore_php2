
    <div class="bottom-nav">
      <div class="bottom-nav--title width-normal">
        <a href="../../index.php">Trang chủ</a>
        <i class="fas fa-chevron-right"></i>
        <span class="blue">Tìm lại mật khẩu</span>
      </div>
    </div>

    <section class="section-row width-normal">
      <div class="login-block">
        <div class="login-title">Tìm lại mật khẩu</div>
        <div class="login-title--else">
          Nếu bạn đã quên mật khẩu, điền thông tin đề tìm lại
        </div>

        <?php
              if(isset($thongbao) && ($thongbao != "")) {
                echo '<div class="thongbaos"><i class="fas fa-bell"></i> '.$thongbao.'</div>';
              }
        ?>

        <form action="index.php?act=quenmk" class="login-form" method="post" enctype="multipart/form-data">
          <label for="user">Tên đăng nhập<span class="red">*</span></label>
          <input type="text" id="user" name="user" placeholder="Tên đăng nhập" value="<?php if(isset($user)) echo $user ?>"/>
          <label for="email">Email<span class="red">*</span></label>
          <input type="text" id="email" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email ?>" />
          <!-- <input type="submit" value="Đăng nhập" class="btn-submit" /> -->
          <button class="btn-submit" name="laylaimk" type="submit">Tìm lại mật khẩu</button>
        </form>
      </div>
    </section>
