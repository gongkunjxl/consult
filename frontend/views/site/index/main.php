<?php

/* @var $this yii\web\View */
$this->title = '心理咨询网站首页';
?>
<!-- the slider page -->
<div style="height: 100px;width: 100%;"></div>
<!-- <?php //echo $this->render('_about'); ?>s -->
<!-- <?php // echo $this->render('_slider');?> -->
<!-- 主题展示 -->
<?php echo $this->render('_theme'); ?>

<!-- 注册流程 -->
<?php echo $this->render('_procedure'); ?>

<!-- 合作机构 -->
<?php echo $this->render('_support'); ?>

<!--  the about -->
<?php echo $this->render('_about'); ?>



