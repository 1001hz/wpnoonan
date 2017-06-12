<h2>Hot Topics</h2>


<ul  class="blog__topics">
<?php
    $categories = get_categories();
    foreach($categories as $c):
    $cat = get_category( $c );
?>
    <li><a href="/blog?category=<?php echo $cat->name ?>"><?php echo $cat->name ?></a></li>
<?php endforeach; ?>
</ul>