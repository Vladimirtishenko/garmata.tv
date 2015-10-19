<?php
/* @var $this CabinetController */
/* @var $model Articles */
?>
<div class="outerSectionMain">
    <section class="main">
        <div class="outerLevel1">
            <div class="videoBlock pageWithoutTop oneVideoPage">
                <hr>
                <h1><?= Yii::t('main', 'Додавання поста'); ?></h1>
                <?php $this->renderPartial('_form', array('model'=>$model)); ?>
            </div>
        </div>
    </section>
</div>