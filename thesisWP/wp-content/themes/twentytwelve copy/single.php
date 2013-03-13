<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" >
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		            <header class="entry-header">
		 
		                <!-- Display featured image in right-aligned floating div -->
		                <div class="projectThumb">
		                    <?php the_post_thumbnail( array( 150, 150 ) ); ?>
		                </div>
		                <div class="projectMeta">
			                <?php the_title(); ?><br />
			                <?php echo esc_html( get_post_meta( get_the_ID(), 'student_name', true ) ); ?>
			                <br />
			               <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
		                </div>
		                <!-- Display Title and Author Name -->
		               
		                
		            </header>
		            <section class="post_content">
							<?php the_content(); ?>
					
					</section> <!-- end article section -->
					

					<section class="studentDetails">
						<div class="studentPhoto">
				            <?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'); endif; ?>
			            </div>
						<div class="studentBio">
				            <?php echo esc_html( get_post_meta( get_the_ID(), 'student_bio', true ) ); ?>
			            </div>
			            <div class="studentMeta">
			            	<ul>
				            	<li><?php echo esc_html( get_post_meta( get_the_ID(), 'student_thesis_fall', true ) ); ?></li>
				            	<li><?php echo esc_html( get_post_meta( get_the_ID(), 'student_writing_fall', true ) ); ?>
</li>
			            	</ul>
			            	<ul>
				            	<li><?php echo esc_html( get_post_meta( get_the_ID(), 'student_thesis_spring', true ) ); ?></li>
				            	<li><?php echo esc_html( get_post_meta( get_the_ID(), 'student_writing_spring', true ) ); ?></li>
			            	</ul>
				            <div class="clear"></div>
			            </div>
					</section>
		            
		        </article>
				
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
<?php 
	if (strpos($post->post_content,'[gallery') === false){
	  echo 'no gallery';
	}else{
	  echo get_new_royalslider(1);
	}
?>
    
    
    
    
    
    
    
    