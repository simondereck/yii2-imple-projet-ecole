<?php

namespace common\models\models;
use common\models\Article;


/**
 * This is the model class for table "{{%article}}".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $cover
 * @property string $content
 * @property int $category
 * @property int $status
 * @property string $utime
 * @property string $ctime
 */


class ArticleForm extends Article
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category', 'status', 'utime', 'ctime'], 'required'],
            [['content'], 'string'],
            [['category', 'status'], 'integer'],
            [['utime', 'ctime'], 'safe'],
            [['title', 'subtitle', 'cover'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'subtitle' => '副标题',
            'cover' => '封面',
            'content' => '正文',
            'category' => '分类',
            'status' => '状态',
            'utime' => '更新时间',
            'ctime' => '创建时间',
        ];
    }


}
