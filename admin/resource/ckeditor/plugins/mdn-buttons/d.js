! function() {
	window.CKEDITOR && window.CKEDITOR.dom || (window.CKEDITOR || (window.CKEDITOR = function() {
		var e = /(^|.*[\\\/])ckeditor\.js(?:\?.*|;.*)?$/i,
			t = {
				timestamp: "E7KD",
				version: "4.4.4",
				revision: "1ba5105",
				rnd: Math.floor(900 * Math.random()) + 100,
				_: {
					pending: [],
					basePathSrcPattern: e
				},
				status: "unloaded",
				basePath: function() {
					var t = window.CKEDITOR_BASEPATH || "";
					if (!t)
						for (var n = document.getElementsByTagName("script"), i = 0; i < n.length; i++) {
							var r = n[i].src.match(e);
							if (r) {
								t = r[1];
								break
							}
						}
					if (-1 == t.indexOf(":/") && "//" != t.slice(0, 2) && (t = 0 === t.indexOf("/") ? location.href.match(/^.*?:\/\/[^\/]*/)[0] + t : location.href.match(/^[^\?]*\/(?:)/)[0] + t), !t) throw 'The CKEditor installation path could not be automatically detected. Please set the global variable "CKEDITOR_BASEPATH" before creating editor instances.';
					return t
				}(),
				getUrl: function(e) {
					return -1 == e.indexOf(":/") && 0 !== e.indexOf("/") && (e = this.basePath + e), this.timestamp && "/" != e.charAt(e.length - 1) && !/[&?]t=/.test(e) && (e += (0 <= e.indexOf("?") ? "&" : "?") + "t=" + this.timestamp), e
				},
				domReady: function() {
					function e() {
						try {
							document.addEventListener ? (document.removeEventListener("DOMContentLoaded", e, !1), t()) : document.attachEvent && "complete" === document.readyState && (document.detachEvent("onreadystatechange", e), t())
						} catch (n) {}
					}

					function t() {
						for (var e; e = n.shift();) e()
					}
					var n = [];
					return function(t) {
						if (n.push(t), "complete" === document.readyState && setTimeout(e, 1), 1 == n.length)
							if (document.addEventListener) document.addEventListener("DOMContentLoaded", e, !1), window.addEventListener("load", e, !1);
							else if (document.attachEvent) {
							document.attachEvent("onreadystatechange", e), window.attachEvent("onload", e), t = !1;
							try {
								t = !window.frameElement
							} catch (i) {}
							if (document.documentElement.doScroll && t) {
								var r = function() {
									try {
										document.documentElement.doScroll("left")
									} catch (t) {
										return void setTimeout(r, 1)
									}
									e()
								};
								r()
							}
						}
					}
				}()
			},
			n = window.CKEDITOR_GETURL;
		if (n) {
			var i = t.getUrl;
			t.getUrl = function(e) {
				return n.call(t, e) || i.call(t, e)
			}
		}
		return t
	}()), CKEDITOR.event || (CKEDITOR.event = function() {}, CKEDITOR.event.implementOn = function(e) {
		var t, n = CKEDITOR.event.prototype;
		for (t in n) void 0 == e[t] && (e[t] = n[t])
	}, CKEDITOR.event.prototype = function() {
		function e(e) {
			var i = t(this);
			return i[e] || (i[e] = new n(e))
		}
		var t = function(e) {
				return e = e.getPrivate && e.getPrivate() || e._ || (e._ = {}), e.events || (e.events = {})
			},
			n = function(e) {
				this.name = e, this.listeners = []
			};
		return n.prototype = {
			getListenerIndex: function(e) {
				for (var t = 0, n = this.listeners; t < n.length; t++)
					if (n[t].fn == e) return t;
				return -1
			}
		}, {
			define: function(t, n) {
				var i = e.call(this, t);
				CKEDITOR.tools.extend(i, n, !0)
			},
			on: function(t, n, i, r, o) {
				function s(e, o, s, l) {
					return e = {
						name: t,
						sender: this,
						editor: e,
						data: o,
						listenerData: r,
						stop: s,
						cancel: l,
						removeListener: a
					}, n.call(i, e) === !1 ? !1 : e.data
				}

				function a() {
					c.removeListener(t, n)
				}
				var l = e.call(this, t);
				if (l.getListenerIndex(n) < 0) {
					l = l.listeners, i || (i = this), isNaN(o) && (o = 10);
					var c = this;
					s.fn = n, s.priority = o;
					for (var u = l.length - 1; u >= 0; u--)
						if (l[u].priority <= o) return l.splice(u + 1, 0, s), {
							removeListener: a
						};
					l.unshift(s)
				}
				return {
					removeListener: a
				}
			},
			once: function() {
				var e = arguments[1];
				return arguments[1] = function(t) {
					return t.removeListener(), e.apply(this, arguments)
				}, this.on.apply(this, arguments)
			},
			capture: function() {
				CKEDITOR.event.useCapture = 1;
				var e = this.on.apply(this, arguments);
				return CKEDITOR.event.useCapture = 0, e
			},
			fire: function() {
				var e = 0,
					n = function() {
						e = 1
					},
					i = 0,
					r = function() {
						i = 1
					};
				return function(o, s, a) {
					var l = t(this)[o],
						o = e,
						c = i;
					if (e = i = 0, l) {
						var u = l.listeners;
						if (u.length)
							for (var d, u = u.slice(0), h = 0; h < u.length; h++) {
								if (l.errorProof) try {
									d = u[h].call(this, a, s, n, r)
								} catch (E) {} else d = u[h].call(this, a, s, n, r);
								if (d === !1 ? i = 1 : "undefined" != typeof d && (s = d), e || i) break
							}
					}
					return s = i ? !1 : "undefined" == typeof s ? !0 : s, e = o, i = c, s
				}
			}(),
			fireOnce: function(e, n, i) {
				return n = this.fire(e, n, i), delete t(this)[e], n
			},
			removeListener: function(e, n) {
				var i = t(this)[e];
				if (i) {
					var r = i.getListenerIndex(n);
					r >= 0 && i.listeners.splice(r, 1)
				}
			},
			removeAllListeners: function() {
				var e, n = t(this);
				for (e in n) delete n[e]
			},
			hasListeners: function(e) {
				return (e = t(this)[e]) && e.listeners.length > 0
			}
		}
	}()), CKEDITOR.editor || (CKEDITOR.editor = function() {
		CKEDITOR._.pending.push([this, arguments]), CKEDITOR.event.call(this)
	}, CKEDITOR.editor.prototype.fire = function(e, t) {
		return e in {
			instanceReady: 1,
			loaded: 1
		} && (this[e] = !0), CKEDITOR.event.prototype.fire.call(this, e, t, this)
	}, CKEDITOR.editor.prototype.fireOnce = function(e, t) {
		return e in {
			instanceReady: 1,
			loaded: 1
		} && (this[e] = !0), CKEDITOR.event.prototype.fireOnce.call(this, e, t, this)
	}, CKEDITOR.event.implementOn(CKEDITOR.editor.prototype)), CKEDITOR.env || (CKEDITOR.env = function() {
		var e = navigator.userAgent.toLowerCase(),
			t = {
				ie: e.indexOf("trident/") > -1,
				webkit: e.indexOf(" applewebkit/") > -1,
				air: e.indexOf(" adobeair/") > -1,
				mac: e.indexOf("macintosh") > -1,
				quirks: "BackCompat" == document.compatMode && (!document.documentMode || document.documentMode < 10),
				mobile: e.indexOf("mobile") > -1,
				iOS: /(ipad|iphone|ipod)/.test(e),
				isCustomDomain: function() {
					if (!this.ie) return !1;
					var e = document.domain,
						t = window.location.hostname;
					return e != t && e != "[" + t + "]"
				},
				secure: "https:" == location.protocol
			};
		t.gecko = "Gecko" == navigator.product && !t.webkit && !t.ie, t.webkit && (e.indexOf("chrome") > -1 ? t.chrome = !0 : t.safari = !0);
		var n = 0;
		if (t.ie && (n = t.quirks || !document.documentMode ? parseFloat(e.match(/msie (\d+)/)[1]) : document.documentMode, t.ie9Compat = 9 == n, t.ie8Compat = 8 == n, t.ie7Compat = 7 == n, t.ie6Compat = 7 > n || t.quirks), t.gecko) {
			var i = e.match(/rv:([\d\.]+)/);
			i && (i = i[1].split("."), n = 1e4 * i[0] + 100 * (i[1] || 0) + 1 * (i[2] || 0))
		}
		return t.air && (n = parseFloat(e.match(/ adobeair\/(\d+)/)[1])), t.webkit && (n = parseFloat(e.match(/ applewebkit\/(\d+)/)[1])), t.version = n, t.isCompatible = t.iOS && n >= 534 || !t.mobile && (t.ie && n > 6 || t.gecko && n >= 2e4 || t.air && n >= 1 || t.webkit && n >= 522 || !1), t.hidpi = window.devicePixelRatio >= 2, t.needsBrFiller = t.gecko || t.webkit || t.ie && n > 10, t.needsNbspFiller = t.ie && 11 > n, t.cssClass = "cke_browser_" + (t.ie ? "ie" : t.gecko ? "gecko" : t.webkit ? "webkit" : "unknown"), t.quirks && (t.cssClass = t.cssClass + " cke_browser_quirks"), t.ie && (t.cssClass = t.cssClass + (" cke_browser_ie" + (t.quirks ? "6 cke_browser_iequirks" : t.version))), t.air && (t.cssClass = t.cssClass + " cke_browser_air"), t.iOS && (t.cssClass = t.cssClass + " cke_browser_ios"), t.hidpi && (t.cssClass = t.cssClass + " cke_hidpi"), t
	}()), "unloaded" == CKEDITOR.status && function() {
		CKEDITOR.event.implementOn(CKEDITOR), CKEDITOR.loadFullCore = function() {
				if ("basic_ready" != CKEDITOR.status) CKEDITOR.loadFullCore._load = 1;
				else {
					delete CKEDITOR.loadFullCore;
					var e = document.createElement("script");
					e.type = "text/javascript", e.src = CKEDITOR.basePath + "ckeditor.js", document.getElementsByTagName("head")[0].appendChild(e)
				}
			}, CKEDITOR.loadFullCoreTimeout = 0, CKEDITOR.add = function(e) {
				(this._.pending || (this._.pending = [])).push(e)
			},
			function() {
				CKEDITOR.domReady(function() {
					var e = CKEDITOR.loadFullCore,
						t = CKEDITOR.loadFullCoreTimeout;
					e && (CKEDITOR.status = "basic_ready", e && e._load ? e() : t && setTimeout(function() {
						CKEDITOR.loadFullCore && CKEDITOR.loadFullCore()
					}, 1e3 * t))
				})
			}(), CKEDITOR.status = "basic_loaded"
	}(), CKEDITOR.dom = {}, function() {
		var e = [],
			t = CKEDITOR.env.gecko ? "-moz-" : CKEDITOR.env.webkit ? "-webkit-" : CKEDITOR.env.ie ? "-ms-" : "",
			n = /&/g,
			i = />/g,
			r = /</g,
			o = /"/g,
			s = /&amp;/g,
			a = /&gt;/g,
			l = /&lt;/g,
			c = /&quot;/g;
		CKEDITOR.on("reset", function() {
			e = []
		}), CKEDITOR.tools = {
			arrayCompare: function(e, t) {
				if (!e && !t) return !0;
				if (!e || !t || e.length != t.length) return !1;
				for (var n = 0; n < e.length; n++)
					if (e[n] != t[n]) return !1;
				return !0
			},
			clone: function(e) {
				var t;
				if (e && e instanceof Array) {
					t = [];
					for (var n = 0; n < e.length; n++) t[n] = CKEDITOR.tools.clone(e[n]);
					return t
				}
				if (null === e || "object" != typeof e || e instanceof String || e instanceof Number || e instanceof Boolean || e instanceof Date || e instanceof RegExp || e.nodeType || e.window === e) return e;
				t = new e.constructor;
				for (n in e) t[n] = CKEDITOR.tools.clone(e[n]);
				return t
			},
			capitalize: function(e, t) {
				return e.charAt(0).toUpperCase() + (t ? e.slice(1) : e.slice(1).toLowerCase())
			},
			extend: function(e) {
				var t, n, i = arguments.length;
				"boolean" == typeof(t = arguments[i - 1]) ? i-- : "boolean" == typeof(t = arguments[i - 2]) && (n = arguments[i - 1], i -= 2);
				for (var r = 1; i > r; r++) {
					var o, s = arguments[r];
					for (o in s)(t === !0 || void 0 == e[o]) && (!n || o in n) && (e[o] = s[o])
				}
				return e
			},
			prototypedCopy: function(e) {
				var t = function() {};
				return t.prototype = e, new t
			},
			copy: function(e) {
				var t, n = {};
				for (t in e) n[t] = e[t];
				return n
			},
			isArray: function(e) {
				return "[object Array]" == Object.prototype.toString.call(e)
			},
			isEmpty: function(e) {
				for (var t in e)
					if (e.hasOwnProperty(t)) return !1;
				return !0
			},
			cssVendorPrefix: function(e, n, i) {
				return i ? t + e + ":" + n + ";" + e + ":" + n : (i = {}, i[e] = n, i[t + e] = n, i)
			},
			cssStyleToDomStyle: function() {
				var e = document.createElement("div").style,
					t = "undefined" != typeof e.cssFloat ? "cssFloat" : "undefined" != typeof e.styleFloat ? "styleFloat" : "float";
				return function(e) {
					return "float" == e ? t : e.replace(/-./g, function(e) {
						return e.substr(1).toUpperCase()
					})
				}
			}(),
			buildStyleHtml: function(e) {
				for (var t, e = [].concat(e), n = [], i = 0; i < e.length; i++)(t = e[i]) && n.push(/@import|[{}]/.test(t) ? "<style>" + t + "</style>" : '<link type="text/css" rel=stylesheet href="' + t + '">');
				return n.join("")
			},
			htmlEncode: function(e) {
				return ("" + e).replace(n, "&amp;").replace(i, "&gt;").replace(r, "&lt;")
			},
			htmlDecode: function(e) {
				return e.replace(s, "&").replace(a, ">").replace(l, "<")
			},
			htmlEncodeAttr: function(e) {
				return e.replace(o, "&quot;").replace(r, "&lt;").replace(i, "&gt;")
			},
			htmlDecodeAttr: function(e) {
				return e.replace(c, '"').replace(l, "<").replace(a, ">")
			},
			getNextNumber: function() {
				var e = 0;
				return function() {
					return ++e
				}
			}(),
			getNextId: function() {
				return "cke_" + this.getNextNumber()
			},
			override: function(e, t) {
				var n = t(e);
				return n.prototype = e.prototype, n
			},
			setTimeout: function(e, t, n, i, r) {
				return r || (r = window), n || (n = r), r.setTimeout(function() {
					i ? e.apply(n, [].concat(i)) : e.apply(n)
				}, t || 0)
			},
			trim: function() {
				var e = /(?:^[ \t\n\r]+)|(?:[ \t\n\r]+$)/g;
				return function(t) {
					return t.replace(e, "")
				}
			}(),
			ltrim: function() {
				var e = /^[ \t\n\r]+/g;
				return function(t) {
					return t.replace(e, "")
				}
			}(),
			rtrim: function() {
				var e = /[ \t\n\r]+$/g;
				return function(t) {
					return t.replace(e, "")
				}
			}(),
			indexOf: function(e, t) {
				if ("function" == typeof t) {
					for (var n = 0, i = e.length; i > n; n++)
						if (t(e[n])) return n
				} else {
					if (e.indexOf) return e.indexOf(t);
					for (n = 0, i = e.length; i > n; n++)
						if (e[n] === t) return n
				}
				return -1
			},
			search: function(e, t) {
				var n = CKEDITOR.tools.indexOf(e, t);
				return n >= 0 ? e[n] : null
			},
			bind: function(e, t) {
				return function() {
					return e.apply(t, arguments)
				}
			},
			createClass: function(e) {
				var t = e.$,
					n = e.base,
					i = e.privates || e._,
					r = e.proto,
					e = e.statics;
				if (!t && (t = function() {
						n && this.base.apply(this, arguments)
					}), i) var o = t,
					t = function() {
						var e, t = this._ || (this._ = {});
						for (e in i) {
							var n = i[e];
							t[e] = "function" == typeof n ? CKEDITOR.tools.bind(n, this) : n
						}
						o.apply(this, arguments)
					};
				return n && (t.prototype = this.prototypedCopy(n.prototype), t.prototype.constructor = t, t.base = n, t.baseProto = n.prototype, t.prototype.base = function() {
					this.base = n.prototype.base, n.apply(this, arguments), this.base = arguments.callee
				}), r && this.extend(t.prototype, r, !0), e && this.extend(t, e, !0), t
			},
			addFunction: function(t, n) {
				return e.push(function() {
					return t.apply(n || this, arguments)
				}) - 1
			},
			removeFunction: function(t) {
				e[t] = null
			},
			callFunction: function(t) {
				var n = e[t];
				return n && n.apply(window, Array.prototype.slice.call(arguments, 1))
			},
			cssLength: function() {
				var e, t = /^-?\d+\.?\d*px$/;
				return function(n) {
					return e = CKEDITOR.tools.trim(n + "") + "px", t.test(e) ? e : n || ""
				}
			}(),
			convertToPx: function() {
				var e;
				return function(t) {
					return e || (e = CKEDITOR.dom.element.createFromHtml('<div style="position:absolute;left:-9999px;top:-9999px;margin:0px;padding:0px;border:0px;"></div>', CKEDITOR.document), CKEDITOR.document.getBody().append(e)), /%$/.test(t) ? t : (e.setStyle("width", t), e.$.clientWidth)
				}
			}(),
			repeat: function(e, t) {
				return Array(t + 1).join(e)
			},
			tryThese: function() {
				for (var e, t = 0, n = arguments.length; n > t; t++) {
					var i = arguments[t];
					try {
						e = i();
						break
					} catch (r) {}
				}
				return e
			},
			genKey: function() {
				return Array.prototype.slice.call(arguments).join("-")
			},
			defer: function(e) {
				return function() {
					var t = arguments,
						n = this;
					window.setTimeout(function() {
						e.apply(n, t)
					}, 0)
				}
			},
			normalizeCssText: function(e, t) {
				var n, i = [],
					r = CKEDITOR.tools.parseCssText(e, !0, t);
				for (n in r) i.push(n + ":" + r[n]);
				return i.sort(), i.length ? i.join(";") + ";" : ""
			},
			convertRgbToHex: function(e) {
				return e.replace(/(?:rgb\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\))/gi, function(e, t, n, i) {
					for (e = [t, n, i], t = 0; 3 > t; t++) e[t] = ("0" + parseInt(e[t], 10).toString(16)).slice(-2);
					return "#" + e.join("")
				})
			},
			parseCssText: function(e, t, n) {
				var i = {};
				return n && (n = new CKEDITOR.dom.element("span"), n.setAttribute("style", e), e = CKEDITOR.tools.convertRgbToHex(n.getAttribute("style") || "")), e && ";" != e ? (e.replace(/&quot;/g, '"').replace(/\s*([^:;\s]+)\s*:\s*([^;]+)\s*(?=;|$)/g, function(e, n, r) {
					t && (n = n.toLowerCase(), "font-family" == n && (r = r.toLowerCase().replace(/["']/g, "").replace(/\s*,\s*/g, ",")), r = CKEDITOR.tools.trim(r)), i[n] = r
				}), i) : i
			},
			writeCssText: function(e, t) {
				var n, i = [];
				for (n in e) i.push(n + ":" + e[n]);
				return t && i.sort(), i.join("; ")
			},
			objectCompare: function(e, t, n) {
				var i;
				if (!e && !t) return !0;
				if (!e || !t) return !1;
				for (i in e)
					if (e[i] != t[i]) return !1;
				if (!n)
					for (i in t)
						if (e[i] != t[i]) return !1;
				return !0
			},
			objectKeys: function(e) {
				var t, n = [];
				for (t in e) n.push(t);
				return n
			},
			convertArrayToObject: function(e, t) {
				var n = {};
				1 == arguments.length && (t = !0);
				for (var i = 0, r = e.length; r > i; ++i) n[e[i]] = t;
				return n
			},
			fixDomain: function() {
				for (var e;;) try {
					e = window.parent.document.domain;
					break
				} catch (t) {
					if (e = e ? e.replace(/.+?(?:\.|$)/, "") : document.domain, !e) break;
					document.domain = e
				}
				return !!e
			},
			eventsBuffer: function(e, t) {
				function n() {
					r = (new Date).getTime(), i = !1, t()
				}
				var i, r = 0;
				return {
					input: function() {
						if (!i) {
							var t = (new Date).getTime() - r;
							e > t ? i = setTimeout(n, e - t) : n()
						}
					},
					reset: function() {
						i && clearTimeout(i), i = r = 0
					}
				}
			},
			enableHtml5Elements: function(e, t) {
				for (var n, i = ["abbr", "article", "aside", "audio", "bdi", "canvas", "data", "datalist", "details", "figcaption", "figure", "footer", "header", "hgroup", "mark", "meter", "nav", "output", "progress", "section", "summary", "time", "video"], r = i.length; r--;) n = e.createElement(i[r]), t && e.appendChild(n)
			},
			checkIfAnyArrayItemMatches: function(e, t) {
				for (var n = 0, i = e.length; i > n; ++n)
					if (e[n].match(t)) return !0;
				return !1
			},
			checkIfAnyObjectPropertyMatches: function(e, t) {
				for (var n in e)
					if (n.match(t)) return !0;
				return !1
			},
			transparentImageData: "data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw=="
		}
	}(), CKEDITOR.dtd = function() {
		var e = CKEDITOR.tools.extend,
			t = function(e, t) {
				for (var n = CKEDITOR.tools.clone(e), i = 1; i < arguments.length; i++) {
					var r, t = arguments[i];
					for (r in t) delete n[r]
				}
				return n
			},
			n = {},
			i = {},
			r = {
				address: 1,
				article: 1,
				aside: 1,
				blockquote: 1,
				details: 1,
				div: 1,
				dl: 1,
				fieldset: 1,
				figure: 1,
				footer: 1,
				form: 1,
				h1: 1,
				h2: 1,
				h3: 1,
				h4: 1,
				h5: 1,
				h6: 1,
				header: 1,
				hgroup: 1,
				hr: 1,
				menu: 1,
				nav: 1,
				ol: 1,
				p: 1,
				pre: 1,
				section: 1,
				table: 1,
				ul: 1
			},
			o = {
				command: 1,
				link: 1,
				meta: 1,
				noscript: 1,
				script: 1,
				style: 1
			},
			s = {},
			a = {
				"#": 1
			},
			l = {
				center: 1,
				dir: 1,
				noframes: 1
			};
		return e(n, {
			a: 1,
			abbr: 1,
			area: 1,
			audio: 1,
			b: 1,
			bdi: 1,
			bdo: 1,
			br: 1,
			button: 1,
			canvas: 1,
			cite: 1,
			code: 1,
			command: 1,
			datalist: 1,
			del: 1,
			dfn: 1,
			em: 1,
			embed: 1,
			i: 1,
			iframe: 1,
			img: 1,
			input: 1,
			ins: 1,
			kbd: 1,
			keygen: 1,
			label: 1,
			map: 1,
			mark: 1,
			meter: 1,
			noscript: 1,
			object: 1,
			output: 1,
			progress: 1,
			q: 1,
			ruby: 1,
			s: 1,
			samp: 1,
			script: 1,
			select: 1,
			small: 1,
			span: 1,
			strong: 1,
			sub: 1,
			sup: 1,
			textarea: 1,
			time: 1,
			u: 1,
			"var": 1,
			video: 1,
			wbr: 1
		}, a, {
			acronym: 1,
			applet: 1,
			basefont: 1,
			big: 1,
			font: 1,
			isindex: 1,
			strike: 1,
			style: 1,
			tt: 1
		}), e(i, r, n, l), t = {
			a: t(n, {
				a: 1,
				button: 1
			}),
			abbr: n,
			address: i,
			area: s,
			article: e({
				style: 1
			}, i),
			aside: e({
				style: 1
			}, i),
			audio: e({
				source: 1,
				track: 1
			}, i),
			b: n,
			base: s,
			bdi: n,
			bdo: n,
			blockquote: i,
			body: i,
			br: s,
			button: t(n, {
				a: 1,
				button: 1
			}),
			canvas: n,
			caption: i,
			cite: n,
			code: n,
			col: s,
			colgroup: {
				col: 1
			},
			command: s,
			datalist: e({
				option: 1
			}, n),
			dd: i,
			del: n,
			details: e({
				summary: 1
			}, i),
			dfn: n,
			div: e({
				style: 1
			}, i),
			dl: {
				dt: 1,
				dd: 1
			},
			dt: i,
			em: n,
			embed: s,
			fieldset: e({
				legend: 1
			}, i),
			figcaption: i,
			figure: e({
				figcaption: 1
			}, i),
			footer: i,
			form: i,
			h1: n,
			h2: n,
			h3: n,
			h4: n,
			h5: n,
			h6: n,
			head: e({
				title: 1,
				base: 1
			}, o),
			header: i,
			hgroup: {
				h1: 1,
				h2: 1,
				h3: 1,
				h4: 1,
				h5: 1,
				h6: 1
			},
			hr: s,
			html: e({
				head: 1,
				body: 1
			}, i, o),
			i: n,
			iframe: a,
			img: s,
			input: s,
			ins: n,
			kbd: n,
			keygen: s,
			label: n,
			legend: n,
			li: i,
			link: s,
			map: i,
			mark: n,
			menu: e({
				li: 1
			}, i),
			meta: s,
			meter: t(n, {
				meter: 1
			}),
			nav: i,
			noscript: e({
				link: 1,
				meta: 1,
				style: 1
			}, n),
			object: e({
				param: 1
			}, n),
			ol: {
				li: 1
			},
			optgroup: {
				option: 1
			},
			option: a,
			output: n,
			p: n,
			param: s,
			pre: n,
			progress: t(n, {
				progress: 1
			}),
			q: n,
			rp: n,
			rt: n,
			ruby: e({
				rp: 1,
				rt: 1
			}, n),
			s: n,
			samp: n,
			script: a,
			section: e({
				style: 1
			}, i),
			select: {
				optgroup: 1,
				option: 1
			},
			small: n,
			source: s,
			span: n,
			strong: n,
			style: a,
			sub: n,
			summary: n,
			sup: n,
			table: {
				caption: 1,
				colgroup: 1,
				thead: 1,
				tfoot: 1,
				tbody: 1,
				tr: 1
			},
			tbody: {
				tr: 1
			},
			td: i,
			textarea: a,
			tfoot: {
				tr: 1
			},
			th: i,
			thead: {
				tr: 1
			},
			time: t(n, {
				time: 1
			}),
			title: a,
			tr: {
				th: 1,
				td: 1
			},
			track: s,
			u: n,
			ul: {
				li: 1
			},
			"var": n,
			video: e({
				source: 1,
				track: 1
			}, i),
			wbr: s,
			acronym: n,
			applet: e({
				param: 1
			}, i),
			basefont: s,
			big: n,
			center: i,
			dialog: s,
			dir: {
				li: 1
			},
			font: n,
			isindex: s,
			noframes: i,
			strike: n,
			tt: n
		}, e(t, {
			$block: e({
				audio: 1,
				dd: 1,
				dt: 1,
				figcaption: 1,
				li: 1,
				video: 1
			}, r, l),
			$blockLimit: {
				article: 1,
				aside: 1,
				audio: 1,
				body: 1,
				caption: 1,
				details: 1,
				dir: 1,
				div: 1,
				dl: 1,
				fieldset: 1,
				figcaption: 1,
				figure: 1,
				footer: 1,
				form: 1,
				header: 1,
				hgroup: 1,
				menu: 1,
				nav: 1,
				ol: 1,
				section: 1,
				table: 1,
				td: 1,
				th: 1,
				tr: 1,
				ul: 1,
				video: 1
			},
			$cdata: {
				script: 1,
				style: 1
			},
			$editable: {
				address: 1,
				article: 1,
				aside: 1,
				blockquote: 1,
				body: 1,
				details: 1,
				div: 1,
				fieldset: 1,
				figcaption: 1,
				footer: 1,
				form: 1,
				h1: 1,
				h2: 1,
				h3: 1,
				h4: 1,
				h5: 1,
				h6: 1,
				header: 1,
				hgroup: 1,
				nav: 1,
				p: 1,
				pre: 1,
				section: 1
			},
			$empty: {
				area: 1,
				base: 1,
				basefont: 1,
				br: 1,
				col: 1,
				command: 1,
				dialog: 1,
				embed: 1,
				hr: 1,
				img: 1,
				input: 1,
				isindex: 1,
				keygen: 1,
				link: 1,
				meta: 1,
				param: 1,
				source: 1,
				track: 1,
				wbr: 1
			},
			$inline: n,
			$list: {
				dl: 1,
				ol: 1,
				ul: 1
			},
			$listItem: {
				dd: 1,
				dt: 1,
				li: 1
			},
			$nonBodyContent: e({
				body: 1,
				head: 1,
				html: 1
			}, t.head),
			$nonEditable: {
				applet: 1,
				audio: 1,
				button: 1,
				embed: 1,
				iframe: 1,
				map: 1,
				object: 1,
				option: 1,
				param: 1,
				script: 1,
				textarea: 1,
				video: 1
			},
			$object: {
				applet: 1,
				audio: 1,
				button: 1,
				hr: 1,
				iframe: 1,
				img: 1,
				input: 1,
				object: 1,
				select: 1,
				table: 1,
				textarea: 1,
				video: 1
			},
			$removeEmpty: {
				abbr: 1,
				acronym: 1,
				b: 1,
				bdi: 1,
				bdo: 1,
				big: 1,
				cite: 1,
				code: 1,
				del: 1,
				dfn: 1,
				em: 1,
				font: 1,
				i: 1,
				ins: 1,
				label: 1,
				kbd: 1,
				mark: 1,
				meter: 1,
				output: 1,
				q: 1,
				ruby: 1,
				s: 1,
				samp: 1,
				small: 1,
				span: 1,
				strike: 1,
				strong: 1,
				sub: 1,
				sup: 1,
				time: 1,
				tt: 1,
				u: 1,
				"var": 1
			},
			$tabIndex: {
				a: 1,
				area: 1,
				button: 1,
				input: 1,
				object: 1,
				select: 1,
				textarea: 1
			},
			$tableContent: {
				caption: 1,
				col: 1,
				colgroup: 1,
				tbody: 1,
				td: 1,
				tfoot: 1,
				th: 1,
				thead: 1,
				tr: 1
			},
			$transparent: {
				a: 1,
				audio: 1,
				canvas: 1,
				del: 1,
				ins: 1,
				map: 1,
				noscript: 1,
				object: 1,
				video: 1
			},
			$intermediate: {
				caption: 1,
				colgroup: 1,
				dd: 1,
				dt: 1,
				figcaption: 1,
				legend: 1,
				li: 1,
				optgroup: 1,
				option: 1,
				rp: 1,
				rt: 1,
				summary: 1,
				tbody: 1,
				td: 1,
				tfoot: 1,
				th: 1,
				thead: 1,
				tr: 1
			}
		}), t
	}(), CKEDITOR.dom.event = function(e) {
		this.$ = e
	}, CKEDITOR.dom.event.prototype = {
		getKey: function() {
			return this.$.keyCode || this.$.which
		},
		getKeystroke: function() {
			var e = this.getKey();
			return (this.$.ctrlKey || this.$.metaKey) && (e += CKEDITOR.CTRL), this.$.shiftKey && (e += CKEDITOR.SHIFT), this.$.altKey && (e += CKEDITOR.ALT), e
		},
		preventDefault: function(e) {
			var t = this.$;
			t.preventDefault ? t.preventDefault() : t.returnValue = !1, e && this.stopPropagation()
		},
		stopPropagation: function() {
			var e = this.$;
			e.stopPropagation ? e.stopPropagation() : e.cancelBubble = !0
		},
		getTarget: function() {
			var e = this.$.target || this.$.srcElement;
			return e ? new CKEDITOR.dom.node(e) : null
		},
		getPhase: function() {
			return this.$.eventPhase || 2
		},
		getPageOffset: function() {
			var e = this.getTarget().getDocument().$;
			return {
				x: this.$.pageX || this.$.clientX + (e.documentElement.scrollLeft || e.body.scrollLeft),
				y: this.$.pageY || this.$.clientY + (e.documentElement.scrollTop || e.body.scrollTop)
			}
		}
	}, CKEDITOR.CTRL = 1114112, CKEDITOR.SHIFT = 2228224, CKEDITOR.ALT = 4456448, CKEDITOR.EVENT_PHASE_CAPTURING = 1, CKEDITOR.EVENT_PHASE_AT_TARGET = 2, CKEDITOR.EVENT_PHASE_BUBBLING = 3, CKEDITOR.dom.domObject = function(e) {
		e && (this.$ = e)
	}, CKEDITOR.dom.domObject.prototype = function() {
		var e = function(e, t) {
			return function(n) {
				"undefined" != typeof CKEDITOR && e.fire(t, new CKEDITOR.dom.event(n))
			}
		};
		return {
			getPrivate: function() {
				var e;
				return (e = this.getCustomData("_")) || this.setCustomData("_", e = {}), e
			},
			on: function(t) {
				var n = this.getCustomData("_cke_nativeListeners");
				return n || (n = {}, this.setCustomData("_cke_nativeListeners", n)), n[t] || (n = n[t] = e(this, t), this.$.addEventListener ? this.$.addEventListener(t, n, !!CKEDITOR.event.useCapture) : this.$.attachEvent && this.$.attachEvent("on" + t, n)), CKEDITOR.event.prototype.on.apply(this, arguments)
			},
			removeListener: function(e) {
				if (CKEDITOR.event.prototype.removeListener.apply(this, arguments), !this.hasListeners(e)) {
					var t = this.getCustomData("_cke_nativeListeners"),
						n = t && t[e];
					n && (this.$.removeEventListener ? this.$.removeEventListener(e, n, !1) : this.$.detachEvent && this.$.detachEvent("on" + e, n), delete t[e])
				}
			},
			removeAllListeners: function() {
				var e, t = this.getCustomData("_cke_nativeListeners");
				for (e in t) {
					var n = t[e];
					this.$.detachEvent ? this.$.detachEvent("on" + e, n) : this.$.removeEventListener && this.$.removeEventListener(e, n, !1), delete t[e]
				}
				CKEDITOR.event.prototype.removeAllListeners.call(this)
			}
		}
	}(), function(e) {
		var t = {};
		CKEDITOR.on("reset", function() {
			t = {}
		}), e.equals = function(e) {
			try {
				return e && e.$ === this.$
			} catch (t) {
				return !1
			}
		}, e.setCustomData = function(e, n) {
			var i = this.getUniqueId();
			return (t[i] || (t[i] = {}))[e] = n, this
		}, e.getCustomData = function(e) {
			var n = this.$["data-cke-expando"];
			return (n = n && t[n]) && e in n ? n[e] : null
		}, e.removeCustomData = function(e) {
			var n, i, r = this.$["data-cke-expando"],
				r = r && t[r];
			return r && (n = r[e], i = e in r, delete r[e]), i ? n : null
		}, e.clearCustomData = function() {
			this.removeAllListeners();
			var e = this.$["data-cke-expando"];
			e && delete t[e]
		}, e.getUniqueId = function() {
			return this.$["data-cke-expando"] || (this.$["data-cke-expando"] = CKEDITOR.tools.getNextNumber())
		}, CKEDITOR.event.implementOn(e)
	}(CKEDITOR.dom.domObject.prototype), CKEDITOR.dom.node = function(e) {
		return e ? new CKEDITOR.dom[e.nodeType == CKEDITOR.NODE_DOCUMENT ? "document" : e.nodeType == CKEDITOR.NODE_ELEMENT ? "element" : e.nodeType == CKEDITOR.NODE_TEXT ? "text" : e.nodeType == CKEDITOR.NODE_COMMENT ? "comment" : e.nodeType == CKEDITOR.NODE_DOCUMENT_FRAGMENT ? "documentFragment" : "domObject"](e) : this
	}, CKEDITOR.dom.node.prototype = new CKEDITOR.dom.domObject, CKEDITOR.NODE_ELEMENT = 1, CKEDITOR.NODE_DOCUMENT = 9, CKEDITOR.NODE_TEXT = 3, CKEDITOR.NODE_COMMENT = 8, CKEDITOR.NODE_DOCUMENT_FRAGMENT = 11, CKEDITOR.POSITION_IDENTICAL = 0, CKEDITOR.POSITION_DISCONNECTED = 1, CKEDITOR.POSITION_FOLLOWING = 2, CKEDITOR.POSITION_PRECEDING = 4, CKEDITOR.POSITION_IS_CONTAINED = 8, CKEDITOR.POSITION_CONTAINS = 16, CKEDITOR.tools.extend(CKEDITOR.dom.node.prototype, {
		appendTo: function(e, t) {
			return e.append(this, t), e
		},
		clone: function(e, t) {
			var n = this.$.cloneNode(e),
				i = function(n) {
					if (n["data-cke-expando"] && (n["data-cke-expando"] = !1), n.nodeType == CKEDITOR.NODE_ELEMENT && (t || n.removeAttribute("id", !1), e))
						for (var n = n.childNodes, r = 0; r < n.length; r++) i(n[r])
				};
			return i(n), new CKEDITOR.dom.node(n)
		},
		hasPrevious: function() {
			return !!this.$.previousSibling
		},
		hasNext: function() {
			return !!this.$.nextSibling
		},
		insertAfter: function(e) {
			return e.$.parentNode.insertBefore(this.$, e.$.nextSibling), e
		},
		insertBefore: function(e) {
			return e.$.parentNode.insertBefore(this.$, e.$), e
		},
		insertBeforeMe: function(e) {
			return this.$.parentNode.insertBefore(e.$, this.$), e
		},
		getAddress: function(e) {
			for (var t = [], n = this.getDocument().$.documentElement, i = this.$; i && i != n;) {
				var r = i.parentNode;
				r && t.unshift(this.getIndex.call({
					$: i
				}, e)), i = r
			}
			return t
		},
		getDocument: function() {
			return new CKEDITOR.dom.document(this.$.ownerDocument || this.$.parentNode.ownerDocument)
		},
		getIndex: function(e) {
			var t, n = this.$,
				i = -1;
			if (!this.$.parentNode) return i;
			do(!e || n == this.$ || n.nodeType != CKEDITOR.NODE_TEXT || !t && n.nodeValue) && (i++, t = n.nodeType == CKEDITOR.NODE_TEXT); while (n = n.previousSibling);
			return i
		},
		getNextSourceNode: function(e, t, n) {
			if (n && !n.call) var i = n,
				n = function(e) {
					return !e.equals(i)
				};
			var r, e = !e && this.getFirst && this.getFirst();
			if (!e) {
				if (this.type == CKEDITOR.NODE_ELEMENT && n && n(this, !0) === !1) return null;
				e = this.getNext()
			}
			for (; !e && (r = (r || this).getParent());) {
				if (n && n(r, !0) === !1) return null;
				e = r.getNext()
			}
			return !e || n && n(e) === !1 ? null : t && t != e.type ? e.getNextSourceNode(!1, t, n) : e
		},
		getPreviousSourceNode: function(e, t, n) {
			if (n && !n.call) var i = n,
				n = function(e) {
					return !e.equals(i)
				};
			var r, e = !e && this.getLast && this.getLast();
			if (!e) {
				if (this.type == CKEDITOR.NODE_ELEMENT && n && n(this, !0) === !1) return null;
				e = this.getPrevious()
			}
			for (; !e && (r = (r || this).getParent());) {
				if (n && n(r, !0) === !1) return null;
				e = r.getPrevious()
			}
			return !e || n && n(e) === !1 ? null : t && e.type != t ? e.getPreviousSourceNode(!1, t, n) : e
		},
		getPrevious: function(e) {
			var t, n = this.$;
			do t = (n = n.previousSibling) && 10 != n.nodeType && new CKEDITOR.dom.node(n); while (t && e && !e(t));
			return t
		},
		getNext: function(e) {
			var t, n = this.$;
			do t = (n = n.nextSibling) && new CKEDITOR.dom.node(n); while (t && e && !e(t));
			return t
		},
		getParent: function(e) {
			var t = this.$.parentNode;
			return t && (t.nodeType == CKEDITOR.NODE_ELEMENT || e && t.nodeType == CKEDITOR.NODE_DOCUMENT_FRAGMENT) ? new CKEDITOR.dom.node(t) : null
		},
		getParents: function(e) {
			var t = this,
				n = [];
			do n[e ? "push" : "unshift"](t); while (t = t.getParent());
			return n
		},
		getCommonAncestor: function(e) {
			if (e.equals(this)) return this;
			if (e.contains && e.contains(this)) return e;
			var t = this.contains ? this : this.getParent();
			do
				if (t.contains(e)) return t;
			while (t = t.getParent());
			return null
		},
		getPosition: function(e) {
			var t = this.$,
				n = e.$;
			if (t.compareDocumentPosition) return t.compareDocumentPosition(n);
			if (t == n) return CKEDITOR.POSITION_IDENTICAL;
			if (this.type == CKEDITOR.NODE_ELEMENT && e.type == CKEDITOR.NODE_ELEMENT) {
				if (t.contains) {
					if (t.contains(n)) return CKEDITOR.POSITION_CONTAINS + CKEDITOR.POSITION_PRECEDING;
					if (n.contains(t)) return CKEDITOR.POSITION_IS_CONTAINED + CKEDITOR.POSITION_FOLLOWING
				}
				if ("sourceIndex" in t) return t.sourceIndex < 0 || n.sourceIndex < 0 ? CKEDITOR.POSITION_DISCONNECTED : t.sourceIndex < n.sourceIndex ? CKEDITOR.POSITION_PRECEDING : CKEDITOR.POSITION_FOLLOWING
			}
			for (var t = this.getAddress(), e = e.getAddress(), n = Math.min(t.length, e.length), i = 0; n - 1 >= i; i++)
				if (t[i] != e[i]) {
					if (n > i) return t[i] < e[i] ? CKEDITOR.POSITION_PRECEDING : CKEDITOR.POSITION_FOLLOWING;
					break
				}
			return t.length < e.length ? CKEDITOR.POSITION_CONTAINS + CKEDITOR.POSITION_PRECEDING : CKEDITOR.POSITION_IS_CONTAINED + CKEDITOR.POSITION_FOLLOWING
		},
		getAscendant: function(e, t) {
			var n, i = this.$;
			for (t || (i = i.parentNode); i;) {
				if (i.nodeName && (n = i.nodeName.toLowerCase(), "string" == typeof e ? n == e : n in e)) return new CKEDITOR.dom.node(i);
				try {
					i = i.parentNode
				} catch (r) {
					i = null
				}
			}
			return null
		},
		hasAscendant: function(e, t) {
			var n = this.$;
			for (t || (n = n.parentNode); n;) {
				if (n.nodeName && n.nodeName.toLowerCase() == e) return !0;
				n = n.parentNode
			}
			return !1
		},
		move: function(e, t) {
			e.append(this.remove(), t)
		},
		remove: function(e) {
			var t = this.$,
				n = t.parentNode;
			if (n) {
				if (e)
					for (; e = t.firstChild;) n.insertBefore(t.removeChild(e), t);
				n.removeChild(t)
			}
			return this
		},
		replace: function(e) {
			this.insertBefore(e), e.remove()
		},
		trim: function() {
			this.ltrim(), this.rtrim()
		},
		ltrim: function() {
			for (var e; this.getFirst && (e = this.getFirst());) {
				if (e.type == CKEDITOR.NODE_TEXT) {
					var t = CKEDITOR.tools.ltrim(e.getText()),
						n = e.getLength();
					if (!t) {
						e.remove();
						continue
					}
					t.length < n && (e.split(n - t.length), this.$.removeChild(this.$.firstChild))
				}
				break
			}
		},
		rtrim: function() {
			for (var e; this.getLast && (e = this.getLast());) {
				if (e.type == CKEDITOR.NODE_TEXT) {
					var t = CKEDITOR.tools.rtrim(e.getText()),
						n = e.getLength();
					if (!t) {
						e.remove();
						continue
					}
					t.length < n && (e.split(t.length), this.$.lastChild.parentNode.removeChild(this.$.lastChild))
				}
				break
			}
			CKEDITOR.env.needsBrFiller && (e = this.$.lastChild) && 1 == e.type && "br" == e.nodeName.toLowerCase() && e.parentNode.removeChild(e)
		},
		isReadOnly: function() {
			var e = this;
			if (this.type != CKEDITOR.NODE_ELEMENT && (e = this.getParent()), e && "undefined" != typeof e.$.isContentEditable) return !(e.$.isContentEditable || e.data("cke-editable"));
			for (; e && !e.data("cke-editable");) {
				if ("false" == e.getAttribute("contentEditable")) return !0;
				if ("true" == e.getAttribute("contentEditable")) break;
				e = e.getParent()
			}
			return !e
		}
	}), CKEDITOR.dom.window = function(e) {
		CKEDITOR.dom.domObject.call(this, e)
	}, CKEDITOR.dom.window.prototype = new CKEDITOR.dom.domObject, CKEDITOR.tools.extend(CKEDITOR.dom.window.prototype, {
		focus: function() {
			this.$.focus()
		},
		getViewPaneSize: function() {
			var e = this.$.document,
				t = "CSS1Compat" == e.compatMode;
			return {
				width: (t ? e.documentElement.clientWidth : e.body.clientWidth) || 0,
				height: (t ? e.documentElement.clientHeight : e.body.clientHeight) || 0
			}
		},
		getScrollPosition: function() {
			var e = this.$;
			return "pageXOffset" in e ? {
				x: e.pageXOffset || 0,
				y: e.pageYOffset || 0
			} : (e = e.document, {
				x: e.documentElement.scrollLeft || e.body.scrollLeft || 0,
				y: e.documentElement.scrollTop || e.body.scrollTop || 0
			})
		},
		getFrame: function() {
			var e = this.$.frameElement;
			return e ? new CKEDITOR.dom.element.get(e) : null
		}
	}), CKEDITOR.dom.document = function(e) {
		CKEDITOR.dom.domObject.call(this, e)
	}, CKEDITOR.dom.document.prototype = new CKEDITOR.dom.domObject, CKEDITOR.tools.extend(CKEDITOR.dom.document.prototype, {
		type: CKEDITOR.NODE_DOCUMENT,
		appendStyleSheet: function(e) {
			if (this.$.createStyleSheet) this.$.createStyleSheet(e);
			else {
				var t = new CKEDITOR.dom.element("link");
				t.setAttributes({
					rel: "stylesheet",
					type: "text/css",
					href: e
				}), this.getHead().append(t)
			}
		},
		appendStyleText: function(e) {
			if (this.$.createStyleSheet) {
				var t = this.$.createStyleSheet("");
				t.cssText = e
			} else {
				var n = new CKEDITOR.dom.element("style", this);
				n.append(new CKEDITOR.dom.text(e, this)), this.getHead().append(n)
			}
			return t || n.$.sheet
		},
		createElement: function(e, t) {
			var n = new CKEDITOR.dom.element(e, this);
			return t && (t.attributes && n.setAttributes(t.attributes), t.styles && n.setStyles(t.styles)), n
		},
		createText: function(e) {
			return new CKEDITOR.dom.text(e, this)
		},
		focus: function() {
			this.getWindow().focus()
		},
		getActive: function() {
			var e;
			try {
				e = this.$.activeElement
			} catch (t) {
				return null
			}
			return new CKEDITOR.dom.element(e)
		},
		getById: function(e) {
			return (e = this.$.getElementById(e)) ? new CKEDITOR.dom.element(e) : null
		},
		getByAddress: function(e, t) {
			for (var n = this.$.documentElement, i = 0; n && i < e.length; i++) {
				var r = e[i];
				if (t)
					for (var o = -1, s = 0; s < n.childNodes.length; s++) {
						var a = n.childNodes[s];
						if ((t !== !0 || 3 != a.nodeType || !a.previousSibling || 3 != a.previousSibling.nodeType) && (o++, o == r)) {
							n = a;
							break
						}
					} else n = n.childNodes[r]
			}
			return n ? new CKEDITOR.dom.node(n) : null
		},
		getElementsByTag: function(e, t) {
			return (!CKEDITOR.env.ie || document.documentMode > 8) && t && (e = t + ":" + e), new CKEDITOR.dom.nodeList(this.$.getElementsByTagName(e))
		},
		getHead: function() {
			var e = this.$.getElementsByTagName("head")[0];
			return e = e ? new CKEDITOR.dom.element(e) : this.getDocumentElement().append(new CKEDITOR.dom.element("head"), !0)
		},
		getBody: function() {
			return new CKEDITOR.dom.element(this.$.body)
		},
		getDocumentElement: function() {
			return new CKEDITOR.dom.element(this.$.documentElement)
		},
		getWindow: function() {
			return new CKEDITOR.dom.window(this.$.parentWindow || this.$.defaultView)
		},
		write: function(e) {
			this.$.open("text/html", "replace"), CKEDITOR.env.ie && (e = e.replace(/(?:^\s*<!DOCTYPE[^>]*?>)|^/i, '$&\n<script data-cke-temp="1">(' + CKEDITOR.tools.fixDomain + ")();</script>")), this.$.write(e), this.$.close()
		},
		find: function(e) {
			return new CKEDITOR.dom.nodeList(this.$.querySelectorAll(e))
		},
		findOne: function(e) {
			return (e = this.$.querySelector(e)) ? new CKEDITOR.dom.element(e) : null
		},
		_getHtml5ShivFrag: function() {
			var e = this.getCustomData("html5ShivFrag");
			return e || (e = this.$.createDocumentFragment(), CKEDITOR.tools.enableHtml5Elements(e, !0), this.setCustomData("html5ShivFrag", e)), e
		}
	}), CKEDITOR.dom.nodeList = function(e) {
		this.$ = e
	}, CKEDITOR.dom.nodeList.prototype = {
		count: function() {
			return this.$.length
		},
		getItem: function(e) {
			return 0 > e || e >= this.$.length ? null : (e = this.$[e]) ? new CKEDITOR.dom.node(e) : null
		}
	}, CKEDITOR.dom.element = function(e, t) {
		"string" == typeof e && (e = (t ? t.$ : document).createElement(e)), CKEDITOR.dom.domObject.call(this, e)
	}, CKEDITOR.dom.element.get = function(e) {
		return (e = "string" == typeof e ? document.getElementById(e) || document.getElementsByName(e)[0] : e) && (e.$ ? e : new CKEDITOR.dom.element(e))
	}, CKEDITOR.dom.element.prototype = new CKEDITOR.dom.node, CKEDITOR.dom.element.createFromHtml = function(e, t) {
		var n = new CKEDITOR.dom.element("div", t);
		return n.setHtml(e), n.getFirst().remove()
	}, CKEDITOR.dom.element.setMarker = function(e, t, n, i) {
		var r = t.getCustomData("list_marker_id") || t.setCustomData("list_marker_id", CKEDITOR.tools.getNextNumber()).getCustomData("list_marker_id"),
			o = t.getCustomData("list_marker_names") || t.setCustomData("list_marker_names", {}).getCustomData("list_marker_names");
		return e[r] = t, o[n] = 1, t.setCustomData(n, i)
	}, CKEDITOR.dom.element.clearAllMarkers = function(e) {
		for (var t in e) CKEDITOR.dom.element.clearMarkers(e, e[t], 1)
	}, CKEDITOR.dom.element.clearMarkers = function(e, t, n) {
		var i, r = t.getCustomData("list_marker_names"),
			o = t.getCustomData("list_marker_id");
		for (i in r) t.removeCustomData(i);
		t.removeCustomData("list_marker_names"), n && (t.removeCustomData("list_marker_id"), delete e[o])
	}, function() {
		function e(e) {
			var t = !0;
			return e.$.id || (e.$.id = "cke_tmp_" + CKEDITOR.tools.getNextNumber(), t = !1),
				function() {
					t || e.removeAttribute("id")
				}
		}

		function t(e, t) {
			return "#" + e.$.id + " " + t.split(/,\s*/).join(", #" + e.$.id + " ")
		}

		function n(e) {
			for (var t = 0, n = 0, r = i[e].length; r > n; n++) t += parseInt(this.getComputedStyle(i[e][n]) || 0, 10) || 0;
			return t
		}
		CKEDITOR.tools.extend(CKEDITOR.dom.element.prototype, {
			type: CKEDITOR.NODE_ELEMENT,
			addClass: function(e) {
				var t = this.$.className;
				return t && (RegExp("(?:^|\\s)" + e + "(?:\\s|$)", "").test(t) || (t += " " + e)), this.$.className = t || e, this
			},
			removeClass: function(e) {
				var t = this.getAttribute("class");
				return t && (e = RegExp("(?:^|\\s+)" + e + "(?=\\s|$)", "i"), e.test(t) && ((t = t.replace(e, "").replace(/^\s+/, "")) ? this.setAttribute("class", t) : this.removeAttribute("class"))), this
			},
			hasClass: function(e) {
				return RegExp("(?:^|\\s+)" + e + "(?=\\s|$)", "").test(this.getAttribute("class"))
			},
			append: function(e, t) {
				return "string" == typeof e && (e = this.getDocument().createElement(e)), t ? this.$.insertBefore(e.$, this.$.firstChild) : this.$.appendChild(e.$), e
			},
			appendHtml: function(e) {
				if (this.$.childNodes.length) {
					var t = new CKEDITOR.dom.element("div", this.getDocument());
					t.setHtml(e), t.moveChildren(this)
				} else this.setHtml(e)
			},
			appendText: function(e) {
				void 0 != this.$.text ? this.$.text = this.$.text + e : this.append(new CKEDITOR.dom.text(e))
			},
			appendBogus: function(e) {
				if (e || CKEDITOR.env.needsBrFiller) {
					for (e = this.getLast(); e && e.type == CKEDITOR.NODE_TEXT && !CKEDITOR.tools.rtrim(e.getText());) e = e.getPrevious();
					e && e.is && e.is("br") || (e = this.getDocument().createElement("br"), CKEDITOR.env.gecko && e.setAttribute("type", "_moz"), this.append(e))
				}
			},
			breakParent: function(e) {
				var t = new CKEDITOR.dom.range(this.getDocument());
				t.setStartAfter(this), t.setEndAfter(e), e = t.extractContents(), t.insertNode(this.remove()), e.insertAfterNode(this)
			},
			contains: CKEDITOR.env.ie || CKEDITOR.env.webkit ? function(e) {
				var t = this.$;
				return e.type != CKEDITOR.NODE_ELEMENT ? t.contains(e.getParent().$) : t != e.$ && t.contains(e.$)
			} : function(e) {
				return !!(16 & this.$.compareDocumentPosition(e.$))
			},
			focus: function() {
				function e() {
					try {
						this.$.focus()
					} catch (e) {}
				}
				return function(t) {
					t ? CKEDITOR.tools.setTimeout(e, 100, this) : e.call(this)
				}
			}(),
			getHtml: function() {
				var e = this.$.innerHTML;
				return CKEDITOR.env.ie ? e.replace(/<\?[^>]*>/g, "") : e
			},
			getOuterHtml: function() {
				if (this.$.outerHTML) return this.$.outerHTML.replace(/<\?[^>]*>/, "");
				var e = this.$.ownerDocument.createElement("div");
				return e.appendChild(this.$.cloneNode(!0)), e.innerHTML
			},
			getClientRect: function() {
				var e = CKEDITOR.tools.extend({}, this.$.getBoundingClientRect());
				return !e.width && (e.width = e.right - e.left), !e.height && (e.height = e.bottom - e.top), e
			},
			setHtml: CKEDITOR.env.ie && CKEDITOR.env.version < 9 ? function(e) {
				try {
					var t = this.$;
					if (this.getParent()) return t.innerHTML = e;
					var n = this.getDocument()._getHtml5ShivFrag();
					return n.appendChild(t), t.innerHTML = e, n.removeChild(t), e
				} catch (i) {
					for (this.$.innerHTML = "", t = new CKEDITOR.dom.element("body", this.getDocument()), t.$.innerHTML = e, t = t.getChildren(); t.count();) this.append(t.getItem(0));
					return e
				}
			} : function(e) {
				return this.$.innerHTML = e
			},
			setText: function() {
				var e = document.createElement("p");
				return e.innerHTML = "x", e = e.textContent,
					function(t) {
						this.$[e ? "textContent" : "innerText"] = t
					}
			}(),
			getAttribute: function() {
				var e = function(e) {
					return this.$.getAttribute(e, 2)
				};
				return CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) ? function(e) {
					switch (e) {
						case "class":
							e = "className";
							break;
						case "http-equiv":
							e = "httpEquiv";
							break;
						case "name":
							return this.$.name;
						case "tabindex":
							return e = this.$.getAttribute(e, 2), 0 !== e && 0 === this.$.tabIndex && (e = null), e;
						case "checked":
							return e = this.$.attributes.getNamedItem(e), (e.specified ? e.nodeValue : this.$.checked) ? "checked" : null;
						case "hspace":
						case "value":
							return this.$[e];
						case "style":
							return this.$.style.cssText;
						case "contenteditable":
						case "contentEditable":
							return this.$.attributes.getNamedItem("contentEditable").specified ? this.$.getAttribute("contentEditable") : null
					}
					return this.$.getAttribute(e, 2)
				} : e
			}(),
			getChildren: function() {
				return new CKEDITOR.dom.nodeList(this.$.childNodes)
			},
			getComputedStyle: CKEDITOR.env.ie ? function(e) {
				return this.$.currentStyle[CKEDITOR.tools.cssStyleToDomStyle(e)]
			} : function(e) {
				var t = this.getWindow().$.getComputedStyle(this.$, null);
				return t ? t.getPropertyValue(e) : ""
			},
			getDtd: function() {
				var e = CKEDITOR.dtd[this.getName()];
				return this.getDtd = function() {
					return e
				}, e
			},
			getElementsByTag: CKEDITOR.dom.document.prototype.getElementsByTag,
			getTabIndex: CKEDITOR.env.ie ? function() {
				var e = this.$.tabIndex;
				return 0 === e && !CKEDITOR.dtd.$tabIndex[this.getName()] && 0 !== parseInt(this.getAttribute("tabindex"), 10) && (e = -1), e
			} : CKEDITOR.env.webkit ? function() {
				var e = this.$.tabIndex;
				return void 0 == e && (e = parseInt(this.getAttribute("tabindex"), 10), isNaN(e) && (e = -1)), e
			} : function() {
				return this.$.tabIndex
			},
			getText: function() {
				return this.$.textContent || this.$.innerText || ""
			},
			getWindow: function() {
				return this.getDocument().getWindow()
			},
			getId: function() {
				return this.$.id || null
			},
			getNameAtt: function() {
				return this.$.name || null
			},
			getName: function() {
				var e = this.$.nodeName.toLowerCase();
				if (CKEDITOR.env.ie && !(document.documentMode > 8)) {
					var t = this.$.scopeName;
					"HTML" != t && (e = t.toLowerCase() + ":" + e)
				}
				return (this.getName = function() {
					return e
				})()
			},
			getValue: function() {
				return this.$.value
			},
			getFirst: function(e) {
				var t = this.$.firstChild;
				return (t = t && new CKEDITOR.dom.node(t)) && e && !e(t) && (t = t.getNext(e)), t
			},
			getLast: function(e) {
				var t = this.$.lastChild;
				return (t = t && new CKEDITOR.dom.node(t)) && e && !e(t) && (t = t.getPrevious(e)), t
			},
			getStyle: function(e) {
				return this.$.style[CKEDITOR.tools.cssStyleToDomStyle(e)]
			},
			is: function() {
				var e = this.getName();
				if ("object" == typeof arguments[0]) return !!arguments[0][e];
				for (var t = 0; t < arguments.length; t++)
					if (arguments[t] == e) return !0;
				return !1
			},
			isEditable: function(e) {
				var t = this.getName();
				return this.isReadOnly() || "none" == this.getComputedStyle("display") || "hidden" == this.getComputedStyle("visibility") || CKEDITOR.dtd.$nonEditable[t] || CKEDITOR.dtd.$empty[t] || this.is("a") && (this.data("cke-saved-name") || this.hasAttribute("name")) && !this.getChildCount() ? !1 : e !== !1 ? (e = CKEDITOR.dtd[t] || CKEDITOR.dtd.span, !(!e || !e["#"])) : !0
			},
			isIdentical: function(e) {
				var t = this.clone(0, 1),
					e = e.clone(0, 1);
				if (t.removeAttributes(["_moz_dirty", "data-cke-expando", "data-cke-saved-href", "data-cke-saved-name"]), e.removeAttributes(["_moz_dirty", "data-cke-expando", "data-cke-saved-href", "data-cke-saved-name"]), t.$.isEqualNode) return t.$.style.cssText = CKEDITOR.tools.normalizeCssText(t.$.style.cssText), e.$.style.cssText = CKEDITOR.tools.normalizeCssText(e.$.style.cssText), t.$.isEqualNode(e.$);
				if (t = t.getOuterHtml(), e = e.getOuterHtml(), CKEDITOR.env.ie && CKEDITOR.env.version < 9 && this.is("a")) {
					var n = this.getParent();
					n.type == CKEDITOR.NODE_ELEMENT && (n = n.clone(), n.setHtml(t), t = n.getHtml(), n.setHtml(e), e = n.getHtml())
				}
				return t == e
			},
			isVisible: function() {
				var e, t, n = (this.$.offsetHeight || this.$.offsetWidth) && "hidden" != this.getComputedStyle("visibility");
				return n && CKEDITOR.env.webkit && (e = this.getWindow(), !e.equals(CKEDITOR.document.getWindow()) && (t = e.$.frameElement) && (n = new CKEDITOR.dom.element(t).isVisible())), !!n
			},
			isEmptyInlineRemoveable: function() {
				if (!CKEDITOR.dtd.$removeEmpty[this.getName()]) return !1;
				for (var e = this.getChildren(), t = 0, n = e.count(); n > t; t++) {
					var i = e.getItem(t);
					if ((i.type != CKEDITOR.NODE_ELEMENT || !i.data("cke-bookmark")) && (i.type == CKEDITOR.NODE_ELEMENT && !i.isEmptyInlineRemoveable() || i.type == CKEDITOR.NODE_TEXT && CKEDITOR.tools.trim(i.getText()))) return !1
				}
				return !0
			},
			hasAttributes: CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) ? function() {
				for (var e = this.$.attributes, t = 0; t < e.length; t++) {
					var n = e[t];
					switch (n.nodeName) {
						case "class":
							if (this.getAttribute("class")) return !0;
						case "data-cke-expando":
							continue;
						default:
							if (n.specified) return !0
					}
				}
				return !1
			} : function() {
				var e = this.$.attributes,
					t = e.length,
					n = {
						"data-cke-expando": 1,
						_moz_dirty: 1
					};
				return t > 0 && (t > 2 || !n[e[0].nodeName] || 2 == t && !n[e[1].nodeName])
			},
			hasAttribute: function() {
				function e(e) {
					var t = this.$.attributes.getNamedItem(e);
					if ("input" == this.getName()) switch (e) {
						case "class":
							return this.$.className.length > 0;
						case "checked":
							return !!this.$.checked;
						case "value":
							return e = this.getAttribute("type"), "checkbox" == e || "radio" == e ? "on" != this.$.value : !!this.$.value
					}
					return t ? t.specified : !1
				}
				return CKEDITOR.env.ie ? CKEDITOR.env.version < 8 ? function(t) {
					return "name" == t ? !!this.$.name : e.call(this, t)
				} : e : function(e) {
					return !!this.$.attributes.getNamedItem(e)
				}
			}(),
			hide: function() {
				this.setStyle("display", "none")
			},
			moveChildren: function(e, t) {
				var n = this.$,
					e = e.$;
				if (n != e) {
					var i;
					if (t)
						for (; i = n.lastChild;) e.insertBefore(n.removeChild(i), e.firstChild);
					else
						for (; i = n.firstChild;) e.appendChild(n.removeChild(i))
				}
			},
			mergeSiblings: function() {
				function e(e, t, n) {
					if (t && t.type == CKEDITOR.NODE_ELEMENT) {
						for (var i = []; t.data("cke-bookmark") || t.isEmptyInlineRemoveable();)
							if (i.push(t), t = n ? t.getNext() : t.getPrevious(), !t || t.type != CKEDITOR.NODE_ELEMENT) return;
						if (e.isIdentical(t)) {
							for (var r = n ? e.getLast() : e.getFirst(); i.length;) i.shift().move(e, !n);
							t.moveChildren(e, !n), t.remove(), r && r.type == CKEDITOR.NODE_ELEMENT && r.mergeSiblings()
						}
					}
				}
				return function(t) {
					(t === !1 || CKEDITOR.dtd.$removeEmpty[this.getName()] || this.is("a")) && (e(this, this.getNext(), !0), e(this, this.getPrevious()))
				}
			}(),
			show: function() {
				this.setStyles({
					display: "",
					visibility: ""
				})
			},
			setAttribute: function() {
				var e = function(e, t) {
					return this.$.setAttribute(e, t), this
				};
				return CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) ? function(t, n) {
					return "class" == t ? this.$.className = n : "style" == t ? this.$.style.cssText = n : "tabindex" == t ? this.$.tabIndex = n : "checked" == t ? this.$.checked = n : "contenteditable" == t ? e.call(this, "contentEditable", n) : e.apply(this, arguments), this
				} : CKEDITOR.env.ie8Compat && CKEDITOR.env.secure ? function(t, n) {
					if ("src" == t && n.match(/^http:\/\//)) try {
						e.apply(this, arguments)
					} catch (i) {} else e.apply(this, arguments);
					return this
				} : e
			}(),
			setAttributes: function(e) {
				for (var t in e) this.setAttribute(t, e[t]);
				return this
			},
			setValue: function(e) {
				return this.$.value = e, this
			},
			removeAttribute: function() {
				var e = function(e) {
					this.$.removeAttribute(e)
				};
				return CKEDITOR.env.ie && (CKEDITOR.env.ie7Compat || CKEDITOR.env.quirks) ? function(e) {
					"class" == e ? e = "className" : "tabindex" == e ? e = "tabIndex" : "contenteditable" == e && (e = "contentEditable"), this.$.removeAttribute(e)
				} : e
			}(),
			removeAttributes: function(e) {
				if (CKEDITOR.tools.isArray(e))
					for (var t = 0; t < e.length; t++) this.removeAttribute(e[t]);
				else
					for (t in e) e.hasOwnProperty(t) && this.removeAttribute(t)
			},
			removeStyle: function(e) {
				var t = this.$.style;
				if (t.removeProperty || "border" != e && "margin" != e && "padding" != e) t.removeProperty ? t.removeProperty(e) : t.removeAttribute(CKEDITOR.tools.cssStyleToDomStyle(e)), this.$.style.cssText || this.removeAttribute("style");
				else {
					var n, i = ["top", "left", "right", "bottom"];
					"border" == e && (n = ["color", "style", "width"]);
					for (var t = [], r = 0; r < i.length; r++)
						if (n)
							for (var o = 0; o < n.length; o++) t.push([e, i[r], n[o]].join("-"));
						else t.push([e, i[r]].join("-"));
					for (e = 0; e < t.length; e++) this.removeStyle(t[e])
				}
			},
			setStyle: function(e, t) {
				return this.$.style[CKEDITOR.tools.cssStyleToDomStyle(e)] = t, this
			},
			setStyles: function(e) {
				for (var t in e) this.setStyle(t, e[t]);
				return this
			},
			setOpacity: function(e) {
				CKEDITOR.env.ie && CKEDITOR.env.version < 9 ? (e = Math.round(100 * e), this.setStyle("filter", e >= 100 ? "" : "progid:DXImageTransform.Microsoft.Alpha(opacity=" + e + ")")) : this.setStyle("opacity", e)
			},
			unselectable: function() {
				if (this.setStyles(CKEDITOR.tools.cssVendorPrefix("user-select", "none")), CKEDITOR.env.ie) {
					this.setAttribute("unselectable", "on");
					for (var e, t = this.getElementsByTag("*"), n = 0, i = t.count(); i > n; n++) e = t.getItem(n), e.setAttribute("unselectable", "on")
				}
			},
			getPositionedAncestor: function() {
				for (var e = this;
					"html" != e.getName();) {
					if ("static" != e.getComputedStyle("position")) return e;
					e = e.getParent()
				}
				return null
			},
			getDocumentPosition: function(e) {
				var t = 0,
					n = 0,
					i = this.getDocument(),
					r = i.getBody(),
					o = "BackCompat" == i.$.compatMode;
				if (document.documentElement.getBoundingClientRect) {
					var s = this.$.getBoundingClientRect(),
						a = i.$.documentElement,
						l = a.clientTop || r.$.clientTop || 0,
						c = a.clientLeft || r.$.clientLeft || 0,
						u = !0;
					CKEDITOR.env.ie && (u = i.getDocumentElement().contains(this), i = i.getBody().contains(this), u = o && i || !o && u), u && (t = s.left + (!o && a.scrollLeft || r.$.scrollLeft), t -= c, n = s.top + (!o && a.scrollTop || r.$.scrollTop), n -= l)
				} else
					for (r = this, i = null; r && "body" != r.getName() && "html" != r.getName();) {
						for (t += r.$.offsetLeft - r.$.scrollLeft, n += r.$.offsetTop - r.$.scrollTop, r.equals(this) || (t += r.$.clientLeft || 0, n += r.$.clientTop || 0); i && !i.equals(r);) t -= i.$.scrollLeft, n -= i.$.scrollTop, i = i.getParent();
						i = r, r = (s = r.$.offsetParent) ? new CKEDITOR.dom.element(s) : null
					}
				return e && (r = this.getWindow(), i = e.getWindow(), !r.equals(i) && r.$.frameElement && (e = new CKEDITOR.dom.element(r.$.frameElement).getDocumentPosition(e), t += e.x, n += e.y)), document.documentElement.getBoundingClientRect || !CKEDITOR.env.gecko || o || (t += this.$.clientLeft ? 1 : 0, n += this.$.clientTop ? 1 : 0), {
					x: t,
					y: n
				}
			},
			scrollIntoView: function(e) {
				var t = this.getParent();
				if (t)
					do
						if ((t.$.clientWidth && t.$.clientWidth < t.$.scrollWidth || t.$.clientHeight && t.$.clientHeight < t.$.scrollHeight) && !t.is("body") && this.scrollIntoParent(t, e, 1), t.is("html")) {
							var n = t.getWindow();
							try {
								var i = n.$.frameElement;
								i && (t = new CKEDITOR.dom.element(i))
							} catch (r) {}
						}
				while (t = t.getParent())
			},
			scrollIntoParent: function(e, t, n) {
				function i(t, n) {
					/body|html/.test(e.getName()) ? e.getWindow().$.scrollBy(t, n) : (e.$.scrollLeft = e.$.scrollLeft + t, e.$.scrollTop = e.$.scrollTop + n)
				}

				function r(e, t) {
					var n = {
						x: 0,
						y: 0
					};
					if (!e.is(u ? "body" : "html")) {
						var i = e.$.getBoundingClientRect();
						n.x = i.left, n.y = i.top
					}
					return i = e.getWindow(), i.equals(t) || (i = r(CKEDITOR.dom.element.get(i.$.frameElement), t), n.x = n.x + i.x, n.y = n.y + i.y), n
				}

				function o(e, t) {
					return parseInt(e.getComputedStyle("margin-" + t) || 0, 10) || 0
				}
				var s, a, l, c;
				!e && (e = this.getWindow()), l = e.getDocument();
				var u = "BackCompat" == l.$.compatMode;
				e instanceof CKEDITOR.dom.window && (e = u ? l.getBody() : l.getDocumentElement()), l = e.getWindow(), a = r(this, l);
				var d = r(e, l),
					h = this.$.offsetHeight;
				s = this.$.offsetWidth;
				var E = e.$.clientHeight,
					f = e.$.clientWidth;
				l = a.x - o(this, "left") - d.x || 0, c = a.y - o(this, "top") - d.y || 0, s = a.x + s + o(this, "right") - (d.x + f) || 0, a = a.y + h + o(this, "bottom") - (d.y + E) || 0, (0 > c || a > 0) && i(0, t === !0 ? c : t === !1 ? a : 0 > c ? c : a), n && (0 > l || s > 0) && i(0 > l ? l : s, 0)
			},
			setState: function(e, t, n) {
				switch (t = t || "cke", e) {
					case CKEDITOR.TRISTATE_ON:
						this.addClass(t + "_on"), this.removeClass(t + "_off"), this.removeClass(t + "_disabled"), n && this.setAttribute("aria-pressed", !0), n && this.removeAttribute("aria-disabled");
						break;
					case CKEDITOR.TRISTATE_DISABLED:
						this.addClass(t + "_disabled"), this.removeClass(t + "_off"), this.removeClass(t + "_on"), n && this.setAttribute("aria-disabled", !0), n && this.removeAttribute("aria-pressed");
						break;
					default:
						this.addClass(t + "_off"), this.removeClass(t + "_on"), this.removeClass(t + "_disabled"), n && this.removeAttribute("aria-pressed"), n && this.removeAttribute("aria-disabled")
				}
			},
			getFrameDocument: function() {
				var e = this.$;
				try {
					e.contentWindow.document
				} catch (t) {
					e.src = e.src
				}
				return e && new CKEDITOR.dom.document(e.contentWindow.document)
			},
			copyAttributes: function(e, t) {
				for (var n = this.$.attributes, t = t || {}, i = 0; i < n.length; i++) {
					var r, o = n[i],
						s = o.nodeName.toLowerCase();
					s in t || ("checked" == s && (r = this.getAttribute(s)) ? e.setAttribute(s, r) : (!CKEDITOR.env.ie || this.hasAttribute(s)) && (r = this.getAttribute(s), null === r && (r = o.nodeValue), e.setAttribute(s, r)))
				}
				"" !== this.$.style.cssText && (e.$.style.cssText = this.$.style.cssText)
			},
			renameNode: function(e) {
				if (this.getName() != e) {
					var t = this.getDocument(),
						e = new CKEDITOR.dom.element(e, t);
					this.copyAttributes(e), this.moveChildren(e), this.getParent() && this.$.parentNode.replaceChild(e.$, this.$), e.$["data-cke-expando"] = this.$["data-cke-expando"], this.$ = e.$, delete this.getName
				}
			},
			getChild: function() {
				function e(e, t) {
					var n = e.childNodes;
					return t >= 0 && t < n.length ? n[t] : void 0
				}
				return function(t) {
					var n = this.$;
					if (t.slice)
						for (; t.length > 0 && n;) n = e(n, t.shift());
					else n = e(n, t);
					return n ? new CKEDITOR.dom.node(n) : null
				}
			}(),
			getChildCount: function() {
				return this.$.childNodes.length
			},
			disableContextMenu: function() {
				this.on("contextmenu", function(e) {
					e.data.getTarget().hasClass("cke_enable_context_menu") || e.data.preventDefault()
				})
			},
			getDirection: function(e) {
				return e ? this.getComputedStyle("direction") || this.getDirection() || this.getParent() && this.getParent().getDirection(1) || this.getDocument().$.dir || "ltr" : this.getStyle("direction") || this.getAttribute("dir")
			},
			data: function(e, t) {
				return e = "data-" + e, void 0 === t ? this.getAttribute(e) : (t === !1 ? this.removeAttribute(e) : this.setAttribute(e, t), null)
			},
			getEditor: function() {
				var e, t, n = CKEDITOR.instances;
				for (e in n)
					if (t = n[e], t.element.equals(this) && t.elementMode != CKEDITOR.ELEMENT_MODE_APPENDTO) return t;
				return null
			},
			find: function(n) {
				var i = e(this),
					n = new CKEDITOR.dom.nodeList(this.$.querySelectorAll(t(this, n)));
				return i(), n
			},
			findOne: function(n) {
				var i = e(this),
					n = this.$.querySelector(t(this, n));
				return i(), n ? new CKEDITOR.dom.element(n) : null
			},
			forEach: function(e, t, n) {
				if (!(n || t && this.type != t)) var i = e(this);
				if (i !== !1)
					for (var n = this.getChildren(), r = 0; r < n.count(); r++) i = n.getItem(r), i.type == CKEDITOR.NODE_ELEMENT ? i.forEach(e, t) : (!t || i.type == t) && e(i)
			}
		});
		var i = {
			width: ["border-left-width", "border-right-width", "padding-left", "padding-right"],
			height: ["border-top-width", "border-bottom-width", "padding-top", "padding-bottom"]
		};
		CKEDITOR.dom.element.prototype.setSize = function(e, t, i) {
			"number" == typeof t && (!i || CKEDITOR.env.ie && CKEDITOR.env.quirks || (t -= n.call(this, e)), this.setStyle(e, t + "px"))
		}, CKEDITOR.dom.element.prototype.getSize = function(e, t) {
			var i = Math.max(this.$["offset" + CKEDITOR.tools.capitalize(e)], this.$["client" + CKEDITOR.tools.capitalize(e)]) || 0;
			return t && (i -= n.call(this, e)), i
		}
	}(), CKEDITOR.dom.documentFragment = function(e) {
		e = e || CKEDITOR.document, this.$ = e.type == CKEDITOR.NODE_DOCUMENT ? e.$.createDocumentFragment() : e
	}, CKEDITOR.tools.extend(CKEDITOR.dom.documentFragment.prototype, CKEDITOR.dom.element.prototype, {
		type: CKEDITOR.NODE_DOCUMENT_FRAGMENT,
		insertAfterNode: function(e) {
			e = e.$, e.parentNode.insertBefore(this.$, e.nextSibling)
		}
	}, !0, {
		append: 1,
		appendBogus: 1,
		getFirst: 1,
		getLast: 1,
		getParent: 1,
		getNext: 1,
		getPrevious: 1,
		appendTo: 1,
		moveChildren: 1,
		insertBefore: 1,
		insertAfterNode: 1,
		replace: 1,
		trim: 1,
		type: 1,
		ltrim: 1,
		rtrim: 1,
		getDocument: 1,
		getChildCount: 1,
		getChild: 1,
		getChildren: 1
	}), function() {
		function e(e, t) {
			var n = this.range;
			if (this._.end) return null;
			if (!this._.start) {
				if (this._.start = 1, n.collapsed) return this.end(), null;
				n.optimize()
			}
			var i, r = n.startContainer;
			i = n.endContainer;
			var o, s = n.startOffset,
				a = n.endOffset,
				l = this.guard,
				c = this.type,
				u = e ? "getPreviousSourceNode" : "getNextSourceNode";
			if (!e && !this._.guardLTR) {
				var d = i.type == CKEDITOR.NODE_ELEMENT ? i : i.getParent(),
					h = i.type == CKEDITOR.NODE_ELEMENT ? i.getChild(a) : i.getNext();
				this._.guardLTR = function(e, t) {
					return !(t && d.equals(e) || h && e.equals(h) || e.type == CKEDITOR.NODE_ELEMENT && t && e.equals(n.root))
				}
			}
			if (e && !this._.guardRTL) {
				var E = r.type == CKEDITOR.NODE_ELEMENT ? r : r.getParent(),
					f = r.type == CKEDITOR.NODE_ELEMENT ? s ? r.getChild(s - 1) : null : r.getPrevious();
				this._.guardRTL = function(e, t) {
					return !(t && E.equals(e) || f && e.equals(f) || e.type == CKEDITOR.NODE_ELEMENT && t && e.equals(n.root))
				}
			}
			var m = e ? this._.guardRTL : this._.guardLTR;
			for (o = l ? function(e, t) {
					return m(e, t) === !1 ? !1 : l(e, t)
				} : m, this.current ? i = this.current[u](!1, c, o) : (e ? i.type == CKEDITOR.NODE_ELEMENT && (i = a > 0 ? i.getChild(a - 1) : o(i, !0) === !1 ? null : i.getPreviousSourceNode(!0, c, o)) : (i = r, i.type != CKEDITOR.NODE_ELEMENT || (i = i.getChild(s)) || (i = o(r, !0) === !1 ? null : r.getNextSourceNode(!0, c, o))), i && o(i) === !1 && (i = null)); i && !this._.end;) {
				if (this.current = i, this.evaluator && this.evaluator(i) === !1) {
					if (t && this.evaluator) return !1
				} else if (!t) return i;
				i = i[u](!1, c, o)
			}
			return this.end(), this.current = null
		}

		function t(t) {
			for (var n, i = null; n = e.call(this, t);) i = n;
			return i
		}

		function n(e) {
			if (c(e)) return !1;
			if (e.type == CKEDITOR.NODE_TEXT) return !0;
			if (e.type == CKEDITOR.NODE_ELEMENT) {
				if (e.is(CKEDITOR.dtd.$inline) || e.is("hr") || "false" == e.getAttribute("contenteditable")) return !0;
				var t;
				if ((t = !CKEDITOR.env.needsBrFiller) && (t = e.is(u))) e: {
					t = 0;
					for (var n = e.getChildCount(); n > t; ++t)
						if (!c(e.getChild(t))) {
							t = !1;
							break e
						}
					t = !0
				}
				if (t) return !0
			}
			return !1
		}
		CKEDITOR.dom.walker = CKEDITOR.tools.createClass({
			$: function(e) {
				this.range = e, this._ = {}
			},
			proto: {
				end: function() {
					this._.end = 1
				},
				next: function() {
					return e.call(this)
				},
				previous: function() {
					return e.call(this, 1)
				},
				checkForward: function() {
					return e.call(this, 0, 1) !== !1
				},
				checkBackward: function() {
					return e.call(this, 1, 1) !== !1
				},
				lastForward: function() {
					return t.call(this)
				},
				lastBackward: function() {
					return t.call(this, 1)
				},
				reset: function() {
					delete this.current, this._ = {}
				}
			}
		});
		var i = {
				block: 1,
				"list-item": 1,
				table: 1,
				"table-row-group": 1,
				"table-header-group": 1,
				"table-footer-group": 1,
				"table-row": 1,
				"table-column-group": 1,
				"table-column": 1,
				"table-cell": 1,
				"table-caption": 1
			},
			r = {
				absolute: 1,
				fixed: 1
			};
		CKEDITOR.dom.element.prototype.isBlockBoundary = function(e) {
			return "none" != this.getComputedStyle("float") || this.getComputedStyle("position") in r || !i[this.getComputedStyle("display")] ? !!(this.is(CKEDITOR.dtd.$block) || e && this.is(e)) : !0
		}, CKEDITOR.dom.walker.blockBoundary = function(e) {
			return function(t) {
				return !(t.type == CKEDITOR.NODE_ELEMENT && t.isBlockBoundary(e))
			}
		}, CKEDITOR.dom.walker.listItemBoundary = function() {
			return this.blockBoundary({
				br: 1
			})
		}, CKEDITOR.dom.walker.bookmark = function(e, t) {
			function n(e) {
				return e && e.getName && "span" == e.getName() && e.data("cke-bookmark")
			}
			return function(i) {
				var r, o;
				return r = i && i.type != CKEDITOR.NODE_ELEMENT && (o = i.getParent()) && n(o), r = e ? r : r || n(i), !!(t ^ r)
			}
		}, CKEDITOR.dom.walker.whitespaces = function(e) {
			return function(t) {
				var n;
				return t && t.type == CKEDITOR.NODE_TEXT && (n = !CKEDITOR.tools.trim(t.getText()) || CKEDITOR.env.webkit && "​" == t.getText()), !!(e ^ n)
			}
		}, CKEDITOR.dom.walker.invisible = function(e) {
			var t = CKEDITOR.dom.walker.whitespaces();
			return function(n) {
				return t(n) ? n = 1 : (n.type == CKEDITOR.NODE_TEXT && (n = n.getParent()), n = !n.$.offsetHeight), !!(e ^ n)
			}
		}, CKEDITOR.dom.walker.nodeType = function(e, t) {
			return function(n) {
				return !!(t ^ n.type == e)
			}
		}, CKEDITOR.dom.walker.bogus = function(e) {
			function t(e) {
				return !s(e) && !a(e)
			}
			return function(n) {
				var i = CKEDITOR.env.needsBrFiller ? n.is && n.is("br") : n.getText && o.test(n.getText());
				return i && (i = n.getParent(), n = n.getNext(t), i = i.isBlockBoundary() && (!n || n.type == CKEDITOR.NODE_ELEMENT && n.isBlockBoundary())), !!(e ^ i)
			}
		}, CKEDITOR.dom.walker.temp = function(e) {
			return function(t) {
				return t.type != CKEDITOR.NODE_ELEMENT && (t = t.getParent()), t = t && t.hasAttribute("data-cke-temp"), !!(e ^ t)
			}
		};
		var o = /^[\t\r\n ]*(?:&nbsp;|\xa0)$/,
			s = CKEDITOR.dom.walker.whitespaces(),
			a = CKEDITOR.dom.walker.bookmark(),
			l = CKEDITOR.dom.walker.temp();
		CKEDITOR.dom.walker.ignored = function(e) {
			return function(t) {
				return t = s(t) || a(t) || l(t), !!(e ^ t)
			}
		};
		var c = CKEDITOR.dom.walker.ignored(),
			u = function(e) {
				var t, n = {};
				for (t in e) CKEDITOR.dtd[t]["#"] && (n[t] = 1);
				return n
			}(CKEDITOR.dtd.$block);
		CKEDITOR.dom.walker.editable = function(e) {
			return function(t) {
				return !!(e ^ n(t))
			}
		}, CKEDITOR.dom.element.prototype.getBogus = function() {
			var e = this;
			do e = e.getPreviousSourceNode(); while (a(e) || s(e) || e.type == CKEDITOR.NODE_ELEMENT && e.is(CKEDITOR.dtd.$inline) && !e.is(CKEDITOR.dtd.$empty));
			return e && (CKEDITOR.env.needsBrFiller ? e.is && e.is("br") : e.getText && o.test(e.getText())) ? e : !1
		}
	}(), CKEDITOR.dom.range = function(e) {
		this.endOffset = this.endContainer = this.startOffset = this.startContainer = null, this.collapsed = !0;
		var t = e instanceof CKEDITOR.dom.document;
		this.document = t ? e : e.getDocument(), this.root = t ? e.getBody() : e
	}, function() {
		function e() {
			var e = !1,
				t = CKEDITOR.dom.walker.whitespaces(),
				n = CKEDITOR.dom.walker.bookmark(!0),
				i = CKEDITOR.dom.walker.bogus();
			return function(r) {
				return n(r) || t(r) ? !0 : i(r) && !e ? e = !0 : r.type == CKEDITOR.NODE_TEXT && (r.hasAscendant("pre") || CKEDITOR.tools.trim(r.getText()).length) || r.type == CKEDITOR.NODE_ELEMENT && !r.is(o) ? !1 : !0
			}
		}

		function t(e) {
			var t = CKEDITOR.dom.walker.whitespaces(),
				n = CKEDITOR.dom.walker.bookmark(1);
			return function(i) {
				return n(i) || t(i) ? !0 : !e && s(i) || i.type == CKEDITOR.NODE_ELEMENT && i.is(CKEDITOR.dtd.$removeEmpty)
			}
		}

		function n(e) {
			return function() {
				var t;
				return this[e ? "getPreviousNode" : "getNextNode"](function(e) {
					return !t && c(e) && (t = e), l(e) && !(s(e) && e.equals(t))
				})
			}
		}
		var i = function(e) {
				e.collapsed = e.startContainer && e.endContainer && e.startContainer.equals(e.endContainer) && e.startOffset == e.endOffset
			},
			r = function(e, t, n, i) {
				e.optimizeBookmark();
				var r, o, s = e.startContainer,
					a = e.endContainer,
					l = e.startOffset,
					c = e.endOffset;
				a.type == CKEDITOR.NODE_TEXT ? a = a.split(c) : a.getChildCount() > 0 && (c >= a.getChildCount() ? (a = a.append(e.document.createText("")), o = !0) : a = a.getChild(c)), s.type == CKEDITOR.NODE_TEXT ? (s.split(l), s.equals(a) && (a = s.getNext())) : l ? l >= s.getChildCount() ? (s = s.append(e.document.createText("")), r = !0) : s = s.getChild(l).getPrevious() : (s = s.append(e.document.createText(""), 1), r = !0);
				var u, d, h, l = s.getParents(),
					c = a.getParents();
				for (u = 0; u < l.length && (d = l[u], h = c[u], d.equals(h)); u++);
				for (var E, f, m, T = n, O = u; O < l.length; O++) {
					for (E = l[O], T && !E.equals(s) && (f = T.append(E.clone())), E = E.getNext(); E && (!E.equals(c[O]) && !E.equals(a));) m = E.getNext(), 2 == t ? T.append(E.clone(!0)) : (E.remove(), 1 == t && T.append(E)), E = m;
					T && (T = f)
				}
				for (T = n, n = u; n < c.length; n++) {
					if (E = c[n], t > 0 && !E.equals(a) && (f = T.append(E.clone())), !l[n] || E.$.parentNode != l[n].$.parentNode)
						for (E = E.getPrevious(); E && (!E.equals(l[n]) && !E.equals(s));) m = E.getPrevious(), 2 == t ? T.$.insertBefore(E.$.cloneNode(!0), T.$.firstChild) : (E.remove(), 1 == t && T.$.insertBefore(E.$, T.$.firstChild)), E = m;
					T && (T = f)
				}
				2 == t ? (d = e.startContainer, d.type == CKEDITOR.NODE_TEXT && (d.$.data = d.$.data + d.$.nextSibling.data, d.$.parentNode.removeChild(d.$.nextSibling)), e = e.endContainer, e.type == CKEDITOR.NODE_TEXT && e.$.nextSibling && (e.$.data = e.$.data + e.$.nextSibling.data, e.$.parentNode.removeChild(e.$.nextSibling))) : (d && h && (s.$.parentNode != d.$.parentNode || a.$.parentNode != h.$.parentNode) && (t = h.getIndex(), r && h.$.parentNode == s.$.parentNode && t--, i && d.type == CKEDITOR.NODE_ELEMENT ? (i = CKEDITOR.dom.element.createFromHtml('<span data-cke-bookmark="1" style="display:none">&nbsp;</span>', e.document), i.insertAfter(d), d.mergeSiblings(!1), e.moveToBookmark({
					startNode: i
				})) : e.setStart(h.getParent(), t)), e.collapse(!0)), r && s.remove(), o && a.$.parentNode && a.remove()
			},
			o = {
				abbr: 1,
				acronym: 1,
				b: 1,
				bdo: 1,
				big: 1,
				cite: 1,
				code: 1,
				del: 1,
				dfn: 1,
				em: 1,
				font: 1,
				i: 1,
				ins: 1,
				label: 1,
				kbd: 1,
				q: 1,
				samp: 1,
				small: 1,
				span: 1,
				strike: 1,
				strong: 1,
				sub: 1,
				sup: 1,
				tt: 1,
				u: 1,
				"var": 1
			},
			s = CKEDITOR.dom.walker.bogus(),
			a = /^[\t\r\n ]*(?:&nbsp;|\xa0)$/,
			l = CKEDITOR.dom.walker.editable(),
			c = CKEDITOR.dom.walker.ignored(!0);
		CKEDITOR.dom.range.prototype = {
			clone: function() {
				var e = new CKEDITOR.dom.range(this.root);
				return e.startContainer = this.startContainer, e.startOffset = this.startOffset, e.endContainer = this.endContainer, e.endOffset = this.endOffset, e.collapsed = this.collapsed, e
			},
			collapse: function(e) {
				e ? (this.endContainer = this.startContainer, this.endOffset = this.startOffset) : (this.startContainer = this.endContainer, this.startOffset = this.endOffset), this.collapsed = !0
			},
			cloneContents: function() {
				var e = new CKEDITOR.dom.documentFragment(this.document);
				return this.collapsed || r(this, 2, e), e
			},
			deleteContents: function(e) {
				this.collapsed || r(this, 0, null, e)
			},
			extractContents: function(e) {
				var t = new CKEDITOR.dom.documentFragment(this.document);
				return this.collapsed || r(this, 1, t, e), t
			},
			createBookmark: function(e) {
				var t, n, i, r, o = this.collapsed;
				return t = this.document.createElement("span"), t.data("cke-bookmark", 1), t.setStyle("display", "none"), t.setHtml("&nbsp;"), e && (i = "cke_bm_" + CKEDITOR.tools.getNextNumber(), t.setAttribute("id", i + (o ? "C" : "S"))), o || (n = t.clone(), n.setHtml("&nbsp;"), e && n.setAttribute("id", i + "E"), r = this.clone(), r.collapse(), r.insertNode(n)), r = this.clone(), r.collapse(!0), r.insertNode(t), n ? (this.setStartAfter(t), this.setEndBefore(n)) : this.moveToPosition(t, CKEDITOR.POSITION_AFTER_END), {
					startNode: e ? i + (o ? "C" : "S") : t,
					endNode: e ? i + "E" : n,
					serializable: e,
					collapsed: o
				}
			},
			createBookmark2: function() {
				function e(e) {
					var t, n = e.container,
						i = e.offset;
					t = n;
					var r = i;
					if (t = t.type != CKEDITOR.NODE_ELEMENT || 0 === r || r == t.getChildCount() ? 0 : t.getChild(r - 1).type == CKEDITOR.NODE_TEXT && t.getChild(r).type == CKEDITOR.NODE_TEXT, t && (n = n.getChild(i - 1), i = n.getLength()), n.type == CKEDITOR.NODE_ELEMENT && i > 1 && (i = n.getChild(i - 1).getIndex(!0) + 1), n.type == CKEDITOR.NODE_TEXT) {
						for (t = n, r = 0;
							(t = t.getPrevious()) && t.type == CKEDITOR.NODE_TEXT;) r += t.getLength();
						i += r
					}
					e.container = n, e.offset = i
				}
				return function(t) {
					var n = this.collapsed,
						i = {
							container: this.startContainer,
							offset: this.startOffset
						},
						r = {
							container: this.endContainer,
							offset: this.endOffset
						};
					return t && (e(i), n || e(r)), {
						start: i.container.getAddress(t),
						end: n ? null : r.container.getAddress(t),
						startOffset: i.offset,
						endOffset: r.offset,
						normalized: t,
						collapsed: n,
						is2: !0
					}
				}
			}(),
			moveToBookmark: function(e) {
				if (e.is2) {
					var t = this.document.getByAddress(e.start, e.normalized),
						n = e.startOffset,
						i = e.end && this.document.getByAddress(e.end, e.normalized),
						e = e.endOffset;
					this.setStart(t, n), i ? this.setEnd(i, e) : this.collapse(!0)
				} else t = (n = e.serializable) ? this.document.getById(e.startNode) : e.startNode, e = n ? this.document.getById(e.endNode) : e.endNode, this.setStartBefore(t), t.remove(), e ? (this.setEndBefore(e), e.remove()) : this.collapse(!0)
			},
			getBoundaryNodes: function() {
				var e, t = this.startContainer,
					n = this.endContainer,
					i = this.startOffset,
					r = this.endOffset;
				if (t.type == CKEDITOR.NODE_ELEMENT)
					if (e = t.getChildCount(), e > i) t = t.getChild(i);
					else if (1 > e) t = t.getPreviousSourceNode();
				else {
					for (t = t.$; t.lastChild;) t = t.lastChild;
					t = new CKEDITOR.dom.node(t), t = t.getNextSourceNode() || t
				}
				if (n.type == CKEDITOR.NODE_ELEMENT)
					if (e = n.getChildCount(), e > r) n = n.getChild(r).getPreviousSourceNode(!0);
					else if (1 > e) n = n.getPreviousSourceNode();
				else {
					for (n = n.$; n.lastChild;) n = n.lastChild;
					n = new CKEDITOR.dom.node(n)
				}
				return t.getPosition(n) & CKEDITOR.POSITION_FOLLOWING && (t = n), {
					startNode: t,
					endNode: n
				}
			},
			getCommonAncestor: function(e, t) {
				var n = this.startContainer,
					i = this.endContainer,
					n = n.equals(i) ? e && n.type == CKEDITOR.NODE_ELEMENT && this.startOffset == this.endOffset - 1 ? n.getChild(this.startOffset) : n : n.getCommonAncestor(i);
				return t && !n.is ? n.getParent() : n
			},
			optimize: function() {
				var e = this.startContainer,
					t = this.startOffset;
				e.type != CKEDITOR.NODE_ELEMENT && (t ? t >= e.getLength() && this.setStartAfter(e) : this.setStartBefore(e)), e = this.endContainer, t = this.endOffset, e.type != CKEDITOR.NODE_ELEMENT && (t ? t >= e.getLength() && this.setEndAfter(e) : this.setEndBefore(e))
			},
			optimizeBookmark: function() {
				var e = this.startContainer,
					t = this.endContainer;
				e.is && e.is("span") && e.data("cke-bookmark") && this.setStartAt(e, CKEDITOR.POSITION_BEFORE_START), t && t.is && t.is("span") && t.data("cke-bookmark") && this.setEndAt(t, CKEDITOR.POSITION_AFTER_END)
			},
			trim: function(e, t) {
				var n = this.startContainer,
					i = this.startOffset,
					r = this.collapsed;
				if ((!e || r) && n && n.type == CKEDITOR.NODE_TEXT) {
					if (i)
						if (i >= n.getLength()) i = n.getIndex() + 1, n = n.getParent();
						else {
							var o = n.split(i),
								i = n.getIndex() + 1,
								n = n.getParent();
							this.startContainer.equals(this.endContainer) ? this.setEnd(o, this.endOffset - this.startOffset) : n.equals(this.endContainer) && (this.endOffset = this.endOffset + 1)
						} else i = n.getIndex(), n = n.getParent();
					if (this.setStart(n, i), r) return void this.collapse(!0)
				}
				n = this.endContainer, i = this.endOffset, t || r || !n || n.type != CKEDITOR.NODE_TEXT || (i ? (i >= n.getLength() || n.split(i), i = n.getIndex() + 1) : i = n.getIndex(), n = n.getParent(), this.setEnd(n, i))
			},
			enlarge: function(e, t) {
				function n(e) {
					return e && e.type == CKEDITOR.NODE_ELEMENT && e.hasAttribute("contenteditable") ? null : e
				}
				var i = RegExp(/[^\s\ufeff]/);
				switch (e) {
					case CKEDITOR.ENLARGE_INLINE:
						var r = 1;
					case CKEDITOR.ENLARGE_ELEMENT:
						if (this.collapsed) break;
						var o, s, a, l, c, u, d, h = this.getCommonAncestor(),
							E = this.root,
							f = !1;
						u = this.startContainer;
						var m = this.startOffset;
						for (u.type == CKEDITOR.NODE_TEXT ? (m && (u = !CKEDITOR.tools.trim(u.substring(0, m)).length && u, f = !!u), u && !(l = u.getPrevious()) && (a = u.getParent())) : (m && (l = u.getChild(m - 1) || u.getLast()), l || (a = u)), a = n(a); a || l;) {
							if (a && !l) {
								if (!c && a.equals(h) && (c = !0), r ? a.isBlockBoundary() : !E.contains(a)) break;
								f && "inline" == a.getComputedStyle("display") || (f = !1, c ? o = a : this.setStartBefore(a)), l = a.getPrevious()
							}
							for (; l;)
								if (u = !1, l.type == CKEDITOR.NODE_COMMENT) l = l.getPrevious();
								else {
									if (l.type == CKEDITOR.NODE_TEXT) d = l.getText(), i.test(d) && (l = null), u = /[\s\ufeff]$/.test(d);
									else if ((l.$.offsetWidth > 0 || t && l.is("br")) && !l.data("cke-bookmark"))
										if (f && CKEDITOR.dtd.$removeEmpty[l.getName()]) {
											if (d = l.getText(), i.test(d)) l = null;
											else
												for (var T, m = l.$.getElementsByTagName("*"), O = 0; T = m[O++];)
													if (!CKEDITOR.dtd.$removeEmpty[T.nodeName.toLowerCase()]) {
														l = null;
														break
													}
											l && (u = !!d.length)
										} else l = null;
									if (u && (f ? c ? o = a : a && this.setStartBefore(a) : f = !0), l) {
										if (u = l.getPrevious(), !a && !u) {
											a = l, l = null;
											break
										}
										l = u
									} else a = null
								}
							a && (a = n(a.getParent()))
						}
						u = this.endContainer, m = this.endOffset, a = l = null, c = f = !1;
						var C = function(e, t) {
							var n = new CKEDITOR.dom.range(E);
							n.setStart(e, t), n.setEndAt(E, CKEDITOR.POSITION_BEFORE_END);
							var r, n = new CKEDITOR.dom.walker(n);
							for (n.guard = function(e) {
									return !(e.type == CKEDITOR.NODE_ELEMENT && e.isBlockBoundary())
								}; r = n.next();) {
								if (r.type != CKEDITOR.NODE_TEXT) return !1;
								if (d = r != e ? r.getText() : r.substring(t), i.test(d)) return !1
							}
							return !0
						};
						for (u.type == CKEDITOR.NODE_TEXT ? CKEDITOR.tools.trim(u.substring(m)).length ? f = !0 : (f = !u.getLength(), m == u.getLength() ? (l = u.getNext()) || (a = u.getParent()) : C(u, m) && (a = u.getParent())) : (l = u.getChild(m)) || (a = u); a || l;) {
							if (a && !l) {
								if (!c && a.equals(h) && (c = !0), r ? a.isBlockBoundary() : !E.contains(a)) break;
								f && "inline" == a.getComputedStyle("display") || (f = !1, c ? s = a : a && this.setEndAfter(a)), l = a.getNext()
							}
							for (; l;) {
								if (u = !1, l.type == CKEDITOR.NODE_TEXT) d = l.getText(), C(l, 0) || (l = null), u = /^[\s\ufeff]/.test(d);
								else if (l.type == CKEDITOR.NODE_ELEMENT) {
									if ((l.$.offsetWidth > 0 || t && l.is("br")) && !l.data("cke-bookmark"))
										if (f && CKEDITOR.dtd.$removeEmpty[l.getName()]) {
											if (d = l.getText(), i.test(d)) l = null;
											else
												for (m = l.$.getElementsByTagName("*"), O = 0; T = m[O++];)
													if (!CKEDITOR.dtd.$removeEmpty[T.nodeName.toLowerCase()]) {
														l = null;
														break
													}
											l && (u = !!d.length)
										} else l = null
								} else u = 1;
								if (u && f && (c ? s = a : this.setEndAfter(a)), l) {
									if (u = l.getNext(), !a && !u) {
										a = l, l = null;
										break
									}
									l = u
								} else a = null
							}
							a && (a = n(a.getParent()))
						}
						o && s && (h = o.contains(s) ? s : o, this.setStartBefore(h), this.setEndAfter(h));
						break;
					case CKEDITOR.ENLARGE_BLOCK_CONTENTS:
					case CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS:
						a = new CKEDITOR.dom.range(this.root), E = this.root, a.setStartAt(E, CKEDITOR.POSITION_AFTER_START), a.setEnd(this.startContainer, this.startOffset), a = new CKEDITOR.dom.walker(a);
						var g, p, D = CKEDITOR.dom.walker.blockBoundary(e == CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS ? {
								br: 1
							} : null),
							I = null,
							R = function(e) {
								if (e.type == CKEDITOR.NODE_ELEMENT && "false" == e.getAttribute("contenteditable"))
									if (I) {
										if (I.equals(e)) return void(I = null)
									} else I = e;
								else if (I) return;
								var t = D(e);
								return t || (g = e), t
							},
							r = function(e) {
								var t = R(e);
								return !t && e.is && e.is("br") && (p = e), t
							};
						if (a.guard = R, a = a.lastBackward(), g = g || E, this.setStartAt(g, !g.is("br") && (!a && this.checkStartOfBlock() || a && g.contains(a)) ? CKEDITOR.POSITION_AFTER_START : CKEDITOR.POSITION_AFTER_END), e == CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS) {
							a = this.clone(), a = new CKEDITOR.dom.walker(a);
							var v = CKEDITOR.dom.walker.whitespaces(),
								K = CKEDITOR.dom.walker.bookmark();
							if (a.evaluator = function(e) {
									return !v(e) && !K(e)
								}, (a = a.previous()) && a.type == CKEDITOR.NODE_ELEMENT && a.is("br")) break
						}
						a = this.clone(), a.collapse(), a.setEndAt(E, CKEDITOR.POSITION_BEFORE_END), a = new CKEDITOR.dom.walker(a), a.guard = e == CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS ? r : R, g = I = p = null, a = a.lastForward(), g = g || E, this.setEndAt(g, !a && this.checkEndOfBlock() || a && g.contains(a) ? CKEDITOR.POSITION_BEFORE_END : CKEDITOR.POSITION_BEFORE_START), p && this.setEndAfter(p)
				}
			},
			shrink: function(e, t, n) {
				if (!this.collapsed) {
					var e = e || CKEDITOR.SHRINK_TEXT,
						i = this.clone(),
						r = this.startContainer,
						o = this.endContainer,
						s = this.startOffset,
						a = this.endOffset,
						l = 1,
						c = 1;
					r && r.type == CKEDITOR.NODE_TEXT && (s ? s >= r.getLength() ? i.setStartAfter(r) : (i.setStartBefore(r), l = 0) : i.setStartBefore(r)), o && o.type == CKEDITOR.NODE_TEXT && (a ? a >= o.getLength() ? i.setEndAfter(o) : (i.setEndAfter(o), c = 0) : i.setEndBefore(o));
					var i = new CKEDITOR.dom.walker(i),
						u = CKEDITOR.dom.walker.bookmark();
					i.evaluator = function(t) {
						return t.type == (e == CKEDITOR.SHRINK_ELEMENT ? CKEDITOR.NODE_ELEMENT : CKEDITOR.NODE_TEXT)
					};
					var d;
					return i.guard = function(t, i) {
						return u(t) ? !0 : e == CKEDITOR.SHRINK_ELEMENT && t.type == CKEDITOR.NODE_TEXT || i && t.equals(d) || n === !1 && t.type == CKEDITOR.NODE_ELEMENT && t.isBlockBoundary() || t.type == CKEDITOR.NODE_ELEMENT && t.hasAttribute("contenteditable") ? !1 : (!i && t.type == CKEDITOR.NODE_ELEMENT && (d = t), !0)
					}, l && (r = i[e == CKEDITOR.SHRINK_ELEMENT ? "lastForward" : "next"]()) && this.setStartAt(r, t ? CKEDITOR.POSITION_AFTER_START : CKEDITOR.POSITION_BEFORE_START), c && (i.reset(), (i = i[e == CKEDITOR.SHRINK_ELEMENT ? "lastBackward" : "previous"]()) && this.setEndAt(i, t ? CKEDITOR.POSITION_BEFORE_END : CKEDITOR.POSITION_AFTER_END)), !(!l && !c)
				}
			},
			insertNode: function(e) {
				this.optimizeBookmark(), this.trim(!1, !0);
				var t = this.startContainer,
					n = t.getChild(this.startOffset);
				n ? e.insertBefore(n) : t.append(e), e.getParent() && e.getParent().equals(this.endContainer) && this.endOffset++, this.setStartBefore(e)
			},
			moveToPosition: function(e, t) {
				this.setStartAt(e, t), this.collapse(!0)
			},
			moveToRange: function(e) {
				this.setStart(e.startContainer, e.startOffset), this.setEnd(e.endContainer, e.endOffset)
			},
			selectNodeContents: function(e) {
				this.setStart(e, 0), this.setEnd(e, e.type == CKEDITOR.NODE_TEXT ? e.getLength() : e.getChildCount())
			},
			setStart: function(e, t) {
				e.type == CKEDITOR.NODE_ELEMENT && CKEDITOR.dtd.$empty[e.getName()] && (t = e.getIndex(), e = e.getParent()), this.startContainer = e, this.startOffset = t, this.endContainer || (this.endContainer = e, this.endOffset = t), i(this)
			},
			setEnd: function(e, t) {
				e.type == CKEDITOR.NODE_ELEMENT && CKEDITOR.dtd.$empty[e.getName()] && (t = e.getIndex() + 1, e = e.getParent()), this.endContainer = e, this.endOffset = t, this.startContainer || (this.startContainer = e, this.startOffset = t), i(this)
			},
			setStartAfter: function(e) {
				this.setStart(e.getParent(), e.getIndex() + 1)
			},
			setStartBefore: function(e) {
				this.setStart(e.getParent(), e.getIndex())
			},
			setEndAfter: function(e) {
				this.setEnd(e.getParent(), e.getIndex() + 1)
			},
			setEndBefore: function(e) {
				this.setEnd(e.getParent(), e.getIndex())
			},
			setStartAt: function(e, t) {
				switch (t) {
					case CKEDITOR.POSITION_AFTER_START:
						this.setStart(e, 0);
						break;
					case CKEDITOR.POSITION_BEFORE_END:
						e.type == CKEDITOR.NODE_TEXT ? this.setStart(e, e.getLength()) : this.setStart(e, e.getChildCount());
						break;
					case CKEDITOR.POSITION_BEFORE_START:
						this.setStartBefore(e);
						break;
					case CKEDITOR.POSITION_AFTER_END:
						this.setStartAfter(e)
				}
				i(this)
			},
			setEndAt: function(e, t) {
				switch (t) {
					case CKEDITOR.POSITION_AFTER_START:
						this.setEnd(e, 0);
						break;
					case CKEDITOR.POSITION_BEFORE_END:
						e.type == CKEDITOR.NODE_TEXT ? this.setEnd(e, e.getLength()) : this.setEnd(e, e.getChildCount());
						break;
					case CKEDITOR.POSITION_BEFORE_START:
						this.setEndBefore(e);
						break;
					case CKEDITOR.POSITION_AFTER_END:
						this.setEndAfter(e)
				}
				i(this)
			},
			fixBlock: function(e, t) {
				var n = this.createBookmark(),
					i = this.document.createElement(t);
				return this.collapse(e), this.enlarge(CKEDITOR.ENLARGE_BLOCK_CONTENTS), this.extractContents().appendTo(i), i.trim(), i.appendBogus(), this.insertNode(i), this.moveToBookmark(n), i
			},
			splitBlock: function(e) {
				var t = new CKEDITOR.dom.elementPath(this.startContainer, this.root),
					n = new CKEDITOR.dom.elementPath(this.endContainer, this.root),
					i = t.block,
					r = n.block,
					o = null;
				return t.blockLimit.equals(n.blockLimit) ? ("br" != e && (i || (i = this.fixBlock(!0, e), r = new CKEDITOR.dom.elementPath(this.endContainer, this.root).block), r || (r = this.fixBlock(!1, e))), e = i && this.checkStartOfBlock(), t = r && this.checkEndOfBlock(), this.deleteContents(), i && i.equals(r) && (t ? (o = new CKEDITOR.dom.elementPath(this.startContainer, this.root), this.moveToPosition(r, CKEDITOR.POSITION_AFTER_END), r = null) : e ? (o = new CKEDITOR.dom.elementPath(this.startContainer, this.root), this.moveToPosition(i, CKEDITOR.POSITION_BEFORE_START), i = null) : (r = this.splitElement(i), i.is("ul", "ol") || i.appendBogus())), {
					previousBlock: i,
					nextBlock: r,
					wasStartOfBlock: e,
					wasEndOfBlock: t,
					elementPath: o
				}) : null
			},
			splitElement: function(e) {
				if (!this.collapsed) return null;
				this.setEndAt(e, CKEDITOR.POSITION_BEFORE_END);
				var t = this.extractContents(),
					n = e.clone(!1);
				return t.appendTo(n), n.insertAfter(e), this.moveToPosition(e, CKEDITOR.POSITION_AFTER_END), n
			},
			removeEmptyBlocksAtEnd: function() {
				function e(e) {
					return function(i) {
						return t(i) || n(i) || i.type == CKEDITOR.NODE_ELEMENT && i.isEmptyInlineRemoveable() || e.is("table") && i.is("caption") ? !1 : !0
					}
				}
				var t = CKEDITOR.dom.walker.whitespaces(),
					n = CKEDITOR.dom.walker.bookmark(!1);
				return function(t) {
					for (var n, i = this.createBookmark(), r = this[t ? "endPath" : "startPath"](), o = r.block || r.blockLimit; o && !o.equals(r.root) && !o.getFirst(e(o));) n = o.getParent(), this[t ? "setEndAt" : "setStartAt"](o, CKEDITOR.POSITION_AFTER_END), o.remove(1), o = n;
					this.moveToBookmark(i)
				}
			}(),
			startPath: function() {
				return new CKEDITOR.dom.elementPath(this.startContainer, this.root)
			},
			endPath: function() {
				return new CKEDITOR.dom.elementPath(this.endContainer, this.root)
			},
			checkBoundaryOfElement: function(e, n) {
				var i = n == CKEDITOR.START,
					r = this.clone();
				return r.collapse(i), r[i ? "setStartAt" : "setEndAt"](e, i ? CKEDITOR.POSITION_AFTER_START : CKEDITOR.POSITION_BEFORE_END), r = new CKEDITOR.dom.walker(r), r.evaluator = t(i), r[i ? "checkBackward" : "checkForward"]()
			},
			checkStartOfBlock: function() {
				var t = this.startContainer,
					n = this.startOffset;
				return CKEDITOR.env.ie && n && t.type == CKEDITOR.NODE_TEXT && (t = CKEDITOR.tools.ltrim(t.substring(0, n)), a.test(t) && this.trim(0, 1)), this.trim(), t = new CKEDITOR.dom.elementPath(this.startContainer, this.root), n = this.clone(), n.collapse(!0), n.setStartAt(t.block || t.blockLimit, CKEDITOR.POSITION_AFTER_START), t = new CKEDITOR.dom.walker(n), t.evaluator = e(), t.checkBackward()
			},
			checkEndOfBlock: function() {
				var t = this.endContainer,
					n = this.endOffset;
				return CKEDITOR.env.ie && t.type == CKEDITOR.NODE_TEXT && (t = CKEDITOR.tools.rtrim(t.substring(n)), a.test(t) && this.trim(1, 0)), this.trim(), t = new CKEDITOR.dom.elementPath(this.endContainer, this.root), n = this.clone(), n.collapse(!1), n.setEndAt(t.block || t.blockLimit, CKEDITOR.POSITION_BEFORE_END), t = new CKEDITOR.dom.walker(n), t.evaluator = e(), t.checkForward()
			},
			getPreviousNode: function(e, t, n) {
				var i = this.clone();
				return i.collapse(1), i.setStartAt(n || this.root, CKEDITOR.POSITION_AFTER_START), n = new CKEDITOR.dom.walker(i), n.evaluator = e, n.guard = t, n.previous()
			},
			getNextNode: function(e, t, n) {
				var i = this.clone();
				return i.collapse(), i.setEndAt(n || this.root, CKEDITOR.POSITION_BEFORE_END), n = new CKEDITOR.dom.walker(i), n.evaluator = e, n.guard = t, n.next()
			},
			checkReadOnly: function() {
				function e(e, t) {
					for (; e;) {
						if (e.type == CKEDITOR.NODE_ELEMENT) {
							if ("false" == e.getAttribute("contentEditable") && !e.data("cke-editable")) return 0;
							if (e.is("html") || "true" == e.getAttribute("contentEditable") && (e.contains(t) || e.equals(t))) break
						}
						e = e.getParent()
					}
					return 1
				}
				return function() {
					var t = this.startContainer,
						n = this.endContainer;
					return !(e(t, n) && e(n, t))
				}
			}(),
			moveToElementEditablePosition: function(e, t) {
				if (e.type == CKEDITOR.NODE_ELEMENT && !e.isEditable(!1)) return this.moveToPosition(e, t ? CKEDITOR.POSITION_AFTER_END : CKEDITOR.POSITION_BEFORE_START), !0;
				for (var n = 0; e;) {
					if (e.type == CKEDITOR.NODE_TEXT) {
						t && this.endContainer && this.checkEndOfBlock() && a.test(e.getText()) ? this.moveToPosition(e, CKEDITOR.POSITION_BEFORE_START) : this.moveToPosition(e, t ? CKEDITOR.POSITION_AFTER_END : CKEDITOR.POSITION_BEFORE_START), n = 1;
						break
					}
					if (e.type == CKEDITOR.NODE_ELEMENT)
						if (e.isEditable()) this.moveToPosition(e, t ? CKEDITOR.POSITION_BEFORE_END : CKEDITOR.POSITION_AFTER_START), n = 1;
						else if (t && e.is("br") && this.endContainer && this.checkEndOfBlock()) this.moveToPosition(e, CKEDITOR.POSITION_BEFORE_START);
					else if ("false" == e.getAttribute("contenteditable") && e.is(CKEDITOR.dtd.$block)) return this.setStartBefore(e), this.setEndAfter(e), !0;
					var i = e,
						r = n,
						o = void 0;
					i.type == CKEDITOR.NODE_ELEMENT && i.isEditable(!1) && (o = i[t ? "getLast" : "getFirst"](c)), !r && !o && (o = i[t ? "getPrevious" : "getNext"](c)), e = o
				}
				return !!n
			},
			moveToClosestEditablePosition: function(e, t) {
				var n, i = new CKEDITOR.dom.range(this.root),
					r = 0,
					o = [CKEDITOR.POSITION_AFTER_END, CKEDITOR.POSITION_BEFORE_START];
				return i.moveToPosition(e, o[t ? 0 : 1]), e.is(CKEDITOR.dtd.$block) ? (n = i[t ? "getNextEditableNode" : "getPreviousEditableNode"]()) && (r = 1, n.type == CKEDITOR.NODE_ELEMENT && n.is(CKEDITOR.dtd.$block) && "false" == n.getAttribute("contenteditable") ? (i.setStartAt(n, CKEDITOR.POSITION_BEFORE_START), i.setEndAt(n, CKEDITOR.POSITION_AFTER_END)) : i.moveToPosition(n, o[t ? 1 : 0])) : r = 1, r && this.moveToRange(i), !!r
			},
			moveToElementEditStart: function(e) {
				return this.moveToElementEditablePosition(e)
			},
			moveToElementEditEnd: function(e) {
				return this.moveToElementEditablePosition(e, !0)
			},
			getEnclosedNode: function() {
				var e = this.clone();
				if (e.optimize(), e.startContainer.type != CKEDITOR.NODE_ELEMENT || e.endContainer.type != CKEDITOR.NODE_ELEMENT) return null;
				var e = new CKEDITOR.dom.walker(e),
					t = CKEDITOR.dom.walker.bookmark(!1, !0),
					n = CKEDITOR.dom.walker.whitespaces(!0);
				e.evaluator = function(e) {
					return n(e) && t(e)
				};
				var i = e.next();
				return e.reset(), i && i.equals(e.previous()) ? i : null
			},
			getTouchedStartNode: function() {
				var e = this.startContainer;
				return this.collapsed || e.type != CKEDITOR.NODE_ELEMENT ? e : e.getChild(this.startOffset) || e
			},
			getTouchedEndNode: function() {
				var e = this.endContainer;
				return this.collapsed || e.type != CKEDITOR.NODE_ELEMENT ? e : e.getChild(this.endOffset - 1) || e
			},
			getNextEditableNode: n(),
			getPreviousEditableNode: n(1),
			scrollIntoView: function() {
				var e, t, n, i = new CKEDITOR.dom.element.createFromHtml("<span>&nbsp;</span>", this.document),
					r = this.clone();
				r.optimize(), (n = r.startContainer.type == CKEDITOR.NODE_TEXT) ? (t = r.startContainer.getText(), e = r.startContainer.split(r.startOffset), i.insertAfter(r.startContainer)) : r.insertNode(i), i.scrollIntoView(), n && (r.startContainer.setText(t), e.remove()), i.remove()
			}
		}
	}(), CKEDITOR.POSITION_AFTER_START = 1, CKEDITOR.POSITION_BEFORE_END = 2, CKEDITOR.POSITION_BEFORE_START = 3, CKEDITOR.POSITION_AFTER_END = 4, CKEDITOR.ENLARGE_ELEMENT = 1, CKEDITOR.ENLARGE_BLOCK_CONTENTS = 2, CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS = 3, CKEDITOR.ENLARGE_INLINE = 4, CKEDITOR.START = 1, CKEDITOR.END = 2, CKEDITOR.SHRINK_ELEMENT = 1, CKEDITOR.SHRINK_TEXT = 2, function() {
		function e(e) {
			arguments.length < 1 || (this.range = e, this.forceBrBreak = 0, this.enlargeBr = 1, this.enforceRealBlocks = 0, this._ || (this._ = {}))
		}

		function t(e, t, n) {
			for (e = e.getNextSourceNode(t, null, n); !s(e);) e = e.getNextSourceNode(t, null, n);
			return e
		}

		function n(e) {
			var t = [];
			return e.forEach(function(e) {
				return "true" == e.getAttribute("contenteditable") ? (t.push(e), !1) : void 0
			}, CKEDITOR.NODE_ELEMENT, !0), t
		}

		function i(e, t, r, o) {
			e: {
				void 0 == o && (o = n(r));
				for (var s; s = o.shift();)
					if (s.getDtd().p) {
						o = {
							element: s,
							remaining: o
						};
						break e
					}
				o = null
			}
			return o ? (s = CKEDITOR.filter.instances[o.element.data("cke-filter")]) && !s.check(t) ? i(e, t, r, o.remaining) : (t = new CKEDITOR.dom.range(o.element), t.selectNodeContents(o.element), t = t.createIterator(), t.enlargeBr = e.enlargeBr, t.enforceRealBlocks = e.enforceRealBlocks, t.activeFilter = t.filter = s, e._.nestedEditable = {
				element: o.element,
				container: r,
				remaining: o.remaining,
				iterator: t
			}, 1) : 0
		}

		function r(e, t, n) {
			return t ? (e = e.clone(), e.collapse(!n), e.checkBoundaryOfElement(t, n ? CKEDITOR.START : CKEDITOR.END)) : !1
		}
		var o = /^[\r\n\t ]+$/,
			s = CKEDITOR.dom.walker.bookmark(!1, !0),
			a = CKEDITOR.dom.walker.whitespaces(!0),
			l = function(e) {
				return s(e) && a(e)
			},
			c = {
				dd: 1,
				dt: 1,
				li: 1
			};
		e.prototype = {
			getNextParagraph: function(e) {
				var n, a, u, d, h, e = e || "p";
				if (this._.nestedEditable) {
					if (n = this._.nestedEditable.iterator.getNextParagraph(e)) return this.activeFilter = this._.nestedEditable.iterator.activeFilter, n;
					if (this.activeFilter = this.filter, i(this, e, this._.nestedEditable.container, this._.nestedEditable.remaining)) return this.activeFilter = this._.nestedEditable.iterator.activeFilter, this._.nestedEditable.iterator.getNextParagraph(e);
					this._.nestedEditable = null
				}
				if (!this.range.root.getDtd()[e]) return null;
				if (!this._.started) {
					var E = this.range.clone();
					a = E.startPath();
					var f = E.endPath(),
						m = !E.collapsed && r(E, a.block),
						T = !E.collapsed && r(E, f.block, 1);
					E.shrink(CKEDITOR.SHRINK_ELEMENT, !0), m && E.setStartAt(a.block, CKEDITOR.POSITION_BEFORE_END), T && E.setEndAt(f.block, CKEDITOR.POSITION_AFTER_START), a = E.endContainer.hasAscendant("pre", !0) || E.startContainer.hasAscendant("pre", !0), E.enlarge(this.forceBrBreak && !a || !this.enlargeBr ? CKEDITOR.ENLARGE_LIST_ITEM_CONTENTS : CKEDITOR.ENLARGE_BLOCK_CONTENTS), E.collapsed || (a = new CKEDITOR.dom.walker(E.clone()), f = CKEDITOR.dom.walker.bookmark(!0, !0), a.evaluator = f, this._.nextNode = a.next(), a = new CKEDITOR.dom.walker(E.clone()), a.evaluator = f, a = a.previous(), this._.lastNode = a.getNextSourceNode(!0), this._.lastNode && this._.lastNode.type == CKEDITOR.NODE_TEXT && !CKEDITOR.tools.trim(this._.lastNode.getText()) && this._.lastNode.getParent().isBlockBoundary() && (f = this.range.clone(), f.moveToPosition(this._.lastNode, CKEDITOR.POSITION_AFTER_END), f.checkEndOfBlock() && (f = new CKEDITOR.dom.elementPath(f.endContainer, f.root), this._.lastNode = (f.block || f.blockLimit).getNextSourceNode(!0))), this._.lastNode && E.root.contains(this._.lastNode) || (this._.lastNode = this._.docEndMarker = E.document.createText(""), this._.lastNode.insertAfter(a)), E = null), this._.started = 1, a = E
				}
				for (f = this._.nextNode, E = this._.lastNode, this._.nextNode = null; f;) {
					var m = 0,
						T = f.hasAscendant("pre"),
						O = f.type != CKEDITOR.NODE_ELEMENT,
						C = 0;
					if (O) f.type == CKEDITOR.NODE_TEXT && o.test(f.getText()) && (O = 0);
					else {
						var g = f.getName();
						if (CKEDITOR.dtd.$block[g] && "false" == f.getAttribute("contenteditable")) {
							n = f, i(this, e, n);
							break
						}
						if (f.isBlockBoundary(this.forceBrBreak && !T && {
								br: 1
							})) {
							if ("br" == g) O = 1;
							else if (!a && !f.getChildCount() && "hr" != g) {
								n = f, u = f.equals(E);
								break
							}
							a && (a.setEndAt(f, CKEDITOR.POSITION_BEFORE_START), "br" != g && (this._.nextNode = f)), m = 1
						} else {
							if (f.getFirst()) {
								a || (a = this.range.clone(), a.setStartAt(f, CKEDITOR.POSITION_BEFORE_START)), f = f.getFirst();
								continue
							}
							O = 1
						}
					}
					if (O && !a && (a = this.range.clone(), a.setStartAt(f, CKEDITOR.POSITION_BEFORE_START)), u = (!m || O) && f.equals(E), a && !m)
						for (; !f.getNext(l) && !u;) {
							if (g = f.getParent(), g.isBlockBoundary(this.forceBrBreak && !T && {
									br: 1
								})) {
								m = 1, O = 0, u || g.equals(E), a.setEndAt(g, CKEDITOR.POSITION_BEFORE_END);
								break
							}
							f = g, O = 1, u = f.equals(E), C = 1
						}
					if (O && a.setEndAt(f, CKEDITOR.POSITION_AFTER_END), f = t(f, C, E), (u = !f) || m && a) break
				}
				if (!n) {
					if (!a) return this._.docEndMarker && this._.docEndMarker.remove(), this._.nextNode = null;
					n = new CKEDITOR.dom.elementPath(a.startContainer, a.root), f = n.blockLimit, m = {
						div: 1,
						th: 1,
						td: 1
					}, n = n.block, !n && f && !this.enforceRealBlocks && m[f.getName()] && a.checkStartOfBlock() && a.checkEndOfBlock() && !f.equals(a.root) ? n = f : !n || this.enforceRealBlocks && n.is(c) ? (n = this.range.document.createElement(e), a.extractContents().appendTo(n), n.trim(), a.insertNode(n), d = h = !0) : "li" != n.getName() ? a.checkStartOfBlock() && a.checkEndOfBlock() || (n = n.clone(!1), a.extractContents().appendTo(n), n.trim(), h = a.splitBlock(), d = !h.wasStartOfBlock, h = !h.wasEndOfBlock, a.insertNode(n)) : u || (this._.nextNode = n.equals(E) ? null : t(a.getBoundaryNodes().endNode, 1, E))
				}
				return d && (d = n.getPrevious()) && d.type == CKEDITOR.NODE_ELEMENT && ("br" == d.getName() ? d.remove() : d.getLast() && "br" == d.getLast().$.nodeName.toLowerCase() && d.getLast().remove()), h && (d = n.getLast()) && d.type == CKEDITOR.NODE_ELEMENT && "br" == d.getName() && (!CKEDITOR.env.needsBrFiller || d.getPrevious(s) || d.getNext(s)) && d.remove(), this._.nextNode || (this._.nextNode = u || n.equals(E) || !E ? null : t(n, 1, E)), n
			}
		}, CKEDITOR.dom.range.prototype.createIterator = function() {
			return new e(this)
		}
	}(), CKEDITOR.command = function(e, t) {
		this.uiItems = [], this.exec = function(n) {
			return this.state != CKEDITOR.TRISTATE_DISABLED && this.checkAllowed() ? (this.editorFocus && e.focus(), this.fire("exec") === !1 ? !0 : t.exec.call(this, e, n) !== !1) : !1
		}, this.refresh = function(e, n) {
			return !this.readOnly && e.readOnly ? !0 : this.context && !n.isContextFor(this.context) ? (this.disable(), !0) : this.checkAllowed(!0) ? (this.startDisabled || this.enable(), this.modes && !this.modes[e.mode] && this.disable(), this.fire("refresh", {
				editor: e,
				path: n
			}) === !1 ? !0 : t.refresh && t.refresh.apply(this, arguments) !== !1) : (this.disable(), !0)
		};
		var n;
		this.checkAllowed = function(t) {
			return t || "boolean" != typeof n ? n = e.activeFilter.checkFeature(this) : n
		}, CKEDITOR.tools.extend(this, t, {
			modes: {
				wysiwyg: 1
			},
			editorFocus: 1,
			contextSensitive: !!t.context,
			state: CKEDITOR.TRISTATE_DISABLED
		}), CKEDITOR.event.call(this)
	}, CKEDITOR.command.prototype = {
		enable: function() {
			this.state == CKEDITOR.TRISTATE_DISABLED && this.checkAllowed() && this.setState(this.preserveState && "undefined" != typeof this.previousState ? this.previousState : CKEDITOR.TRISTATE_OFF)
		},
		disable: function() {
			this.setState(CKEDITOR.TRISTATE_DISABLED)
		},
		setState: function(e) {
			return this.state == e || e != CKEDITOR.TRISTATE_DISABLED && !this.checkAllowed() ? !1 : (this.previousState = this.state, this.state = e, this.fire("state"), !0)
		},
		toggleState: function() {
			this.state == CKEDITOR.TRISTATE_OFF ? this.setState(CKEDITOR.TRISTATE_ON) : this.state == CKEDITOR.TRISTATE_ON && this.setState(CKEDITOR.TRISTATE_OFF)
		}
	}, CKEDITOR.event.implementOn(CKEDITOR.command.prototype), CKEDITOR.ENTER_P = 1, CKEDITOR.ENTER_BR = 2, CKEDITOR.ENTER_DIV = 3, CKEDITOR.config = {
		customConfig: "config.js",
		autoUpdateElement: !0,
		language: "",
		defaultLanguage: "en",
		contentsLangDirection: "",
		enterMode: CKEDITOR.ENTER_P,
		forceEnterMode: !1,
		shiftEnterMode: CKEDITOR.ENTER_BR,
		docType: "<!DOCTYPE html>",
		bodyId: "",
		bodyClass: "",
		fullPage: !1,
		height: 200,
		extraPlugins: "",
		removePlugins: "",
		protectedSource: [],
		tabIndex: 0,
		width: "",
		baseFloatZIndex: 1e4,
		blockedKeystrokes: [CKEDITOR.CTRL + 66, CKEDITOR.CTRL + 73, CKEDITOR.CTRL + 85]
	}, function() {
		function e(e, t, n, i, r) {
			var o, a, e = [];
			for (o in t) {
				a = t[o], a = "boolean" == typeof a ? {} : "function" == typeof a ? {
					match: a
				} : N(a), "$" != o.charAt(0) && (a.elements = o), n && (a.featureName = n.toLowerCase());
				var l = a;
				l.elements = s(l.elements, /\s+/) || null, l.propertiesOnly = l.propertiesOnly || l.elements === !0;
				var c = /\s*,\s*/,
					u = void 0;
				for (u in w) {
					l[u] = s(l[u], c) || null;
					var d = l,
						h = A[u],
						E = s(l[A[u]], c),
						f = l[u],
						m = [],
						T = !0,
						C = void 0;
					E ? T = !1 : E = {};
					for (C in f) "!" == C.charAt(0) && (C = C.slice(1), m.push(C), E[C] = !0, T = !1);
					for (; C = m.pop();) f[C] = f["!" + C], delete f["!" + C];
					d[h] = (T ? !1 : E) || null
				}
				l.match = l.match || null, i.push(a), e.push(a)
			}
			for (var g, t = r.elements, r = r.generic, n = 0, i = e.length; i > n; ++n) {
				o = N(e[n]), a = o.classes === !0 || o.styles === !0 || o.attributes === !0, l = o, u = h = c = void 0;
				for (c in w) l[c] = O(l[c]);
				d = !0;
				for (u in A) {
					c = A[u], h = l[c], E = [], f = void 0;
					for (f in h) E.push(f.indexOf("*") > -1 ? RegExp("^" + f.replace(/\*/g, ".*") + "$") : f);
					h = E, h.length && (l[c] = h, d = !1)
				}
				if (l.nothingRequired = d, l.noProperties = !(l.attributes || l.classes || l.styles), o.elements === !0 || null === o.elements) r[a ? "unshift" : "push"](o);
				else {
					l = o.elements, delete o.elements;
					for (g in l) t[g] ? t[g][a ? "unshift" : "push"](o) : t[g] = [o]
				}
			}
		}

		function t(e, t, i, r) {
			if ((!e.match || e.match(t)) && (r || a(e, t)) && (e.propertiesOnly || (i.valid = !0), i.allAttributes || (i.allAttributes = n(e.attributes, t.attributes, i.validAttributes)), i.allStyles || (i.allStyles = n(e.styles, t.styles, i.validStyles)), !i.allClasses)) {
				if (e = e.classes, t = t.classes, r = i.validClasses, e)
					if (e === !0) e = !0;
					else {
						for (var o, s = 0, l = t.length; l > s; ++s) o = t[s], r[o] || (r[o] = e(o));
						e = !1
					} else e = !1;
				i.allClasses = e
			}
		}

		function n(e, t, n) {
			if (!e) return !1;
			if (e === !0) return !0;
			for (var i in t) n[i] || (n[i] = e(i));
			return !1
		}

		function i(e, t, n) {
			if (!e.match || e.match(t)) {
				if (e.noProperties) return !1;
				if (n.hadInvalidAttribute = r(e.attributes, t.attributes) || n.hadInvalidAttribute, n.hadInvalidStyle = r(e.styles, t.styles) || n.hadInvalidStyle, e = e.classes, t = t.classes, e) {
					for (var i = !1, o = e === !0, s = t.length; s--;)(o || e(t[s])) && (t.splice(s, 1), i = !0);
					e = i
				} else e = !1;
				n.hadInvalidClass = e || n.hadInvalidClass
			}
		}

		function r(e, t) {
			if (!e) return !1;
			var n, i = !1,
				r = e === !0;
			for (n in t)(r || e(n)) && (delete t[n], i = !0);
			return i
		}

		function o(e, t, n) {
			return e.disabled || e.customConfig && !n || !t ? !1 : (e._.cachedChecks = {}, !0)
		}

		function s(e, t) {
			if (!e) return !1;
			if (e === !0) return e;
			if ("string" == typeof e) return e = k(e), "*" == e ? !0 : CKEDITOR.tools.convertArrayToObject(e.split(t));
			if (CKEDITOR.tools.isArray(e)) return e.length ? CKEDITOR.tools.convertArrayToObject(e) : !1;
			var n, i = {},
				r = 0;
			for (n in e) i[n] = e[n], r++;
			return r ? i : !1
		}

		function a(e, t) {
			if (e.nothingRequired) return !0;
			var n, i, r, o;
			if (r = e.requiredClasses)
				for (o = t.classes, n = 0; n < r.length; ++n)
					if (i = r[n], "string" == typeof i) {
						if (-1 == CKEDITOR.tools.indexOf(o, i)) return !1
					} else if (!CKEDITOR.tools.checkIfAnyArrayItemMatches(o, i)) return !1;
			return l(t.styles, e.requiredStyles) && l(t.attributes, e.requiredAttributes)
		}

		function l(e, t) {
			if (!t) return !0;
			for (var n, i = 0; i < t.length; ++i)
				if (n = t[i], "string" == typeof n) {
					if (!(n in e)) return !1
				} else if (!CKEDITOR.tools.checkIfAnyObjectPropertyMatches(e, n)) return !1;
			return !0
		}

		function c(e) {
			if (!e) return {};
			for (var e = e.split(/\s*,\s*/).sort(), t = {}; e.length;) t[e.shift()] = _;
			return t
		}

		function u(e) {
			for (var t, n, i, r, o = {}, s = 1, e = k(e); t = e.match(L);)(n = t[2]) ? (i = d(n, "styles"), r = d(n, "attrs"), n = d(n, "classes")) : i = r = n = null, o["$" + s++] = {
				elements: t[1],
				classes: n,
				styles: i,
				attributes: r
			}, e = e.slice(t[0].length);
			return o
		}

		function d(e, t) {
			var n = e.match(x[t]);
			return n ? k(n[1]) : null
		}

		function h(e) {
			var t = e.styleBackup = e.attributes.style,
				n = e.classBackup = e.attributes["class"];
			e.styles || (e.styles = CKEDITOR.tools.parseCssText(t || "", 1)), e.classes || (e.classes = n ? n.split(/\s+/) : [])
		}

		function E(e, n, r, o) {
			var s, a = 0;
			if (o.toHtml && (n.name = n.name.replace(P, "$1")), o.doCallbacks && e.elementCallbacks) {
				e: for (var l, c = e.elementCallbacks, u = 0, d = c.length; d > u; ++u)
					if (l = c[u](n)) {
						s = l;
						break e
					}if (s) return s
			}
			if (o.doTransform && (s = e._.transformations[n.name])) {
				for (h(n), c = 0; c < s.length; ++c) D(e, n, s[c]);
				m(n)
			}
			if (o.doFilter) {
				e: {
					c = n.name, u = e._, e = u.allowedRules.elements[c], s = u.allowedRules.generic, c = u.disallowedRules.elements[c], u = u.disallowedRules.generic, d = o.skipRequired, l = {
						valid: !1,
						validAttributes: {},
						validClasses: {},
						validStyles: {},
						allAttributes: !1,
						allClasses: !1,
						allStyles: !1,
						hadInvalidAttribute: !1,
						hadInvalidClass: !1,
						hadInvalidStyle: !1
					};
					var E, f;
					if (e || s) {
						if (h(n), c)
							for (E = 0, f = c.length; f > E; ++E)
								if (i(c[E], n, l) === !1) {
									e = null;
									break e
								}
						if (u)
							for (E = 0, f = u.length; f > E; ++E) i(u[E], n, l);
						if (e)
							for (E = 0, f = e.length; f > E; ++E) t(e[E], n, l, d);
						if (s)
							for (E = 0, f = s.length; f > E; ++E) t(s[E], n, l, d);
						e = l
					} else e = null
				}
				if (!e) return r.push(n), y;
				if (!e.valid) return r.push(n), y;f = e.validAttributes;
				var O = e.validStyles;s = e.validClasses;
				var C, g, c = n.attributes,
					p = n.styles,
					u = n.classes,
					d = n.classBackup,
					I = n.styleBackup,
					R = [];l = [];
				var v = /^data-cke-/;
				if (E = !1, delete c.style, delete c["class"], delete n.classBackup, delete n.styleBackup, !e.allAttributes)
					for (C in c) f[C] || (v.test(C) ? C == (g = C.replace(/^data-cke-saved-/, "")) || f[g] || (delete c[C], E = !0) : (delete c[C], E = !0));
				if (!e.allStyles || e.hadInvalidStyle) {
					for (C in p) e.allStyles || O[C] ? R.push(C + ":" + p[C]) : E = !0;
					R.length && (c.style = R.sort().join("; "))
				} else I && (c.style = I);
				if (!e.allClasses || e.hadInvalidClass) {
					for (C = 0; C < u.length; ++C)(e.allClasses || s[u[C]]) && l.push(u[C]);
					l.length && (c["class"] = l.sort().join(" ")), d && l.length < d.split(/\s+/).length && (E = !0)
				} else d && (c["class"] = d);
				if (E && (a = y), !o.skipFinalValidation && !T(n)) return r.push(n), y
			}
			return o.toHtml && (n.name = n.name.replace($, "cke:$1")), a
		}

		function f(e) {
			var t, n = [];
			for (t in e) t.indexOf("*") > -1 && n.push(t.replace(/\*/g, ".*"));
			return n.length ? RegExp("^(?:" + n.join("|") + ")$") : null
		}

		function m(e) {
			var t, n = e.attributes;
			delete n.style, delete n["class"], (t = CKEDITOR.tools.writeCssText(e.styles, !0)) && (n.style = t), e.classes.length && (n["class"] = e.classes.sort().join(" "))
		}

		function T(e) {
			switch (e.name) {
				case "a":
					if (!e.children.length && !e.attributes.name) return !1;
					break;
				case "img":
					if (!e.attributes.src) return !1
			}
			return !0
		}

		function O(e) {
			if (!e) return !1;
			if (e === !0) return !0;
			var t = f(e);
			return function(n) {
				return n in e || t && n.match(t)
			}
		}

		function C() {
			return new CKEDITOR.htmlParser.element("br")
		}

		function g(e) {
			return e.type == CKEDITOR.NODE_ELEMENT && ("br" == e.name || b.$block[e.name])
		}

		function p(e, t, n) {
			var i = e.name;
			if (b.$empty[i] || !e.children.length) "hr" == i && "br" == t ? e.replaceWith(C()) : (e.parent && n.push({
				check: "it",
				el: e.parent
			}), e.remove());
			else if (b.$block[i] || "tr" == i)
				if ("br" == t) e.previous && !g(e.previous) && (t = C(), t.insertBefore(e)), e.next && !g(e.next) && (t = C(), t.insertAfter(e)), e.replaceWithChildren();
				else {
					var r, i = e.children;
					e: {
						r = b[t];
						for (var o, s = 0, a = i.length; a > s; ++s)
							if (o = i[s], o.type == CKEDITOR.NODE_ELEMENT && !r[o.name]) {
								r = !1;
								break e
							}
						r = !0
					}
					if (r) e.name = t, e.attributes = {}, n.push({
						check: "parent-down",
						el: e
					});
					else {
						r = e.parent;
						for (var l, s = r.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT || "body" == r.name, a = i.length; a > 0;) o = i[--a], s && (o.type == CKEDITOR.NODE_TEXT || o.type == CKEDITOR.NODE_ELEMENT && b.$inline[o.name]) ? (l || (l = new CKEDITOR.htmlParser.element(t), l.insertAfter(e), n.push({
							check: "parent-down",
							el: l
						})), l.add(o, 0)) : (l = null, o.insertAfter(e), r.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT && o.type == CKEDITOR.NODE_ELEMENT && !b[r.name][o.name] && n.push({
							check: "el-up",
							el: o
						}));
						e.remove()
					}
				} else "style" == i ? e.remove() : (e.parent && n.push({
				check: "it",
				el: e.parent
			}), e.replaceWithChildren())
		}

		function D(e, t, n) {
			var i, r;
			for (i = 0; i < n.length; ++i)
				if (r = n[i], !(r.check && !e.check(r.check, !1) || r.left && !r.left(t))) {
					r.right(t, B);
					break
				}
		}

		function I(e, t) {
			var n, i, r, o, s = t.getDefinition(),
				a = s.attributes,
				l = s.styles;
			if (e.name != s.element) return !1;
			for (n in a)
				if ("class" == n) {
					for (s = a[n].split(/\s+/), r = e.classes.join("|"); o = s.pop();)
						if (-1 == r.indexOf(o)) return !1
				} else if (e.attributes[n] != a[n]) return !1;
			for (i in l)
				if (e.styles[i] != l[i]) return !1;
			return !0
		}

		function R(e, t) {
			var n, i;
			return "string" == typeof e ? n = e : e instanceof CKEDITOR.style ? i = e : (n = e[0], i = e[1]), [{
				element: n,
				left: i,
				right: function(e, n) {
					n.transform(e, t)
				}
			}]
		}

		function v(e) {
			return function(t) {
				return I(t, e)
			}
		}

		function K(e) {
			return function(t, n) {
				n[e](t)
			}
		}
		var b = CKEDITOR.dtd,
			y = 1,
			N = CKEDITOR.tools.copy,
			k = CKEDITOR.tools.trim,
			_ = "cke-test",
			S = ["", "p", "br", "div"];
		CKEDITOR.FILTER_SKIP_TREE = 2, CKEDITOR.filter = function(e) {
			if (this.allowedContent = [], this.disallowedContent = [], this.elementCallbacks = null, this.disabled = !1, this.editor = null, this.id = CKEDITOR.tools.getNextNumber(), this._ = {
					allowedRules: {
						elements: {},
						generic: []
					},
					disallowedRules: {
						elements: {},
						generic: []
					},
					transformations: {},
					cachedTests: {}
				}, CKEDITOR.filter.instances[this.id] = this, e instanceof CKEDITOR.editor) {
				e = this.editor = e, this.customConfig = !0;
				var t = e.config.allowedContent;
				t === !0 ? this.disabled = !0 : (t || (this.customConfig = !1), this.allow(t, "config", 1), this.allow(e.config.extraAllowedContent, "extra", 1), this.allow(S[e.enterMode] + " " + S[e.shiftEnterMode], "default", 1), this.disallow(e.config.disallowedContent))
			} else this.customConfig = !1, this.allow(e, "default", 1)
		}, CKEDITOR.filter.instances = {}, CKEDITOR.filter.prototype = {
			allow: function(t, n, i) {
				if (!o(this, t, i)) return !1;
				var r, s;
				if ("string" == typeof t) t = u(t);
				else if (t instanceof CKEDITOR.style) {
					if (t.toAllowedContentRules) return this.allow(t.toAllowedContentRules(this.editor), n, i);
					r = t.getDefinition(), t = {}, i = r.attributes, t[r.element] = r = {
						styles: r.styles,
						requiredStyles: r.styles && CKEDITOR.tools.objectKeys(r.styles)
					}, i && (i = N(i), r.classes = i["class"] ? i["class"].split(/\s+/) : null, r.requiredClasses = r.classes, delete i["class"], r.attributes = i, r.requiredAttributes = i && CKEDITOR.tools.objectKeys(i))
				} else if (CKEDITOR.tools.isArray(t)) {
					for (r = 0; r < t.length; ++r) s = this.allow(t[r], n, i);
					return s
				}
				return e(this, t, n, this.allowedContent, this._.allowedRules), !0
			},
			applyTo: function(e, t, n, i) {
				if (this.disabled) return !1;
				var r, o = this,
					s = [],
					a = this.editor && this.editor.config.protectedSource,
					l = !1,
					c = {
						doFilter: !n,
						doTransform: !0,
						doCallbacks: !0,
						toHtml: t
					};
				e.forEach(function(e) {
					if (e.type == CKEDITOR.NODE_ELEMENT) {
						if ("off" == e.attributes["data-cke-filter"]) return !1;
						if (!t || "span" != e.name || !~CKEDITOR.tools.objectKeys(e.attributes).join("|").indexOf("data-cke-"))
							if (r = E(o, e, s, c), r & y) l = !0;
							else if (2 & r) return !1
					} else if (e.type == CKEDITOR.NODE_COMMENT && e.value.match(/^\{cke_protected\}(?!\{C\})/)) {
						var n;
						e: {
							var i = decodeURIComponent(e.value.replace(/^\{cke_protected\}/, ""));
							n = [];
							var u, d, h;
							if (a)
								for (d = 0; d < a.length; ++d)
									if ((h = i.match(a[d])) && h[0].length == i.length) {
										n = !0;
										break e
									}
							i = CKEDITOR.htmlParser.fragment.fromHtml(i), 1 == i.children.length && (u = i.children[0]).type == CKEDITOR.NODE_ELEMENT && E(o, u, n, c), n = !n.length
						}
						n || s.push(e)
					}
				}, null, !0), s.length && (l = !0);
				for (var u, e = [], i = S[i || (this.editor ? this.editor.enterMode : CKEDITOR.ENTER_P)]; n = s.pop();) n.type == CKEDITOR.NODE_ELEMENT ? p(n, i, e) : n.remove();
				for (; u = e.pop();)
					if (n = u.el, n.parent) switch (u.check) {
						case "it":
							b.$removeEmpty[n.name] && !n.children.length ? p(n, i, e) : T(n) || p(n, i, e);
							break;
						case "el-up":
							n.parent.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT && !b[n.parent.name][n.name] && p(n, i, e);
							break;
						case "parent-down":
							n.parent.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT && !b[n.parent.name][n.name] && p(n.parent, i, e)
					}
					return l
			},
			checkFeature: function(e) {
				return this.disabled || !e ? !0 : (e.toFeature && (e = e.toFeature(this.editor)), !e.requiredContent || this.check(e.requiredContent))
			},
			disable: function() {
				this.disabled = !0
			},
			disallow: function(t) {
				return o(this, t, !0) ? ("string" == typeof t && (t = u(t)), e(this, t, null, this.disallowedContent, this._.disallowedRules), !0) : !1
			},
			addContentForms: function(e) {
				if (!this.disabled && e) {
					var t, n, i, r = [];
					for (t = 0; t < e.length && !i; ++t) n = e[t], ("string" == typeof n || n instanceof CKEDITOR.style) && this.check(n) && (i = n);
					if (i) {
						for (t = 0; t < e.length; ++t) r.push(R(e[t], i));
						this.addTransformations(r)
					}
				}
			},
			addElementCallback: function(e) {
				this.elementCallbacks || (this.elementCallbacks = []), this.elementCallbacks.push(e)
			},
			addFeature: function(e) {
				return this.disabled || !e ? !0 : (e.toFeature && (e = e.toFeature(this.editor)), this.allow(e.allowedContent, e.name), this.addTransformations(e.contentTransformations), this.addContentForms(e.contentForms), e.requiredContent && (this.customConfig || this.disallowedContent.length) ? this.check(e.requiredContent) : !0)
			},
			addTransformations: function(e) {
				var t, n;
				if (!this.disabled && e) {
					var i, r = this._.transformations;
					for (i = 0; i < e.length; ++i) {
						t = e[i];
						var o = void 0,
							s = void 0,
							a = void 0,
							l = void 0,
							c = void 0,
							u = void 0;
						for (n = [], s = 0; s < t.length; ++s) a = t[s], "string" == typeof a ? (a = a.split(/\s*:\s*/), l = a[0], c = null, u = a[1]) : (l = a.check, c = a.left, u = a.right), o || (o = a, o = o.element ? o.element : l ? l.match(/^([a-z0-9]+)/i)[0] : o.left.getDefinition().element), c instanceof CKEDITOR.style && (c = v(c)), n.push({
							check: l == o ? null : l,
							left: c,
							right: "string" == typeof u ? K(u) : u
						});
						t = o, r[t] || (r[t] = []), r[t].push(n)
					}
				}
			},
			check: function(e, t, n) {
				if (this.disabled) return !0;
				if (CKEDITOR.tools.isArray(e)) {
					for (var i = e.length; i--;)
						if (this.check(e[i], t, n)) return !0;
					return !1
				}
				var r, o;
				if ("string" == typeof e) {
					if (o = e + "<" + (t === !1 ? "0" : "1") + (n ? "1" : "0") + ">", o in this._.cachedChecks) return this._.cachedChecks[o];
					i = u(e).$1, r = i.styles;
					var s = i.classes;
					i.name = i.elements, i.classes = s = s ? s.split(/\s*,\s*/) : [], i.styles = c(r), i.attributes = c(i.attributes), i.children = [], s.length && (i.attributes["class"] = s.join(" ")), r && (i.attributes.style = CKEDITOR.tools.writeCssText(i.styles)), r = i
				} else i = e.getDefinition(), r = i.styles, s = i.attributes || {}, r ? (r = N(r), s.style = CKEDITOR.tools.writeCssText(r, !0)) : r = {}, r = {
					name: i.element,
					attributes: s,
					classes: s["class"] ? s["class"].split(/\s+/) : [],
					styles: r,
					children: []
				};
				var a, s = CKEDITOR.tools.clone(r),
					l = [];
				if (t !== !1 && (a = this._.transformations[r.name])) {
					for (i = 0; i < a.length; ++i) D(this, r, a[i]);
					m(r)
				}
				return E(this, s, l, {
					doFilter: !0,
					doTransform: t !== !1,
					skipRequired: !n,
					skipFinalValidation: !n
				}), t = l.length > 0 ? !1 : CKEDITOR.tools.objectCompare(r.attributes, s.attributes, !0) ? !0 : !1, "string" == typeof e && (this._.cachedChecks[o] = t), t
			},
			getAllowedEnterMode: function() {
				var e = ["p", "div", "br"],
					t = {
						p: CKEDITOR.ENTER_P,
						div: CKEDITOR.ENTER_DIV,
						br: CKEDITOR.ENTER_BR
					};
				return function(n, i) {
					var r, o = e.slice();
					if (this.check(S[n])) return n;
					for (i || (o = o.reverse()); r = o.pop();)
						if (this.check(r)) return t[r];
					return CKEDITOR.ENTER_BR
				}
			}()
		};
		var w = {
				styles: 1,
				attributes: 1,
				classes: 1
			},
			A = {
				styles: "requiredStyles",
				attributes: "requiredAttributes",
				classes: "requiredClasses"
			},
			L = /^([a-z0-9*\s]+)((?:\s*\{[!\w\-,\s\*]+\}\s*|\s*\[[!\w\-,\s\*]+\]\s*|\s*\([!\w\-,\s\*]+\)\s*){0,3})(?:;\s*|$)/i,
			x = {
				styles: /{([^}]+)}/,
				attrs: /\[([^\]]+)\]/,
				classes: /\(([^\)]+)\)/
			},
			P = /^cke:(object|embed|param)$/,
			$ = /^(object|embed|param)$/,
			B = CKEDITOR.filter.transformationsTools = {
				sizeToStyle: function(e) {
					this.lengthToStyle(e, "width"), this.lengthToStyle(e, "height")
				},
				sizeToAttribute: function(e) {
					this.lengthToAttribute(e, "width"), this.lengthToAttribute(e, "height")
				},
				lengthToStyle: function(e, t, n) {
					if (n = n || t, !(n in e.styles)) {
						var i = e.attributes[t];
						i && (/^\d+$/.test(i) && (i += "px"), e.styles[n] = i)
					}
					delete e.attributes[t]
				},
				lengthToAttribute: function(e, t, n) {
					if (n = n || t, !(n in e.attributes)) {
						var i = e.styles[t],
							r = i && i.match(/^(\d+)(?:\.\d*)?px$/);
						r ? e.attributes[n] = r[1] : i == _ && (e.attributes[n] = _)
					}
					delete e.styles[t]
				},
				alignmentToStyle: function(e) {
					if (!("float" in e.styles)) {
						var t = e.attributes.align;
						("left" == t || "right" == t) && (e.styles["float"] = t)
					}
					delete e.attributes.align
				},
				alignmentToAttribute: function(e) {
					if (!("align" in e.attributes)) {
						var t = e.styles["float"];
						("left" == t || "right" == t) && (e.attributes.align = t)
					}
					delete e.styles["float"]
				},
				matchesStyle: I,
				transform: function(e, t) {
					if ("string" == typeof t) e.name = t;
					else {
						var n, i, r, o, s = t.getDefinition(),
							a = s.styles,
							l = s.attributes;
						e.name = s.element;
						for (n in l)
							if ("class" == n)
								for (s = e.classes.join("|"), r = l[n].split(/\s+/); o = r.pop();) - 1 == s.indexOf(o) && e.classes.push(o);
							else e.attributes[n] = l[n];
						for (i in a) e.styles[i] = a[i]
					}
				}
			}
	}(), function() {
		CKEDITOR.focusManager = function(e) {
			return e.focusManager ? e.focusManager : (this.hasFocus = !1, this.currentActive = null, this._ = {
				editor: e
			}, this)
		}, CKEDITOR.focusManager._ = {
			blurDelay: 200
		}, CKEDITOR.focusManager.prototype = {
			focus: function(e) {
				this._.timer && clearTimeout(this._.timer), e && (this.currentActive = e), this.hasFocus || this._.locked || ((e = CKEDITOR.currentInstance) && e.focusManager.blur(1), this.hasFocus = !0, (e = this._.editor.container) && e.addClass("cke_focus"), this._.editor.fire("focus"))
			},
			lock: function() {
				this._.locked = 1
			},
			unlock: function() {
				delete this._.locked
			},
			blur: function(e) {
				function t() {
					if (this.hasFocus) {
						this.hasFocus = !1;
						var e = this._.editor.container;
						e && e.removeClass("cke_focus"), this._.editor.fire("blur")
					}
				}
				if (!this._.locked) {
					this._.timer && clearTimeout(this._.timer);
					var n = CKEDITOR.focusManager._.blurDelay;
					e || !n ? t.call(this) : this._.timer = CKEDITOR.tools.setTimeout(function() {
						delete this._.timer, t.call(this)
					}, n, this)
				}
			},
			add: function(e, t) {
				var n = e.getCustomData("focusmanager");
				if (!n || n != this) {
					n && n.remove(e);
					var n = "focus",
						i = "blur";
					t && (CKEDITOR.env.ie ? (n = "focusin", i = "focusout") : CKEDITOR.event.useCapture = 1);
					var r = {
						blur: function() {
							e.equals(this.currentActive) && this.blur()
						},
						focus: function() {
							this.focus(e)
						}
					};
					e.on(n, r.focus, this), e.on(i, r.blur, this), t && (CKEDITOR.event.useCapture = 0), e.setCustomData("focusmanager", this), e.setCustomData("focusmanager_handlers", r)
				}
			},
			remove: function(e) {
				e.removeCustomData("focusmanager");
				var t = e.removeCustomData("focusmanager_handlers");
				e.removeListener("blur", t.blur), e.removeListener("focus", t.focus)
			}
		}
	}(), CKEDITOR.keystrokeHandler = function(e) {
		return e.keystrokeHandler ? e.keystrokeHandler : (this.keystrokes = {}, this.blockedKeystrokes = {}, this._ = {
			editor: e
		}, this)
	}, function() {
		var e, t = function(t) {
				var t = t.data,
					n = t.getKeystroke(),
					i = this.keystrokes[n],
					r = this._.editor;
				return e = r.fire("key", {
					keyCode: n,
					domEvent: t
				}) === !1, e || (i && (e = r.execCommand(i, {
					from: "keystrokeHandler"
				}) !== !1), e || (e = !!this.blockedKeystrokes[n])), e && t.preventDefault(!0), !e
			},
			n = function(t) {
				e && (e = !1, t.data.preventDefault(!0))
			};
		CKEDITOR.keystrokeHandler.prototype = {
			attach: function(e) {
				e.on("keydown", t, this), CKEDITOR.env.gecko && CKEDITOR.env.mac && e.on("keypress", n, this)
			}
		}
	}(), function() {
		CKEDITOR.lang = {
			languages: {
				af: 1,
				ar: 1,
				bg: 1,
				bn: 1,
				bs: 1,
				ca: 1,
				cs: 1,
				cy: 1,
				da: 1,
				de: 1,
				el: 1,
				"en-au": 1,
				"en-ca": 1,
				"en-gb": 1,
				en: 1,
				eo: 1,
				es: 1,
				et: 1,
				eu: 1,
				fa: 1,
				fi: 1,
				fo: 1,
				"fr-ca": 1,
				fr: 1,
				gl: 1,
				gu: 1,
				he: 1,
				hi: 1,
				hr: 1,
				hu: 1,
				id: 1,
				is: 1,
				it: 1,
				ja: 1,
				ka: 1,
				km: 1,
				ko: 1,
				ku: 1,
				lt: 1,
				lv: 1,
				mk: 1,
				mn: 1,
				ms: 1,
				nb: 1,
				nl: 1,
				no: 1,
				pl: 1,
				"pt-br": 1,
				pt: 1,
				ro: 1,
				ru: 1,
				si: 1,
				sk: 1,
				sl: 1,
				sq: 1,
				"sr-latn": 1,
				sr: 1,
				sv: 1,
				th: 1,
				tr: 1,
				tt: 1,
				ug: 1,
				uk: 1,
				vi: 1,
				"zh-cn": 1,
				zh: 1
			},
			rtl: {
				ar: 1,
				fa: 1,
				he: 1,
				ku: 1,
				ug: 1
			},
			load: function(e, t, n) {
				e && CKEDITOR.lang.languages[e] || (e = this.detect(t, e));
				var i = this,
					t = function() {
						i[e].dir = i.rtl[e] ? "rtl" : "ltr", n(e, i[e])
					};
				this[e] ? t() : CKEDITOR.scriptLoader.load(CKEDITOR.getUrl("lang/" + e + ".js"), t, this)
			},
			detect: function(e, t) {
				var n = this.languages,
					t = t || navigator.userLanguage || navigator.language || e,
					i = t.toLowerCase().match(/([a-z]+)(?:-([a-z]+))?/),
					r = i[1],
					i = i[2];
				return n[r + "-" + i] ? r = r + "-" + i : n[r] || (r = null), CKEDITOR.lang.detect = r ? function() {
					return r
				} : function(e) {
					return e
				}, r || e
			}
		}
	}(), CKEDITOR.scriptLoader = function() {
		var e = {},
			t = {};
		return {
			load: function(n, i, r, o) {
				var s = "string" == typeof n;
				s && (n = [n]), r || (r = CKEDITOR);
				var a = n.length,
					l = [],
					c = [],
					u = function(e) {
						i && (s ? i.call(r, e) : i.call(r, l, c))
					};
				if (0 === a) u(!0);
				else {
					var d = function(e, t) {
							(t ? l : c).push(e), --a <= 0 && (o && CKEDITOR.document.getDocumentElement().removeStyle("cursor"), u(t))
						},
						h = function(n, i) {
							e[n] = 1;
							var r = t[n];
							delete t[n];
							for (var o = 0; o < r.length; o++) r[o](n, i)
						},
						E = function(n) {
							if (e[n]) d(n, !0);
							else {
								var r = t[n] || (t[n] = []);
								if (r.push(d), !(r.length > 1)) {
									var o = new CKEDITOR.dom.element("script");
									o.setAttributes({
										type: "text/javascript",
										src: n
									}), i && (CKEDITOR.env.ie && CKEDITOR.env.version < 11 ? o.$.onreadystatechange = function() {
										("loaded" == o.$.readyState || "complete" == o.$.readyState) && (o.$.onreadystatechange = null, h(n, !0))
									} : (o.$.onload = function() {
										setTimeout(function() {
											h(n, !0)
										}, 0)
									}, o.$.onerror = function() {
										h(n, !1)
									})), o.appendTo(CKEDITOR.document.getHead())
								}
							}
						};
					o && CKEDITOR.document.getDocumentElement().setStyle("cursor", "wait");
					for (var f = 0; a > f; f++) E(n[f])
				}
			},
			queue: function() {
				function e() {
					var e;
					(e = t[0]) && this.load(e.scriptUrl, e.callback, CKEDITOR, 0)
				}
				var t = [];
				return function(n, i) {
					var r = this;
					t.push({
						scriptUrl: n,
						callback: function() {
							i && i.apply(this, arguments), t.shift(), e.call(r)
						}
					}), 1 == t.length && e.call(this)
				}
			}()
		}
	}(), CKEDITOR.resourceManager = function(e, t) {
		this.basePath = e, this.fileName = t, this.registered = {}, this.loaded = {}, this.externals = {}, this._ = {
			waitingList: {}
		}
	}, CKEDITOR.resourceManager.prototype = {
		add: function(e, t) {
			if (this.registered[e]) throw '[CKEDITOR.resourceManager.add] The resource name "' + e + '" is already registered.';
			var n = this.registered[e] = t || {};
			return n.name = e, n.path = this.getPath(e), CKEDITOR.fire(e + CKEDITOR.tools.capitalize(this.fileName) + "Ready", n), this.get(e)
		},
		get: function(e) {
			return this.registered[e] || null
		},
		getPath: function(e) {
			var t = this.externals[e];
			return CKEDITOR.getUrl(t && t.dir || this.basePath + e + "/")
		},
		getFilePath: function(e) {
			var t = this.externals[e];
			return CKEDITOR.getUrl(this.getPath(e) + (t ? t.file : this.fileName + ".js"))
		},
		addExternal: function(e, t, n) {
			for (var e = e.split(","), i = 0; i < e.length; i++) {
				var r = e[i];
				n || (t = t.replace(/[^\/]+$/, function(e) {
					return n = e, ""
				})), this.externals[r] = {
					dir: t,
					file: n || this.fileName + ".js"
				}
			}
		},
		load: function(e, t, n) {
			CKEDITOR.tools.isArray(e) || (e = e ? [e] : []);
			for (var i = this.loaded, r = this.registered, o = [], s = {}, a = {}, l = 0; l < e.length; l++) {
				var c = e[l];
				if (c)
					if (i[c] || r[c]) a[c] = this.get(c);
					else {
						var u = this.getFilePath(c);
						o.push(u), u in s || (s[u] = []), s[u].push(c)
					}
			}
			CKEDITOR.scriptLoader.load(o, function(e, r) {
				if (r.length) throw '[CKEDITOR.resourceManager.load] Resource name "' + s[r[0]].join(",") + '" was not found at "' + r[0] + '".';
				for (var o = 0; o < e.length; o++)
					for (var l = s[e[o]], c = 0; c < l.length; c++) {
						var u = l[c];
						a[u] = this.get(u), i[u] = 1
					}
				t.call(n, a)
			}, this)
		}
	}, CKEDITOR.plugins = new CKEDITOR.resourceManager("plugins/", "plugin"), CKEDITOR.plugins.load = CKEDITOR.tools.override(CKEDITOR.plugins.load, function(e) {
		var t = {};
		return function(n, i, r) {
			var o = {},
				s = function(n) {
					e.call(this, n, function(e) {
						CKEDITOR.tools.extend(o, e);
						var n, a = [];
						for (n in e) {
							var l = e[n],
								c = l && l.requires;
							if (!t[n]) {
								if (l.icons)
									for (var u = l.icons.split(","), d = u.length; d--;) CKEDITOR.skin.addIcon(u[d], l.path + "icons/" + (CKEDITOR.env.hidpi && l.hidpi ? "hidpi/" : "") + u[d] + ".png");
								t[n] = 1
							}
							if (c)
								for (c.split && (c = c.split(",")), l = 0; l < c.length; l++) o[c[l]] || a.push(c[l])
						}
						if (a.length) s.call(this, a);
						else {
							for (n in o) l = o[n], l.onLoad && !l.onLoad._called && (l.onLoad() === !1 && delete o[n], l.onLoad._called = 1);
							i && i.call(r || window, o)
						}
					}, this)
				};
			s.call(this, n)
		}
	}), CKEDITOR.plugins.setLang = function(e, t, n) {
		var i = this.get(e),
			e = i.langEntries || (i.langEntries = {}),
			i = i.lang || (i.lang = []);
		i.split && (i = i.split(",")), -1 == CKEDITOR.tools.indexOf(i, t) && i.push(t), e[t] = n
	}, CKEDITOR.ui = function(e) {
		return e.ui ? e.ui : (this.items = {}, this.instances = {}, this.editor = e, this._ = {
			handlers: {}
		}, this)
	}, CKEDITOR.ui.prototype = {
		add: function(e, t, n) {
			n.name = e.toLowerCase();
			var i = this.items[e] = {
				type: t,
				command: n.command || null,
				args: Array.prototype.slice.call(arguments, 2)
			};
			CKEDITOR.tools.extend(i, n)
		},
		get: function(e) {
			return this.instances[e]
		},
		create: function(e) {
			var t = this.items[e],
				n = t && this._.handlers[t.type],
				i = t && t.command && this.editor.getCommand(t.command),
				n = n && n.create.apply(this, t.args);
			return this.instances[e] = n, i && i.uiItems.push(n), n && !n.type && (n.type = t.type), n
		},
		addHandler: function(e, t) {
			this._.handlers[e] = t
		},
		space: function(e) {
			return CKEDITOR.document.getById(this.spaceId(e))
		},
		spaceId: function(e) {
			return this.editor.id + "_" + e
		}
	}, CKEDITOR.event.implementOn(CKEDITOR.ui), function() {
		function e(e, i, o) {
			if (CKEDITOR.event.call(this), e = e && CKEDITOR.tools.clone(e), void 0 !== i) {
				if (!(i instanceof CKEDITOR.dom.element)) throw Error("Expect element of type CKEDITOR.dom.element.");
				if (!o) throw Error("One of the element modes must be specified.");
				if (CKEDITOR.env.ie && CKEDITOR.env.quirks && o == CKEDITOR.ELEMENT_MODE_INLINE) throw Error("Inline element mode is not supported on IE quirks.");
				if (!(o == CKEDITOR.ELEMENT_MODE_INLINE ? i.is(CKEDITOR.dtd.$editable) || i.is("textarea") : o == CKEDITOR.ELEMENT_MODE_REPLACE ? !i.is(CKEDITOR.dtd.$nonBodyContent) : 1)) throw Error('The specified element mode is not supported on element: "' + i.getName() + '".');
				this.element = i, this.elementMode = o, this.name = this.elementMode != CKEDITOR.ELEMENT_MODE_APPENDTO && (i.getId() || i.getNameAtt())
			} else this.elementMode = CKEDITOR.ELEMENT_MODE_NONE;
			this._ = {}, this.commands = {}, this.templates = {}, this.name = this.name || t(), this.id = CKEDITOR.tools.getNextId(), this.status = "unloaded", this.config = CKEDITOR.tools.prototypedCopy(CKEDITOR.config), this.ui = new CKEDITOR.ui(this), this.focusManager = new CKEDITOR.focusManager(this), this.keystrokeHandler = new CKEDITOR.keystrokeHandler(this), this.on("readOnly", n), this.on("selectionChange", function(e) {
				r(this, e.data.path)
			}), this.on("activeFilterChange", function() {
				r(this, this.elementPath(), !0)
			}), this.on("mode", n), this.on("instanceReady", function() {
				this.config.startupFocus && this.focus()
			}), CKEDITOR.fire("instanceCreated", null, this), CKEDITOR.add(this), CKEDITOR.tools.setTimeout(function() {
				s(this, e)
			}, 0, this)
		}

		function t() {
			do var e = "editor" + ++h; while (CKEDITOR.instances[e]);
			return e
		}

		function n() {
			var e, t = this.commands;
			for (e in t) i(this, t[e])
		}

		function i(e, t) {
			t[t.startDisabled ? "disable" : e.readOnly && !t.readOnly ? "disable" : t.modes[e.mode] ? "enable" : "disable"]()
		}

		function r(e, t, n) {
			if (t) {
				var i, r, o = e.commands;
				for (r in o) i = o[r], (n || i.contextSensitive) && i.refresh(e, t)
			}
		}

		function o(e) {
			var t = e.config.customConfig;
			if (!t) return !1;
			var t = CKEDITOR.getUrl(t),
				n = E[t] || (E[t] = {});
			return n.fn ? (n.fn.call(e, e.config), (CKEDITOR.getUrl(e.config.customConfig) == t || !o(e)) && e.fireOnce("customConfigLoaded")) : CKEDITOR.scriptLoader.queue(t, function() {
				n.fn = CKEDITOR.editorConfig ? CKEDITOR.editorConfig : function() {}, o(e)
			}), !0
		}

		function s(e, t) {
			e.on("customConfigLoaded", function() {
				if (t) {
					if (t.on)
						for (var n in t.on) e.on(n, t.on[n]);
					CKEDITOR.tools.extend(e.config, t, !0), delete e.config.on
				}
				n = e.config, e.readOnly = !(!n.readOnly && !(e.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? e.element.is("textarea") ? e.element.hasAttribute("disabled") : e.element.isReadOnly() : e.elementMode == CKEDITOR.ELEMENT_MODE_REPLACE && e.element.hasAttribute("disabled"))), e.blockless = e.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? !(e.element.is("textarea") || CKEDITOR.dtd[e.element.getName()].p) : !1, e.tabIndex = n.tabIndex || e.element && e.element.getAttribute("tabindex") || 0, e.activeEnterMode = e.enterMode = e.blockless ? CKEDITOR.ENTER_BR : n.enterMode, e.activeShiftEnterMode = e.shiftEnterMode = e.blockless ? CKEDITOR.ENTER_BR : n.shiftEnterMode, n.skin && (CKEDITOR.skinName = n.skin), e.fireOnce("configLoaded"), e.dataProcessor = new CKEDITOR.htmlDataProcessor(e), e.filter = e.activeFilter = new CKEDITOR.filter(e), a(e)
			}), t && void 0 != t.customConfig && (e.config.customConfig = t.customConfig), o(e) || e.fireOnce("customConfigLoaded")
		}

		function a(e) {
			CKEDITOR.skin.loadPart("editor", function() {
				l(e)
			})
		}

		function l(e) {
			CKEDITOR.lang.load(e.config.language, e.config.defaultLanguage, function(t, n) {
				var i = e.config.title;
				e.langCode = t, e.lang = CKEDITOR.tools.prototypedCopy(n), e.title = "string" == typeof i || i === !1 ? i : [e.lang.editor, e.name].join(", "), e.config.contentsLangDirection || (e.config.contentsLangDirection = e.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? e.element.getDirection(1) : e.lang.dir), e.fire("langLoaded"), c(e)
			})
		}

		function c(e) {
			e.getStylesSet(function(t) {
				e.once("loaded", function() {
					e.fire("stylesSet", {
						styles: t
					})
				}, null, null, 1), u(e)
			})
		}

		function u(e) {
			var t = e.config,
				n = t.plugins,
				i = t.extraPlugins,
				r = t.removePlugins;
			if (i) var o = RegExp("(?:^|,)(?:" + i.replace(/\s*,\s*/g, "|") + ")(?=,|$)", "g"),
				n = n.replace(o, ""),
				n = n + ("," + i);
			if (r) var s = RegExp("(?:^|,)(?:" + r.replace(/\s*,\s*/g, "|") + ")(?=,|$)", "g"),
				n = n.replace(s, "");
			CKEDITOR.env.air && (n += ",adobeair"), CKEDITOR.plugins.load(n.split(","), function(n) {
				var i = [],
					r = [],
					o = [];
				e.plugins = n;
				for (var a in n) {
					var l, c = n[a],
						u = c.lang,
						d = null,
						h = c.requires;
					if (CKEDITOR.tools.isArray(h) && (h = h.join(",")), h && (l = h.match(s)))
						for (; h = l.pop();) CKEDITOR.tools.setTimeout(function(e, t) {
							throw Error('Plugin "' + e.replace(",", "") + '" cannot be removed from the plugins list, because it\'s required by "' + t + '" plugin.')
						}, 0, null, [h, a]);
					u && !e.lang[a] && (u.split && (u = u.split(",")), CKEDITOR.tools.indexOf(u, e.langCode) >= 0 ? d = e.langCode : (d = e.langCode.replace(/-.*/, ""), d = d != e.langCode && CKEDITOR.tools.indexOf(u, d) >= 0 ? d : CKEDITOR.tools.indexOf(u, "en") >= 0 ? "en" : u[0]), c.langEntries && c.langEntries[d] ? (e.lang[a] = c.langEntries[d], d = null) : o.push(CKEDITOR.getUrl(c.path + "lang/" + d + ".js"))), r.push(d), i.push(c)
				}
				CKEDITOR.scriptLoader.load(o, function() {
					for (var n = ["beforeInit", "init", "afterInit"], o = 0; o < n.length; o++)
						for (var s = 0; s < i.length; s++) {
							var a = i[s];
							0 === o && r[s] && a.lang && a.langEntries && (e.lang[a.name] = a.langEntries[r[s]]), a[n[o]] && a[n[o]](e)
						}
					for (e.fireOnce("pluginsLoaded"), t.keystrokes && e.setKeystroke(e.config.keystrokes), s = 0; s < e.config.blockedKeystrokes.length; s++) e.keystrokeHandler.blockedKeystrokes[e.config.blockedKeystrokes[s]] = 1;
					e.status = "loaded", e.fireOnce("loaded"), CKEDITOR.fire("instanceLoaded", null, e)
				})
			})
		}

		function d() {
			var e = this.element;
			if (e && this.elementMode != CKEDITOR.ELEMENT_MODE_APPENDTO) {
				var t = this.getData();
				return this.config.htmlEncodeOutput && (t = CKEDITOR.tools.htmlEncode(t)), e.is("textarea") ? e.setValue(t) : e.setHtml(t), !0
			}
			return !1
		}
		e.prototype = CKEDITOR.editor.prototype, CKEDITOR.editor = e;
		var h = 0,
			E = {};
		CKEDITOR.tools.extend(CKEDITOR.editor.prototype, {
			addCommand: function(e, t) {
				t.name = e.toLowerCase();
				var n = new CKEDITOR.command(this, t);
				return this.mode && i(this, n), this.commands[e] = n
			},
			_attachToForm: function() {
				var e = this,
					t = e.element,
					n = new CKEDITOR.dom.element(t.$.form);
				if (t.is("textarea") && n) {
					var i = function(n) {
						e.updateElement(), e._.required && !t.getValue() && e.fire("required") === !1 && n.data.preventDefault()
					};
					n.on("submit", i), n.$.submit && n.$.submit.call && n.$.submit.apply && (n.$.submit = CKEDITOR.tools.override(n.$.submit, function(e) {
						return function() {
							i(), e.apply ? e.apply(this) : e()
						}
					})), e.on("destroy", function() {
						n.removeListener("submit", i)
					})
				}
			},
			destroy: function(e) {
				this.fire("beforeDestroy"), !e && d.call(this), this.editable(null), this.status = "destroyed", this.fire("destroy"), this.removeAllListeners(), CKEDITOR.remove(this), CKEDITOR.fire("instanceDestroyed", null, this)
			},
			elementPath: function(e) {
				if (!e) {
					if (e = this.getSelection(), !e) return null;
					e = e.getStartElement()
				}
				return e ? new CKEDITOR.dom.elementPath(e, this.editable()) : null
			},
			createRange: function() {
				var e = this.editable();
				return e ? new CKEDITOR.dom.range(e) : null
			},
			execCommand: function(e, t) {
				var n = this.getCommand(e),
					i = {
						name: e,
						commandData: t,
						command: n
					};
				return n && n.state != CKEDITOR.TRISTATE_DISABLED && this.fire("beforeCommandExec", i) !== !1 && (i.returnValue = n.exec(i.commandData), !n.async && this.fire("afterCommandExec", i) !== !1) ? i.returnValue : !1
			},
			getCommand: function(e) {
				return this.commands[e]
			},
			getData: function(e) {
				!e && this.fire("beforeGetData");
				var t = this._.data;
				return "string" != typeof t && (t = (t = this.element) && this.elementMode == CKEDITOR.ELEMENT_MODE_REPLACE ? t.is("textarea") ? t.getValue() : t.getHtml() : ""), t = {
					dataValue: t
				}, !e && this.fire("getData", t), t.dataValue
			},
			getSnapshot: function() {
				var e = this.fire("getSnapshot");
				if ("string" != typeof e) {
					var t = this.element;
					t && this.elementMode == CKEDITOR.ELEMENT_MODE_REPLACE && (e = t.is("textarea") ? t.getValue() : t.getHtml())
				}
				return e
			},
			loadSnapshot: function(e) {
				this.fire("loadSnapshot", e)
			},
			setData: function(e, t, n) {
				var i = !0,
					r = t;
				t && "object" == typeof t && (n = t.internal, r = t.callback, i = !t.noSnapshot), !n && i && this.fire("saveSnapshot"), (r || !n) && this.once("dataReady", function(e) {
					!n && i && this.fire("saveSnapshot"), r && r.call(e.editor)
				}), e = {
					dataValue: e
				}, !n && this.fire("setData", e), this._.data = e.dataValue, !n && this.fire("afterSetData", e)
			},
			setReadOnly: function(e) {
				e = void 0 == e || e, this.readOnly != e && (this.readOnly = e, this.keystrokeHandler.blockedKeystrokes[8] = +e, this.editable().setReadOnly(e), this.fire("readOnly"))
			},
			insertHtml: function(e, t) {
				this.fire("insertHtml", {
					dataValue: e,
					mode: t
				})
			},
			insertText: function(e) {
				this.fire("insertText", e)
			},
			insertElement: function(e) {
				this.fire("insertElement", e)
			},
			focus: function() {
				this.fire("beforeFocus")
			},
			checkDirty: function() {
				return "ready" == this.status && this._.previousValue !== this.getSnapshot()
			},
			resetDirty: function() {
				this._.previousValue = this.getSnapshot()
			},
			updateElement: function() {
				return d.call(this)
			},
			setKeystroke: function() {
				for (var e, t, n = this.keystrokeHandler.keystrokes, i = CKEDITOR.tools.isArray(arguments[0]) ? arguments[0] : [
						[].slice.call(arguments, 0)
					], r = i.length; r--;) e = i[r], t = 0, CKEDITOR.tools.isArray(e) && (t = e[1], e = e[0]), t ? n[e] = t : delete n[e]
			},
			addFeature: function(e) {
				return this.filter.addFeature(e)
			},
			setActiveFilter: function(e) {
				e || (e = this.filter), this.activeFilter !== e && (this.activeFilter = e, this.fire("activeFilterChange"), e === this.filter ? this.setActiveEnterMode(null, null) : this.setActiveEnterMode(e.getAllowedEnterMode(this.enterMode), e.getAllowedEnterMode(this.shiftEnterMode, !0)))
			},
			setActiveEnterMode: function(e, t) {
				e = e ? this.blockless ? CKEDITOR.ENTER_BR : e : this.enterMode, t = t ? this.blockless ? CKEDITOR.ENTER_BR : t : this.shiftEnterMode, (this.activeEnterMode != e || this.activeShiftEnterMode != t) && (this.activeEnterMode = e, this.activeShiftEnterMode = t, this.fire("activeEnterModeChange"))
			}
		})
	}(), CKEDITOR.ELEMENT_MODE_NONE = 0, CKEDITOR.ELEMENT_MODE_REPLACE = 1, CKEDITOR.ELEMENT_MODE_APPENDTO = 2, CKEDITOR.ELEMENT_MODE_INLINE = 3, CKEDITOR.htmlParser = function() {
		this._ = {
			htmlPartsRegex: RegExp("<(?:(?:\\/([^>]+)>)|(?:!--([\\S|\\s]*?)-->)|(?:([^\\s>]+)\\s*((?:(?:\"[^\"]*\")|(?:'[^']*')|[^\"'>])*)\\/?>))", "g")
		}
	}, function() {
		var e = /([\w\-:.]+)(?:(?:\s*=\s*(?:(?:"([^"]*)")|(?:'([^']*)')|([^\s>]+)))|(?=\s|$))/g,
			t = {
				checked: 1,
				compact: 1,
				declare: 1,
				defer: 1,
				disabled: 1,
				ismap: 1,
				multiple: 1,
				nohref: 1,
				noresize: 1,
				noshade: 1,
				nowrap: 1,
				readonly: 1,
				selected: 1
			};
		CKEDITOR.htmlParser.prototype = {
			onTagOpen: function() {},
			onTagClose: function() {},
			onText: function() {},
			onCDATA: function() {},
			onComment: function() {},
			parse: function(n) {
				for (var i, r, o, s = 0; i = this._.htmlPartsRegex.exec(n);)
					if (r = i.index, r > s && (s = n.substring(s, r), o ? o.push(s) : this.onText(s)), s = this._.htmlPartsRegex.lastIndex, !(r = i[1]) || (r = r.toLowerCase(), o && CKEDITOR.dtd.$cdata[r] && (this.onCDATA(o.join("")), o = null), o))
						if (o) o.push(i[0]);
						else if (r = i[3]) {
					if (r = r.toLowerCase(), !/="/.test(r)) {
						var a, l = {};
						i = i[4];
						var c = !(!i || "/" != i.charAt(i.length - 1));
						if (i)
							for (; a = e.exec(i);) {
								var u = a[1].toLowerCase();
								a = a[2] || a[3] || a[4] || "", l[u] = !a && t[u] ? u : CKEDITOR.tools.htmlDecodeAttr(a)
							}
						this.onTagOpen(r, l, c), !o && CKEDITOR.dtd.$cdata[r] && (o = [])
					}
				} else(r = i[2]) && this.onComment(r);
				else this.onTagClose(r);
				n.length > s && this.onText(n.substring(s, n.length))
			}
		}
	}(), CKEDITOR.htmlParser.basicWriter = CKEDITOR.tools.createClass({
		$: function() {
			this._ = {
				output: []
			}
		},
		proto: {
			openTag: function(e) {
				this._.output.push("<", e)
			},
			openTagClose: function(e, t) {
				this._.output.push(t ? " />" : ">")
			},
			attribute: function(e, t) {
				"string" == typeof t && (t = CKEDITOR.tools.htmlEncodeAttr(t)), this._.output.push(" ", e, '="', t, '"')
			},
			closeTag: function(e) {
				this._.output.push("</", e, ">")
			},
			text: function(e) {
				this._.output.push(e)
			},
			comment: function(e) {
				this._.output.push("<!--", e, "-->")
			},
			write: function(e) {
				this._.output.push(e)
			},
			reset: function() {
				this._.output = [], this._.indent = !1
			},
			getHtml: function(e) {
				var t = this._.output.join("");
				return e && this.reset(), t
			}
		}
	}), function() {
		CKEDITOR.htmlParser.node = function() {}, CKEDITOR.htmlParser.node.prototype = {
			remove: function() {
				var e = this.parent.children,
					t = CKEDITOR.tools.indexOf(e, this),
					n = this.previous,
					i = this.next;
				n && (n.next = i), i && (i.previous = n), e.splice(t, 1), this.parent = null
			},
			replaceWith: function(e) {
				var t = this.parent.children,
					n = CKEDITOR.tools.indexOf(t, this),
					i = e.previous = this.previous,
					r = e.next = this.next;
				i && (i.next = e), r && (r.previous = e), t[n] = e, e.parent = this.parent, this.parent = null
			},
			insertAfter: function(e) {
				var t = e.parent.children,
					n = CKEDITOR.tools.indexOf(t, e),
					i = e.next;
				t.splice(n + 1, 0, this), this.next = e.next, this.previous = e, e.next = this, i && (i.previous = this), this.parent = e.parent
			},
			insertBefore: function(e) {
				var t = e.parent.children,
					n = CKEDITOR.tools.indexOf(t, e);
				t.splice(n, 0, this), this.next = e, (this.previous = e.previous) && (e.previous.next = this), e.previous = this, this.parent = e.parent
			},
			getAscendant: function(e) {
				for (var t = ("function" == typeof e ? e : "string" == typeof e ? function(t) {
						return t.name == e
					} : function(t) {
						return t.name in e
					}), n = this.parent; n && n.type == CKEDITOR.NODE_ELEMENT;) {
					if (t(n)) return n;
					n = n.parent
				}
				return null
			},
			wrapWith: function(e) {
				return this.replaceWith(e), e.add(this), e
			},
			getIndex: function() {
				return CKEDITOR.tools.indexOf(this.parent.children, this)
			},
			getFilterContext: function(e) {
				return e || {}
			}
		}
	}(), CKEDITOR.htmlParser.comment = function(e) {
		this.value = e, this._ = {
			isBlockLike: !1
		}
	}, CKEDITOR.htmlParser.comment.prototype = CKEDITOR.tools.extend(new CKEDITOR.htmlParser.node, {
		type: CKEDITOR.NODE_COMMENT,
		filter: function(e, t) {
			var n = this.value;
			return (n = e.onComment(t, n, this)) ? "string" != typeof n ? (this.replaceWith(n), !1) : (this.value = n, !0) : (this.remove(), !1)
		},
		writeHtml: function(e, t) {
			t && this.filter(t), e.comment(this.value)
		}
	}), function() {
		CKEDITOR.htmlParser.text = function(e) {
			this.value = e, this._ = {
				isBlockLike: !1
			}
		}, CKEDITOR.htmlParser.text.prototype = CKEDITOR.tools.extend(new CKEDITOR.htmlParser.node, {
			type: CKEDITOR.NODE_TEXT,
			filter: function(e, t) {
				return (this.value = e.onText(t, this.value, this)) ? void 0 : (this.remove(), !1)
			},
			writeHtml: function(e, t) {
				t && this.filter(t), e.text(this.value)
			}
		})
	}(), function() {
		CKEDITOR.htmlParser.cdata = function(e) {
			this.value = e
		}, CKEDITOR.htmlParser.cdata.prototype = CKEDITOR.tools.extend(new CKEDITOR.htmlParser.node, {
			type: CKEDITOR.NODE_TEXT,
			filter: function() {},
			writeHtml: function(e) {
				e.write(this.value)
			}
		})
	}(), CKEDITOR.htmlParser.fragment = function() {
		this.children = [], this.parent = null, this._ = {
			isBlockLike: !0,
			hasInlineStarted: !1
		}
	}, function() {
		function e(e) {
			return e.attributes["data-cke-survive"] ? !1 : "a" == e.name && e.attributes.href || CKEDITOR.dtd.$removeEmpty[e.name]
		}
		var t = CKEDITOR.tools.extend({
				table: 1,
				ul: 1,
				ol: 1,
				dl: 1
			}, CKEDITOR.dtd.table, CKEDITOR.dtd.ul, CKEDITOR.dtd.ol, CKEDITOR.dtd.dl),
			n = {
				ol: 1,
				ul: 1
			},
			i = CKEDITOR.tools.extend({}, {
				html: 1
			}, CKEDITOR.dtd.html, CKEDITOR.dtd.body, CKEDITOR.dtd.head, {
				style: 1,
				script: 1
			}),
			r = {
				ul: "li",
				ol: "li",
				dl: "dd",
				table: "tbody",
				tbody: "tr",
				thead: "tr",
				tfoot: "tr",
				tr: "td"
			};
		CKEDITOR.htmlParser.fragment.fromHtml = function(o, s, a) {
			function l(e) {
				var t;
				if (T.length > 0)
					for (var n = 0; n < T.length; n++) {
						var i = T[n],
							r = i.name,
							o = CKEDITOR.dtd[r],
							s = C.name && CKEDITOR.dtd[C.name];
						s && !s[r] || e && o && !o[e] && CKEDITOR.dtd[e] ? r == C.name && (d(C, C.parent, 1), n--) : (t || (c(), t = 1), i = i.clone(), i.parent = C, C = i, T.splice(n, 1), n--)
					}
			}

			function c() {
				for (; O.length;) d(O.shift(), C)
			}

			function u(e) {
				if (e._.isBlockLike && "pre" != e.name && "textarea" != e.name) {
					var t, n = e.children.length,
						i = e.children[n - 1];
					i && i.type == CKEDITOR.NODE_TEXT && ((t = CKEDITOR.tools.rtrim(i.value)) ? i.value = t : e.children.length = n - 1)
				}
			}

			function d(t, n, i) {
				var n = n || C || m,
					r = C;
				void 0 === t.previous && (h(n, t) && (C = n, f.onTagOpen(a, {}), t.returnPoint = n = C), u(t), (!e(t) || t.children.length) && n.add(t), "pre" == t.name && (p = !1), "textarea" == t.name && (g = !1)), t.returnPoint ? (C = t.returnPoint, delete t.returnPoint) : C = i ? n : r
			}

			function h(e, t) {
				if ((e == m || "body" == e.name) && a && (!e.name || CKEDITOR.dtd[e.name][a])) {
					var n, i;
					return (n = t.attributes && (i = t.attributes["data-cke-real-element-type"]) ? i : t.name) && n in CKEDITOR.dtd.$inline && !(n in CKEDITOR.dtd.head) && !t.isOrphan || t.type == CKEDITOR.NODE_TEXT
				}
			}

			function E(e, t) {
				return e in CKEDITOR.dtd.$listItem || e in CKEDITOR.dtd.$tableContent ? e == t || "dt" == e && "dd" == t || "dd" == e && "dt" == t : !1
			}
			var f = new CKEDITOR.htmlParser,
				m = s instanceof CKEDITOR.htmlParser.element ? s : "string" == typeof s ? new CKEDITOR.htmlParser.element(s) : new CKEDITOR.htmlParser.fragment,
				T = [],
				O = [],
				C = m,
				g = "textarea" == m.name,
				p = "pre" == m.name;
			f.onTagOpen = function(r, o, s, a) {
				if (o = new CKEDITOR.htmlParser.element(r, o), o.isUnknown && s && (o.isEmpty = !0), o.isOptionalClose = a, e(o)) T.push(o);
				else {
					if ("pre" == r) p = !0;
					else {
						if ("br" == r && p) return void C.add(new CKEDITOR.htmlParser.text("\n"));
						"textarea" == r && (g = !0)
					}
					if ("br" == r) O.push(o);
					else {
						for (; a = (s = C.name) ? CKEDITOR.dtd[s] || (C._.isBlockLike ? CKEDITOR.dtd.div : CKEDITOR.dtd.span) : i, !(o.isUnknown || C.isUnknown || a[r]);)
							if (C.isOptionalClose) f.onTagClose(s);
							else if (r in n && s in n) s = C.children, (s = s[s.length - 1]) && "li" == s.name || d(s = new CKEDITOR.htmlParser.element("li"), C), !o.returnPoint && (o.returnPoint = C), C = s;
						else if (r in CKEDITOR.dtd.$listItem && !E(r, s)) f.onTagOpen("li" == r ? "ul" : "dl", {}, 0, 1);
						else if (s in t && !E(r, s)) !o.returnPoint && (o.returnPoint = C), C = C.parent;
						else {
							if (s in CKEDITOR.dtd.$inline && T.unshift(C), !C.parent) {
								o.isOrphan = 1;
								break
							}
							d(C, C.parent, 1)
						}
						l(r), c(), o.parent = C, o.isEmpty ? d(o) : C = o
					}
				}
			}, f.onTagClose = function(e) {
				for (var t = T.length - 1; t >= 0; t--)
					if (e == T[t].name) return void T.splice(t, 1);
				for (var n = [], i = [], r = C; r != m && r.name != e;) r._.isBlockLike || i.unshift(r), n.push(r), r = r.returnPoint || r.parent;
				if (r != m) {
					for (t = 0; t < n.length; t++) {
						var o = n[t];
						d(o, o.parent)
					}
					C = r, r._.isBlockLike && c(), d(r, r.parent), r == C && (C = C.parent), T = T.concat(i)
				}
				"body" == e && (a = !1)
			}, f.onText = function(e) {
				if (C._.hasInlineStarted && !O.length || p || g || (e = CKEDITOR.tools.ltrim(e), 0 !== e.length)) {
					var n = C.name,
						o = n ? CKEDITOR.dtd[n] || (C._.isBlockLike ? CKEDITOR.dtd.div : CKEDITOR.dtd.span) : i;
					!g && !o["#"] && n in t ? (f.onTagOpen(r[n] || ""), f.onText(e)) : (c(), l(), !p && !g && (e = e.replace(/[\t\r\n ]{2,}|[\t\r\n]/g, " ")), e = new CKEDITOR.htmlParser.text(e), h(C, e) && this.onTagOpen(a, {}, 0, 1), C.add(e))
				}
			}, f.onCDATA = function(e) {
				C.add(new CKEDITOR.htmlParser.cdata(e))
			}, f.onComment = function(e) {
				c(), l(), C.add(new CKEDITOR.htmlParser.comment(e))
			}, f.parse(o);
			for (c(); C != m;) d(C, C.parent, 1);
			return u(m), m
		}, CKEDITOR.htmlParser.fragment.prototype = {
			type: CKEDITOR.NODE_DOCUMENT_FRAGMENT,
			add: function(e, t) {
				isNaN(t) && (t = this.children.length);
				var n = t > 0 ? this.children[t - 1] : null;
				if (n) {
					if (e._.isBlockLike && n.type == CKEDITOR.NODE_TEXT && (n.value = CKEDITOR.tools.rtrim(n.value), 0 === n.value.length)) return this.children.pop(), void this.add(e);
					n.next = e
				}
				e.previous = n, e.parent = this, this.children.splice(t, 0, e), this._.hasInlineStarted || (this._.hasInlineStarted = e.type == CKEDITOR.NODE_TEXT || e.type == CKEDITOR.NODE_ELEMENT && !e._.isBlockLike)
			},
			filter: function(e, t) {
				t = this.getFilterContext(t), e.onRoot(t, this), this.filterChildren(e, !1, t)
			},
			filterChildren: function(e, t, n) {
				if (this.childrenFilteredBy != e.id)
					for (n = this.getFilterContext(n), t && !this.parent && e.onRoot(n, this), this.childrenFilteredBy = e.id, t = 0; t < this.children.length; t++) this.children[t].filter(e, n) === !1 && t--
			},
			writeHtml: function(e, t) {
				t && this.filter(t), this.writeChildrenHtml(e)
			},
			writeChildrenHtml: function(e, t, n) {
				var i = this.getFilterContext();
				for (n && !this.parent && t && t.onRoot(i, this), t && this.filterChildren(t, !1, i), t = 0, n = this.children, i = n.length; i > t; t++) n[t].writeHtml(e)
			},
			forEach: function(e, t, n) {
				if (!(n || t && this.type != t)) var i = e(this);
				if (i !== !1)
					for (var n = this.children, r = 0; r < n.length; r++) i = n[r], i.type == CKEDITOR.NODE_ELEMENT ? i.forEach(e, t) : (!t || i.type == t) && e(i)
			},
			getFilterContext: function(e) {
				return e || {}
			}
		}
	}(), function() {
		function e() {
			this.rules = []
		}

		function t(t, n, i, r) {
			var o, s;
			for (o in n)(s = t[o]) || (s = t[o] = new e), s.add(n[o], i, r)
		}
		CKEDITOR.htmlParser.filter = CKEDITOR.tools.createClass({
			$: function(t) {
				this.id = CKEDITOR.tools.getNextNumber(), this.elementNameRules = new e, this.attributeNameRules = new e, this.elementsRules = {}, this.attributesRules = {}, this.textRules = new e, this.commentRules = new e, this.rootRules = new e, t && this.addRules(t, 10)
			},
			proto: {
				addRules: function(e, n) {
					var i;
					"number" == typeof n ? i = n : n && "priority" in n && (i = n.priority), "number" != typeof i && (i = 10), "object" != typeof n && (n = {}), e.elementNames && this.elementNameRules.addMany(e.elementNames, i, n), e.attributeNames && this.attributeNameRules.addMany(e.attributeNames, i, n), e.elements && t(this.elementsRules, e.elements, i, n), e.attributes && t(this.attributesRules, e.attributes, i, n), e.text && this.textRules.add(e.text, i, n), e.comment && this.commentRules.add(e.comment, i, n), e.root && this.rootRules.add(e.root, i, n)
				},
				applyTo: function(e) {
					e.filter(this)
				},
				onElementName: function(e, t) {
					return this.elementNameRules.execOnName(e, t)
				},
				onAttributeName: function(e, t) {
					return this.attributeNameRules.execOnName(e, t)
				},
				onText: function(e, t, n) {
					return this.textRules.exec(e, t, n)
				},
				onComment: function(e, t, n) {
					return this.commentRules.exec(e, t, n)
				},
				onRoot: function(e, t) {
					return this.rootRules.exec(e, t)
				},
				onElement: function(e, t) {
					for (var n, i = [this.elementsRules["^"], this.elementsRules[t.name], this.elementsRules.$], r = 0; 3 > r; r++)
						if (n = i[r]) {
							if (n = n.exec(e, t, this), n === !1) return null;
							if (n && n != t) return this.onNode(e, n);
							if (t.parent && !t.name) break
						}
					return t
				},
				onNode: function(e, t) {
					var n = t.type;
					return n == CKEDITOR.NODE_ELEMENT ? this.onElement(e, t) : n == CKEDITOR.NODE_TEXT ? new CKEDITOR.htmlParser.text(this.onText(e, t.value)) : n == CKEDITOR.NODE_COMMENT ? new CKEDITOR.htmlParser.comment(this.onComment(e, t.value)) : null
				},
				onAttribute: function(e, t, n, i) {
					return (n = this.attributesRules[n]) ? n.exec(e, i, t, this) : i
				}
			}
		}), CKEDITOR.htmlParser.filterRulesGroup = e, e.prototype = {
			add: function(e, t, n) {
				this.rules.splice(this.findIndex(t), 0, {
					value: e,
					priority: t,
					options: n
				})
			},
			addMany: function(e, t, n) {
				for (var i = [this.findIndex(t), 0], r = 0, o = e.length; o > r; r++) i.push({
					value: e[r],
					priority: t,
					options: n
				});
				this.rules.splice.apply(this.rules, i)
			},
			findIndex: function(e) {
				for (var t = this.rules, n = t.length - 1; n >= 0 && e < t[n].priority;) n--;
				return n + 1
			},
			exec: function(e, t) {
				var n, i, r, o, s = t instanceof CKEDITOR.htmlParser.node || t instanceof CKEDITOR.htmlParser.fragment,
					a = Array.prototype.slice.call(arguments, 1),
					l = this.rules,
					c = l.length;
				for (o = 0; c > o; o++)
					if (s && (n = t.type, i = t.name), r = l[o], !(e.nonEditable && !r.options.applyToAll || e.nestedEditable && r.options.excludeNestedEditable)) {
						if (r = r.value.apply(null, a), r === !1 || s && r && (r.name != i || r.type != n)) return r;
						void 0 != r && (a[0] = t = r)
					}
				return t
			},
			execOnName: function(e, t) {
				for (var n, i = 0, r = this.rules, o = r.length; t && o > i; i++) n = r[i], !(e.nonEditable && !n.options.applyToAll || e.nestedEditable && n.options.excludeNestedEditable) && (t = t.replace(n.value[0], n.value[1]));
				return t
			}
		}
	}(), function() {
		function e(e, t) {
			function a(e) {
				return e || CKEDITOR.env.needsNbspFiller ? new CKEDITOR.htmlParser.text(" ") : new CKEDITOR.htmlParser.element("br", {
					"data-cke-bogus": 1
				})
			}

			function l(e, t) {
				return function(r) {
					if (r.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT) {
						var s, l, u = [],
							d = n(r);
						if (d)
							for (c(d, 1) && u.push(d); d;) o(d) && (s = i(d)) && c(s) && ((l = i(s)) && !o(l) ? u.push(s) : (a(h).insertAfter(s), s.remove())), d = d.previous;
						for (d = 0; d < u.length; d++) u[d].remove();
						(u = ("function" == typeof t ? t(r) : t) !== !1) && ((h || CKEDITOR.env.needsBrFiller || r.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT) && (h || CKEDITOR.env.needsBrFiller || !(document.documentMode > 7 || r.name in CKEDITOR.dtd.tr || r.name in CKEDITOR.dtd.$listItem)) ? (u = n(r), u = !u || "form" == r.name && "input" == u.name) : u = !1), u && r.add(a(e))
					}
				}
			}

			function c(e, t) {
				if ((!h || CKEDITOR.env.needsBrFiller) && e.type == CKEDITOR.NODE_ELEMENT && "br" == e.name && !e.attributes["data-cke-eol"]) return !0;
				var n;
				if (e.type == CKEDITOR.NODE_TEXT && (n = e.value.match(T))) {
					if (n.index && (new CKEDITOR.htmlParser.text(e.value.substring(0, n.index)).insertBefore(e), e.value = n[0]), !CKEDITOR.env.needsBrFiller && h && (!t || e.parent.name in E)) return !0;
					if (!h && ((n = e.previous) && "br" == n.name || !n || o(n))) return !0
				}
				return !1
			}
			var u, d = {
					elements: {}
				},
				h = "html" == t,
				E = CKEDITOR.tools.extend({}, p);
			for (u in E) "#" in C[u] || delete E[u];
			for (u in E) d.elements[u] = l(h, e.config.fillEmptyBlocks);
			return d.root = l(h, !1), d.elements.br = function(e) {
				return function(t) {
					if (t.parent.type != CKEDITOR.NODE_DOCUMENT_FRAGMENT) {
						var n = t.attributes;
						if ("data-cke-bogus" in n || "data-cke-eol" in n) delete n["data-cke-bogus"];
						else {
							for (n = t.next; n && r(n);) n = n.next;
							var l = i(t);
							!n && o(t.parent) ? s(t.parent, a(e)) : o(n) && l && !o(l) && a(e).insertBefore(n)
						}
					}
				}
			}(h), d
		}

		function t(e, t) {
			return e != CKEDITOR.ENTER_BR && t !== !1 ? e == CKEDITOR.ENTER_DIV ? "div" : "p" : !1
		}

		function n(e) {
			for (e = e.children[e.children.length - 1]; e && r(e);) e = e.previous;
			return e
		}

		function i(e) {
			for (e = e.previous; e && r(e);) e = e.previous;
			return e
		}

		function r(e) {
			return e.type == CKEDITOR.NODE_TEXT && !CKEDITOR.tools.trim(e.value) || e.type == CKEDITOR.NODE_ELEMENT && e.attributes["data-cke-bookmark"]
		}

		function o(e) {
			return e && (e.type == CKEDITOR.NODE_ELEMENT && e.name in p || e.type == CKEDITOR.NODE_DOCUMENT_FRAGMENT)
		}

		function s(e, t) {
			var n = e.children[e.children.length - 1];
			e.children.push(t), t.parent = e, n && (n.next = t, t.previous = n)
		}

		function a(e) {
			e = e.attributes, "false" != e.contenteditable && (e["data-cke-editable"] = e.contenteditable ? "true" : 1), e.contenteditable = "false"
		}

		function l(e) {
			switch (e = e.attributes, e["data-cke-editable"]) {
				case "true":
					e.contenteditable = "true";
					break;
				case "1":
					delete e.contenteditable
			}
		}

		function c(e) {
			return e.replace(K, function(e, t, n) {
				return "<" + t + n.replace(b, function(e, t) {
					return y.test(t) && -1 == n.indexOf("data-cke-saved-" + t) ? " data-cke-saved-" + e + " data-cke-" + CKEDITOR.rnd + "-" + e : e
				}) + ">"
			})
		}

		function u(e, t) {
			return e.replace(t, function(e, t, n) {
				return 0 === e.indexOf("<textarea") && (e = t + E(n).replace(/</g, "&lt;").replace(/>/g, "&gt;") + "</textarea>"), "<cke:encoded>" + encodeURIComponent(e) + "</cke:encoded>"
			})
		}

		function d(e) {
			return e.replace(_, function(e, t) {
				return decodeURIComponent(t)
			})
		}

		function h(e) {
			return e.replace(/<\!--(?!{cke_protected})[\s\S]+?--\>/g, function(e) {
				return "<!--" + O + "{C}" + encodeURIComponent(e).replace(/--/g, "%2D%2D") + "-->"
			})
		}

		function E(e) {
			return e.replace(/<\!--\{cke_protected\}\{C\}([\s\S]+?)--\>/g, function(e, t) {
				return decodeURIComponent(t)
			})
		}

		function f(e, t) {
			var n = t._.dataStore;
			return e.replace(/<\!--\{cke_protected\}([\s\S]+?)--\>/g, function(e, t) {
				return decodeURIComponent(t)
			}).replace(/\{cke_protected_(\d+)\}/g, function(e, t) {
				return n && n[t] || ""
			})
		}

		function m(e, t) {
			for (var n = [], i = t.config.protectedSource, r = t._.dataStore || (t._.dataStore = {
					id: 1
				}), o = /<\!--\{cke_temp(comment)?\}(\d*?)--\>/g, i = [/<script[\s\S]*?<\/script>/gi, /<noscript[\s\S]*?<\/noscript>/gi, /<meta[\s\S]*?\/?>/gi].concat(i), e = e.replace(/<\!--[\s\S]*?--\>/g, function(e) {
					return "<!--{cke_tempcomment}" + (n.push(e) - 1) + "-->"
				}), s = 0; s < i.length; s++) e = e.replace(i[s], function(e) {
				return e = e.replace(o, function(e, t, i) {
					return n[i]
				}), /cke_temp(comment)?/.test(e) ? e : "<!--{cke_temp}" + (n.push(e) - 1) + "-->"
			});
			return e = e.replace(o, function(e, t, i) {
				return "<!--" + O + (t ? "{C}" : "") + encodeURIComponent(n[i]).replace(/--/g, "%2D%2D") + "-->"
			}), e = e.replace(/<\w+(?:\s+(?:(?:[^\s=>]+\s*=\s*(?:[^'"\s>]+|'[^']*'|"[^"]*"))|[^\s=>]+))+\s*>/g, function(e) {
				return e.replace(/<\!--\{cke_protected\}([^>]*)--\>/g, function(e, t) {
					return r[r.id] = decodeURIComponent(t), "{cke_protected_" + r.id++ +"}"
				})
			}), e = e.replace(/<(title|iframe|textarea)([^>]*)>([\s\S]*?)<\/\1>/g, function(e, n, i, r) {
				return "<" + n + i + ">" + f(E(r), t) + "</" + n + ">"
			})
		}
		CKEDITOR.htmlDataProcessor = function(n) {
			var i, r, o = this;
			this.editor = n, this.dataFilter = i = new CKEDITOR.htmlParser.filter, this.htmlFilter = r = new CKEDITOR.htmlParser.filter, this.writer = new CKEDITOR.htmlParser.basicWriter, i.addRules(D), i.addRules(I, {
				applyToAll: !0
			}), i.addRules(e(n, "data"), {
				applyToAll: !0
			}), r.addRules(R), r.addRules(v, {
				applyToAll: !0
			}), r.addRules(e(n, "html"), {
				applyToAll: !0
			}), n.on("toHtml", function(e) {
				var i, e = e.data,
					r = e.dataValue,
					r = m(r, n),
					r = u(r, k),
					r = c(r),
					r = u(r, N),
					r = r.replace(S, "$1cke:$2"),
					r = r.replace(A, "<cke:$1$2></cke:$1>"),
					r = r.replace(/(<pre\b[^>]*>)(\r\n|\n)/g, "$1$2$2"),
					r = r.replace(/([^a-z0-9<\-])(on\w{3,})(?!>)/gi, "$1data-cke-" + CKEDITOR.rnd + "-$2"),
					o = e.context || n.editable().getName();
				CKEDITOR.env.ie && CKEDITOR.env.version < 9 && "pre" == o && (o = "div", r = "<pre>" + r + "</pre>", i = 1), o = n.document.createElement(o), o.setHtml("a" + r), r = o.getHtml().substr(1), r = r.replace(RegExp("data-cke-" + CKEDITOR.rnd + "-", "ig"), ""), i && (r = r.replace(/^<pre>|<\/pre>$/gi, "")), r = r.replace(w, "$1$2"), r = d(r), r = E(r), e.dataValue = CKEDITOR.htmlParser.fragment.fromHtml(r, e.context, e.fixForBody === !1 ? !1 : t(e.enterMode, n.config.autoParagraph))
			}, null, null, 5), n.on("toHtml", function(e) {
				e.data.filter.applyTo(e.data.dataValue, !0, e.data.dontFilter, e.data.enterMode) && n.fire("dataFiltered")
			}, null, null, 6), n.on("toHtml", function(e) {
				e.data.dataValue.filterChildren(o.dataFilter, !0)
			}, null, null, 10), n.on("toHtml", function(e) {
				var e = e.data,
					t = e.dataValue,
					n = new CKEDITOR.htmlParser.basicWriter;
				t.writeChildrenHtml(n), t = n.getHtml(!0), e.dataValue = h(t)
			}, null, null, 15), n.on("toDataFormat", function(e) {
				var i = e.data.dataValue;
				e.data.enterMode != CKEDITOR.ENTER_BR && (i = i.replace(/^<br *\/?>/i, "")), e.data.dataValue = CKEDITOR.htmlParser.fragment.fromHtml(i, e.data.context, t(e.data.enterMode, n.config.autoParagraph))
			}, null, null, 5), n.on("toDataFormat", function(e) {
				e.data.dataValue.filterChildren(o.htmlFilter, !0)
			}, null, null, 10), n.on("toDataFormat", function(e) {
				e.data.filter.applyTo(e.data.dataValue, !1, !0)
			}, null, null, 11), n.on("toDataFormat", function(e) {
				var t = e.data.dataValue,
					i = o.writer;
				i.reset(), t.writeChildrenHtml(i), t = i.getHtml(!0), t = E(t), t = f(t, n), e.data.dataValue = t
			}, null, null, 15)
		}, CKEDITOR.htmlDataProcessor.prototype = {
			toHtml: function(e, t, n, i) {
				var r, o, s, a = this.editor;
				return t && "object" == typeof t ? (r = t.context, n = t.fixForBody, i = t.dontFilter, o = t.filter, s = t.enterMode) : r = t, !r && null !== r && (r = a.editable().getName()), a.fire("toHtml", {
					dataValue: e,
					context: r,
					fixForBody: n,
					dontFilter: i,
					filter: o || a.filter,
					enterMode: s || a.enterMode
				}).dataValue
			},
			toDataFormat: function(e, t) {
				var n, i, r;
				return t && (n = t.context, i = t.filter, r = t.enterMode), !n && null !== n && (n = this.editor.editable().getName()), this.editor.fire("toDataFormat", {
					dataValue: e,
					filter: i || this.editor.filter,
					context: n,
					enterMode: r || this.editor.enterMode
				}).dataValue
			}
		};
		var T = /(?:&nbsp;|\xa0)$/,
			O = "{cke_protected}",
			C = CKEDITOR.dtd,
			g = ["caption", "colgroup", "col", "thead", "tfoot", "tbody"],
			p = CKEDITOR.tools.extend({}, C.$blockLimit, C.$block),
			D = {
				elements: {
					input: a,
					textarea: a
				}
			},
			I = {
				attributeNames: [
					[/^on/, "data-cke-pa-on"],
					[/^data-cke-expando$/, ""]
				]
			},
			R = {
				elements: {
					embed: function(e) {
						var t = e.parent;
						if (t && "object" == t.name) {
							var n = t.attributes.width,
								t = t.attributes.height;
							n && (e.attributes.width = n), t && (e.attributes.height = t)
						}
					},
					a: function(e) {
						return e.children.length || e.attributes.name || e.attributes["data-cke-saved-name"] ? void 0 : !1
					}
				}
			},
			v = {
				elementNames: [
					[/^cke:/, ""],
					[/^\?xml:namespace$/, ""]
				],
				attributeNames: [
					[/^data-cke-(saved|pa)-/, ""],
					[/^data-cke-.*/, ""],
					["hidefocus", ""]
				],
				elements: {
					$: function(e) {
						var t = e.attributes;
						if (t) {
							if (t["data-cke-temp"]) return !1;
							for (var n, i = ["name", "href", "src"], r = 0; r < i.length; r++) n = "data-cke-saved-" + i[r], n in t && delete t[i[r]]
						}
						return e
					},
					table: function(e) {
						e.children.slice(0).sort(function(e, t) {
							var n, i;
							return e.type == CKEDITOR.NODE_ELEMENT && t.type == e.type && (n = CKEDITOR.tools.indexOf(g, e.name), i = CKEDITOR.tools.indexOf(g, t.name)), n > -1 && i > -1 && n != i || (n = e.parent ? e.getIndex() : -1, i = t.parent ? t.getIndex() : -1), n > i ? 1 : -1
						})
					},
					param: function(e) {
						return e.children = [], e.isEmpty = !0, e
					},
					span: function(e) {
						"Apple-style-span" == e.attributes["class"] && delete e.name
					},
					html: function(e) {
						delete e.attributes.contenteditable, delete e.attributes["class"]
					},
					body: function(e) {
						delete e.attributes.spellcheck, delete e.attributes.contenteditable
					},
					style: function(e) {
						var t = e.children[0];
						t && t.value && (t.value = CKEDITOR.tools.trim(t.value)), e.attributes.type || (e.attributes.type = "text/css")
					},
					title: function(e) {
						var t = e.children[0];
						!t && s(e, t = new CKEDITOR.htmlParser.text), t.value = e.attributes["data-cke-title"] || ""
					},
					input: l,
					textarea: l
				},
				attributes: {
					"class": function(e) {
						return CKEDITOR.tools.ltrim(e.replace(/(?:^|\s+)cke_[^\s]*/g, "")) || !1
					}
				}
			};
		CKEDITOR.env.ie && (v.attributes.style = function(e) {
			return e.replace(/(^|;)([^\:]+)/g, function(e) {
				return e.toLowerCase()
			})
		});
		var K = /<(a|area|img|input|source)\b([^>]*)>/gi,
			b = /([\w-]+)\s*=\s*(?:(?:"[^"]*")|(?:'[^']*')|(?:[^ "'>]+))/gi,
			y = /^(href|src|name)$/i,
			N = /(?:<style(?=[ >])[^>]*>[\s\S]*?<\/style>)|(?:<(:?link|meta|base)[^>]*>)/gi,
			k = /(<textarea(?=[ >])[^>]*>)([\s\S]*?)(?:<\/textarea>)/gi,
			_ = /<cke:encoded>([^<]*)<\/cke:encoded>/gi,
			S = /(<\/?)((?:object|embed|param|html|body|head|title)[^>]*>)/gi,
			w = /(<\/?)cke:((?:html|body|head|title)[^>]*>)/gi,
			A = /<cke:(param|embed)([^>]*?)\/?>(?!\s*<\/cke:\1)/gi
	}(), CKEDITOR.htmlParser.element = function(e, t) {
		this.name = e, this.attributes = t || {}, this.children = [];
		var n = e || "",
			i = n.match(/^cke:(.*)/);
		i && (n = i[1]), n = !!(CKEDITOR.dtd.$nonBodyContent[n] || CKEDITOR.dtd.$block[n] || CKEDITOR.dtd.$listItem[n] || CKEDITOR.dtd.$tableContent[n] || CKEDITOR.dtd.$nonEditable[n] || "br" == n), this.isEmpty = !!CKEDITOR.dtd.$empty[e], this.isUnknown = !CKEDITOR.dtd[e], this._ = {
			isBlockLike: n,
			hasInlineStarted: this.isEmpty || !n
		}
	}, CKEDITOR.htmlParser.cssStyle = function(e) {
		var t = {};
		return ((e instanceof CKEDITOR.htmlParser.element ? e.attributes.style : e) || "").replace(/&quot;/g, '"').replace(/\s*([^ :;]+)\s*:\s*([^;]+)\s*(?=;|$)/g, function(e, n, i) {
			"font-family" == n && (i = i.replace(/["']/g, "")), t[n.toLowerCase()] = i
		}), {
			rules: t,
			populate: function(e) {
				var t = this.toString();
				t && (e instanceof CKEDITOR.dom.element ? e.setAttribute("style", t) : e instanceof CKEDITOR.htmlParser.element ? e.attributes.style = t : e.style = t)
			},
			toString: function() {
				var e, n = [];
				for (e in t) t[e] && n.push(e, ":", t[e], ";");
				return n.join("")
			}
		}
	}, function() {
		function e(e) {
			return function(t) {
				return t.type == CKEDITOR.NODE_ELEMENT && ("string" == typeof e ? t.name == e : t.name in e)
			}
		}
		var t = function(e, t) {
				return e = e[0], t = t[0], t > e ? -1 : e > t ? 1 : 0
			},
			n = CKEDITOR.htmlParser.fragment.prototype;
		CKEDITOR.htmlParser.element.prototype = CKEDITOR.tools.extend(new CKEDITOR.htmlParser.node, {
			type: CKEDITOR.NODE_ELEMENT,
			add: n.add,
			clone: function() {
				return new CKEDITOR.htmlParser.element(this.name, this.attributes)
			},
			filter: function(e, t) {
				var n, i, r = this,
					t = r.getFilterContext(t);
				if (t.off) return !0;
				for (r.parent || e.onRoot(t, r);;) {
					if (n = r.name, !(i = e.onElementName(t, n))) return this.remove(), !1;
					if (r.name = i, !(r = e.onElement(t, r))) return this.remove(), !1;
					if (r !== this) return this.replaceWith(r), !1;
					if (r.name == n) break;
					if (r.type != CKEDITOR.NODE_ELEMENT) return this.replaceWith(r), !1;
					if (!r.name) return this.replaceWithChildren(), !1
				}
				n = r.attributes;
				var o, s;
				for (o in n) {
					for (s = o, i = n[o];;) {
						if (!(s = e.onAttributeName(t, o))) {
							delete n[o];
							break
						}
						if (s == o) break;
						delete n[o], o = s
					}
					s && ((i = e.onAttribute(t, r, s, i)) === !1 ? delete n[s] : n[s] = i)
				}
				return r.isEmpty || this.filterChildren(e, !1, t), !0
			},
			filterChildren: n.filterChildren,
			writeHtml: function(e, n) {
				n && this.filter(n);
				var i, r, o = this.name,
					s = [],
					a = this.attributes;
				e.openTag(o, a);
				for (i in a) s.push([i, a[i]]);
				for (e.sortAttributes && s.sort(t), i = 0, r = s.length; r > i; i++) a = s[i], e.attribute(a[0], a[1]);
				e.openTagClose(o, this.isEmpty), this.writeChildrenHtml(e), this.isEmpty || e.closeTag(o)
			},
			writeChildrenHtml: n.writeChildrenHtml,
			replaceWithChildren: function() {
				for (var e = this.children, t = e.length; t;) e[--t].insertAfter(this);
				this.remove()
			},
			forEach: n.forEach,
			getFirst: function(t) {
				if (!t) return this.children.length ? this.children[0] : null;
				"function" != typeof t && (t = e(t));
				for (var n = 0, i = this.children.length; i > n; ++n)
					if (t(this.children[n])) return this.children[n];
				return null
			},
			getHtml: function() {
				var e = new CKEDITOR.htmlParser.basicWriter;
				return this.writeChildrenHtml(e), e.getHtml()
			},
			setHtml: function(e) {
				for (var e = this.children = CKEDITOR.htmlParser.fragment.fromHtml(e).children, t = 0, n = e.length; n > t; ++t) e[t].parent = this
			},
			getOuterHtml: function() {
				var e = new CKEDITOR.htmlParser.basicWriter;
				return this.writeHtml(e), e.getHtml()
			},
			split: function(e) {
				for (var t = this.children.splice(e, this.children.length - e), n = this.clone(), i = 0; i < t.length; ++i) t[i].parent = n;
				return n.children = t, t[0] && (t[0].previous = null), e > 0 && (this.children[e - 1].next = null), this.parent.add(n, this.getIndex() + 1), n
			},
			addClass: function(e) {
				if (!this.hasClass(e)) {
					var t = this.attributes["class"] || "";
					this.attributes["class"] = t + (t ? " " : "") + e
				}
			},
			removeClass: function(e) {
				var t = this.attributes["class"];
				t && ((t = CKEDITOR.tools.trim(t.replace(RegExp("(?:\\s+|^)" + e + "(?:\\s+|$)"), " "))) ? this.attributes["class"] = t : delete this.attributes["class"])
			},
			hasClass: function(e) {
				var t = this.attributes["class"];
				return t ? RegExp("(?:^|\\s)" + e + "(?=\\s|$)").test(t) : !1
			},
			getFilterContext: function(e) {
				var t = [];
				if (e || (e = {
						off: !1,
						nonEditable: !1,
						nestedEditable: !1
					}), !e.off && "off" == this.attributes["data-cke-processor"] && t.push("off", !0), e.nonEditable || "false" != this.attributes.contenteditable ? e.nonEditable && !e.nestedEditable && "true" == this.attributes.contenteditable && t.push("nestedEditable", !0) : t.push("nonEditable", !0), t.length)
					for (var e = CKEDITOR.tools.copy(e), n = 0; n < t.length; n += 2) e[t[n]] = t[n + 1];
				return e
			}
		}, !0)
	}(), function() {
		var e = {},
			t = /{([^}]+)}/g,
			n = /([\\'])/g,
			i = /\n/g,
			r = /\r/g;
		CKEDITOR.template = function(o) {
			if (e[o]) this.output = e[o];
			else {
				var s = o.replace(n, "\\$1").replace(i, "\\n").replace(r, "\\r").replace(t, function(e, t) {
					return "',data['" + t + "']==undefined?'{" + t + "}':data['" + t + "'],'"
				});
				this.output = e[o] = Function("data", "buffer", "return buffer?buffer.push('" + s + "'):['" + s + "'].join('');")
			}
		}
	}(), delete CKEDITOR.loadFullCore, CKEDITOR.instances = {}, CKEDITOR.document = new CKEDITOR.dom.document(document), CKEDITOR.add = function(e) {
		CKEDITOR.instances[e.name] = e, e.on("focus", function() {
			CKEDITOR.currentInstance != e && (CKEDITOR.currentInstance = e, CKEDITOR.fire("currentInstance"))
		}), e.on("blur", function() {
			CKEDITOR.currentInstance == e && (CKEDITOR.currentInstance = null, CKEDITOR.fire("currentInstance"))
		}), CKEDITOR.fire("instance", null, e)
	}, CKEDITOR.remove = function(e) {
		delete CKEDITOR.instances[e.name]
	}, function() {
		var e = {};
		CKEDITOR.addTemplate = function(t, n) {
			var i = e[t];
			return i ? i : (i = {
				name: t,
				source: n
			}, CKEDITOR.fire("template", i), e[t] = new CKEDITOR.template(i.source))
		}, CKEDITOR.getTemplate = function(t) {
			return e[t]
		}
	}(), function() {
		var e = [];
		CKEDITOR.addCss = function(t) {
			e.push(t)
		}, CKEDITOR.getCss = function() {
			return e.join("\n")
		}
	}(), CKEDITOR.on("instanceDestroyed", function() {
		CKEDITOR.tools.isEmpty(this.instances) && CKEDITOR.fire("reset")
	}), CKEDITOR.TRISTATE_ON = 1, CKEDITOR.TRISTATE_OFF = 2, CKEDITOR.TRISTATE_DISABLED = 0, function() {
		CKEDITOR.inline = function(e, t) {
			if (!CKEDITOR.env.isCompatible) return null;
			if (e = CKEDITOR.dom.element.get(e), e.getEditor()) throw 'The editor instance "' + e.getEditor().name + '" is already attached to the provided element.';
			var n = new CKEDITOR.editor(t, e, CKEDITOR.ELEMENT_MODE_INLINE),
				i = e.is("textarea") ? e : null;
			return i ? (n.setData(i.getValue(), null, !0), e = CKEDITOR.dom.element.createFromHtml('<div contenteditable="' + !!n.readOnly + '" class="cke_textarea_inline">' + i.getValue() + "</div>", CKEDITOR.document), e.insertAfter(i), i.hide(), i.$.form && n._attachToForm()) : n.setData(e.getHtml(), null, !0), n.on("loaded", function() {
				n.fire("uiReady"), n.editable(e), n.container = e, n.setData(n.getData(1)), n.resetDirty(), n.fire("contentDom"), n.mode = "wysiwyg", n.fire("mode"), n.status = "ready", n.fireOnce("instanceReady"), CKEDITOR.fire("instanceReady", null, n)
			}, null, null, 1e4), n.on("destroy", function() {
				i && (n.container.clearCustomData(), n.container.remove(), i.show()), n.element.clearCustomData(), delete n.element
			}), n
		}, CKEDITOR.inlineAll = function() {
			var e, t, n;
			for (n in CKEDITOR.dtd.$editable)
				for (var i = CKEDITOR.document.getElementsByTag(n), r = 0, o = i.count(); o > r; r++) e = i.getItem(r), "true" == e.getAttribute("contenteditable") && (t = {
					element: e,
					config: {}
				}, CKEDITOR.fire("inline", t) !== !1 && CKEDITOR.inline(e, t.config))
		}, CKEDITOR.domReady(function() {
			!CKEDITOR.disableAutoInline && CKEDITOR.inlineAll()
		})
	}(), CKEDITOR.replaceClass = "ckeditor", function() {
		function e(e, i, r, o) {
			if (!CKEDITOR.env.isCompatible) return null;
			if (e = CKEDITOR.dom.element.get(e), e.getEditor()) throw 'The editor instance "' + e.getEditor().name + '" is already attached to the provided element.';
			var s = new CKEDITOR.editor(i, e, o);
			return o == CKEDITOR.ELEMENT_MODE_REPLACE && (e.setStyle("visibility", "hidden"), s._.required = e.hasAttribute("required"), e.removeAttribute("required")), r && s.setData(r, null, !0), s.on("loaded", function() {
				n(s), o == CKEDITOR.ELEMENT_MODE_REPLACE && s.config.autoUpdateElement && e.$.form && s._attachToForm(), s.setMode(s.config.startupMode, function() {
					s.resetDirty(), s.status = "ready", s.fireOnce("instanceReady"), CKEDITOR.fire("instanceReady", null, s)
				})
			}), s.on("destroy", t), s
		}

		function t() {
			var e = this.container,
				t = this.element;
			e && (e.clearCustomData(), e.remove()), t && (t.clearCustomData(), this.elementMode == CKEDITOR.ELEMENT_MODE_REPLACE && (t.show(), this._.required && t.setAttribute("required", "required")), delete this.element)
		}

		function n(e) {
			var t = e.name,
				n = e.element,
				i = e.elementMode,
				r = e.fire("uiSpace", {
					space: "top",
					html: ""
				}).html,
				o = e.fire("uiSpace", {
					space: "bottom",
					html: ""
				}).html,
				s = new CKEDITOR.template('<{outerEl} id="cke_{name}" class="{id} cke cke_reset cke_chrome cke_editor_{name} cke_{langDir} ' + CKEDITOR.env.cssClass + '"  dir="{langDir}" lang="{langCode}" role="application"' + (e.title ? ' aria-labelledby="cke_{name}_arialbl"' : "") + ">" + (e.title ? '<span id="cke_{name}_arialbl" class="cke_voice_label">{voiceLabel}</span>' : "") + '<{outerEl} class="cke_inner cke_reset" role="presentation">{topHtml}<{outerEl} id="{contentId}" class="cke_contents cke_reset" role="presentation"></{outerEl}>{bottomHtml}</{outerEl}></{outerEl}>'),
				t = CKEDITOR.dom.element.createFromHtml(s.output({
					id: e.id,
					name: t,
					langDir: e.lang.dir,
					langCode: e.langCode,
					voiceLabel: e.title,
					topHtml: r ? '<span id="' + e.ui.spaceId("top") + '" class="cke_top cke_reset_all" role="presentation" style="height:auto">' + r + "</span>" : "",
					contentId: e.ui.spaceId("contents"),
					bottomHtml: o ? '<span id="' + e.ui.spaceId("bottom") + '" class="cke_bottom cke_reset_all" role="presentation">' + o + "</span>" : "",
					outerEl: CKEDITOR.env.ie ? "span" : "div"
				}));
			i == CKEDITOR.ELEMENT_MODE_REPLACE ? (n.hide(), t.insertAfter(n)) : n.append(t), e.container = t, r && e.ui.space("top").unselectable(), o && e.ui.space("bottom").unselectable(), n = e.config.width, i = e.config.height, n && t.setStyle("width", CKEDITOR.tools.cssLength(n)), i && e.ui.space("contents").setStyle("height", CKEDITOR.tools.cssLength(i)), t.disableContextMenu(), CKEDITOR.env.webkit && t.on("focus", function() {
				e.focus()
			}), e.fireOnce("uiReady")
		}
		CKEDITOR.replace = function(t, n) {
			return e(t, n, null, CKEDITOR.ELEMENT_MODE_REPLACE)
		}, CKEDITOR.appendTo = function(t, n, i) {
			return e(t, n, i, CKEDITOR.ELEMENT_MODE_APPENDTO)
		}, CKEDITOR.replaceAll = function() {
			for (var e = document.getElementsByTagName("textarea"), t = 0; t < e.length; t++) {
				var n = null,
					i = e[t];
				if (i.name || i.id) {
					if ("string" == typeof arguments[0]) {
						if (!RegExp("(?:^|\\s)" + arguments[0] + "(?:$|\\s)").test(i.className)) continue
					} else if ("function" == typeof arguments[0] && (n = {}, arguments[0](i, n) === !1)) continue;
					this.replace(i, n)
				}
			}
		}, CKEDITOR.editor.prototype.addMode = function(e, t) {
			(this._.modes || (this._.modes = {}))[e] = t
		}, CKEDITOR.editor.prototype.setMode = function(e, t) {
			var n = this,
				i = this._.modes;
			if (e != n.mode && i && i[e]) {
				if (n.fire("beforeSetMode", e), n.mode) {
					var r, o = n.checkDirty(),
						i = n._.previousModeData,
						s = 0;
					n.fire("beforeModeUnload"), n.editable(0), n._.previousMode = n.mode, n._.previousModeData = r = n.getData(1), "source" == n.mode && i == r && (n.fire("lockSnapshot", {
						forceUpdate: !0
					}), s = 1), n.ui.space("contents").setHtml(""), n.mode = ""
				} else n._.previousModeData = n.getData(1);
				this._.modes[e](function() {
					n.mode = e, void 0 !== o && !o && n.resetDirty(), s ? n.fire("unlockSnapshot") : "wysiwyg" == e && n.fire("saveSnapshot"), setTimeout(function() {
						n.fire("mode"), t && t.call(n)
					}, 0)
				})
			}
		}, CKEDITOR.editor.prototype.resize = function(e, t, n, i) {
			var r = this.container,
				o = this.ui.space("contents"),
				s = CKEDITOR.env.webkit && this.document && this.document.getWindow().$.frameElement,
				i = i ? r.getChild(1) : r;
			i.setSize("width", e, !0), s && (s.style.width = "1%"), o.setStyle("height", Math.max(t - (n ? 0 : (i.$.offsetHeight || 0) - (o.$.clientHeight || 0)), 0) + "px"), s && (s.style.width = "100%"), this.fire("resize")
		}, CKEDITOR.editor.prototype.getResizable = function(e) {
			return e ? this.ui.space("contents") : this.container
		}, CKEDITOR.domReady(function() {
			CKEDITOR.replaceClass && CKEDITOR.replaceAll(CKEDITOR.replaceClass)
		})
	}(), CKEDITOR.config.startupMode = "wysiwyg", function() {
		function e(e) {
			var n, r = e.editor,
				o = e.data.path,
				s = o.blockLimit,
				a = e.data.selection,
				l = a.getRanges()[0];
			(CKEDITOR.env.gecko || CKEDITOR.env.ie && CKEDITOR.env.needsBrFiller) && (a = t(a, o)) && (a.appendBogus(), n = CKEDITOR.env.ie), r.config.autoParagraph !== !1 && r.activeEnterMode != CKEDITOR.ENTER_BR && r.editable().equals(s) && !o.block && l.collapsed && !l.getCommonAncestor().isReadOnly() && (o = l.clone(), o.enlarge(CKEDITOR.ENLARGE_BLOCK_CONTENTS), s = new CKEDITOR.dom.walker(o), s.guard = function(e) {
				return !i(e) || e.type == CKEDITOR.NODE_COMMENT || e.isReadOnly()
			}, (!s.checkForward() || o.checkStartOfBlock() && o.checkEndOfBlock()) && (r = l.fixBlock(!0, r.activeEnterMode == CKEDITOR.ENTER_DIV ? "div" : "p"), CKEDITOR.env.needsBrFiller || (r = r.getFirst(i)) && r.type == CKEDITOR.NODE_TEXT && CKEDITOR.tools.trim(r.getText()).match(/^(?:&nbsp;|\xa0)$/) && r.remove(), n = 1, e.cancel())), n && l.select()
		}

		function t(e, t) {
			if (e.isFake) return 0;
			var n = t.block || t.blockLimit,
				r = n && n.getLast(i);
			return !n || !n.isBlockBoundary() || r && r.type == CKEDITOR.NODE_ELEMENT && r.isBlockBoundary() || n.is("pre") || n.getBogus() ? void 0 : n
		}

		function n(e) {
			var t = e.data.getTarget();
			t.is("input") && (t = t.getAttribute("type"), ("submit" == t || "reset" == t) && e.data.preventDefault())
		}

		function i(e) {
			return d(e) && h(e)
		}

		function r(e, t) {
			return function(n) {
				var i = CKEDITOR.dom.element.get(n.data.$.toElement || n.data.$.fromElement || n.data.$.relatedTarget);
				(!i || !t.equals(i) && !t.contains(i)) && e.call(this, n)
			}
		}

		function o(e) {
			var t, n = e.getRanges()[0],
				r = e.root,
				o = {
					table: 1,
					ul: 1,
					ol: 1,
					dl: 1
				};
			if (n.startPath().contains(o)) {
				var e = function(e) {
						return function(n, r) {
							return r && n.type == CKEDITOR.NODE_ELEMENT && n.is(o) && (t = n), r || !i(n) || e && c(n) ? void 0 : !1
						}
					},
					s = n.clone();
				if (s.collapse(1), s.setStartAt(r, CKEDITOR.POSITION_AFTER_START), r = new CKEDITOR.dom.walker(s), r.guard = e(), r.checkBackward(), t) return s = n.clone(), s.collapse(), s.setEndAt(t, CKEDITOR.POSITION_AFTER_END), r = new CKEDITOR.dom.walker(s), r.guard = e(!0), t = !1, r.checkForward(), t
			}
			return null
		}

		function s(e) {
			e.editor.focus(), e.editor.fire("saveSnapshot")
		}

		function a(e) {
			var t = e.editor;
			t.getSelection().scrollIntoView(), setTimeout(function() {
				t.fire("saveSnapshot")
			}, 0)
		}

		function l(e, t, n) {
			for (var i = e.getCommonAncestor(t), t = e = n ? t : e;
				(e = e.getParent()) && !i.equals(e) && 1 == e.getChildCount();) t = e;
			t.remove()
		}
		CKEDITOR.editable = CKEDITOR.tools.createClass({
			base: CKEDITOR.dom.element,
			$: function(e, t) {
				this.base(t.$ || t), this.editor = e, this.status = "unloaded", this.hasFocus = !1, this.setup()
			},
			proto: {
				focus: function() {
					var e;
					if (CKEDITOR.env.webkit && !this.hasFocus && (e = this.editor._.previousActive || this.getDocument().getActive(), this.contains(e))) return void e.focus();
					try {
						this.$[CKEDITOR.env.ie && this.getDocument().equals(CKEDITOR.document) ? "setActive" : "focus"]()
					} catch (t) {
						if (!CKEDITOR.env.ie) throw t
					}
					CKEDITOR.env.safari && !this.isInline() && (e = CKEDITOR.document.getActive(), e.equals(this.getWindow().getFrame()) || this.getWindow().focus())
				},
				on: function(e, t) {
					var n = Array.prototype.slice.call(arguments, 0);
					return CKEDITOR.env.ie && /^focus|blur$/.exec(e) && (e = "focus" == e ? "focusin" : "focusout", t = r(t, this), n[0] = e, n[1] = t), CKEDITOR.dom.element.prototype.on.apply(this, n)
				},
				attachListener: function(e) {
					!this._.listeners && (this._.listeners = []);
					var t = Array.prototype.slice.call(arguments, 1),
						t = e.on.apply(e, t);
					return this._.listeners.push(t), t
				},
				clearListeners: function() {
					var e = this._.listeners;
					try {
						for (; e.length;) e.pop().removeListener()
					} catch (t) {}
				},
				restoreAttrs: function() {
					var e, t, n = this._.attrChanges;
					for (t in n) n.hasOwnProperty(t) && (e = n[t], null !== e ? this.setAttribute(t, e) : this.removeAttribute(t))
				},
				attachClass: function(e) {
					var t = this.getCustomData("classes");
					this.hasClass(e) || (!t && (t = []), t.push(e), this.setCustomData("classes", t), this.addClass(e))
				},
				changeAttr: function(e, t) {
					var n = this.getAttribute(e);
					t !== n && (!this._.attrChanges && (this._.attrChanges = {}), e in this._.attrChanges || (this._.attrChanges[e] = n), this.setAttribute(e, t))
				},
				insertHtml: function(e, t) {
					s(this), E(this, t || "html", e)
				},
				insertText: function(e) {
					s(this);
					var t = this.editor,
						n = t.getSelection().getStartElement().hasAscendant("pre", !0) ? CKEDITOR.ENTER_BR : t.activeEnterMode,
						t = n == CKEDITOR.ENTER_BR,
						i = CKEDITOR.tools,
						e = i.htmlEncode(e.replace(/\r\n/g, "\n")),
						e = e.replace(/\t/g, "&nbsp;&nbsp; &nbsp;"),
						n = n == CKEDITOR.ENTER_P ? "p" : "div";
					if (!t) {
						var r = /\n{2}/g;
						if (r.test(e)) var o = "<" + n + ">",
							a = "</" + n + ">",
							e = o + e.replace(r, function() {
								return a + o
							}) + a
					}
					e = e.replace(/\n/g, "<br>"), t || (e = e.replace(RegExp("<br>(?=</" + n + ">)"), function(e) {
						return i.repeat(e, 2)
					})), e = e.replace(/^ | $/g, "&nbsp;"), e = e.replace(/(>|\s) /g, function(e, t) {
						return t + "&nbsp;"
					}).replace(/ (?=<)/g, "&nbsp;"), E(this, "text", e)
				},
				insertElement: function(e, t) {
					t ? this.insertElementIntoRange(e, t) : this.insertElementIntoSelection(e)
				},
				insertElementIntoRange: function(e, t) {
					var n = this.editor,
						i = n.config.enterMode,
						r = e.getName(),
						o = CKEDITOR.dtd.$block[r];
					if (t.checkReadOnly()) return !1;
					t.deleteContents(1), t.startContainer.type == CKEDITOR.NODE_ELEMENT && t.startContainer.is({
						tr: 1,
						table: 1,
						tbody: 1,
						thead: 1,
						tfoot: 1
					}) && f(t);
					var s, a;
					if (o)
						for (;
							(s = t.getCommonAncestor(0, 1)) && (a = CKEDITOR.dtd[s.getName()]) && (!a || !a[r]);) s.getName() in CKEDITOR.dtd.span ? t.splitElement(s) : t.checkStartOfBlock() && t.checkEndOfBlock() ? (t.setStartBefore(s), t.collapse(!0), s.remove()) : t.splitBlock(i == CKEDITOR.ENTER_DIV ? "div" : "p", n.editable());
					return t.insertNode(e), !0
				},
				insertElementIntoSelection: function(e) {
					s(this);
					var t = this.editor,
						n = t.activeEnterMode,
						t = t.getSelection(),
						r = t.getRanges()[0],
						o = e.getName(),
						o = CKEDITOR.dtd.$block[o];
					this.insertElementIntoRange(e, r) && (r.moveToPosition(e, CKEDITOR.POSITION_AFTER_END), o && ((o = e.getNext(function(e) {
						return i(e) && !c(e)
					})) && o.type == CKEDITOR.NODE_ELEMENT && o.is(CKEDITOR.dtd.$block) ? o.getDtd()["#"] ? r.moveToElementEditStart(o) : r.moveToElementEditEnd(e) : o || n == CKEDITOR.ENTER_BR || (o = r.fixBlock(!0, n == CKEDITOR.ENTER_DIV ? "div" : "p"), r.moveToElementEditStart(o)))), t.selectRanges([r]), a(this)
				},
				setData: function(e, t) {
					t || (e = this.editor.dataProcessor.toHtml(e)), this.setHtml(e), "unloaded" == this.status && (this.status = "ready"), this.editor.fire("dataReady")
				},
				getData: function(e) {
					var t = this.getHtml();
					return e || (t = this.editor.dataProcessor.toDataFormat(t)), t
				},
				setReadOnly: function(e) {
					this.setAttribute("contenteditable", !e)
				},
				detach: function() {
					this.removeClass("cke_editable"), this.status = "detached";
					var e = this.editor;
					this._.detach(), delete e.document, delete e.window
				},
				isInline: function() {
					return this.getDocument().equals(CKEDITOR.document)
				},
				setup: function() {
					var e = this.editor;
					if (this.attachListener(e, "beforeGetData", function() {
							var t = this.getData();
							this.is("textarea") || e.config.ignoreEmptyParagraph !== !1 && (t = t.replace(u, function(e, t) {
								return t
							})), e.setData(t, null, 1)
						}, this), this.attachListener(e, "getSnapshot", function(e) {
							e.data = this.getData(1)
						}, this), this.attachListener(e, "afterSetData", function() {
							this.setData(e.getData(1))
						}, this), this.attachListener(e, "loadSnapshot", function(e) {
							this.setData(e.data, 1)
						}, this), this.attachListener(e, "beforeFocus", function() {
							var t = e.getSelection();
							(t = t && t.getNative()) && "Control" == t.type || this.focus()
						}, this), this.attachListener(e, "insertHtml", function(e) {
							this.insertHtml(e.data.dataValue, e.data.mode)
						}, this), this.attachListener(e, "insertElement", function(e) {
							this.insertElement(e.data)
						}, this), this.attachListener(e, "insertText", function(e) {
							this.insertText(e.data)
						}, this), this.setReadOnly(e.readOnly), this.attachClass("cke_editable"), this.attachClass(e.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? "cke_editable_inline" : e.elementMode == CKEDITOR.ELEMENT_MODE_REPLACE || e.elementMode == CKEDITOR.ELEMENT_MODE_APPENDTO ? "cke_editable_themed" : ""), this.attachClass("cke_contents_" + e.config.contentsLangDirection), e.keystrokeHandler.blockedKeystrokes[8] = +e.readOnly, e.keystrokeHandler.attach(this), this.on("blur", function() {
							this.hasFocus = !1
						}, null, null, -1), this.on("focus", function() {
							this.hasFocus = !0
						}, null, null, -1), e.focusManager.add(this), this.equals(CKEDITOR.document.getActive()) && (this.hasFocus = !0, e.once("contentDom", function() {
							e.focusManager.focus()
						})), this.isInline() && this.changeAttr("tabindex", e.tabIndex), !this.is("textarea")) {
						e.document = this.getDocument(), e.window = this.getWindow();
						var t = e.document;
						this.changeAttr("spellcheck", !e.config.disableNativeSpellChecker);
						var r = e.config.contentsLangDirection;
						this.getDirection(1) != r && this.changeAttr("dir", r);
						var s = CKEDITOR.getCss();
						s && (r = t.getHead(), r.getCustomData("stylesheet") || (s = t.appendStyleText(s), s = new CKEDITOR.dom.element(s.ownerNode || s.owningElement), r.setCustomData("stylesheet", s), s.data("cke-temp", 1))), r = t.getCustomData("stylesheet_ref") || 0, t.setCustomData("stylesheet_ref", r + 1), this.setCustomData("cke_includeReadonly", !e.config.disableReadonlyStyling), this.attachListener(this, "click", function(e) {
							var e = e.data,
								t = new CKEDITOR.dom.elementPath(e.getTarget(), this).contains("a");
							t && 2 != e.$.button && t.isReadOnly() && e.preventDefault()
						});
						var a = {
							8: 1,
							46: 1
						};
						this.attachListener(e, "key", function(t) {
							if (e.readOnly) return !0;
							var n, i = t.data.domEvent.getKey();
							if (i in a) {
								var r, s, l, c, t = e.getSelection(),
									u = t.getRanges()[0],
									h = u.startPath(),
									i = 8 == i;
								CKEDITOR.env.ie && CKEDITOR.env.version < 11 && (r = t.getSelectedElement()) || (r = o(t)) ? (e.fire("saveSnapshot"), u.moveToPosition(r, CKEDITOR.POSITION_BEFORE_START), r.remove(), u.select(), e.fire("saveSnapshot"), n = 1) : u.collapsed && ((s = h.block) && (c = s[i ? "getPrevious" : "getNext"](d)) && c.type == CKEDITOR.NODE_ELEMENT && c.is("table") && u[i ? "checkStartOfBlock" : "checkEndOfBlock"]() ? (e.fire("saveSnapshot"), u[i ? "checkEndOfBlock" : "checkStartOfBlock"]() && s.remove(), u["moveToElementEdit" + (i ? "End" : "Start")](c), u.select(), e.fire("saveSnapshot"), n = 1) : h.blockLimit && h.blockLimit.is("td") && (l = h.blockLimit.getAscendant("table")) && u.checkBoundaryOfElement(l, i ? CKEDITOR.START : CKEDITOR.END) && (c = l[i ? "getPrevious" : "getNext"](d)) ? (e.fire("saveSnapshot"), u["moveToElementEdit" + (i ? "End" : "Start")](c), u.checkStartOfBlock() && u.checkEndOfBlock() ? c.remove() : u.select(), e.fire("saveSnapshot"), n = 1) : (l = h.contains(["td", "th", "caption"])) && u.checkBoundaryOfElement(l, i ? CKEDITOR.START : CKEDITOR.END) && (n = 1))
							}
							return !n
						}), e.blockless && CKEDITOR.env.ie && CKEDITOR.env.needsBrFiller && this.attachListener(this, "keyup", function(t) {
							t.data.getKeystroke() in a && !this.getFirst(i) && (this.appendBogus(), t = e.createRange(), t.moveToPosition(this, CKEDITOR.POSITION_AFTER_START), t.select())
						}), this.attachListener(this, "dblclick", function(t) {
							return e.readOnly ? !1 : (t = {
								element: t.data.getTarget()
							}, void e.fire("doubleclick", t))
						}), CKEDITOR.env.ie && this.attachListener(this, "click", n), CKEDITOR.env.ie || this.attachListener(this, "mousedown", function(t) {
							var n = t.data.getTarget();
							n.is("img", "hr", "input", "textarea", "select") && !n.isReadOnly() && (e.getSelection().selectElement(n), n.is("input", "textarea", "select") && t.data.preventDefault())
						}), CKEDITOR.env.gecko && this.attachListener(this, "mouseup", function(t) {
							if (2 == t.data.$.button && (t = t.data.getTarget(), !t.getOuterHtml().replace(u, ""))) {
								var n = e.createRange();
								n.moveToElementEditStart(t), n.select(!0)
							}
						}), CKEDITOR.env.webkit && (this.attachListener(this, "click", function(e) {
							e.data.getTarget().is("input", "select") && e.data.preventDefault()
						}), this.attachListener(this, "mouseup", function(e) {
							e.data.getTarget().is("input", "textarea") && e.data.preventDefault()
						})), CKEDITOR.env.webkit && this.attachListener(e, "key", function(t) {
							if (t = t.data.domEvent.getKey(), t in a) {
								var n = 8 == t,
									i = e.getSelection().getRanges()[0],
									t = i.startPath();
								if (i.collapsed) {
									var r;
									e: {
										var o = t.block;
										if (o)
											if (i[n ? "checkStartOfBlock" : "checkEndOfBlock"]())
												if (i.moveToClosestEditablePosition(o, !n) && i.collapsed) {
													if (i.startContainer.type == CKEDITOR.NODE_ELEMENT) {
														var s = i.startContainer.getChild(i.startOffset - (n ? 1 : 0));
														if (s && s.type == CKEDITOR.NODE_ELEMENT && s.is("hr")) {
															e.fire("saveSnapshot"), s.remove(), r = !0;
															break e
														}
													}
													if ((i = i.startPath().block) && (!i || !i.contains(o))) {
														e.fire("saveSnapshot");
														var c;
														(c = (n ? i : o).getBogus()) && c.remove(), r = e.getSelection(), c = r.createBookmarks(), (n ? o : i).moveChildren(n ? i : o, !1), t.lastElement.mergeSiblings(), l(o, i, !n), r.selectBookmarks(c), r = !0
													}
												} else r = !1;
										else r = !1;
										else r = !1
									}
									if (!r) return
								} else if (n = i, r = t.block, c = n.endPath().block, r && c && !r.equals(c) ? (e.fire("saveSnapshot"), (o = r.getBogus()) && o.remove(), n.deleteContents(), c.getParent() && (c.moveChildren(r, !1), t.lastElement.mergeSiblings(), l(r, c, !0)), n = e.getSelection().getRanges()[0], n.collapse(1), n.select(), t = !0) : t = !1, !t) return;
								return e.getSelection().scrollIntoView(), e.fire("saveSnapshot"), !1
							}
						}, this, null, 100)
					}
				}
			},
			_: {
				detach: function() {
					this.editor.setData(this.editor.getData(), 0, 1), this.clearListeners(), this.restoreAttrs();
					var e;
					if (e = this.removeCustomData("classes"))
						for (; e.length;) this.removeClass(e.pop());
					if (!this.is("textarea")) {
						e = this.getDocument();
						var t = e.getHead();
						if (t.getCustomData("stylesheet")) {
							var n = e.getCustomData("stylesheet_ref");
							--n ? e.setCustomData("stylesheet_ref", n) : (e.removeCustomData("stylesheet_ref"), t.removeCustomData("stylesheet").remove())
						}
					}
					this.editor.fire("contentDomUnload"), delete this.editor
				}
			}
		}), CKEDITOR.editor.prototype.editable = function(e) {
			var t = this._.editable;
			return t && e ? 0 : (arguments.length && (t = this._.editable = e ? e instanceof CKEDITOR.editable ? e : new CKEDITOR.editable(this, e) : (t && t.detach(), null)), t)
		};
		var c = CKEDITOR.dom.walker.bogus(),
			u = /(^|<body\b[^>]*>)\s*<(p|div|address|h\d|center|pre)[^>]*>\s*(?:<br[^>]*>|&nbsp;|\u00A0|&#160;)?\s*(:?<\/\2>)?\s*(?=$|<\/body>)/gi,
			d = CKEDITOR.dom.walker.whitespaces(!0),
			h = CKEDITOR.dom.walker.bookmark(!1, !0);
		CKEDITOR.on("instanceLoaded", function(t) {
			var n = t.editor;
			n.on("insertElement", function(e) {
				e = e.data, e.type == CKEDITOR.NODE_ELEMENT && (e.is("input") || e.is("textarea")) && ("false" != e.getAttribute("contentEditable") && e.data("cke-editable", e.hasAttribute("contenteditable") ? "true" : "1"), e.setAttribute("contentEditable", !1))
			}), n.on("selectionChange", function(t) {
				if (!n.readOnly) {
					var i = n.getSelection();
					i && !i.isLocked && (i = n.checkDirty(), n.fire("lockSnapshot"), e(t), n.fire("unlockSnapshot"), !i && n.resetDirty())
				}
			})
		}), CKEDITOR.on("instanceCreated", function(e) {
			var t = e.editor;
			t.on("mode", function() {
				var e = t.editable();
				if (e && e.isInline()) {
					var n = t.title;
					e.changeAttr("role", "textbox"), e.changeAttr("aria-label", n), n && e.changeAttr("title", n);
					var i = t.fire("ariaEditorHelpLabel", {}).label;
					if (i && (n = this.ui.space(this.elementMode == CKEDITOR.ELEMENT_MODE_INLINE ? "top" : "contents"))) {
						var r = CKEDITOR.tools.getNextId(),
							i = CKEDITOR.dom.element.createFromHtml('<span id="' + r + '" class="cke_voice_label">' + i + "</span>");
						n.append(i), e.changeAttr("aria-describedby", r)
					}
				}
			})
		}), CKEDITOR.addCss(".cke_editable{cursor:text}.cke_editable img,.cke_editable input,.cke_editable textarea{cursor:default}");
		var E = function() {
				function e(e) {
					return e.type == CKEDITOR.NODE_ELEMENT
				}

				function t(n, i) {
					var r, o, s, a, c = [],
						u = i.range.startContainer;
					r = i.range.startPath();
					for (var u = l[u.getName()], d = 0, h = n.getChildren(), E = h.count(), f = -1, m = -1, T = 0, O = r.contains(l.$list); E > d; ++d) r = h.getItem(d), e(r) ? (s = r.getName(), O && s in CKEDITOR.dtd.$list ? c = c.concat(t(r, i)) : (a = !!u[s], "br" != s || !r.data("cke-eol") || d && d != E - 1 || (T = (o = d ? c[d - 1].node : h.getItem(d + 1)) && (!e(o) || !o.is("br")), o = o && e(o) && l.$block[o.getName()]), -1 == f && !a && (f = d), a || (m = d), c.push({
						isElement: 1,
						isLineBreak: T,
						isBlock: r.isBlockBoundary(),
						hasBlockSibling: o,
						node: r,
						name: s,
						allowed: a
					}), o = T = 0)) : c.push({
						isElement: 0,
						node: r,
						allowed: 1
					});
					return f > -1 && (c[f].firstNotAllowed = 1), m > -1 && (c[m].lastNotAllowed = 1), c
				}

				function n(t, i) {
					var r, o = [],
						s = t.getChildren(),
						a = s.count(),
						c = 0,
						u = l[i],
						d = !t.is(l.$inline) || t.is("br");
					for (d && o.push(" "); a > c; c++) r = s.getItem(c), e(r) && !r.is(u) ? o = o.concat(n(r, i)) : o.push(r);
					return d && o.push(" "), o
				}

				function r(t) {
					return t && e(t) && (t.is(l.$removeEmpty) || t.is("a") && !t.isBlockBoundary())
				}

				function o(t, n, i, r) {
					var s, a, l = t.clone();
					l.setEndAt(n, CKEDITOR.POSITION_BEFORE_END), (s = new CKEDITOR.dom.walker(l).next()) && e(s) && c[s.getName()] && (a = s.getPrevious()) && e(a) && !a.getParent().equals(t.startContainer) && i.contains(a) && r.contains(s) && s.isIdentical(a) && (s.moveChildren(a), s.remove(), o(t, n, i, r))
				}

				function s(t, n) {
					function i(t, n) {
						return n.isBlock && n.isElement && !n.node.is("br") && e(t) && t.is("br") ? (t.remove(), 1) : void 0
					}
					var r = n.endContainer.getChild(n.endOffset),
						o = n.endContainer.getChild(n.endOffset - 1);
					r && i(r, t[t.length - 1]), o && i(o, t[0]) && (n.setEnd(n.endContainer, n.endOffset - 1), n.collapse())
				}
				var l = CKEDITOR.dtd,
					c = {
						p: 1,
						div: 1,
						h1: 1,
						h2: 1,
						h3: 1,
						h4: 1,
						h5: 1,
						h6: 1,
						ul: 1,
						ol: 1,
						li: 1,
						pre: 1,
						dl: 1,
						blockquote: 1
					},
					u = {
						p: 1,
						div: 1,
						h1: 1,
						h2: 1,
						h3: 1,
						h4: 1,
						h5: 1,
						h6: 1
					},
					d = CKEDITOR.tools.extend({}, l.$inline);
				return delete d.br,
					function(c, h, E) {
						var f = c.editor;
						c.getDocument();
						var m = f.getSelection().getRanges()[0],
							T = !1;
						if ("unfiltered_html" == h && (h = "html", T = !0), !m.checkReadOnly()) {
							var O, C, g, p, D = new CKEDITOR.dom.elementPath(m.startContainer, m.root).blockLimit || m.root,
								h = {
									type: h,
									dontFilter: T,
									editable: c,
									editor: f,
									range: m,
									blockLimit: D,
									mergeCandidates: [],
									zombies: []
								},
								f = h.range,
								T = h.mergeCandidates;
							if ("text" == h.type && f.shrink(CKEDITOR.SHRINK_ELEMENT, !0, !1) && (O = CKEDITOR.dom.element.createFromHtml("<span>&nbsp;</span>", f.document), f.insertNode(O), f.setStartAfter(O)), C = new CKEDITOR.dom.elementPath(f.startContainer), h.endPath = g = new CKEDITOR.dom.elementPath(f.endContainer), !f.collapsed) {
								var D = g.block || g.blockLimit,
									I = f.getCommonAncestor();
								D && !D.equals(I) && !D.contains(I) && f.checkEndOfBlock() && h.zombies.push(D), f.deleteContents()
							}
							for (;
								(p = e(f.startContainer) && f.startContainer.getChild(f.startOffset - 1)) && e(p) && p.isBlockBoundary() && C.contains(p);) f.moveToPosition(p, CKEDITOR.POSITION_BEFORE_END);
							for (o(f, h.blockLimit, C, g), O && (f.setEndBefore(O), f.collapse(), O.remove()), O = f.startPath(), (D = O.contains(r, !1, 1)) && (f.splitElement(D), h.inlineStylesRoot = D, h.inlineStylesPeak = O.lastElement), O = f.createBookmark(), (D = O.startNode.getPrevious(i)) && e(D) && r(D) && T.push(D), (D = O.startNode.getNext(i)) && e(D) && r(D) && T.push(D), D = O.startNode;
								(D = D.getParent()) && r(D);) T.push(D);
							if (f.moveToBookmark(O), O = E) {
								if (O = h.range, "text" == h.type && h.inlineStylesRoot) {
									for (p = h.inlineStylesPeak, f = p.getDocument().createText("{cke-peak}"), T = h.inlineStylesRoot.getParent(); !p.equals(T);) f = f.appendTo(p.clone()), p = p.getParent();
									E = f.getOuterHtml().split("{cke-peak}").join(E)
								}
								if (p = h.blockLimit.getName(), /^\s+|\s+$/.test(E) && "span" in CKEDITOR.dtd[p]) var R = '<span data-cke-marker="1">&nbsp;</span>',
									E = R + E + R;
								if (E = h.editor.dataProcessor.toHtml(E, {
										context: null,
										fixForBody: !1,
										dontFilter: h.dontFilter,
										filter: h.editor.activeFilter,
										enterMode: h.editor.activeEnterMode
									}), p = O.document.createElement("body"), p.setHtml(E), R && (p.getFirst().remove(), p.getLast().remove()), (R = O.startPath().block) && (1 != R.getChildCount() || !R.getBogus())) e: {
									var v;
									if (1 == p.getChildCount() && e(v = p.getFirst()) && v.is(u)) {
										for (R = v.getElementsByTag("*"), O = 0, T = R.count(); T > O; O++)
											if (f = R.getItem(O), !f.is(d)) break e;
										v.moveChildren(v.getParent(1)), v.remove()
									}
								}
								h.dataWrapper = p, O = E
							}
							if (O) {
								v = h.range;
								var K, R = v.document,
									E = h.blockLimit;
								O = 0;
								var b;
								p = [];
								var y, N, k, _, T = f = 0;
								C = v.startContainer;
								var S, D = h.endPath.elements[0];
								for (g = D.getPosition(C), I = !(!D.getCommonAncestor(C) || g == CKEDITOR.POSITION_IDENTICAL || g & CKEDITOR.POSITION_CONTAINS + CKEDITOR.POSITION_IS_CONTAINED), C = t(h.dataWrapper, h), s(C, v); O < C.length; O++) {
									if (g = C[O], K = g.isLineBreak) {
										K = v, k = E;
										var w = void 0,
											A = void 0;
										g.hasBlockSibling ? K = 1 : (w = K.startContainer.getAscendant(l.$block, 1), w && w.is({
											div: 1,
											p: 1
										}) ? (A = w.getPosition(k), A == CKEDITOR.POSITION_IDENTICAL || A == CKEDITOR.POSITION_CONTAINS ? K = 0 : (k = K.splitElement(w), K.moveToPosition(k, CKEDITOR.POSITION_AFTER_START), K = 1)) : K = 0)
									}
									if (K) T = O > 0;
									else {
										if (K = v.startPath(), !g.isBlock && h.editor.config.autoParagraph !== !1 && h.editor.activeEnterMode != CKEDITOR.ENTER_BR && h.editor.editable().equals(K.blockLimit) && !K.block && (N = h.editor.activeEnterMode != CKEDITOR.ENTER_BR && h.editor.config.autoParagraph !== !1 ? h.editor.activeEnterMode == CKEDITOR.ENTER_DIV ? "div" : "p" : !1) && (N = R.createElement(N), N.appendBogus(), v.insertNode(N), CKEDITOR.env.needsBrFiller && (b = N.getBogus()) && b.remove(), v.moveToPosition(N, CKEDITOR.POSITION_BEFORE_END)), (K = v.startPath().block) && !K.equals(y) && ((b = K.getBogus()) && (b.remove(), p.push(K)), y = K), g.firstNotAllowed && (f = 1), f && g.isElement) {
											for (K = v.startContainer, k = null; K && !l[K.getName()][g.name];) {
												if (K.equals(E)) {
													K = null;
													break
												}
												k = K, K = K.getParent()
											}
											if (K) k && (_ = v.splitElement(k), h.zombies.push(_), h.zombies.push(k));
											else {
												k = E.getName(), S = !O, K = O == C.length - 1, k = n(g.node, k);
												for (var w = [], A = k.length, L = 0, x = void 0, P = 0, $ = -1; A > L; L++) x = k[L], " " == x ? (P || S && !L || (w.push(new CKEDITOR.dom.text(" ")), $ = w.length), P = 1) : (w.push(x), P = 0);
												K && $ == w.length && w.pop(), S = w
											}
										}
										if (S) {
											for (; K = S.pop();) v.insertNode(K);
											S = 0
										} else v.insertNode(g.node);
										g.lastNotAllowed && O < C.length - 1 && ((_ = I ? D : _) && v.setEndAt(_, CKEDITOR.POSITION_AFTER_START), f = 0), v.collapse()
									}
								}
								h.dontMoveCaret = T, h.bogusNeededBlocks = p
							}
							b = h.range;
							var B;
							for (_ = h.bogusNeededBlocks, S = b.createBookmark(); y = h.zombies.pop();) y.getParent() && (N = b.clone(), N.moveToElementEditStart(y), N.removeEmptyBlocksAtEnd());
							if (_)
								for (; y = _.pop();) CKEDITOR.env.needsBrFiller ? y.appendBogus() : y.append(b.document.createText(" "));
							for (; y = h.mergeCandidates.pop();) y.mergeSiblings();
							if (b.moveToBookmark(S), !h.dontMoveCaret) {
								for (y = e(b.startContainer) && b.startContainer.getChild(b.startOffset - 1); y && e(y) && !y.is(l.$empty);) {
									if (y.isBlockBoundary()) b.moveToPosition(y, CKEDITOR.POSITION_BEFORE_END);
									else {
										if (r(y) && y.getHtml().match(/(\s|&nbsp;)$/g)) {
											B = null;
											break
										}
										B = b.clone(), B.moveToPosition(y, CKEDITOR.POSITION_BEFORE_END)
									}
									y = y.getLast(i)
								}
								B && b.moveToRange(B)
							}
							m.select(), a(c)
						}
					}
			}(),
			f = function() {
				function e(e) {
					return e = new CKEDITOR.dom.walker(e), e.guard = function(e, t) {
						return t ? !1 : e.type == CKEDITOR.NODE_ELEMENT ? e.is(CKEDITOR.dtd.$tableContent) : void 0
					}, e.evaluator = function(e) {
						return e.type == CKEDITOR.NODE_ELEMENT
					}, e
				}

				function t(e, t, n) {
					return t = e.getDocument().createElement(t), e.append(t, n), t
				}

				function n(e) {
					var t, n = e.count();
					for (n; n-- > 0;) t = e.getItem(n), CKEDITOR.tools.trim(t.getHtml()) || (t.appendBogus(), CKEDITOR.env.ie && CKEDITOR.env.version < 9 && t.getChildCount() && t.getFirst().remove())
				}
				return function(i) {
					var r = i.startContainer,
						o = r.getAscendant("table", 1),
						s = !1;
					n(o.getElementsByTag("td")), n(o.getElementsByTag("th")), o = i.clone(), o.setStart(r, 0), o = e(o).lastBackward(), o || (o = i.clone(), o.setEndAt(r, CKEDITOR.POSITION_BEFORE_END), o = e(o).lastForward(), s = !0), o || (o = r), o.is("table") ? (i.setStartAt(o, CKEDITOR.POSITION_BEFORE_START), i.collapse(!0), o.remove()) : (o.is({
						tbody: 1,
						thead: 1,
						tfoot: 1
					}) && (o = t(o, "tr", s)), o.is("tr") && (o = t(o, o.getParent().is("thead") ? "th" : "td", s)), (r = o.getBogus()) && r.remove(), i.moveToPosition(o, s ? CKEDITOR.POSITION_AFTER_START : CKEDITOR.POSITION_BEFORE_END))
				}
			}()
	}(), function() {
		function e() {
			var e, t = this._.fakeSelection;
			t && (e = this.getSelection(1), e && e.isHidden() || (t.reset(), t = 0)), (t || (t = e || this.getSelection(1), t && t.getType() != CKEDITOR.SELECTION_NONE)) && (this.fire("selectionCheck", t), e = this.elementPath(), e.compare(this._.selectionPreviousPath) || (CKEDITOR.env.webkit && (this._.previousActive = this.document.getActive()), this._.selectionPreviousPath = e, this.fire("selectionChange", {
				selection: t,
				path: e
			})))
		}

		function t() {
			h = !0, d || (n.call(this), d = CKEDITOR.tools.setTimeout(n, 200, this))
		}

		function n() {
			d = null, h && (CKEDITOR.tools.setTimeout(e, 0, this), h = !1)
		}

		function i(e) {
			function t(t, n) {
				return t && t.type != CKEDITOR.NODE_TEXT ? e.clone()["moveToElementEdit" + (n ? "End" : "Start")](t) : !1
			}
			if (!(e.root instanceof CKEDITOR.editable)) return !1;
			var n = e.startContainer,
				i = e.getPreviousNode(E, null, n),
				r = e.getNextNode(E, null, n);
			return !t(i) && !t(r, 1) && (i || r || n.type == CKEDITOR.NODE_ELEMENT && n.isBlockBoundary() && n.getBogus()) ? !1 : !0
		}

		function r(e) {
			return e.getCustomData("cke-fillingChar")
		}

		function o(e, t) {
			var n = e && e.removeCustomData("cke-fillingChar");
			if (n) {
				if (t !== !1) {
					var i, r = e.getDocument().getSelection().getNative(),
						o = r && "None" != r.type && r.getRangeAt(0);
					if (n.getLength() > 1 && o && o.intersectsNode(n.$)) {
						i = [r.anchorOffset, r.focusOffset], o = r.focusNode == n.$ && r.focusOffset > 0, r.anchorNode == n.$ && r.anchorOffset > 0 && i[0] --, o && i[1] --;
						var a;
						o = r, o.isCollapsed || (a = o.getRangeAt(0), a.setStart(o.anchorNode, o.anchorOffset), a.setEnd(o.focusNode, o.focusOffset), a = a.collapsed), a && i.unshift(i.pop())
					}
				}
				n.setText(s(n.getText())), i && (n = r.getRangeAt(0), n.setStart(n.startContainer, i[0]), n.setEnd(n.startContainer, i[1]), r.removeAllRanges(), r.addRange(n))
			}
		}

		function s(e) {
			return e.replace(/\u200B( )?/g, function(e) {
				return e[1] ? " " : ""
			})
		}

		function a(e, t, n) {
			var i = e.on("focus", function(e) {
				e.cancel()
			}, null, null, -100);
			if (CKEDITOR.env.ie) var r = e.getDocument().on("selectionchange", function(e) {
				e.cancel()
			}, null, null, -100);
			else {
				var o = new CKEDITOR.dom.range(e);
				o.moveToElementEditStart(e);
				var s = e.getDocument().$.createRange();
				s.setStart(o.startContainer.$, o.startOffset), s.collapse(1), t.removeAllRanges(), t.addRange(s)
			}
			n && e.focus(), i.removeListener(), r && r.removeListener()
		}

		function l(e) {
			var t = CKEDITOR.dom.element.createFromHtml('<div data-cke-hidden-sel="1" data-cke-temp="1" style="' + (CKEDITOR.env.ie ? "display:none" : "position:fixed;top:0;left:-1000px") + '">&nbsp;</div>', e.document);
			e.fire("lockSnapshot"), e.editable().append(t);
			var n = e.getSelection(1),
				i = e.createRange(),
				r = n.root.on("selectionchange", function(e) {
					e.cancel()
				}, null, null, 0);
			i.setStartAt(t, CKEDITOR.POSITION_AFTER_START), i.setEndAt(t, CKEDITOR.POSITION_BEFORE_END), n.selectRanges([i]), r.removeListener(), e.fire("unlockSnapshot"), e._.hiddenSelectionContainer = t
		}

		function c(e) {
			var t = {
				37: 1,
				39: 1,
				8: 1,
				46: 1
			};
			return function(n) {
				var i = n.data.getKeystroke();
				if (t[i]) {
					var r = e.getSelection().getRanges(),
						o = r[0];
					1 == r.length && o.collapsed && (i = o[38 > i ? "getPreviousEditableNode" : "getNextEditableNode"]()) && i.type == CKEDITOR.NODE_ELEMENT && "false" == i.getAttribute("contenteditable") && (e.getSelection().fake(i), n.data.preventDefault(), n.cancel())
				}
			}
		}

		function u(e) {
			for (var t = 0; t < e.length; t++) {
				var n = e[t];
				if (n.getCommonAncestor().isReadOnly() && e.splice(t, 1), !n.collapsed) {
					if (n.startContainer.isReadOnly())
						for (var i, r = n.startContainer; r && !((i = r.type == CKEDITOR.NODE_ELEMENT) && r.is("body") || !r.isReadOnly());) i && "false" == r.getAttribute("contentEditable") && n.setStartAfter(r), r = r.getParent();
					r = n.startContainer, i = n.endContainer;
					var o = n.startOffset,
						s = n.endOffset,
						a = n.clone();
					r && r.type == CKEDITOR.NODE_TEXT && (o >= r.getLength() ? a.setStartAfter(r) : a.setStartBefore(r)), i && i.type == CKEDITOR.NODE_TEXT && (s ? a.setEndAfter(i) : a.setEndBefore(i)), r = new CKEDITOR.dom.walker(a), r.evaluator = function(i) {
						if (i.type == CKEDITOR.NODE_ELEMENT && i.isReadOnly()) {
							var r = n.clone();
							return n.setEndBefore(i), n.collapsed && e.splice(t--, 1), i.getPosition(a.endContainer) & CKEDITOR.POSITION_CONTAINS || (r.setStartAfter(i), r.collapsed || e.splice(t + 1, 0, r)), !0
						}
						return !1
					}, r.next()
				}
			}
			return e
		}
		var d, h, E = CKEDITOR.dom.walker.invisible(1),
			f = function() {
				function e(e) {
					return function(t) {
						var n = t.editor.createRange();
						return n.moveToClosestEditablePosition(t.selected, e) && t.editor.getSelection().selectRanges([n]), !1
					}
				}

				function t(e) {
					return function(t) {
						var n, i = t.editor,
							r = i.createRange();
						return (n = r.moveToClosestEditablePosition(t.selected, e)) || (n = r.moveToClosestEditablePosition(t.selected, !e)), n && i.getSelection().selectRanges([r]), i.fire("saveSnapshot"), t.selected.remove(), n || (r.moveToElementEditablePosition(i.editable()), i.getSelection().selectRanges([r])), i.fire("saveSnapshot"), !1
					}
				}
				var n = e(),
					i = e(1);
				return {
					37: n,
					38: n,
					39: i,
					40: i,
					8: t(),
					46: t(1)
				}
			}();
		CKEDITOR.on("instanceCreated", function(n) {
			function i() {
				var e = r.getSelection();
				e && e.removeAllRanges()
			}
			var r = n.editor;
			r.on("contentDom", function() {
				var n, i, s = r.document,
					a = CKEDITOR.document,
					l = r.editable(),
					u = s.getBody(),
					d = s.getDocumentElement(),
					h = l.isInline();
				if (CKEDITOR.env.gecko && l.attachListener(l, "focus", function(e) {
						e.removeListener(), 0 !== n && (e = r.getSelection().getNative()) && e.isCollapsed && e.anchorNode == l.$ && (e = r.createRange(), e.moveToElementEditStart(l), e.select())
					}, null, null, -2), l.attachListener(l, CKEDITOR.env.webkit ? "DOMFocusIn" : "focus", function() {
						n && CKEDITOR.env.webkit && (n = r._.previousActive && r._.previousActive.equals(s.getActive())), r.unlockSelection(n), n = 0
					}, null, null, -1), l.attachListener(l, "mousedown", function() {
						n = 0
					}), CKEDITOR.env.ie || h) {
					var E = function() {
						i = new CKEDITOR.dom.selection(r.getSelection()), i.lock()
					};
					m ? l.attachListener(l, "beforedeactivate", E, null, null, -1) : l.attachListener(r, "selectionCheck", E, null, null, -1), l.attachListener(l, CKEDITOR.env.webkit ? "DOMFocusOut" : "blur", function() {
						r.lockSelection(i), n = 1
					}, null, null, -1), l.attachListener(l, "mousedown", function() {
						n = 0
					})
				}
				if (CKEDITOR.env.ie && !h) {
					var f;
					if (l.attachListener(l, "mousedown", function(e) {
							2 == e.data.$.button && (e = r.document.getSelection(), e && e.getType() != CKEDITOR.SELECTION_NONE || (f = r.window.getScrollPosition()))
						}), l.attachListener(l, "mouseup", function(e) {
							2 == e.data.$.button && f && (r.document.$.documentElement.scrollLeft = f.x, r.document.$.documentElement.scrollTop = f.y), f = null
						}), "BackCompat" != s.$.compatMode && ((CKEDITOR.env.ie7Compat || CKEDITOR.env.ie6Compat) && d.on("mousedown", function(e) {
							function t(e) {
								if (e = e.data.$, i) {
									var t = u.$.createTextRange();
									try {
										t.moveToPoint(e.clientX, e.clientY)
									} catch (n) {}
									i.setEndPoint(o.compareEndPoints("StartToStart", t) < 0 ? "EndToEnd" : "StartToStart", t), i.select()
								}
							}

							function n() {
								d.removeListener("mousemove", t), a.removeListener("mouseup", n), d.removeListener("mouseup", n), i.select()
							}
							if (e = e.data, e.getTarget().is("html") && e.$.y < d.$.clientHeight && e.$.x < d.$.clientWidth) {
								var i = u.$.createTextRange();
								try {
									i.moveToPoint(e.$.clientX, e.$.clientY)
								} catch (r) {}
								var o = i.duplicate();
								d.on("mousemove", t), a.on("mouseup", n), d.on("mouseup", n)
							}
						}), CKEDITOR.env.version > 7 && CKEDITOR.env.version < 11)) {
						d.on("mousedown", function(e) {
							e.data.getTarget().is("html") && (a.on("mouseup", T), d.on("mouseup", T))
						});
						var T = function() {
							a.removeListener("mouseup", T), d.removeListener("mouseup", T);
							var e = CKEDITOR.document.$.selection,
								t = e.createRange();
							"None" != e.type && t.parentElement().ownerDocument == s.$ && t.select()
						}
					}
				}
				if (l.attachListener(l, "selectionchange", e, r), l.attachListener(l, "keyup", t, r), l.attachListener(l, CKEDITOR.env.webkit ? "DOMFocusIn" : "focus", function() {
						r.forceNextSelectionCheck(), r.selectionChange(1)
					}), h && (CKEDITOR.env.webkit || CKEDITOR.env.gecko)) {
					var O;
					l.attachListener(l, "mousedown", function() {
						O = 1
					}), l.attachListener(s.getDocumentElement(), "mouseup", function() {
						O && t.call(r), O = 0
					})
				} else l.attachListener(CKEDITOR.env.ie ? l : s.getDocumentElement(), "mouseup", t, r);
				CKEDITOR.env.webkit && l.attachListener(s, "keydown", function(e) {
					switch (e.data.getKey()) {
						case 13:
						case 33:
						case 34:
						case 35:
						case 36:
						case 37:
						case 39:
						case 8:
						case 45:
						case 46:
							o(l)
					}
				}, null, null, -1), l.attachListener(l, "keydown", c(r), null, null, -1)
			}), r.on("setData", function() {
				r.unlockSelection(), CKEDITOR.env.webkit && i()
			}), r.on("contentDomUnload", function() {
				r.unlockSelection()
			}), CKEDITOR.env.ie9Compat && r.on("beforeDestroy", i, null, null, 9), r.on("dataReady", function() {
				delete r._.fakeSelection, delete r._.hiddenSelectionContainer, r.selectionChange(1)
			}), r.on("loadSnapshot", function() {
				var e = r.editable().getLast(function(e) {
					return e.type == CKEDITOR.NODE_ELEMENT
				});
				e && e.hasAttribute("data-cke-hidden-sel") && e.remove()
			}, null, null, 100), r.on("key", function(e) {
				if ("wysiwyg" == r.mode) {
					var t = r.getSelection();
					if (t.isFake) {
						var n = f[e.data.keyCode];
						if (n) return n({
							editor: r,
							selected: t.getSelectedElement(),
							selection: t,
							keyEvent: e
						})
					}
				}
			})
		}), CKEDITOR.on("instanceReady", function(e) {
			var t = e.editor;
			if (CKEDITOR.env.webkit) {
				t.on("selectionChange", function() {
					var e = t.editable(),
						n = r(e);
					n && (n.getCustomData("ready") ? o(e) : n.setCustomData("ready", 1))
				}, null, null, -1), t.on("beforeSetMode", function() {
					o(t.editable())
				}, null, null, -1);
				var n, i, e = function() {
						var e = t.editable();
						if (e && (e = r(e))) {
							var o = t.document.$.defaultView.getSelection();
							"Caret" == o.type && o.anchorNode == e.$ && (i = 1), n = e.getText(), e.setText(s(n))
						}
					},
					a = function() {
						var e = t.editable();
						e && (e = r(e)) && (e.setText(n), i && (t.document.$.defaultView.getSelection().setPosition(e.$, e.getLength()), i = 0))
					};
				t.on("beforeUndoImage", e), t.on("afterUndoImage", a), t.on("beforeGetData", e, null, null, 0), t.on("getData", a)
			}
		}), CKEDITOR.editor.prototype.selectionChange = function(n) {
			(n ? e : t).call(this)
		}, CKEDITOR.editor.prototype.getSelection = function(e) {
			return !this._.savedSelection && !this._.fakeSelection || e ? (e = this.editable()) && "wysiwyg" == this.mode ? new CKEDITOR.dom.selection(e) : null : this._.savedSelection || this._.fakeSelection
		}, CKEDITOR.editor.prototype.lockSelection = function(e) {
			return e = e || this.getSelection(1), e.getType() != CKEDITOR.SELECTION_NONE ? (!e.isLocked && e.lock(), this._.savedSelection = e, !0) : !1
		}, CKEDITOR.editor.prototype.unlockSelection = function(e) {
			var t = this._.savedSelection;
			return t ? (t.unlock(e), delete this._.savedSelection, !0) : !1
		}, CKEDITOR.editor.prototype.forceNextSelectionCheck = function() {
			delete this._.selectionPreviousPath
		}, CKEDITOR.dom.document.prototype.getSelection = function() {
			return new CKEDITOR.dom.selection(this)
		}, CKEDITOR.dom.range.prototype.select = function() {
			var e = this.root instanceof CKEDITOR.editable ? this.root.editor.getSelection() : new CKEDITOR.dom.selection(this.root);
			return e.selectRanges([this]), e
		}, CKEDITOR.SELECTION_NONE = 1, CKEDITOR.SELECTION_TEXT = 2, CKEDITOR.SELECTION_ELEMENT = 3;
		var m = "function" != typeof window.getSelection,
			T = 1;
		CKEDITOR.dom.selection = function(e) {
			if (e instanceof CKEDITOR.dom.selection) var t = e,
				e = e.root;
			var n = e instanceof CKEDITOR.dom.element;
			if (this.rev = t ? t.rev : T++, this.document = e instanceof CKEDITOR.dom.document ? e : e.getDocument(), this.root = e = n ? e : this.document.getBody(), this.isLocked = 0, this._ = {
					cache: {}
				}, t) return CKEDITOR.tools.extend(this._.cache, t._.cache), this.isFake = t.isFake, this.isLocked = t.isLocked, this;
			n = m ? this.document.$.selection : this.document.getWindow().$.getSelection(), CKEDITOR.env.webkit ? ("None" == n.type && this.document.getActive().equals(e) || "Caret" == n.type && n.anchorNode.nodeType == CKEDITOR.NODE_DOCUMENT) && a(e, n) : CKEDITOR.env.gecko ? n && this.document.getActive().equals(e) && n.anchorNode && n.anchorNode.nodeType == CKEDITOR.NODE_DOCUMENT && a(e, n, !0) : CKEDITOR.env.ie && (t = this.document.getActive(), m ? "None" == n.type && t && t.equals(this.document.getDocumentElement()) && a(e, null, !0) : ((n = n && n.anchorNode) && (n = new CKEDITOR.dom.node(n)), t && t.equals(this.document.getDocumentElement()) && n && (e.equals(n) || e.contains(n)) && a(e, null, !0)));
			var i, r, e = this.getNative();
			if (e)
				if (e.getRangeAt) i = (r = e.rangeCount && e.getRangeAt(0)) && new CKEDITOR.dom.node(r.commonAncestorContainer);
				else {
					try {
						r = e.createRange()
					} catch (o) {}
					i = r && CKEDITOR.dom.element.get(r.item && r.item(0) || r.parentElement())
				}
			return (!i || i.type != CKEDITOR.NODE_ELEMENT && i.type != CKEDITOR.NODE_TEXT || !this.root.equals(i) && !this.root.contains(i)) && (this._.cache.type = CKEDITOR.SELECTION_NONE, this._.cache.startElement = null, this._.cache.selectedElement = null, this._.cache.selectedText = "", this._.cache.ranges = new CKEDITOR.dom.rangeList), this
		};
		var O = {
			img: 1,
			hr: 1,
			li: 1,
			table: 1,
			tr: 1,
			td: 1,
			th: 1,
			embed: 1,
			object: 1,
			ol: 1,
			ul: 1,
			a: 1,
			input: 1,
			form: 1,
			select: 1,
			textarea: 1,
			button: 1,
			fieldset: 1,
			thead: 1,
			tfoot: 1
		};
		CKEDITOR.dom.selection.prototype = {
			getNative: function() {
				return void 0 !== this._.cache.nativeSel ? this._.cache.nativeSel : this._.cache.nativeSel = m ? this.document.$.selection : this.document.getWindow().$.getSelection()
			},
			getType: m ? function() {
				var e = this._.cache;
				if (e.type) return e.type;
				var t = CKEDITOR.SELECTION_NONE;
				try {
					var n = this.getNative(),
						i = n.type;
					"Text" == i && (t = CKEDITOR.SELECTION_TEXT), "Control" == i && (t = CKEDITOR.SELECTION_ELEMENT), n.createRange().parentElement() && (t = CKEDITOR.SELECTION_TEXT)
				} catch (r) {}
				return e.type = t
			} : function() {
				var e = this._.cache;
				if (e.type) return e.type;
				var t = CKEDITOR.SELECTION_TEXT,
					n = this.getNative();
				if (n && n.rangeCount) {
					if (1 == n.rangeCount) {
						var n = n.getRangeAt(0),
							i = n.startContainer;
						i == n.endContainer && 1 == i.nodeType && n.endOffset - n.startOffset == 1 && O[i.childNodes[n.startOffset].nodeName.toLowerCase()] && (t = CKEDITOR.SELECTION_ELEMENT)
					}
				} else t = CKEDITOR.SELECTION_NONE;
				return e.type = t
			},
			getRanges: function() {
				var e = m ? function() {
					function e(e) {
						return new CKEDITOR.dom.node(e).getIndex()
					}
					var t = function(t, n) {
						t = t.duplicate(), t.collapse(n);
						var i = t.parentElement();
						if (!i.hasChildNodes()) return {
							container: i,
							offset: 0
						};
						for (var r, o, s, a, l = i.children, c = t.duplicate(), u = 0, d = l.length - 1, h = -1; d >= u;)
							if (h = Math.floor((u + d) / 2), r = l[h], c.moveToElementText(r), s = c.compareEndPoints("StartToStart", t), s > 0) d = h - 1;
							else {
								if (!(0 > s)) return {
									container: i,
									offset: e(r)
								};
								u = h + 1
							}
						if (-1 == h || h == l.length - 1 && 0 > s) {
							if (c.moveToElementText(i), c.setEndPoint("StartToStart", t), c = c.text.replace(/(\r\n|\r)/g, "\n").length, l = i.childNodes, !c) return r = l[l.length - 1], r.nodeType != CKEDITOR.NODE_TEXT ? {
								container: i,
								offset: l.length
							} : {
								container: r,
								offset: r.nodeValue.length
							};
							for (i = l.length; c > 0 && i > 0;) o = l[--i], o.nodeType == CKEDITOR.NODE_TEXT && (a = o, c -= o.nodeValue.length);
							return {
								container: a,
								offset: -c
							}
						}
						if (c.collapse(s > 0 ? !0 : !1), c.setEndPoint(s > 0 ? "StartToStart" : "EndToStart", t), c = c.text.replace(/(\r\n|\r)/g, "\n").length, !c) return {
							container: i,
							offset: e(r) + (s > 0 ? 0 : 1)
						};
						for (; c > 0;) try {
							o = r[s > 0 ? "previousSibling" : "nextSibling"], o.nodeType == CKEDITOR.NODE_TEXT && (c -= o.nodeValue.length, a = o), r = o
						} catch (E) {
							return {
								container: i,
								offset: e(r)
							}
						}
						return {
							container: a,
							offset: s > 0 ? -c : a.nodeValue.length + c
						}
					};
					return function() {
						var e = this.getNative(),
							n = e && e.createRange(),
							i = this.getType();
						if (!e) return [];
						if (i == CKEDITOR.SELECTION_TEXT) return e = new CKEDITOR.dom.range(this.root), i = t(n, !0), e.setStart(new CKEDITOR.dom.node(i.container), i.offset), i = t(n), e.setEnd(new CKEDITOR.dom.node(i.container), i.offset), e.endContainer.getPosition(e.startContainer) & CKEDITOR.POSITION_PRECEDING && e.endOffset <= e.startContainer.getIndex() && e.collapse(), [e];
						if (i == CKEDITOR.SELECTION_ELEMENT) {
							for (var i = [], r = 0; r < n.length; r++) {
								for (var o = n.item(r), s = o.parentNode, a = 0, e = new CKEDITOR.dom.range(this.root); a < s.childNodes.length && s.childNodes[a] != o; a++);
								e.setStart(new CKEDITOR.dom.node(s), a), e.setEnd(new CKEDITOR.dom.node(s), a + 1), i.push(e)
							}
							return i
						}
						return []
					}
				}() : function() {
					var e, t = [],
						n = this.getNative();
					if (!n) return t;
					for (var i = 0; i < n.rangeCount; i++) {
						var r = n.getRangeAt(i);
						e = new CKEDITOR.dom.range(this.root), e.setStart(new CKEDITOR.dom.node(r.startContainer), r.startOffset), e.setEnd(new CKEDITOR.dom.node(r.endContainer), r.endOffset), t.push(e)
					}
					return t
				};
				return function(t) {
					var n = this._.cache,
						i = n.ranges;
					return i || (n.ranges = i = new CKEDITOR.dom.rangeList(e.call(this))), t ? u(new CKEDITOR.dom.rangeList(i.slice())) : i
				}
			}(),
			getStartElement: function() {
				var e = this._.cache;
				if (void 0 !== e.startElement) return e.startElement;
				var t;
				switch (this.getType()) {
					case CKEDITOR.SELECTION_ELEMENT:
						return this.getSelectedElement();
					case CKEDITOR.SELECTION_TEXT:
						var n = this.getRanges()[0];
						if (n) {
							if (n.collapsed) t = n.startContainer, t.type != CKEDITOR.NODE_ELEMENT && (t = t.getParent());
							else {
								for (n.optimize(); t = n.startContainer, n.startOffset == (t.getChildCount ? t.getChildCount() : t.getLength()) && !t.isBlockBoundary();) n.setStartAfter(t);
								if (t = n.startContainer, t.type != CKEDITOR.NODE_ELEMENT) return t.getParent();
								if (t = t.getChild(n.startOffset), t && t.type == CKEDITOR.NODE_ELEMENT)
									for (n = t.getFirst(); n && n.type == CKEDITOR.NODE_ELEMENT;) t = n, n = n.getFirst();
								else t = n.startContainer
							}
							t = t.$
						}
				}
				return e.startElement = t ? new CKEDITOR.dom.element(t) : null
			},
			getSelectedElement: function() {
				var e = this._.cache;
				if (void 0 !== e.selectedElement) return e.selectedElement;
				var t = this,
					n = CKEDITOR.tools.tryThese(function() {
						return t.getNative().createRange().item(0)
					}, function() {
						for (var e, n, i = t.getRanges()[0].clone(), r = 2; !(!r || (e = i.getEnclosedNode()) && e.type == CKEDITOR.NODE_ELEMENT && O[e.getName()] && (n = e)); r--) i.shrink(CKEDITOR.SHRINK_ELEMENT);
						return n && n.$
					});
				return e.selectedElement = n ? new CKEDITOR.dom.element(n) : null
			},
			getSelectedText: function() {
				var e = this._.cache;
				if (void 0 !== e.selectedText) return e.selectedText;
				var t = this.getNative(),
					t = m ? "Control" == t.type ? "" : t.createRange().text : t.toString();
				return e.selectedText = t
			},
			lock: function() {
				this.getRanges(), this.getStartElement(), this.getSelectedElement(), this.getSelectedText(), this._.cache.nativeSel = null, this.isLocked = 1
			},
			unlock: function(e) {
				if (this.isLocked) {
					if (e) var t = this.getSelectedElement(),
						n = !t && this.getRanges(),
						i = this.isFake;
					this.isLocked = 0, this.reset(), e && (e = t || n[0] && n[0].getCommonAncestor()) && e.getAscendant("body", 1) && (i ? this.fake(t) : t ? this.selectElement(t) : this.selectRanges(n))
				}
			},
			reset: function() {
				this._.cache = {}, this.isFake = 0;
				var e = this.root.editor;
				if (e && e._.fakeSelection && this.rev == e._.fakeSelection.rev) {
					delete e._.fakeSelection;
					var t = e._.hiddenSelectionContainer;
					if (t) {
						var n = e.checkDirty();
						e.fire("lockSnapshot"), t.remove(), e.fire("unlockSnapshot"), !n && e.resetDirty()
					}
					delete e._.hiddenSelectionContainer
				}
				this.rev = T++
			},
			selectElement: function(e) {
				var t = new CKEDITOR.dom.range(this.root);
				t.setStartBefore(e), t.setEndAfter(e), this.selectRanges([t])
			},
			selectRanges: function(e) {
				var t = this.root.editor,
					t = t && t._.hiddenSelectionContainer;
				if (this.reset(), t)
					for (var n, t = this.root, r = 0; r < e.length; ++r) n = e[r], n.endContainer.equals(t) && (n.endOffset = Math.min(n.endOffset, t.getChildCount()));
				if (e.length)
					if (this.isLocked) {
						var s = CKEDITOR.document.getActive();
						this.unlock(), this.selectRanges(e), this.lock(), s && !s.equals(this.root) && s.focus()
					} else {
						var a, l, c;
						if ((1 != e.length || (c = e[0]).collapsed || !(a = c.getEnclosedNode()) || a.type != CKEDITOR.NODE_ELEMENT || (c = c.clone(), c.shrink(CKEDITOR.SHRINK_ELEMENT, !0), (l = c.getEnclosedNode()) && l.type == CKEDITOR.NODE_ELEMENT && (a = l), "false" != a.getAttribute("contenteditable"))) && (a = void 0), a) this.fake(a);
						else {
							if (m) {
								c = CKEDITOR.dom.walker.whitespaces(!0), l = /\ufeff|\u00a0/, t = {
									table: 1,
									tbody: 1,
									tr: 1
								}, e.length > 1 && (a = e[e.length - 1], e[0].setEnd(a.endContainer, a.endOffset)), a = e[0];
								var u, d, h, e = a.collapsed;
								if ((n = a.getEnclosedNode()) && n.type == CKEDITOR.NODE_ELEMENT && n.getName() in O && (!n.is("a") || !n.getText())) try {
									return h = n.$.createControlRange(), h.addElement(n.$), void h.select()
								} catch (E) {}(a.startContainer.type == CKEDITOR.NODE_ELEMENT && a.startContainer.getName() in t || a.endContainer.type == CKEDITOR.NODE_ELEMENT && a.endContainer.getName() in t) && (a.shrink(CKEDITOR.NODE_ELEMENT, !0), e = a.collapsed), h = a.createBookmark(), t = h.startNode, e || (s = h.endNode), h = a.document.$.body.createTextRange(), h.moveToElementText(t.$), h.moveStart("character", 1), s ? (l = a.document.$.body.createTextRange(), l.moveToElementText(s.$), h.setEndPoint("EndToEnd", l), h.moveEnd("character", -1)) : (u = t.getNext(c), d = t.hasAscendant("pre"), u = !(u && u.getText && u.getText().match(l)) && (d || !t.hasPrevious() || t.getPrevious().is && t.getPrevious().is("br")), d = a.document.createElement("span"), d.setHtml("&#65279;"), d.insertBefore(t), u && a.document.createText("").insertBefore(t)), a.setStartBefore(t), t.remove(), e ? (u ? (h.moveStart("character", -1), h.select(), a.document.$.selection.clear()) : h.select(), a.moveToPosition(d, CKEDITOR.POSITION_BEFORE_START), d.remove()) : (a.setEndBefore(s), s.remove(), h.select())
							} else {
								if (s = this.getNative(), !s) return;
								for (this.removeAllRanges(), h = 0; h < e.length; h++)
									if (h < e.length - 1 && (u = e[h], d = e[h + 1], l = u.clone(), l.setStart(u.endContainer, u.endOffset), l.setEnd(d.startContainer, d.startOffset), !l.collapsed && (l.shrink(CKEDITOR.NODE_ELEMENT, !0), a = l.getCommonAncestor(), l = l.getEnclosedNode(), a.isReadOnly() || l && l.isReadOnly()))) d.setStart(u.startContainer, u.startOffset), e.splice(h--, 1);
									else {
										a = e[h], d = this.document.$.createRange(), a.collapsed && CKEDITOR.env.webkit && i(a) && (u = this.root, o(u, !1), l = u.getDocument().createText("​"), u.setCustomData("cke-fillingChar", l), a.insertNode(l), (u = l.getNext()) && !l.getPrevious() && u.type == CKEDITOR.NODE_ELEMENT && "br" == u.getName() ? (o(this.root), a.moveToPosition(u, CKEDITOR.POSITION_BEFORE_START)) : a.moveToPosition(l, CKEDITOR.POSITION_AFTER_END)), d.setStart(a.startContainer.$, a.startOffset);
										try {
											d.setEnd(a.endContainer.$, a.endOffset)
										} catch (f) {
											if (!(f.toString().indexOf("NS_ERROR_ILLEGAL_VALUE") >= 0)) throw f;
											a.collapse(1), d.setEnd(a.endContainer.$, a.endOffset)
										}
										s.addRange(d)
									}
							}
							this.reset(), this.root.fire("selectionchange")
						}
					}
			},
			fake: function(e) {
				var t = this.root.editor;
				this.reset(), l(t);
				var n = this._.cache,
					i = new CKEDITOR.dom.range(this.root);
				i.setStartBefore(e), i.setEndAfter(e), n.ranges = new CKEDITOR.dom.rangeList(i), n.selectedElement = n.startElement = e, n.type = CKEDITOR.SELECTION_ELEMENT, n.selectedText = n.nativeSel = null, this.isFake = 1, this.rev = T++, t._.fakeSelection = this, this.root.fire("selectionchange")
			},
			isHidden: function() {
				var e = this.getCommonAncestor();
				return e && e.type == CKEDITOR.NODE_TEXT && (e = e.getParent()), !(!e || !e.data("cke-hidden-sel"))
			},
			createBookmarks: function(e) {
				return e = this.getRanges().createBookmarks(e), this.isFake && (e.isFake = 1), e
			},
			createBookmarks2: function(e) {
				return e = this.getRanges().createBookmarks2(e), this.isFake && (e.isFake = 1), e
			},
			selectBookmarks: function(e) {
				for (var t = [], n = 0; n < e.length; n++) {
					var i = new CKEDITOR.dom.range(this.root);
					i.moveToBookmark(e[n]), t.push(i)
				}
				return e.isFake ? this.fake(t[0].getEnclosedNode()) : this.selectRanges(t), this
			},
			getCommonAncestor: function() {
				var e = this.getRanges();
				return e.length ? e[0].startContainer.getCommonAncestor(e[e.length - 1].endContainer) : null
			},
			scrollIntoView: function() {
				this.type != CKEDITOR.SELECTION_NONE && this.getRanges()[0].scrollIntoView()
			},
			removeAllRanges: function() {
				if (this.getType() != CKEDITOR.SELECTION_NONE) {
					var e = this.getNative();
					try {
						e && e[m ? "empty" : "removeAllRanges"]()
					} catch (t) {}
					this.reset()
				}
			}
		}
	}(), CKEDITOR.STYLE_BLOCK = 1, CKEDITOR.STYLE_INLINE = 2, CKEDITOR.STYLE_OBJECT = 3, function() {
		function e(e, t) {
			for (var n, i;
				(e = e.getParent()) && !e.equals(t);)
				if (e.getAttribute("data-nostyle")) n = e;
				else if (!i) {
				var r = e.getAttribute("contentEditable");
				"false" == r ? n = e : "true" == r && (i = 1)
			}
			return n
		}

		function t(n) {
			var r = n.document;
			if (n.collapsed) r = T(this, r), n.insertNode(r), n.moveToPosition(r, CKEDITOR.POSITION_BEFORE_END);
			else {
				var o, s = this.element,
					a = this._.definition,
					l = a.ignoreReadonly,
					c = l || a.includeReadonly;
				void 0 == c && (c = n.root.getCustomData("cke_includeReadonly"));
				var u = CKEDITOR.dtd[s];
				u || (o = !0, u = CKEDITOR.dtd.span), n.enlarge(CKEDITOR.ENLARGE_INLINE, 1), n.trim();
				var d, h = n.createBookmark(),
					f = h.startNode,
					m = h.endNode,
					O = f;
				if (!l) {
					var C = n.getCommonAncestor(),
						l = e(f, C),
						C = e(m, C);
					l && (O = l.getNextSourceNode(!0)), C && (m = C)
				}
				for (O.getPosition(m) == CKEDITOR.POSITION_FOLLOWING && (O = 0); O;) {
					if (l = !1, O.equals(m)) O = null, l = !0;
					else {
						var g = O.type == CKEDITOR.NODE_ELEMENT ? O.getName() : null,
							C = g && "false" == O.getAttribute("contentEditable"),
							p = g && O.getAttribute("data-nostyle");
						if (g && O.data("cke-bookmark")) {
							O = O.getNextSourceNode(!0);
							continue
						}
						if (C && c && CKEDITOR.dtd.$block[g])
							for (var D = O, I = i(D), R = void 0, v = I.length, K = 0, D = v && new CKEDITOR.dom.range(D.getDocument()); v > K; ++K) {
								var R = I[K],
									y = CKEDITOR.filter.instances[R.data("cke-filter")];
								(y ? y.check(this) : 1) && (D.selectNodeContents(R), t.call(this, D))
							}
						if (I = g ? !u[g] || p ? 0 : C && !c ? 0 : (O.getPosition(m) | N) == N && (!a.childRule || a.childRule(O)) : 1) {
							if (!(I = O.getParent()) || !(I.getDtd() || CKEDITOR.dtd.span)[s] && !o || a.parentRule && !a.parentRule(I)) l = !0;
							else if (d || g && CKEDITOR.dtd.$removeEmpty[g] && (O.getPosition(m) | N) != N || (d = n.clone(), d.setStartBefore(O)), g = O.type, g == CKEDITOR.NODE_TEXT || C || g == CKEDITOR.NODE_ELEMENT && !O.getChildCount()) {
								for (var _, g = O;
									(l = !g.getNext(b)) && (_ = g.getParent(), u[_.getName()]) && (_.getPosition(f) | k) == k && (!a.childRule || a.childRule(_));) g = _;
								d.setEndAfter(g)
							}
						} else l = !0;
						O = O.getNextSourceNode(p || C)
					}
					if (l && d && !d.collapsed) {
						for (var S, w, A, l = T(this, r), C = l.hasAttributes(), p = d.getCommonAncestor(), g = {}, I = {}, R = {}, v = {}; l && p;) {
							if (p.getName() == s) {
								for (S in a.attributes) !v[S] && (A = p.getAttribute(w)) && (l.getAttribute(S) == A ? I[S] = 1 : v[S] = 1);
								for (w in a.styles) !R[w] && (A = p.getStyle(w)) && (l.getStyle(w) == A ? g[w] = 1 : R[w] = 1)
							}
							p = p.getParent()
						}
						for (S in I) l.removeAttribute(S);
						for (w in g) l.removeStyle(w);
						C && !l.hasAttributes() && (l = null), l ? (d.extractContents().appendTo(l), d.insertNode(l), E.call(this, l), l.mergeSiblings(), CKEDITOR.env.ie || l.$.normalize()) : (l = new CKEDITOR.dom.element("span"), d.extractContents().appendTo(l), d.insertNode(l), E.call(this, l), l.remove(!0)), d = null
					}
				}
				n.moveToBookmark(h), n.shrink(CKEDITOR.SHRINK_TEXT), n.shrink(CKEDITOR.NODE_ELEMENT, !0)
			}
		}

		function n(e) {
			function t() {
				for (var e = new CKEDITOR.dom.elementPath(i.getParent()), t = new CKEDITOR.dom.elementPath(c.getParent()), n = null, r = null, o = 0; o < e.elements.length; o++) {
					var s = e.elements[o];
					if (s == e.block || s == e.blockLimit) break;
					u.checkElementRemovable(s) && (n = s)
				}
				for (o = 0; o < t.elements.length && (s = t.elements[o], s != t.block && s != t.blockLimit); o++) u.checkElementRemovable(s) && (r = s);
				r && c.breakParent(r), n && i.breakParent(n)
			}
			e.enlarge(CKEDITOR.ENLARGE_INLINE, 1);
			var n = e.createBookmark(),
				i = n.startNode;
			if (e.collapsed) {
				for (var r, o, s = new CKEDITOR.dom.elementPath(i.getParent(), e.root), a = 0; a < s.elements.length && (o = s.elements[a]) && (o != s.block && o != s.blockLimit); a++)
					if (this.checkElementRemovable(o)) {
						var l;
						e.collapsed && (e.checkBoundaryOfElement(o, CKEDITOR.END) || (l = e.checkBoundaryOfElement(o, CKEDITOR.START))) ? (r = o, r.match = l ? "start" : "end") : (o.mergeSiblings(), o.is(this.element) ? h.call(this, o) : f(o, g(this)[o.getName()]))
					}
				if (r) {
					for (o = i, a = 0; l = s.elements[a], !l.equals(r); a++) l.match || (l = l.clone(), l.append(o), o = l);
					o["start" == r.match ? "insertBefore" : "insertAfter"](r)
				}
			} else {
				var c = n.endNode,
					u = this;
				for (t(), s = i; !s.equals(c);) r = s.getNextSourceNode(), s.type == CKEDITOR.NODE_ELEMENT && this.checkElementRemovable(s) && (s.getName() == this.element ? h.call(this, s) : f(s, g(this)[s.getName()]), r.type == CKEDITOR.NODE_ELEMENT && r.contains(i) && (t(), r = i.getNext())), s = r
			}
			e.moveToBookmark(n), e.shrink(CKEDITOR.NODE_ELEMENT, !0)
		}

		function i(e) {
			var t = [];
			return e.forEach(function(e) {
				return "true" == e.getAttribute("contenteditable") ? (t.push(e), !1) : void 0
			}, CKEDITOR.NODE_ELEMENT, !0), t
		}

		function r(e) {
			var t = e.getEnclosedNode() || e.getCommonAncestor(!1, !0);
			(e = new CKEDITOR.dom.elementPath(t, e.root).contains(this.element, 1)) && !e.isReadOnly() && O(e, this)
		}

		function o(e) {
			var t = e.getCommonAncestor(!0, !0);
			if (e = new CKEDITOR.dom.elementPath(t, e.root).contains(this.element, 1)) {
				var t = this._.definition,
					n = t.attributes;
				if (n)
					for (var i in n) e.removeAttribute(i, n[i]);
				if (t.styles)
					for (var r in t.styles) t.styles.hasOwnProperty(r) && e.removeStyle(r)
			}
		}

		function s(e) {
			var t = e.createBookmark(!0),
				n = e.createIterator();
			n.enforceRealBlocks = !0, this._.enterMode && (n.enlargeBr = this._.enterMode != CKEDITOR.ENTER_BR);
			for (var i, r, o = e.document; i = n.getNextParagraph();) !i.isReadOnly() && (n.activeFilter ? n.activeFilter.check(this) : 1) && (r = T(this, o, i), l(i, r));
			e.moveToBookmark(t)
		}

		function a(e) {
			var t = e.createBookmark(1),
				n = e.createIterator();
			n.enforceRealBlocks = !0, n.enlargeBr = this._.enterMode != CKEDITOR.ENTER_BR;
			for (var i, r; i = n.getNextParagraph();) this.checkElementRemovable(i) && (i.is("pre") ? ((r = this._.enterMode == CKEDITOR.ENTER_BR ? null : e.document.createElement(this._.enterMode == CKEDITOR.ENTER_P ? "p" : "div")) && i.copyAttributes(r), l(i, r)) : h.call(this, i));
			e.moveToBookmark(t)
		}

		function l(e, t) {
			var n = !t;
			n && (t = e.getDocument().createElement("div"), e.copyAttributes(t));
			var i = t && t.is("pre"),
				r = e.is("pre"),
				o = !i && r;
			if (i && !r) {
				if (r = t, (o = e.getBogus()) && o.remove(), o = e.getHtml(), o = u(o, /(?:^[ \t\n\r]+)|(?:[ \t\n\r]+$)/g, ""), o = o.replace(/[ \t\r\n]*(<br[^>]*>)[ \t\r\n]*/gi, "$1"), o = o.replace(/([ \t\n\r]+|&nbsp;)/g, " "), o = o.replace(/<br\b[^>]*>/gi, "\n"), CKEDITOR.env.ie) {
					var s = e.getDocument().createElement("div");
					s.append(r), r.$.outerHTML = "<pre>" + o + "</pre>", r.copyAttributes(s.getFirst()), r = s.getFirst().remove()
				} else r.setHtml(o);
				t = r
			} else o ? t = d(n ? [e.getHtml()] : c(e), t) : e.moveChildren(t);
			if (t.replace(e), i) {
				var a, n = t;
				(a = n.getPrevious(y)) && a.type == CKEDITOR.NODE_ELEMENT && a.is("pre") && (i = u(a.getHtml(), /\n$/, "") + "\n\n" + u(n.getHtml(), /^\n/, ""), CKEDITOR.env.ie ? n.$.outerHTML = "<pre>" + i + "</pre>" : n.setHtml(i), a.remove())
			} else n && m(t)
		}

		function c(e) {
			e.getName();
			var t = [];
			return u(e.getOuterHtml(), /(\S\s*)\n(?:\s|(<span[^>]+data-cke-bookmark.*?\/span>))*\n(?!$)/gi, function(e, t, n) {
				return t + "</pre>" + n + "<pre>"
			}).replace(/<pre\b.*?>([\s\S]*?)<\/pre>/gi, function(e, n) {
				t.push(n)
			}), t
		}

		function u(e, t, n) {
			var i = "",
				r = "",
				e = e.replace(/(^<span[^>]+data-cke-bookmark.*?\/span>)|(<span[^>]+data-cke-bookmark.*?\/span>$)/gi, function(e, t, n) {
					return t && (i = t), n && (r = n), ""
				});
			return i + e.replace(t, n) + r
		}

		function d(e, t) {
			var n;
			e.length > 1 && (n = new CKEDITOR.dom.documentFragment(t.getDocument()));
			for (var i = 0; i < e.length; i++) {
				var r = e[i],
					r = r.replace(/(\r\n|\r)/g, "\n"),
					r = u(r, /^[ \t]*\n/, ""),
					r = u(r, /\n$/, ""),
					r = u(r, /^[ \t]+|[ \t]+$/g, function(e, t) {
						return 1 == e.length ? "&nbsp;" : t ? " " + CKEDITOR.tools.repeat("&nbsp;", e.length - 1) : CKEDITOR.tools.repeat("&nbsp;", e.length - 1) + " "
					}),
					r = r.replace(/\n/g, "<br>"),
					r = r.replace(/[ \t]{2,}/g, function(e) {
						return CKEDITOR.tools.repeat("&nbsp;", e.length - 1) + " "
					});
				if (n) {
					var o = t.clone();
					o.setHtml(r), n.append(o)
				} else t.setHtml(r)
			}
			return n || t
		}

		function h(e, t) {
			var n, i = this._.definition,
				r = i.attributes,
				i = i.styles,
				o = g(this)[e.getName()],
				s = CKEDITOR.tools.isEmpty(r) && CKEDITOR.tools.isEmpty(i);
			for (n in r)("class" == n || this._.definition.fullMatch) && e.getAttribute(n) != p(n, r[n]) || t && "data-" == n.slice(0, 5) || (s = e.hasAttribute(n), e.removeAttribute(n));
			for (var a in i) this._.definition.fullMatch && e.getStyle(a) != p(a, i[a], !0) || (s = s || !!e.getStyle(a), e.removeStyle(a));
			f(e, o, I[e.getName()]), s && (this._.definition.alwaysRemoveElement ? m(e, 1) : !CKEDITOR.dtd.$block[e.getName()] || this._.enterMode == CKEDITOR.ENTER_BR && !e.hasAttributes() ? m(e) : e.renameNode(this._.enterMode == CKEDITOR.ENTER_P ? "p" : "div"))
		}

		function E(e) {
			for (var t, n = g(this), i = e.getElementsByTag(this.element), r = i.count(); --r >= 0;) t = i.getItem(r), t.isReadOnly() || h.call(this, t, !0);
			for (var o in n)
				if (o != this.element)
					for (i = e.getElementsByTag(o), r = i.count() - 1; r >= 0; r--) t = i.getItem(r), t.isReadOnly() || f(t, n[o])
		}

		function f(e, t, n) {
			if (t = t && t.attributes)
				for (var i = 0; i < t.length; i++) {
					var r, o = t[i][0];
					if (r = e.getAttribute(o)) {
						var s = t[i][1];
						(null === s || s.test && s.test(r) || "string" == typeof s && r == s) && e.removeAttribute(o)
					}
				}
			n || m(e)
		}

		function m(e, t) {
			if (!e.hasAttributes() || t)
				if (CKEDITOR.dtd.$block[e.getName()]) {
					var n = e.getPrevious(y),
						i = e.getNext(y);
					n && (n.type == CKEDITOR.NODE_TEXT || !n.isBlockBoundary({
						br: 1
					})) && e.append("br", 1), i && (i.type == CKEDITOR.NODE_TEXT || !i.isBlockBoundary({
						br: 1
					})) && e.append("br"), e.remove(!0)
				} else n = e.getFirst(), i = e.getLast(), e.remove(!0), n && (n.type == CKEDITOR.NODE_ELEMENT && n.mergeSiblings(), i && !n.equals(i) && i.type == CKEDITOR.NODE_ELEMENT && i.mergeSiblings())
		}

		function T(e, t, n) {
			var i;
			return i = e.element, "*" == i && (i = "span"), i = new CKEDITOR.dom.element(i, t), n && n.copyAttributes(i), i = O(i, e), t.getCustomData("doc_processing_style") && i.hasAttribute("id") ? i.removeAttribute("id") : t.setCustomData("doc_processing_style", 1), i
		}

		function O(e, t) {
			var n = t._.definition,
				i = n.attributes,
				n = CKEDITOR.style.getStyleText(n);
			if (i)
				for (var r in i) e.setAttribute(r, i[r]);
			return n && e.setAttribute("style", n), e
		}

		function C(e, t) {
			for (var n in e) e[n] = e[n].replace(K, function(e, n) {
				return t[n]
			})
		}

		function g(e) {
			if (e._.overrides) return e._.overrides;
			var t = e._.overrides = {},
				n = e._.definition.overrides;
			if (n) {
				CKEDITOR.tools.isArray(n) || (n = [n]);
				for (var i = 0; i < n.length; i++) {
					var r, o, s = n[i];
					if ("string" == typeof s ? r = s.toLowerCase() : (r = s.element ? s.element.toLowerCase() : e.element, o = s.attributes), s = t[r] || (t[r] = {}), o) {
						var a, s = s.attributes = s.attributes || [];
						for (a in o) s.push([a.toLowerCase(), o[a]])
					}
				}
			}
			return t
		}

		function p(e, t, n) {
			var i = new CKEDITOR.dom.element("span");
			return i[n ? "setStyle" : "setAttribute"](e, t), i[n ? "getStyle" : "getAttribute"](e)
		}

		function D(e, t, n) {
			for (var i, r = e.document, o = e.getRanges(), t = t ? this.removeFromRange : this.applyToRange, s = o.createIterator(); i = s.getNextRange();) t.call(this, i, n);
			e.selectRanges(o), r.removeCustomData("doc_processing_style")
		}
		var I = {
				address: 1,
				div: 1,
				h1: 1,
				h2: 1,
				h3: 1,
				h4: 1,
				h5: 1,
				h6: 1,
				p: 1,
				pre: 1,
				section: 1,
				header: 1,
				footer: 1,
				nav: 1,
				article: 1,
				aside: 1,
				figure: 1,
				dialog: 1,
				hgroup: 1,
				time: 1,
				meter: 1,
				menu: 1,
				command: 1,
				keygen: 1,
				output: 1,
				progress: 1,
				details: 1,
				datagrid: 1,
				datalist: 1
			},
			R = {
				a: 1,
				blockquote: 1,
				embed: 1,
				hr: 1,
				img: 1,
				li: 1,
				object: 1,
				ol: 1,
				table: 1,
				td: 1,
				tr: 1,
				th: 1,
				ul: 1,
				dl: 1,
				dt: 1,
				dd: 1,
				form: 1,
				audio: 1,
				video: 1
			},
			v = /\s*(?:;\s*|$)/,
			K = /#\((.+?)\)/g,
			b = CKEDITOR.dom.walker.bookmark(0, 1),
			y = CKEDITOR.dom.walker.whitespaces(1);
		CKEDITOR.style = function(e, t) {
			if ("string" == typeof e.type) return new CKEDITOR.style.customHandlers[e.type](e);
			var n = e.attributes;
			n && n.style && (e.styles = CKEDITOR.tools.extend({}, e.styles, CKEDITOR.tools.parseCssText(n.style)), delete n.style), t && (e = CKEDITOR.tools.clone(e), C(e.attributes, t), C(e.styles, t)), n = this.element = e.element ? "string" == typeof e.element ? e.element.toLowerCase() : e.element : "*", this.type = e.type || (I[n] ? CKEDITOR.STYLE_BLOCK : R[n] ? CKEDITOR.STYLE_OBJECT : CKEDITOR.STYLE_INLINE), "object" == typeof this.element && (this.type = CKEDITOR.STYLE_OBJECT), this._ = {
				definition: e
			}
		}, CKEDITOR.style.prototype = {
			apply: function(e) {
				if (e instanceof CKEDITOR.dom.document) return D.call(this, e.getSelection());
				if (this.checkApplicable(e.elementPath(), e)) {
					var t = this._.enterMode;
					t || (this._.enterMode = e.activeEnterMode), D.call(this, e.getSelection(), 0, e), this._.enterMode = t
				}
			},
			remove: function(e) {
				if (e instanceof CKEDITOR.dom.document) return D.call(this, e.getSelection(), 1);
				if (this.checkApplicable(e.elementPath(), e)) {
					var t = this._.enterMode;
					t || (this._.enterMode = e.activeEnterMode), D.call(this, e.getSelection(), 1, e), this._.enterMode = t
				}
			},
			applyToRange: function(e) {
				return this.applyToRange = this.type == CKEDITOR.STYLE_INLINE ? t : this.type == CKEDITOR.STYLE_BLOCK ? s : this.type == CKEDITOR.STYLE_OBJECT ? r : null, this.applyToRange(e)
			},
			removeFromRange: function(e) {
				return this.removeFromRange = this.type == CKEDITOR.STYLE_INLINE ? n : this.type == CKEDITOR.STYLE_BLOCK ? a : this.type == CKEDITOR.STYLE_OBJECT ? o : null, this.removeFromRange(e)
			},
			applyToObject: function(e) {
				O(e, this)
			},
			checkActive: function(e, t) {
				switch (this.type) {
					case CKEDITOR.STYLE_BLOCK:
						return this.checkElementRemovable(e.block || e.blockLimit, !0, t);
					case CKEDITOR.STYLE_OBJECT:
					case CKEDITOR.STYLE_INLINE:
						for (var n, i = e.elements, r = 0; r < i.length; r++)
							if (n = i[r], this.type != CKEDITOR.STYLE_INLINE || n != e.block && n != e.blockLimit) {
								if (this.type == CKEDITOR.STYLE_OBJECT) {
									var o = n.getName();
									if (!("string" == typeof this.element ? o == this.element : o in this.element)) continue
								}
								if (this.checkElementRemovable(n, !0, t)) return !0
							}
				}
				return !1
			},
			checkApplicable: function(e, t, n) {
				if (t && t instanceof CKEDITOR.filter && (n = t), n && !n.check(this)) return !1;
				switch (this.type) {
					case CKEDITOR.STYLE_OBJECT:
						return !!e.contains(this.element);
					case CKEDITOR.STYLE_BLOCK:
						return !!e.blockLimit.getDtd()[this.element]
				}
				return !0
			},
			checkElementMatch: function(e, t) {
				var n = this._.definition;
				if (!e || !n.ignoreReadonly && e.isReadOnly()) return !1;
				var i = e.getName();
				if ("string" == typeof this.element ? i == this.element : i in this.element) {
					if (!t && !e.hasAttributes()) return !0;
					if (i = n._AC) n = i;
					else {
						var i = {},
							r = 0,
							o = n.attributes;
						if (o)
							for (var s in o) r++, i[s] = o[s];
						(s = CKEDITOR.style.getStyleText(n)) && (i.style || r++, i.style = s), i._length = r, n = n._AC = i
					}
					if (!n._length) return !0;
					for (var a in n)
						if ("_length" != a) {
							if (r = e.getAttribute(a) || "", "style" == a) e: {
								i = n[a], "string" == typeof i && (i = CKEDITOR.tools.parseCssText(i)), "string" == typeof r && (r = CKEDITOR.tools.parseCssText(r, !0)), s = void 0;
								for (s in i)
									if (!(s in r) || r[s] != i[s] && "inherit" != i[s] && "inherit" != r[s]) {
										i = !1;
										break e
									}
								i = !0
							} else i = n[a] == r;
							if (i) {
								if (!t) return !0
							} else if (t) return !1
						}
					if (t) return !0
				}
				return !1
			},
			checkElementRemovable: function(e, t, n) {
				if (this.checkElementMatch(e, t, n)) return !0;
				if (t = g(this)[e.getName()]) {
					var i;
					if (!(t = t.attributes)) return !0;
					for (n = 0; n < t.length; n++)
						if (i = t[n][0], i = e.getAttribute(i)) {
							var r = t[n][1];
							if (null === r || "string" == typeof r && i == r || r.test(i)) return !0
						}
				}
				return !1
			},
			buildPreview: function(e) {
				var t = this._.definition,
					n = [],
					i = t.element;
				"bdo" == i && (i = "span");
				var n = ["<", i],
					r = t.attributes;
				if (r)
					for (var o in r) n.push(" ", o, '="', r[o], '"');
				return (r = CKEDITOR.style.getStyleText(t)) && n.push(' style="', r, '"'), n.push(">", e || t.name, "</", i, ">"), n.join("")
			},
			getDefinition: function() {
				return this._.definition
			}
		}, CKEDITOR.style.getStyleText = function(e) {
			var t = e._ST;
			if (t) return t;
			var t = e.styles,
				n = e.attributes && e.attributes.style || "",
				i = "";
			n.length && (n = n.replace(v, ";"));
			for (var r in t) {
				var o = t[r],
					s = (r + ":" + o).replace(v, ";");
				"inherit" == o ? i += s : n += s
			}
			return n.length && (n = CKEDITOR.tools.normalizeCssText(n, !0)), e._ST = n + i
		}, CKEDITOR.style.customHandlers = {}, CKEDITOR.style.addCustomHandler = function(e) {
			var t = function(e) {
				this._ = {
					definition: e
				}, this.setup && this.setup(e)
			};
			return t.prototype = CKEDITOR.tools.extend(CKEDITOR.tools.prototypedCopy(CKEDITOR.style.prototype), {
				assignedTo: CKEDITOR.STYLE_OBJECT
			}, e, !0), this.customHandlers[e.type] = t
		};
		var N = CKEDITOR.POSITION_PRECEDING | CKEDITOR.POSITION_IDENTICAL | CKEDITOR.POSITION_IS_CONTAINED,
			k = CKEDITOR.POSITION_FOLLOWING | CKEDITOR.POSITION_IDENTICAL | CKEDITOR.POSITION_IS_CONTAINED
	}(), CKEDITOR.styleCommand = function(e, t) {
		this.requiredContent = this.allowedContent = this.style = e, CKEDITOR.tools.extend(this, t, !0)
	}, CKEDITOR.styleCommand.prototype.exec = function(e) {
		e.focus(), this.state == CKEDITOR.TRISTATE_OFF ? e.applyStyle(this.style) : this.state == CKEDITOR.TRISTATE_ON && e.removeStyle(this.style)
	}, CKEDITOR.stylesSet = new CKEDITOR.resourceManager("", "stylesSet"), CKEDITOR.addStylesSet = CKEDITOR.tools.bind(CKEDITOR.stylesSet.add, CKEDITOR.stylesSet), CKEDITOR.loadStylesSet = function(e, t, n) {
		CKEDITOR.stylesSet.addExternal(e, t, ""), CKEDITOR.stylesSet.load(e, n)
	}, CKEDITOR.tools.extend(CKEDITOR.editor.prototype, {
		attachStyleStateChange: function(e, t) {
			var n = this._.styleStateChangeCallbacks;
			n || (n = this._.styleStateChangeCallbacks = [], this.on("selectionChange", function(e) {
				for (var t = 0; t < n.length; t++) {
					var i = n[t],
						r = i.style.checkActive(e.data.path, this) ? CKEDITOR.TRISTATE_ON : CKEDITOR.TRISTATE_OFF;
					i.fn.call(this, r)
				}
			})), n.push({
				style: e,
				fn: t
			})
		},
		applyStyle: function(e) {
			e.apply(this)
		},
		removeStyle: function(e) {
			e.remove(this)
		},
		getStylesSet: function(e) {
			if (this._.stylesDefinitions) e(this._.stylesDefinitions);
			else {
				var t = this,
					n = t.config.stylesCombo_stylesSet || t.config.stylesSet;
				if (n === !1) e(null);
				else if (n instanceof Array) t._.stylesDefinitions = n, e(n);
				else {
					n || (n = "default");
					var n = n.split(":"),
						i = n[0];
					CKEDITOR.stylesSet.addExternal(i, n[1] ? n.slice(1).join(":") : CKEDITOR.getUrl("styles.js"), ""), CKEDITOR.stylesSet.load(i, function(n) {
						t._.stylesDefinitions = n[i], e(t._.stylesDefinitions)
					})
				}
			}
		}
	}), CKEDITOR.dom.comment = function(e, t) {
		"string" == typeof e && (e = (t ? t.$ : document).createComment(e)), CKEDITOR.dom.domObject.call(this, e)
	}, CKEDITOR.dom.comment.prototype = new CKEDITOR.dom.node, CKEDITOR.tools.extend(CKEDITOR.dom.comment.prototype, {
		type: CKEDITOR.NODE_COMMENT,
		getOuterHtml: function() {
			return "<!--" + this.$.nodeValue + "-->"
		}
	}), function() {
		var e, t = {},
			n = {};
		for (e in CKEDITOR.dtd.$blockLimit) e in CKEDITOR.dtd.$list || (t[e] = 1);
		for (e in CKEDITOR.dtd.$block) e in CKEDITOR.dtd.$blockLimit || e in CKEDITOR.dtd.$empty || (n[e] = 1);
		CKEDITOR.dom.elementPath = function(e, i) {
			var r, o = null,
				s = null,
				a = [],
				l = e,
				i = i || e.getDocument().getBody();
			do
				if (l.type == CKEDITOR.NODE_ELEMENT) {
					if (a.push(l), !this.lastElement && (this.lastElement = l, l.is(CKEDITOR.dtd.$object) || "false" == l.getAttribute("contenteditable"))) continue;
					if (l.equals(i)) break;
					if (!s && (r = l.getName(), "true" == l.getAttribute("contenteditable") ? s = l : !o && n[r] && (o = l), t[r])) {
						var c;
						if (c = !o) {
							if (r = "div" == r) {
								e: {
									r = l.getChildren(), c = 0;
									for (var u = r.count(); u > c; c++) {
										var d = r.getItem(c);
										if (d.type == CKEDITOR.NODE_ELEMENT && CKEDITOR.dtd.$block[d.getName()]) {
											r = !0;
											break e
										}
									}
									r = !1
								}
								r = !r
							}
							c = r
						}
						c ? o = l : s = l
					}
				}
			while (l = l.getParent());
			s || (s = i), this.block = o, this.blockLimit = s, this.root = i, this.elements = a
		}
	}(), CKEDITOR.dom.elementPath.prototype = {
		compare: function(e) {
			var t = this.elements,
				e = e && e.elements;
			if (!e || t.length != e.length) return !1;
			for (var n = 0; n < t.length; n++)
				if (!t[n].equals(e[n])) return !1;
			return !0
		},
		contains: function(e, t, n) {
			var i;
			"string" == typeof e && (i = function(t) {
				return t.getName() == e
			}), e instanceof CKEDITOR.dom.element ? i = function(t) {
				return t.equals(e)
			} : CKEDITOR.tools.isArray(e) ? i = function(t) {
				return CKEDITOR.tools.indexOf(e, t.getName()) > -1
			} : "function" == typeof e ? i = e : "object" == typeof e && (i = function(t) {
				return t.getName() in e
			});
			var r = this.elements,
				o = r.length;
			for (t && o--, n && (r = Array.prototype.slice.call(r, 0), r.reverse()), t = 0; o > t; t++)
				if (i(r[t])) return r[t];
			return null
		},
		isContextFor: function(e) {
			var t;
			return e in CKEDITOR.dtd.$block ? (t = this.contains(CKEDITOR.dtd.$intermediate) || this.root.equals(this.block) && this.block || this.blockLimit, !!t.getDtd()[e]) : !0
		},
		direction: function() {
			return (this.block || this.blockLimit || this.root).getDirection(1)
		}
	}, CKEDITOR.dom.text = function(e, t) {
		"string" == typeof e && (e = (t ? t.$ : document).createTextNode(e)), this.$ = e
	}, CKEDITOR.dom.text.prototype = new CKEDITOR.dom.node, CKEDITOR.tools.extend(CKEDITOR.dom.text.prototype, {
		type: CKEDITOR.NODE_TEXT,
		getLength: function() {
			return this.$.nodeValue.length
		},
		getText: function() {
			return this.$.nodeValue
		},
		setText: function(e) {
			this.$.nodeValue = e
		},
		split: function(e) {
			var t = this.$.parentNode,
				n = t.childNodes.length,
				i = this.getLength(),
				r = this.getDocument(),
				o = new CKEDITOR.dom.text(this.$.splitText(e), r);
			return t.childNodes.length == n && (e >= i ? (o = r.createText(""), o.insertAfter(this)) : (e = r.createText(""), e.insertAfter(o), e.remove())), o
		},
		substring: function(e, t) {
			return "number" != typeof t ? this.$.nodeValue.substr(e) : this.$.nodeValue.substring(e, t)
		}
	}), function() {
		function e(e, t, n) {
			var i = e.serializable,
				r = t[n ? "endContainer" : "startContainer"],
				o = n ? "endOffset" : "startOffset",
				s = i ? t.document.getById(e.startNode) : e.startNode,
				e = i ? t.document.getById(e.endNode) : e.endNode;
			return r.equals(s.getPrevious()) ? (t.startOffset = t.startOffset - r.getLength() - e.getPrevious().getLength(), r = e.getNext()) : r.equals(e.getPrevious()) && (t.startOffset = t.startOffset - r.getLength(), r = e.getNext()), r.equals(s.getParent()) && t[o] ++, r.equals(e.getParent()) && t[o] ++, t[n ? "endContainer" : "startContainer"] = r, t
		}
		CKEDITOR.dom.rangeList = function(e) {
			return e instanceof CKEDITOR.dom.rangeList ? e : (e ? e instanceof CKEDITOR.dom.range && (e = [e]) : e = [], CKEDITOR.tools.extend(e, t))
		};
		var t = {
			createIterator: function() {
				var e, t = this,
					n = CKEDITOR.dom.walker.bookmark(),
					i = [];
				return {
					getNextRange: function(r) {
						e = void 0 == e ? 0 : e + 1;
						var o = t[e];
						if (o && t.length > 1) {
							if (!e)
								for (var s = t.length - 1; s >= 0; s--) i.unshift(t[s].createBookmark(!0));
							if (r)
								for (var a = 0; t[e + a + 1];) {
									for (var l = o.document, r = 0, s = l.getById(i[a].endNode), l = l.getById(i[a + 1].startNode);;) {
										if (s = s.getNextSourceNode(!1), l.equals(s)) r = 1;
										else if (n(s) || s.type == CKEDITOR.NODE_ELEMENT && s.isBlockBoundary()) continue;
										break
									}
									if (!r) break;
									a++
								}
							for (o.moveToBookmark(i.shift()); a--;) s = t[++e], s.moveToBookmark(i.shift()), o.setEnd(s.endContainer, s.endOffset)
						}
						return o
					}
				}
			},
			createBookmarks: function(t) {
				for (var n, i = [], r = 0; r < this.length; r++) {
					i.push(n = this[r].createBookmark(t, !0));
					for (var o = r + 1; o < this.length; o++) this[o] = e(n, this[o]), this[o] = e(n, this[o], !0)
				}
				return i
			},
			createBookmarks2: function(e) {
				for (var t = [], n = 0; n < this.length; n++) t.push(this[n].createBookmark2(e));
				return t
			},
			moveToBookmarks: function(e) {
				for (var t = 0; t < this.length; t++) this[t].moveToBookmark(e[t])
			}
		}
	}(), function() {
		function e() {
			return CKEDITOR.getUrl(CKEDITOR.skinName.split(",")[1] || "skins/" + CKEDITOR.skinName.split(",")[0] + "/")
		}

		function t(t) {
			var n = CKEDITOR.skin["ua_" + t],
				i = CKEDITOR.env;
			if (n)
				for (var r, n = n.split(",").sort(function(e, t) {
						return e > t ? -1 : 1
					}), o = 0; o < n.length; o++)
					if (r = n[o], i.ie && (r.replace(/^ie/, "") == i.version || i.quirks && "iequirks" == r) && (r = "ie"), i[r]) {
						t += "_" + n[o];
						break
					}
			return CKEDITOR.getUrl(e() + t + ".css")
		}

		function n(e, n) {
			o[e] || (CKEDITOR.document.appendStyleSheet(t(e)), o[e] = 1), n && n()
		}

		function i(e) {
			var t = e.getById(s);
			return t || (t = e.getHead().append("style"), t.setAttribute("id", s), t.setAttribute("type", "text/css")), t
		}

		function r(e, t, n) {
			var i, r, o;
			if (CKEDITOR.env.webkit)
				for (t = t.split("}").slice(0, -1), r = 0; r < t.length; r++) t[r] = t[r].split("{");
			for (var s = 0; s < e.length; s++)
				if (CKEDITOR.env.webkit)
					for (r = 0; r < t.length; r++) {
						for (o = t[r][1], i = 0; i < n.length; i++) o = o.replace(n[i][0], n[i][1]);
						e[s].$.sheet.addRule(t[r][0], o)
					} else {
						for (o = t, i = 0; i < n.length; i++) o = o.replace(n[i][0], n[i][1]);
						CKEDITOR.env.ie && CKEDITOR.env.version < 11 ? e[s].$.styleSheet.cssText = e[s].$.styleSheet.cssText + o : e[s].$.innerHTML = e[s].$.innerHTML + o
					}
		}
		var o = {};
		CKEDITOR.skin = {
			path: e,
			loadPart: function(t, i) {
				CKEDITOR.skin.name != CKEDITOR.skinName.split(",")[0] ? CKEDITOR.scriptLoader.load(CKEDITOR.getUrl(e() + "skin.js"), function() {
					n(t, i)
				}) : n(t, i)
			},
			getPath: function(e) {
				return CKEDITOR.getUrl(t(e))
			},
			icons: {},
			addIcon: function(e, t, n, i) {
				e = e.toLowerCase(), this.icons[e] || (this.icons[e] = {
					path: t,
					offset: n || 0,
					bgsize: i || "16px"
				})
			},
			getIconStyle: function(e, t, n, i, r) {
				var o;
				return e && (e = e.toLowerCase(), t && (o = this.icons[e + "-rtl"]), o || (o = this.icons[e])), e = n || o && o.path || "", i = i || o && o.offset, r = r || o && o.bgsize || "16px", e && "background-image:url(" + CKEDITOR.getUrl(e) + ");background-position:0 " + i + "px;background-size:" + r + ";"
			}
		}, CKEDITOR.tools.extend(CKEDITOR.editor.prototype, {
			getUiColor: function() {
				return this.uiColor
			},
			setUiColor: function(e) {
				var t = i(CKEDITOR.document);
				return (this.setUiColor = function(e) {
					var n = CKEDITOR.skin.chameleon,
						i = [
							[l, e]
						];
					this.uiColor = e, r([t], n(this, "editor"), i), r(a, n(this, "panel"), i)
				}).call(this, e)
			}
		});
		var s = "cke_ui_color",
			a = [],
			l = /\$color/g;
		CKEDITOR.on("instanceLoaded", function(e) {
			if (!CKEDITOR.env.ie || !CKEDITOR.env.quirks) {
				var t = e.editor,
					e = function(e) {
						if (e = (e.data[0] || e.data).element.getElementsByTag("iframe").getItem(0).getFrameDocument(), !e.getById("cke_ui_color")) {
							e = i(e), a.push(e);
							var n = t.getUiColor();
							n && r([e], CKEDITOR.skin.chameleon(t, "panel"), [
								[l, n]
							])
						}
					};
				t.on("panelShow", e), t.on("menuShow", e), t.config.uiColor && t.setUiColor(t.config.uiColor)
			}
		})
	}(), function() {
		if (CKEDITOR.env.webkit) CKEDITOR.env.hc = !1;
		else {
			var e = CKEDITOR.dom.element.createFromHtml('<div style="width:0;height:0;position:absolute;left:-10000px;border:1px solid;border-color:red blue"></div>', CKEDITOR.document);
			e.appendTo(CKEDITOR.document.getHead());
			try {
				var t = e.getComputedStyle("border-top-color"),
					n = e.getComputedStyle("border-right-color");
				CKEDITOR.env.hc = !(!t || t != n)
			} catch (i) {
				CKEDITOR.env.hc = !1
			}
			e.remove()
		}
		if (CKEDITOR.env.hc && (CKEDITOR.env.cssClass = CKEDITOR.env.cssClass + " cke_hc"), CKEDITOR.document.appendStyleText(".cke{visibility:hidden;}"), CKEDITOR.status = "loaded", CKEDITOR.fireOnce("loaded"), e = CKEDITOR._.pending)
			for (delete CKEDITOR._.pending, t = 0; t < e.length; t++) CKEDITOR.editor.prototype.constructor.apply(e[t][0], e[t][1]), CKEDITOR.add(e[t][0])
	}(), CKEDITOR.skin.name = "Moono_blue", CKEDITOR.skin.ua_editor = "ie,iequirks,ie7,ie8,gecko", CKEDITOR.skin.ua_dialog = "ie,iequirks,ie7,ie8,opera", CKEDITOR.skin.chameleon = function() {
		var e = function() {
				return function(e, t) {
					for (var n = e.match(/[^#]./g), i = 0; 3 > i; i++) {
						var r, o = n,
							s = i;
						r = parseInt(n[i], 16), r = ("0" + (0 > t ? 0 | r * (1 + t) : 0 | r + (255 - r) * t).toString(16)).slice(-2), o[s] = r
					}
					return "#" + n.join("")
				}
			}(),
			t = function() {
				var e = new CKEDITOR.template("background:#{to};background-image:-webkit-gradient(linear,lefttop,leftbottom,from({from}),to({to}));background-image:-moz-linear-gradient(top,{from},{to});background-image:-webkit-linear-gradient(top,{from},{to});background-image:-o-linear-gradient(top,{from},{to});background-image:-ms-linear-gradient(top,{from},{to});background-image:linear-gradient(top,{from},{to});filter:progid:DXImageTransform.Microsoft.gradient(gradientType=0,startColorstr='{from}',endColorstr='{to}');");
				return function(t, n) {
					return e.output({
						from: t,
						to: n
					})
				}
			}(),
			n = {
				editor: new CKEDITOR.template("{id}.cke_chrome [border-color:{defaultBorder};] {id} .cke_top [ {defaultGradient}border-bottom-color:{defaultBorder};] {id} .cke_bottom [{defaultGradient}border-top-color:{defaultBorder};] {id} .cke_resizer [border-right-color:{ckeResizer}] {id} .cke_dialog_title [{defaultGradient}border-bottom-color:{defaultBorder};] {id} .cke_dialog_footer [{defaultGradient}outline-color:{defaultBorder};border-top-color:{defaultBorder};] {id} .cke_dialog_tab [{lightGradient}border-color:{defaultBorder};] {id} .cke_dialog_tab:hover [{mediumGradient}] {id} .cke_dialog_contents [border-top-color:{defaultBorder};] {id} .cke_dialog_tab_selected, {id} .cke_dialog_tab_selected:hover [background:{dialogTabSelected};border-bottom-color:{dialogTabSelectedBorder};] {id} .cke_dialog_body [background:{dialogBody};border-color:{defaultBorder};] {id} .cke_toolgroup [{lightGradient}border-color:{defaultBorder};] {id} a.cke_button_off:hover, {id} a.cke_button_off:focus, {id} a.cke_button_off:active [{mediumGradient}] {id} .cke_button_on [{ckeButtonOn}] {id} .cke_toolbar_separator [background-color: {ckeToolbarSeparator};] {id} .cke_combo_button [border-color:{defaultBorder};{lightGradient}] {id} a.cke_combo_button:hover, {id} a.cke_combo_button:focus, {id} .cke_combo_on a.cke_combo_button [border-color:{defaultBorder};{mediumGradient}] {id} .cke_path_item [color:{elementsPathColor};] {id} a.cke_path_item:hover, {id} a.cke_path_item:focus, {id} a.cke_path_item:active [background-color:{elementsPathBg};] {id}.cke_panel [border-color:{defaultBorder};] "),
				panel: new CKEDITOR.template(".cke_panel_grouptitle [{lightGradient}border-color:{defaultBorder};] .cke_menubutton_icon [background-color:{menubuttonIcon};] .cke_menubutton:hover .cke_menubutton_icon, .cke_menubutton:focus .cke_menubutton_icon, .cke_menubutton:active .cke_menubutton_icon [background-color:{menubuttonIconHover};] .cke_menuseparator [background-color:{menubuttonIcon};] a:hover.cke_colorbox, a:focus.cke_colorbox, a:active.cke_colorbox [border-color:{defaultBorder};] a:hover.cke_colorauto, a:hover.cke_colormore, a:focus.cke_colorauto, a:focus.cke_colormore, a:active.cke_colorauto, a:active.cke_colormore [background-color:{ckeColorauto};border-color:{defaultBorder};] ")
			};
		return function(i, r) {
			var o = i.uiColor,
				o = {
					id: "." + i.id,
					defaultBorder: e(o, -.1),
					defaultGradient: t(e(o, .9), o),
					lightGradient: t(e(o, 1), e(o, .7)),
					mediumGradient: t(e(o, .8), e(o, .5)),
					ckeButtonOn: t(e(o, .6), e(o, .7)),
					ckeResizer: e(o, -.4),
					ckeToolbarSeparator: e(o, .5),
					ckeColorauto: e(o, .8),
					dialogBody: e(o, .7),
					dialogTabSelected: t("#FFFFFF", "#FFFFFF"),
					dialogTabSelectedBorder: "#FFF",
					elementsPathColor: e(o, -.6),
					elementsPathBg: o,
					menubuttonIcon: e(o, .5),
					menubuttonIconHover: e(o, .3)
				};
			return n[r].output(o).replace(/\[/g, "{").replace(/\]/g, "}")
		}
	}(), CKEDITOR.config.plugins = "", CKEDITOR.config.skin = "Moono_blue", CKEDITOR.lang.languages = {
		en: 1,
		vi: 1
	})
}();