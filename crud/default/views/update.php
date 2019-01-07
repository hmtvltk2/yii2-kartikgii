<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;

$this->title = '<?= 'Cập Nhật ' . $generator->displayName ?>';
$this->params['breadcrumbs'][] = ['label' => '<?= $generator->displayName ?>', 'url' => ['index']];
$this->params['breadcrumbs'][] = <?= $generator->generateString('Cập Nhật') ?>;
?>
<div class="card">
    <div class="card-header">
        <h4><?= "<?= " ?>Html::encode($this->title) ?></h4>
    </div>
    
    <div class="card-body">
        <?= "<?= " ?>$this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
