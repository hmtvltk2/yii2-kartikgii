<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;


$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";


?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "kartik\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

$this->title = '<?= 'Danh Sách ' . $generator->displayName ?>';
$this->params['breadcrumbs'][] = $this->title;
?>

  
<?php if (!empty($generator->searchModelClass)) : ?>
<?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?> echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>

<?php if ($generator->indexWidgetType === 'grid') : ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
            [
                'class' => '\kartik\grid\ActionColumn',
                'header' => '',
                'noWrap' => true,
                'deleteOptions' => ['class' => 'text-danger'],
                'viewOptions' => ['class' => 'text-info mr-1'],
                'updateOptions' => ['class' => 'mr-1']
            ],
            ['class' => '\kartik\grid\SerialColumn'],

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        $columnDisplay = "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',";
        if (++$count < 6) {
            echo $columnDisplay . "\n";
        } else {
            echo "//" . $columnDisplay . " \n";
        }
    }
}
?>
          
        ],
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'panel' => [
            'heading' => '<h4 class="m-0 font-weight-semibold">' . Html::encode($this->title) . ' </h4>',
            'type' => 'info',
            'before' => Html::a('Thêm Mới <b><i class="icon-add"></i></b>', ['create'], ['class' => 'btn btn-sm bg-primary btn-labeled btn-labeled-right legitRipple']),
        ],
    ]);  ?>
<?php else : ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>


