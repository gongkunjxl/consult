<?php
use yii\helpers\Html;
use  yii\helpers\Url;
$this->title = 'About';
?>
 <link rel="stylesheet" href="css/index/index_new.css" type="text/css">

<div class="container" style="background-color:#EDEDED">
    <h2  style="color: #69c; text-align: center; margin-top: 40px;">—&nbsp;心理咨询主题列表&nbsp;—</h2>
    <div class="index-wrap" >
        <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'1','page' => '1']); ?>">
                    <h3 style="color:#ff0072 ">情感婚姻</h3>
                    <img class="theme-img" src="images/theme_3.png" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'2','page' => '1']); ?>">
                                    <!-- <a href="<?php //echo Url::to(['site/theme','type'=>'2']); ?>"> -->
                    <h3 style="color:#004b9f; ">情绪压力</h3>
                    <img class="theme-img" src="images/theme_2.jpg" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'3','page' => '1']); ?>">
                    <h3 style="color:#ff6600 ">人际关系</h3>
                    <img class="theme-img" src="images/theme_1.png" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'4','page' => '1']); ?>">
                    <h3 style="color:#90EE90 ">家庭关系</h3>
                    <img class="theme-img" src="images/theme_3.png" >
                </a>
            </div>
        </div>

          <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'5','page' => '1']); ?>">
                    <h3 style="color:#a800ff ">孩子教育</h3>
                    <img class="theme-img" src="images/theme_2.jpg" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'6','page' => '1']); ?>">
                    <h3 style="color:#007eff ">职业发展</h3>
                    <img class="theme-img" src="images/theme_3.png" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'7','page' => '1']); ?>">
                    <h3 style="color:#edc35f ">个人发展</h3>
                    <img class="theme-img" src="images/theme_1.png" >
                </a>
            </div>
        </div>
         <div class="catalog">
            <div class="content">
                <a href="<?php echo Url::to(['site/theme','type'=>'8','page' => '1']); ?>">
                    <h3 style="color:#9B30FF ">性心理</h3>
                    <img class="theme-img" src="images/theme_2.jpg" >
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
                 <input type="button" class="consult-button" style="background-color:#91bd09 " value="我要提问" />
            </a>
        <div style="height: 100px; width: 100%;"></div>
</div>














