<?php

    session_start();

    if (isset($_SESSION['logged_user'])): 
    require_once("../../dbcon.php");
    $name = cleanInput($stream->title);
    $file =  $stream['file'];   	
    while ($rooms = mysql_fetch_array($roomResults)) {
        $file =  $rooms['chatid'];
      }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title><?php echo $name; ?></title>
    
    <link rel="stylesheet" type="text/css" href="../main.css"/>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="chat.js"></script>
    <script type="text/javascript">
        var chat = new Chat('<?php echo $file; ?>');
        chat.init();
        chat.getUsers(<?php echo "'" . $name ."','" .$_SESSION['logged_user'] . "'"; ?>);
        var name = '<?php echo $_SESSION['logged_user'];?>';
    </script>
    <script type="text/javascript" src="settings.js"></script>

</head>

<body>

    <div id="page-wrap"> 
    
    	<div id="header">
    	
        	<h1><a href="/examples/Chat2/">Chat v2</a></h1>   	
        </div>
        
    	<div id="section">
    
            <h2><?php echo $name; ?></h2>
                     
            <div id="chat-wrap">
                <div id="chat-area"></div>
            </div>
            
            <div id="userlist"></div>
                
                <form id="send-message-area" action="">
                    <textarea id="sendie" maxlength='100'></textarea>
                </form>
            
        </div>
        
    </div>
        
</body>

</html>
