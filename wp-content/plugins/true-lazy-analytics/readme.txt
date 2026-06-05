===  True Lazy Analytics ===
Contributors: seojacky, mihdan
Tags: Pagespeed, Lazy Load, Яндекс, Google Analytics, Perfomance
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 5.6.20
Stable tag: 2.5.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin enables lazy loading for Google Analytics, Microsoft Clarity, Facebook Pixel, Hotjar, Yandex Metrica (Yandex Metrika) and Liveinternet counter.

== Description ==
This plugin enables lazy loading for Google Analytics, Facebook Pixel, Hotjar, Yandex Metrica (Yandex Metrika) and Liveinternet counter. Does not degrade PageSpeed scores. The installation of the counter of Yandex Metrica and Google Analytics on the website without editing the files of the selected theme. All you need is turn necessary toggle on and you are in business 😎Microsoft

### 📈 Supports popular analytics systems ###
- **Google Analytics** (web analytics service offered by Google that tracks and reports website traffic).
- **Microsoft Clarity** - is a free, user-friendly behavioral analytics tool.
- **Facebook Pixel** - is an analytics tool that allows you to measure the effectiveness of your advertising by understanding the actions people take on your website.
- **Hotjar** - is a suite of analytics tools that will help you gather qualitative data.
- **Yandex Metrica** — analytics system of Russian search engine Yandex. You can track events and create and analyse conversion targets.
- **Liveinternet** (free statistics service in Runet).
- **SberAds** (платформа для размещения рекламы в интернете).
- **VkAds** (платформа для рекламы на проектах VK).

#### ⏳ Coming soon ####
- **Facebook Pixel Events**

