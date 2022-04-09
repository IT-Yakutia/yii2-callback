<?php

$this->title = 'Новая заявка перезвонить';
?>
<div class="banner-create">
    <div class="row">
        <div class="col s12">
		    <?= $this->render($form_view, [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>
</div>