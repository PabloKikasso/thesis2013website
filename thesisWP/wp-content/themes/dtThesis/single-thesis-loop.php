<?php
 /*Template Name: Thesis Projects
 */
 
get_header(); ?>
	<?php
	    $mypost = array( 'post_type' => 'thesis_projects', );
	    $loop = new WP_Query( $mypost );
	    $count_posts = wp_count_posts('thesis_projects');
	?>
	
	<section class="secondaryNav">
		<div class="container header">
			<div class="row">
				<div class="span12 toggle">+</div>
			</div>
			<div class="row togglebox">
				<div class="span3 page-name-col">
					<h3>Projects</h3>
					<p><?php echo $count_posts->publish; ?></p>
				</div>
				<?php  
				    $terms = get_terms('filter', $args);  
				    $count = count($terms);   
				    $i=0;
				    	
				    if ($count > 0) {  
				    	$term_list = '<div class="span3 category-col"><h3>Category</h3><ul class="filter clearfix"><li class="active"><a href="javascript:void(0)" class="all">All Projects</a></li>';
							foreach ($terms  as $term) {  
						    $i++;  
						    $term_list  .= '<li><a href="javascript:void(0)" class="'.  $term->slug .'">' . $term->name . '</a></li>'; 
						    
						    if($i%3 == 0){
							    $term_list .= '</ul></div><div class="span3 category-col"><h3>&nbsp;</h3><ul class="filter clearfix">';
						    } 
						          
						            if ($count  != $i)  
						            {  
						                $term_list .= '';  
						            }  
						            else  
						            {  
						                $term_list .= '';  
						            }  
						        }  
				        $term_list .= '</ul></div>';
				        echo $term_list;
				    }  
				?>
				<div class="span3 tag-col">
					<h3>Top Tags</h3>
					<ul>
						<li class="tag"><a href="#">Tag name</a></li>
						<li class="tag"><a href="#">Another tag</a></li>
						<li class="tag"><a href="#">Tag name</a></li>
						<li class="tag"><a href="#">Another tag</a></li>
					</ul>
					<button type="button">
						<?php
$randomPost = $wpdb->get_var("SELECT guid FROM $wpdb->posts WHERE post_type = 'thesis_projects' AND post_status = 'publish' ORDER BY rand() LIMIT 1");
echo '<a href="'.$randomPost.'">Project Picker</a>';
?>
					</button>
				</div>
			</div>
		</div>
	</section>
	<section class="projectTiles">
		<div class="container">
			<!--Begin Tiles -->
			<ul class="projects filterable-grid clearfix">
			<?php  
			    $wpbp = new WP_Query(array(  
			            'post_type' =>  'thesis_projects',  
			            'posts_per_page'  =>'-1'  
			        )  
			    );  
			?>
			<?php if ($wpbp->have_posts()) : while  ($wpbp->have_posts()) : $wpbp->the_post(); ?>  
				
				<?php $terms = get_the_terms( get_the_ID(), 'filter' ); ?>
				
				    <li class="span3 shadow " data-id="id-<?php echo $count; ?>"  data-type="<?php foreach ($terms as $term) { echo  strtolower(preg_replace('/\s+/', '-', $term->name)). ' '; } ?>">  
				      
				        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) :  ?>  
				        <div class="projectThumb"> 
				            <a href="<?php the_permalink(); ?>"><?php  the_post_thumbnail('thesis_projects'); ?></a>
				              
				        <?php endif;  ?>  
				        </div>
				          
				        <h2><a href="<?php the_permalink(); ?>"><?php echo  get_the_title(); ?></a></h2>  
				        <h3><?php echo esc_html( get_post_meta( get_the_ID(), 'student_name', true ) ); ?></h3>
				        <div class="projectTags">
					        <?php the_tags('<p class="tags"><span class="tags-title"></span> ', ' ', '</p>'); ?>
				        </div>
				    </li>   
			
			<?php $count++; ?> 
			    
			<?php endwhile; endif; ?>  
			<?php wp_reset_query(); ?> 
			</ul> 
			
		</div>
	</section>
	
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
