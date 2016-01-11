<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var frontend\models\RgnProvince $model
 */
$this->title = 'Rgn Province ' . $model->name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Rgn Provinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';

?>
<div class="giiant-crud rgn-province-update">

    <p>
		<?= $model->operation->button('view'); ?>
    </p>

	<?php

	echo $this->render('_form', [
		'model' => $model,
	]);

	?>

</div>