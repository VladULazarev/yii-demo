<div class="col-lg-4">
  <div class="sidebar">
    <div class="row">
      <div class="col-lg-12">
        <div class="sidebar-item search">
          <form id="search_form" name="gs" method="GET" action="#">
            <input type="text" id="search" name="search" class="searchText" placeholder="type to search..." autocomplete="on">
          </form>
        </div>
        <div class="search-result"></div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-item recent-posts">
          <div class="sidebar-heading">
            <h2>Recent Posts</h2>
          </div>
          <div class="content">
            <ul>
          <?php foreach($aside_posts as $post): ?>
              <li>
                <a href="<?= '/blog/' . $post->category->slug . '/' . $post->slug ?>">
                  <h5><?= $post->title ?></h5>
                  <span><?= Yii::$app->formatter->asDate($post->created_at, 'php:M d, Y') ?></span>
                </a>
              </li>
          <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-item categories">
          <div class="sidebar-heading">
            <h2>Categories</h2>
          </div>
          <div class="content">
            <ul>
              <li><a href="/blog/nature">- Nature</a></li>
              <li><a href="/blog/lifestyle">- Lifestyle</a></li>
              <li><a href="/blog/fashion">- Fashion</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-item tags">
          <div class="sidebar-heading">
            <h2>Tag Clouds</h2>
          </div>
          <div class="content">
            <ul>
              <li><a href="/blog/tag/life">Life</a></li>
              <li><a href="/blog/tag/style">Style</a></li>
              <li><a href="/blog/tag/fashion">Fashion</a></li>
              <li><a href="/blog/tag/nature">Nature</a></li>
              <li><a href="/blog/tag/view">Veiw</a></li>
              <li><a href="/blog/tag/beauty">Beauty</a></li>
              <li><a href="/blog/tag/clothes">Clothes</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>