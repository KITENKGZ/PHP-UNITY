<?php
  include "head.php"
?>
<body>
  <?php
    include "header.php"
  ?>
  <?php
    $stream_id = $_GET['stream_id'];
    settype($stream_id, 'integer');
    $stream = R::load('streams', $stream_id);
  ?>
  <main class="main">
    <div class="container">
      <div class="content">
        <div class="container_2">
        <div class="content__header">
          <span onclick="location.href='index.php?type=LIVE'">ВСЕ</span>
            <span id="MMA" onclick="location.href='index.php?type=MMA'">MMA</span>
            <span id="ESPORTb" onclick="location.href='index.php?type=ESPORTS'">E-SPORTS</span>
            <span id="FIFAb" onclick="location.href='index.php?type=FIFA'">FIFA</span>
            <?php 
                $type = $stream->type;
                if ($type == "FIFA") {
                  echo '<script type="text/javascript">';
                  echo 'document.getElementById("FIFAb").style.color = "#FF0000";';
                  echo '</script>';
                } elseif ($type == "UFC") {
                  echo '<script type="text/javascript">';
                  echo 'document.getElementById("MMA").style.color = "#FF0000";';
                  echo '</script>';
                } else {
                  echo '<script type="text/javascript">';
                  echo 'document.getElementById("ESPORTb").style.color = "#FF0000";';
                  echo '</script>';
                }
                echo '<script type="text/javascript">';
                echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
                echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
                echo '</script>';
            ?>
          </div>
          
          </div>      
        <div class="content__main">
        
        <div class="content__mainheader">
          <div class="content__mainimg"><img src="<?=$stream->leftpic;?>"></div>
          <div class="content__maininfo">
            <span><?=$stream->title;?></span>
            <span><?=date('H:i', strtotime($stream->date));?></span>
          </div>
          <div class="content__mainimg"><img src="<?=$stream->rightpic;?>"></div>
        </div>
          <div class="container__player">
            <div class="content__player">
            <?=$stream->streamid;?>
            </div>
        </div>
        <div class="content__cm">Баннер под видео</div>
        <div class="chat-wrapper">
      <textarea id="screen" class="chat-text"></textarea>
      <input id="message" class="chat-input" placeholder="Сообщение...">
      <button id="button" class="chat-send"><img src="img/send.png" alt="send"></button>
    </div>
        </div>
      </div>
    </div>
  </main>
  <?php
    include "menu.php"
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">    
  function update()
  {
    $.post("server.php", {}, function(data){ $("#screen").val(data);});   
    setTimeout('update()', 1000);
}
$(document).ready( 
function() 
    {
    update();
    $("#button").click(    
      function() 
      {         
      $.post("server.php", 
    { message: $("#message").val(),
      userid: "<?php echo $_SESSION['logged_user']->login; ?>",
      roomid: <?php echo $stream_id; ?>
    },
    function(data){ 
    $("#screen").val(data); 
    $("#message").val("");
    }
    );
      }
    );
    });
</script>
</body>
<?php
    include "script.php"
  ?>
</html>