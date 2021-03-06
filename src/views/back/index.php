<?php

use uraankhayayaal\materializecomponents\grid\MaterialActionColumn;
use ityakutia\callback\models\Callback;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Заявки перезвонить';
?>
<div class="banner-index">
    <div class="row">
        <div class="col s12">
            <?= GridView::widget([
                'tableOptions' => [
                    'class' => 'striped bordered my-responsive-table',
                    'id' => 'sortable'
                ],
                'rowOptions' => function ($model, $key, $index, $grid) {
                    return ['data-sortable-id' => $model->id];
                },
                'options' => [
                    'data' => [
                        'sortable-widget' => 1,
                        'sortable-url' => Url::toRoute(['sorting']),
                    ]
                ],
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => SerialColumn::class],
                    ['class' => MaterialActionColumn::class, 'template' => ''],

                    [
                        'attribute' => 'title',
                        'format' => 'raw',
                        'value' => function($model){
                            return Html::a($model->title,['view', 'id' => $model->id]);
                        }
                    ],
                    'name',
                    'phone',
                    [
                        'attribute' => 'created_at',
                        'format' => 'datetime',
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => function($model){
                            return '<div class="chip">' . $model::STATUSES[$model->status] . '</div>';
                        },
                        'filter' => Callback::STATUSES,
                    ],
                    [
                        'attribute' => 'is_accept_consent_pd',
                        'format' => 'raw',
                        'value' => function($model){
                            return $model->is_accept_consent_pd ? '<i class="material-icons green-text">done</i>' : '<i class="material-icons red-text">clear</i>';
                        },
                        'filter' =>[0 => 'Нет', 1 => 'Да'],
                    ],
                    ['class' => MaterialActionColumn::class, 'template' => '{delete}'],
                ],
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination center'],
                    'prevPageCssClass' => '',
                    'nextPageCssClass' => '',
                    'pageCssClass' => 'waves-effect',
                    'nextPageLabel' => '<i class="material-icons">chevron_right</i>',
                    'prevPageLabel' => '<i class="material-icons">chevron_left</i>',
                ],
            ]); ?>
        </div>
    </div>
</div>
