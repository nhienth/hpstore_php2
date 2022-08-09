  
    <section class="awe-section-1">
      <div class="image-slider">
        <div class="image-item">
          <div class="image">
            <img src="./content/images/Slider/slider_1.png" alt="" />
          </div>
        </div>
        <div class="image-item">
          <div class="image">
            <img src="./content/images/Slider/slider_2.png" alt="" />
          </div>
        </div>
        <div class="image-item">
          <div class="image">
            <img src="./content/images/Slider/slider_3.png" alt="" />
          </div>
        </div>
        <div class="image-item">
          <div class="image">
            <img src="./content/images/Slider/slider_4.png" alt="" />
          </div>
        </div>
        <div class="image-item">
          <div class="image">
            <img src="./content/images/Slider/slider_5.png" alt="" />
          </div>
        </div>
      </div>
    </section>

    <section class="awe-section-2 width-normal">
      <div class="section2-select-img feature_cate_1">
        <img src="./content/images/home/feature_cate_1.jpg" />
      </div>
      <div class="section2-select-img feature_cate_2">
        <img src="./content/images/home/feature_cate_2.jpg" />
      </div>
      <div class="section2-select-img feature_cate_3">
        <img src="./content/images/home/feature_cate_3.jpg" />
      </div>
    </section>

    <section class="awe-section3 width-normal">
    <?php $products = productDB::get_productsNew() ?>
    <?php foreach ($products as $key => $value):
      $linkDetails = '.?controller=c_client&&action=details-pro&&proID='.$value->ma_hanghoa;
    ?>
      <div class="product">
        <div class="product-option"><a href="<?=$linkDetails?>" style="color:white">Chi tiết</a></div>
        <div class="product-image">
        <a href="<?=$linkDetails?>"><img src="./uploads/<?=$value->hinh?>" /></a>
        </div>
        <div class="product-name"><span><?=$value->ten_hanghoa?><span></div>
        <div class="product-price"><?=number_format($value->don_gia)?>đ</div>
      </div>
    <?php endforeach ?>
    </section>


    <section class="awe-section4 width-normal">
      <div class="section4-img">
        <img src="./content/images/home/banner_1.jpg" alt="" />
      </div>
      <div class="section4-img">
        <img src="./content/images/home/banner_2.jpg" alt="" />
      </div>
    </section>

    <section class="awe-section5 width-normal">
      <div class="list-category">Giày bóng chuyền</div>
      <div class="img-category">
        <img src="./content/images/home/sec_group_product_banner_1.jpg" />
      </div>
    </section>

    <!-- ---------------------LOAD GIÀY BÓNG CHUYỀN -------------- -->
    <section class="awe-section3 width-normal">

    <?php $products = productDB::getProHomeByCateId(37) ?>

    <?php foreach ($products as $key => $value):
      $linkDetails = '.?controller=c_client&&action=details-pro&&proID='.$value->ma_hanghoa;
    ?>
      <div class="product">
        <div class="product-option"><a href="<?=$linkDetails?>" style="color:white">Chi tiết</a></div>
        <div class="product-image">
        <a href="<?=$linkDetails?>"><img src="./uploads/<?=$value->hinh?>" /></a>
        </div>
        <div class="product-name"><span><?=$value->ten_hanghoa?><span></div>
        <div class="product-price"><?=number_format($value->don_gia)?>đ</div>
      </div>
    <?php endforeach ?>

    </section>

    <!-- ---------------------------END----------------------------- -->

    <section class="awe-section5 width-normal">
      <div class="list-category">Đồng phục bóng chuyền</div>
      <div class="img-category">
        <img src="./content/images/home/sec_group_product_banner_2.jpg" />
      </div>
    </section>
<!-- ------------------------LOAD ĐỒNG PHỤC BÓNG CHUYỀN ------------------- -->
    <section class="awe-section3 width-normal">

    <?php $products = productDB::getProHomeByCateId(36) ?>

    <?php foreach ($products as $key => $value):
      $linkDetails = '.?controller=c_client&&action=details-pro&&proID='.$value->ma_hanghoa;
    ?>
      <div class="product">
        <div class="product-option"><a href="<?=$linkDetails?>" style="color:white">Chi tiết</a></div>
        <div class="product-image">
        <a href="<?=$linkDetails?>"><img src="./uploads/<?=$value->hinh?>" /></a>
        </div>
        <div class="product-name"><span><?=$value->ten_hanghoa?><span></div>
        <div class="product-price"><?=number_format($value->don_gia)?>đ</div>
      </div>
    <?php endforeach ?>

    </section>

    <section class="awe-section5 width-normal">
      <div class="list-category">Phụ kiện bóng chuyền</div>
      <div class="img-category">
        <img src="./content/images/home/sec_group_product_banner_3.jpg" />
      </div>
    </section>
<!-- -----------------------------LOAD PHU KIEN ---------------------------- -->
    <section class="awe-section3 width-normal">

   
    <?php $products = productDB::getProHomeByCateId(35) ?>

    <?php foreach ($products as $key => $value):
      $linkDetails = '.?controller=c_client&&action=details-pro&&proID='.$value->ma_hanghoa;
    ?>
      <div class="product">
        <div class="product-option"><a href="<?=$linkDetails?>" style="color:white">Chi tiết</a></div>
        <div class="product-image">
        <a href="<?=$linkDetails?>"><img src="./uploads/<?=$value->hinh?>" /></a>
        </div>
        <div class="product-name"><span><?=$value->ten_hanghoa?><span></div>
        <div class="product-price"><?=number_format($value->don_gia)?>đ</div>
      </div>
    <?php endforeach ?>

    </section>

    <section class="awe-section-6 width-normal">
      <div class="section6-title"><a href="#"> Tin tức bóng chuyền</a></div>
      <div class="section6-news">
        
<!--     
            
            <div class="news-content">
            <div class="news-title">'.$tieu_de.'</div>
            <div class="news-image">
              <img src="./uploads/'.$hinh.'" alt="" />
            </div>
            <div class="news-description">'.$tom_tat.'</div>
          </div> -->

      
       
      </div>
    </section>
    <!-- ----END HOME---- -->