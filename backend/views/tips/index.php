<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tips-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tips', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'from_id',
            'to_id',
            'content:ntext',
            'ctime:datetime',
            'articleId',
            'if_read',

            ['class' => 'yii\grid\ActionColumn'],
        ],
         'options' => ['class' => ''],
    ]); ?>
</div>
