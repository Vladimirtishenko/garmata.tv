<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 21.08.14
 * Time: 16:03
 */
?>
<section class="postOneBloger">
        <?= CHtml::link(Yii::t('main', 'Редагувати'), array('/blog/cabinet/update', 'id'=>$data->id)); ?>
            &nbsp;
        <?= CHtml::ajaxLink(Yii::t('main', 'Видалити'), array('/blog/cabinet/delete', 'id'=>$data->id),
                array(
                    //'update'=>'#req_res_loading',
                    'beforeSend' => 'function() {
                        $("#maindiv").addClass("loading");
                    }',
                    'complete'=>'function(data){
                        $.fn.yiiListView.update("userList");
                    }',
                ),
        array('confirm' => Yii::t('main', 'Ви дійсно хочете видалити пост?'), 'id'=>'post_id_'.$data->id,
        )); ?>
    <p>
        <i class="fa fa-bookmark "></i>
        &nbsp;
        <?= CHtml::link($data->title, array('/blog/default/post', 'id'=>$data->id)); ?>
        <?= CHtml::link('Автор: '.$data->author->name, array('/blog/default/bloger', 'id'=>$data->author->id)); ?>
    </p>

    
</section>

