<?php if ( strtotime(date("Y-m-d H:i:s") ) < strtotime(date("2018-07-29 24:00:00") ) ) { ?>
<section class="featured-posts no-padding-top"> 
  <div class="container">
    <header> 
      <h2>[ ONO ]  </h2>
      <p class="text-big "> ONO Sale </p>
      <hr><br>
      <h2 id="onoCountdown" class="text-center" style="color:gray"></h2>
    </header>
  </div>
</section>

<?php } ?>

<?php if ( strtotime(date("Y-m-d H:i:s") ) < strtotime(date("2018-07-30 12:00:00") ) ) { ?>
  <section class="featured-posts no-padding-top"> 
  <div class="container">
    <header> 
      <h2>[ TRON ]  </h2>
      <p class="text-big "> TVM Countdown </p>
      <hr><br>
      <h2 id="tronCountdown" class="text-center" style="color:gray"></h2>
    </header>
  </div>
</section>
<hr>
<?php } ?>

<section class="featured-posts no-padding-top"> 
  <div class="container">
    <header> 
      <h2>[ EOS ] Voting on Producers </h2>
      <p class="text-big">Network Status</p>
    </header>
  <div class="row">

<?php 
  if (!empty($eosVoting)) {
    $eosRankNum =1;
    foreach($eosVoting->rows as $k=>$v) {
      
      
      if ($v->owner == "eoslaomaocom") {
        $colorSet = " style='color:red;' ";
      }else if($v->owner == "acroeos12345") {
        $colorSet = " style='color:red;' ";
      }else if($v->owner == "eosyskoreabp"){
        $colorSet = " style='color:green;' ";
      }else if ($v->owner == "eosnewyorkio") {
        $colorSet = " style='color:green;' ";
      }else if ($v->owner == "eoshuobipool") {
        $colorSet = " style='color:green;' ";
      }else if ($v->owner == "bitfinexeos1") {
        $colorSet = " style='color:green;' ";
      }else if ($k == 0 ) {
        $colorSet = " style='color:blue;' ";
      }else {
        $colorSet = null;
      }
      
?>
    <div class="post col-md-4">
      <div class="post-thumbnail">
        <!--<a href="<?php echo $v->url; ?>"><img src="<?php echo $v->url; ?>/img/blog-3.jpg" alt="<?php echo $v->owner; ?>" class="img-fluid"></a>-->
      </div>
      <div class="post-details">
        <div class="post-meta d-flex justify-content-between">
          
          <div class="category"><a href="#">[ <?php echo $eosRankNum; ?> ]</a></div>
          <div class="date"><?php echo date('Y-m-d'); ?></div>
        </div>
        <a href="<?php echo $v->url; ?>" target="_blank"><h3 class="h4" <?php echo $colorSet; ?> > <?php echo $v->owner; ?></h3></a>
        <p class="text-muted"><?php echo number_format($v->total_votes); ?></p>
      </div>
      <hr>
    </div>
<?php
      $eosRankNum++;
    }
  }
?>
  </div>
</section>
<hr>

<!-- Divider Section-->
<!--<section style="background: url(<?php echo $url; ?>/img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">-->



<section class="latest-posts">
  <div class="container">
    <header> 
      <h2>거래소 방문자 수 </h2>
      <p class="text-big">사이트 방문자 수 차트 </p>
    </header>
    <div class="row">
      <?php 
        foreach($visitsDate as $k=>$v){
      ?>
      <div class="post col-md-4" id="<?php echo $v->searchDate; ?>-Chart" style="width: 100%; height: 350px;"></div>
      <?php 
        }
      ?>
     
      
    </div>
  </div>
</section>

<hr>

<!-- Divider Section-->
<!--<section style="background: url(<?php echo $url; ?>/img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">-->
<section style="background: url(<?php echo $url . "/img/custom/main-1.jpg";?>); background-size: cover; background-position: center top" class="divider">

  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h2>Blockchain News </h2><a href="#News"  class="hero-link">More</a>
      </div>
    </div>
  </div>
</section>
<br><br>

