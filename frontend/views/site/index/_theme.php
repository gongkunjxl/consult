<?php
use yii\helpers\Html;
use  yii\helpers\Url;
// $this->title = '心理咨询网站首页';
?>
 <link rel="stylesheet" href="css/index/index_new.css" type="text/css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<div class="container" style="background-color:#EDEDED">
    <h2  style="color: #69c; text-align: center; margin-top: 40px;">—&nbsp;说说心事&nbsp;—</h2>
    <div class="index-wrap" >
        <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'1','page' => '1']); ?>">
                    <h3 style="color:#ff0072 ">情感婚姻</h3>
                    <img class="theme-img" src="images/qinggan.jpg" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'2','page' => '1']); ?>">
                                    <!-- <a href="<?php //echo Url::to(['site/theme','type'=>'2']); ?>"> -->
                    <h3 style="color:#004b9f; ">抑郁焦虑</h3>
                    <img class="theme-img" src="images/yeyu.jpg" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'3','page' => '1']); ?>">
                    <h3 style="color:#90EE90 ">家庭关系</h3>
                    <img class="theme-img" src="images/jiating.jpg" >
                </a>
            </div>
        </div>

          <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'4','page' => '1']); ?>">
                    <h3 style="color:#a800ff ">孩子教育</h3>
                    <img class="theme-img" src="images/haizi.jpg" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'5','page' => '1']); ?>">
                    <h3 style="color:#007eff ">职业发展</h3>
                    <img class="theme-img" src="images/zhiye.jpg" >
                </a>
            </div>
        </div>
        <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'7','page' => '1']); ?>">
                    <h3 style="color:#9B30FF ">性心理</h3>
                    <img class="theme-img" src="images/xing.jpg" >
                </a>
           </div>
        </div>

         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'6','page' => '1']); ?>">
                    <h3 style="color:#edc35f ">心理测试</h3>
                    <img class="theme-img" src="images/xinliceshi.jpg" >
                </a>
            </div>
        </div>
        <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'8','page' => '1']); ?>">
                    <h3 style="color:#ff6600 ">科普文章</h3>
                    <img class="theme-img" src="images/kepu.jpg" >
                </a>
            </div>
        </div>
</div>
</div>
 <div class="container">
         <div style="height: 60px; width: 100%;"></div>
            <a class="consult" href="<?php echo Url::to(['site/expert','page' => '1']);?>">
                 <input type="button"  class="consult-button" value="我要咨询" />
            </a>
            <a class="consult" href="<?php echo Url::to(['site/question']);?>">
                 <input type="button" class="consult-button" style="background-color:#91bd09 " value="发布心事" />
            </a>
        <div style="height: 100px; width: 100%;"></div>
</div>
<!--  -->













