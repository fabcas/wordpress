/*-----------------------------------------------------------------------------------*/
/*	LOCALSCROLL & SCROLLTO
/*-----------------------------------------------------------------------------------*/
/**
* jQuery.LocalScroll - Animated scrolling navigation, using anchors.
* Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
* Dual licensed under MIT and GPL.
* Date: 3/11/2009
* @author Ariel Flesler
* @version 1.2.7
**/
(function($){var l=location.href.replace(/#.*/,'');var g=jQuery.localScroll=function(a){jQuery('body').localScroll(a)};g.defaults={duration:1e3,axis:'y',event:'click',stop:true,target:window,reset:true};g.hash=function(a){if(location.hash){a=jQuery.extend({},g.defaults,a);a.hash=false;if(a.reset){var e=a.duration;delete a.duration;jQuery(a.target).scrollTo(0,a);a.duration=e}i(0,location,a)}};jQuery.fn.localScroll=function(b){b=jQuery.extend({},g.defaults,b);return b.lazy?this.bind(b.event,function(a){var e=jQuery([a.target,a.target.parentNode]).filter(d)[0];if(e)i(a,e,b)}):this.find('a,area').filter(d).bind(b.event,function(a){i(a,this,b)}).end().end();function d(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,'')==l&&(!b.filter||jQuery(this).is(b.filter))}};function i(a,e,b){var d=e.hash.slice(1),f=document.getElementById(d)||document.getElementsByName(d)[0];if(!f)return;if(a)a.preventDefault();var h=jQuery(b.target);if(b.lock&&h.is(':animated')||b.onBefore&&b.onBefore.call(b,a,f,h)===false)return;if(b.stop)h.stop(true);if(b.hash){var j=f.id==d?'id':'name',k=jQuery('<a> </a>').attr(j,d).css({position:'absolute',top:jQuery(window).scrollTop(),left:jQuery(window).scrollLeft()});f[j]='';jQuery('body').prepend(k);location=e.hash;k.remove();f[j]=d}h.scrollTo(f,b).trigger('notify.serialScroll',[f])}})(jQuery);
/**
 * Copyright (c) 2007-2012 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 1.4.5 BETA
 */
;(function($){var h=jQuery.scrollTo=function(a,b,c){jQuery(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat(jQuery.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return jQuery(window)._scrollable()};jQuery.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||jQuery.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};jQuery.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=jQuery.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=jQuery(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=jQuery(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=jQuery(targ)).offset()}jQuery.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!jQuery(a).is('html,body'))return a[scroll]-jQuery(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);
jQuery(document).ready(function(){ 
    jQuery('.navbar, .smooth').localScroll({
	    hash: true,
	    offset: -60
    });
  });
/*-----------------------------------------------------------------------------------*/
/*	SCROLL NAVIGATION HIGHLIGHT
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
	headerWrapper		= parseInt(jQuery('.navbar').height());
	
	
	var shrinked_header_height = 53;
	var header_height = jQuery('.navbar').height();
    
	offsetTolerance	= -(header_height);
	
	//Detecting user's scroll
	jQuery(window).scroll(function() {
	
		//Check scroll position
		scrollPosition	= parseInt(jQuery(this).scrollTop());
		
		//Move trough each menu and check its position with scroll position then add current class
		jQuery('.navbar ul a[href^="#"]').each(function() {

			thisHref				= jQuery(this).attr('href');
			if( thisHref !== '#' ){
				
				thisTruePosition	= parseInt(jQuery(thisHref).offset().top);
				thisPosition 		= thisTruePosition - headerWrapper - offsetTolerance;
				
				if(scrollPosition >= thisPosition) {
					
					jQuery('.current').removeClass('current');
					jQuery('.navbar ul a[href='+ thisHref +']').parent('li').addClass('current');
					
				}
			
			}
		});
		
		
		//If we're at the bottom of the page, move pointer to the last section
		bottomPage	= parseInt(jQuery(document).height()) - parseInt(jQuery(window).height());
		
		if(scrollPosition == bottomPage || scrollPosition >= bottomPage) {
		
			jQuery('.current').removeClass('current');
			jQuery('.navbar ul a:last').parent('li').addClass('current');
		}
	});
	
});