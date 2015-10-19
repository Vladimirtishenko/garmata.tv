<?php if(Yii::app()->user->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <b><?= Yii::app()->user->getFlash('error'); ?></b>
        <?= Chtml::errorSummary($model); ?>
    </div>
<?php elseif (Yii::app()->user->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
        <b><?= Yii::app()->user->getFlash('success'); ?></b>
    </div>
<?php endif; ?>