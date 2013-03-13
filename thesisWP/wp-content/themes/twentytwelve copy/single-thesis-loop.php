<?php
 /*Template Name: Thesis Projects
 */
 
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
    <?php
    $mypost = array( 'post_type' => 'thesis_projects', );
    $loop = new WP_Query( $mypost );
    ?>
	    <ul class="mainTiles">
	    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
	        <li <?php post_class(); ?>>
	            <header class="entry-header">
	 
	                <!-- Display featured image in right-aligned floating div -->
	                <div class="projectThumb">
	                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_post_thumbnail( array( 150, 150 ) ); ?></a>
	                </div>
	                <div class="projectMeta">
		                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a><br />
		                <?php echo esc_html( get_post_meta( get_the_ID(), 'student_name', true ) ); ?>
		                <br />
		               <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ' ', '</p>'); ?>
	                </div>
	                <!-- Display Title and Author Name -->
	               
	                
	            </header>
	 
	            
	        </li>
	 
	    <?php endwhile; ?>
	    </ul>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
