<div class="language">
    <?= CHtml::link('Укр', $this->getOwner()->createMultilanguageReturnUrl('uk'), array('class'=>Yii::app()->language == 'uk' ? 'activeLang' : '')); ?> |
    <?= CHtml::link('Рус', $this->getOwner()->createMultilanguageReturnUrl('ru'), array('class'=>Yii::app()->language == 'ru' ? 'activeLang' : '')); ?>
</div>