<style>
.activeY{color:gray;}

</style>
<section class="featured-posts no-padding-top"> 
    <div class="container">
        <header> 
            <h2>Blockchain News </h2>
            <p class="text-big"></p>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs ">
                <?php 
                    foreach($newsCat as $k=>$v) {
                        if ($v->category == "정책 ( Tokenpost )") {
                            $v->category = "정책";
                        }
                        if ($k == 0) {
                            $active = "active";
                        }else {
                            $active = "";
                        }
                ?>
                    <li class="text-center col-lg-1 col-md-3" onclick="ajaxNews('<?php echo $v->news?>','<?php echo $v->category?>',<?php echo $k; ?>)" style="font-size:13px;">
                        <b class="cat_<?php echo $k; ?> catNews"><?php echo $v->category; ?></b>
                    </li>
                <?php 
                    } 
                ?>
                </ul>
            </div>
            <br><hr>
            <div class="col-lg-12">
                <br>
                <h6 id="newsHeader"></h6>
                <table class="table">
                    <tbody id="newsBody"></tbody>
                </table>
            </div>
        </div>

       
    </div>
</section>

<script>
ajaxNews("<?php echo $newsCat[0]->news; ?>","<?php echo $newsCat[0]->category; ?>",0);
function ajaxNews(news,cat,checkClss=0) {
    $('.catNews').removeClass("activeY");
    $('.cat_'+checkClss).addClass("activeY");
    if (cat == "정책 ( Tokenpost )") {
        cat = "정책";
    }
    var url = "<?php echo site_url(); ?>/Monitor/ajaxNews";
    var param = "news="+news+"&category="+cat+"&contentFlag=0";
    $.ajax({
        type:"POST",
        url: url,
        data:param,
        dataType:"JSON",
        success:function(data){
            var html = '';
            //rounded-circle
            $('#newsHeader').html(news + " -> " + cat);
            
            $.each( data, function( k, v ) {
                var content = v.content;
                var contentDate = v.contentDate;
                content = content.replace(/\\r/gi, ""); 
                content = content.replace(/\\n/gi, "<br>");
                contentDate = contentDate.replace(/00:00:00/gi, ""); 
                html += '<tr><td style="width:200px;"><img src="'+v.img+'" class="img-thumbnail" ></td><td><a href="'+v.link+'" target="_blank"><b>'+v.subject+'</b><br>'+content+' </a></td><td style="width:150px;">'+contentDate+'</td></tr>';
            });
            $('#newsBody').html(html);
            console.log(data);
        }
    });
}
</script>