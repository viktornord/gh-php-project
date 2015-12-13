<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 01:51
 */

use common\models\OrderForm;
use frontend\widgets\NotesWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var $form yii\bootstrap\ActiveForm
 * @var OrderForm $model
 * @var String[] $good_names
 * @var int $totalPrice
 * @var int $initPrice
 * @var int $weight
 */
?>

<?= Html::csrfMetaTags() ?>
<?php $form = ActiveForm::begin([
    'id' => 'order-form',
    'enableAjaxValidation' => false,
    'action' => '/index.php?r=order%2Findex',
    'method' => 'post'
    ]); ?>
    <?= $form->field($model, 'good_id')->dropDownList($good_names) ?>
    <?= $form->field($model, 'goods_count') ?>
    <?= $form->field($model, 'firstname') ?>
    <?= $form->field($model, 'lastname') ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'site') ?>
    <?= $form->field($model, 'phone') ?>
    <?= $form->field($model, 'with_delivery')->checkbox() ?>
    <?= $form->field($model, 'delivery_address') ?>
    <?= Html::submitButton('Make order', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>
<?php ActiveForm::end(); ?>


