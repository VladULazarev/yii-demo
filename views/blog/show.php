<?php
use yii\helpers\Html;

$this->title = $post->meta_title;
$this->params['meta_description'] = $post->meta_descr;
?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>Post Details</h4>
            <h2><?= $post->title ?></h2>
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
            <div class="col-lg-12">
              <div class="blog-post">
                <div class="blog-thumb">
                <?= Html::img("@web/images/{$post->post_img}", ['alt' => $post->title]) ?>
                </div>
                <div class="down-content">
                  <a href="<?= '/blog/' . $post->category->slug ?>"><span><?= $post->category->title ?></span></a>
                  <h4><?= $post->title ?></h4>
                  <ul class="post-info">
                    <li><?= Yii::$app->formatter->asDate($post->created_at, 'php:M d, Y') ?></li>
                  </ul>

                  <?= $post->content ?>

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

            <div class="col-lg-12">
              <div class="sidebar-item comments">
                <div class="sidebar-heading">
                  <h2>Comments</h2>
                </div>
                <div class="content">
                  <ul>

                  <?php if ( count($comments) ) { foreach($comments as $comment): ?>
                    <li>
                      <div class="right-content">
                        <h4><?= $comment->author_name ?>
                          <span><?= Yii::$app->formatter->asDate($comment->created_at, 'php:M d, Y') ?></span>
                        </h4>
                        <p><?= $comment->comment_text ?></p>
                      </div>
                    </li>
                  <?php endforeach; }
                  else { echo '<h6>No comments so far</h6>'; } ?>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                  <h2>Your comment</h2>
                </div>
                <div class="content">
                  <form>
                    <div class="row">
                       <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="name"
                          type="text" id="name"
                          placeholder="Your name"
                          required autocomplete="off">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="comment" rows="6"
                          id="comment" placeholder="Type your comment"></textarea>
                        </fieldset>
                      </div>
                      <div id="post_id" data-value="<?= $post->id ?>"></div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="send-comment" class="main-button">Submit</button>
                        </fieldset>
                      </div>
                    </div>
                    <div class="comment-form-pop-up">
                      <div class="modal no-bg">
                        <div class="modal-dialog modal-confirm load-img-container">
                            <img class="load-img" src="/web/includes/preloader.gif">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>

                <div class="form-errors mt-4 ">
                    <h5 class="wrong form-error py-2">Something went wrong!</h5>
                    <h6 class="ok form-error">OK! We received your comment.</h6>
                    <p class="bad-name form-error">The name has wrong symbol or empty!</p>
                    <p class="bad-comment form-error">The comment has wrong symbol or empty!</p>
                    <p class="many-comments form-error">You've already sent a comment about this post!</p>
                  </div>

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