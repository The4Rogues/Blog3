<?php
/* 
 * (controller may contribute or request specific tag)
 * all list of post
 */
?>
 <section>

         <!--
         image will be here by controller 
         <img src="smiley.gif" alt="Smiley face" width="200" height="100">
         -->
        <p>All posts:</p>

<?php foreach($posts as $post) { ?>
        
  <p>
  <p><?php //echo  $post->blog->blog_title.' '.$post->post_title ;
  echo  $post->post_title ;
  ?>
    <?php //printf("%s - %s", $post->blog->blog_title, $post->post_title); ?> &nbsp; &nbsp;    
    <a href='?controller=post&action=show&post_id=<?php echo $post->id; ?>'>See post</a> &nbsp; &nbsp;
    <?php if (isset($_SESSION['user_id']) ) { if ($_SESSION['user_id']==$post->blog->user_id) {?>
    <a href='?controller=post&action=delete&post_id=<?php echo $post->id; ?>'>Delete Post</a> &nbsp; &nbsp;
    <a href='?controller=post&action=update&post_id=<?php echo $post->id; ?>'>Update Post</a> &nbsp;
    <?php }} ?>
  </p>
<?php } ?>

 </section>