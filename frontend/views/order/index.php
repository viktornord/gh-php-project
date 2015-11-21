<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 01:51
 */
use yii\bootstrap\ActiveForm;
use yii\jui\Slider;
use yii\helpers\Html;

/**
 * @var $form yii\bootstrap\ActiveForm
 * @var String[] $goods
 * @var int $totalPrice
 * @var int $initPrice
 * @var int $weight
 */
?>
<?= Html::csrfMetaTags() ?>
<form action="/index.php?r=order%2Findex" method="post">
    <fieldset>
        <div class="row">
            <div class="col-lg-10">
                <?php $form = ActiveForm::begin([
                    'id' => 'order-form',
                    'enableAjaxValidation' => true
                ]); ?>
                    <?= $form->field($model, 'good')->dropDownList($goods) ?>
                    <?= $form->field($model, 'firstName') ?>
                    <?= $form->field($model, 'lastName') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'phone') ?>
                    <?= $form->field($model, 'withDelivery')->checkbox() ?>
                    <?= $form->field($model, 'deliveryAddress') ?>
                    <?= Html::submitButton('Make order', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </fieldset>
</form>
