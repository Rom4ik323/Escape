<?php
try {

    $conn = new PDO( dsn: "mysql:host=localhost;dbname=testDB", username:'root@localhost' passwd:'');

    if(empty($_POST['name'])) exit("Поле не заполнено, олень");
    if(empty($_POST['content'])) exit("Поле не заполнено, олень");

    $query = "INSERT INTO message VALUES (NULL , :name, NOW())";
    $msg = $conn->prepare($query);
    $msg->execute(['name' => $_POST['name']]);

    $msg_id = $conn->lastInsertId();
    $query = "INSERT INTO message_content VALUES (NULL , :content, :message_id)";
    $msg = $conn->prepare($query);
    $msg->execute(['content' => $_POST['content'], 'message_id' => $msg_id]);


}

catch (PDOException $e){
  echo "error";
}

 ?>
