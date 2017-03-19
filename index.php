<?php include_once 'getRSS.php'; ?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>XML RSS FEED</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/round-about.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">XML RSS FEED</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

 <!-- Team Members Row -->
     

        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">This is RSS FEED
                    <small>Get news from everywhere</small>
                </h1>
                <p>It's verry simple for use. You just need to paste your URL from website who support RSS.</p>
                <br><br>

            <h3>Choose portal to change news <small> Please note that some portals doesn't provide images for XML RSS FEED</small></h3>
            
            <br> <br>

            <form action="index.php" method="POST">
            <select name="rss">
            <option value="http://www.kurir.rs/rss/edukacija/">Kurir</option>
             <option value="http://mondo.rs/rss/10/Sport/">Mondo Sport</option>
            <option value="http://www.telegraf.rs/hi-tech/rss">Telegraf</option>
            <option value="http://www.blic.rs/rss/IT">Blic</option>
            <option value="http://www.b92.net/info/rss/tehnopolis.xml">B92</option>
            <option value="http://www.pontikis.net/feed/">Pontikis</option>

            </select>
            <input type="submit" value="rss">
            </form>
            <br><br>

        <?php
        if(isset($_POST['rss'])){
    
    $i = 0;
    $link = $_POST['rss'];
    $posts = getRSS($link);

    //var_dump($posts);

    foreach ($posts as $post) {

    if ($i++ == 6) break; 

             echo "<div class='col-lg-4 col-sm-5 text-center'>";
             echo "<h5 class='top'>" . $post['title'] . "</h5>";
             
            echo "<a target='_blank' href='" . $post['link'] ."'><img src= "  . $post['image'] . " class='img-circle img-responsive img-center' style='width:120px; height:120;' alt=''></a>";
             echo "<br>";
           
             echo "<p>"  . substr($post['description'],0,50) . "</p>";

             echo "<p>"  . $post['pubDate'] . "<a class='span_link' target='_blank' href='" . $post['link'] ."'><span class='glyphicon glyphicon-circle-arrow-right' ></span></a></p>";
        echo "<br>";
        echo "<hr>";
        
       echo "</div>";


        }
        


}else{ ?>


       
    <?php
    $i = 0;
    $link = "http://www.telegraf.rs/hi-tech/rss";
    $posts = getRSS($link);

    if($link == FALSE){
        echo "Nemate internet konekciju!";
    }
    //var_dump($posts);

    foreach ($posts as $post) {

    if ($i++ == 6) break; 

             echo "<div class='col-lg-4 col-sm-6 text-center'>";
             echo "<h5 class='top'>" . $post['title'] . "</h5>";
            
             echo "<a target='_blank' href='" . $post['link'] ."'><img src= "  . $post['image'] . " class='img-circle img-responsive img-center' style='width:120px; height:120;' alt=''></a>";
             echo "<p>"  . $post['description'] . "</p>";

             echo "<p>"  . $post['pubDate'] . "<a class='span_link' target='_blank' href='" . $post['link'] ."'><span class='glyphicon glyphicon-circle-arrow-right' ></span></a></p>";
          echo "<br>";
echo "<hr>";
        
       echo "</div>";


        }

          } //else

    ?>
        
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
