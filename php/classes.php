<?php
require('../core/connect.php'); //connection to database stored in this file

class UserLogin{

    //define class variables
    private $uname;
    private $pword;
    private $dbconn; //MySQLI connection to database

    //constructor - mysqli escape string function used to prevent SQL Injection attacks
    public function __construct($dbconn, $uname, $pword){
        $this->dbconn = $dbconn;
        $this->uname = mysqli_real_escape_string($this->dbconn, $uname);
        $this->pword = mysqli_real_escape_string($this->dbconn, $pword);  
    }

    public function validateLogin(){
        //SQL Query                                                    v Place holders for prepared statement
        $q = "SELECT username, pword FROM userAccount WHERE username = ? OR email = ?";
        //Prepare statement
        $stmt = $this->dbconn->stmt_init();
        if (!$stmt->prepare($q)){
            echo "<div class='login-error'>Could not log in at this time</div>"; //if preparing statement fails show error message
        } else{
            $stmt->bind_param("ss", $this->uname, $this->uname); //fill placeholders with username and password
            $stmt->execute(); //execute statement
            $result = $stmt->get_result(); //save result of statement
            $row = $result->fetch_assoc(); //fetch result as an associative array
            if (empty($row)){ //check if array is empty or not
                echo "<div class='login-error'>Account with this username does not exist</div>";
                exit(); //if array is empty echo error message and exit()
            } else{
                $checkPword = password_verify($this->pword, $row['pword']); // checkPword = true if password is correct
                if($checkPword == false){ //if flase then the login is unsuccessful, if true then the login was successful
                    echo "<div class='login-error'>Incorrect password</div>";
                    exit();
                } else{
                    $_SESSION['loggedInUser'] = $this->uname; //set a session variable so that the website keeps user logged in
                    header('Location: home.php');
                } 
            }      
        }                
    }        
}

   

class UserRegister{

    //define class variables
    private $email;
    private $uname;
    private $pword;
    private $confPword;
    private $firstName;
    private $surname;
    private $dbconn;

    //constructor - mysqli escape string function used to prevent SQL Injection attacks
    public function __construct($dbconn, $email, $uname, $pword, $confPword, $firstName, $surname) {
        $this->dbconn = $dbconn;
        $this->email = mysqli_real_escape_string($this->dbconn, $email);
        $this->uname = mysqli_real_escape_string($this->dbconn, $uname);
        $this->pword = mysqli_real_escape_string($this->dbconn, $pword);
        $this->confPword = mysqli_real_escape_string($this->dbconn, $confPword);
        $this->firstName = mysqli_real_escape_string($this->dbconn, $firstName);
        $this->surname = mysqli_real_escape_string($this->dbconn, $surname);
        $this->pword_hash = password_hash($this->pword, PASSWORD_DEFAULT);
        $this->errors = 0;
    }

    //check to see if the username is already in the database
    public function checkUsername() { 
        //prepared statement for username query
        $unameQuery = "SELECT username FROM userAccount WHERE username = ?";
        $unameStmt = $this->dbconn->stmt_init();
        if (!$unameStmt->prepare($unameQuery)){
            echo "<div class='register-error'>Error with registration</div>"; //if statement fails echo error message
            $this->errors = $this->errors + 1;
            exit();
        } else{
            $unameStmt->bind_param("s", $this->uname); //fill placeholders with username
            $unameStmt->execute(); //execute statement
            $unameResult = $unameStmt->get_result(); //save result of statement
            $count = $unameResult->num_rows;
            if ($count >= 1){//if count is 1 or more then the username is already taken
                echo "<div class='register-error'>Username already taken</div>";
                $this->errors = $this->errors + 1;
                exit();
            } else{
                return;
            }
        }
    }    
    
    //check that the email address is not assigned to another account
    public function checkEmail(){
        //prepared statement for username query
        $mailQuery = "SELECT email FROM userAccount WHERE username = ?";
        $mailStmt = $this->dbconn->stmt_init();
        if (!$mailStmt->prepare($mailQuery)){
            echo "<div class='register-error'>Error with registration</div>"; //if statement fails echo error message
            $this->errors = $this->errors + 1;
            exit();
        } else{
            $mailStmt->bind_param("s", $this->email); //fill placeholders with email address
            $mailStmt->execute(); //execute statement
            $mailResult = $mailStmt->get_result(); //save result of statement
            $count = $mailResult->num_rows;
            if ($count >= 1){//if count is 1 or more then the email address is already in use
                echo "<div class='register-error'>The email address provided is linked with another account</div>";
                $this->errors = $this->errors + 1;
                exit();
            } else{
                return;
            }
        }
    }
    
    public function checkPassword(){
        //check to see if the passwords match
        if ($this->pword != $this->confPword){ //if password is not the same as confirm password echo error
            echo "<div class='register-error'>Passwords do not match</div>";
            $this->errors = $this->errors + 1;
            exit();
        } else {
            return;
        }
    }

