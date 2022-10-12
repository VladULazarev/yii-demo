<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;

$this->title = $posts[0]['category']['meta_title'];
$this->params['meta_description'] = $posts[0]['category']['meta_descr'];
?>
<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>Recent Posts</h4>
            <h2>Our Recent Blog Entries About <?= $posts[0]['category']['title'] ?></h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">

          <?php foreach($posts as $post): ?>
            <div class="col-lg-6">
              <div class="blog-post">
                <div class="blog-thumb" data-value="<?= '/blog/' . $post->category->slug . '/' . $post->slug ?>">
                <?= Html::img("@web/images/{$post->thumb_img}", ['alt' => $post->title]) ?>
                </div>
                <div class="down-content">
                  <span><?= $post->category->title ?></span>
                  <a href="<?= '/blog/' . $post->category->slug . '/' . $post->slug ?>"><h4><?= $post->title ?></h4></a>
                  <ul class="post-info">
                    <li><?= Yii::$app->formatter->asDate($post->created_at, 'php:M d, Y') ?></li>
                  </ul>
                  <p><?= $post->excerpt ?></p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-lg-12">
                        <ul class="post-tags">
                          <li><i class="fa fa-tags"></i></li>
                          <?php $tags = explode(', ', $post->tags) ?>
                          <?php foreach($tags as $tag): ?>
                            <li><a href="<?= '/blog/tag/' . $tag ?>"><?= $tag ?></a></li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

            <div class="col-lg-12 text-center">
              <?php
                  echo LinkPager::widget([
                      'pagination' => $pages,
                  ]);
              ?>
            </div>

          </div>
        </div>
      </div>

      <!-- Aside -->
      <?=$this->render('/layouts/aside.php', [
          'aside_posts' => $aside_posts
      ])?>

    </div>
  </div>
</section>