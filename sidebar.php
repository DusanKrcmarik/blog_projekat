<?php
   try {

       $conn = new PDO('mysql:host=127.0.0.1;dbname=blog', 'root', 'vivify');

       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       

   }

   catch(PDOException $e)

   {

       echo $e->getMessage();

   }

   $statement = $conn->prepare('SELECT * FROM posts LIMIT 5');

   $statement->execute();

   $statement->setFetchMode(PDO::FETCH_ASSOC);

   $posts = $statement->fetchAll();




?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
<h1> Latest posts </h1>
<?php


foreach ($posts as $post) {
   




?>

       
         <a href="single-post.php?post_id=<?php echo $post['id'] ?>"> <h5 class="classforaside"><?php echo $post['title'] ?></h5> </a>
         
     

<?php
}


?>
</aside><!-- /.blog-sidebar -->



