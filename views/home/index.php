<?php

use yii\helpers\Html;

$this->title = 'Home page';
$this->params['meta_description'] = 'Description of the Home page';
?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
  <div class="container-fluid">
    <div class="owl-banner owl-carousel">

    <?php foreach($banners as $banner): ?>

      <div class="item">
        <?= Html::img("@web/images/{$banner->banner_img}", ['alt' => $banner->title]) ?>
        <div class="item-content">
          <div class="main-content">
            <div class="meta-category">
              <a href="<?= '/blog/' . $banner->category->slug ?>"><span><?= $banner->category->title ?></span></a>
            </div>
            <a href="<?= '/blog/' . $banner->category->slug . '/' . $banner->slug ?>"><h4><?= $banner->title ?></h4></a>
            <ul class="post-info banner-date">
                <li><?= Yii::$app->formatter->asDate($banner->created_at, 'php:M d, Y') ?></li>
            </ul>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

    </div>
  </div>
</div>
<!-- Banner Ends Here -->

<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">

          <?php foreach($posts as $post): ?>
            <div class="col-lg-12">
              <div class="blog-post">
                <div class="blog-thumb" data-value="<?= '/blog/' . $post->category->slug . '/' . $post->slug ?>">
                  <?= Html::img("@web/images/{$post->post_img}", ['alt' => $post->title]) ?>
                </div>
                <div class="down-content">
                  <a href="<?= '/blog/' . $post->category->slug ?>"><span><?= $post->category->title ?></span></a>
                  <a href="<?= '/blog/' . $post->category->slug . '/' . $post->slug ?>"><h4><?= $post->title ?></h4></a>
                  <ul class="post-info">
                    <li><?= Yii::$app->formatter->asDate($post->created_at, 'php:M d, Y') ?></li>
                  </ul>
                  <p><?= $post->excerpt ?></p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-6">
                        <ul class="post-tags">
                          <li><i class="fa fa-tags"></i></li>
                          <?php $tags = explode(', ', $post->tags) ?>
                          <?php foreach($tags as $tag): ?>
                            <li><a href="<?= '/blog/tag/' . $tag ?>"><?= $tag ?></a></li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                      <div class="col-6">
                        <ul class="post-share">
                          <li><i class="fa fa-share-alt"></i></li>
                          <li><a href="https://facebook.com/">Facebook</a>,</li>
                          <li><a href="https://twitter.com/">Twitter</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

            <div class="col-lg-12">
              <div class="main-button">
                <a href="blog">View All Posts</a>
              </div>
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