=== Catch Web Tools ===
Contributors: catchthemes, sakinshrestha, pratikshrestha
Donate link: http://catchthemes.com/wp-plugins/catch-web-tools/
License: GNU General Public License, version 3 (GPLv3)
License URI: http://www.gnu.org/licenses/gpl-3.0.txt
Tags: catch-ids, simple, admin, wp-admin, show, ids, post, page, category, media, links, tag, user, widget, seo, search engine optimization, google, alexa, bing, meta keywords, meta description, social icons, github, dribbble, twitter, facebook, wordpress, googleplus, linkedin, pinterest, flickr, vimeo, youtube, tumblr, instagram, codepen, polldaddy, path, css, open graphs, plugin, posts, sidebar, image, images
Requires at least: 4.1
Tested up to: 4.3.1
Stable tag: 1.4.1

Improve your WordPress site with powerful web tools by catchthemes.com

== Description ==

Catch Web Tools is a new modular plugin from Catch Themes. Power up your WordPress site with powerful features that were till now only available to Catch Themes users. We currently offer Webmaster Tools, Open Graph, Custom CSS, Social Icons, Catch IDs and basic SEO Optimization modules and will be adding more.

= Here are some quick reasons why you should check these out! =

Let's begin with how easy the setup process is. It's just a matter of clicks. 

One usual assumption people have is like when a plugin offers multiple features and facilities, it loads slow. However, Catch Web Tools offers modular plugins that you activate manually. Which simply means, that if there are 50 different facilities the plugin offers, your site won't take the load of those 50 features unless you activate them. You have the option of activating manually the exact feature's you need and not unnecessarily overload your site. 

Catch Web Tools is available for free downloads at this point. Which means, you will get a lot of advanced features that would make your site interesting, efficient and professional - for free!

Catch Web Tools use clean coding that follows WordPress's standard guideline. Which means, zero hassles and perfect compatibility with your themes!


= Premium Support =

