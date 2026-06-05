<?php
/*
****************************************************************
	Functions
****************************************************************
*/

add_action('wp_footer', 'tlap_add_analytics_plugin', 99);

function tlap_add_analytics_plugin(){
	if ( is_singular() ) {
		if ( get_post_status() === 'publish' ) {
        	echo  tlap_output();
  		}
	}
	else {
        	echo  tlap_output();
    	}
}

function tlap_output () {

	if (empty(tlap_add_google_analytics()) && empty(tlap_add_fbpixel()) && empty(tlap_add_hotjar()) && empty( tlap_add_sber_ads() ) && empty( tlap_add_vk_ads() ) && empty(tlap_add_yametrika())  && empty(tlap_add_liru_counter())) return '<!--True Lazy Analytics (null counters) -->';

	$all_options = get_option( 'tlap_add_analytics_option_main' );

	$timer_delay = !empty($all_options['tlap_timer_delay']) ? $all_options['tlap_timer_delay'] : '5000';

	$datanooptimize = '';

	$datanooptimize = isset($all_options['tlap_lsc_compatibility']) ? $all_options['tlap_lsc_compatibility']  : false; 

	if(isset( $datanooptimize ) &&  1 == $datanooptimize) { $datanooptimize = ' data-no-optimize="1"';}

			$output = '<script'.$datanooptimize.'>'.PHP_EOL;

			$output .= "( function () {

                var loadedTLAnalytics = false,                    

                    timerId;

if ( navigator.userAgent.indexOf( 'YandexMetrika' ) > -1 ) {
                    loadTLAnalytics();
                } else {
                window.addEventListener( 'scroll', loadTLAnalytics, {passive: true} );
                window.addEventListener( 'touchstart', loadTLAnalytics, {passive: true} );
                document.addEventListener( 'mouseenter', loadTLAnalytics, {passive: true} );
                document.addEventListener( 'click', loadTLAnalytics, {passive: true} );
                document.addEventListener( 'DOMContentLoaded', loadFallback, {passive: true} );
		}

                function loadFallback() {
                    timerId = setTimeout( loadTLAnalytics, ".$timer_delay." );
                }

                function loadTLAnalytics( e ) {
                    if ( e && e.type ) {
                        console.log( e.type );
                    } else {
                        console.log( 'DOMContentLoaded' );
                    }

                    if ( loadedTLAnalytics ) {
                        return;
                    }

                    setTimeout(
                        function () {".PHP_EOL;
			$output .= tlap_add_google_analytics();
			$output .= tlap_add_clarity();
			$output .= tlap_add_fbpixel();
			$output .= tlap_add_hotjar();
			$output .= tlap_add_sber_ads();
			$output .= tlap_add_vk_ads();
			$output .= tlap_add_liru_counter();
			$output .= tlap_add_yametrika();
						$output .= "},
                        100
                    );
                    loadedTLAnalytics = true;
                    clearTimeout( timerId );
                    window.removeEventListener( 'scroll', loadTLAnalytics, {passive: true}  );
                    window.removeEventListener( 'touchstart', loadTLAnalytics, {passive: true}  );
                    document.removeEventListener( 'mouseenter', loadTLAnalytics );
                    document.removeEventListener( 'click', loadTLAnalytics );
                    document.removeEventListener( 'DOMContentLoaded', loadFallback );
                }
            } )()".PHP_EOL;
			$output .= '</script>'.PHP_EOL;
	return $output;
 }

//Google Analytics
function tlap_add_google_analytics() {
	$all_options = get_option( 'tlap_add_analytics_option_counters' );
	$g_id = ! empty( $all_options['tlap_analytics_id'] ) ? $all_options['tlap_analytics_id'] : ''; // default: empty string;
	$output ='';
	if(isset( $g_id ) && '' !==  $g_id ) { 
		$output ='
var analyticsId = "'. $g_id . '";
var a = document.createElement("script");
function e() {
    dataLayer.push(arguments);
}
(a.src = "https://www.googletagmanager.com/gtag/js?id=" + analyticsId),
(a.async = !0),
document.getElementsByTagName("head")[0].appendChild(a),
    (window.dataLayer = window.dataLayer || []),
    e("js", new Date()),
    e("config", analyticsId),
    console.log("gtag start");';
	}

	return $output;
}

//Microsoft Clarity
function tlap_add_clarity() {
	$all_options = get_option( 'tlap_add_analytics_option_counters' );
	$clarity_id = ! empty( $all_options['tlap_clarity_id'] ) ? $all_options['tlap_clarity_id'] : ''; // default: empty string;
	$output ='';
	if(isset( $clarity_id ) && '' !==  $clarity_id ) { 
		$output ='(function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "'. $clarity_id . '");console.log("clarity start");';
	}

	return $output;
}

//Facebook Pixel
function tlap_add_fbpixel() {

	$all_options = get_option( 'tlap_add_analytics_option_counters' );

	$fbpixel_id = ! empty( $all_options['tlap_fbpixel_id'] ) ? $all_options['tlap_fbpixel_id']  : ''; // default: empty string;	

	$output ='';

	if(isset( $fbpixel_id ) && '' !==  $fbpixel_id ) { 

		$output ='!function(f,b,e,v,n,t,s)

{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version="2.0";

n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];

s.parentNode.insertBefore(t,s)}(window, document,"script",

"https://connect.facebook.net/en_US/fbevents.js");

fbq("init", "' . $fbpixel_id . '");

fbq("track", "PageView");

console.log("fbpixel start");';		

	}

	return $output;

}

