<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $cate_id
 * @property string $cate_name
 * @property string $cate_sort
 * @property integer $cate_isshow
 * @property integer $cate_isnav
 * @property string $cate_path
 * @property integer $cate_pid
 * @property string $cate_desc
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cate_name', 'cate_pid'], 'required'],
            [['cate_sort', 'cate_isshow', 'cate_isnav', 'cate_pid'], 'integer'],
            [['cate_name'], 'string', 'max' => 30],
            [['cate_path'], 'string', 'max' => 50],
            [['cate_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cate_id' => 'Cate ID',
            'cate_name' => '分类名称:',
            'cate_sort' => '分类排序:',
            'cate_isshow' => '是否展示:',
            'cate_isnav' => '是否导航:',
            'cate_path' => '',
            'cate_pid' => '上级分类:',
            'cate_desc' => '分类描述:',
        ];
    }
    //添加
    public function add($data){
        $field="";
        $value="";
        foreach($data as $k=>$v)
        {
            $field.=",".$k;
            $value.=",'".$v."'";
        }
        $field=substr($field,1);
        $value=substr($value,1);
        $sql="insert into category ($field) values($value)";
        return $sql;
    }
    public function select_one(){
        $sql="SELECT cate_id,cate_name,CONCAT(cate_path,'-',cate_id) as path FROM category ORDER BY path";
        return $sql;
    }
}
