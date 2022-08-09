<?php 

class CategoryDB{
  public static function get_categories(){
         $db = Database::getDB();
         $query = "SELECT * FROM danh_muc ORDER BY ma_danhmuc DESC";

         try {
          $statement = $db->prepare($query);
          $statement -> execute();
          $result = $statement->fetchAll(PDO::FETCH_OBJ);
          return $result;
        } catch (PDOException $e) {
          $error = $e->getMessage();
          echo "Lỗi: ".$error;
          exit();
        }
      }
      ////////////////
  public static  function getCategoryById ($ID){
        $db = Database::getDB();
        $query = "SELECT * FROM danh_muc  WHERE ma_danhmuc=:ID";
        try {
          $statement = $db->prepare($query);
          $statement->bindValue(':ID',$ID);
          $statement->execute();
          $result = $statement->fetch(PDO::FETCH_OBJ);
          $statement->closeCursor();
          return $result;

        } catch (PDOException $e) {
          $error = $e->getMessage();
          echo "Lỗi: ".$error;
          exit();
        }
      }

    
      ///////////
  public static function deleteCategoryById($ID){
         $db = Database::getDB();
         $query = "DELETE FROM danh_muc WHERE ma_danhmuc=:ID";

         try {
        $statement = $db->prepare($query);
        $statement->bindValue(':ID',$ID);
        $statement->execute();
       $count = $statement->rowCount(); //xac định số dòng được thêm vào
        $statement->closeCursor();//đóng kết nối tới database
        return $count;
      } catch (PDOException $e) {
        $error = $e->getMessage();
        echo "Lỗi: ".$error;
        exit();
      }
    }
            /////////
  public static function edit_category($cate){
             $db = Database::getDB();
             $query = "UPDATE danh_muc SET ten_danhmuc=:name WHERE ma_danhmuc=:ID";
             try {
              $statement = $db->prepare($query);
              $statement->bindValue(':ID',$cate['id']);
              $statement->bindValue(':name',$cate['name']);
              $statement ->execute();
              $count = $statement->rowCount();
                $statement->closeCursor();//đóng kết nối tới database         
                return $count;

              } catch (PDOException $e) {
               $error = $e->getMessage();
               echo "Lỗi: ".$error;
               exit();
             }

           }
           /////////////////////
          public static function add_cate($ten_danhmuc){
            $sql="INSERT INTO danh_muc(ten_danhmuc) VALUES('$ten_danhmuc')";
            pdo_execute($sql);
          }

          
          public static function getName_cate($ma_danhmuc){
            $sql = "SELECT * FROM danh_muc WHERE ma_danhmuc =".$ma_danhmuc;
            $tenDM = pdo_query_one($sql);
            extract($tenDM);
            return $ten_danhmuc;
          }
   }

   ?>