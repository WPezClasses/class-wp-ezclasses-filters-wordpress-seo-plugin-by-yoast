<?php
/** 
 * The numerous filters for the popular WordPress plugin WordPress SEO by Yoast (http://wordpress.org/plugins/wordpress-seo/).
 *
 * Version 1.4.24 for the free version of WordPress SEO. 
 *
 * PHP version 5.3
 *
 * LICENSE: MIT
 *
 * @package WP ezBoilerStrap
 * @author Mark Simchock <mark.simchock@alchemyunited.com>
 * @since 0.5.0
 * @license MIT
 */
 
/*
 * == Change Log == 
 *
 */
 
/*
 * Using
 * =====
 *
 * $obj_new_yoast_seo = Class_WP_ezClasses_Filters_WordPress_SEO_Plugin_By_Yoast::ezc_get_instance($arr_args);
 *
 * $obj_new_yoast_seo->wordpress_seo_filters_add();
 *
 * You can pass in $arr_args which will be array_merge()'ed with wordpress_seo_filters_active(), or extends this class and implement your own wordpress_seo_filters_active().
*/
  
// No WP? Die! Now!!
if (!defined('ABSPATH')) {
	header( 'HTTP/1.0 403 Forbidden' );
    die();
}

// Class_WP_ezClasses_Filters_WordPress_SEO_Plugin_By_Yoast

