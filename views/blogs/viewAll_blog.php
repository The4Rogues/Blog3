
<!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<?php
// leave this in
// if (!empty($_SESSION['username'])) {
//     echo "Hello, you are logged in as " . $_SESSION['username'] . '<br>';
//     echo '<br>';
// }
?> 

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div>
    <!-- Header -->
    <div class="w3-container w3-center w3-padding-hor-32 bg4"> 

        <!-- Grid -->
        <div class="container">
            <h1><b>Welcome to BlogsAreUs</b></h1>
            <h3 class="sub-heading1">Latest blogs</h3>

            <div class="row display-flex">
                <!-- Blog entries -->

                <!-- Blog entry -->
                <?php foreach ($blogs as $blog) { ?> 
                    <div class="col-md-4 col-sm-6 card-col">
                        <div class="card thumbnail">
                            <img src="<?= $blog->blog_image ?>" alt="Game of Thrones" style="width:100%">
                            <div class="card-body">
                                <h5 class="card-title"><?= $blog->blog_title ?></h5>
                                <h5><span class="w3-opacity"><?= (new DateTime($blog->date_created))->format('d F Y') ?> </span></h5>
                                <p class="card-text blog-summary"><?= html_entity_decode($blog->blog_summary) ?></p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button onclick="window.location = '?controller=blog&action=show&blog_id=<?= $blog->id; ?>'" class="w3-btn w3-padding-large w3-white w3-border w3-hover-border-black readmore"><b>READ MORE »</b></button>
                                    </div>  
                                    <div class="col-md-6">
                                        <p><b>Comments</b><br><span class="w3-tag">0</span></p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>
                <?php } ?>
                <!-- END BLOG ENTRIES -->
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>

    <!-- END Introduction Menu -->
</div>

<!-- END GRID -->

<!-- END w3-content -->

<!-- what is the purpose of the script? -->
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>



