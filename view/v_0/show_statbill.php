<div class="layout-right">
    <div class="right-top">
            <div class="website-title">Trang quản trị websitie</div>
            <div class="admin-info">
   
            </div>
          </div>

    <div class="right-bgc">
            <div class="layout-function">

            <div class="mb50">
              <div class="function-title">Thống kê sản phẩm bán được</div>
              <div class="function-table">
             
                <table class="tabel-list--normal">
                <tr>
                    <td colspan="6" class="table-padding">
                    <form action=".?controller=c_0&&action=stat_bill" method="post" class="form-filter--bill">
                        <select id="" name="filterbill">
                            <option value="0">Tất cả</option>
                            <option value="1">Top sản phẩm bán chạy nhất</option>
                            <option value="2">Top sản phẩm bán chậm nhất</option>
                        </select>
                        <button class="btn-sort" name="btn-filter"></button>
                    </form>
                    </td>
                </tr>
                  <tr>
                    <th>#</th>
                    <th>Loại sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng bán ra</th>
                    <th>Doanh thu</th>
                  </tr>
            
                <?php
                
                foreach ($liststat as $thongke) {
                    extract($thongke);
                    $ten_danhmuc = CategoryDB::getName_cate($ma_danhmuc);;
                    echo '
                    
                    <tr>
                        <td></td>
                        <td>'.$ten_danhmuc.'</td>
                        <td>'.$ten_hanghoa.'</td>
                        <td class="td-witdh15"><img src="uploads/'.$hinh.'" class="details-bill--img"></td>
                        <td>'.$so_luong.'</td>
                        <td>'.number_format($tong_tien).'đ</td>
                    </tr>
                    
                    ';
                }

                ?>
                </table>
              </div>
            </div>

            
          </div>
        </div>