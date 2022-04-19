<?php

namespace common\models\models;

use common\models\ArticleCategory;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "{{%article_category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $cover
 * @property string $utime
 * @property string $ctime
 */
class ArticleCategoryForm extends ArticleCategory
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','utime', 'ctime'], 'required'],
            [['utime', 'ctime'], 'safe'],
            [['name', 'cover'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '分类名',
            'cover' => '分类图标',
            'utime' => '更新时间',
            'ctime' => '创建时间',
        ];
    }



}
