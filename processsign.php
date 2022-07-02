<?php
require_once('configsign.php');
?>

<?php
if(isset($_POST)){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $location = $_POST['location'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (firstname, lastname, email, phone, location, password ) VALUES(?,?,?,?,?,?) ";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$firstname, $lastname, $email, $phone, $location, $password]);
    if($result){
        echo 'Successfully saved';
    }else{
        echo 'There were errors while saving the data';
    }
}else{
    echo 'No data';
    
}