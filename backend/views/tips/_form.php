<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tips */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tips-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from_id')->textInput() ?>

    <?= $form->field($model, 'to_id')->textInput() ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ctime')->textInput() ?>

    <?= $form->field($model, 'articleId')->textInput() ?>

    <?= $form->field($model, 'if_read')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
