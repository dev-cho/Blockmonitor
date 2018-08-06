<style>
.activeY{color:gray;}
</style>

<section class="featured-posts no-padding-top">
  <div class="container">
  <?php
  //print_r($icolab);
  //echo count($icolab->item);
  if (!empty($icolab)){
    $num =0;
    
    foreach ($icolab->item as $k=>$v) {
      
      
      
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
     <div class="image col-lg-5"><img src="<?php echo $icolab->image->url; ?>" alt="..." style="width:80%;height:80%;"></div>
    </div>
  <?php 
      }else if($num % 2 == 0) {
        
  ?>
    <!-- Post-->
    <div class="row d-flex align-items-stretch">
    <div class="image col-lg-5"><img src="<?php echo $icolab->image->url; ?>" alt="..." style="width:80%;height:80%;"></div>
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
