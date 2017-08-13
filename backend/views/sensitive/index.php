<?php

use yii\helpers\Html;
use backend\widgets\GridView;
use yii\widgets\Pjax;
use yiichina\adminlte\Box;
use yiichina\icons\Icon;
/* @var $this yii\web\View */
/* @var $searchModel common\models\NodeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$mainTitle = '敏感词管理';
$subTitle = '敏感词列表';
$this->title = $subTitle . ' - ' . $mainTitle . ' - ' . Yii::$app->name;
$breadcrumbs[] = ['label' => $mainTitle, 'url' => ['index']];
$breadcrumbs[] = $subTitle;
$this->params = array_merge($this->params, compact('mainTitle', 'subTitle', 'breadcrumbs'));
?>

<div class="node-index">
    <?php Box::begin([
        'options' => ['class' => 'box-primary'],
        'title' => $subTitle,
        'tools' => Html::a(Icon::show('search-plus', 'fa') . '高级搜索', 'javascript:void(0)', ['class' => 'btn btn-sm btn-flat btn-primary btn-search']),
    ]); ?>
    <?php Pjax::begin(); ?>
    <div class="search">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'batchItems' => [
            ['label' => '禁用', 'url' => ['disable']],
            ['label' => '启用', 'url' => ['enable']],
        ],
        'button' => Html::a(Icon::show('plus', 'fa') . '新建敏感词', ['create'], ['class' => 'btn btn-sm btn-flat btn-success']),
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'options' => ['width' => 40],
            ],
            [
                'attribute' => 'id',
                'options' => ['width' => 60],
            ],
            [
                'attribute' => 'node_id',
                'options' => ['width' => 100],
            ],
            'words',
            [
                'attribute' => 'status',
                'options' => ['width' => 100],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'options' => ['width' => 80],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
    <?php Box::end(); ?>
</div>
