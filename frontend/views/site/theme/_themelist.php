<?php
use yii\helpers\Html;
use  yii\helpers\Url;
$this->title = 'Theme';
$length=0;
?>

<link href="css/theme/theme.css" rel="stylesheet" type="text/css">

<div class="questions index questions_index chrome modern mac webkit desktop">
  <div class="container">
        <div class="col_main">
        <?php if($data['status'] == 200):?>
          <?php  $length = count($data['article']);
            for($i=0;$i<$length;$i++){ ?>
              <div class="question_item">
                <div class="box killborder">
                  <!-- 回答数量 -->
                  <?php if($data['article'][$i]['answer']>0):?>
                    <div class="answered"> <?php echo $data['article'][$i]['answer'];?><p>回答</p></div>
                  <?php else: ?>
                  <div class="answers">0<p>回答</p></div>
                <?php endif;?>

                <!-- 标题和内容 -->
                 <div class="content">
                    <a href="<?php  $article_id=$data['article'][$i]['id'];  echo Url::to(['site/detarticle','article_id'=>$article_id ]); ?>" >
                      <h2><?php echo $data['article'][$i]['title']; ?></h2>
                    </a>
                    <p><?php echo $data['article'][$i]['content']; ?></p>
                      <!-- 时间和作者 -->
                    <div class="info" style="font-size: 13px;">
                      <span class="answers_count fl"><?php echo $data['article'][$i]['author']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data['article'][$i]['time']; ?></span>
                      <span class="more2"><a href="<?php  $article_id=$data['article'][$i]['id'];  echo Url::to(['site/detarticle','article_id'=>$article_id ]); ?>">查看全文</a><i class="fa fa-angle-right"></i></span>
                      </div>
                  </div>

              </div>
            </div>

        <?php }else:?>

          <p style="width: 100%; text-align: center; font-size: 36px; color: red;"> 该主题没有更多帖子了</p>

        <?php endif; ?>      

              <!--  暂时还未实现分页功能 -->
             <!--  <div class="page-tab-tog" style="margin-left: 30%;">
                  <div class="page-tab-tog">
                  <li class="first"><a rel="nofollow" href="http://www.yidianling.com/ask">首页</a></li>
                  <li class="previous"><a rel="nofollow" href="http://www.yidianling.com/ask">&lt;</a></li> -->
                  <!-- <li class="page"><a rel="nofollow" href="http://www.yidianling.com/ask">1</a></li> -->
   <!--                <li class="page selected"><a rel="nofollow" href="http://www.yidianling.com/ask/p2">2</a></li>
                  <li class="page"><a rel="nofollow" href="http://www.yidianling.com/ask/p3">3</a></li>
                  <li class="page"><a rel="nofollow" href="http://www.yidianling.com/ask/p4">4</a></li>
                  <li class="page"><a rel="nofollow" href="http://www.yidianling.com/ask/p5">5</a></li> -->
<!--                   <li class="next"><a rel="nofollow" href="http://www.yidianling.com/ask/p3">&gt;</a></li>
                  <li class="last"><a rel="nofollow" href="http://www.yidianling.com/ask/p8388">尾页</a></li>
                 <li class="totle">&nbsp;&nbsp;共1页</li></div>            
            </div> -->
             <div class="page-tab-tog" style="margin-left: 15%; margin-top: 20px;">
                <div class="page-tab-tog">
                  <!-- 上一页 -->
                  <?php if(intval($data['page'])>1):?>
                    <li class="first">
                      <a  style="width: 100px; color: #000; font-weight: 500;" rel="nofollow" href="<?php $page=$data['page']-1; echo Url::to(['site/theme','type'=> $data['type'],'page' => $page]); ?>">上一页</a>
                    </li>
                  <?php endif;?>
                  <!-- 下一页 -->
                  <?php if($length==10):?>
                    <li class="first">
                      <a  style="width: 100px; color: #000; font-weight: 500; margin-left: 100px;" rel="nofollow" href="<?php $page=$data['page']+1; echo Url::to(['site/theme','type'=> $data['type'],'page' => $page]); ?>">下一页</a>
                    </li>
                  <?php endif;?>
                  
              </div>
            </div>

      </div>
    </div>
</div>
        
