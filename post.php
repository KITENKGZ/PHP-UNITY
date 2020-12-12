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
        <div class="container_3">
          <div class="content__header">
            <span onclick="location.href='index.php'">ВСЕ</span>
            <span id="MMA" onclick="location.href='index.php?type=NMMA'">MMA</span>
            <span id="ESPORTb" onclick="location.href='index.php?type=NESPORTS'">E-SPORTS</span>
            <span id="FIFAb" onclick="location.href='index.php?type=NFIFA'">FIFA</span>
            <?php 
                $type = $post->type;
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
                echo 'document.getElementById("newsBtn").style.color = "#FF0000";';
                echo '</script>';
            ?>
          </div>
        </div>
        <div class="circle"><div class="circle__inner"></div></div>
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
          <div class="container_5">
          <form  class="news__dialog" action="">
            <div class="news__comment"> <input type="text" placeholder="Коментарии..."> 
            <input type="button">
            </div>
            <div class="news__left">
              <div class="news__like"><input type="button"> <input type="number" placeholder="0"></div>
              <div class="news__dislike"><input type="button"> <input type="number" placeholder="0"></div>
              <div class="news__share"><input type="button"></div>
            </div>
          </form>
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