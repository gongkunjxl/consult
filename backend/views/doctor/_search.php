<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'nickname') ?>

    <?= $form->field($model, 'user_type') ?>

    <?php // echo $form->field($model, 'weixin') ?>

    <?php // echo $form->field($model, 'onPrice') ?>

    <?php // echo $form->field($model, 'offPrice') ?>

    <?php // echo $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'desp') ?>

    <?php // echo $form->field($model, 'ctime') ?>

    <?php // echo $form->field($model, 'if_check') ?>

    <?php // echo $form->field($model, 'prt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
