<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use frontend\models\menu\RgnCityMenu;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var frontend\models\search\RgnCity $searchModel
 */
$this->title = 'Region Cities';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="giiant-crud rgn-city-index">

	<?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="clearfix">
        <p class="pull-left">
			<?= RgnCityMenu::btn('create'); ?>
		</p>

        <div class="pull-right">

			<?= RgnCityMenu::btn('deleted'); ?>

			<?=

			\yii\bootstrap\ButtonDropdown::widget(
				[
					'id'			 => 'giiant-relations',
					'encodeLabel'	 => false,
					'label'			 => '<span class="glyphicon glyphicon-paperclip"></span> ' . 'Relations',
					'dropdown'		 => [
						'options'		 => [
							'class' => 'dropdown-menu-right'
						],
						'encodeLabels'	 => false,
						'items'			 => [
							[
								'url'	 => ['rgn-province/index'],
								'label'	 => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Region Province' . '</i>',
							],
							[
								'url'	 => ['rgn-district/index'],
								'label'	 => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Region District' . '</i>',
							],
							[
								'url'	 => ['rgn-postcode/index'],
								'label'	 => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'Region Postcode' . '</i>',
							],
						],
					],
					'options'		 => [
						'class' => 'btn-default'
					]
				]
			);

			?>
		</div>
    </div>


	<?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>
				<i><?= $this->title ?></i>
			</h2>
		</div>

		<div class="panel-body">

			<div class="table-responsive">
				<?=

				GridView::widget([
					'layout'			 => '{summary}{pager}{items}{pager}',
					'dataProvider'		 => $dataProvider,
					'pager'				 => [
						'class'			 => yii\widgets\LinkPager::className(),
						'firstPageLabel' => 'First',
						'lastPageLabel'	 => 'Last',
					],
					'filterModel'		 => $searchModel,
					'tableOptions'		 => ['class' => 'table table-striped table-bordered table-hover'],
					'headerRowOptions'	 => ['class' => 'x'],
					'columns'			 => [
						[
							'class'		 => 'yii\grid\SerialColumn',
							'options'	 => [
								'width' => '40px',
							],
						],
						'number',
						//'name',
						[
							"class"		 => \yii\grid\DataColumn::className(),
							"attribute"	 => 'name',
							"format"	 => "raw",
							"options"	 => [],
							"value"		 => function($model)
						{
							return $model->menu->anchor('view', $model->name);
						},
						],
						'abbreviation',
						// generated by schmunk42\giiant\generators\crud\providers\RelationProvider::columnFormat
						[
							'class'		 => yii\grid\DataColumn::className(),
							'attribute'	 => 'province_id',
							'options'	 => [],
							'value'		 => function ($model)
						{
							if ($rel = $model->getProvince()->one())
							{
								return Html::a($rel->name, ['rgn-province/view', 'id' => $rel->id,], ['data-pjax' => 0]);
							}
							else
							{
								return '';
							}
						},
							'format' => 'raw',
						],
					],
				]);

				?>
			</div>

		</div>

	</div>

	<?php \yii\widgets\Pjax::end() ?>


</div>
