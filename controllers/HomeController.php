<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Blog;

class HomeController extends Controller
{
   /**
     * Displays the 'Home' page.
     *
     * @return view
     */
    public function actionIndex()
    {
        $posts = Blog::find()->orderBy('id DESC')->limit(3)->with('category')->all();

        // Posts for 'Aside' bar
        $aside_posts = Blog::find()->orderBy('id DESC')->limit(3)->with('category')->all();

        // Posts for 'banner'
        $banners = Blog::find()->where(['banner' => 1])->with('category')->all();

        return $this->render('index', [
            'posts' => $posts,
            'banners' => $banners,
            'aside_posts' => $aside_posts
        ]);
    }

    /**
     * Displays the 'About' page.
     *
     * @return view
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}