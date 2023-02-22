var _parent = self.parent;
_parent.doksoft_extend = function(d, b, a) {
	for (var c in b) {
		d[c] = b[c];
	}
	if (a && (typeof a == "object" || typeof a == "array")) {
		for (var c in a) {
			d[c] = a[c];
		}
	}
	return d;
};
var _ = function(a) {
	return document.getElementById(a);
};
var __ = function(c, a) {
	var b = document.createEvent("Event");
	b.initEvent(!a ? "change" : a, true, true);
	c && c.dispatchEvent && c.dispatchEvent(b);
	!a && __(c, "keyup");
};
var default_template = {
		boxShadow: "-moz-box-shadow:%1 %2px %3px %4px %5px #%6;-webkit-box-shadow:%1 %2px %3px %4px %5px #%6;box-shadow:%1 %2px %3px %4px %5px #%6;",
		gradient: "background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #%1), color-stop(1, #%2));background:-moz-linear-gradient(top, #%1 5%, #%2 100%);background:-webkit-linear-gradient(top, #%1 5%, #%2 100%);background:-o-linear-gradient(top, #%1 5%, #%2 100%);background:-ms-linear-gradient(top, #%1 5%, #%2 100%);background:linear-gradient(to bottom, #%1 5%, #%2 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#%1', endColorstr='#%2',GradientType=0);",
		background: "background-color:#%1;",
		borderRadius: "-moz-border-radius:%1px;-webkit-border-radius:%1px;border-radius:%1px;",
		border: "border:%1px solid #%2;",
		display: "display:inline-block;",
		color: "color:#%1;",
		fontFamily: "font-family:%1;",
		fontSize: "font-size:%1px;",
		fontWeight: "font-weight:%1;",
		fontStyle: "font-style:%1;",
		padding: "padding:%1px %2px;",
		textDecoration: "text-decoration:none;",
		textShadow: "text-shadow:%1px %2px %3px #%4;",
	},
	default_theme = {
		boxShadow: ["", 0, 1, 0, 0, "ffe0b5"],
		gradient: ["fbb450", "f89306", ],
		background: ["fbb450"],
		borderRadius: [7],
		border: [1, "c97e1c"],
		display: [],
		color: ["ffffff"],
		fontFamily: ["Trebuchet MS"],
		fontSize: [17],
		fontWeight: [],
		fontStyle: [],
		padding: [6, 11],
		textDecoration: [],
		textShadow: [0, 1, 0, "8f7f24"],
	},
	null_theme = {
		gradient: [],
		background: [],
		borderRadius: [0],
		border: [0, "ffffff"],
		display: [],
		color: ["000000"],
		fontFamily: ["Trebuchet MS"],
		fontSize: [17],
		padding: [0, 0],
		textDecoration: [],
	};
