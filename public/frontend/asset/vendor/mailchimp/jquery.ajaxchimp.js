(function (e) {
	"use strict";
	e.ajaxChimp = {
		responses: {
			0: "We have sent you a confirmation email",
			1: "Please enter a value",
			2: "An email address must contain a single @",
			3: "The domain portion of the email address is invalid",
			4: "The username portion of the email address is invalid",
			5: "This email address looks fake or invalid. Please enter a real email address",
			6: "is already subscribed to list"
		},
		translations: {
			en: null
		},
		init: function (t, n) {
			e(t).ajaxChimp(n)
		}
	};
	e.fn.ajaxChimp = function (t) {
		e(this).each(function (n, r) {
			var i = e(r);
			var s = i.find("input[type=email]");
			var o = i.find("label[for=" + s.attr("id") + "]");
			var u = e.extend({
				url: i.attr("action"),
				language: "en"
			}, t);
			var a = u.url.replace("/post?", "/post-json?").concat("&c=?");
			i.attr("novalidate", "true");
			s.attr("name", "EMAIL");
			i.submit(function () {
				function n(n) {
					if (n.result === "success") {
						t = "We have sent you a confirmation email";
						o.removeClass("error").addClass("valid");
						s.removeClass("error").addClass("valid")
					} else {
						s.removeClass("valid").addClass("error");
						o.removeClass("valid").addClass("error");
						var r = -1;
						try {
							var i = n.msg.split(" - ", 2);
							if (i[1] === undefined) {
								t = n.msg
							} else {
								var a = parseInt(i[0], 10);
								if (a.toString() === i[0]) {
									r = i[0];
									t = i[1]
								} else {
									r = -1;
									t = n.msg
								}
							}
						} catch (f) {
							r = -1;
							t = n.msg
						}
					}
					var l = 0,
						c;
					if (Object.keys) {
						l = Object.keys(e.ajaxChimp.responses).length
					} else {
						for (var h in e.ajaxChimp.responses) {
							if (e.ajaxChimp.responses.hasOwnProperty(h)) {
								l++
							}
						}
					}
					while (l--) {
						if (t.indexOf(e.ajaxChimp.responses[l]) !== -1) {
							c = l
						}
					}
					if (u.language !== "en" && c > -1 && e.ajaxChimp.translations && e.ajaxChimp.translations[u.language] && e.ajaxChimp.translations[u.language][c]) {
						t = e.ajaxChimp.translations[u.language][c]
					}
					o.html(t);
					o.show(2e3);
					if (u.callback) {
						u.callback(n)
					}
				}
				var t;
				var r = {};
				var f = i.serializeArray();
				e.each(f, function (e, t) {
					r[t.name] = t.value
				});
				e.ajax({
					url: a,
					data: r,
					success: n,
					dataType: "jsonp",
					error: function (e, t) {
						window.console.log("mailchimp ajax submit error: " + t)
					}
				});
				var l = "Submitting...";
				if (u.language !== "en" && e.ajaxChimp.translations && e.ajaxChimp.translations[u.language] && e.ajaxChimp.translations[u.language].submit) {
					l = e.ajaxChimp.translations[u.language].submit
				}
				o.html(l).show(2e3);
				return false
			})
		});
		return this
	}
})(jQuery)
