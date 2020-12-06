<?php
  include "head.php"
?>
<body>
  <?php
    include "header.php"
  ?>
  <?php
    $post_id = $_GET['post_id'];
    settype($post_id, 'integer');
    $post = R::load('news', $post_id);
  ?>
  <main class="main">
    <div class="container-menu">
      <div class="content">
        <div class="container_2">
          <div class="content__header">
            <span>ВСЕ</span>
            <span>MMA</span>
            <span>E-SPORTS</span>
            <span>FIFA</span>
          </div>
        </div>
        <div class="content__main">
          <div class="news">
            <div class="news__header">
              <img src="<?=$post->img;?>" alt="IMG">
              <div class="news__short"><?=$post->short;?></div>
              <div class="news__bar news__bar-1"></div>
            </div>
            <div class="news__long"><?=$post->full;?></div>
            <div class="news__title"><?=$post->title;?></div>
            <div class="news__bar"></div>
          </div>
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