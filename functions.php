<?php

// Basic Theme Features
function owndefault_theme_setup() {
	register_nav_menus(array(
		'header_location' => __('Header Navigation Menu'),
		//'siderbar_location' => __('Mobile Navigation Menu'),
		//'footer_location' => __('Footer Navigation Menu')
	));
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_filter('widget_text', 'do_shortcode');
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	add_theme_support( 'post-formats', array(
		'image', 'video', 'link'/*, 'gallery' , 'status', 'audio', 'chat', 'aside', 'quote'*/
	) );
}
add_action('init', 'owndefault_theme_setup');

//Register scripts and styles
function owndefault_scripts_styles() {
	// Threaded Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// jQuery implementation
	wp_register_script( 'jQu', '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js' );
	wp_enqueue_script( 'jQu');

	// Loads JavaScript file
	wp_enqueue_script( 'owndefault-script', get_template_directory_uri() . '/js/functions.js', array(), '1.0.0', true );

	// Social-Likes Button jS
	wp_enqueue_script( 'social-likes-js', get_template_directory_uri() . '/social-likes/social-likes.min.js', array());

	// Loads the info stylesheet.
	wp_enqueue_style( 'owndefault-template-info', get_stylesheet_uri(), array(), '1.0.0' );

	// Loads our main stylesheets.
	wp_enqueue_style( 'normalization', get_template_directory_uri() . '/css/normalize.min.css', array());
	wp_enqueue_style( 'skeleton-css', get_template_directory_uri() . '/css/skeleton.min.css', array());
	wp_enqueue_style( 'owndefault-style-css', get_template_directory_uri() . '/css/style.min.css', array(), '1.0.0' );
	wp_enqueue_style( 'social-likes-css', get_template_directory_uri() . '/social-likes/social-likes_birman.css', array());
	wp_register_style( 'fontawesome-style-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_register_style( 'raleway-font', 'http://fonts.googleapis.com/css?family=Raleway:400,300,600' );
	wp_enqueue_style( 'fontawesome-style-css' );
	wp_enqueue_style( 'raleway-font' );
}
add_action( 'wp_enqueue_scripts', 'owndefault_scripts_styles' );

//Register Siderbars for Widgets
function owndefault_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'owndefault' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the sidebar section of the site.', 'owndefault' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/*
	register_sidebar( array(
		'name'          => __( 'Secondary Widget Area', 'owndefault' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'owndefault' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	*/
}
add_action( 'widgets_init', 'owndefault_widgets_init' );


if ( ! function_exists( 'owndefault_social_likes' ) ) :
// Social-Likes Includement
function owndefault_social_likes() {
	echo '<div class="social-likes social-likes_single" data-counters="no" data-single-title="Share">
	<div class="facebook" title="Share link on Facebook">Facebook</div>
	<div class="twitter" data-via="openDivisionUX" title="Share link on Twitter">Twitter</div>
	<div class="plusone" title="Share link on Google+">Google+</div>
	</div>';
}
endif;



if ( ! function_exists( 'owndefault_entry_meta' ) ) :
// The Meta data for every post
function owndefault_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'owndefault' ) . '</span>';

	owndefault_entry_date();

	/*
	$categories_list = get_the_category_list( __( ', ', 'owndefault' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links"><i class="fa fa-folder"></i>' . $categories_list . '</span>';
	}
	*/

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'owndefault' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links"><i class="fa fa-tags"></i>' . $tag_list . '</span>';
	}

	// Post author
	/*
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'owndefault' ), get_the_author() ) ),
			get_the_author()
		);
	}
	*/
}
endif;

if ( ! function_exists( 'owndefault_entry_date' ) ) :
// The Date function for Meta data
function owndefault_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'owndefault' );
	else
		$format_prefix = '%2$s';
	$date = sprintf( '<span class="date"><i class="fa fa-clock-o"></i><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'owndefault' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);
	if ( $echo )
		echo $date;
	return $date;
}
endif;

// Returns post URL
function owndefault_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );
	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'owndefault_excerpt_more' ) && ! is_admin() ) :
// Excerpt function
function owndefault_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			sprintf( __( 'Read more <span class="meta-nav">&raquo;</span>', 'owndefault' ))
		);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'owndefault_excerpt_more' );
endif;

if ( ! function_exists( 'owndefault_comment_nav' ) ) :
// Comment Navigation
function owndefault_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'owndefault' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'owndefault' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;
				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'owndefault' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;	?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

// Pre-Title icons for every postformat
function owndefault_post_icon() {
	$format = get_post_format();
	if ( false === $format ) : ?> <i class="fa fa-file-text-o"></i> <?php  endif;//default post
	if ( link === $format ) : ?> <i class="fa fa-link"></i> <?php  endif;//link post
	if ( image === $format ) : ?> <i class="fa fa-th-large"></i> <?php  endif;//image post
	if ( video === $format ) : ?> <i class="fa fa-video-camera"></i> <?php  endif;//video post
}

/*
if ( ! function_exists( 'owndefault_paging_nav' ) ) :
// Paging Navigation
function OUTDATET_owndefault_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<!-- <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'owndefault' ); ?></h1> -->
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'owndefault' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'owndefault' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
*/

/*
THIS IS THE ADVANCED PAGINATION NAV WITH NUMBERS INSTEAD OF OLD/NEW
*/
function owndefault_paging_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="page-navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

function the_breadcrumb() {
	if (!is_home()) {
		echo '<div class="breadcrumbs"><i class="fa fa-home fa-fw"></i><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a> » ";
		if (is_category() || is_single()) {
			echo '<i class="fa fa-folder-o fa-fw"></i>';
			the_category('title_li=');
			if (is_single()) {
				echo " » ";
				the_title();
				echo '</div>';
			}
		} elseif (is_page()) {
			echo the_title();
			echo '</div>';
		}
	}
}

function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

?>