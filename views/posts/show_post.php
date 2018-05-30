<?php
/* 
 * show the post (controller may contribute or request specific tag)
 * indivisual post - comment comes within - viewAll_comment
 */
?>
<style>
    .post_body  { 
       font-size: 20px;
       margin: 5px;
    }
    .post_title{
      font-size: 20px;
       margin: 5px;
    }
    #image_upload{
        display:block;
        margin: auto;
    }
</style>

 <section>
     <div>
     
            
         <p><?php echo $post->post_title ;?></p>
         <br>
         <!--
         image will be here by controller 
         <img src="smiley.gif" alt="Smiley face" width="200" height="100">
         -->
     </div>
     <div>
        
                
        <p>
        <?php echo html_entity_decode($post->post_body) ;?>
        </p>
     </div>
          <div>
          
          <p><?php echo 'Published: ' . $post->created_at;?></p>
          
          
          <?php   //Only show date updated if post has been updated
          $date = $post->updated_at ;
  
          if ($date > 00000000 ){   ?> 
              
                <p><?php echo 'Last update: ' . $post->updated_at ;?></p>
                
          <?php   } ;?>
          <a href='?controller=blog&action=show&blog_id=<?php echo $post->blog_id; ?>'>Back to blog</a>
     </div>     
 </section>
