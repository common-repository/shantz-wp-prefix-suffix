<?php 

if (!class_exists('ShantzPosts')) {
	class ShantzPosts {

		function ShantzPosts() {
			if (isset($_GET['show_shantz_widget'])) {
				if ($_GET['show_shantz_widget'] == "true") {
					update_option( 'show_shantz_widget', 'noshow' );
				} else {
					update_option( 'show_shantz_widget', 'show' );
				}
			} 
		
			add_action( 'wp_dashboard_setup', array(&$this, 'register_widget') );
			add_filter( 'wp_dashboard_widgets', array(&$this, 'add_widget') );
		}

		function register_widget() {
			wp_register_sidebar_widget( 'shantz_posts', __( 'Tech Updates', 'shantz-posts' ), array(&$this, 'widget'), array( 'all_link' => 'http://tech.shantanugoel.com/', 'feed_link' => 'http://tech.shantanugoel.com/feed/', 'edit_link' => 'options.php' ) );
		}

		function add_widget( $widgets ) {
			global $wp_registered_widgets;
			if ( !isset($wp_registered_widgets['shantz_posts']) ) return $widgets;
			array_splice( $widgets, 2, 0, 'shantz_posts' );
			return $widgets;
		}

		function widget($args = array()) {
			$show = get_option('show_shantz_widget');
			if ($show != 'noshow') {
				if (is_array($args))
					extract( $args, EXTR_SKIP );
				echo $before_widget.$before_title.$widget_name.$after_title;
				include_once(ABSPATH . WPINC . '/rss.php');
                $feeds_url = array('http://feedproxy.google.com/techShantanu', 'http://feedproxy.google.com/SaferCode');
                foreach ($feeds_url as $url){
				$rss = fetch_rss($url);
				$items = array_slice($rss->items, 0, 1);
				?>
				<?php if (empty($items)) echo '<li>No items</li>';
				else
				foreach ( $items as $item ) : ?>
				<a style="font-size: 14px; font-weight:bold;" href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'><?php echo $item['title']; ?></a> &nbsp;
				<span style="font-size: 10px; color: #aaa;"><?php echo date('F j, Y',strtotime($item['pubdate'])); ?></span>
				<p><?php echo $item['description'] ?></p>
				<?php endforeach;
                }
				echo $after_widget;
			}
		}
	}

	add_action( 'plugins_loaded', create_function( '', 'global $ShantzPosts; $ShantzPosts = new ShantzPosts();' ) );
}
?>