<section class="featured-posts no-padding-top" id="News">
  <div class="container">
  <?php
  if (!empty($c_menu)){
    $num =0;
    foreach ($c_menu as $k=>$v) {
      $avatar = $url . "/img/custom/avatar-0.png";
      if ($v->name == " " || $v->name == null ){
        $v->name = "Reporter";
      }
      $v->content =  str_replace("\\n","<br>",$v->content);
      $v->content =  str_replace("\\r","",$v->content);
      if($num % 2 == 1){
  ?>
    <!-- Post-->
    <div class="row d-flex align-items-stretch">
      <div class="text col-lg-7 col-xs-12 ">
        <div class="text-inner d-flex align-items-center">
          <div class="content" style="font-size:13px;">
            <header class="post-header">
              <div class="category">
                <a href="#" target="_blank"><?php echo $v->news; ?></a> <a href="#"><?php echo $v->category; ?></a>
              </div>
              <a href="<?php echo $v->link; ?>" target="_blank"><h2 class="h4"><?php echo $v->subject; ?></h2></a>
            </header>
            <p><?php echo $v->content; ?></p>
            <footer class="post-footer d-flex align-items-center">
              <a href="<?php echo $v->link; ?>" target="_blank" class="author d-flex align-items-center flex-wrap">
                <div class="avatar"><img src="<?php echo $avatar; ?>" alt="..." class="img-fluid"></div>
                <div class="title"><span><?php echo $v->name; ?></span></div>
              </a>
              <div class="date"><i class="icon-clock"></i> <?php echo $v->contentDate; ?></div>
              <!--<div class="comments"><i class="icon-comment"></i>12</div>-->
            </footer>
          </div>
        </div>
      </div>
     <div class="image col-lg-5 col-xs-12 d-none d-sm-block"><img src="<?php echo $v->img; ?>" alt="..." ></div>
    </div>
  <?php
      }else if($num % 2 == 0){
  ?>
    <!-- Post-->
    <div class="row d-flex align-items-stretch">
    <div class="image col-lg-5 col-xs-12 d-none d-sm-block"><img src="<?php echo $v->img; ?>" alt="..." ></div>
      <div class="text col-lg-7 col-xs-12">
        <div class="text-inner d-flex align-items-center">
          <div class="content" style="font-size:13px;">
            <header class="post-header">
              <div class="category">
                <a href="#" target="_blank" > <?php echo $v->news; ?></a> <a href="#"><?php echo $v->category; ?></a>
              </div>
              <a href="<?php echo $v->link; ?>" target="_blank"><h2 class="h4"><?php echo $v->subject; ?></h2></a>
            </header>
            <p><?php echo $v->content; ?></p>
            <footer class="post-footer d-flex align-items-center">
              <a href="<?php echo $v->link; ?>" target="_blank" class="author d-flex align-items-center flex-wrap">
                <div class="avatar"><img src="<?php echo $avatar; ?>" alt="..." class="img-fluid"></div>
                <div class="title"><span><?php echo $v->name; ?></span></div>
              </a>
              <div class="date"><i class="icon-clock"></i> <?php echo $v->contentDate; ?></div>
              <!--<div class="comments"><i class="icon-comment"></i>12</div>-->
            </footer>
          </div>
        </div>
      </div>
     
    </div>  
  <?php
        
      }
  ?>

  <?php
      $num++;
    } 
  }
  ?>
  </div> 
</section>

<!-- Divider Section-->
<section style="background: url(<?php echo $url . "/img/custom/main-2.jpg";?>); background-size: cover; background-position: center bottom" class="divider">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h2>Blog News </h2><a href="#blogNews" class="hero-link">More</a>
      </div>
    </div>
  </div>
</section>

<section class="latest-posts"></section>

