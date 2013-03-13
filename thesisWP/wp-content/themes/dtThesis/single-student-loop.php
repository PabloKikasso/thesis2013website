<?php
 /*Template Name: Thesis Students
 */
 
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
    <?php
    $mypost = array( 'post_type' => 'thesis_projects', );
    $loop = new WP_Query( $mypost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
 
                <!-- Display featured image in right-aligned floating div -->
                <div class="studentPhoto">
	            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'secondary-image'); endif; ?></a>
            </div>
 
                <!-- Display Title and Author Name -->
                <strong>Title: </strong><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a><br />
                <strong>Creator: </strong>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'student_name', true ) ); ?>
                <br />

               <strong>From: </strong>
                <?php echo esc_html( get_post_meta( get_the_ID(), 'student_location', true ) ); ?>
                <br />
            </header>
 
            
            <div class="studentBio">
	            <?php echo esc_html( get_post_meta( get_the_ID(), 'student_bio', true ) ); ?>
            </div>
            
        </article>
 
    <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>