= Feature Request and Issues =
[Submit Request or Issues](https://wordpress.org/support/plugin/true-lazy-analytics/)

= Translations =
[Help translate True Lazy Analytics](https://translate.wordpress.org/projects/wp-plugins/true-lazy-analytics/)
<ul>
	<li>🇺🇸 English (UK) (English (UK)) - <a href="https://profiles.wordpress.org/seojacky">seojacky</a></li>
	<li>🇷🇺 Русский (Russian) - <a href="https://profiles.wordpress.org/seojacky">seojacky</a></li>
	<li>🇺🇦 Українська (Ukranian) - <a href="https://profiles.wordpress.org/develabr">develabr</a>,   <a href="https://profiles.wordpress.org/sergeykovalets">Sergey Kovalets</a></li>
	<li>🇪🇸 Español (Spanish (Spain)) - <a href="https://profiles.wordpress.org/nobnob/">Javier Esteban</a></li>
	<li>🇲🇽 Español (Spanish (Mexico)) - <a href="https://profiles.wordpress.org/nobnob/">Javier Esteban</a></li>
	<li>🇻🇪 Español (Spanish (Venezuela)) - <a href="https://profiles.wordpress.org/nobnob/">Javier Esteban</a></li>
	<li>🇨🇴 Español (Spanish (Colombia)) - <a href="https://profiles.wordpress.org/nobnob/">Javier Esteban</a></li>
	<li>🇫🇷 Français (French (France))  - <a href="https://profiles.wordpress.org/sebastienserre/">Sébastien SERRE</a>, <a href="https://profiles.wordpress.org/drixe/">drixe</a>, <a href="https://profiles.wordpress.org/fxbenard//">FX Bénard</a></li>
	<li>🇮🇹 Italian (Italian) - <a href="https://profiles.wordpress.org/stroopwafel/">Emanuele (stroopwafel)</a></li>
	<li><a href="https://translate.wordpress.org/projects/wp-plugins/true-lazy-analytics">You could be next</a>...</li>
</ul>

== Installation ==

= From your WordPress dashboard =
1. Visit 'Plugins > Add New'
2. Search for 'True Lazy Analytics'
3. Activate True Lazy Analytics from your Plugins page.
4. [Optional] Configure plugin in 'WP Booster > True Lazy Analytics'.
= From WordPress.org =
1. Download True Lazy Analytics.
2. Upload the 'true-lazy-analytics' directory to your '/wp-content/plugins/' directory, using your favorite method (ftp, sftp, scp, etc...)
3. Activate True Lazy Analytics from your Plugins page.
4. [Optional] Configure plugin in 'WP Booster > True Lazy Analytics'.

== Frequently Asked Questions ==

= How it works? =
Our plugin adds the statistics counter code in a special way, so it doesn't interfere with fast page loading. Lazy loading of analytics counters allows you to get high scores. You don't need any programming knowledge. Just add the counter ID in the plugin settings.
You must remove the statistics counter code that was installed previously. Our plugin will automatically add the necessary code to your site. If you do not remove the old counter code, there will be duplicate code on the site.

= Where are the plugin settings? =
The settings are located at the section of the admin panel WP Booster > True Lazy Analytics

= What analytics systems are supported? = 
* Google Analytics
* Microsoft Clarity
* Facebook Pixel
* Hotjar
* Yandex Metrica
* Liveinternet

=Plugin not working=
Js minification plugins (similar to Autooptimaze) may break adding lazy loading script. Disable "Also aggregate embedded JS" in the Autooptimaze plugin settings. And enjoy the True Lazy Analytics plugin!
=LiteSpeed Cache plugin breaking all counter codes on my site=
Enable option "Compatibility with LiteSpeed Cache plugin" on Setting page.

== Screenshots ==
1. Before activating the plugin
2. After activating the plugin
3. Plugin Setting

== Changelog ==
= 2.4.9 =
* Added: Compatibility with WordPress 6.7

= 2.4.8 =
* Added Microsoft Clarity
* Updated Description
* Added: Compatibility with WordPress 6.6

= 2.4.7 =
* Updated Description
* Fixed fixed WordPress Security warning
= 2.4.6 =
* Added: Compatibility with WordPress 6.5
* Fixed bug with PHP notices
= 2.4.5 =
* Added setting 'Ecommerce' for Yandex.Metrica
= 2.4.4 =
* Updated Description
* Changed setting 'using CDN' for Yandex.Metrica
= 2.4.3 =
* Removed tab 'Licence'
= 2.4.2 =
* Fixed version's number bug
= 2.4.1 =
* Fixed version's number bug
= 2.4 =
* Changed setting 'using CDN' for Yandex.Metrica
= 2.3 =
* Added setting 'Timer delay'
= 2.2.18 =
* Fixed bug with PHP notices
= 2.2.17 =
* Changed function tlap_add_analytics_plugin()
= 2.2.16 =
* Changed function tlap_add_analytics_plugin()
= 2.2.15 =
* Fixed bug with liveinternet
= 2.2.14 =
* Added checkbox 'Compatibility with LiteSpeed Cache plugin'
= 2.2.13 =
* Fixed bugs
= 2.2.12 =
* Changed Setting Page
= 2.2.11 =
* Fixed translation
* Added link in sidebar in plugin setting page
= 2.2.10 =
* Fixed bug with Facebook Pixel
= 2.2.9 =
* Added default settings
* Added setting 'using CDN' for Yandex.Metrica
= 2.2.8 =
* Rewrited functions
* Moved functions to functions.php
* Added setting Timer Delay
= 2.2.7 =
* Fixed warning in Setting Page on PHP 7.4 or higher
= 2.2.6 =
* Fixed error in Setting Page on PHP 7.4 or lower
= 2.2.5 =
* Fixed error Trying to access array offset on value of type bool
= 2.2.4 =
* Added postbox in Setting Page
= 2.2.3 =
* Fixed error in Lighthouse Report: Does not use passive listeners to improve scrolling performance
* Updated Description
= 2.2.2 =
* Fixed bug with Yandex Metrica counter status
= 2.2.1 =
* Fixed PHP Notice: Undefined index
* Changed Setting Page
= 2.2.0 =
* Updated Lazy Load script
= 2.1.10 =
* Added Facebook Pixel
* Added Hotjar
= 2.1.9 =
* Changed Setting Page
= 2.1.4 =
* Fixed bugs with WebVisor
= 2.1.3 =
* Added triggerEvent:true in Yandex Metrika
* Changed Setting Page
* Fixed bugs
= 2.1.2 =
* Updated Description
* Fixed bugs
= 2.1.1 =
* Added Yandex Metrika WebVisor
= 2.1.0 =
* Added Yandex Metrika
= 2.0.14 =
* Added Liveinternet stats
= 2.0.12 =
* Updated Description
= 2.0.11 =
* Added banners and icons in wordpress.org
= 2.0.9 =
* Fixed Translations
* Fixed Menu Item
* Added Extra Links
* Fixed Setting Link
= 2.0.8 =
* Updated Description
* Added Screenshot
= 2.0.7 =
* Updated FAQ
* Added Screenshots
= 2.0.6 =
* Fixed function's name "tlap_fill_analytics_id"
= 2.0.5 =
* Fixed bugs
* Settings was moved under "WP Booster" page in the Dashboard
