<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Blog;
use app\models\Comment;
use yii\data\Pagination;

class BlogController extends Controller
{
   /**
     * Displays all blog posts.
     *
     * @return view
     */
    public function actionIndex()
    {
        $query = Blog::find()->orderBy('id DESC')->with('category');

        # Get posts and pages
        $postsAndPages = self::getPostsAndPages($query);

        # Posts for 'Aside' bar
        $aside_posts = self::getPostsForAsideBar();

        return $this->render('index', [
            'posts' => $postsAndPages[1],
            'pages' => $postsAndPages[0],
            'aside_posts' => $aside_posts
        ]);
    }

   /**
     * Displays one blog post
     *
     * @return view
     */
    public function actionShow($slug)
    {
        # Posts for 'Aside' bar
        $aside_posts = self::getPostsForAsideBar();

        $post = Blog::find()->where(['slug' => $slug])->with('category')->one();

        $comments = Comment::find()->where(['post_id' => $post->id])->orderBy('comment_id DESC')->limit(9)->all();

        return $this->render('show', [
            'post' => $post,
            'aside_posts' => $aside_posts,
            'comments' => $comments
        ]);
    }

    /**
     * Displays blog posts by category
     *
     * @return view
     */
    public function actionBycategory($slug)
    {

        $query = Blog::find()
        ->joinWith(['category c'], true, 'INNER JOIN')
        ->where(['c.slug' => $slug])
        ->with('category');

        # Get posts and pages
        $postsAndPages = self::getPostsAndPages($query);

        # Posts for 'Aside' bar
        $aside_posts = self::getPostsForAsideBar();

        return $this->render('bycategory', [
            'posts' => $postsAndPages[1],
            'pages' => $postsAndPages[0],
            'aside_posts' => $aside_posts
        ]);
    }

    /**
     * Displays blog posts by a tag
     *
     * @return view
     */
    public function actionBytag($tag)
    {
        $query = Blog::find()->where(['like', 'tags', "%$tag%", false ])->with('category');

        # Get posts and pages
        $postsAndPages = self::getPostsAndPages($query);

        # Posts for 'Aside' bar
        $aside_posts = self::getPostsForAsideBar();

        return $this->render('bytag', [
            'posts' => $postsAndPages[1],
            'pages' => $postsAndPages[0],
            'aside_posts' => $aside_posts
        ]);
    }

    /**
     * Get posts by 'data' from the 'search' field
     * @see 'web\js\custom.js' -- 5. Type something in the 'Search...' field
     *
     * @return string
     */
    public function actionSearch()
    {
        $request = Yii::$app->request;

        $search = new Blog();
        $search->slug = trim($request->post('data'));

        $searchResults = (new \yii\db\Query())
        ->select(['blog.slug AS blog_slug', 'blog.title', 'category.slug AS categ_slug'])
        ->from('blog')
        ->join('INNER JOIN', 'category', 'category.id = blog.category_id')
        ->where(['like', 'blog.slug', "%$search->slug%", false ])
        ->limit(5)
        ->all();

        # Create the array of links for found posts
        foreach($searchResults as $value) {
            $links[] = "<a href='/blog/{$value['categ_slug']}/{$value['blog_slug']}' class='search-link'>
            {$value['title']}
            </a> ";
        }

        # If something was found
        if (isset($links)) {

            # We have to return 'string'
            $links = implode(' ', $links);
            return $links;

        } else {
            return false;
        }
    }

    /**
     * Get posts for 'Aside' bar
     *
     * @return array of found posts
     */
    public static function getPostsForAsideBar()
    {
        $aside_posts = Blog::find()->orderBy('id DESC')->limit(3)->with('category')->all();
        return $aside_posts;
    }

    /**
     * Get posts and pages
     *
     * @return array of found posts and amount of pages
     */
    public static function getPostsAndPages($query)
    {
        $countQuery = clone $query;

        $pages = new Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $postsAndPages[] = $pages;
        $postsAndPages[] = $posts;

        return $postsAndPages;
    }
}