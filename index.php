<!DOCTYPE html>
  <html lang="ru">
<head>
  <title>Задание 3</title>
 <link  href="style.css" rel="stylesheet" type="text/css">
</head>
  <body>
    <h2>Форма</h2>
    <form action="web3.php" method="POST">
    <label>
        Имя:<br/>
    <input type="text"  name="name"  placeholder="Введите имя">
    </label><br/>
    <label>
        email:<br/>
    <input name="email" type="email" placeholder="Введите email">
    </label><br/>
        Дата рождения:<br/>
      <label><input name="year" type="date" value="2003-07-29">
     </label><br/>
        Пол:<br/>
    <label><input type="radio" name="gender" value='w'> Женщина </label> 
    <label><input type="radio" name="gender" value='m'> Мужчина  
    </label><br/>
        Количество конечностей :<br/>
    <label><input type="radio" name="limbs"> 2 </label> 
    <label><input type="radio" name="limbs"> 3 </label> 
    <label><input type="radio" name="limbs"> 4 </label><br/>
    <label>
        Сверхспособности:<br/>
    <select name="field-name-2[]" multiple="multiple">
    <option value="Value 1">Бессмертие</option>
    <option value="Value 2">Прохождение сквозь стены</option>
    <option value="Value 3">Левитация</option> </select>
    </label><br/>
    <label>  
       Биография:<br/>
    <textarea name="bio" placeholder="Введите текст"> </textarea>
    </label><br>
    <label>
        <input type="checkbox"  name="go"> C контрактом ознакомлен(a)
    </label><br/>
    <input type="submit" value="Отправить">
    </form>
</body>
</html>
