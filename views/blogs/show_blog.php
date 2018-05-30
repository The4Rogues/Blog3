
<section>
    <!--<h1> Viewing a Blog (test)</h1>-->
    <img src="<?= $blog->blog_image ?>" alt="" height="100" width="200">
    <div>
        <h1> <?= $blog->blog_title; ?></h1>
        <p> Published <?= (new DateTime($blog->date_created))->format('d F Y') ?> </p>
        <br>
        <p> Summary: <?= html_entity_decode($blog->blog_summary); ?></p>
    </div>
    <br>
    <div>
         <?php if (!empty($_SESSION) ) { if ($_SESSION['user_id']==$blog->user_id) {?>
        <a href="?controller=post&action=create&blog_id=<?= $blog->id ?>" class="button js-button" role="button">Create Post</a>
        <a href="?controller=blog&action=update&blog_id=<?= $blog->id ?>" class="button js-button" role="button">Edit Blog</a>
        <a href="?controller=blog&action=delete&blog_id=<?= $blog->id ?>" class="button js-button" role="button">Delete Blog</a>
         <?php }} ?>
    </div>
</section>
<br>