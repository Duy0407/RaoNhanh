/*! Copyright (c) 2013 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.1.0
 *
 * Requires: 1.2.2+
 */
(function(a){if(typeof define==="function"&&define.amd){define(["jquery"],a);}else{a(jQuery);}}(function(e){var d=["wheel","mousewheel","DOMMouseScroll"];var g="onwheel" in document||document.documentMode>=9?["wheel"]:["mousewheel","DomMouseScroll","MozMousePixelScroll"];var f,a;if(e.event.fixHooks){for(var b=d.length;b;){e.event.fixHooks[d[--b]]=e.event.mouseHooks;}}e.event.special.mousewheel={setup:function(){if(this.addEventListener){for(var h=g.length;h;){this.addEventListener(g[--h],c,false);}}else{this.onmousewheel=c;}},teardown:function(){if(this.removeEventListener){for(var h=g.length;h;){this.removeEventListener(g[--h],c,false);}}else{this.onmousewheel=null;}}};e.fn.extend({mousewheel:function(h){return h?this.bind("mousewheel",h):this.trigger("mousewheel");},unmousewheel:function(h){return this.unbind("mousewheel",h);}});function c(n){var l=n||window.event,k=[].slice.call(arguments,1),o=0,j=0,i=0,h=0,m=0;n=e.event.fix(l);n.type="mousewheel";if(l.wheelDelta){o=l.wheelDelta;}if(l.detail){o=l.detail*-1;}if(l.deltaY){i=l.deltaY*-1;o=i;}if(l.deltaX){j=l.deltaX;o=j*-1;}if(l.wheelDeltaY!==undefined){i=l.wheelDeltaY;}if(l.wheelDeltaX!==undefined){j=l.wheelDeltaX*-1;}h=Math.abs(o);if(!f||h<f){f=h;}m=Math.max(Math.abs(i),Math.abs(j));if(!a||m<a){a=m;}k.unshift(n,Math.floor(o/f),Math.floor(j/a),Math.floor(i/a));return(e.event.dispatch||e.event.handle).apply(this,k);}}));