Catch Themes team does not provide support for the Catch Web Tools plugin on the WordPress.org forums. Support is provided at [Catch Web Tools Support Forum](http://catchthemes.com/support-forum/forum/catch-web-tools/) 

= Translation =

Catch Web Tools plugin is translation ready. 
Added Translation for Brazilian Portuguese by Valdir Trombini
Added Translation for Serbo-Croatian by Andrijana Nikolic

== Installation ==

You can download and install Catch Web Tools plugin using the built in WordPress plugin installer. If you download Catch Web Tools manually, make sure it is uploaded to "/wp-content/plugins/catch-web-tool/".

Activate Catch Web Tools in the "Plugins" admin panel using the "Activate" link. 

You'll then see Catch Web Tools dashboard from which you can enable or disable the modules as per your need.

= Webmaster Tools =

Webmaster Tools is a very popular solution for your website and it is highly recommended by webmasters. It will help you with the Search Engine Ranking Optimization of your website.

Click on the Activate button in the Catch Web Tools Dashboard or Check the "Enable Webmaster module" to enable webmaster tools.

Feed Redirect/Custom Feeds
	* This section allows you to add in custom feed URL which will redirect default WordPress Feed. If your custom feed(s) are not handled by Feedblitz or Feedburner, do not use the redirect options.

Header and Footer Scripts Section
	* This section has facilities provided so that any script from Google, Facebook, Google Analytics etc. can be placed, which will load on Header or Footer.

Site Verification Section
	* This section allows addition of verification ID from Google, Bing and Alexa here to validate site.

= Custom CSS =

Allows addition of Custom CSS in the head section of the site. If CSS is entered and saved, it will show up in the frontend head section. You can leave it blank if it is not needed.


= Catch IDS =

Click on the Activate button in the Catch Web Tools Dashboard.

Once the module is enabled, it will show the Post ID, Page ID, Media ID, Links ID, Category ID, Tag ID and User ID in the Admin Section Table.

= Social Icons =

Social Icons uses icons from genericons v. 3.0.1  [genericons.com](http://genericons.com).

Click on the Activate button in the Catch Web Tools Dashboard or Check the "Enable Social Icons module" to enable Social Icons provided by Catch Web Tools.

Once the module is enabled and fields are entered, social icons can be shown via three ways, shortcodes, widgets and templates.

Shortcodes
	* The shortcode [cathchemes_social_icons] (in the Post/Page content) will enable Social Icons into the Page/Post.

Widgets
	* Drag and drop Catch Web Tools' Social Icons Widget to any Sidebar for results.

WordPress Templates
	* If Catch Web Tools Social Icons is required in php template, the following code can be used:

	<?php 
	if ( function_exists( 'catchwebtools_social_icons' ) )
		catchwebtools_social_icons();
	?>
			
	OR
			
	<?php 
		echo do_shortcode( '[cathchemes_social_icons]' ); 
	?>

= OpenGraph ( Social Integration ) =

SEO and Social Media are heavily intertwined, that is why this plugin also comes with a Facebook OpenGraph implementation. Custom Meta boxes can be used to add OpenGraph tags for specific pages or posts. This section adds Open Graph meta data to site's <head> section.

Click on the Activate button in the Catch Web Tools Dashboard or Check the "Enable OpenGraph Module" to enable social integration provided my Catch Web Tools.

Homepage Setting Section 
	* This section includes OpenGraph Settings for your home page. 

Default Setting Section 
	* This section includes a default image field which is used if the post/page being shared does not contain any images.

Custom Settings Section ( Only For Advanced Users )
	* This setting is only recommended for advanced users who understand detailed workings of OpenGraph tool.
	* This field is for any other type of OpenGraph tag that is not fulfilled by Catch Web Tools OpenGraph Basic Settings. E.g.:<meta property="og:audio" content="http://example.com/sound.mp3" />
	* OpenGraph tags for specific pages or posts, can be added via Catch Web Tools Custom Meta Box which shows up in pages’ and posts’ add/edit sections once this section is enabled.

= SEO (BETA Release) =

SEO is in beta version. SEO can be used to add SEO meta tags to Homepage, specific pages or posts and Categories pages. This section adds SEO meta data to site's <head> section.

Click on Activate button in the Catch Web Tools Dashboard or Check the "Enable SEO Module" to enable SEO provided by Catch Web Tools.

SEO Homepage Settings
	* This section includes SEO settings for Homepage

Catch Web Tools: SEO Settings
	* SEO for specific pages or posts, can be added via Catch Web Tools Custom Meta Box which shows up in pages’ and posts’ add/edit sections once this section is enabled.	
	* Once enabled the settings will also show up in the categories add and edit page, below the main settings section. 


== Screenshots ==

1. Catch Web Tools Dashboard
2. Webmaster Tools
3. Custom CSS
4. Social Icons
5. Open Graph
6. SEO
7. Open Graph and SEO Settings Meta Box


== Changelog ==

= 1.4.1 =
* Changed text domain from catchwebtools to catch-web-tools

= 1.4 =
* Added: Feed redirect / custom feed options under webmaster tools
* Changed: Support URL

= 1.3 =
* Bug Fixed: Escaped outputs for social icons
* Bug Fixed: Escaped outputs for open graph tools
* Bug Fixed: Escaped outputs for webmasters tools
* Bug Fixed: Skype social icon esc_attr instead of esc_url
* Updated Genericons
* Check version compatibility WordPress 4.3

= 1.2 =
* Added Serbo-Croatian translation sr_RS.po and sr_RS.mo
* Bug Fixed: empty SEO title added when deactivated

= 1.1 =
* Bug Fixed: SEO with title tags for version 4.1 or later

= 1.0 =
* Check version compatibility WordPress 4.1
* Fixed admin css

= 0.4 =
* Check version compatibility WordPress 3.9.2

= 0.3 =
* Added Brazilian Portuguese translation pt_BR.po and pt_BR.mo
* Fixed textdomain issue with .pot files

= 0.2 =
* Check WordPress compatibility up to version 3.9.1

= 0.1 =
* Initial Release