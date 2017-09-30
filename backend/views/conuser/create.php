<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ConUser */

$this->title = 'Create Con User';
$this->params['breadcrumbs'][] = ['label' => 'Con Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="con-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
