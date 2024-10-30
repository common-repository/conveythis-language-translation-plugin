<?php
/*
Plugin Name: ConveyThis Classic
Plugin URI: https://conveythis.com/classic.php
Description: Plugin deprecated! (Translate your blog into over 100 languages. With just one click, ConveyThis Classic uses the power of Google Translate to provide easy and instant translation for your blog.)
Version: 3.5.1
Author: ConveyThis
Author URI: https://conveythis.com/
License: GPL2
*/

/*
Copyright 2018 ConveyThis (email : info@conveythis.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class ConveyThisClassicWidget {
	private	$button_path;
	private	$javascript_path	= '/javascript';
	private	$styles_path		= '/styles';
	private	$image_path			= '/images';
	private $ctc_src;
	private $button_id;
	private $first_save;
	private $show_branding;
	private $languages = array(
		'af' => 'Afrikaans', 
		'sq' => 'Albanian', 
		'am' => 'Amharic', 
		'ar' => 'Arabic', 
		'hy' => 'Armenian', 
		'az' => 'Azerbaijani', 
		'eu' => 'Basque', 
		'be' => 'Belarusian', 
		'bn' => 'Bengali', 
		'bs' => 'Bosnian', 
		'bg' => 'Bulgarian', 
		'ca' => 'Catalan', 
		'ceb' => 'Cebuano', 
		'ny' => 'Chichewa', 
		'zh-CN' => 'Chinese Simplified', 
		'zh-TW' => 'Chinese Traditional', 
		'co' => 'Corsican', 
		'hr' => 'Croatian', 
		'cs' => 'Czech', 
		'da' => 'Danish', 
		'nl' => 'Dutch', 
		'en' => 'English', 
		'eo' => 'Esperanto', 
		'et' => 'Estonian', 
		'tl' => 'Filipino', 
		'fi' => 'Finnish', 
		'fr' => 'French', 
		'fy' => 'Frisian', 
		'gl' => 'Galician', 
		'ka' => 'Georgian', 
		'de' => 'German', 
		'el' => 'Greek', 
		'gu' => 'Gujarati', 
		'ht' => 'Haitian Creole', 
		'ha' => 'Hausa', 
		'haw' => 'Hawaiian', 
		'iw' => 'Hebrew', 
		'hi' => 'Hindi', 
		'hmn' => 'Hmong', 
		'hu' => 'Hungarian', 
		'is' => 'Icelandic', 
		'ig' => 'Igbo', 
		'id' => 'Indonesian', 
		'ga' => 'Irish', 
		'it' => 'Italian', 
		'ja' => 'Japanese', 
		'jw' => 'Javanese', 
		'kn' => 'Kannada', 
		'kk' => 'Kazakh', 
		'km' => 'Khmer', 
		'ko' => 'Korean', 
		'ku' => 'Kurdish', 
		'ky' => 'Kyrgyz', 
		'lo' => 'Lao', 
		'la' => 'Latin', 
		'lv' => 'Latvian', 
		'lt' => 'Lithuanian', 
		'lb' => 'Luxembourgish', 
		'mk' => 'Macedonian', 
		'mg' => 'Malagasy', 
		'ms' => 'Malay', 
		'ml' => 'Malayalam', 
		'mt' => 'Maltese', 
		'mi' => 'Maori', 
		'mr' => 'Marathi', 
		'mn' => 'Mongolian', 
		'my' => 'Myanmar', 
		'ne' => 'Nepali', 
		'no' => 'Norwegian', 
		'ps' => 'Pashto', 
		'fa' => 'Persian', 
		'pl' => 'Polish', 
		'pt' => 'Portuguese', 
		'pa' => 'Punjabi', 
		'ro' => 'Romanian', 
		'ru' => 'Russian', 
		'sm' => 'Samoan', 
		'gd' => 'Scots Gaelic', 
		'sr' => 'Serbian', 
		'st' => 'Sesotho', 
		'sn' => 'Shona', 
		'sd' => 'Sindhi', 
		'si' => 'Sinhala', 
		'sk' => 'Slovak', 
		'sl' => 'Slovenian', 
		'so' => 'Somali', 
		'es' => 'Spanish', 
		'su' => 'Sundanese', 
		'sw' => 'Swahili', 
		'sv' => 'Swedish', 
		'tg' => 'Tajik', 
		'ta' => 'Tamil', 
		'te' => 'Telugu', 
		'th' => 'Thai', 
		'tr' => 'Turkish', 
		'uk' => 'Ukrainian', 
		'ur' => 'Urdu', 
		'uz' => 'Uzbek', 
		'vi' => 'Vietnamese', 
		'cy' => 'Welsh', 
		'xh' => 'Xhosa', 
		'yi' => 'Yiddish', 
		'yo' => 'Yoruba', 
		'zu' => 'Zulu', 
	);
	private $buttons = array(
		1 => array(
			'image_name' => 'translate1.gif', 
			'class_name' => 'translate1', 
			'additional_classes' => 'conveythis-drop', 
		), 
		2 => array(
			'image_name' => 'convey1.gif', 
			'class_name' => 'convey1', 
			'additional_classes' => 'conveythis-drop', 
		), 
		3 => array(
			'image_name' => 'translate2.gif', 
			'class_name' => 'translate2', 
			'additional_classes' => 'conveythis-drop', 
		), 
		4 => array(
			'image_name' => 'notext.gif', 
			'class_name' => 'notext', 
			'additional_classes' => 'conveythis-drop', 
		), 
		5 => array(
			'image_name' => 'translate3.gif', 
			'class_name' => 'translate3', 
			'additional_classes' => '', 
		), 
		6 => array(
			'image_name' => 'translate4.gif', 
			'class_name' => 'translate4', 
			'additional_classes' => 'conveythis-drop', 
		), 
		7 => array(
			'image_name' => 'convey2.gif', 
			'class_name' => 'convey2', 
			'additional_classes' => 'conveythis-drop', 
		), 
		8 => array(
			'image_name' => 'translate5.gif', 
			'class_name' => 'translate5', 
			'additional_classes' => 'conveythis-drop', 
		), 
		9 => array(
			'image_name' => 'notext2.gif', 
			'class_name' => 'notext2', 
			'additional_classes' => 'conveythis-drop', 
		), 
		10 => array(
			'image_name' => 'translate6.gif', 
			'class_name' => 'translate6', 
			'additional_classes' => '', 
		), 
	);
	
	// Constructor.
	function ConveyThisClassicWidget() {
		// Add the full paths.
		$this->button_path		= plugins_url('conveythis-language-translation-plugin');
		$this->javascript_path	= $this->button_path . $this->javascript_path;
		$this->styles_path		= $this->button_path . $this->styles_path;
		$this->image_path		= $this->button_path . $this->image_path;
		// Add functions to the content and excerpt.
		add_filter('the_content', array(&$this, 'code_to_content'));
		add_filter('plugin_action_links_' . plugin_basename(__FILE__), array(&$this, 'plugin_setings_link'));
		// Initialize the plugin.
		add_action('admin_menu', array(&$this, '_init'));
		// Display the admin notification
		add_action('admin_notices', array($this, 'admin_notice_plugin_activation'));
		add_action('admin_notices', array($this, 'admin_notice_deprecated'));
		// Get the plugin options.
		$this->ctc_src			= get_option('ctc_src', 'en');
		$this->button_id		= get_option('ctc_button_id', 1);
		$this->first_save		= get_option('ctc_first_save', 0);
		$this->show_branding	= get_option('ctc_show_branding', 0);
		// Parameterize variables for script URL.
		$script_name = sprintf(
			'/e.js?conveythis_src=%s', 
			(string)$this->ctc_src
		);
		// Register our scripts and styles.
		wp_register_script('ctc_conveythis', $this->javascript_path . $script_name, 'jquery', '3.4.3', true);
		wp_register_style('ctc_conveythis', $this->styles_path . '/conveythis.css', array(), '3.4.1');
	}
	
	function _init() {
		// Add the options page.
		add_options_page('ConveyThis Classic Settings', 'ConveyThis Classic', 'manage_options', 'conveythis_classic', array(&$this, 'plugin_options'));
		add_submenu_page(null, 'Reset ConveyThis Classic Settings', 'Reset ConveyThis Classic', 'manage_options', 'conveythis_classic_reset', array(&$this, 'plugin_reset'));
		// Register our plugin settings.
		register_setting('ctc_options', 'ctc_src', array(&$this, 'validate_language'));
		register_setting('ctc_options', 'ctc_button_id');
		register_setting('ctc_options', 'ctc_first_save');
		register_setting('ctc_options', 'ctc_show_branding');
	}
	
	// Display the deprecated notification.
	function admin_notice_deprecated() {
		?>
		<div class="notice notice-error">
			<p><strong>Warning! The ConveyThis Classic button has been deprecated!</strong></p>
			<p>We are no longer supporting this plugin. Please install the brand new <a href="https://wordpress.org/plugins/conveythis-translate/">ConveyThis plugin</a> for improved WordPress translation features!</p>
		</div>
		<?php
	}
	
	// Display the activation notification.
	function admin_notice_plugin_activation() {
		if (current_user_can('manage_options') && !$this->first_save) {
			echo <<<EOL
				<div class="error settings-error notice">
					<p><strong>Warning! Your ConveyThis Classic button is not set up yet!</strong></p>
					<p>Be sure to select your site's language and other options under <a href="options-general.php?page=conveythis_classic">ConveyThis Classic Settings</a>!</p>
				</div>
EOL;
		}
	}
	
	// Print the dropdown, popup code in the footer.
	function get_footer_code() {
		echo $this->get_dropdown();
		echo $this->get_popup();
	}
	
	// Called whenever content is shown.
	function code_to_content($content) {
		// What we add depends on type.
		if (is_feed()) {
			// Add nothing to RSS feed.
			return $content;
		} else if (is_category()) {
			// Add nothing to categories.
			return $content;
		} else if (is_singular()) {
			// For singular pages we add the button to the content normally.
			wp_enqueue_script('ctc_conveythis');
			wp_enqueue_style('ctc_conveythis');
			add_action('wp_footer', array(&$this, 'get_footer_code'));
			return $this->get_code() . $content;
		} else {
			// For everything else add nothing.
			return $content;
		}
	}
	
	// Get the actual button code.
	function get_code() {
		// Get the proper link
		$class_name			= $this->buttons[$this->button_id]['class_name'];
		$additional_classes	= $this->buttons[$this->button_id]['additional_classes'];
		return <<<EOL
			<!-- ConveyThis Classic button: -->
			<script>var conveythis_plugin_path = "{$this->button_path}";</script>
			<span class="conveythis" translate="no"><span class="conveythis-image $additional_classes $class_name"></span></span>
			<!-- End ConveyThis Classic button code. -->
EOL;
	}
	
	// Get ConveyThis dropdown.
	function get_dropdown() {
		if ($this->show_branding) {
			$dropdown_footer = <<<EOL
				<div class="conveythis-dropdown-footer">
					Get this free button at <a href="https://conveythis.com/classic.php?dropdown=y">ConveyThis</a><br />
					Powered by <a href="https://www.translation-services-usa.com">Translation Services USA</a>
				</div>
EOL;
		} else {
			$dropdown_footer = '';
		}
		return <<<EOL
			<div id="conveythis-dropdown" class="conveythis-dropdown notranslate" translate="no">
				<div class="conveythis-dropdown-header">
					Select a target language
				</div>
				<div class="conveythis-dropdown-body">
					<ul id="conveythis-dropdown-list" class="conveythis-dropdown-list"></ul>
				</div>
				$dropdown_footer
			</div>
EOL;
	}
	
	// Get ConveyThis popup.
	function get_popup() {
		if ($this->show_branding) {
			$popup_header_branding	= '<p>Powered by ConveyThis</p>';
			$popup_body_class		= '';
			$popup_footer = <<<EOL
				<div class="conveythis-popup-footer">
					<p><a href="https://conveythis.com/classic.php?dropdown=y">Get Your Own Free Translator</a></p>
					<p>Powered by <a href="https://www.translation-services-usa.com">Translation Services USA</a></p>
				</div>
EOL;
		} else {
			$popup_header_branding	= '';
			$popup_footer			= '';
			$popup_body_class		= 'conveythis-unbranded';
		}
		return <<<EOL
			<div id="conveythis-popup" class="conveythis-popup notranslate" translate="no">
				<div class="conveythis-popup-dialog">
					<div class="conveythis-popup-content">
						<div class="conveythis-popup-header">
							<button type="button" class="conveythis-close" data-dismiss="conveythis-popup" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<p class="conveythis-popup-title">ConveyThis Classic</p>
							$popup_header_branding
						</div>
						<div class="conveythis-popup-body $popup_body_class">
							<p>Select a taget language:</p>
							<div id="conveythis-popup-languages"></div>
						</div>
						$popup_footer
					</div>
				</div>
			</div>
EOL;
	}
	
	// Reset plugin options.
	function plugin_reset() {
		if (!current_user_can('manage_options')) {
			wp_die('You do not have sufficient permissions to access this page.');
		}
		?>
		<div class="wrap">
			<form method="post" action="options.php">
				<?php settings_fields('ctc_options'); ?>
				<input name="ctc_button_id" type="hidden" value="1" />
				<input name="ctc_src" type="hidden" value="en" />
				<input name="ctc_show_branding" type="hidden" value="0" />
				<input name="ctc_first_save" type="hidden" value="0" />
				<h2>Reset ConveyThis Classic Options</h2>
				<p>Click the &quot;Reset Settings&quot; button below to reset the plugin's options to their default settings:</p>
				<table class="widefat">
					<thead>
						<tr>
							<th width="33.333%">Option</th>
							<th width="66.666%">Default Setting</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><b>Button style</b></td>
							<td><img src="<?php echo $this->image_path;?>/buttons/translate1.gif" alt="" style="vertical-align:middle;" /></td>
						</tr>
						<tr>
							<td><b>Source language</b></td>
							<td>English</td>
						</tr>
						<tr>
							<td><b>Registered ConveyThis account</b></td>
							<td>none</td>
						</tr>
						<tr>
							<td><b>Tell someone about ConveyThis</b></td>
							<td>disabled</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Reset Settings to Default" class="button-primary" /> 
								<a href="options-general.php?page=conveythis_classic" class="button">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
		<?php
	}
	
	// Admin page display.
	function plugin_options() {
		if (!current_user_can('manage_options')) {
			wp_die('You do not have sufficient permissions to access this page.');
		}
		?>
		<div class="wrap">
			<form id="conveythis_classic-settings" method="post" action="options.php">
				<?php settings_fields('ctc_options'); ?>
				<input name="ctc_button_id" type="hidden" value="1" />
				<input name="ctc_src" type="hidden" value="en" />
				<input name="ctc_show_branding" type="hidden" value="0" />
				<input name="ctc_first_save" type="hidden" value="1" />
				<h2>ConveyThis Classic Settings</h2>
				<p>Update the language and other settings for the ConveyThis Classic plugin.</p>
				<table class="widefat">
					<tbody>
						<tr>
							<td colspan="2"><input type="submit" value="Save Settings" class="button-primary" /></td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
								<p><label for="ctc_src">Your Site's Current Language</label></p>
								<p>
									<select id="ctc_src" name="ctc_src">
										<?php
										$current_src = get_option('ctc_src') ? get_option('ctc_src') : $this->ctc_src;
										asort($this->languages);
										foreach ($this->languages as $key => &$value) {
											$selected = $current_src == $key ? 'selected="selected"' : '';
											printf('<option %s value="%s">%s</option>', $selected, $key, $value);
										}
										unset($value);
										?>
									</select>
								<p>
								<p>Set this to whatever language your blog is written in. If your blog is in English, and you want visitors to be able to view it in Spanish, Russian, and Japanese, select &quot;English.&quot;</p>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
								<p><label for="button_id_1">Choose a Button Style</label></p>
								<?php
								// Divid the buttons into two columns.
								$column_rows	= round(count($this->buttons));
								$first_column	= array_slice($this->buttons, 0, $column_rows / 2, true);
								$second_column	= array_slice($this->buttons, $column_rows / 2, null, true);
								?>
								<table>
									<tfoot>
										<tr>
											<td colspan="2">* no dropdown menu when moused over.</td>
										</tr>
									</tfoot>
									<tbody>
										<tr>
											<td width="50%">
												<?php
												foreach ($first_column as $id => &$button) {
													?>
													<p><label for="button_id_<?php echo $id; ?>"><input id="button_id_<?php echo $id; ?>" <?php echo ($this->button_id == $id) ? 'checked="checked"' : ''; ?> name="ctc_button_id" type="radio" value="<?php echo $id; ?>" /> <img src="<?php echo $this->image_path;?>/buttons/<?php echo $this->buttons[$id]['image_name']; ?>" alt="" style="vertical-align:middle;" /></label> <?php echo empty($this->buttons[$id]['additional_classes']) ? '*' : ''; ?></p>
													<?php
												}
												unset($button);
												?>
											</td>
											<td width="50%">
												<?php
												foreach ($second_column as $id => &$button) {
													?>
													<p><label for="button_id_<?php echo $id; ?>"><input id="button_id_<?php echo $id; ?>" <?php echo ($this->button_id == $id) ? 'checked="checked"' : ''; ?> name="ctc_button_id" type="radio" value="<?php echo $id; ?>" /> <img src="<?php echo $this->image_path;?>/buttons/<?php echo $this->buttons[$id]['image_name']; ?>" alt="" style="vertical-align:middle;" /></label> <?php echo empty($this->buttons[$id]['additional_classes']) ? '*' : ''; ?></p>
													<?php
												}
												unset($button);
												?>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;border-bottom:1px dotted #ddd;">
								<p><label for="ctc_show_branding"><input id="ctc_show_branding" <?php echo $this->show_branding ? 'checked="checked"' : ''; ?> name="ctc_show_branding" type="checkbox" value="1" /> Tell somebody about ConveyThis :-)</p>
								<p>The ConveyThis Classic plugin is not just free to use, it actually costs <i>us</i> money to support! Please help us out by allowing a few unobtrusive backlinks to us in the button's dropdown/pop-up so everyone knows where to get our plugin.</p>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="padding:10px;font-family:Verdana, Geneva, sans-serif;color:#666;">
								<b>Note:</b> if you are using any caching plugins, such as WP Super Cache, you will need to clear your cached pages after updating your ConveyThis Classic settings.
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Save Settings" class="button-primary" /> 
								<a href="options-general.php?page=conveythis_classic_reset" class="button">Reset to Default Options</a>
							</td>
						</tr>
					</tbody>
				</table>
				<p><b>ConveyThis Classic</b> is a project by <a href="https://conveythis.com/" target="_blank">ConveyThis</a>. Get a free quote for your professional or personal translation project at Translation Cloud now!</p>
			</form>
		</div>
		<?php
	}
	
	// Add settings link on plugin page
	function plugin_setings_link($links) { 
		$settings_link = '<a href="options-general.php?page=conveythis_classic">Settings</a>'; 
		array_unshift($links, $settings_link); 
		return $links; 
	}
	
	// Sanitize plugin settings options.
	function validate_language($language) {
		return array_key_exists($language, $this->languages) ? $language : $this->ctc_src;
	}
}

$conveythis_classic &= new ConveyThisClassicWidget();