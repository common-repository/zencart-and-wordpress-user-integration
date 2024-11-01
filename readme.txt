=== Plugin Name ===
Contributors: blackc2004 
Donate link: http://cjbonline.org
Tags:zen, cart, zen cart, login, register, logoff, logout 
Requires at least: 2.1.2
Tested up to: 2.5
Stable tag: .5

This plugin replaces the WP login,logout, and register with the zencart functions so that they are all tied together.
== Description ==

This plugin replaces the WP login,logout and register with the zen cart functions. You must have the WOZ plugin already installed for zen cart. The files in this plugin actually go in the zen cart installation (includes/*). After that you can send all your login/logout etc to the zen cart pages and this will handle all the WP functions as well.

Changes--
.5 - 05-20-2008
	- Now handles password changed
	- Now handles password forgot

== Installation ==

* Upload to your '/zencart/includes/*'</li>

Please note that I had to change includes/modules/pages/password_forgotten/header_php.php and add a new notifier which is right before the redirect.

That's it you're done!
