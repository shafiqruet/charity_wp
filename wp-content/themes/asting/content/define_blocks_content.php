<?php

/* This is functions define blocks to display post */

if ( ! function_exists( 'asting_content_thumbnail' ) ) {
  function asting_content_thumbnail( $size ) {
    if ( has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image') )  :
      the_post_thumbnail( $size, array('class'=> 'img-responsive' ));
    endif;
  }
}

if ( ! function_exists( 'asting_postformat_video' ) ) {
  function asting_postformat_video( ) { ?>
    <?php if(has_post_format('video') && wp_oembed_get(get_post_meta(get_the_id(), "ova_met_embed_media", true))){ ?>
	    <div class="js-video postformat_video">
	        <?php echo wp_oembed_get(get_post_meta(get_the_id(), "ova_met_embed_media", true)); ?>
	    </div>
    <?php } ?>
  <?php }
}

if ( ! function_exists( 'asting_postformat_audio ') ) {
  function asting_postformat_audio( ) { ?>
    <?php if(has_post_format('audio') && wp_oembed_get(get_post_meta(get_the_id(), "ova_met_embed_media", true))){ ?>
	    <div class="js-video postformat_audio">
	        <?php echo wp_oembed_get(get_post_meta(get_the_id(), "ova_met_embed_media", true)); ?>
	    </div>
    <?php } ?>
  <?php }
}

if ( ! function_exists( 'asting_content_title' ) ) {
  function asting_content_title() { ?>

    <?php if ( is_single() ) : ?>
      <h1 class="post-title">
          <?php the_title(); ?>
      </h1>
    <?php else : ?>
      <h2 class="post-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
          <?php the_title(); ?>
        </a>
      </h2>
      <?php endif; ?>

 <?php }
}


if ( ! function_exists( 'asting_content_meta' ) ) {
  function asting_content_meta( ) { ?>
	    <span class="post-meta-content">
		    <span class=" post-date">
		    	<span class="left"><i class="far fa-calendar-alt"></i></span>
		        <span class="right"><?php the_time( get_option( 'date_format' ));?></span>
		    </span>
		    <span class="slash">/</span>
		    <span class=" post-author">
		        <span class="left"><i class="fas fa-user"></i></span>
		        <span class="right"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></span>
		    </span>
		    <span class="slash">/</span>
		    <span class=" comment">
		        <span class="left"><i class="fa fa-commenting-o"></i></span>
		        <span class="right">                   
		            <?php comments_popup_link(
		            	esc_html__(' 0 Comments', 'asting'), 
		            	esc_html__(' 1 Comment', 'asting'), 
		            	' % '.esc_html__('Comments', 'asting'),
		            	'',
                  		esc_html__( 'Comment off', 'asting' )
		            ); ?>
		        </span>                
		    </span>
		</span>
  <?php }
}


if ( ! function_exists( 'asting_content_meta2' ) ) {
  function asting_content_meta2( ) { ?>
  	   <div class=" post-date">
		        <span class="top"><?php the_time( 'j')?></span>
		         <span class="bottom"><?php the_time( 'M')?></span>
		    </div>
	    <div class="post-meta-content">
		    <span class=" post-author">
		        <span class="left"><i class="fas fa-user"></i></span>
		        <span class="right"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'display_name' ); ?></a></span>
		    </span>
		    <span class="slash">/</span>
		    <span class=" comment">
		        <span class="left"><i class="fa fa-commenting-o"></i></span>
		        <span class="right">                    
		            <?php comments_popup_link(
		            	esc_html__(' 0 Comments', 'asting'), 
		            	esc_html__(' 1 Comment', 'asting'), 
		            	' % '.esc_html__('Comments', 'asting'),
		            	'',
                  		esc_html__( 'Comment off', 'asting' )
		            ); ?>
		        </span>                
		    </span>
		</div>
  <?php }
}

if ( ! function_exists( 'asting_content_body' ) ) {
  function asting_content_body( ) { ?>
  	<div class="post-excerpt">
		<?php if(is_single()){
		    the_content();
		    wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'asting' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '%',
				'separator'   => '',
			) );             
		}else{
			the_excerpt();
		}?>
	</div>

	<?php 
	}
}

