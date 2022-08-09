<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="icon"
      href="//bizweb.dktcdn.net/100/180/515/themes/683553/assets/favicon.png?1624423469475"
      type="image/x-icon"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script
      src="https://kit.fontawesome.com/497e58feb8.js"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <link rel="stylesheet" href="../../../content/css/reset.css" />
    <link rel="stylesheet" href="../../../content/css/app.css" />
    <link rel="stylesheet" href="../../../content/css/check-out.css" />
    <title>Thanh toán</title>
  </head>
  <body>

<div class="container">
      <form action="../../../index.php?controller=c_client&&action=billconfirm" method="post" class="form-payment">
        <div class="payment-flex">
          <div class="info-user">
            <div class="shop-title"><a href="#">HPstore</a></div>
            <div class="info-top">
              <div class="info-title">Thông tin nhận hàng</div>
          

              <div class="info-log">
                  
                <?php
                
                if(isset($_SESSION['user'])) {
                    $name = $_SESSION['user'][0]['ho_ten'];
                    $tel = $_SESSION['user'][0]['so_dien_thoai'];
                    $email = $_SESSION['user'][0]['email'];
                    $address = $_SESSION['user'][0]['dia_chi'];
                    echo '<a href=".?controller=logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>';
                }else{
                    $name = "";
                    $tel = "";
                    $email = "";
                    $address = "";
                    echo '<a href=".?controller=login"> <i class="fas fa-user-circle"></i> Đăng nhập</a>';
                }
               
                ?>

              </div>
            </div>
            <div class="form-input">
              <div class="form-field">
                <input type="text" id="name" name="name" placeholder=" " value="<?=$name?>" />
                <label for="name">Họ và tên</label>
              </div>
              <div class="form-field">
                <input type="text" id="phone" name="tel" placeholder=" " value="<?=$tel?>" />
                <label for="phone">Số điện thoại</label>
              </div>
              <div class="form-field">
                <input type="email" name="email" id="email" placeholder=" " value="<?=$email?>" />
                <label for="email">Email</label>
              </div>
              <div class="form-field">
                <input type="text" id="address" name="address" placeholder=" " value="<?=$address?>" />
                <label for="address">Địa chỉ</label>
              </div>
              <div class="form-field">
                <textarea id="note" rows="2" name="note" placeholder=" "></textarea>
                <label for="note">Ghi chú</label>
              </div>
            </div>
          </div>

          <div class="payment-choice">
            <div class="payment-choice--transport">
              <div class="payment-choice--title">Vận chuyển</div>
              <div>
                <input type="radio" name="transport" onchange="changetrans(this)" value="35000" id="transport-fast" />
                <label for="transport-fast" class="box-label">
                  <div class="label-txt">Giao hàng chậm</div>
                  <div class="label-number">35.000đ</div>
                </label>
              </div>
              <div>
                <input type="radio" name="transport" onchange="changetrans(this)" value="50000" id="transport-slow" />
                <label for="transport-slow" class="box-label">
                  <div class="label-txt">Giao hàng nhanh</div>
                  <div class="label-number">50.000đ</div>
                </label>
              </div>
            </div>

            <!-- ------------------ -->

            <div class="payment-choice--transport margin-top">
              <div class="payment-choice--title">Thanh toán</div>
              <div>
                <input type="radio" value="0" name="payment" id="payment-off" />
                <label for="payment-off" class="box-label">
                  <div class="label-txt">Thanh toán khi nhận hàng</div>
                  <div class="label-number">
                    <i class="far fa-money-bill-alt"></i>
                  </div>
                </label>
              </div>
              <div>
                <input type="radio" value="1" name="payment" id="payment-onl" />
                <label for="payment-onl" class="box-label">
                  <div class="label-txt">Thanh toán online</div>
                  <div class="label-number">
                    <i class="fab fa-cc-paypal"></i>
                  </div>
                </label>
              </div>
            </div>
          </div>

          <div class="payment-order">
            <?php
                $tong_sl = 0;
                foreach ($_SESSION['cart'] as $cart) {
                    $tong_sl+= $cart[5];
                }
            ?>
            <div class="payment-order--title">Đơn hàng (<?=$tong_sl?> sản phẩm )</div>
            <div class="payment-order--product">

            <?php
            $tong_tien = 0;
            foreach ($_SESSION['cart'] as $cart) {
              $tmp_tien = $cart[3] * $cart[5];
              $tong_tien+=$tmp_tien;
            ?>

                <div class="product-order">
                    <div class="order-img">
                    <div class="order-count"><?=$cart[5]?></div>
                    <img
                        src="../../../uploads/<?=$cart[2]?>"
                    />
                    </div>
                    <div class="order-name">
                    <?=$cart[1]?>
                    <br />
                    <span class="order-size"><?=$cart[4]?></span>
                    </div>
                    <div class="order-price"><?=number_format($cart[3])?>đ</div>
                </div>

            <?php } ?>

            <!-- ---------------------------------------------------------------- -->
            <input type="hidden" name="tmp_tong" value="<?=$tong_tien?>">
            </div>
            <div class="payment-order--price">
              <div class="order-price--element">
                <div class="oder-price--text">Tạm tính</div>
                <div class="oder-price--number"><?=number_format($tong_tien)?>đ</div>
              </div>
              <div class="order-price--element">
                <div class="oder-price--text">Phí vận chuyển</div>
                <div class="oder-price--number" id="trans-price"></div>
              </div>
            </div>
            <div class="payment-order--price last-oder">
              <div class="order-price--element">
                <div class="oder-price--sum">Tổng cộng</div>
                <div class="oder-price--offcial" id="tong_tien"></div>
              </div>
              <div class="payment-oder--submit">
                <div class="order-submit--box">
                  <div>
                    <a href="../../../index.php?controllerc_cilent&&action=viewcart">Quay về giỏ hàng</a>
                  </div>
                  <div>
                    <button class="btn-order" name="btn-submit" type="submit">
                      <span></span><span></span><span></span><span></span> Đặt
                      hàng
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <script src="../../../content/js/cart.js"></script>
    </body>
</html>