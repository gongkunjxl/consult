<?php
use yii\helpers\Html;
use  yii\helpers\Url;
$this->title = 'Message';
?>
<link rel="stylesheet" type="text/css" href="css/message.css">
<div class="container">
    <div class="content">
        <?php if($data['status']==200): ?>
            <?php 
                  $length = count($data['getinfo']);
                  if($length>0){
                    for ($i=0; $i <$length ; $i++) {  ?>
                        <div class="message">
                           <a href="<?php  $article_id=$data['getinfo'][$i]['id'];  echo Url::to(['site/read','article_id'=>$article_id ]); ?>"> 
                            <p class="text"><?php echo ($i+1).".".$data['getinfo'][$i]['title'];?></p> </a>
                            <?php if($data['getinfo'][$i]['if_read'] ==0):?>
                                <span class="flag" "> 有人回复了你</span>
                            <?php else:?>
                                <span class="flag" "></span>
                           <?php endif; ?>
                            <span  class="time"><?php echo $data['getinfo'][$i]['time']; ?></span>
                        </div>


                <?php }   }else{ ?>
                 <p style="font-size: 30px;text-align: center;color: red">你还没发表过任何提问</p>
              <?php }?>


        <?php else: ?>
            <p style="font-size: 30px;text-align: center;color: red">请登录后查看</p>
            <div style="height: 100px; width: 100%"></div>
        <?php endif; ?>

       <!--  <div class="message">
           <a href="#"> <p class="text">1.感觉这世界没什么能够真正的接受我 喜欢我，虽然现在根本无所谓感觉这世界没什么能够真正的接受我 喜欢我，虽然现在根本无所谓</p> </a>
            <span class="flag" "> 有人回复了你</span>
            <span  class="time">2016-12-19 12:00:12</span>
        </div>
         <div class="message">
           <a href="#"> <p class="text">2.感觉这世界没什么能够真正的接受我 喜欢我，虽然现在根本无所谓感觉这世界没什么能够真正的接受我 喜欢我，虽然现在根本无所谓</p> </a>
            <span class="flag" "> </span>
            <span  class="time">2016-12-19 12:00:12</span>
        </div> 
        <div class="message">
           <a href="#"> <p class="text">3.感觉这世界没什么能够真正的接受我</p> </a>
            <span class="flag" "> 有人回复了你</span>
            <span  class="time">2016-12-19 12:00:12</span>
        </div>
        <div class="message">
           <a href="#"> <p class="text">4.感觉这世界没什么能够真正的接受我</p> </a>
            <span class="flag" "> 有人回复了你</span>
            <span  class="time">2016-12-19 12:00:12</span>
        </div> -->
 <div class="message"></div>
    </div>

</div>
<div style="width: 100%;height: 280px;"></div>