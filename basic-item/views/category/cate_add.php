<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>话题添加-有点</title>
<link rel="stylesheet" type="text/css" href="assets/admin/css/css.css" />
<script type="text/javascript" src="assets/admin/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
   <div class="pageTop"
       <div class="page">
            <img src="assets/admin/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                    href="#">分类管理</a>&nbsp;-</span>&nbsp;分类添加
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
       <div class="banneradd bor">
            <div class="baTopNo">

               <span>分类添加</span>
            </div>
           <div class="baBody">
               <?=Html::beginForm(['category/cate_add_post'],'post')?>
                           <div class="bbD">
                               分类名称：
                               <input type="text" name="cate_name" class="input3"/>
                           </div>
                           <div class="bbD">
                               上级分类：
                                   <select name="cate_pid" class="input3">
                                       <option value="0">顶级分类</option>
                                       <?php foreach($cate_name as $key=>$val){?>
                                            <option value="<?php echo $val['cate_id'] ?>" path="<?php echo $val['path'] ?>">
                                                <?php echo str_repeat(" 　　",substr_count($val['path'],"-")-1)?><?php echo $val['cate_name'] ?></option>
                                       <?php } ?>
                                  </select>
                            </div>
                           <div class="bbD">
                               分类排序：
                               <input type="text" name="cate_sort" class="input3"/>
                            </div>
                            <div class="bbD">
                               是否显示：<label><input type="radio" checked="checked"
                                name="cate_isshow" value="1"/>&nbsp;是</label><label><input type="radio"
                               name="cate_isshow" value="0"/>&nbsp;否</label>
                           </div>
                           <div class="bbD">
                               是否导航：<label><input type="radio" checked="checked"
                                   name="cate_isnav" value="1"/>&nbsp;是</label><label><input type="radio"
                                 name="cate_isnav" value="0"/>&nbsp;否</label>
                           </div>
                          <div class="bbD">
                                分类描述：
                                <div class="btext">
                                    <textarea rows="" cols="" class="text2" name="cate_desc"></textarea>
                                </div>
                           </div>
                            <div class="bbD">
                                <p class="bbDP">
                                    <input type="hidden" name="cate_path" value="">
                                    <input type="submit" value="提交" class="btn_ok btn_no"/>
                                   <a class="btn_ok btn_no" href="#">取消</a>
                               </p>
                           </div>
                       <?=html::endForm()?>
      </div>
    </div>

<!--    上传广告页面样式end -->
</div>
</div>
</body>
</html>
<script src="<?php \yii::$app->basePath; ?>js/jquery.js"></script>
<script>
    $("select[name='cate_pid']").change(function(){
        var cate_path=$("select[name='cate_pid'] option:selected").attr('path');
        //alert(cate_path);
        $("input[name='cate_path']").val(cate_path);
    });
</script>