if ( ! function_exists( 'asting_content_readmore' ) ) {
  function asting_content_readmore( ) { ?>
  	<div class="post-footer">
		<div class="asting-post-readmore">
		    <a class="btn btn-theme btn-theme-transparent" href="<?php the_permalink(); ?>"><?php  esc_html_e('Read more', 'asting'); ?></a>
		</div>
	</div>
 <?php }
}

if ( ! function_exists( 'asting_content_readmore_classic' ) ) {
  function asting_content_readmore_classic( ) { ?>
  	<div class="post-footer">
		<div class="asting-post-readmore">
		    <a class="btn-readmore" href="<?php the_permalink(); ?>">
		    	<?php  esc_html_e('Read more', 'asting'); ?>
		    	<i data-feather="arrow-right"></i>
		    </a>
		</div>
	
		<?php if( has_filter( 'ova_share_social' ) ){ ?>
			<div class="socials-inner">
				<div class="share-social">
					<span class="asting-svg-icon">
						<i class="fas fa-share-alt"></i>
					</span>
					<?php 
						$link = get_the_permalink();
						$title = get_the_title(); 
					?>
						        			
					<?php echo apply_filters( 'ova_share_social', $link, $title  ); ?>
				</div>
			</div>
		<?php } ?>

	</div>
 <?php }
}

if ( ! function_exists( 'asting_content_tag' ) ) {
  function asting_content_tag( ) { ?>
	
	    <footer class="post-tag">
	        <?php if(has_tag()){ ?>
	            <span class="post-tags">
	            	<span class="ovatags"><?php esc_html_e('Tags: ', 'asting'); ?></span>
	                <?php the_tags('','&nbsp;',''); ?>
	            </span>
	        <?php } ?>
	      

	        <?php if( has_filter( 'ova_share_social' ) ){ ?>
		        <div class="share_social">
		        	<?php echo apply_filters('ova_share_social', get_the_permalink(), get_the_title() ); ?>
		        </div>
	        <?php } ?>
	    </footer>
	
 <?php }
}

if ( ! function_exists( 'asting_content_gallery' ) ) {
 	function asting_content_gallery( ) {
 			
 			$post_id = get_the_ID();

			$gallery = get_post_meta($post_id, 'ova_met_file_list', true) ? get_post_meta($post_id, 'ova_met_file_list', true) : '';

			$carousel_id = 'carousel'.$post_id.'gallery';

		    $k = 0;
		    if($gallery){ $i=0; ?>

		        <div id="<?php echo esc_attr($carousel_id); ?>" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
				  	<?php foreach ($gallery as $key => $value) { $active = ( $i == 0 ) ? 'active' : ''; ?>
				    	<li data-target="#<?php echo esc_attr($carousel_id); ?>" data-slide-to="<?php echo esc_attr($i); ?>" class="<?php echo esc_attr($active); ?>"></li>
				    <?php $i++; } ?>
				  </ol>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
				  	<?php foreach ($gallery as $key => $value) { $active_dot = ( $k == 0 ) ? 'active' : ''; ?>
					    <div class="carousel-item <?php echo esc_attr($active_dot); $k++; ?>">
					      <img class="img-responsive" src="<?php  echo esc_attr($value); ?>" alt="<?php the_title_attribute(); ?>">
					    </div>
				   	<?php } ?>
				   </div>

				</div>

		       
		        <?php
		    }
	}
}






//Custom comment List:
if ( ! function_exists( 'asting_theme_comment' ) ) {
function asting_theme_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <article class="comment_item" id="comment-<?php comment_ID(); ?>">

         <header class="comment-author">
         	<?php echo get_avatar($comment,$size='70', $default = 'mysteryman' ); ?>
         </header>

         <section class="comment-details">

            <div class="author-name">

            	<div class="name">
            		<?php printf('%s', get_comment_author_link()) ?>
            		<span class="date">
	            		<?php printf(get_comment_date()) ?>	
	            	</span>
            	</div>

            	

                <div class="ova_reply">
		            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		            <?php edit_comment_link( esc_html__( '(Edit)', 'asting' ), '  ', '' );?>
	            </div>
	        </div> 

            <div class="comment-body clearfix comment-content">
			    <?php comment_text() ?>
			</div>

        </section>

          <?php if ($comment->comment_approved == '0') : ?>
             <em><?php esc_html_e('Your comment is awaiting moderation.', 'asting') ?></em>
             <br />
          <?php endif; ?>
        
     </article>
<?php
}
}