//Hotjar
function tlap_add_hotjar() {

	$all_options = get_option( 'tlap_add_analytics_option_counters' );

	$hotjar_id = ! empty( $all_options['tlap_hotjar_id'] ) ? $all_options['tlap_hotjar_id']  : ''; // default: empty string;	

	$output = '';

	if(isset( $hotjar_id ) && '' !== $hotjar_id ) { 

		$output = '(function(h, o, t, j, a, r) {

    h.hj = h.hj || function() {

        (h.hj.q = h.hj.q || []).push(arguments)

    };

    h._hjSettings = {

        hjid: '. $hotjar_id .',

        hjsv : 6

    };

    a = o.getElementsByTagName("head")[0];

    r = o.createElement("script");

    r.async = 1;

    r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;

    a.appendChild(r);

})(window, document, "https://static.hotjar.com/c/hotjar-", ".js?sv=");

console.log("hotjar start");';

	}

	return $output;

}

function tlap_add_sber_ads() {
    $all_options = get_option( 'tlap_add_analytics_option_counters' );
    $sber_ads_id = ! empty( $all_options['tlap_sber_ads_id'] ) ? $all_options['tlap_sber_ads_id']  : ''; // default: empty string;

    if ( empty( $sber_ads_id ) ) {
        return '';
    }
    ob_start();
    ?>
    <!-- SberAds Counter -->
    (function (w, d, c) {
        (w[c] = w[c] || []).push(function() {
            var options = {
                project: <?php echo esc_attr( $sber_ads_id ); ?>,
            };
            try {
                w.top100Counter = new top100(options);
            } catch(e) { }
        });
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src =
            (d.location.protocol == "https:" ? "https:" : "http:") +
            "//st.top100.ru/top100/top100.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(window, document, "_top100q");
    <!-- END SberAds Counter -->
    <?php
    return ob_get_clean();
}

function tlap_add_vk_ads() {
    $all_options = get_option( 'tlap_add_analytics_option_counters' );
    $vk_ads_id = ! empty( $all_options['tlap_vk_ads_id'] ) ? $all_options['tlap_vk_ads_id']  : ''; // default: empty string;

    if ( empty( $vk_ads_id ) ) {
        return '';
    }
    ob_start();
    ?>
    <!-- VkAds counter -->
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({id: "<?php echo esc_attr( $vk_ads_id ); ?>", type: "pageView", start: (new Date()).getTime()});
    (function (d, w, id) {
        if (d.getElementById(id)) return;
        var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
        ts.src = "https://top-fwz1.mail.ru/js/code.js";
        var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
        if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
    })(document, window, "tmr-code");
    <!-- END VkAds counter -->
    <?php
    return ob_get_clean();
}

//Metrica
function tlap_add_yametrika() {

	$all_options = get_option( 'tlap_add_analytics_option_metrica' );

	$ym_id = $all_options['tlap_yametrika_id'] ? $all_options['tlap_yametrika_id']  : ''; // default: empty string

	

	$webvisor_checkbox = isset($all_options['tlap_yametrika_webvisor']) ? $all_options['tlap_yametrika_webvisor']  : false;

	$webvisor = '';		

	if(isset( $webvisor_checkbox ) &&  1 == $webvisor_checkbox) { $webvisor = 'webvisor:true, ';}

	

	$cdn = 'https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js';

	if(isset( $all_options['tlap_yametrika_cdn'] ) &&  1 == $all_options['tlap_yametrika_cdn'] ) { $cdn = 'https://mc.yandex.ru/metrika/tag.js';}
	
	$ym_ec = '';
	$ym_ecommerce = isset($all_options['tlap_yametrika_ecommerce']) ? $all_options['tlap_yametrika_ecommerce'] : '';	
	if(isset( $ym_ecommerce ) && !empty( $ym_ecommerce )) { $ym_ec = 'ecommerce:"'.$ym_ecommerce.'", ';}

	

	$output ='';

	

	if(isset( $ym_id ) && !empty( $ym_id )) { 

$output = '

var metricaId = ' . $ym_id .';';

$output .= '(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "' . $cdn .'", "ym"); ym(metricaId, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, ' . $webvisor . $ym_ec . 'triggerEvent:true }); console.log("ym start");';		

	}

	return $output;

}



//Liveinternet
function tlap_add_liru_counter() {

	$all_options = get_option( 'tlap_add_analytics_option_counters' );

	$liru_enable = isset($all_options['checkbox_liru']) ? $all_options['checkbox_liru']  : false; // default: false

	$output = '';

	if( 1 == $liru_enable  ) {

$output = '

var liId="licnt601C",mya=document.createElement("a");mya.href="//www.liveinternet.ru/click",mya.target="_blank";var myimg=document.createElement("img");myimg.id=liId,myimg.width="31",myimg.height="31",myimg.style="border:0",myimg.title="LiveInternet",myimg.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7",myimg.alt="";var mydiv=document.createElement("div");mydiv.style="display:none",mydiv.id="div_"+liId,mydiv.appendChild(mya),mya.appendChild(myimg),document.getElementsByTagName("body")[0].appendChild(mydiv),function(e,t){e.getElementById(liId).src="https://counter.yadro.ru/hit?t38.1;r"+escape(e.referrer)+(void 0===t?"":";s"+t.width+"*"+t.height+"*"+(t.colorDepth?t.colorDepth:t.pixelDepth))+";u"+escape(e.URL)+";h"+escape(e.title.substring(0,150))+";"+Math.random()}(document,screen),console.log("liru start");';		

	}

	return $output;

}
