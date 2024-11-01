=== Plugin Name ===
Contributors: shantzg001
Donate link: http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix
Tags: wordpress, plugin, posts, Post, post, pages, Page, page, prefix, suffix, add to post, add to page, adsense, advertisement, ad management, adsense-manager, ads, chitika, YPN
Requires at least: 1.5
Tested up to: 2.7.1
Stable tag: 1.1.4

Shantz WP Prefix Suffix is a light plugin to quickly add text/htm/css before and/or after your posts and/or pages.

== Description ==
Note: The Admin page settings saving issue and input field size issue are fixed now.

Shantz WP Prefix Suffix is a light-weight and easy to use plugin which allows you to add any text and/or HTML/CSS code to your posts and/or pages as prefix (top / beginning), middle and/or suffix (bottom /end). (That includes even any new or old posts and pages and even your feed)
Examples of use cases could be to include your copyright message, advertisements (like adsense, etc), permalinks, your other site links, any other custom messages. This works very fine with ads as you don't have to manipulate your posts or templates to add the ad code, shantz-wp-prefix-suffix will do that for you automatically for all posts and you also get basic controls whether to "display" the ad or not (on home pages, excerpts, etc).
(For Complete Details and to see the plugin in use, go to [my tech blog](http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix "Shantz WordPress Prefix Suffix"))

Features:

* Add Prefix to all your posts automatically.

* Add Prefix to all your pages automatically.

* Add Suffix to all your posts automatically.

* Add Suffix to all your pages automatically.

* You can control the number of paragraphs/words after which your code/text should be added while using the "middle" option.

* Prefix/Suffix can be plain text, HTML, CSS, PHP, javascript etc.

* Optionally display/not display on home page/excerpts etc.

* Control plugin order for fine control over where your code/text is displayed.

(For Complete Details, go to [my tech blog](http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix "Shantz WordPress Prefix Suffix"))

== Installation ==

The shantz-wp-prefix-suffix plugin can be installed in following easy steps:

1. Unzip "shantz-wp-prefix-suffix" archive and put all files into your "plugins" folder (/wp-content/plugins/). It is advisable to create a sub directory into the plugins folder, like /wp-content/plugins/shantz-wp-prefix-suffix/

2. Activate the plugin

3. Go to Settings > Shantz WP Prefix Suffix, adjust your settings and save them.

== Frequently Asked Questions ==
For quick updates and resolutions, go to [shantz-wp-prefix-suffix home page](http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix "My Technophilic Musings")

= How do I add My copyright message and post permalink so as to protect myself against RSS feed scrapers =
Add the following code to "Suffix text box" and check the "enable php input" option (without the "pre" and "code" tags. I put them there for the wordpress readme parser):
<pre><code>© <a href="http://tech.shantanugoel.com/">Shantanu Goel</a> | <a href="<?php echo get_permalink();?>"><?php the_title();?></a></code></pre>

= How do I use this for Adsense =
You can either paste your javascript code in the text box and ads will appear automatically in your posts. If you use an ad management plugin like adsense-manager then you can paste the code given by that plugin in the text box, so that all your posts/pages will be "able" to display the code but actual display is controlled by your ad management plugin. You can also get basic control on displaying the code by the "display on home page/excerpts" options.

= I unchecked the option "Add to pages/posts" but my pages/posts are still displaying prefix/suffix =
Check your WordPress version. This option is effective only for Version 2.1 and above

= How to upgrade to a new version = 
Simply overwrite the old files with the new ones.

= How can I request for a feature or report a bug = 
Let me know at [shantz-wp-prefix-suffix home page](http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix "Shantanu's Technophilic Musings").

= How can I contribute to keep the development of this plugin going = 
You could add a link to my blog from your site or click on the donate link on the settings screen :)

= My question isn't listed here =
Put it up at [shantz-wp-prefix-suffix home page](http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix "Shantanu's Technophilic Musings"). I will answer it at the earliest

== Screenshots ==
You can also see the plugin in action on [my site](http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix "Shantanu's Technophilic Musings")

1. Config Screen
2. Plugin in action

You can also see the plugin in action on [my site](http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-prefix-suffix "My Technophilic Musings")

== Arbitrary section ==
For more updates, go to [shantz-wp-qotd home page](http://tech.shantanugoel.com/projects/wordpress/shantz-wordpress-qotd "My Technophilic Musings")

Version History/ChangeLog:

* Version 1.1.4
	* Fixed input field size issues on settings page
   * Fixed the issue where the settings were not being saved

* Version 1.1.3
	* Removed some debug code that crept into last version

* Version 1.1.2
	* Added option for controlling plugin priority to resolve order issues if there are other plugins that add text to your posts.
    * WP 2.7.1 Compatibility
    * Minor cosmetic changes

* Version 1.1.1
	* Fixed a bug that was causing conflicts with some other plugins that add content to end of posts.

* Version 1.1.0
	* Added option to add code/text to the middle of the posts

* Version 1.0.5
	* Added option to enable/disable adding prefix/suffix to home page
    * Added option to enable/disable adding prefix/suffix to excerpts
    * Fixed a bug in which the prefix/suffix was displaying even if you set it not to

* Version 1.0.4
	* Added option for using php code for prefix and suffix

* Version 1.0.3
	* Fixed a bug that was causing non-display of prefix-suffix on posts

* Version 1.0.2
	* Fixed a typo that was causing errors while activating the plugin

* Version 1.0.1
	* Options to not display the prefix/suffix on pages also works for WP < 2.1

* Version 1.0.0
	* Initial version
