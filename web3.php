<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

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
if (empty($_POST['pol']) || !($_POST['pol']=='м' || $_POST['pol']=='ж')) {
  print('Выберите пол.<br/>');
  $errors = TRUE;
}
if (empty($_POST['kolvo']) || !is_numeric($_POST['kol-vo']) || ($_POST['kol-vo']<2) || ($_POST['kol-vo']>4)) {
  print('Выберите количество конечностей.<br/>');
  $errors = TRUE;
}

if (empty($_POST['bio'])) {
    print('Заполните биографию.<br/>');
    $errors = TRUE;
  }
  
  if (empty($_POST['info']) || !($_POST['informed'] == 'on' || $_POST['informed'] == 1)) {
    print('Поставьте галочку "С контрактом ознакомлен(а)".<br/>');
    $errors = TRUE;
  }
  

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}
