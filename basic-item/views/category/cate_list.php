<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$form = ActiveForm::begin([
    'action' => ['cate_list'],
    'method' => 'get',
    'id' => 'cateadd-form',
    'options' => ['class' => 'form-horizontal'],
]);
$this->title = '分类展示';
$this->params['breadcrumbs'][] = "商品分类";
$this->params['breadcrumbs'][] = "分类添加";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>话题管理-有点</title>
    <link rel="stylesheet" type="text/css" href="assets/admin/css/css.css" />
    <script type="text/javascript" src="assets/admin/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>
<!--搜索-->
<?= $form->field($searchModel, 'cate_name',[
    'options'=>['class'=>''],
    'inputOptions' => ['placeholder' => '分类名称搜索','class' => 'input-sm form-control'],
])->label(false) ?>
<span class="input-group-btn">
<?= Html::submitButton('搜索', ['class' => 'btn btn-sm btn-primary']) ?>
</span>
<?php ActiveForm::end(); ?>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="assets/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                    href="#">分类管理</a>&nbsp;-</span>&nbsp;分类列表
        </div>
    </div>
    <div class="page">
        <!-- topic页面样式 -->
        <div class="topic">
            <!-- topic表格 显示 -->
            <div class="conShow">
                <!--//搜索-->
                <div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建分类', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('批量删除', "javascript:void(0);", ['class' => 'btn btn-success gridview']) ?>

    </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout'=> '{items}<div class="text-right tooltip-demo">{pager}</div>',
                    'pager'=>[
                        //'options'=>['class'=>'hidden']//关闭自带分页
                        'firstPageLabel'=>"首页",
                        'prevPageLabel'=>'上一页',
                        'nextPageLabel'=>'下一页',
                        'lastPageLabel'=>'尾页',
                    ],
                    'filterModel' => $searchModel,
                    'options' => ['class' => 'grid-view','style'=>'overflow:auto', 'id' => 'grid'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\CheckboxColumn',
                            'name' => 'id',
                        ],
                        'cate_id',
                        'cate_name',
                        'cate_sort',
                        'cate_isshow',
                        'cate_isnav',
                        // 'cate_path',
                        // 'cate_pid',
                         'cate_desc',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);?>
        </div>
    </div>

</div>
</html>
<?php
$js = <<<JS
    $(".gridview").click(function(){
        var keys = $("#grid").yiiGridView("getSelectedRows");
        //alert(keys);
        $.ajax({
            type:"POST",
            url:"index.php?r=category/delall",
            data:{
                id:keys
            },
            success:function(msg){
                if(msg==1){
                   location.href="index.php?r=category/cate_list";
                }else{
                      alert("删除失败");
                }
            }
        });
        //console.log(keys);
    });
JS;
$this->registerJs($js);
?>