_parent._theme = _parent.doksoft_extend({}, default_theme);
_parent.doksoft_remix = function(f, e) {
	var a = [],
		b = 0;
	for (var d in default_template) {
		if (f[d] && f[d].length) {
			a[b] = default_template[d];
			for (var c = 0; c < f[d].length; c++) {
				a[b] = a[b].replace(RegExp("%" + (c + 1), "g"), f[d][c]);
			}
		} else {
			if (!{
					textShadow: "1",
					gradient: "1",
					boxShadow: "1",
					fontWeight: "1",
					fontStyle: ""
				}[d]) {
				a[b] = default_template[d];
			}
		}
		b++;
	}
	return a.join(!e ? "" : e);
};
_parent.doksoft_exampleButton = 0;
_parent.doksoft_preview = 0;
var fg = 0;
_parent.doksoft_recalc = function(a) {
	_parent.doksoft_currentButtonStyles.innerHTML = ".myButton{\n" + _parent.doksoft_remix(a, "\n") + "\n}";
	clearTimeout(fg);
	fg = setTimeout(function() {
		_parent.doksoft_exampleButton.style.marginTop = (_parent.doksoft_preview.offsetHeight / 2 - _parent.doksoft_exampleButton.offsetHeight / 2) + "px";
	}, 100);
};
_parent.setValueToInputs = function(d) {
	_parent._theme = d;
	for (var c in default_template) {
		!d[c] && null_theme[c] && (d[c] = _parent.doksoft_extend([], null_theme[c]));
		if (d[c]) {
			for (var b = 0, e = 0; d[c] && (b < d[c].length); b++) {
				if (e = _("setting-" + c + "-" + (b + 1))) {
					if (c == "boxShadow" && b == 0) {
						e.checked = (d[c][b] != "");
					}
					e.value = (d[c][b] + "").toLowerCase();
					if (c == "background") {
						_("setting-gradient-1").value = e.value;
					}
					__(e);
					$(e).change();
					_("setting-" + c + "-" + (b + 1) + "-value") && (_("setting-" + c + "-" + (b + 1) + "-value").innerHTML = e.value);
				}
			}
		}
		if (c == "fontStyle") {
			_(c).checked = (d[c] && d[c][0] == "italic");
		} else {
			if (c == "fontWeight") {
				_(c).checked = (d[c] && d[c][0] == "bold");
			} else {
				if (c == "boxShadow" || c == "textShadow") {
					_(c).checked = d[c] ? true : false;
					for (var a = 1; _("setting-" + c + "-" + a); a++) {
						_("setting-" + c + "-" + a)[!_(c).checked ? "setAttribute" : "removeAttribute"]("disabled", true);
						_(c).checked && __(_("setting-" + c + "-" + a));
					}
				}
			}
		}
	}
	_parent.doksoft_recalc(d);
};
_parent.doksoft_restore = function(a) {
	_parent.setValueToInputs(_parent.doksoft_parse(a ? a.style : ""));
	_("button-text").value = a ? a.text : "";
	_("button-href").value = a ? a.link : "";
	_("button-target").value = a ? a.target : "";
	__(_("button-target"));
	__(_("button-href"));
	__(_("button-text"));
};
_parent.doksoft_parse = function(a) {
	var m = function(i) {
		return i.replace(/^[\s]+/, "").replace(/[\s]+$/, "");
	};
	var g = function(j) {
		if (j.substr(0, 1) === "#" || j.indexOf("rgb") == -1) {
			return j;
		}
		var p = /(.*?)rgb\((\d+),\s*(\d+),\s*(\d+)\)/i.exec(j),
			o = parseInt(p[2], 10).toString(16),
			n = parseInt(p[3], 10).toString(16),
			i = parseInt(p[4], 10).toString(16);
		return ((o.length == 1 ? "0" + o : o) + (n.length == 1 ? "0" + n : n) + (i.length == 1 ? "0" + i : i));
	};
	var d = [/box-shadow:[\s]?(inset)?([\s\-0-9]+)px ([\s\-0-9]+)px ([\s\-0-9]+)px ([\s\-0-9]+)px (#[0-9abcdef]+|rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\));/i, /background-color:[\s]?(#[0-9abcdef]+|rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\));/i, /background:[\s]?linear-gradient\(to bottom, (#[0-9abcdef]+|rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\)) 5%, (#[0-9abcdef]+|rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\)) 100%\);/i, /background:[\s]?linear-gradient\([\s]?(rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\))[\s]?[0-9]+\%,[\s]?(rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\))[\s]?[0-9]+%/i, /border-radius:([\s\-0-9]+)px;/i, /border:([\s\-0-9]+)px solid (#[0-9abcdef]+|rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\));/i, /;[\s]?color:[\s]?(#[0-9abcdef]+|rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\));/i, /font-family:([^;]+);/i, /font-size:([\s\-0-9]+)px;/i, /font-weight:[\s]?(bold|normal);/i, /font-style:[\s]?(italic|normal);/i, /padding:([\s\-0-9]+)px ([\s\-0-9]+)px;/i, /text-shadow:([\s\-0-9]+)px ([\s\-0-9]+)px ([\s\-0-9]+)px (#[0-9abcdef]+|rgb\([\s0-9]+,[\s0-9]+,[\s0-9]+\));/i, ],
		l = ["boxShadow", "background", "gradient", "gradient", "borderRadius", "border", "color", "fontFamily", "fontSize", "fontWeight", "fontStyle", "padding", "textShadow"],
		f = {},
		h = false,
		b = "";
	for (var e = 0, k = ""; e < d.length; e++) {
		k = l[e];
		if (rest = d[e].exec(a)) {
			!f[k] && (f[k] = []);
			for (var c = 1; c < rest.length; c++) {
				b = rest[c] ? g(m(rest[c]).replace("#", "")) : "";
				if (k == "background" && !f["gradient"]) {
					f["gradient"] = [b, b];
				}
				f[k][c - 1] = b;
			}
		}
	}
	return f;
};
_parent.getResultButton = function() {
	var target = _("button-target").value;
	target = target != '' ? ' target="' + target + '"' : '';
	return '<a style="' + _parent.doksoft_remix(_parent._theme) + '" href="' + _("button-href").value + '"' + target + '>' + _("button-text").value + "</a>";
};
(function() {
	_parent.doksoft_exampleButton = _("doksoft_exampleButton");
	_parent.doksoft_currentButtonStyles = _("doksoft_currentButtonStyles");
	_parent.doksoft_preview = _("doksoft_preview");
	var a = document.getElementsByTagName("input");
	a[a.length] = _("setting-fontFamily-1");
	_("button-text").onkeyup = _("button-text").onchange = function() {
		_parent.doksoft_exampleButton.innerHTML = this.value;
	};
	_("button-href").onkeyup = _("button-href").onchange = function() {
		_parent.doksoft_exampleButton.setAttribute("href", this.value);
	};
	_("button-target").onkeyup = _("button-target").onchange = function() {
		_parent.doksoft_exampleButton.setAttribute("target", this.value);
	};
	for (var b = 0; a[b]; b++) {
		if (a[b].id && a[b].id.match(/setting-/)) {
			a[b].addEventListener("change", function() {
				var c = /setting-([a-zA-Z]+)-([0-9]+)/.exec(this.id);
				if (c[1] == "gradient" && _("setting-gradient-1").value == _("setting-gradient-2").value) {
					c[1] = "background";
					delete _parent._theme["gradient"];
				}
				if (c[1] && default_theme[c[1]]) {
					if (!_parent._theme[c[1]]) {
						_parent._theme[c[1]] = _parent.doksoft_extend([], default_theme[c[1]]);
					}
					_parent._theme[c[1]][parseInt(c[2]) - 1] = (this.getAttribute("type") != "checkbox") ? this.value : this.checked ? "inset" : "";
				}
				_(this.id + "-value") && (_(this.id + "-value").innerHTML = this.value);
				_parent.doksoft_recalc(_parent._theme);
			}, false);
		}
	}
	_("textShadow").onchange = _("boxShadow").onchange = function() {
		var d = [];
		for (var c = 1; _("setting-" + this.id + "-" + c); c++) {
			d[c - 1] = (this.id == "boxShadow" && c == 1) ? (_("setting-" + this.id + "-" + c).checked ? "inset" : "") : _("setting-" + this.id + "-" + c).value;
			_("setting-" + this.id + "-" + c)[!this.checked ? "setAttribute" : "removeAttribute"]("disabled", true);
			__(_("setting-" + this.id + "-" + c));
		}
		if (this.checked) {
			_parent._theme[this.id] = d;
		} else {
			if (_parent._theme[this.id]) {
				delete _parent._theme[this.id];
			}
		}
		_parent.doksoft_recalc(_parent._theme);
	};
	_("fontWeight").onchange = function() {
		this.value = _parent._theme[this.id] = [(this.checked) ? "bold" : "normal"];
		_("fontWeight1").className = "btn1 " + (this.checked ? " active" : "");
		_parent.doksoft_recalc(_parent._theme);
	};
	_("fontStyle").onchange = function() {
		this.value = _parent._theme[this.id] = [(this.checked) ? "italic" : "normal"];
		_("fontStyle1").className = "btn1 " + (this.checked ? " active" : "");
		_parent.doksoft_recalc(_parent._theme);
	};
	_("fontWeight1").onclick = function() {
		_("fontWeight").checked = !_("fontWeight").checked;
		__(_("fontWeight"));
	};
	_("fontStyle1").onclick = function() {
		_("fontStyle").checked = !_("fontStyle").checked;
		__(_("fontStyle"));
	};
	_parent.setValueToInputs(_parent._theme);
	_parent["doksoft_restore"](_parent.currentData);
})();