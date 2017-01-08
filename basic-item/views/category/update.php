<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = '修改分类: ' . $model->cate_id;
$this->params['breadcrumbs'][] = ['label' => '分类展示', 'url' => ['cate_list']];
$this->params['breadcrumbs'][] = ['label' => $model->cate_id, 'url' => ['view', 'id' => $model->cate_id]];
$this->params['breadcrumbs'][] = '修改';?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
