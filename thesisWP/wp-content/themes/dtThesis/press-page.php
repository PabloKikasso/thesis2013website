<?php
/*
Template Name: Press Page Template
*/
?>

<?php get_header(); ?>
<div class="secondaryNav">
	<div class="container">
		<div class="row">
			<div class="span9">
				<div class="pressDescrip">
					<p>Parsons The New School for Design presents the MFA Design + Technology Thesis Show 2013, composed of an exhibition, screening, and symposium by this year's degree program candidates.</p>
					<button class="button">See the Schedule</button>
				</div>
			</div>
			<div class="span3">
				<div class="contactDetails">
					<h2>Contact</h2>
					<p>6 E. 16th Street, 12th Floor<br />
					New York, NY 10011</p>
					<p>P. (212) 229-8908<br />
					press[at]amt.parsons.edu</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<div class="page-header"><h1><?php the_title(); ?></h1></div>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_content(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
			
							<p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","bonestheme") . ': ', ', ', '</span>'); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
				
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
</div>

<?php get_footer(); ?>