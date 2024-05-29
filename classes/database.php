<?php
class database
{
    function opencon()
    {
        return new PDO('mysql:host=localhost;dbname=ayadatabase1','root','');
    }
    function check($username,$password){
        $con = $this->opencon();
        $query = "SELECT * from admin WHERE user='".$username. "'&&pass='".$password."'";
        return $con->query($query)->fetch();
    }
    
    
    function signupUser($firstname, $lastname, $username, $password,$profilePicture)
    {
        $con = $this->opencon();
        // Save user data along with profile picture path to the database
        $con->prepare("INSERT INTO admin (firstname,lastname, user, pass, profile_picture) VALUES (?,?,?,?,?)")->execute([$firstname, $lastname, $username, $password,$profilePicture]);
        return $con->lastInsertId();
        }

    function view() {
            $con = $this->opencon();
    return $con->query("SELECT admin.admin_id, admin.firstname, admin.lastname, admin.user, admin.profile_picture from admin")->fetchAll();
}

function delete($admin_id) {
try{
    $con = $this->opencon();
        $con->beginTransaction();

        $query2 = $con->prepare("DELETE FROM admin WHERE admin_id = ?");
        $query2->execute([$admin_id]);

        $con->commit();
        return true;
} catch (PDOException $e){
    $con->rollBack();
    return false;
}
}
function viewdata($admin_id){
try{
    $con = $this->opencon();
        $query = $con->prepare("SELECT admin.admin_id,admin.firstname, admin.lastname, admin.user, admin.profile_picture WHERE admin.admin_id = ?");
        $query->execute([$admin_id]);
        return $query->fetch();
    }catch(PDOException $e){
    return [];
        }
    }
    function viewprofile($id){
        try{
            $con = $this->opencon();
                $query = $con->prepare("SELECT admin.admin_id, admin.profile_picture WHERE admin.admin_id = ?");
                $query->execute([$id]);
                return $query->fetch();
            }catch(PDOException $e){
            return [];
                }
            }
    function addCategory($type){
        $con = $this->opencon();
        //$query = $con->prepare("SELECT user FROM users WHERE user = ?");
 
        return $con->prepare("INSERT INTO category (Type) VALUES (?)")
        -> execute([ $type]);
    }
 
    function getCategoryData() {
        $con = $this->opencon();
        return $con->query("SELECT category.category_id, category.Type From category")->fetchAll();
}
    
function addProduct($name, $type, $stock, $price, $expiration, $picture)
{
    $con = $this->opencon();

    // Fetch category_id based on category type
    $stmt = $con->prepare("SELECT category_id FROM category WHERE type = ?");
    $stmt->execute([$type]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $category_id = $row['category_id'];

    // Save product data to the database
    $stmt = $con->prepare("INSERT INTO product (name, category_id, stock, price, expiration_date, picture) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $category_id, $stock, $price, $expiration, $picture]);

    return $con->lastInsertId();
}

        public function getProductData() {
            $con = $this->opencon();
            return $con->query("SELECT product.product_id, product.name, product.stock, product.price, product.expiration_date, category.type,product.picture
            FROM product
            INNER JOIN category ON product.category_id = category.category_id;")->fetchAll();
        }
}