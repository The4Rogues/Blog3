 <section>

    <p>Comments</p>
    <?php if(empty($comments)){ 
            echo "Noone has commented on this post yet";}
        
        else { //loop thru comments to display     
            $_SESSION['post_id'] = $_GET['post_id'];    //so can return to correct post if comment deleted 
            foreach($comments as $comment) { ?>
                <div>
                    <p><?php echo  $comment->created_at.' '.$comment->comment_body ;?>&nbsp; &nbsp;

                    <?php 
                        // if it is logged in users comment show "delete button"
                        if (isset($_SESSION['user_id'])){
                            if($_SESSION['user_id']==$comment->user_id){  ?>
                            <a href='?controller=comment&action=delete&comment_id=<?= $comment->id; ?>'>Delete Comment</a> &nbsp; &nbsp;
                    <?php   } 
                        }
            }                           
        }?>
                </div>  
               
        <?php // if user logged in
        if (!empty($_SESSION['username'])){ ?>
    <div> 
        <h3>Add comment here!</h3>
        <form action="" method="post" >

            <textarea class="comment_body" name="comment_body" rows="5" cols="60" placeholder="Write your Story here">
            </textarea>
            <!-- need to check this href with controller probably if post then process of add-->
            <input type="submit" name="add" href=?controller=comment&action=viewAll&post_id=<?= $_GET['post_id']; ?>" />

            <a href="?controller=post&action=&post_id=<?= $_GET['post_id']; ?>">Cancel</a>
        </form>
        <?php } ?>
    </div>
 </section>
