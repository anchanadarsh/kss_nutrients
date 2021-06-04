<?php
class Models
{
    private $conn;
    function __construct() {
        require_once dirname(__FILE__) . '/connect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
    //    Mohit Jindal : This function is getting the values of image which is uploded through the admin and save it in the database.
    public function Login($Email,$Password){
       try{
            $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = :Email AND password = :Password");
            $stmt->bindParam(":Email", $Email, PDO::PARAM_STR, 100);
            $stmt->bindParam(":Password", $Password, PDO::PARAM_STR, 100);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            //echo $stmt->rowCount();
            if($stmt->rowCount() > 0){
               session_start();
               $UserID = $result['id'];
               $_SESSION['user_session'] = array( 'UserID' => $UserID);
               return $UserID; 
            } else {
                return false;
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function is_loggedin(){
     if(isset($_SESSION['user_session'])){
         return true;
     }
    }

    public function redirect($url){
        header("Location: $url");
    }

    public function logout(){
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    public function GetContactEnquiry(){
        try{
           $stmt = $this->conn->prepare("SELECT * FROM contact_us ORDER BY id DESC");    
           $stmt->execute();

          while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
              $res["id"] = $result['id'];
              $res["fullname"] = $result['fullname'];
              $res["cmpname"] = $result['cmpname'];
              $res["email"] = $result['email'];
              $res["message"] = $result['message'];
              $res["created_at"] = $result['created_at'];
              $list[] = $res;
          }
            if($stmt->rowCount() > 0){   
                // $PortfolioID = $result['PortfolioID'];
                // $PortfolioName = $result['PortfolioName'];
                return $list; 
            } else {
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    public function GetNewsletterEnquiry(){
       try{
           $stmt = $this->conn->prepare("SELECT * FROM newsletter ORDER BY id DESC");                
           $stmt->execute();

          while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
              $res["id"] = $result['id'];
              $res["email_id"] = $result['email_id'];
              $res["created_at"] = $result['created_at'];
              $list[] = $res;
          }

            if($stmt->rowCount() > 0){   
                // $PortfolioID = $result['PortfolioID'];
                // $PortfolioName = $result['PortfolioName'];
                return $list; 
            } else {
                return false;
            }
       }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
