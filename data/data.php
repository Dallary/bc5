<h1>Все данные о пользователях</h1>
<div>
<table border='1'>
    <tr>
      <td>Идентификатор</td>
      <td>ФИО</td>
      <td>Телефон</td>
      <td>Почта</td>
      <td>Дата рождения</td>
      <td>Пол</td>
      <td>Языки програмирования</td>
    </tr>
    <?php
    $host='localhost';
    $user = 'u10000';
    $pass = 'WERFef535t';
    $db_name='u10000';
    $link =mysqli_connect($host,$user,$pass,$db_name);

    mysqli_set_charset($link,'utf8');
    
      $sql = mysqli_query($link, 'SELECT * FROM user1');
      
      while ($result = mysqli_fetch_array($sql)) {
        $lang=mysqli_query($link, "SELECT lang FROM lang WHERE(user_id='{$result['id']}');");
        echo '<tr>' .
             "<td>{$result['id']}</td>" .
             "<td>{$result['name']}</td>" .
             "<td>{$result['tel']} </td>" .
             "<td>{$result['email']} </td>" .
             "<td>{$result['year']} </td>" .
             "<td>{$result['gender']} </td>" ;
             
             echo "<td>";
             while ($res = mysqli_fetch_array($lang)){
              echo $res['lang'].' ';
            }
            echo"</td>";
        echo  "<td><a href='?del_id={$result['id']}'>Удалить</a></td>".'</tr>';    
      }
      if (isset($_GET['del_id'])) {
        $id = $_GET['del_id'];
        settype($id, 'integer');
        //$id = $mysqli->real_escape_string($_GET['del_id']); 
        // $lang=mysqli_query($link, "DELETE FROM lang WHERE user_id={$_GET['del_id']}");
        // $sql = mysqli_query($link, "DELETE FROM user1 WHERE id = {$_GET['del_id']}");
        $lang=mysqli_query($link, "DELETE FROM lang WHERE user_id='$id'");
        $sql = mysqli_query($link, "DELETE FROM user1 WHERE id ='$id'");
        
      }
?>
</table>
</div>
