
function loadScript(a, b) {
    var c = document.head || document.getElementsByTagName("head")[0],
    d = document.createElement("script");
    d.type = "text/javascript",
    d.src = a,
    c.appendChild(d),
    d.onload = d.onreadystatechange = function() {
        var a = this.readyState; (!a || "loaded" == a || "complete" == a) && b()
    }
}
loadScript("<?php echo Yii::app()->request->getHostInfo().Yii::app()->baseUrl; ?>/js/jquery.min.js",
function() {
    function b(a) {
        a.fn.cssO = function(b) {
            var c = a(this);
            for (var d in b) b.hasOwnProperty(d) && c.css(d, b[d]);
            return c
        };
        var b = {
            domain: '<?php echo Yii::app()->request->getServerName(); ?>',
            imgWidth: 200,
            server_url: "<?php echo Yii::app()->request->getHostInfo().Yii::app()->baseUrl; ?>/",
            imgHeight: 200,
            maxWidth: 200,
            maxHeight: 200,
            init: function() {
                if (window.location.href == "about:blank") return window.location.href = this.domain, !1;
                var a = window.location.href.substr(7);
                a = a.substr(0, a.indexOf('/'));
                
                var hostName = this.domain;
                
                if (a == hostName) return alert("你就在<?php echo Yii::app()->name; ?>呢,不能采集本站哦!"),!1;
                this.overLay(),
                this.checkGoods();
                return
            },
            checkGoods: function() {
                var b = this.server_url + "index.php/pickup/ajax_varify_url",
                c = {},
                d = this,
                e = function(b) {
                    if (b.message == "picture") {
                        if (d.getImgSize() <= 0 || d.getImg() == "") return alert("抱歉,页面上没有足够大的图片"),
                        a("#overLay").remove(),
                        !1;
                        a("#waitFor").show(),
                        window.setTimeout(function() {
                            d.forImg(),
                            a(".meiliLogo").show()
                        },
                        10)
                    } else b.message == "goods" ? (a("#overLay").remove(), d.showIframe(d.server_url + "index.php/goods/fetch?url=" + encodeURIComponent(window.location.href) + "&from=pickup")) : b.message == "bad shop" && alert("对不起,请换其他页面尝试抓图")
                },
                f = a.get(b, c, e, "jsonp")
            },
            showIframe: function(b) {
                a("waitFor").show();
                var c = '<div style="position: absolute; width: 100%;height: ' + a(window).height() + "px; top: " + a(document).scrollTop() + 'px; z-index: 7000001; left: 0; visibility: visible; " class="iframePanel"><iframe width="100%" height="100%" src="' + b + '" frameborder="0" scrolling="no" allowTransparency="true" ></iframe></div>';
                a(".iframePanel").size() == 0 && a("body").append(c = a(c)),
                a("body").css("overflow", "hidden");
                var d = window.postMessage,
                e = null;
                if (!d) {
                    var f = c.find("iframe")[0];
                    e = window.setInterval(function() {
                        try {
                            var a = f.contentWindow.name
                        } catch(b) {}
                        "close" == a && (h(), window.clearInterval(e))
                    },
                    500)
                } else {
                    function g(a) {
                        var b = a.data;
                        "close" == b && h()
                    }
                    window.addEventListener ? window.addEventListener("message", g, !1) : window.attachEvent("onmessage", g)
                }
                var h = function() {
                    a("body").css("overflow", "auto"),
                    c.remove()
                }
            },
            getImgSize: function() {
                var b = a(document).find("img").size();
                return b
            },
            getImg: function() {
                var b = a(document).find("img"),
                c = b.size(),
                d = [],
                e = {};
                for (var f = 0; f < c; f++) {
                    var g = b.eq(f),
                    h = g.width(),
                    i = g.height(),
                    j = {};
                    if (g.attr("src") in e) continue;
                    e[g.attr("src")] = !0;
                    if (h >= this.maxWidth && i >= this.maxHeight) {
                        if (g.attr("src") == "" || g.attr("src") == undefined || g.attr("src") == null) continue;
                        var k = new Image;
                        k.src = g[0].src,
                        h / i >= this.imgWidth / this.imgHeight ? h > this.imgWidth ? (k.width = this.imgWidth, k.height = i * this.imgWidth / h) : (k.width = h, k.height = i) : i > this.imgHeight ? (k.height = this.imgHeight, k.width = h * this.imgHeight / i) : (k.height = i, k.width = h),
                        j.width = h,
                        j.height = i,
                        j.img = k,
                        d.push(j)
                    }
                }
                return d
            },
            forImg: function() {
                var b = this,
                c = this.getImg(),
                d = c.length;
                for (var e = 0; e < d; e++) {
                    var f = c[e];
                    a("#overLay").append(a('<div class="imgItem"><span class="imgUpload">抓取</span><span class="imgSize" style="background: #fff;border-radius: 4px; -webkit-border-radius: 4px;float:left;font-size: 11px; position:absolute; bottom: 10px; left: 70px; width: 60px;" >' + f.width + " x " + f.height + "</span></div>").append(f.img)),
                    a(f.img).cssO({
                        "margin-top": (this.imgHeight - a(f.img).height()) / 2
                    })
                }
                a(".imgItem").cssO({
                    "float": "left",
                    cursor: "pointer",
                    "text-align": "center",
                    position: "relative",
                    width: "200px",
                    height: "200px",
                    overflow: "hidden",
                    "border-right": "1px solid #e7e7e7",
                    "border-bottom": "1px solid #e7e7e7",
                    "background-color": "#fff"
                }).bind("click",
                function() {
                    window.setTimeout(function() {
                        a("#overLay").remove()
                    },1e3),
                    b.showIframe(b.server_url + "index.php/goods/fetch?picurl=" + encodeURIComponent(a(this).find("img").attr("src")) + "&from=pickup&location=" + encodeURIComponent(window.location.href))
                }),
                a(".imgUpload").cssO({
                    position: "absolute",
                    display: "none",
                    height: "32px",
                    background: "url('"+ b.server_url + "images/zq.png') no-repeat",
                    cursor: "pointer",
                    color: "#fff",
                    "font-size": "14px",
                    "font-weight": "bold",
                    "line-height": "32px",
                    left: "57px",
                    top: "80px",
                    "text-align": "center",
                    width: "82px"
                }),
                a(".imgItem").hover(function() {
                    a(this).find(".imgUpload").show()
                },
                function() {
                    a(this).find(".imgUpload").hide()
                }),
                a("#waitFor").hide()
            },
            overLay: function() {
                var b = this;
                this.closeOverLay(),
                a(window).scrollTop(0);
                var c = '<div id="overLay" ><div style="width:100%;height:40px;background: -moz-linear-gradient(#FFFCFC, #F3F0F0); background: -webkit-linear-gradient(#FFFCFC, #F3F0F0); filter:progid:DXImageTransform.Microsoft.gradient(startcolorstr=#FFFCFC,endcolorstr=#F3F0F0);border-bottom:1px solid #ccc;line-height: 40px;text-align: center;"><div style="cursor:pointer; color: #666; font-size: 14px; font-weight: bold; text-align: center;" id="closeOverLay">关闭</div></div><div class="meiliLogo"><a style="display: block; height: 200px; width: 200px; " href="<?php echo Yii::app()->request->getHostInfo(); ?>" target="_blank"></a></div></div>';
                a("body").append(a(c)),
                a("#overLay").width(a(document).width()),
                a("#overLay").height(a(document).height()),
                a("#overLay").cssO({
                    "background-color": "rgba(255,255,255,0.8)",
                    filter: "progid:DXImageTransform.Microsoft.gradient(startcolorstr=#ccffffff,endcolorstr=#ccffffff)",
                    position: "absolute",
                    "z-index": "999999",
                    top: "0"
                }),
                a(".meiliLogo").cssO({
                    "float": "left",
                    cursor: "pointer",
                    "text-align": "center",
                    width: "200px",
                    height: "200px",
                    overflow: "hidden",
                    "border-right": "1px solid #e7e7e7",
                    "border-bottom": "1px solid #e7e7e7",
                    background: "#f2f0f0 url("+b.server_url+"/images/logo_n2.png) no-repeat center",
                    display: "none"
                }),
                a("#overLay").append('<div id="waitFor" style="text-align:center;position:absolute;left:50%;margin-left:-25px;top:100px;z-index:9999999;padding:3px; color:#999;" ><p><img src="'+b.server_url+'/images/indicator_medium.gif" /></p><p>抓取中...</p></div>'),
                a("#closeOverLay").click(function() {
                    b.closeOverLay()
                })
            },
            overLayGoods: function() {
                var b = this;
                this.closeOverLay(),
                a(window).scrollTop(0);
                var c = '<div id="overLay" ></div>';
                a("body").append(a(c)),
                a("#overLay").width(a(document).width()),
                a("#overLay").height(a(document).height()),
                a("#overLay").cssO({
                    "background-color": "rgba(255,255,255,0.8)",
                    filter: "progid:DXImageTransform.Microsoft.gradient(startcolorstr=#ccffffff,endcolorstr=#ccffffff)",
                    position: "absolute",
                    "z-index": "999999",
                    top: "0"
                }),
                a("#closeOverLay").click(function() {
                    b.closeOverLay()
                })
            },
            closeOverLay: function() {
                a("#overLay").remove(),
                a(".iframePanel").remove()
            },
            findImg: function() {
                var b = this,
                c = '<div class="shareToMeilishuo" style="width:40px;background:#fff;height:20px;border:solid 1px #FCBCD2;" ><?php echo Yii::app()->name ?></div>';
                a("body").append(a(c)),
                a(".shareToMeilishuo").cssO({
                    cursor: "pointer",
                    position: "absolute",
                    display: "none",
                    "z-index": "9999999999999"
                }),
                a(".shareToMeilishuo").hover(function(c) {
                    a(this).show(),
                    b.stopPropagation(c)
                },
                function() {
                    a(this).hide()
                })
            },
            mouseImg: function() {
                var b = this.getImgSize(),
                c = a(a(document).find("img")),
                d = [],
                e = [];
                for (var f = 0; f < b; f++) {
                    var g = c.eq(f),
                    h = g.width(),
                    i = g.height();
                    h >= this.maxWidth && i >= this.maxHeight && g.hover(function() {
                        a(".shareToMeilishuo").show(),
                        a(".shareToMeilishuo").cssO({
                            top: a(this).offset().top,
                            left: a(this).offset().left
                        }),
                        a(".shareToMeilishuo").attr("src", a(this).attr("src"))
                    },
                    function() {
                        a(".shareToMeilishuo").hide()
                    })
                }
                a(".shareToMeilishuo").click(function() {
                    window.open(b.server_url+"?imgurl=" + a(this).attr("src"), "newwindow", "location=yes", "width=400,height=400")
                })
            },
            stopPropagation: function(a) {
                var b = a || window.event;
                b.stopPropagation ? b.stopPropagation() : b.cancelBubble = !0
            }
        };
        b.init()
    }
    try {
        jQuery.noConflict(),
        b(jQuery)
    } catch(a) {
        alert("该网站暂时不支持<?php echo Yii::app()->name ?>拾宝器抓取")
    }
})