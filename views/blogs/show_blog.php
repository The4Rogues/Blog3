<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="card">
            <div class="card-header">
                <img src="<?= $blog->blog_image ?>" alt=""width="400">
            </div>
            <div class="card-body">
                <h1 class="card-title">
                    <?= $blog->blog_title ?>
                </h1>
                <h5>
                    <span class="w3-opacity">
                        Published <?= (new DateTime($blog->date_created))->format('d F Y') ?>
                    </span>
                </h5>
                <p class="card-text blog-summary">
                    <?= html_entity_decode($blog->blog_summary) ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div>
         <?php if (!empty($_SESSION) ) { if ($_SESSION['user_id']==$blog->user_id) {?>
        <a href="?controller=post&action=create&blog_id=<?= $blog->id ?>" class="button js-button" role="button">Create Post</a>
        <a href="?controller=blog&action=update&blog_id=<?= $blog->id ?>" class="button js-button" role="button">Edit Blog</a>
        <a href="?controller=blog&action=delete&blog_id=<?= $blog->id ?>" class="button js-button" role="button">Delete Blog</a>
         <?php }} ?>
</div>
