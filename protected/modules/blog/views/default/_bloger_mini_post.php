<?php
?>
<p>
    <i class="fa fa-bookmark "></i>
    &nbsp;
    <?= CHtml::link($data->title, array('/blog/default/post', 'id'=>$data->id)); ?>
    <?= CHtml::link('Автор: '.$data->author->name, array('/blog/default/bloger', 'id'=>$data->author->id)); ?>
</p>