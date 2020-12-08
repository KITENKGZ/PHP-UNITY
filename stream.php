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
            <span id="ESPORT" onclick="location.href='index.php?type=ESPORTS'">E-SPORTS</span>
            <span id="FIFA" onclick="location.href='index.php?type=FIFA'">FIFA</span>
            <?php 
                $type = $stream->type;
                if ($type == "FIFA") {
                  echo '<script type="text/javascript">';
                  echo 'document.getElementById("FIFA").style.color = "#FF0000";';
                  echo '</script>';
                } elseif ($type == "UFC") {
                  echo '<script type="text/javascript">';
                  echo 'document.getElementById("MMA").style.color = "#FF0000";';
                  echo '</script>';
                } else {
                  echo '<script type="text/javascript">';
                  echo 'document.getElementById("ESPORT").style.color = "#FF0000";';
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
            <span><?=$stream->time;?></span>
          </div>
          <div class="content__mainimg"><img src="<?=$stream->rightpic;?>"></div>
        </div>
          <div class="container__player">
            <div class="content__player">
            <?=$stream->streamid;?>
            </div>
        </div>
        <div class="content__cm">Баннер под видео</div>
        </div>
      </div>
    </div>
  </main>
  <?php
    include "menu.php"
  ?>
</body>
<?php
    include "script.php"
  ?>
</html>