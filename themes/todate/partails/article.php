<?php
global $site_url;
?>
<div class="col l6 m12 s12 articles qd_blog_lists">
    <div class="to_main_blogs">
		<div class="avatar">
			<img src="<?php echo GetMedia($article->thumbnail);?>" alt="<?php echo $article->img_alt?$article->img_alt:$article->title;?>">
			<div class="to_main_blogs_info">
				<div class="valign-wrapper to_blog_mini_hdr">
                                    <!--modified by Community Devs LLC-->
                                    <?php 
                                        $cats = Dataset::blog_categories();
                                        if($cats) {
                                            foreach ($cats as $key=>$cat) {
                                                if($key == $article->category) {
                                                    ?>
                                                    <a class="to_blog_mini_cat" href="<?php echo $site_url;?>/blogs/<?php echo $article->category . '_' . url_slug(html_entity_decode($cat));?>" data-ajax="/blogs/<?php echo $article->category . '_' . url_slug(html_entity_decode($cat));?>"><?php echo $cat;?></a>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                    
					<time><?php echo get_time_ago($article->created_at);?></time>
				</div>
				<h2 class="art-title">
					<a href="<?php echo $site_url;?>/blogs/<?php echo $article->slug;?>" data-ajax="/blogs/<?php echo $article->slug;?>"><?php echo $article->title;?></a>
				</h2>
				<div class="to_blog_mini_foot">
					<a href="<?php echo $site_url;?>/blogs/<?php echo $article->slug;?>" data-ajax="/blogs/<?php echo $article->slug;?>" class="btn btn-flat btn_primary waves-effect waves-light"><?php echo __( 'READ MORE' );?> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13.172 12l-4.95-4.95 1.414-1.414L16 12l-6.364 6.364-1.414-1.414z" fill="currentColor"/></svg></a>
				</div>
			</div>
		</div>
    </div>
</div>