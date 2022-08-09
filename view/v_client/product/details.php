<div class="bottom-nav">
      <div class="bottom-nav--title width-normal">
        <a href="index.php">Trang chủ</a>
        <i class="fas fa-chevron-right"></i>
        <span class="blue"><?=$ten_hanghoa?></span>
      </div>
    </div>


    <div class="container margin-bottom-20">
      <div class="detalils-name width-normal">
        <?=$ten_hanghoa?>
        <a href="#cmt">Viết đánh giá</a>
      </div>
    </div>

    <div class="container">
      <div class="details-info width-normal">
        <div class="details-img">
          <img src="./uploads/<?=$hinh?>" />
          <div class="details-boxicon">
            <div class="details-icon">
              <img
                src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-facebook-social-media-justicon-flat-justicon.png"
              />
            </div>
            <div class="details-icon">
              <img
                src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-messenger-social-media-justicon-flat-justicon.png"
              />
            </div>
            <div class="details-icon">
              <img
                src="https://img.icons8.com/external-justicon-flat-justicon/64/000000/external-twitter-social-media-justicon-flat-justicon.png"
              />
            </div>
          </div>
        </div>
        <div class="details-choice">
          <div class="details-price">
            <?php
                if($giam_gia > 0){
                    $price = number_format($don_gia * (100-$giam_gia)*0.01);
                }else{
                    $price = number_format($don_gia);
                }
            ?>
            <?=$price?>đ</div>
          <p class="details-note">* Giá sản phẩm chưa bao gồm VAT</p>
          <p class="details-condition">
            <span>Tình trạng : </span>
            <span id="status-pro">Còn  sản phẩm</span>
          </p>
          <form action=".?controller=c_client&&action=add_cart" method="post">
            <input type="hidden" name="ma_hanghoa" value="<?=$ma_hanghoa?>">
            <input type="hidden" name="ten_hanghoa" value="<?=$ten_hanghoa?>">
            <input type="hidden" name="don_gia" value="<?=$don_gia?>">
            <input type="hidden" name="hinh" value="<?=$hinh?>">
            <div class="details-size">
              <div class="details-size--title">Kích thước</div>
              <div class="box-size">
                <?php foreach($listmodel as $model): extract($model) ?>
                  <div class="size-checked">
                    <input type="radio" class="variant-0" id="<?=$size?>" value="<?=$size?>" name="size" onchange="changeSize(this)" />
                    <label for="<?=$size?>"><?=$size?></label>
                    <input type="hidden" id="sl_model" value="<?=$so_luong?>">
                  </div>
                <?php endforeach ?>
         
              </div>
            </div>
            <div class="details-quantity">
              <div class="details-quantity--title">Số lượng</div>
              <div class="quantity buttons_added">
                <input type="button" value="-" class="minus" /><input
                  type="number"
                  step="1"
                  min="1"
                  max=""
                  name="quantity"
                  value="1"
                  title="Qty"
                  class="input-text qty text"
                  size="4"
                  pattern=""
                  inputmode=""
                /><input type="button" value="+" class="plus" />
              </div>
            </div>
            <div class="details-buy">
              <button type="submit" name="add-cart" id="add-cart">
                <span class="txt-main">Mua ngay</span>
                <span class="txt-sub">Giao hàng tận nơi</span>
              </button>
            </div>
          </form>
        </div>
        <div class="details-help">
          <div class="details-help--title">
            Chúng tôi luôn sẵn sàng để giúp đỡ bạn
          </div>
          <img src="./content/images/home/support-online.jpg" alt="" />
          <div class="details-help--txt">Để được hỗ trợ tốt nhất. Hãy gọi</div>
          <div class="details-help--number">0866100339</div>
        </div>
      </div>
    </div>

    <div class="container margin-top">
      <div class="details-mid width-normal">
        <div class="details-description">
          <div class="details-description--title">Mô tả</div>
          <div class="details-description--content">
            <?=$mo_ta?>
          </div>
          <div id="cmt"></div>
          <div class="details-description--comment">
            <div class="description--comment--top">
            
              <div class="comment-count">5 bình luận</div>
              <div class="comment-filter">
                <form action="" method="post">
                  <label for="filter-comment">Sắp xếp theo </label>
                  <select id="filter-comment">
                    <option value="">Mới nhất</option>
                    <option value="">Cũ nhất</option>
                  </select>
                </form>
              </div>
            </div>
            <!-- ---------------------COMMENT--------------------------- -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
              <script>
                  $(document).ready(function(){
                      $("#comment").load("view/v_client/product/comment.php",{idpro: <?=$ma_hanghoa?>});
                  });
              </script>
            <div class="description--comment--main" id="comment">
            
            </div>
          </div>
        </div>
        <div class="details-suggestions">
          <div class="details-suggestions--title">Sản phẩm gợi ý</div>

        <?php
        
        foreach ($hintProList as $pro) {
            extract($pro);
            $linkDetails = ".?controller=c_client&&action=details-pro&&proID=".$ma_hanghoa;
        ?>

        <div class="details-suggestions--product">
            <div class="suggestions--product--img">
              <a href="<?=$linkDetails?>"><img src="./uploads/<?=$hinh?>"/></a>
            </div>
            <div class="suggestions--product--info">
              <div class="suggestions--name"><?=$ten_hanghoa?></div>
              <div class="suggestions--name--price">
                <span class="suggestions--price--off"><?=number_format($don_gia * (100 - $giam_gia)*0.01)?>đ</span>
                <span class="suggestions--price--sale"><?=number_format($don_gia)?>đ</span>
              </div>
            </div>
        </div>

        <?php } ?>

        </div>
      </div>
    </div>

    <div class="container margin-top">
      <div class="similar-title">
        <a href="#">Sản phẩm cùng loại</a>
      </div>
    </div>

    <div class="container">
      <div class="similar-products width-normal">

        <?php
        
        foreach ($sameProList as $pro) {
            extract($pro);
            $linkDetails = ".?controller=c_client&&action=details-pro&&proID=".$ma_hanghoa;
        ?>
            <div class="product width-20">
                <div class="product-option">
                    <a style="color:white" href="<?=$linkDetails?>">Chi tiết</a>
                </div>
                <div class="product-image width-img">
                    <a href="<?=$linkDetails?>"><img src="./uploads/<?=$hinh?>"/></a>
                </div>
                <div class="product-name"><span><?=$ten_hanghoa?></span></div>
                <div class="product-price"><?=number_format($don_gia)?>đ</div>
            </div>
        <?php } ?>

      </div>
    </div>