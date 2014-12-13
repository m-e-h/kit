<?php
/**
 * Sets up custom filters and actions for the theme.
 *
 * @package Kit
 */

/* Register menus. */
add_action( 'init', 'kit_menus', 5 );

/* Register sidebars. */
add_action( 'widgets_init', 'kit_sidebars', 5 );

/* Adds custom attributes to the subsidiary sidebar. */
add_filter( 'hybrid_attr_sidebar', 'kit_sidebar_subsidiary_class', 10, 2 );

/* Compresses the HTML output to remove whitespace between grid-items. */
add_action('get_header', 'wp_html_compression_start');


/**
 * Registers nav menu locations.
 */
function kit_menus() {
	register_nav_menu( 'primary',   _x( 'Primary',   'nav menu location', 'kit' ) );
	register_nav_menu( 'secondary', _x( 'Secondary', 'nav menu location', 'kit' ) );
	register_nav_menu( 'social',    _x( 'Social',    'nav menu location', 'kit' ) );
}
/**
 * Registers sidebars.
 */
function kit_sidebars() {
	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'kit' ),
			'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'kit' )
		)
	);
	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => _x( 'Subsidiary', 'sidebar', 'kit' ),
			'description' => __( 'A sidebar located in the footer of the site.', 'kit' )
		)
	);
}

/**
 * Adds a custom class to the 'subsidiary' sidebar.  This is used to determine 
 * the number of columns used to display the sidebar's widgets.  
 * This optimizes for 1, 2, and 3 columns or multiples of those values.
 *
 * Note that we're using the global $sidebars_widgets variable here. 
 * This is because core has marked wp_get_sidebars_widgets() as a private function. 
 * Therefore, this leaves us with $sidebars_widgets for figuring out the widget count.
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_get_sidebars_widgets
 */
function kit_sidebar_subsidiary_class( $attr, $context ) {
	if ( 'subsidiary' === $context ) {
		global $sidebars_widgets;
		if ( is_array( $sidebars_widgets ) && !empty( $sidebars_widgets[ $context ] ) ) {
			$count = count( $sidebars_widgets[ $context ] );
			if ( 1 === $count )
				$attr['class'] .= ' sidebar-col-1';
			elseif ( !( $count % 3 ) || $count % 2 )
				$attr['class'] .= ' sidebar-col-3';
			elseif ( !( $count % 2 ) )
				$attr['class'] .= ' sidebar-col-2';
		}
	}
	return $attr;
}





/**
 * Compresses the HTML output to allow the use of inline-block without the added 
 * space between objects in the grid.
 *
 * http://www.intert3chmedia.net/2011/12/minify-html-javascript-css-without.html
 */

class WP_HTML_Compression
{
	// Variables
	protected $html;
	public function __construct($html)
	{
		if (!empty($html))
		{
			$this->parseHTML($html);
		}
	}
	public function __toString()
	{
		return $this->html;
	}
	protected function minifyHTML($html)
	{
		$pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
		preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
		$overriding = false;
		$raw_tag = false;
		// Variable reused for output
		$html = '';
		foreach ($matches as $token)
		{
			$tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
			
			$content = $token[0];
			
			if (is_null($tag))
			{
				if ($tag == 'pre' || $tag == 'textarea')
				{
					$raw_tag = $tag;
				}
				else if ($tag == '/pre' || $tag == '/textarea')
				{
					$raw_tag = false;
				}
				else
				{
					if ($raw_tag || $overriding)
					{
						$strip = false;
					}
					else
					{
						$strip = true;
					}
				}
			}
			
			if ($strip)
			{
				$content = $this->removeWhiteSpace($content);
			}
			
			$html .= $content;
		}
		
		return $html;
	}
		
	public function parseHTML($html)
	{
		$this->html = $this->minifyHTML($html);
	}
	
	protected function removeWhiteSpace($str)
	{
		$str = str_replace("\t", '', $str);
		$str = str_replace("\n",  '', $str);
		$str = str_replace("\r",  '', $str);
		
		while (stristr($str, '  '))
		{
			$str = str_replace('  ', ' ', $str);
		}
		
		return $str;
	}
}

function wp_html_compression_finish($html)
{
	return new WP_HTML_Compression($html);
}

function wp_html_compression_start()
{
	ob_start('wp_html_compression_finish');
}