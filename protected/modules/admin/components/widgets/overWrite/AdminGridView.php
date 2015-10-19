<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 23.11.14
 * Time: 1:40
 */
Yii::import('zii.widgets.grid.CGridView');
class AdminGridView extends CGridView
{
    public $template="\n{items}\n<div class='row'><div class='col-xs-6'>{summary}</div><div class='col-xs-6'>{pager}</div></div>";
    public $itemsCssClass='table table-bordered text-center grid dataTable';
    public $summaryCssClass='dataTables_info';
    public $pagerCssClass='dataTables_paginate paging_bootstrap';
    public $pager=array(
        'header' => '',
        'firstPageLabel'=>'<i class="fa fa-angle-double-left"></i>',
        'lastPageLabel'=>'<i class="fa fa-angle-double-right"></i>',
        'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
        'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
        'maxButtonCount' => 5,
        'cssFile' => false,
        'htmlOptions' => array(
            'class' => 'pagination'
        ),
    );
}