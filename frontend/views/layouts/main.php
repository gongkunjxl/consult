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
    <link href="skin/css/login.css" rel="stylesheet">
       

</head>
<body>
<header data-headroom id="header" class="navbar navbar-default navbar-fixed-top" role="navigation">

    <div class="container">
        <!-- mobile nav start -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <!-- logo start -->
            <h1 class="logo"><a class="navbar-brand" href="#"><img src="skin/images/logo.png" alt=" 随州启明网络" title=" 随州启明网络" class="ylw-img-responsive logo-hidden" /><img src="skin/images/blogo.png" alt=" 随州启明网络" title=" 随州启明网络" class="ylw-img-responsive logo-visible" /></a><small class="pull-left"><a href="#" class="visible-lg"></a></small></h1>
            <!-- <ul class="list-unstyled head-lx"> -->
                 
             <!-- 需要申请QQ接口 -->
              <!--   <li class="tel">全国服务： 138-8686-1003</li>
                <li class="oc">在线咨询：<a href="http://wpa.qq.com/msgrd?v=3&uin=284660546&site=qq&menu=yes
" target="_blank"><img src="skin/images/head-sq.png" alt="在线咨询"></a> <a href="http://wpa.qq.com/msgrd?v=3&uin=284660546&site=qq&menu=yes" target="_blank"><img src="skin/images/head-qq.png" alt="QQ咨询"></a></li>
            </ul> -->
        </div>

        <nav class="collapse navbar-right navbar-collapse" style="margin-left: 20%; float: left !important;" role="navigation">
        <ul class="nav navbar-nav"  id="nav">


        <!-- mobile nav end -->

        <?php

        $menuItems = [
            ['label' => Yii::t('app', '网站首页').' <small>Home</small>' , 'url' => ['site/index'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            ['label' => Yii::t('app', '公益解答').' <small>Service</small>', 'url' => ['site/service'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            ['label' => Yii::t('app', '电话倾诉').' <small>Telephone</small>', 'url' => ['site/telephone'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            ['label' => Yii::t('app', '专家入驻').' <small>Experts</small>', 'url' => ['site/getexpert'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],

            // ['label' => Yii::t('app', '合作保障').' <small>Cooperate</small>', 'url' => ['product/index'], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            // ['label' => Yii::t('app', '关于我们').' <small>About</small>', 'url' => ['page/view','id'=>1], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            // ['label' => Yii::t('app', '联系我们').' <small>Contact</small>', 'url' => ['page/view','id'=>2], 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],
            // ['label' => Yii::t('app', '联系我们').' <small>Home</small>', 'url' => 'a/chenggonganli/list_11_1.html', 'options'=>['class'=>'dropdown'], 'linkOptions' => ['class'=>'dropdown-toggle'],],

        ];
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
        <div class="log-reg">
            <label style="width: 100%; color: #fff; margin-bottom:10px; ">
                <?php if(!empty($username)){echo $nickname;} else{echo "";} ?>
            </label>
            <?php if(!empty($username)):?>
                <a href="<?php echo Url::to(['site/logout']); ?>" id="regLogin" style="color: #fff"> 退出 </a>
            <?php else:?>
                <a href="<?php echo Url::to(['site/login']); ?>" id="regLogin" style="color: #fff">注册/登陆</a> 
            <?php endif;?>
         </div>
</header>

<?php $this->beginBody() ?>




<!-- <div class="crumbs">
    <div class="container">

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
    </div></div> -->

<?php echo $content; ?>


<div class="footer" id="yy">
    <footer class="container">
        <div class="row">
            <div style="width: 50%; text-align: center; float: left;">
                <h3>客服微信二维码</h3>
                <p style="text-align: center">  <img src="images/weixin.jpg"
                     alt="" title=""
                     class="ylw-img-responsive"/><br>
               微信扫一扫</p>
            </div>
            <div style="width: 50%; text-align: center; float: right;">
                <h3>联系我们 Contact US</h3>
                <address class="address">
                    <ul class="list-unstyled">
                        <li>中国 · 湖北 · 随州</li>
                        <li> 0722-380**** </li>
                        <li>  138-8686-1003</li>
                        <li>ncplum@qq.com</li>
                       <!--  <li class="sns"><a href="#" title="官方微博" target="_blank"><img src="/skin/images/weibo.png"
                                                                                      width="18" height="18"
                                                                                      alt="微博"></a> <a href="#"
                                                                                                       target="_blank"><img
                                    src="skin/images/shangqiao.png" width="18" height="18" alt="商桥在线咨询"></a> <a
                                href="http://wpa.qq.com/msgrd?v=3&uin=284660546&site=qq&menu=yes" target="_blank"><img
                                    src="skin/images/qq.png" width="18" height="18" alt="QQ在线咨询"></a> <a
                                href="#" class="bdsharebuttonbox" rel="nofollow"><img
                                    src="skin/images/fenxiang.png" width="18" height="18" alt="联系我们" class="bds_more"
                                    data-cmd="more"></a>
                                </li> -->
                    </ul>
                </address>
            </div>
            <!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <h3>快捷入口 Quick Entry</h3>
                <div class="row cidaohang">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
                        <ul class="list-unstyled">


                        </ul>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-4">
                        <ul class="list-unstyled">

                            <li>关于我们</li>

                            <li>服务项目</li>

                            <li>营销策划</li>

                            <li>成功案例</li>


                        </ul>
                    </div>

                </div>
            </div> -->
        </div>
    
    </footer>
</div>
<!-- footer end -->
<!-- go to top start -->
<!-- <div class="go-top text-center" id="di"><a href="#top" rel="nofollow">Go To Top 回顶部</a></div> -->
<!-- go to top end -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="skin/js/jquery.min.js"></script> -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="skin/js/bootstrap.min.js"></script>
<!-- header up start -->
<script src="skin/js/headroom.min.js"></script>
<script src="skin/js/jquery.headroom.js"></script>
<script src="skin/js/jquery.min.js"></script>
<script>$("#header").headroom();</script>
<!-- header up end -->
<!-- banner start -->
<script src="skin/js/jquery.glide.min.js"></script>
<script src="skin/js/jquery.glide.admin.js"></script>
<!-- banner end -->
<!-- Team left start -->
<script src="skin/js/jpuery.team.scroll.js"></script>
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






