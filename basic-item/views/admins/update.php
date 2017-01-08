<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Admins */

$this->title = '修改管理员信息: ' . $model->admin_id;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->admin_id, 'url' => ['view', 'id' => $model->admin_id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="admins-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
