<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/**
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

/** @var \yii\db\ActiveRecord $model */
$model = new $generator->modelClass;
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";

?>

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

?>

<?= "<?php " ?>$form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]);?>
 <?= '<?= ' ?> Form::widget([

    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [

<?php foreach ($safeAttributes as $attribute) : ?>
        <?= $generator->generateActiveField($attribute) . "\n\n"; ?>
<?php endforeach; ?>
    ]

]);?>

<div class="text-right card-body py-0 px-0">
    <?= "<?= " ?> Html::submitButton('Lưu <b><i class="icon-paperplane "></i></b>', ['class' => 'btn btn-primary btn-sm btn-labeled btn-labeled-right legitRipple mr-1']) ?>
    <?= "<?php " ?> if (isset($isNew) && $isNew) : ?>
        <?= "<?= " ?> Html::submitButton(
            'Lưu và tiếp tục <b><i class="icon-paperplane"></i></b>',
            [
                'class' => 'btn btn-success btn-sm btn-labeled btn-labeled-right legitRipple mr-1',
                'name' => 'save-and-continue'
            ]
        ) ?>
    <?= "<?php " ?> endif ?>
    <?= "<?= " ?> Html::a(
        'Hủy <b><i class="icon-cancel-square"></i></b>',
        ['index'],
        ['class' => 'btn btn-warning btn-sm btn-labeled btn-labeled-right legitRipple']
    ) ?>
</div>
<?= "<?php " ?>ActiveForm::end(); ?>


