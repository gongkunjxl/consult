<?php
use yii\helpers\Html;
use  yii\helpers\Url;
$this->title = 'About';
?>

 <!--    <a href="<?php //echo Url::to(['site/message']); ?>" style="width: 20%;" class="btn btn-info" "> 登陆</a>
 -->
<div class="about">
    <article class="container text-center">
        <h2 class="h-h2">关于启明网络 About US</h2>
        <div class="m-shu">创意品牌，创造价值</div>
        <div class="about-us"> <p>随州启明网络作为一家创新型公司，我们致力于为广告主、品牌主、媒体代理公司、广告创意公司等，提供创新的、即时的、实效的、最可信赖的个性化无线应用整合解决方案。我们将感性的互动整合创意结合理性的技术支持平台，利用移动数字特定的媒体属性。。</p></strong> </div>
        <p> </p>
    </article>
    <!-- Video -->
    <div class="modal fade" id="myVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">企业视频</h4>
                </div>
                <div class="modal-body text-center">
                    <embed class="visible-lg" src="/skin/flash/v.swf" allowFullScreen="true" quality="high" width="100%" height="310px" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
                    <!--<video class="visible-xs visible-sm visible-md" width="100%" height="310px" controls>
          <source src="#.mp4" type="video/mp4"/>
          <source src="#.ogv" type="video/ogg"/>
          </video>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Video -->
</div>
<!-- about e





<!-- <div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
<?= Yii::$app->request->hostInfo. Yii::$app->request->url  ?>
    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div> -->
