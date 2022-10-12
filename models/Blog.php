<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;

class Blog extends ActiveRecord
{
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}