<?php
  include "head.php"
?>
<body>
  <?php
    include "header.php"
  ?>
  <main class="main">
    <div class="container">
      <div class="content news-block" id="NEWS">
        <div class="container_2">
          <div class="content__header">
            <span onclick="location.href='index.php'">ВСЕ</span>
            <span id="MMA" onclick="location.href='index.php?type=NMMA'">MMA</span>
            <span id="ESPORT" onclick="location.href='index.php?type=NESPORTS'">E-SPORTS</span>
            <span id="FIFA" onclick="location.href='index.php?type=NFIFA'">FIFA</span>
          </div>
        </div>
        <div class="content__main content__news">
          <?php 
          $search = $_POST;
          $searchid = $search['id'];
          $news = R::find( 'news', 'type = ?', array($searchid) );
          $streams = R::find( 'streams', 'type = ?', array($searchid) );
          ?>
          <?php foreach( array_reverse($news) as $post): ?>
            <a href="post.php?post_id=<?=$post->id;?>">
              <div class="news-item">
                <img src="<?=$post->img;?>" alt="IMG">
                <div class="news-title"><?= mb_substr(($post->title), 0, 100, "UTF-8");?>...</div>
              </div>
            </a>
            <?php
                $i++;
                if ($i % 7 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
            <?php endforeach; ?>
            <?php foreach($streams as $stream): ?>
              <a style="text-decoration: none;" href="stream.php?stream_id=<?=$stream->id;?>">
                <div class="content__mainheader stream__item">
                  <div class="content__mainimg stream__img"><img src="<?=$stream->leftpic;?>"></div>
                  <div class="content__maininfo stream__info">
                    <span><?=$stream->title;?></span>
                    <span><?=$stream->date;?> <?=$stream->time;?></span>
                  </div>
                  <div class="content__mainimg stream__img"><img src="<?=$stream->rightpic;?>"></div>
                </div>
              </a>
            <?php
                $x++;
                if ($x % 7 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
            <?php endforeach; ?>
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
