<?php
    session_start();
    include "../../../model/pdo.php";
    include "../../../model/m_comment.php";
    $ma_hanghoa = $_REQUEST['idpro'];
    $listcomment = commentDB::selectAll_binhluan($ma_hanghoa);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../content/css/comment.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <div class="comment-layout">
        
            <?php
                foreach ($listcomment as $comment) {
                    extract($comment);
            ?>
                    <div class="comment-content">
                        <div class="conment-img"><img src="./uploads/<?=$avatar?>"></div>
                        <div class="conment-txt">
                            <div class="comment-user"><?=$ten_khachhang?></div>
                            <div class="comment-text"><?=$noi_dung?></div>
                        </div>
                        <div class="comment-day"><?=$ngay_binhluan?></div>
                    </div>
            <?php } ?>

            <?php
            
            if(isset($_SESSION['user'])){
           
            ?>

            <div class="comment-boxed-add">
                <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" class="form-add--comment">
                    <input type="hidden" name="ma_hanghoa" value="<?=$ma_hanghoa?>">
                    <div class="add-comment--img">
                        <img src="./uploads/<?=$_SESSION['user'][0]['hinh']?>">
                    </div>
                    <div class="add-comment--submit">
                        <input type="text" name="cmt-content" placeholder="Thêm bình luận...">
                        <div class="boxed-hidden">
                            <button type="submit" name="btn-send">Gửi bình luận</button>
                        </div>
                    </div>
                </form>

                <?php
                
                if(isset($_POST['btn-send'])) {
                    $ma_khachhang = $_SESSION['user'][0]['ma_khachhang'];
                    $ten_dangnhap = $_SESSION['user'][0]['ten_dangnhap'];
                    $ma_hanghoa = $_POST['ma_hanghoa'];
                    $ten_khachhang = $_SESSION['user'][0]['ho_ten'];
                    $avatar = $_SESSION['user'][0]['hinh'];
                    $content = $_POST['cmt-content'];
                    $date = date("Y-m-d");
                    if($content != ""){
                        commentDB::insert_binhluan($ma_khachhang,$ten_dangnhap,$ten_khachhang,$ma_hanghoa,$avatar,$content,$date);
                    }
                    header("Location: ".$_SERVER['HTTP_REFERER']);
                }
                
                ?>

            </div>

            <?php }else { ?>

                <div class="login-to--comment">
                    <a href=".?controller=login"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a> để bình luận về sản phẩm này.
                </div>

            <?php } ?>

        </div>
  
    </div>
    </body>
</html>