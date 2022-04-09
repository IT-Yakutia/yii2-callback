<?php

$this->title = 'Редактирование: ' . $model->title;
?>
<div class="banner-view">
    

<?php

use uraankhayayaal\materializecomponents\checkbox\WCheckbox;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

<div class="banner-form">

	<div class="row">
		<div class="col s12">
		
			<?php $form = ActiveForm::begin([
				'errorCssClass' => 'red-text',
			]); ?>

			<?= WCheckbox::widget(['model' => $model, 'attribute' => 'is_accept_consent_pd', 'disabled' => 'disabled']); ?>

			<div class="row">
				<div class="col s12 m4">
					<?= $form->field($model, 'title')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>
				</div>
				<div class="col s12 m4">
					<?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>
				</div>
				<div class="col s12 m4">
					<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'disabled' => 'disabled']) ?>
				</div>
			<div class="row">
			</div>
				<div class="col s12">
					<?= $form->field($model, 'message')->textArea(['rows' => 6, 'class' => 'materialize-textarea', 'disabled' => 'disabled']) ?>
				</div>
			</div>

			<?php ActiveForm::end(); ?>

		</div>
	</div>
</div>
