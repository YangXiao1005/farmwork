<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['cate_list'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cate_id') ?>

    <?= $form->field($model, 'cate_name') ?>

    <?= $form->field($model, 'cate_sort') ?>

    <?= $form->field($model, 'cate_isshow') ?>

    <?= $form->field($model, 'cate_isnav') ?>

    <?php // echo $form->field($model, 'cate_path') ?>

    <?php // echo $form->field($model, 'cate_pid') ?>

    <?php  echo $form->field($model, 'cate_desc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
