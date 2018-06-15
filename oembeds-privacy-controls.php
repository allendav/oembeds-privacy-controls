<?php
/*
Plugin Name: oEmbed Privacy Controls
Plugin URI: http://www.allendav.com/
Description: Gives administrators control over what oEmbed embedded content is allowed on their site.
Version: 1.0.0
Author: allendav
Author URI: http://www.allendav.com
License: GPL2
*/

class Allendav_OEmbeds_Privacy {
	private static $instance;

	public static function getInstance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __clone() {
	}

	private function __wakeup() {
	}

	protected function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

	function provider_map() {
		return array(
			array(
				'provider'           => 'Dailymotion',
				'description'        => __( 'Dailymotion is a video-sharing technology platform headquartered in Paris, France.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.dailymotion.com/',
				'oembed_url'         => 'https://www.dailymotion.com/services/oembed',
				'privacy_policy_url' => 'https://www.dailymotion.com/legal/privacy',
			),
			array(
				'provider'           => 'Flickr',
				'description'        => __( 'Flickr is an image hosting service and video hosting service headquartered in San Francisco, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.flickr.com/',
				'oembed_url'         => 'https://www.flickr.com/services/oembed/',
				'privacy_policy_url' => 'https://www.flickr.com/help/privacy',
			),
			array(
				'provider'           => 'Funny or Die',
				'description'        => __( 'Funny or Die is a comedy video website and film/television production company headquartered in Los Angeles, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.funnyordie.com/',
				'oembed_url'         => 'http://www.funnyordie.com/oembed',
				'privacy_policy_url' => 'https://www.funnyordie.com/about/privacy',
			),
			array(
				'provider'           => 'Hulu',
				'description'        => __( 'Hulu is an entertainment company headquartered in Los Angeles, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.hulu.com/',
				'oembed_url'         => 'http://www.hulu.com/api/oembed.{format}',
				'privacy_policy_url' => 'https://www.hulu.com/privacy',
			),
			array(
				'provider'           => 'Photobucket',
				'description'        => __( 'Photobucket is an image hosting and video hosting website headquartered in Seattle, Washington.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'http://www.photobucket.com/',
				'oembed_url'         => 'http://api.photobucket.com/oembed',
				'privacy_policy_url' => 'http://photobucket.com/privacy',
			),
			array(
				'provider'           => 'Polldaddy',
				'description'        => __( 'Polldaddy is an online survey service owned by Automattic, Inc. and headquartered in San Francisco, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://polldaddy.com/',
				'oembed_url'         => 'https://polldaddy.com/oembed/',
				'privacy_policy_url' => 'https://automattic.com/privacy/',
			),
			array(
				'provider'           => 'Scribd',
				'description'        => __( 'Scribd is a digital library, e-book and audiobook subscription service headquartered in San Francisco, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.scribd.com/',
				'oembed_url'         => 'https://www.scribd.com/services/oembed',
				'privacy_policy_url' => 'https://support.scribd.com/hc/en-us/articles/210129366-Privacy-policy',
			),
			array(
				'provider'           => 'SmugMug',
				'description'        => __( 'SmugMug is an image sharing, image hosting service, and online video platform headquartered in Mountain View, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.smugmug.com/',
				'oembed_url'         => 'https://api.smugmug.com/services/oembed/',
				'privacy_policy_url' => 'https://www.smugmug.com/about/privacy',
			),
			array(
				'provider'           => 'SoundCloud',
				'description'        => __( 'SoundCloud is an online audio distribution platform headquartered in Berlin, Germany.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://soundcloud.com/',
				'oembed_url'         => 'https://soundcloud.com/oembed',
				'privacy_policy_url' => 'https://soundcloud.com/pages/privacy',
			),
			array(
				'provider'           => 'Twitter',
				'description'        => __( 'Twitter is an online news and social networking service headquartered in San Francisco, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.twitter.com/',
				'oembed_url'         => 'https://publish.twitter.com/oembed',
				'privacy_policy_url' => 'https://twitter.com/privacy',
			),
			array(
				'provider'           => 'Vimeo',
				'description'        => __( 'Vimeo is a video-sharing website headquartered in New York City.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.vimeo.com/',
				'oembed_url'         => 'https://vimeo.com/api/oembed.{format}',
				'privacy_policy_url' => 'https://vimeo.com/privacy',
			),
			array(
				'provider'           => 'YouTube',
				'description'        => __( 'YouTube is a video-sharing website headquartered in San Bruno, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://www.youtube.com/',
				'oembed_url'         => 'https://www.youtube.com/oembed',
				'privacy_policy_url' => 'https://policies.google.com/privacy',
			),
			array(
				'provider'           => 'WordPress.tv',
				'description'        => __( 'WordPress.tv is a video-sharing website owned by Automattic, Inc. and headquartered in San Francisco, California.', 'allendav-oembeds-privacy' ),
				'home_page_url'      => 'https://wordpress.tv/',
				'oembed_url'         => 'https://wordpress.tv/oembed/',
				'privacy_policy_url' => '',
			)
		);

		// TODO - add remaining providers in wp-includes/class-oembed.php after soundcloud entry
	}

    public function admin_menu() {
		add_submenu_page(
			'options-general.php',
			__( 'Embeds', 'allendav-oembeds-privacy' ),
			__( 'Embeds', 'allendav-oembeds-privacy' ),
			'manage_options',
			'embeds-page',
			array( $this, 'page' )
		);
    }
    
    public function page() {
		if ( ! class_exists( 'WP_List_Table' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
		}

		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-providers-table.php' );

		global $title;
        ?>
		<div class="wrap">
			<h1>
				<?php echo esc_html( $title ); ?>
			</h1>

			<p class="description">
				<?php esc_html_e( 'DESCRIBE WHAT OEMBEDS ARE AND SUMMARIZE THE PRIVACY IMPLICATIONS OF USING THEM. Select which oEmbeds you would like to allow on this site.', 'allendav-oembeds-privacy' ); ?>
			</p>

			<form method="post">
				<?php
					$providers_table = new Allendav_Providers_Table();
					$providers_table->prepare_items();
					$providers_table->display();
				?>
			</form>
        </div>
	<?php
	}
}

Allendav_OEmbeds_Privacy::getInstance();

