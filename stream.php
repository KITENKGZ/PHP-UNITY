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
        <div class="content__header">
            <span>ВСЕ</span>
            <span>MMA</span>
            <span>E-SPORTS</span>
            <span>FIFA</span>
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
        <div class="content__player">
        <?=$stream->streamid;?>
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