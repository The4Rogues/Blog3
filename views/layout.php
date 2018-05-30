<?php
/*
 * Copied from peters PHP
 * please change as you like
 */

session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="views/css/main.css">

        <title>Blog</title>
    </head>

    <body>
        <div class="modal fade">
            <div class="modal-dialog">
                <form action="index.php?controller=user&action=login" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">×</a>
                            <h3 class="login">Login to Your Account</h3>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="username" placeholder="Username">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" name="login" class="btn btn-success" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">BlogsAreUs</a>
                </div>
                <ul class="nav navbar-nav">
                    <?php if (!empty($_SESSION['user_id'])) {?>
                    <li><a href="?controller=blog&action=create">Create Blog</a></li>
                    <?php } ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                                        
                <?php if (empty($_SESSION['user_id'])) { ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target=".modal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li>
                    <li>
                        <a href="?controller=user&action=register"><span class="glyphicon glyphicon-user"></span>Create Account</a>
                    </li>
                <?php } else { ?> 
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="?controller=user&action=show"><?= $_SESSION['username']; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="?controller=user&action=show">Your profile</a></li>
                            <li><a href="?controller=user&action=update">Update profile</a></li>
                             <li><a href="?controller=user&action=update">Delete profile</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?controller=user&action=logout">Sign Out</a>
                    </li>
                <?php } ?>
                    
                    
                    <li></li>
                </ul>
            </div>
        </nav>


        <div>
            <?php
            require_once('connection.php');

            if (isset($_GET['controller']) && isset($_GET['action'])) {
                $controller = $_GET['controller'];
                $action = $_GET['action'];
            } else {
                $controller = 'blog';
                $action = 'viewAll';
            }
            ?>

            <div class="blog-content-container">
                <?php
                require_once('routes.php');
                ?>
            </div>
            <!--end of php-->
        </div>
        <div class="footer w3-text-dark-gray">
            <footer>
                For support contact us at support@BlogsAreUs.com ~ Created by The6Rogues &COPY;
                <?= date('Y'); ?>
                <!--   Copyright &COPY; <?= date('Y'); ?> -->
            </footer>
        </div>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <!-- Include external JS libs. -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

        <!-- Include Editor JS files. -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/js/froala_editor.pkgd.min.js"></script>
        
        <script>
            // mogin modal 
            $(document).ready(function () {
                var fields = ['fullscreen', 'bold', 'italic', 'underline', 'strikeThrough',
                    'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color',
                    'inlineStyle', 'paragraphStyle', '|', 'paragraphFormat', 'align', 'formatOL',
                    'formatUL', 'outdent', 'indent', 'quote', '-', 'insertLink', 'insertImage',
                    'insertVideo', 'insertFile', 'insertTable', '|', 'emoticons',
                    'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print',
                    'help', 'html', '|', 'undo', 'redo'
                ];

                $('#edit')
                        .froalaEditor({
                            heightMin: 250,
                            textDefaultAlign: "left"
                        }).on('froalaEditor.image.beforeUpload', function (e, editor, files) {
                    if (files.length) {
                        // Create a File Reader.
                        var reader = new FileReader();
                        // Set the reader to insert images when they are loaded.
                        reader.onload = function (e) {
                            var result = e.target.result;
                            editor.image.insert(result, null, null, editor.image.get());
                        };
                        // Read image as base64.
                        reader.readAsDataURL(files[0]);
                    }
                    editor.popups.hideAll();
                    // Stop default upload chain.
                    return false;
                });
            });
            </script>
    <script type="text/javascript">
     // nav bar
    $(document).ready(function (){
        var loggedIn='';
        loggedIn = '<?php if (isset($_SESSION['username'])){echo $_SESSION['username'];} ?>';
        //if logged in
        if (loggedIn){

        $("#username-box").html(loggedIn);
        $("#login-nav").hide();
        $("#register-nav").hide();
        }
        // if not logged in
        else if (loggedIn==''){

        $("#logout-nav").hide();
        $("#username-nav").hide();
        }
    });
         
        </script>
    </body>

</html>