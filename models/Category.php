<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Blog;

class Category extends ActiveRecord
{
    public function getBlogs()
    {
        return $this->hasMany(Blog::class, ['category_id' => 'id']);
    }
}