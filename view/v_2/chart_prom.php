<div class="layout-right">
<div class="right-top">
            <div class="website-title">Trang quản trị websitie</div>
            <div class="admin-info">
     
            </div>
          </div>

<div class="right-bgc">
            <div class="layout-function">
             
              <div class="function-title">Biểu đồ thống kê</div>
              <div class="function-table">
            
                <div class="chart-tk">
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Loại', 'Số lượng'],
                                <?php
                                
                                    foreach ($liststat as $thongke) {
                                        extract($thongke);
                                        echo "['".$ten_danhmuc."', ".$so_luong."],";
                                    }
                                
                                ?>
                            
                                ]);

                                var options = {
                                title: 'TỶ LỆ HÀNG HÓA',
                                is3D: true,
                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                                chart.draw(data, options);
                            }
                            </script>
                        </head>
                        <body>
                            <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
                        </body>
                    </html>
                </div>

              </div>
            </div>
          </div>