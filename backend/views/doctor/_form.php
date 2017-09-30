<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_type')->textInput() ?>

    <?= $form->field($model, 'weixin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'onPrice')->textInput() ?>

    <?= $form->field($model, 'offPrice')->textInput() ?>

    <?= $form->field($model, 'score')->textInput() ?>

    <?= $form->field($model, 'desp')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ctime')->textInput() ?>

    <?= $form->field($model, 'if_check')->textInput() ?>

    <?= $form->field($model, 'prt')->textInput() ?>

  
    <!-- 此处显示3张照片 -->
    <?php if(!empty($model['id'])): ?>
        <?php 
            $path = "../../frontend/web/testupload/".$model['username']."/";
            $current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
            while(($file = readdir($current_dir)) !== false) { ?> 
               <?php
                    if($file == '.' || $file == '..') {
                         continue;
                }else{ ?> 
                  <img src="<?php echo $path.$file ?>" style="height: 200px;  margin-left: 50px; width:160px; margin-right: 50px;">  
            <?php } ?>
                
          <?php  }?>
    <?php endif;?>

    <div class="form-group" style="margin-top: 30px; margin-left:30px;width: 200px !important;">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
