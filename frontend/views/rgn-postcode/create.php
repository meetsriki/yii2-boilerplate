<?php

use yii\helpers\Html;
use yii\helpers\Url;
use cornernote\returnurl\ReturnUrl;

/**
 * @var yii\web\View $this
 * @var frontend\models\RgnPostcode $model
 */
$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Region Postcodes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="giiant-crud rgn-postcode-create">

    <p class="pull-left">
		<?= Html::a('Cancel', ReturnUrl::getUrl(Url::previous()), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

	<?=

	$this->render('_form', [
		'model' => $model,
	]);

	?>

</div>
