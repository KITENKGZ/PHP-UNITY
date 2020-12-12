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
              <span id="NewsAllBtn" onclick="show('ALLNEWS'); hide('UFCNEWS'); hide('ESPORTNEWS'); hide('FIFANEWS'); paint('NewsAllBtn'); painta('NewsUfcBtn'); painta('NewsEsportBtn'); painta('NewsFifaBtn')" class="all-btn">ВСЕ</span>
              <span id="NewsUfcBtn" onclick="show('UFCNEWS'); hide('ALLNEWS'); hide('ESPORTNEWS'); hide('FIFANEWS'); paint('NewsUfcBtn'); painta('NewsAllBtn'); painta('NewsEsportBtn'); painta('NewsFifaBtn')" class="ufc-btn">MMA</span>
              <span id="NewsEsportBtn" onclick="show('ESPORTNEWS'); hide('UFCNEWS'); hide('ALLNEWS'); hide('FIFANEWS'); paint('NewsEsportBtn'); painta('NewsAllBtn'); painta('NewsUfcBtn'); painta('NewsFifaBtn')" class="esport-btn">E-SPORTS</span>
              <span id="NewsFifaBtn" onclick="show('FIFANEWS'); hide('UFCNEWS'); hide('ALLNEWS'); hide('ESPORTNEWS'); paint('NewsFifaBtn'); painta('NewsAllBtn'); painta('NewsUfcBtn'); painta('NewsEsportBtn')" class="fifa-btn">FIFA</span>
            </div>
          </div>
          <div class="circle"><div class="circle__inner"></div></div>
          
        <!--здесть должен быть блок-->
        <div class="content__main content__news">
          <?php
          function dump($what) {
            echo '<pre>';print_r($what);echo '</pre>';
          }
          ?>
          <div id="ALLNEWS">
            <?php
            $news = R::findAll('news',
            ' ORDER BY datatime LIMIT 9999 ');
            $i = 0;
            ?>
            <?php foreach( array_reverse($news) as $post): 
              if ($post->id != 0) { ?>
              
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
              } 
            ?>
            <?php }  
          endforeach;?>
          </div>
          <div id="UFCNEWS" class="none">
            <?php
              $newsufc = R::find( 'news', 'type = ?', array("UFC"), ' ORDER BY datatime' );
              $u = 0;
            ?>
              <?php foreach( array_reverse($newsufc) as $postufc): 
                if ($postufc->id != 0) { ?>
                <a href="post.php?post_id=<?=$postufc->id;?>">
              <div class="news-item">
                <img src="<?=$postufc->img;?>" alt="IMG">
                <div class="news-title"><?= mb_substr(($postufc->title), 0, 100, "UTF-8");?>...</div>
              </div>
            </a>
            <?php
                $u++;
                if ($u % 10 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
              <?php }  
          endforeach;?>
          </div>
          <div id="ESPORTNEWS" class="none">
          <?php
              $newse = R::find( 'news', 'type = ?', array("ESPORT"), ' ORDER BY datatime' );
              $y = 0;
            ?>
              <?php foreach( array_reverse($newse) as $poste):
              if ($poste->id != 0) { ?>
                <a href="post.php?post_id=<?=$poste->id;?>">
              <div class="news-item">
                <img src="<?=$poste->img;?>" alt="IMG">
                <div class="news-title"><?= mb_substr(($poste->title), 0, 100, "UTF-8");?>...</div>
              </div>
            </a>
            <?php
                $y++;
                if ($y % 10 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
              <?php }  
          endforeach;?>
          </div>
          <div id="FIFANEWS" class="none">
          <?php
              $newsfifa = R::find( 'news', 'type = ?', array("FIFA"), ' ORDER BY datatime' );
              $t = 0;
            ?>
              <?php foreach( array_reverse($newsfifa) as $postfifa):
              if ($postfifa->id != 0) { ?>
                <a href="post.php?post_id=<?=$postfifa->id;?>">
              <div class="news-item">
                <img src="<?=$postfifa->img;?>" alt="IMG">
                <div class="news-title"><?= mb_substr(($postfifa->title), 0, 100, "UTF-8");?>...</div>
              </div>
            </a>
            <?php
                $t++;
                if ($t % 10 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
              <?php }  
          endforeach;?>
          </div>
        </div>
      </div>
      <div class="content stream-block" id="STREAM">
      <div class="container_2">
        <div class="content__header">
          <span id="allBtn" onclick="show('ALL'); hide('UFC'); hide('ESPORT'); hide('FIFA'); paint('allBtn'); painta('ufcBtn'); painta('esportBtn'); painta('fifaBtn')" class="all-btn">ВСЕ</span>
          <span id="ufcBtn" onclick="show('UFC'); hide('ALL'); hide('ESPORT'); hide('FIFA'); paint('ufcBtn'); painta('allBtn'); painta('esportBtn'); painta('fifaBtn')" class="ufc-btn">MMA</span>
          <span id="esportBtn" onclick="show('ESPORT'); hide('UFC'); hide('ALL'); hide('FIFA'); paint('esportBtn'); painta('allBtn'); painta('ufcBtn'); painta('fifaBtn'); showf('esport_inner'); hide('esport_stream')" class="esport-btn">E-SPORTS</span>
          <span id="fifaBtn" onclick="show('FIFA'); hide('UFC'); hide('ALL'); hide('ESPORT'); paint('fifaBtn'); painta('allBtn'); painta('ufcBtn'); painta('esportBtn'); showf('fifa_inner'); hide('fifa_stream')" class="fifa-btn">FIFA</span>
        </div>  
        </div>
        <div class="circle"><div class="circle__inner"></div></div>
        <div class="content__main content__news">
          <div id="ALL">
          <?php
            $numOfStream = R::count( 'streams' ); 
            $countStreams = range(1,$numOfStream);
            $streams = R::findAll('streams',
            ' ORDER BY date');
            $streammma = R::find( 'streams', 'type = ?', array("UFC"), ' ORDER BY date' );
            $streamesports = R::find( 'streams', 'type = ?', array("ESPORT"), ' ORDER BY date' );
            $streamfifa = R::find( 'streams', 'type = ?', array("FIFA"), ' ORDER BY date' );
            $x = 0;
            ?>
            <?php foreach($streams as $stream):
            if ($stream->id != 0) { ?>
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
              } 
            ?>
            <?php } endforeach; ?>
          </div>
          <div id="UFC" class="none">
            <?php 
            $z = 0;
            ?>
          <?php foreach($streammma as $stream):
          if ($stream->id != 0) { ?>
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
                $z++;
                if ($z % 10 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
            <?php } endforeach; ?>
          </div>
          <div  id="ESPORT" class="ESPORT">
            <div class="sport__inner" id="esport_inner">
              <div class="game__block"> <a href="index.php?type=LIVE&liga=cs" > <img src="img/stream/csgo.png" alt="csgo"> </a></div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=dt" > <img src="img/stream/dota2.png" alt="dota"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=cdm" > <img src="img/stream/codm.png" alt="cod"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=pubgm" > <img src="img/stream/pubg_m.png" alt="pubgm"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=ml" > <img src="img/stream/mlbb.png" alt="mlbb"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=lolm" > <img src="img/stream/lol.png" alt="lolm"> </a> </div>
              </div>
              <div id="esport_stream">
              <?php 
              $stream_liga = $_GET['liga'];
              $streamother = R::find( 'streams', 'liga = ?', array($stream_liga) );
              $c = 0;
              ?>
              <?php foreach($streamother as $stream): 
                if ($post->id != 0) { ?>
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
                $c++;
                if ($c % 10 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
            <?php } endforeach; ?>
            </div>
            </div>
          <div id="FIFA" class="FIFA">
          <div class="sport__inner" id="fifa_inner">
              <div class="game__block"> <a href="index.php?type=LIVE&liga=lc" > <img src="img/fifa/lc.png" alt="lc"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=le" > <img src="img/fifa/le.png" alt="le"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=pl" > <img src="img/fifa/pl.png" alt="pl"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=ll" > <img src="img/fifa/ll.png" alt="ll"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=rpl" > <img src="img/fifa/rplb.png" alt="rpl"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=bl" > <img src="img/fifa/bl.png" alt="bl"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=l1" > <img src="img/fifa/l1.png" alt="l1"> </a> </div>
              <div class="game__block"> <a href="index.php?type=LIVE&liga=sa" > <img src="img/fifa/saa.png" alt="sa"> </a> </div>
              </div>
              <div id="fifa_stream">
              <?php 
              $stream_liga = $_GET['liga'];
              $streamother = R::find( 'streams', 'liga = ?', array($stream_liga) );
              $c = 0;
              ?>
              <?php foreach($streamother as $stream): 
                if ($post->id != 0) { ?>
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
                $c++;
                if ($c % 10 == 0) { 
                  echo "<div class='news-cm'>Место для вашей рекламы</div>";
              } 
            ?>
            <?php } endforeach; ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php
    include "menu.php"
  ?>
    <!-- Прелоадер -->
<div class="preloader"> 
  <div class="preloader__image"> 
    <div class="preloader__change">
      <img src="img/preload/usport.png" alt="usport">
      <img src="img/preload/unews.png" alt="unews">
      <img src="img/preload/uwork.png" alt="uwork">
      <img src="img/preload/ustat.png" alt="ustat">
    </div>
  </div>
</div>
<?php 
  $type = $_GET['type'];
  $liga = $_GET['liga'];
    if($type == "NMMA") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("ALLNEWS").style.display = "none";';
      echo 'document.getElementById("NEWS").style.display = "block";';
      echo 'document.getElementById("UFCNEWS").style.display = "block";';
      echo 'document.getElementById("NewsUfcBtn").style.color = "#FF0000";';
      echo 'document.getElementById("NewsAllBtn").style.color = "#FFFFFF";';
      echo '</script>';        
    } else if($type == "NESPORTS") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("ALLNEWS").style.display = "none";';
      echo 'document.getElementById("NEWS").style.display = "block";';
      echo 'document.getElementById("ESPORTNEWS").style.display = "block";';
      echo 'document.getElementById("NewsEsportBtn").style.color = "#FF0000";';
      echo 'document.getElementById("NewsAllBtn").style.color = "#FFFFFF";';
      echo '</script>';        
    } else if($type == "NFIFA") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("ALLNEWS").style.display = "none";';
      echo 'document.getElementById("NEWS").style.display = "block";';
      echo 'document.getElementById("FIFANEWS").style.display = "block";';
      echo 'document.getElementById("NewsFifaBtn").style.color = "#FF0000";';
      echo 'document.getElementById("NewsAllBtn").style.color = "#FFFFFF";';
      echo '</script>';
    }
    if($type == "MMA") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "none";';
      echo 'document.getElementById("STREAM").style.display = "block";';
      echo 'document.getElementById("ALL").style.display = "none";';
      echo 'document.getElementById("UFC").style.display = "block";';
      echo 'document.getElementById("ufcBtn").style.color = "#FF0000";';
      echo 'document.getElementById("allBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
      echo '</script>';        
    } else if($type == "ESPORTS") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "none";';
      echo 'document.getElementById("STREAM").style.display = "block";';
      echo 'document.getElementById("ALL").style.display = "none";';
      echo 'document.getElementById("FIFA").style.display = "none";';
      echo 'document.getElementById("ESPORT").style.display = "block";';
      echo 'document.getElementById("esportBtn").style.color = "#FF0000";';
      echo 'document.getElementById("allBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
      echo '</script>';         
    } else if($type == "FIFA") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "none";';
      echo 'document.getElementById("STREAM").style.display = "block";';
      echo 'document.getElementById("ALL").style.display = "none";';
      echo 'document.getElementById("ESPORT").style.display = "none";';
      echo 'document.getElementById("FIFA").style.display = "block";';
      echo 'document.getElementById("fifaBtn").style.color = "#FF0000";';
      echo 'document.getElementById("allBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FF0000";';
      echo '</script>';  
    } else if($type == "NEWS") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "block";';
      echo 'document.getElementById("STREAM").style.display = "none";';
      echo 'document.getElementById("NewsAllBtn").style.color = "#FF0000";';
      echo 'document.getElementById("NewsFifaBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("NewsEsportBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("NewsUfcBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("newsBtn").style.color = "#FF0000";';
      echo 'document.getElementById("streamBtn").style.color = "#FFFFFF";';
      echo '</script>';
    } else if($type == "LIVE") {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("NEWS").style.display = "none";';
      echo 'document.getElementById("STREAM").style.display = "block";';
      echo 'document.getElementById("allBtn").style.color = "#FF0000";';
      echo 'document.getElementById("fifaBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("esportBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("ufcBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
      echo '</script>';
    }
    if($liga) {
      echo '<script type="text/javascript">';
      echo 'document.getElementById("ALL").style.display = "none";';
      echo 'document.getElementById("ESPORT").style.display = "none";';
      echo 'document.getElementById("FIFA").style.display = "none";';
      echo 'document.getElementById("allBtn").style.color = "#FFFFFF";';
      echo 'document.getElementById("streamBtn").style.color = "#FF0000";';
      echo 'document.getElementById("newsBtn").style.color = "#FFFFFF";';
      if($liga == "lc" || $liga == "le" || $liga == "pl" || $liga == "ll" || $liga == "rpl" || $liga == "bl" || $liga == "l1" || $liga == "sa") {
        echo 'document.getElementById("FIFA").style.display = "block";';
        echo 'document.getElementById("fifaBtn").style.color = "#FF0000";';
        echo 'document.getElementById("fifa_inner").style.display = "none";';
        echo 'document.getElementById("fifa_stream").style.display = "block";';
      } else {
        echo 'document.getElementById("ESPORT").style.display = "block";';
        echo 'document.getElementById("esportBtn").style.color = "#FF0000";';
        echo 'document.getElementById("esport_inner").style.display = "none";';
        echo 'document.getElementById("esport_stream").style.display = "block";';
      }
      echo '</script>';
    }
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-184469361-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-184469361-1');
</script>
</body>
<?php
    include "script.php"
  ?>
</html>
