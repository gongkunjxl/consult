<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

$session = Yii::$app->session;
$username = $session->get('username');
$nickname = $session->get('nickname');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="skin/css/bootstrap.min.css" rel="stylesheet">
    <link href="skin/css/style.css" rel="stylesheet">
    <link href="skin/css/shake.css" rel="stylesheet">
    <!-- 登陆注册 -->
    <!-- <link href="skin/css/login.css" rel="stylesheet"> -->
       

</head>
<body>
<header data-headroom id="header" class="navbar navbar-default navbar-fixed-top" style="width: 100% !important" role="navigation">

    <div class="container">
        <!-- mobile nav start -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <!-- logo start -->
         <h1 class="logo"><a class="navbar-brand" style="width: 300px;height: 50px;" href="<?php echo Url::to(['site/index']);?>"><img src="images/logo.png" alt=" 心事网" title=" 心事网" class="ylw-img-responsive logo-hidden" /><img style="width: 300px;height: 50px;" src="images/logo.png" alt=" 心事网" title=" 心事网" class="ylw-img-responsive logo-visible" /></a><small class="pull-left"><a href="<?php echo Url::to(['site/index']);?>" class="visible-lg"></a></small></h1>
        <!-- 
          <a class="navbar-brand" href="<?php //echo Url::to(['site/index']);?>"><img src="images/logo.png" alt="心事网" title="心事网" class="ylw-img-responsive logo-hidden" style="width: 300px;height: 64px; "/></a>
         --> 
      


         </div>

        <!-- <nav class="collapse navbar-right navbar-collapse" style="margin-left: 20%; float: left !important;" role="navigation"> -->
        <nav class="collapse navbar-right navbar-collapse" style="text-align: left;" role="navigation">
        <ul class="nav navbar-nav"  id="nav">


        <!-- mobile nav end -->

        <?php
        if(!empty($username)){
            $menuItems = [
                ['label' => Yii::t('app', '&nbsp;&nbsp;首&nbsp;&nbsp;页&nbsp;&nbsp;').' <small>Home</small>' , 'url' => ['site/index'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
                ['label' => Yii::t('app', '我的帖子').' <small>Service</small>', 'url' => ['site/message'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
                ['label' => Yii::t('app',$nickname).' <small>Welecome</small>','options'=>['class'=>'dropdown'], ],
                ['label' => Yii::t('app','&nbsp;&nbsp;退&nbsp;&nbsp;出&nbsp;&nbsp;').' <small>Logout</small>', 'url' => ['site/logout'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            ];
        }else{
            $menuItems = [
                ['label' => Yii::t('app', '&nbsp;&nbsp;首&nbsp;&nbsp;页&nbsp;&nbsp;').' <small>Home</small>' , 'url' => ['site/index'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
                ['label' => Yii::t('app', '我的帖子').' <small>Service</small>', 'url' => ['site/message'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
                ['label' => Yii::t('app','登陆/注册').' <small>Login/Register</small>', 'url' => ['site/login'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            ];
        }

        // $menuItems = [
        //     ['label' => Yii::t('app', '&nbsp;&nbsp;首&nbsp;&nbsp;页&nbsp;&nbsp;').' <small>Home</small>' , 'url' => ['site/index'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
        //     ['label' => Yii::t('app', '我的帖子').' <small>Service</small>', 'url' => ['site/message'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
        //     ['label' => Yii::t('app',''), 'url' => ['site/telephone'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            // ['label' => Yii::t('app', '专家入驻').' <small>Experts</small>', 'url' => ['site/getexpert'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],

            // ['label' => Yii::t('app', '合作保障').' <small>Cooperate</small>', 'url' => ['product/index'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            // ['label' => Yii::t('app', '关于我们').' <small>About</small>', 'url' => ['page/view','id'=>1], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            // ['label' => Yii::t('app', '联系我们').' <small>Contact</small>', 'url' => ['page/view','id'=>2], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            // ['label' => Yii::t('app', '联系我们').' <small>Home</small>', 'url' => 'a/chenggonganli/list_11_1.html', 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],

        // ];
        echo Nav::widget([
            'options' => ['class' => 'nav navbar-nav','id'=>'nav'],
            'items' => $menuItems,
            'encodeLabels' => false,
          //  'options' => ['class' => 'nav navbar-nav'],
            //  'items' => $rightMenuItems,
        ]);
      //  NavBar::end();
        ?>
    </nav>
           <!-- 添加登陆注册的功能 -->
      <!--   <div class="log-reg">
            <label style="width: 100%; color: #fff; margin-bottom:10px; ">
                <?php //if(!empty($username)){echo $nickname;} else{echo "";} ?>
            </label>
            <?php //if(!empty($username)):?>
                <a href="<?php //echo Url::to(['site/logout']); ?>" id="regLogin" style="color: #fff"> 退出 </a>
            <?php //else:?>
                <a href="<?php //echo Url::to(['site/login']); ?>" id="regLogin" style="color: #fff">注册/登陆</a> 
            <?php //endif;?>
         </div> -->
</header>

<?php $this->beginBody() ?>

<?php echo $content; ?>

<div class="footer" style="width: 100% !important">
    <footer class="container"style="width: 100% !important" >
        <div class="row" style="width: 100% !important">
              <div style="width: 33.3%; text-align: center; float: left;">
                <h3 >微信公众号</h3>
                <img src="images/gongzhonghao.png"  style="width: 120px;height: 120px;" />

               <p> <br>关注我们的公众号，更多心理学文章</p>
             </div>
            <div style="width: 33.3%; text-align: center; float: left;">
                <h3 > 客服微信二维码</h3>
                <img src="images/kefu.png"  style="width: 120px;height: 120px;" />

               <p> <br>7×24小时为您服务 心心</p>
            </div>
            
            <div style="width: 33.3%; text-align: center; float: right;">
                <h3>联系我们</h3>
                <address class="address" style="font-size: 12px; padding-left: 0;">
                    <ul class="list-unstyled">
                        <li> 手机：15901023228 </li>
                        <li> 微信：197238405 </li>
                        <li> 邮箱：srzmiss@126.com </li>
                </address>
            </div>
          
        </div>
    
    </footer>
</div>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="skin/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="skin/js/bootstrap.min.js"></script>
<!-- header up start -->
<script src="skin/js/headroom.min.js"></script>
<script src="skin/js/jquery.headroom.js"></script>
<script>$("#header").headroom();</script>
<!-- header up end -->
<!-- banner start -->
<script src="skin/js/jquery.glide.min.js"></script>
<script src="skin/js/jquery.glide.admin.js"></script>
 <!-- <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>  -->


<!-- kefu start -->
<!-- <div class="kefu hidden-xs">
    <div><a href="#" class="kefu-lx" title="联系我们" target="_blank">联系我们</a></div>
    <ul class="list-unstyled">
        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=494921416&site=qq&menu=yes" target="_blank" class="kf"
               rel="nofollow">在线客服</a></li>
        <li><a href="#yy" class="kefu-yy" title="快速预约设计" rel="nofollow">快速预约</a></li>
        <li><a href="http://wpa.qq.com/msgrd?v=3&uin=284660546&site=qq&menu=yes" title="网页在线咨询" target="_blank"
               class="kefu-zx" rel="nofollow">在线咨询</a></li>
        <li><a href="#top" class="kefu-top" title="回网页顶部" rel="nofollow"></a></li>
        <li><a href="#di" class="kefu-di" title="回网页底部" rel="nofollow"></a></li>
    </ul>
</div> -->


<!-- kefu end -->
<!-- footer end -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>