<section class="featured-posts no-padding-top" id="blogNews">
  <div class="container">
  <?php
  //print_r($icolab);
  //echo count($icolab->item);
  if (!empty($icolab)){
    $num =0;
    
    foreach ($icolab->item as $k=>$v) {
      
      if ($num > 4 ) {
        continue;
      }
      
      $avatar = $url . "/img/custom/avatar-0.png";
      $avatar = $icolab->image->url;
      if ($v->name == " " || $v->name == null ){
        $v->name = "Blog News";
      }
      $exLink = explode("v=",$v->link);
      $mediaLink = $v->link;
      
      
      
      
      if($num % 2 == 1){

  ?>
    <!-- Post-->
    <div class="row d-flex align-items-stretch">
      <div class="text col-lg-7">
        <div class="text-inner d-flex align-items-center">
          <div class="content" style="font-size:13px;">
            <header class="post-header">
              <div class="category">
                <a href="#" target="_blank">ICOLAB</a> <a href="#"><?php echo $v->category; ?></a>
              </div>
              <a href="<?php echo $v->link; ?>" target="_blank"><h2 class="h4"><?php echo $v->title; ?></h2></a>
            </header>
            <p><?php echo $v->description; ?></p>
            <footer class="post-footer d-flex align-items-center">
              <a href="<?php echo $v->link; ?>" target="_blank" class="author d-flex align-items-center flex-wrap">
                <div class="avatar"><img src="<?php echo $avatar; ?>" alt="..." class="img-fluid"></div>
                <div class="title"><span><?php echo $v->author; ?></span></div>
              </a>
              <div class="date"><i class="icon-clock"></i> <?php echo $v->pubDate; ?></div>
              <!--<div class="comments"><i class="icon-comment"></i>12</div>-->
            </footer>
          </div>
        </div>
      </div>
     <div class="image col-lg-5 d-none d-sm-block"><img src="<?php echo $icolab->image->url; ?>" alt="..." style="width:80%;height:80%;"></div>
    </div>
  <?php 
      }else if($num % 2 == 0) {
        
  ?>
    <!-- Post-->
    <div class="row d-flex align-items-stretch">
    <div class="image col-lg-5 d-none d-sm-block"><img src="<?php echo $icolab->image->url; ?>" alt="..." style="width:80%;height:80%;"></div>
      <div class="text col-lg-7">
        <div class="text-inner d-flex align-items-center">
          <div class="content" style="font-size:13px;">
            <header class="post-header">
              <div class="category">
                <a href="#" target="_blank" >ICOLAB</a> <a href="#"><?php echo $v->category; ?></a>
              </div>
              <a href="<?php echo $v->link; ?>" target="_blank"><h2 class="h4"><?php echo $v->title; ?></h2></a>
            </header>
            <p><?php echo $v->description; ?></p>
            <footer class="post-footer d-flex align-items-center">
              <a href="<?php echo $v->link; ?>" target="_blank" class="author d-flex align-items-center flex-wrap">
                <div class="avatar"><img src="<?php echo $avatar; ?>" alt="..." class="img-fluid"></div>
                <div class="title"><span><?php echo $v->author; ?></span></div>
              </a>
              <div class="date"><i class="icon-clock"></i> <?php echo $v->pubDate; ?></div>
              <!--<div class="comments"><i class="icon-comment"></i>12</div>-->
            </footer>
          </div>
        </div>
      </div>
     
    </div>  
  <?php      
      }
  ?>
  <?php  $num++; } } ?>
  </div>
</section>

<!-- Divider Section-->
<section style="background: url(<?php echo $url . "/img/custom/main-2.jpg";?>); background-size: cover; background-position: center bottom" class="divider d-none d-sm-block">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <h2>Blockchain Whitepaper </h2><a href="#"  class="hero-link"></a>
      </div>
    </div>
  </div>
</section>
<?php 


?>
<!-- Latest Posts -->
<section class="latest-posts d-none d-sm-block"> 
  <div class="container">
    <header> 
      <h2>코인 백서/보고서</h2>
      <p class="text-big">암호화폐 관련 보고서 / 백서</p>
    </header>
    <div class="row">
      <?php 
        foreach($whitepaper as $k=>$v) {
      ?>
      <div class="post col-md-4 col-xs-12">
        <div class="post-thumbnail">
          <embed src="<?php echo $v[0]; ?>" alt="pdf" style="width:100%;height:400px;" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">  
        </div>
        <div class="post-details">
          <div class="post-meta d-flex justify-content-between">
            <div class="date">2018 07.25</div>
            <div class="category"><a href="#">Whitepaper</a></div>
          </div>
          <a href="<?php echo $v[0]; ?>" target="_blank"><h3 class="h4"><?php echo $v[1]; ?></h3></a>
          <p class="text-muted">
          <a href="<?php echo $v[0]; ?>" target="_blank">Whitepaper</a><hr>
          <!--<a href="<?php echo $v[2]; ?>" target="_blank">Website</a><hr>-->
         
          </p>
        </div>
      </div>
      <?php    
        }
      ?>
    </div>
  </div>
