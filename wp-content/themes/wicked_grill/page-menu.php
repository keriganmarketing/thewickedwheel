<?php
/**
 * @package wickedgrill
 */
get_header(); ?>

<div id="section-three">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
            	<div class="row">
                    <div class="support-content">
                    	<?php while ( have_posts() ) : the_post(); ?>
                        <header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header><!-- .entry-header -->
                        <div class="entry-content">
                            <?php the_content(); ?>
								<?php 
								
									function get_menu_categories($category_id){
										$menu_category_terms = get_terms('entree-type', array(
											'hide_empty' 		=> 1,
											'orderby' 			=> 'menu_order',
											'hierarchical'		=> true,
											'order'         	=> 'ASC',
											'offset'			=> 0,
											'parent'			=> $category_id
										) );
										
										return $menu_category_terms;
									}
									
									function get_menu_items($menu_item_slug){
										$menu_items = get_posts( array( 
                                            'post_type'        => 'entree',
                                            'posts_per_page'	=> -1,
                                            'orderby'			=> 'menu_order',
                                            'order'            => 'ASC',
                                            'offset'			=> 0,
                                            'post_status'		=> 'publish',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'entree-type',
                                                    'field' => 'slug',
                                                    'terms' => $menu_item_slug, //$custom_term->slug,
													'include_children' => false,
                                                ),
                                            ),
                                        ) );
										
										return $menu_items;
									}
								

                                    $menus = get_terms('entree-type', array(
                                        'hide_empty' 		=> 0,
                                        'orderby' 			=> 'menu_order',
                                        'order'         	=> 'ASC',
                                        'offset'			=> 0,
                                        'name'				=> array(
                                            'Our Menu'
                                        ),
                                    ) );
                                	
									$i = 1;
                                    foreach($menus as $entree_type) {
                                        
                                        echo '<div class="dinnermenu twelve columns">';
										//echo '<div class="row">';
										//echo '<div class="menu-photo four columns">';
										//$categoryphoto = get_field('category_photo','entree-type_'.$entree_type->term_id);
										//$categorydl = get_field('menu_pdf_file','entree-type_'.$entree_type->term_id);
										//echo '<img src="'.$categoryphoto['url'].'" alt="'.$categoryphoto['alt'].'" class="img-responsive" />';
										//echo '</div>';
										//echo '<div class="eight columns" style="padding:0 10px;">';
                                       // echo '<h2>'.$entree_type->name.'</h2>';
										//echo '<p>'.category_description( $entree_type->term_id ).'</p>';
										//echo '<a class="btn btn-primary" href="'.$categorydl['url'].'" target="_blank" >Download Printable Menu</a>';
										//echo '</div>';
										//echo '</div>';
                                        echo '<div class="menu-list twelve columns">';
                                        
										echo '<div id="menu'.$i.'" class="masonry" >';
										
										$m = 1;
                                        $menu_categories = get_menu_categories($entree_type->term_id);
                                        foreach ( $menu_categories as $menu_category2 ){

                                            echo '<div class="menu-category panel four columns" role="tab" >';
											echo '<h3 class="panel-title">'.$menu_category2->name.'</h3>';
											$cat2photo = get_field('category_photo','entree-type_'.$menu_category2->term_id);
											if( !empty($cat2photo) ){ echo '<img src="'.$cat2photo['url'].'" class="menu-category-photo" />'; }
											echo '<div class="panel" >';
												  
											$menu_items2 = get_menu_items($menu_category2->slug);
											foreach ( $menu_items2 as $menu_item2 ){
												$id2 = $menu_item2->ID; 
												$name2 = $menu_item2->post_title;
												$price2 = get_field('price',$id2);
												$note = get_field('description',$id2);
												?>
												<div class="menu-list-item">
													<p class="u-pull-left"><?php echo $name2; ?></p>
                                                    <span class="price u-pull-right"><?php if($price2 != ''){ echo '$'.$price2; } ?></span>
                                                    <div class="clearfix"></div>
                                                    <?php if($note!=''){
														echo '<p class="note">'.$note.'</p>';
													} ?>
												</div>
												<?php 
											}
											
											
											echo '<div class="subcategory-container" >';
											$menu_subcategories = get_menu_categories($menu_category2->term_id);
											if(count($menu_subcategories) > 0){
												//echo 'has children';
												
												$m3 = 1;
												foreach ( $menu_subcategories as $menu_subcategory ){

													echo '<div class="menu-subcategory">';
													echo '<h4 class="panel-title">'.$menu_subcategory->name.'</h4>';
													$cat3photo = get_field('category_photo','entree-type_'.$menu_subcategory->term_id);
													if( !empty($cat3photo) ){ echo '<img src="'.$cat3photo['url'].'" class="menu-category-photo" />'; }
													echo '<div class="panel" >';
													
														  
													$menu_items3 = get_menu_items($menu_subcategory->slug);
													foreach ( $menu_items3 as $menu_item3 ){
														$id3 = $menu_item3->ID; 
														$name3 = $menu_item3->post_title;
														$price3 = get_field('price',$id3);
														$note3 = get_field('description',$id3);
														?>
														<div class="menu-list-item">
															<p class="u-pull-left"><?php echo $name3; ?></p>
															<span class="price u-pull-right"><?php if($price3 != ''){ echo '$'.$price3; } ?></span>
															<div class="clearfix"></div>
															<?php if($note3!=''){
																echo '<p class="note">'.$note3.'</p>';
															} ?>
														</div>
														<?php 
													}
													$m3++;
													
													$categorynote3 = get_field('category_note','entree-type_'.$menu_subcategory->term_id);
													if($categorynote3!=''){ echo '<div class="clearfix"></div><p class="note">'.$categorynote3.'</p>'; }
													echo '</div><div class="clearfix"></div>
														</div>'; 
													
												}
												
											}
											
											$m++;
											
											$categorynote = get_field('category_note','entree-type_'.$menu_category2->term_id);
											if($categorynote!=''){ echo '<div class="clearfix"></div><p class="note">'.$categorynote.'</p>'; }
													
											echo '<div class="clearfix"></div></div></div></div>'; 
											
										}
										
										$menu_items = get_menu_items($menu_category->slug);
                                        foreach ( $menu_items as $menu_item ){
											$id = $menu_item->ID; 
											$name = $menu_item->post_title;
											$price = get_field('price',$id);
                                            ?>
                                            <div class="menu-list-item">
                                                <p><?php echo $name; ?></p>
                                            </div>
                                            <?php 
                                        }
										$i++;
                                        echo '</div></div></div>'; 
                                    } ?>
                    
       						</div>
                    	<?php endwhile; // end of the loop. ?>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>