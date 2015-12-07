<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use frontend\models\menu\ReligionMenu;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var frontend\models\search\ReligionSearch $searchModel
 */
$this->title = 'Religions';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="giiant-crud religion-index">

	<?php //     echo $this->render('_search', ['model' =>$searchModel]);

	?>

    <div class="clearfix">
        <p class="pull-left">
			<?= ReligionMenu::btn('create'); ?>
		</p>

        <div class="pull-right">
			<?= ReligionMenu::btn('deleted'); ?>

			<!--
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
						'items'			 => [ [
								'url'	 => ['user/index'],
								'label'	 => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'User' . '</i>',
							], [
								'url'	 => ['user/index'],
								'label'	 => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'User' . '</i>',
							], [
								'url'	 => ['user/index'],
								'label'	 => '<i class="glyphicon glyphicon-arrow-right">&nbsp;' . 'User' . '</i>',
							],]
					],
					'options'		 => [
						'class' => 'btn-default'
					]
				]
			);

			?>
			-->
		</div>
    </div>


	<?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>
				<i><?= 'Religions' ?></i>
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
						'name',
						[
							"label"		 => 'Action',
							"class"		 => \yii\grid\DataColumn::className(),
							"options"	 => [
								"width" => "120px",
							],
							"format"	 => "raw",
							"value"		 => function($model)
						{
							return $model->menu->widgetDropdown();
						},
						],
					],
				]);

				?>
			</div>

		</div>

	</div>

	<?php \yii\widgets\Pjax::end() ?>


</div>
