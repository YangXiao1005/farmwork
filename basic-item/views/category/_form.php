<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cate_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_sort')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_isshow')->textInput() ?>

    <?= $form->field($model, 'cate_isnav')->textInput() ?>

    <?= $form->field($model, 'cate_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_pid')->textInput() ?>

    <?= $form->field($model, 'cate_desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