if (!class_exists('Class_WP_ezClasses_Filters_WordPress_SEO_Plugin_By_Yoast')) {
	class Class_WP_ezClasses_Filters_WordPress_SEO_Plugin_By_Yoast extends Class_WP_ezClasses_Master_Singleton {
	
		protected $_arr_filters_active;
		
		public function __construct(){
			parent::__construct();
		}
		
		/**
		 * 
		 */
		public function ezc_init($arr_args = NULL){	

			$this->_arr_filters_active = $this->wordpress_seo_filters_active();
			if ( is_array($arr_args) ){
			
				$this->_arr_filters_active = array_merge($this->wordpress_seo_filters_active(), $arr_args);
			}
		}
		
		/*
		 * Makes the add_filter magic happen
		 */
		public function wordpress_seo_filters_add(){
				
			foreach ( $this->_arr_filters_active as $str_filter => $bool_value ){
				if ($bool_value ) {
					$str_filter = strtolower(trim($str_filter));
					add_filter($str_filter, array($this, 'filter_' . $str_filter));
				}
			}
		}
		
		/*
		 * Use this to flip the filters on and off
		 */
		public function wordpress_seo_filters_active(){
		
			$arr_active = array(
							'wordpress_seo_filters_active'			=> false,
							'wpseo_admin_pages'						=> false,
							'wpseo_use_page_analysis'				=> false,
							'wpseo_metabox_prio'					=> false,
							'wpseo_metadesc_length_reason'			=> false,
							
							'wpseo_metadesc_length'					=> false,
							'wpseo_metabox_entries'					=> false,
							'wpseo_metabox_entries_advanced'		=> false,
							'wpseo_snippet'							=> false,
							'wpseo_save_metaboxes'					=> false,
							
							'wpseo_titles'							=> false,
							'wpseo_metadesc'						=> false,
							'wpseo_pre_analysis_post_content'		=> false,
							'wpseo_linkdex_results'					=> false,
							
							'wpseo_body_length_score'				=> false,
							'yoast_tracking_filters'				=> false,
							'wpseo_sitemaps_supported_post_types'	=> false,
							'wpseo_sitemaps_supported_taxonomies'	=> false,
							'wp_seo_get_bc_ancestors'				=> false,  // note: wp_seo not wpseo
							
							'wpseo_breadcrumb_links'				=> false,
							'wp_seo_get_bc_title'					=> false,
							'wpseo_breadcrumb_single_link_wrapper'	=> false,
							'wpseo_breadcrumb_single_link'			=> false,
							'wpseo_breadcrumb_single_link_with_sep'	=> false,
							
							'wpseo_breadcrumb_output_id'			=> false,
							'wpseo_breadcrumb_output_class'			=> false,
							'wpseo_breadcrumb_output_wrapper'		=> false,
							'wpseo_breadcrumb_output'				=> false,
							'wpseo_robots'							=> false,
							
							'wpseo_canonical'						=> false,
							'wpseo_genesis_force_adjacent_rel_home'	=> false,
							'wpseo_prev_rel_link'					=> false,
							'wpseo_next_rel_link'					=> false,
							'wpseo_author_link'						=> false,
							'wpseo_metakey'							=> false,
							'wpseo_whitelist_permalink_vars'		=> false,
							
							'nofollow_rss_links'					=> false,
							'wpseo_og_article_author'				=> false,
							'wpseo_og_article_publisher'			=> false,
							'wpseo_og_fb_app_id'					=> false,
							'wpseo_og_fb_admins'					=> false,
							
							'wpseo_og_og_title'						=> false,
							'wpseo_og_og_url'						=> false,
							'wpseo_og_og_locale'					=> false,
							'wpseo_og_og_type'						=> false,
							'wpseo_og_og_image'						=> false,
							
							'wpseo_og_og_description'				=> false,
							'wpseo_og_og_site_name'					=> false,
							'wpseo_og_article_tag'					=> false,
							'wpseo_og_article_section'				=> false,
							'wpseo_og_article_published_time'		=> false,

							'wpseo_og_article_modified_time'		=> false,							
							'wpseo_opengraph_author_facebook'		=> false,
							'wpseo_opengraph_admin'					=> false,
							'wpseo_opengraph_title'					=> false,
							'wpseo_opengraph_url'					=> false,
							
							'wpseo_locale'							=> false,
							'wpseo_opengraph_type'					=> false,
							'wpseo_opengraph_image'					=> false,
							'wpseo_opengraph_image_size'			=> false,
							'wpseo_opengraph_desc'					=> false,

							'wpseo_opengraph_site_name'				=> false,
							'wpseo_twitter_card_type'				=> false,
							'wpseo_twitter_site'					=> false,
							'wpseo_twitter_domain'					=> false,
							'wpseo_twitter_creator_account'			=> false,
							
							'wpseo_twitter_title'					=> false,
							'wpseo_twitter_description'				=> false,
							'wpseo_build_sitemap_post_type'			=> false,
							'wpseo_sitemap_exclude_post_type'		=> false,
							'wpseo_sitemap_exclude_taxonomy'		=> false,
							
							'wpseo_sitemap_index'					=> false,
							'wpseo_typecount_join'					=> false,
							'wpseo_typecount_where'					=> false,
							'wpseo_posts_join'						=> false,
							'wpseo_posts_where'						=> false,
							
							'wpseo_xml_sitemap_img_src'				=> false,
							'wpseo_xml_sitemap_img'					=> false,
							'wpseo_sitemap_urlimages'				=> false,
							'wpseo_sitemap_entry'					=> false,
							
							/*
							 * Line 607: $this->sitemap .= apply_filters( 'wpseo_sitemap_' . $post_type . '_content', '' );
							 *
							 * If it's not type: post, page or attachement you'll have to whip up your own add_filter method
							 */
							'wpseo_sitemap_post_content'			=> false,
							'wpseo_sitemap_page_content'			=> false,
							'wpseo_sitemap_attachment_content'		=> false,
							
							'wpseo_sitemap_exclude_author'			=> false,
							
							'wpseo_sitemap_author_content'			=> false,
							'wpseo_stylesheet_url'					=> false,
							'wpseo_options'							=> false,
							'wpseo_terms'							=> false,
							'wpseo_html_sitemap_page_exclude'		=> false,

							);
							
			return $arr_active;
		}
		
/*
 * ---------------------- THE FILTERS -----------------------------
 */
			
		/*
		 * plugins\wordpress-seo\admin\class-admin.php (1 hits)
		 * Line 789: 		$stopwords = apply_filters( 'wpseo_stopwords', $stopwords );
		 */
		public function filter_wpseo_stopwords($stopwords){
		
			return $stopwords;
		}
		
		
		 /*
		  * plugins\wordpress-seo\admin\class-config.php (1 hits)
		  * Line 44: $this->adminpages = apply_filters( 'wpseo_admin_pages', $this->adminpages );
		  */
		 public function filter_wpseo_admin_pages($adminpages){
		
			return $adminpages;
		}
		
		
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)  <<<
		 * Line 34: if ( ! class_exists( 'Yoast_TextStatistics' ) && apply_filters( 'wpseo_use_page_analysis', true ) === true )
		 *
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)  <<<
		 * Line 53:  if ( apply_filters( 'wpseo_use_page_analysis', true ) === true ) {
		 *
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)  <<<
		 * Line 1133: elseif ( apply_filters( 'wpseo_use_page_analysis', true ) !== true ) {
		 *
		 * plugins\wordpress-seo\inc\wpseo-non-ajax-functions.php (1 hits)  <<<
		 * Line 417: 	if ( is_singular() && isset( $post ) && is_object( $post ) && apply_filters( 'wpseo_use_page_analysis', true ) === true ) {
		 */
		 public function finlter_wpseo_use_page_analysis($bool){
		
			return $bool;
		}
		
		
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 157: add_meta_box( 'wpseo_meta', __( 'WordPress SEO by Yoast', 'wordpress-seo' ), array( $this, 'meta_box' ), $posttype, 'normal', apply_filters( 'wpseo_metabox_prio', 'high' ) );
		 */
		 public function filter_wpseo_metabox_prio($priority){
		
			return $priority;
		}
		
		
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 199: $this->meta_length_reason = apply_filters( 'wpseo_metadesc_length_reason', $this->meta_length_reason, $post );		 
		 */
		 public function filter_wpseo_metadesc_length_reason($meta_length_reason, $post){
		
			return $meta_length_reason;
		}
		
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 200: $this->meta_length        = apply_filters( 'wpseo_metadesc_length', $this->meta_length, $post );	
		 *
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 1188: 		$meta_length = apply_filters( 'wpseo_metadesc_length', 156, $post );		 
		 */
		public function filter_wpseo_metadesc_length($meta_length, $post){
		
			return $meta_length;
		}

		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 306: $mbs = apply_filters( 'wpseo_metabox_entries', $mbs ); 
		 */
		 public function filter_wpseo_metabox_entries($mbs){
		
			return $mbs;
		}

		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 434: $mbs = apply_filters( 'wpseo_metabox_entries_advanced', $mbs );
		 */
		 public function filter_wpseo_metabox_entries_advanced($mbs){
		
			return $mbs;
		}
		
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 676: $content = apply_filters( 'wpseo_snippet', $content, $post, compact( 'title', 'desc', 'date', 'slug' ) );
		 */
		 public function filter_wpseo_snippet($content, $post, $compact_title_desc_date_slug){
		
			return $content;
		}
	
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 745: $metaboxes = apply_filters( 'wpseo_save_metaboxes', $metaboxes );
		 */
		 public function filter_wpseo_save_metaboxes($metaboxes){
		
			return $metaboxes;
		}

		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits) <<
		 * Line 896: echo esc_html( apply_filters( 'wpseo_title', $this->page_title( $post_id ) ) );
		 *
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits) <<
		 * Line 447: 		return esc_html( strip_tags( stripslashes( apply_filters( 'wpseo_title', $title ) ) ) );
		 */
		 public function filter_wpseo_titles($page_title){
		
			return $page_title;
		}	
			
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits) <<<<
		 * Line 899: echo esc_html( apply_filters( 'wpseo_metadesc', wpseo_get_value( 'metadesc', $post_id ) ) );
		 *
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits) <<<
		 * Line 1011: 		$metadesc = apply_filters( 'wpseo_metadesc', trim( $metadesc ) );
		 */	
		 public function filter_wpseo_metadesc($wpseo_get_value_metadesc){
		
			return $wpseo_get_value_metadesc;
		}			
				
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits) <<<
		 * Line 1153: @$dom->loadHTML( apply_filters( 'wpseo_pre_analysis_post_content', $post->post_content, $post ) );
		 *
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits) <<<
		 * Line 1852: $post_content = apply_filters( 'wpseo_pre_analysis_post_content', $post->post_content, $post );
		 *
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits) <<<
		 * Line 332: $content = apply_filters( 'wpseo_pre_analysis_post_content', $post->post_content, $post );
		 */	
		 public function filter_wpseo_pre_analysis_post_content($post_content, $post){
		
			return $post_content;
		}			
		
		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 1236: $results = apply_filters( 'wpseo_linkdex_results', $results, $job, $post );
		 */	
		 public function filter_wpseo_linkdex_results($results, $job, $post){
		
			return $results;
		}			

		/*
		 * plugins\wordpress-seo\admin\class-metabox.php (17 hits)
		 * Line 1721: $lengthScore = apply_filters( 'wpseo_body_length_score', array(
		 *		'good' => 300,
		 *		'ok'   => 250,
		 *		'poor' => 200,
		 *		'bad'  => 100
		 *	),
		 *	$job
		 * );
		 */	
		 public function filter_wpseo_body_length_score($arr_length_score, $job){
		
			return $arr_length_score;
		}
				
		/*
		 * plugins\wordpress-seo\admin\class-tracking.php (1 hits)
		 * Line 116: 'options'  => apply_filters( 'yoast_tracking_filters', array() ),
		 */	
		 public function filter_yoast_tracking_filters($arr_options){
		 
			return $arr_options;
		}
		
		/*
		 * plugins\wordpress-seo\admin\pages\xml-sitemaps.php (2 hits)
		 * Line 44: $post_types = apply_filters( 'wpseo_sitemaps_supported_post_types', get_post_types( array( 'public' => true ), 'objects' ) );
		 */	
		 public function filter_wpseo_sitemaps_supported_post_types($post_types){
		 
			return $post_types;
		}
			
		/*
		 * plugins\wordpress-seo\admin\pages\xml-sitemaps.php (2 hits)
		 * Line 52: $taxonomies = apply_filters( 'wpseo_sitemaps_supported_taxonomies', get_taxonomies( array( 'public' => true ), 'objects' ) );
		 */	
		 public function filter_wpseo_sitemaps_supported_taxonomies($taxonomies){
		 
			return $taxonomies;
		}
			
		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 153: $ancestors = array_reverse( apply_filters( 'wp_seo_get_bc_ancestors', $ancestors ) );
		 */	
		 public function filter_wp_seo_get_bc_ancestors($ancestors){
		 
			return $ancestors;
		}
		
		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 256: 		$links = apply_filters( 'wpseo_breadcrumb_links', $links );
		 */	
		 public function filter_wpseo_breadcrumb_links($links){
		 
			return $links;
		}
	
		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 301: $link['text'] = apply_filters( 'wp_seo_get_bc_title', $link['text'], $link['id'] );
		 */	
		 public function filter_wp_seo_get_bc_title($link_text, $link_id){
		 
			return $link_text;
		}

		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 332: $element = esc_attr( apply_filters( 'wpseo_breadcrumb_single_link_wrapper', $element ) );
		 */	
		 public function filter_wpseo_breadcrumb_single_link_wrapper($element){
		 
			return $element;
		}
	
		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 346:  $link_output = apply_filters( 'wpseo_breadcrumb_single_link', $link_output, $link );
		 */	
		 public function filter_wpseo_breadcrumb_single_link($link_output, $link){
		 
			return $link_output;
		}
		
		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 347: $output .= apply_filters( 'wpseo_breadcrumb_single_link_with_sep', $link_sep . $link_output, $link );
		 */	
		 public function filter_wpseo_breadcrumb_single_link_with_sep($output, $link){
		 
			return $output;
		}

		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 350: $id = apply_filters( 'wpseo_breadcrumb_output_id', false );
		 */	
		 public function filter_wpseo_breadcrumb_output_id($id){
		 
			return $id;
		}
	
		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 354: 		$class = apply_filters( 'wpseo_breadcrumb_output_class', false );
		 */	
		 public function filter_wpseo_breadcrumb_output_class($class){
		 
			return $class;
		}
	
		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 358: 		$wrapper = apply_filters( 'wpseo_breadcrumb_output_wrapper', $wrapper );
		 */	
		 public function filter_wpseo_breadcrumb_output_wrapper($wrapper){
		 
			return $wrapper;
		}
		
		/*
		 * plugins\wordpress-seo\frontend\class-breadcrumbs.php (10 hits)
		 * Line 359: 		return apply_filters( 'wpseo_breadcrumb_output', '<' . $wrapper . $id . $class . ' xmlns:v="http://rdf.data-vocabulary.org/#">' . $output . '</' . $wrapper . '>' );
		 */	
		 public function filter_wpseo_breadcrumb_output($breadcrumb_output){
		 
			return $breadcrumb_output;
		}

		/*
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits)
		 * Line 638: $robotsstr = apply_filters( 'wpseo_robots', $robotsstr );	 
		 */	
		 public function filter_wpseo_robots($robotsstr){
		 
			return $robotsstr;
		}

		/*
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits)
		 * Line 746: 		$canonical = apply_filters( 'wpseo_canonical', $canonical ); 
		 */	
		 public function filter_wpseo_canonical($canonical){
		 
			return $canonical;
		}
		
		/*
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits)
		 * Line 767: if ( is_home() && function_exists( 'genesis' ) && apply_filters( 'wpseo_genesis_force_adjacent_rel_home', false ) === false )
		 */	
		 public function filter_wpseo_genesis_force_adjacent_rel_home($bool){
		 
			return $bool;
		}
		
		/*
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits)
		 * Line 849: 		$link = apply_filters( "wpseo_" . $rel . "_rel_link", "<link rel=\"$rel\" href=\"$url\" />\n" );
		 */	
		public function filter_wpseo_prev_rel_link($link){
		 
			return $link;
		}
		
		public function filter_wpseo_next_rel_link($link){
		 
			return $link;
		}

		/*
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits)
		 * Line 884: 		$gplus = apply_filters( 'wpseo_author_link', $gplus );
		 */	
		 public function filter_wpseo_author_link($gplus){
		 
			return $gplus;
		}
	
		/*
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits)
		 * Line 937: $metakey = apply_filters( 'wpseo_metakey', trim( $metakey ) );
		 */	
		 public function filter_wpseo_metakey($metakey){
		 
			return $metakey;
		}
		
		/*
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits)
		 * Line 1250: 		$whitelisted_extravars = apply_filters( 'wpseo_whitelist_permalink_vars', array() );
		 */	
		 public function filter_wpseo_whitelist_permalink_vars($whitelisted_extravars){
		 
			return $whitelisted_extravars;
		}	

		/*
		 * plugins\wordpress-seo\frontend\class-frontend.php (10 hits)
		 * Line 1293: 		$no_follow      = apply_filters( 'nofollow_rss_links', true );
		 */	
		 public function filter_nofollow_rss_links($no_follow){
		 
			return $no_follow;
		}		

		/* 
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 75: 		$content = apply_filters( 'wpseo_og_' . str_replace( ':', '_', $property ), $content );
		 */	
		 
		// Line 127 $this->og_tag( 'article:author', $facebook ); 
		public function filter_wpseo_og_article_author($content){
		 
			return $content;
		}	

		// Line 137 $this->og_tag( 'article:publisher', $this->options['facebook_site'] );
		public function filter_wpseo_og_article_publisher($content){
		 
			return $content;
		}
			
		// Line 145 $this->og_tag( 'fb:app_id', $this->options['fbadminapp'] );
		public function filter_wpseo_og_fb_app_id($content){
		 
			return $content;
		}

		// Line 157 $this->og_tag( 'fb:admins', $adminstr );
		public function filter_wpseo_og_fb_admins($content){
		 
			return $content;
		}

		// Line 173 $this->og_tag( 'og:title', $title );
		public function filter_wpseo_og_og_title($content){
		 
			return $content;
		}

		// Line 185 $this->og_tag( 'og:url', esc_url( $url ) );
		public function filter_wpseo_og_og_url($content){
		 
			return $content;
		}

		// Line 239 $this->og_tag( 'og:locale', $locale );
		public function filter_wpseo_og_og_locale($content){
		 
			return $content;
		}

		// Line 264 $this->og_tag( 'og:type', $type );
		public function filter_wpseo_og_og_type($content){
		 
			return $content;
		}

		// Line 300 $this->og_tag( 'og:image', esc_url( $img ) );
		public function filter_wpseo_og_og_image($content){
		 
			return $content;
		}

		// Line 385 $this->og_tag( 'og:description', $ogdesc );
		public function filter_wpseo_og_og_description($content){
		 
			return $content;
		}

		// Line 396 $this->og_tag( 'og:site_name', $name );
		public function filter_wpseo_og_og_site_name($content){
		 
			return $content;
		}

		// Line 409 $this->og_tag( 'article:tag', $tag->name );
		public function filter_wpseo_og_article_tag($content){
		 
			return $content;
		}

		// Line 424 $this->og_tag( 'article:section', $term->name );
		public function filter_wpseo_og_article_section($content){
		 
			return $content;
		}

		// Line 437 $this->og_tag( 'article:published_time', $pub );
		public function filter_wpseo_og_article_published_time($content){
		 
			return $content;
		}

		// Line 441 $this->og_tag( 'article:modified_time', $mod );
		public function filter_wpseo_og_article_modified_time($content){
		 
			return $content;
		}

	
		/*
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 124: 		$facebook = apply_filters( 'wpseo_opengraph_author_facebook', get_the_author_meta( 'facebook', $post->post_author ) );
		 */	
		 public function filter_wpseo_opengraph_author_facebook($facebook){
		 
			return $facebook;
		}
	
		/*
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 155: 			$adminstr = apply_filters( 'wpseo_opengraph_admin', $adminstr );
		 */	
		 public function filter_wpseo_opengraph_admin($adminstr){
		 
			return $adminstr;
		}
	
		/*
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 169: 		$title = apply_filters( 'wpseo_opengraph_title', $this->title( '' ) );
		 */	
		 public function filter_wpseo_opengraph_title($title){
		 
			return $title;
		}
		
		/*
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 183: 		$url = apply_filters( 'wpseo_opengraph_url', $this->canonical( false ) );
		 */	
		 public function filter_wpseo_opengraph_url($url){
		 
			return $url;
		}
	
		/*											
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 200: 		$locale = apply_filters( 'wpseo_locale', get_locale() );
		 */	
		 public function filter_wpseo_locale($locale){
		 
			return $locale;
		}

		/*											
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 260: 		$type = apply_filters( 'wpseo_opengraph_type', $type );
		 */	
		 public function filter_wpseo_opengraph_type($type){
		 
			return $type;
		}

		/*											
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits) <<
		 * Line 283: 		$img = trim( apply_filters( 'wpseo_opengraph_image', $img ) );
		 *
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits) <<
		 * Line 189: $escaped_img = esc_url( apply_filters( 'wpseo_opengraph_image', $featured_img[0] ) );
		 */	
		 public function filter_wpseo_opengraph_image($img){
		 
			return $img;
		}

		/*											
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits) <<
		 * Line 328: $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), apply_filters( 'wpseo_opengraph_image_size', 'original' ) );
		 *
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits) <<
		 * Line 185: $featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), apply_filters( 'wpseo_opengraph_image_size', 'medium' ) );
		 */	
		 public function filter_wpseo_opengraph_image_size($image_size){
		 
			return $image_size;
		}
												
		/*											
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 381: $ogdesc = apply_filters( 'wpseo_opengraph_desc', $ogdesc );
		 */	
		 public function filter_wpseo_opengraph_desc($ogdesc){
		 
			return $ogdesc;
		}
		
		/*											
		 * plugins\wordpress-seo\frontend\class-opengraph.php (12 hits)
		 * Line 394: 		$name = apply_filters( 'wpseo_opengraph_site_name', get_bloginfo( 'name' ) );
		 */	
		 public function filter_wpseo_opengraph_site_name($name){
		 
			return $name;
		}

		/*											
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits)
		 * Line 67: 		$type = apply_filters( 'wpseo_twitter_card_type', 'summary' );
		 */	
		 public function filter_wpseo_twitter_card_type($type){
		 
			return $type;
		}
	
		/*											
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits)
		 * Line 78: $site = apply_filters( 'wpseo_twitter_site', ltrim( trim( $this->options['twitter_site'] ), '@' ) );
		 */	
		 public function filter_wpseo_twitter_site($site){
		 
			return $site;
		}

		/*											
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits)
		 * Line 87: 		$domain = apply_filters( 'wpseo_twitter_domain', get_bloginfo( 'name' ) );
		 */	
		 public function filter_wpseo_twitter_domain($domain){
		 
			return $domain;
		}

		/*											
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits)
		 * Line 97: 		$twitter = apply_filters( 'wpseo_twitter_creator_account', $twitter );
		 *
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits)
		 * Line 103: 			$twitter = apply_filters( 'wpseo_twitter_creator_account', ltrim( trim( $this->options['twitter_site'] ), '@' ) );
		 */	
		 public function filter_wpseo_twitter_creator_account($twitter){
		 
			return $twitter;
		}
		
		/*											
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits)
		 * Line 115: 		$title = apply_filters( 'wpseo_twitter_title', $this->title( '' ) );
		 */	
		 public function filter_wpseo_twitter_title($title){
		 
			return $title;
		}

		/*
		 * plugins\wordpress-seo\frontend\class-twitter.php (9 hits)
		 * Line 136: $metadesc = apply_filters( 'wpseo_twitter_description', $metadesc );
		 */
		 public function filter_wpseo_twitter_description($metadesc){
		 
			return $metadesc;
		}

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 186: 		$type = apply_filters( 'wpseo_build_sitemap_post_type', $type );
		 */
		 public function filter_wpseo_build_sitemap_post_type($type){
		 
			return $type;
		}

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 221: else if ( apply_filters( 'wpseo_sitemap_exclude_post_type', false, $post_type ) )
		 *
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 376: || apply_filters( 'wpseo_sitemap_exclude_post_type', false, $post_type )
		 */
		 public function filter_wpseo_sitemap_exclude_post_type($bool, $post_type){
		 
			return $bool;
		}	

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 255: else if ( apply_filters( 'wpseo_sitemap_exclude_taxonomy', false, $tax ) )
		 *
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 621: || apply_filters( 'wpseo_sitemap_exclude_taxonomy', false, $taxonomy->name )
		 */
		 public function filter_wpseo_sitemap_exclude_taxonomy($bool, $tax){
		 
			return $bool;
		}

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 361: $this->sitemap .= apply_filters( 'wpseo_sitemap_index', '' );
		 */
		 public function filter_wpseo_sitemap_index($sitemap_index){
		 
			return $sitemap_index;
		}	

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 390: 		$join_filter  = apply_filters( 'wpseo_typecount_join', $join_filter, $post_type );
		 */
		 public function filter_wpseo_typecount_join($join_filter, $post_type){
		 
			return $join_filter;
		}

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 392: 		$where_filter = apply_filters( 'wpseo_typecount_where', $where_filter, $post_type );
		 */
		 public function filter_wpseo_typecount_where($where_filter, $post_type){
		 
			return $where_filter;
		}

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 442: 		$join_filter  = apply_filters( 'wpseo_posts_join', false, $post_type );
		 */
		 public function filter_wpseo_posts_join($join_filter, $post_type){
		 
			return $join_filter;
		}	

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 443: 		$where_filter = apply_filters( 'wpseo_posts_where', false, $post_type );
		 */
		 public function filter_wpseo_posts_where($where_filter, $post_type){
		 
			return $where_filter;
		}		

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 543: 'src' => apply_filters( 'wpseo_xml_sitemap_img_src', $src, $p )
		 *
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 564: 'src' => apply_filters( 'wpseo_xml_sitemap_img_src', $src[0], $p )
		 */
		 public function filter_wpseo_xml_sitemap_img_src($src, $p){
		 
			return $src;
		}

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 552: $image = apply_filters( 'wpseo_xml_sitemap_img', $image, $p );
		 *
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 572: $image = apply_filters( 'wpseo_xml_sitemap_img', $image, $p );
		 */
		 public function filter_wpseo_xml_sitemap_img($image, $p){
		 
			return $image;
		}
					
		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 578: 				$url['images'] = apply_filters( 'wpseo_sitemap_urlimages', $url['images'], $p->ID );
		 */
		 public function filter_wpseo_sitemap_urlimages($url_images, $p_ID){
		 
			return $url_images;
		}
		
		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 582: 	$url = apply_filters( 'wpseo_sitemap_entry', $url, 'post', $p );
		 *
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 680: 			$url = apply_filters( 'wpseo_sitemap_entry', $url, 'term', $c );
		 *
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 754: $url = apply_filters( 'wpseo_sitemap_entry', $url, 'user', $user );
		 */
		 public function filter_wpseo_sitemap_entry($url, $the_type, $p_or_c){
		 
			return $url;
		}

		/* 
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 607: $this->sitemap .= apply_filters( 'wpseo_sitemap_' . $post_type . '_content', '' );
		 */
		 
		// post
		public function filter_wpseo_sitemap_post_content($extra_url){
		 
			return $extra_url;
		}
		
		// page
		public function filter_wpseo_sitemap_page_content($extra_url){
		 
			return $extra_url;
		}
		
		// attachment
		public function filter_wpseo_sitemap_attachment_content($extra_url){
		 
			return $extra_url;
		}

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 740: 		$users = apply_filters( 'wpseo_sitemap_exclude_author', $users );
		 */
		 public function filter_wpseo_sitemap_exclude_author($users){
		 
			return $users;
		}

		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 773: 			$this->sitemap .= apply_filters( 'wpseo_sitemap_author_content', '' );
		 */
		 public function filter_wpseo_sitemap_author_content($sitemap){
		 
			return $sitemap;
		}
	
		/*
		 * plugins\wordpress-seo\inc\class-sitemaps.php (22 hits)
		 * Line 815: 			echo apply_filters( 'wpseo_stylesheet_url', $this->stylesheet ) . "\n";
		 */
		 public function filter_wpseo_stylesheet_url($stylesheet){
		 
			return $stylesheet;
		}
	
		/*
		 * plugins\wordpress-seo\inc\wpseo-functions.php (3 hits)
		 * Line 50: 	return apply_filters( 'wpseo_options', $optarr );
		 */
		 public function filter_wpseo_options($optarr){
		 
			return $optarr;
		}

		/*
		 * plugins\wordpress-seo\inc\wpseo-functions.php (3 hits)
		 * Line 313: 	return apply_filters( 'wpseo_terms', $output );
		 */
		 public function filter_wpseo_terms($output){
		 
			return $output;
		}

		/*
		 * plugins\wordpress-seo\inc\wpseo-functions.php (3 hits)
		 * Line 575: 		$exclude = implode( ',', apply_filters( 'wpseo_html_sitemap_page_exclude', $exclude ) );
		 */
		 public function filter_wpseo_html_sitemap_page_exclude($exclude){
		 
			return $exclude;
		}

		
	} // close class
} // close class_existss
?>