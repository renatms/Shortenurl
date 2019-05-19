<?php

/* @var $this yii\web\View */
/* @var $model */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ShortenLink';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-lg-5">

        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <?= $form->field($model, 'longUrl')->textInput(['autofocus' => true])->hint('Введите длинныую ссылку') ?>

        <?= $form->field($model, 'shortUrl')->textInput(['disabled' => !\Yii::$app->user->can('admin')]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

