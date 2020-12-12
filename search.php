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
            <span id="ESPORTb" onclick="location.href='index.php?type=NESPORTS'">E-SPORTS</span>
            <span id="FIFAb" onclick="location.href='index.php?type=NFIFA'">FIFA</span>
          </div>
        </div>
        
        <?php
          function dump($what) {
            echo '<pre>';print_r($what);echo '</pre>';
          }
          ?>
          <div class="circle"><div class="circle__inner"></div></div>
        <div class="content__main content__news">
          <?php 
          $search = $_GET['search'];
          $news = R::find('news', 'title LIKE ?', ["%$search%"], ' ORDER BY datatime');
          if(!($news)) {
            $news = R::find('news', 'short LIKE ?', ["%$search%"], ' ORDER BY datatime');
            if(!($news)) {
              $news = R::find('news', 'full LIKE ?', ["%$search%"], ' ORDER BY datatime'); 
            } 
          } $streams =R::find('streams', 'title LIKE ?', ["%$search%"], ' ORDER BY date');
          $none = true;
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
                if ($i % 10 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
                  $none = false;
              } 
            ?>
            <?php endforeach; ?>
            <?php foreach($streams as $stream): ?>
              <a style="text-decoration: none;" href="stream.php?stream_id=<?=$stream->id;?>">
                <div class="content__mainheader stream__item">
                  <div class="content__mainimg stream__img"><img src="<?=$stream->leftpic;?>"></div>
                  <div class="content__maininfo stream__info">
                    <span><?=$stream->title;?></span>
                    <span><?=date('H:i d-m-Y', strtotime($stream->date));?></span>
                  </div>
                  <div class="content__mainimg stream__img"><img src="<?=$stream->rightpic;?>"></div>
                </div>
              </a>
            <?php
                $x++;
                if ($x % 10 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
                  $none = false;
              } 
            ?>
            <?php endforeach; ?>
            <?php 
            if($none) {
              echo "<span>По зарпосу {$name} ничего не найдено.</span>"; 
            }
            ?>
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
