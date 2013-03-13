<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php get_post_type_object('thesis_projects'); ?>
<section class="secondaryNav">
	<div class="container">
		<div class="row">
			<div class="span12 toggle">+</div>
		</div>
		<div class="row togglebox">
			<div class="span3"><h3>Category</h3>
				<ul>
					<li><?php echo get_the_term_list( $post->ID, 'filter' ); ?></li>
				</ul>
			</div>
			<div class="span3 categories">
				<h3>Tags</h3>
				<?php
				if(get_the_tag_list()) {
				    echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
				}
				?>
			</div>
			<div class="span3 categories">
				<h3>Exhibition</h3>
				<h3>Symposium</h3>
			</div>
			<div class="span3">
				<h3>More Info</h3>
				<ul>
					<li></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container projectMain">
	<div class="row">
		<div class="span3 projectHeader">
			<h1><?php the_title(); ?></h1>
			<h2><?php echo esc_html( get_post_meta( get_the_ID(), 'student_name', true ) ); ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="span6 feature">
			<a href="#" class="thumbnail">
		      <?php the_post_thumbnail(get_post_type(), 'thesis_projects' ); ?>
		    </a>
		</div>
		<div class="span6 description">
			<?php the_content(); ?>
		</div>
	</div>
</div>
<div class="projectGallery">
	<?php 
		if (strpos($post->post_content,'[gallery') === false){ ?>
		  <div class="container"><?php echo 'no gallery'; ?></div> <?php
		}else{
		  echo get_new_royalslider(1);
		}
	?>
</div>
<div class="container author">
	<div class="row">
		<div class="span3 authorThumb">
			<a href="#" class="thumbnail">
		      <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'); endif; ?>
		    </a>
		</div>
		<div class="span6 authorDescrip">
			<h3>About</h3>
			<h4><?php echo esc_html( get_post_meta( get_the_ID(), 'student_name', true ) ); ?></h4>
			<?php echo esc_html( get_post_meta( get_the_ID(), 'student_bio', true ) ); ?>
		</div>
		<div class="span3 authorMeta">
			<h3>Faculty</h3>
			<h4>Thesis Studio</h4>
			<ul>
				<li><?php echo esc_html( get_post_meta( get_the_ID(), 'student_thesis_fall', true ) ); ?></li>
			</ul>
			<h4>Writing and Research</h4>
			<ul>
				<li><li><?php echo esc_html( get_post_meta( get_the_ID(), 'student_writing_fall', true ) ); ?></li>
			</ul>
		</div>
	</div>
	
</div>	
					

					
<section class="relatedPosts container">				
	<nav class="nav-single">
		<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
		<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
		<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
	</nav><!-- .nav-single -->
</section>


<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>

    
    
    
    
    
    
    
    