    public function createUser(){
        //insert the new user into the database
        //prepared statement for table insert
        $insertQuery = "INSERT INTO userAccount (username, pword, firstName, surname, email, adminUser) VALUES(?, ?, ?, ?, ?, 'n')";
        $insertStmt = $this->dbconn->stmt_init();
        if (!$insertStmt->prepare($insertQuery)){
            echo "<div class='register-error'>Could not complete sign up</div>"; //if statement fails echo error message
            exit();
        } else {
            $insertStmt->bind_param('sssss', $this->uname, $this->pword_hash, $this->firstName, $this->surname, $this->email);//fill placeholders
            $insertStmt->execute();//execute statement
            //new prepared statement to check the user was successfully added to the database
            $checkQuery = "SELECT username FROM userAccount WHERE username = ?";
            $checkStmt = $this->dbconn->stmt_init();
            if (!$checkStmt->prepare($checkQuery)){//if statement fails echo error message
                echo "statement error";
                exit();
            } else{
                $checkStmt->bind_param("s", $this->uname); //fill placeholders
                $checkStmt->execute();//execute statement
                $checkResult = $checkStmt->get_result();//save result
                $count = $checkResult->num_rows; //if number of rows found is less than one the insert was unsuccessful
                if ($count == 0){
                    echo "<div class='register-error'>Could not complete sign up</div>";
                    exit();
                } else{
                    header('Location: login_form.php'); //if sign up was successful, direct user to the login page
                    return;
                }
            }
        }
    }
}

class DisplayProduct{
    public function __construct($dbconn){
        $this->dbconn = $dbconn;
        $this->featuredProducts = [];
    }

    public function getFeaturedProducts($sql){ //takes sql statement as parameter
        $productStmt = $this->dbconn->stmt_init();
        if (!$productStmt->prepare($sql)){
            echo "<div class='register-error'>Nothing to show</div>"; //if statement fails echo error message
            exit();
        } else {
            $productStmt->execute();
            $result = $productStmt->get_result();
            while($row = $result->fetch_row()){
                $prodID = $row[0];
                $prodName = $row[1];
                $prodBrand = $row[2];
                $prodPrice = $row[6];
                $prodImg = $row[7];
                $product = [$prodID, $prodName, $prodBrand, $prodPrice, $prodImg]; //append required data to an array
                array_push($this->featuredProducts, $product);//append that array to another array that can be displayed
            }
        }    
    }
}

class Order{
    public function __construct($dbconn){
        $this->productName = '';
        $this->productBrand = '';
        $this->productPrice = 0;
        $this->productStock = 0;
        $this->productImg = '';
        $this->dbconn = $dbconn;
        $this->index = 0;
        $this->inCart = 0;
        $this->prodID = 0;
        $this->eachProduct = [];
        $this->itemArray = [];
    }

    public function retrieveProduct(){
        $this->prodID = $_POST['prodID'];
        $sql = "SELECT * FROM product WHERE productID = ?";
        $sqlStmt = $this->dbconn->stmt_init();
        if(!$sqlStmt->prepare($sql)){
            echo 'error';
            exit();
        } else{
            $sqlStmt->bind_param('i', $this->prodID);
            $sqlStmt->execute();
            $result = $sqlStmt->get_result();
            $assoc = mysqli_fetch_assoc($result);
            //print_r('assoc: '.$assoc['productName']);
            $this->productName = $assoc['productName'];
            $this->productBrand = $assoc['productBrand'];
            $this->productPrice = $assoc['price'];
            $this->productStock = $assoc['stock'];
            $this->productImg = $assoc['productImage'];
            array_push($this->eachProduct, array($assoc['productName'], $assoc['productBrand'], $assoc['price'], $assoc['stock'], $assoc['productImage']));
            //print_r($this->eachProduct);
        }
    }

    public function addToCart($productID){
        global $itemArray;
        $this->prodID = $productID;
        if(!isset($_SESSION['cartArr']) || count($_SESSION['cartArr']) < 1){ //check to see if cart is empty or doesn't exist
            $itemArray = array('product' => $this->prodID, 'quantity' => 1);
            $_SESSION['cartArr'] = array($itemArray);
            unset($itemArray);//unset item array ready for the next time user adds anothr item to basket
        } else{ 
            $productIDs = array_column($_SESSION['cartArr'], 'product');
            if(in_array($this->prodID, $productIDs)){//check to see if the item is already in the cart
                return null; //return false so we can echo error message on product page
            } else{
                $count = count($_SESSION['cartArr']);//count = number of products in shopping cart
                $itemArray = array('product' => $this->prodID, 'quantity' => 1);
                array_push($_SESSION['cartArr'], $itemArray);
                unset($itemArray);//unset item array ready for the next time user adds anothr item to basket
            }
        }
    }
            
    public function emptyCart(){
        unset($_SESSION['cartArr']);
    }

    public function displayProducts($productImg, $productName, $productBrand, $productPrice, $quantity){
        if(!isset($_SESSION['cartArr']) || count($_SESSION['cartArr']) < 1){ //if Cart SESSION does not exist or is empty echo shopping cart is empty
            echo 'There are no items in your cart';
        } else{
            $this->eachProduct = '
            <tr>
                <td>'.$productImg.'</td>
                <td>'.$productName.'</td>
                <td>'.$productBrand.'</td>
                <td>'.$productPrice.'</td>
                <td>'.$quantity.'</td>
            </tr>';
            }
        }
    

    public function clearCart(){
        unset($_SESSION['cartArr']);
    }
}

  