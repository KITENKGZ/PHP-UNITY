<?
$dbhost = 'localhost';
$dbuser = 'u1225152_chat';
$dbpass = '10151018Kama';
$dbname = 'u1225152_chats';
$userid = $_POST['userid'];
$roomid = $_POST['roomid'];
while($roomid) {
  $room = $roomid;
}
echo $userid;
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$link) {
  echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
  echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}

$query = "SELECT ID FROM `$room`";
$result = mysqli_query($link, $query);

if(empty($result)) {
                $query = "CREATE TABLE `$dbname`.`$room` ( `id` INT NOT NULL AUTO_INCREMENT , `userid` TINYTEXT NOT NULL , `msg` TINYTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;";
                $result = mysqli_query($link, $query);
}

$message = $_POST['message'];
if($message != "")
  {
  $sql = "INSERT INTO `$room` (`id`, `userid`, `msg`) VALUES (NULL, '$userid', '$message')";
  $result = mysqli_query( $link,$sql) or trigger_error(mysqli_error($link));
  }
  $sql = "SELECT * FROM `$room` ORDER BY `id` ASC";
  $result = mysqli_query($link, $sql);
  while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
  $user = $row[1];
  $msg = $row[2];
  echo "$user".": "."$msg"."\n";
  }
?>