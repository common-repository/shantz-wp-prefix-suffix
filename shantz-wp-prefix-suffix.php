<?php
/* 
Plugin Name: Shantz Wordpress Prefix Suffix
Plugin URI: http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix
Version: 1.1.4
Author: Shantanu Goel
Author URI: http://www.safercode.com/blog/
Description: This plugin shall give you the ability to add any text/HTML/CSS code to the beginning or end of your posts and/or pages. Go to <a href="http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix">shantz-wp-prefix-suffix</a> for updates and support. Also visit my <a href="http://tech.shantanugoel.com">tech site</a>. For Programming and secure coding related info, visit <a href=http://www.safercode.com/blog/>Secure Coding in C/C++</a>.
 
Copyright 2007  Shantanu Goel  (email : shantanu [a t ] shantanugoel DOT com)

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
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
if (!class_exists("shantzWpSuffPref")) {
	class shantzWpSuffPref {
        var $adminOptionsName = "shantzWpSuffPrefAdminOptions";
        var $wpCompat;
        var $isexcerpt = false;

		function shantzWpSuffPref() { //constructor
			
		}

	function getAdminOptions() {
            $shantzAdminOptions = array('post_prefix' => '',
		'post_suffix' => '',
		'post_mid' => '',
		'post_prefix_post' => 'true',
		'post_prefix_page' => 'true',
		'post_prefix_php' => 'true',
		'post_prefix_excerpt' => 'false',
        'post_prefix_home' => 'true',
		'post_mid_post' => 'true',
		'post_mid_page' => 'true',
		'post_mid_php' => 'true',
		'post_mid_excerpt' => 'false',
        'post_mid_home' => 'false',
        'post_mid_num_p' => 1,
        'post_mid_num_w' => 100,
		'post_suffix_post' => 'true',
		'post_suffix_page' => 'true',
		'post_suffix_php' => 'true',
		'post_suffix_excerpt' => 'false',
        'post_suffix_home' => 'true',
        'priority' => 9,
        'promote' => 'true');

            $shantzOptions = get_option($this->adminOptionsName);
            if (!empty($shantzOptions)) {
                foreach ($shantzOptions as $key => $option)
                    $shantzAdminOptions[$key] = $option;
            }
            update_option($this->adminOptionsName, $shantzAdminOptions);
            return $shantzAdminOptions;
        }

        function init() {
            $this->getAdminOptions();
        }

        function printAdminPage() {
            $shantzOptions = $this->getAdminOptions();

            if(isset($_POST['defaults_shantzWpSuffPrefSettings'])) {
                    $shantzOptions['post_prefix'] = '';
                    $shantzOptions['post_mid'] = '';
                    $shantzOptions['post_suffix'] = '';
		    $shantzOptions['post_prefix_post'] = 'true';
		    $shantzOptions['post_prefix_page'] = 'true';
		    $shantzOptions['post_prefix_php'] = 'true';
		    $shantzOptions['post_prefix_excerpt'] = 'false';
		    $shantzOptions['post_prefix_home'] = 'true';
		    $shantzOptions['post_mid_post'] = 'true';
		    $shantzOptions['post_mid_page'] = 'true';
		    $shantzOptions['post_mid_php'] = 'true';
		    $shantzOptions['post_mid_excerpt'] = 'false';
		    $shantzOptions['post_mid_home'] = 'true';
		    $shantzOptions['post_mid_num_p'] = 1;
		    $shantzOptions['post_mid_num_w'] = 100;
		    $shantzOptions['post_suffix_post'] = 'true';
		    $shantzOptions['post_suffix_page'] = 'true';
		    $shantzOptions['post_suffix_php'] = 'true';
		    $shantzOptions['post_suffix_excerpt'] = 'false';
		    $shantzOptions['post_suffix_home'] = 'true';
		    $shantzOptions['promote'] = 'true';
		    $shantzOptions['priority'] = 9;

                update_option($this->adminOptionsName, $shantzOptions);

                ?>
                    <div class="updated"><p><strong><?php _e("Settings Reset to Defaults.", "shantzWpSuffPref");?></strong></p></div>
                    <?php
            }

            else if(isset($_POST['update_shantzWpSuffPrefSettings'])) {
             if(isset($_POST['shantzWpPrefix'])) {
                $shantzOptions['post_prefix'] = stripslashes(apply_filters('content_save_pre', $_POST['shantzWpPrefix']));
            }
             if(isset($_POST['shantzWpMid'])) {
                $shantzOptions['post_mid'] = stripslashes(apply_filters('content_save_pre', $_POST['shantzWpMid']));
            }
             if(isset($_POST['shantzWpSuffix'])) {
                $shantzOptions['post_suffix'] = stripslashes(apply_filters('content_save_pre', $_POST['shantzWpSuffix']));
            }
             if(isset($_POST['shantzWpPrefixPost'])) {
                $shantzOptions['post_prefix_post'] =  $_POST['shantzWpPrefixPost'];
            }
             if(isset($_POST['shantzWpPrefixPage'])) {
                $shantzOptions['post_prefix_page'] =  $_POST['shantzWpPrefixPage'];
            }
             if(isset($_POST['shantzWpPrefixPhp'])) {
                $shantzOptions['post_prefix_php'] =  $_POST['shantzWpPrefixPhp'];
            }
             if(isset($_POST['shantzWpPrefixExcerpt'])) {
                $shantzOptions['post_prefix_excerpt'] =  $_POST['shantzWpPrefixExcerpt'];
            }
             if(isset($_POST['shantzWpPrefixHome'])) {
                $shantzOptions['post_prefix_home'] =  $_POST['shantzWpPrefixHome'];
            }
             if(isset($_POST['shantzWpMidPost'])) {
                $shantzOptions['post_mid_post'] =  $_POST['shantzWpMidPost'];
            }
             if(isset($_POST['shantzWpMidPage'])) {
                $shantzOptions['post_mid_page'] =  $_POST['shantzWpMidPage'];
            }
             if(isset($_POST['shantzWpMidPhp'])) {
                $shantzOptions['post_mid_php'] =  $_POST['shantzWpMidPhp'];
            }
             if(isset($_POST['shantzWpMidExcerpt'])) {
                $shantzOptions['post_mid_excerpt'] =  $_POST['shantzWpMidExcerpt'];
            }
             if(isset($_POST['shantzWpMidHome'])) {
                $shantzOptions['post_mid_home'] =  $_POST['shantzWpMidHome'];
            }
             if(isset($_POST['shantzWpMidNumP'])) {
                $shantzOptions['post_mid_num_p'] =  intval($_POST['shantzWpMidNumP']);
            }
             if(isset($_POST['shantzWpMidNumW'])) {
                $shantzOptions['post_mid_num_w'] =  intval($_POST['shantzWpMidNumW']);
            }
             if(isset($_POST['shantzWpSuffixPost'])) {
                $shantzOptions['post_suffix_post'] =  $_POST['shantzWpSuffixPost'];
            }
             if(isset($_POST['shantzWpSuffixPage'])) {
                $shantzOptions['post_suffix_page'] =  $_POST['shantzWpSuffixPage'];
            }
             if(isset($_POST['shantzWpSuffixPhp'])) {
                $shantzOptions['post_suffix_php'] =  $_POST['shantzWpSuffixPhp'];
            }
             if(isset($_POST['shantzWpSuffixExcerpt'])) {
                $shantzOptions['post_suffix_excerpt'] =  $_POST['shantzWpSuffixExcerpt'];
            }
             if(isset($_POST['shantzWpSuffixHome'])) {
                $shantzOptions['post_suffix_home'] =  $_POST['shantzWpSuffixHome'];
            }
             if(isset($_POST['shantzWpPromote'])) {
                $shantzOptions['promote'] =  $_POST['shantzWpPromote'];
            }
             if(isset($_POST['shantzWpPriority'])) {
                $shantzOptions['priority'] =  intval($_POST['shantzWpPriority']);
            }

            update_option($this->adminOptionsName, $shantzOptions);

            ?>
<div class="updated"><p><strong><?php _e("Settings Updated.", "shantzWpSuffPref");?></strong></p></div>
            <?php
        } ?>
<div class=wrap>
<h2>Shantanu's WP Prefix Suffix Plugin</h2>
<h3>Go to <a href="http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix">shantz-wp-prefix-suffix</a> for updates and support. Also visit my <a href="http://tech.shantanugoel.com">tech site</a>. For Programming and secure coding related info, visit <a href=http://www.safercode.com/blog/>Secure Coding in C/C++</a>.</h3><br>

<h4>Contribute to the development of this plugin: </h4> <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypal.com/en_GB/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
<h4>Plugin Priority: </h4><input type=text name="shantzWpPriority" size=3 value=<?php _e(apply_filters('format_to_edit',$shantzOptions['priority']), 'shantzWpSuffPref') ?> /> <br />Change this number if there are other plugins or text that manipulates beginning or end of your posts and you want to control the order in which Shantz WP Prefix Suffix appends the text. To append your text before other plugins, lower this number, and to append your text after other plugins, make this number higher.

<h4>Add the following text before the posts (Prefix) </h4>
<textarea name="shantzWpPrefix" style="width: 100%; height: 50px;"><?php _e(apply_filters('format_to_edit',$shantzOptions['post_prefix']), 'shantzWpSuffPref') ?></textarea>
<p>
<label for="shantzWpPrefixPhp"> Enable PHP Input <input type="hidden" name="shantzWpPrefixPhp" value="false"/><input type="checkbox" name="shantzWpPrefixPhp" value="true" <?php if ($shantzOptions['post_prefix_php'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpPrefixPost"> Add prefix to posts? <input type="hidden" name="shantzWpPrefixPost" value="false"/><input type="checkbox" name="shantzWpPrefixPost" value="true" <?php if ($shantzOptions['post_prefix_post'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpPrefixPage"> Add prefix to pages? <input type="hidden" name="shantzWpPrefixPage" value="false"/><input type="checkbox" name="shantzWpPrefixPage" value="true" <?php if ($shantzOptions['post_prefix_page'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpPrefixHome"> Add prefix on homepage? <input type="hidden" name="shantzWpPrefixHome" value="false"/><input type="checkbox" name="shantzWpPrefixHome" value="true" <?php if ($shantzOptions['post_prefix_home'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpPrefixExcerpt"> Add prefix to excerpts? <input type="hidden" name="shantzWpPrefixExcerpt" value="false"/><input type="checkbox" name="shantzWpPrefixExcerpt" value="true" <?php if ($shantzOptions['post_prefix_excerpt'] == "true") { _e('checked="checked"');} ?>/> </label>
</p>

<h4>Add the following text in the middle of the posts </h4>
<textarea name="shantzWpMid" style="width: 100%; height: 50px;"><?php _e(apply_filters('format_to_edit',$shantzOptions['post_mid']), 'shantzWpSuffPref') ?></textarea>
<p>
<label for="shantzWpMidPhp"> Enable PHP Input <input type="hidden" name="shantzWpMidPhp" value="false"/><input type="checkbox" name="shantzWpMidPhp" value="true" <?php if ($shantzOptions['post_mid_php'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpMidPost"> Add to posts? <input type="hidden" name="shantzWpMidPost" value="false"/><input type="checkbox" name="shantzWpMidPost" value="true" <?php if ($shantzOptions['post_mid_post'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpMidPage"> Add to pages? <input type="hidden" name="shantzWpMidPage" value="false"/><input type="checkbox" name="shantzWpMidPage" value="true" <?php if ($shantzOptions['post_mid_page'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpMidHome"> Add on homepage? <input type="hidden" name="shantzWpMidHome" value="false"/><input type="checkbox" name="shantzWpMidHome" value="true" <?php if ($shantzOptions['post_mid_home'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpMidExcerpt"> Add to excerpts? <input type="hidden" name="shantzWpMidExcerpt" value="false"/><input type="checkbox" name="shantzWpMidExcerpt" value="true" <?php if ($shantzOptions['post_mid_excerpt'] == "true") { _e('checked="checked"');} ?>/> </label>
<br />
Add after atleast <input type=text name="shantzWpMidNumP" size=3 value=<?php _e(apply_filters('format_to_edit',$shantzOptions['post_mid_num_p']), 'shantzWpSuffPref') ?> /> paragraphs and atleast <input type=text name="shantzWpMidNumW" size=3 value=<?php _e(apply_filters('format_to_edit',$shantzOptions['post_mid_num_w']), 'shantzWpSuffPref') ?> /> words
</p>

<h4>Add the following text after the posts (Suffix) </h4>
<textarea name="shantzWpSuffix" style="width: 100%; height: 50px;"><?php _e(apply_filters('format_to_edit',$shantzOptions['post_suffix']), 'shantzWpSuffPref') ?></textarea>
<p>
<label for="shantzWpSuffixPhp"> Enable PHP Input <input type="hidden" name="shantzWpSuffixPhp" value="false"/><input type="checkbox" name="shantzWpSuffixPhp" value="true" <?php if ($shantzOptions['post_suffix_php'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpSuffixPost"> Add suffix to posts? <input type="hidden" name="shantzWpSuffixPost" value="false"/><input type="checkbox" name="shantzWpSuffixPost" value="true" <?php if ($shantzOptions['post_suffix_post'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpSuffixPage"> Add suffix to pages? <input type="hidden" name="shantzWpSuffixPage" value="false"/><input type="checkbox" name="shantzWpSuffixPage" value="true" <?php if ($shantzOptions['post_suffix_page'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpSuffixHome"> Add suffix on homepage? <input type="hidden" name="shantzWpSuffixHome" value="false"/><input type="checkbox" name="shantzWpSuffixHome" value="true" <?php if ($shantzOptions['post_suffix_home'] == "true") { _e('checked="checked"');} ?>/> &nbsp;&nbsp;&nbsp;&nbsp;</label>
<label for="shantzWpSuffixExcerpt"> Add suffix to excerpts? <input type="hidden" name="shantzWpSuffixExcerpt" value="false"/><input type="checkbox" name="shantzWpSuffixExcerpt" value="true" <?php if ($shantzOptions['post_suffix_excerpt'] == "true") { _e('checked="checked"');} ?>/> </label>
</p>

<p>
<label for="shantzWpPromote"> Contribute to this plugin's development. Add a very tiny, almost invisible, link to plugin home page at the bottom of your post. (Will not show up on your home page)<input type="hidden" name="shantzWpPromote" value="false"/><input type="checkbox" name="shantzWpPromote" value="true" <?php if ($shantzOptions['promote'] == "true") { _e('checked="checked"');} ?>/> </label>
</p>

<div class="submit">
<input type="submit" name="defaults_shantzWpSuffPrefSettings" value="<?php _e('Load Default Settings', 'shantzWpSuffPref') ?>" />
<input type="submit" name="update_shantzWpSuffPrefSettings" value="<?php _e('Update Settings', 'shantzWpSuffPref') ?>" /></div>
</form>
 </div>
					<?php
	}//End function printAdminPage()

        function excerpt($content = '') {
            $this->isexcerpt = true;
            return $content;
        }

        function addContent($content = '') {
            global $wp_version;
            global $post;
            $wpCompat = (version_compare($wp_version, '2.1', '<'));
            $result_pre = 'true';
            $result_mid = 'true';
            $result_suf = 'true';
            $promote = 'true';

            $shantzOptions = $this->getAdminOptions();

            if ($shantzOptions['promote'] == 'false') {
                $promote = 'false';
            }

            if( (!$wpCompat && ($post->post_type == 'post')) || ($wpCompat && ($post->post_status == 'static')) )  {
                if ($shantzOptions['post_prefix_post'] == 'false') {
                    $result_pre = 'false';
                }
                if ($shantzOptions['post_mid_post'] == 'false') {
                    $result_mid = 'false';
                }
                if ($shantzOptions['post_suffix_post'] == 'false') {
                    $result_suf = 'false';
                }
            }
            else {
                if ($shantzOptions['post_prefix_page'] == 'false') {
                    $result_pre = 'false';
                }
                if ($shantzOptions['post_mid_page'] == 'false') {
                    $result_mid = 'false';
                }
                if ($shantzOptions['post_suffix_page'] == 'false') {
                    $result_suf = 'false';
                }
            }

            if($this->isexcerpt == true)
            {
                if($shantzOptions['post_prefix_excerpt'] == 'false')
                {
                    $result_pre = 'false';
                }
                if($shantzOptions['post_mid_excerpt'] == 'false')
                {
                    $result_mid = 'false';
                }
                if($shantzOptions['post_suffix_excerpt'] == 'false')
                {
                    $result_suf = 'false';
                }
                $this->isexcerpt = false;
            }

            if(is_home())
            {
                if($shantzOptions['post_prefix_home'] == 'false')
                {
                    $result_pre = 'false';
                }
                if($shantzOptions['post_mid_home'] == 'false')
                {
                    $result_mid = 'false';
                }
                if($shantzOptions['post_suffix_home'] == 'false')
                {
                    $result_suf = 'false';
                }
            }

            echo "<!-- Powered by Shantz WP Prefix Suffix. Tech Blog: http://tech.shantanugoel.com/ Secure Programming Blog: http://www.safercode.com/blog/ Blog: http://blog.shantanugoel.com/ -->";

            $promote_string = '<div style="font-size:8px"><i><a href="http://tech.shantanugoel.com/">powered by shantz-wp-prefix-suffix</a></i></div>';

            if ($result_mid == 'true')
            {
                $mid = $shantzOptions['post_mid'];

                if($shantzOptions['post_mid_php'] == 'true') {
                    ob_start();
                    $ev_result = eval("?>".$mid."<?");
                    if($ev_result !== FALSE)
                    {
                        $mid = ob_get_contents();
                    }
                    ob_end_clean();
                }

                $temp_content = '';
                $num_words = 0;
                $mid_attached = false;
                $array = explode("</p>", $content);
                for($i = 0; $i < count($array); $i++)
                {
                    $temp_content .= $array[$i];
                    if(FALSE !== strpos($array[$i], "<p"))
                    {
                        $temp_content .= "</p>";
                    }
                    $num_words += str_word_count($temp_content);
                    if($i >= ($shantzOptions['post_mid_num_p'] - 1) 
                        && ($num_words > $shantzOptions['post_mid_num_w']) 
                        && ($mid_attached == false))
                    {
                        $temp_content .= $mid;
                        $mid_attached = true;
                    }
                }

                if($mid_attached == false)
                {
                    $temp_content .= $mid;
                }

                $content = $temp_content;
            }

            if ($result_pre == 'true')
            {
                $prefix = $shantzOptions['post_prefix'];

                if($shantzOptions['post_prefix_php'] == 'true') {
                    ob_start();
                    $ev_result = eval("?>".$prefix."<?");
                    if($ev_result !== FALSE)
                    {
                        $prefix = ob_get_contents();
                    }
                    ob_end_clean();
                }

                $content = $prefix.$content;
            }

            if ($result_suf == 'true')
            {
                $suffix = $shantzOptions['post_suffix'];

                if($shantzOptions['post_suffix_php'] == 'true') {
                    ob_start();
                    $ev_result = eval("?>".$suffix."<?");
                    if($ev_result !== FALSE)
                    {
                        $suffix = ob_get_contents();
                    }
                    ob_end_clean();
                }

                $content = $content.$suffix;
            }

            if($promote == 'true' && !is_home())
            {
                $content .= $promote_string;
            
            }

            return $content;
        }

} //End Class shantz-plugin
}

//Init the admin panel
if (!function_exists("shantzWpSuffPref_ap")) {
    function shantzWpSuffPref_ap() {
        global $shantzWpSuffPrefInstance;
        if(!isset($shantzWpSuffPrefInstance)) {
            return;
        }
        if (function_exists('add_options_page')) {
            add_options_page('Shantanu\'s WP Prefix Suffix Settings', 'Shantz WP Prefix Suffix', 9, basename(__FILE__), array($shantzWpSuffPrefInstance, 'printAdminPage'));
        }
    }
}

if (class_exists("shantzWpSuffPref")) {
	$shantzWpSuffPrefInstance = new shantzWpSuffPref();
}

//Actions and Filters	
if (isset($shantzWpSuffPrefInstance)) {

    add_action('admin_menu', 'shantzWpSuffPref_ap');
    add_action('activate_shantz-wp-prefix-suffix/shantz-wp-prefix-suffix.php', array(&$shantzWpSuffPrefInstance, 'init'));

    $shantzOptions = $shantzWpSuffPrefInstance->getAdminOptions();

    $priority = 9;

    if ( is_int($shantzOptions['priority']) ) {
        $priority = $shantzOptions['priority'];
    }

    add_filter('the_content', array(&$shantzWpSuffPrefInstance, 'addContent'), $priority);
    add_filter('get_the_excerpt', array(&$shantzWpSuffPrefInstance, 'excerpt'), $priority);
}

require_once("shantz-posts.php");

?>