</section>
<section class="featured-posts no-padding-top d-none d-sm-block"> 
  <div class="container">
    
    <div class="row">
      <?php 
        foreach($report as $k=>$v) {
      ?>
      <div class="post col-md-4 col-xs-12">
        <div class="post-thumbnail">
          <embed src="<?php echo $v[0]; ?>" alt="pdf" style="width:100%;height:400px;" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">  
        </div>
        <div class="post-details">
          <div class="post-meta d-flex justify-content-between">
            <div class="date">2018 07.25</div>
            <div class="category"><a href="#">Report</a></div>
          </div>
          <a href="<?php echo $v[0]; ?>" target="_blank"><h3 class="h4"><?php echo $v[1]; ?></h3></a>
          <p class="text-muted">
            <?php echo $v[2]; ?><hr>
            <a href="<?php echo $v[0]; ?>" target="_blank">Report</a><hr>
          </p>
        </div>
      </div>
      <?php    
        }
      ?>
       <hr>


    </div>
  </div>
</section>
<hr>


<!-- Latest Posts -->



<!-- Gallery Section
<section class="gallery no-padding">    
  <div class="row">

    <div class="mix col-lg-3 col-md-3 col-sm-6">
      <div class="item">
        <a href="<?php echo $url; ?>/img/gallery-1.jpg" data-fancybox="gallery" class="image">
          <img src="<?php echo $url; ?>/img/gallery-1.jpg" alt="..." class="img-fluid">
          <div class="overlay d-flex align-items-center justify-content-center">
            <i class="icon-search"></i>
          </div>
        </a>
      </div>
    </div>

    <div class="mix col-lg-3 col-md-3 col-sm-6">
      <div class="item">
        <a href="<?php echo $url; ?>/img/gallery-2.jpg" data-fancybox="gallery" class="image">
          <img src="<?php echo $url; ?>/img/gallery-2.jpg" alt="..." class="img-fluid">
          <div class="overlay d-flex align-items-center justify-content-center">
            <i class="icon-search"></i>
          </div>
        </a>
      </div>
    </div>

    <div class="mix col-lg-3 col-md-3 col-sm-6">
      <div class="item">
        <a href="<?php echo $url; ?>/img/gallery-3.jpg" data-fancybox="gallery" class="image">
          <img src="<?php echo $url; ?>/img/gallery-3.jpg" alt="..." class="img-fluid">
          <div class="overlay d-flex align-items-center justify-content-center">
            <i class="icon-search"></i></div>
        </a>
      </div>
    </div>

    <div class="mix col-lg-3 col-md-3 col-sm-6">
      <div class="item">
        <a href="<?php echo $url; ?>/img/gallery-4.jpg" data-fancybox="gallery" class="image">
          <img src="<?php echo $url; ?>/img/gallery-4.jpg" alt="..." class="img-fluid">
          <div class="overlay d-flex align-items-center justify-content-center">
            <i class="icon-search"></i>
          </div>
        </a>
      </div>
    </div>

  </div>
</section>
-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
// Set the date we're counting down to
var tronCountDownDate = new Date("Jul 30, 2018 12:00:00").getTime();
var onoCountDownDate = new Date("Jul 29, 2018 24:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {
  countdown("tron");
  countdown("ono");
}, 1000);


function countdown(company) {
  var now = new Date().getTime();
  var distance = null;
  var dateId = null;
  switch(company) {
    case "tron":
      distance = tronCountDownDate - now;
      dateId = "tronCountdown";
      break;
    case "ono":
      distance = onoCountDownDate - now;
      dateId = "onoCountdown";
      break;
  }
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById(dateId).innerHTML = days + " Days " + hours + ":" + minutes + ":" + seconds + "";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById(dateId).innerHTML = "EXPIRED";
  }
}
var tmpArr = new Array("2018-04","2018-05","2018-06");
google.charts.load('current', {'packages':['corechart']});

$.each(tmpArr,function(k,v){
  visitsCnt(v);
});



function visitsCnt(getDate="2018-04",title="방문자 수") {
  var url = "<?php echo site_url(); ?>/Monitor/ajaxVisits";
  var param = "searchDate="+getDate;
  $.ajax({
    type:"POST",
    url: url,
    data:param,
    dataType:"JSON",
    success:function(data){
     
      var datas = new google.visualization.DataTable();
        datas.addColumn('string', 'Name');
        datas.addColumn('number', 'Visits');
        datas.addRows( data.length );
      $.each(data,function(k,v) {
        console.log(v.name);
        datas.setCell(k,0,v.name);
        datas.setCell(k,1,parseInt(v.visitsCnt),v.domain);
      });
      var options = {
        title: getDate + " " + title ,
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById(getDate+"-Chart"));
      chart.draw(datas, options);
    }
  });
}
</script>