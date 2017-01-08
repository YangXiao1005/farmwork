<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Admins */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admins-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admin_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_pwd')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
