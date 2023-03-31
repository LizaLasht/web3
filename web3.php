<?php
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }

  include('index.php');
  // Завершаем работу скрипта.
  exit();
}

// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['name'])) {
  print('Введите имя.<br/>');
  $errors = TRUE;
}

if (empty($_POST['email']) ||  !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
  print('Введите почту.<br/>');
  $errors = TRUE;
}
if (empty($_POST['year'])) {
  print('Выберите год.<br/>');
  $errors = TRUE;
}
if (empty($_POST['gender']) || !($_POST['gender']=='m' || $_POST['gender']=='w')) {
  print('Выберите пол.<br/>');
  $errors = TRUE;
}
if (empty($_POST['limbs'])) {
  print('Выберите количество конечностей.<br/>');
  $errors = TRUE;
}

if (empty($_POST['bio'])) {
    print('Заполните биографию.<br/>');
    $errors = TRUE;
  }
  
  if (empty($_POST['go']) || !($_POST['go'] == 'on' || $_POST['go'] == 1)) {
    print('Поставьте галочку "С контрактом ознакомлен(а)".<br/>');
    $errors = TRUE;
  }
  

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}

 $user = 'u52812'; 
$pass = '8438991';
$db = new PDO('mysql:host=localhost;dbname=u52812', $user, $pass, [PDO::ATTR_PERSISTENT => true]); 

try {
    $stmt = $db->prepare("INSERT INTO person (name, email, year, gender, limbs, bio) VALUES (:name, :email, :year, :gender, :limbs, :bio);");
    $stmtErr=$stmt -> execute(['name'=>$_POST['name'],  'email' => $_POST['email'], 'year'=>$_POST['year'], 'gender'=> $_POST['gender'], 'limbs'=> $_POST['limbs'],'bio'=>$_POST['bio'] ]);
    $strId = $db -> lastInsertId();
    
    if (isset($_POST['field-name-2'])) {
        foreach ($_POST['field-name-2'] as $superpower) {
            switch ($superpower) 
            {
                case "Value 1":
                    $stmt = $db -> prepare("INSERT INTO person_superpower (p_id, sup_id) VALUES (:p_id, :sup_id);");
                    $stmtErr = $stmt -> execute(['p_id' => intval($strId), 'sup_id' => 1]);
                    break;
                case "Value 2":
                    $stmt = $db -> prepare("INSERT INTO person_superpower (p_id, sup_id) VALUES (:p_id, :sup_id);");
                    $stmtErr = $stmt -> execute(['p_id' => intval($strId), 'sup_id' => 2]);
                    break;
                case "Value 3":
                    $stmt = $db -> prepare("INSERT INTO person_superpower (p_id, sup_id) VALUES (:p_id, :sup_id);");
                    $stmtErr = $stmt -> execute(['p_id' => intval($strId), 'sup_id' => 3]);
                    break;
            }
        }
    }
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}
    
header('Location: ?save=1');
?>
