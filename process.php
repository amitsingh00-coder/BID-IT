<?php
require_once('config1.php');
?>

<?php
if(isset($_POST)){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO user (name, email, phone, message ) VALUES(?,?,?,?) ";
    $stmtinsert = $db->prepare($sql);
    $result = $stmtinsert->execute([$name, $email, $phone, $message]);
    if($result){
        echo 'We will revert you asap';
    }else{
        echo 'There were errors while saving the data';
    }
}else{
    echo 'No data';
    
}