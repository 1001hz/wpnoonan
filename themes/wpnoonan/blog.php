<?php
/**
 * Template Name: Blog listing
 * The blog listing
 *
 * @package wpnoonan
 * @subpackage Wpnoonan
 * @since Wpnoonan 1.0
 */

get_header(); ?>


        <?php
        $args = array();
        $cat_name = get_query_var('category');

$cat_id = get_cat_ID($cat_name);
        if(isset($cat_id)){
        	$args = array( 'cat' => $cat_id );
        }
        $latest_posts = get_posts($args);
?>

<div class="content content--flat">
	<div class="content__left">
        <h1>Blog</h1>

		<?php if($cat_name !== '' && $cat_name !== null){ ?>
        <p class="small">Filtering by: <span class="blog__pill"><?php echo $cat_name; ?></span> : <a href="/blog">Clear filter</a></p>

        <?php } ?>


<?php
        foreach($latest_posts as $post) :
        $categories = wp_get_post_categories($post->ID, array(fields => 'names'));
        $userData = get_userdata($post->post_author);
        $dat = date_create_from_format('Y-m-d H:i:s', $post->post_date);

        $arrBlogMeta = get_post_custom( $post->ID );
        $blogAuthorID = $arrBlogMeta['wpn_blog_author'][0];
        $blogDescription = $post->post_excerpt;

        $arrUserMeta = get_post_custom( $blogAuthorID );
		$staffFirstName = $arrUserMeta['wpn_staff_fname'][0];
		$staffLastName = $arrUserMeta['wpn_staff_lname'][0];
		$staffDescription = $arrUserMeta['wpn_staff_description'][0];
		$staffRole = $arrUserMeta['wpn_staff_role'][0];
		$staffImg = wp_get_attachment_url($arrUserMeta['wpn_staff_image'][0]);
        ?>



        <header class="blog__item">
        <a href="<?php echo get_the_permalink($post->ID); ?>">
			<div class="wow fadeIn">
				<h2 class="content__title"><?php echo $post->post_title ?></h2>
				<div class="content__post-date">Published <?php echo date_format($dat, 'd-m-Y') ?></div>
			<div>


			<div class="staff__card content__author">
				<div class="staff__card-image staff__image staff__image--round staff__image--small">
					<div style="background-image: url(<?php echo $staffImg; ?>)"></div>
				</div>
				<div class="staff__card-details">
					<div class="staff__card-name"><?php echo $staffFirstName .' '.$staffLastName ; ?></div>
               		<div class="staff__card-role"><?php echo $staffRole; ?></div>
                </div>
			</div>

			<p>
				<?php echo $blogDescription; ?>
				<span class="blog__read-on">Read on &hellip;</span>
			</p>
		</a>
		<p>
			<ul class="blog__categories">
				<?php foreach($categories as $cat): ?>
					<li class=""><a class="blog__pill blog__pill--link" href="?category=<?php echo $cat ?>"><?php echo $cat; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</p>
		</header><!-- .entry-header -->
		<?php endforeach; ?>

	</div>

	<div class="content__right content__right--for-mobile">
		<?php
		get_template_part( 'template-parts/hot-topics', '' );
		?>
	</div>

</div>
<?php get_footer(); ?>
