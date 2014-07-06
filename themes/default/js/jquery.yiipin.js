var Yiipin = {
		config: {}, //设置项目
		userLogin: false,//用户是否登录
		fluid_runing: false,//瀑布流正在运行
		frame:0,//瀑布流帧
		fluid_end:false,//瀑布流是否到了最低端
		//加入收藏
		addFavorite: function () {
		    try {
		        var href = location.href;
		        var frm = href.indexOf('?') > -1 ? '&frm=shoucangjia': '?frm=shoucangjia';
		        if (document.all) {
		            window.external.addFavorite(href + frm, Yiipin.config.appname);
		        } else if (window.sidebar) {
		            window.sidebar.addPanel(Yiipin.config.appname, href + frm, '');
		        } else {
		            Yiipin.showTip();
		        }
		    } catch(e) {
		    	Yiipin.showTip();
		    }
		},
		//不支持js加收藏的浏览器弹出提示
		showTip: function () {
		    if ($('.favor_tip').length == 0) {
		        var h = '<div class="favor_tip none_f" style="position:absolute; right:40px; top:38px; border:1px solid #F3DB79; background-color:#FFC; width:200px; height:45px; text-align:center;">' + '<p style="height:22px; line-height:22px;">您的浏览器不支持自动加收藏</p>' + '<p style="height:22px; line-height:22px;">请按<span style="font-weight:bold;">ctrl+d</span>加入收藏</p>' + '</div>';
		        $('#goTop').append(h);
		    }
		    $('.favor_tip').show();
		    setTimeout(function() {
		        $('.favor_tip').hide();
		    },
		    3000);
		},
		//检查登录状态，并弹出登录对话框
		check_login: function(){
			var result = true;
		    $.ajax({
		        type: 'get',
		        url: Yiipin.config.urls.check_logins_tatus,
		        async: false,// 同步传输执行
		        success: function (data) {               
		        	if(data == 'false') {
		    			$('#login-dialog').dialog('open');
		    			result = false;
		    		}
		        }
		    });
		    Yiipin.userLogin = result;
		    return result;
		},
		//剪切字符串
		cutstr: function(str, len) {
		    var str_length = 0;
		    var str_len = 0;
		    str_cut = '';
		    str_len = str.length;
		    for (var i = 0; i < str_len; i++) {
		        a = str.charAt(i);
		        str_length++;
		        if (escape(a).length > 4) {
		            str_length++;
		        }
		        str_cut = str_cut + a;
		        if (str_length >= len) {
		            str_cut = str_cut + '...';
		            return str_cut;
		        }
		    }
		    if (str_length < len) {
		        return str;
		    }
		},
		search: function () {
		    var $searchBox = $('#frame_header_tools_searchBox .ipt1 input');
		    var $searchList = $('#search_type');
		    var $searchListLi = $searchList.children('li');
		    var formValType = {
		        'goods': [1, 'goods'],
		        'user': [2, 'user'],
		        'magazine': [3, 'magazine']
		    };
		    var search_type = '';
		    var search_bg = $('.search_bg').css('background-color');
		    var onkeydownpage = function(evt) {
		        if ($searchList) {
		            var evt = evt ? evt: (window.event ? window.event: null);
		            var l = $searchListLi.length;
		            if (document.all) {
		                var kcode = evt.keyCode;
		            } else {
		                var kcode = evt.which;
		            }
		            if (kcode === 40) {
		                for (var i = 0; i < l; i++) {
		                    if ($searchListLi.eq(i).css('background-color') === search_bg) {
		                        var x = parseInt((i + 1) % l);
		                        $searchListLi.eq(i).removeClass('search_bg');
		                        $searchListLi.eq(x).addClass('search_bg');
		                        search_type = $searchListLi.eq(x).attr('stype');
		                        changeFormVal(search_type);
		                        break;
		                    }
		                }
		            }
		            if (kcode === 38) {
		                for (var i = 0; i < l; i++) {
		                    if ($searchListLi.eq(i).css('background-color') === search_bg) {
		                        var x = parseInt((i - 1) % l);
		                        if (i === 0) {
		                            x = parseInt(l - 1);
		                        }
		                        $searchListLi.eq(i).removeClass('search_bg');
		                        $searchListLi.eq(x).addClass('search_bg');
		                        search_type = $searchListLi.eq(x).attr('stype');
		                        changeFormVal(search_type);
		                        break;
		                    }
		                }
		            }
		        }
		    }
		    var showSearchList = function(evt) {
		        if ($searchBox.val() != '') {
		            var k = 10;
		            var text = $searchBox.val();
		            text = Yiipin.cutstr(text, k);
		            $('#search_type .input_words').text(text);
		            var offset = $searchBox.attr('js-data-offset');
		            if(offset == undefined) 
		            	offset=0;
		            else
		            	offset = parseInt(offset);
		            
		            $searchList.css({
		                'position': 'absolute',
		                'left': $searchBox.offset().left - 4 + offset + 'px',
		                'top': $searchBox.offset().top + $searchBox.height() + 6 + 'px',
		                'z-index': 996
		            }).show();
		            onkeydownpage(evt);
		        } else {
		            var t = setTimeout(function() {
		                $searchList.hide();
		            },
		            200);
		        }
		    };
		    var changeFormVal = function(stype) {
		        formVal = formValType[stype];
		        if (!formVal) {
		            return;
		        }
		        $('#searchType').val(formVal[0]);
		        $('#filter').val(formVal[1]);
		    };
		    var init = function() {
		        $searchBox.click(function(e) {
		            if ($(this).val() === '搜宝贝、人、杂志...') {
		                $(this).val('');
		            }
		            showSearchList(e);
		        }).blur(function(e) {
		            if ($(this).val() === '') {
		                $(this).val('搜宝贝、人、杂志...');
		            };
		            var t = setTimeout(function() {
		                $searchList.hide();
		            },
		            200);
		        }).keyup(function(e) {
		            showSearchList(e);
		        });
		        $searchListLi.mouseenter(function() {
		            $searchListLi.removeClass('search_bg');
		            $(this).addClass('search_bg');
		            search_type = $(this).attr('stype');
		            changeFormVal(search_type);
		        }).click(function() {
		            $('#frame_header_tools_searchBox').submit();
		        });
		        window.onresize = function(e) {
		            $searchList.css({
		                'position': 'absolute',
		                'left': $searchBox.offset().left - 4 + 'px',
		                'top': $searchBox.offset().top + $searchBox.height() + 6 + 'px',
		                'z-index': 1000
		            });
		        };
		    };
		    init();
		},
		masonry: function(options){
			var defaults = {url:'', page:1, wallSelector:'', itemSelector:'', contSelector: 'div.content_fluid',contWidth:null,clearboth:false,skipFirstFrame:false,itemWidth:240};
			var settings = $.extend({}, defaults, options || {});
			
			if(settings.skipFirstFrame) Yiipin.frame += 1;
			
			//设定页面宽度
			var cols = 3;
			if(settings.contWidth){
				if(settings.clearboth){
					settings.contWidth += 12;
				}
				cols = parseInt(settings.contWidth / settings.itemWidth);
			}
			else{
				min_width = 960;
				var screen_width = $(window).width();
				cols = parseInt(screen_width / settings.itemWidth);
				var fluid_width = cols * settings.itemWidth;
				if(fluid_width < min_width) {
					fluid_width = min_width;
					cols = 4;
				}
				$(settings.contSelector).width(fluid_width);
		    }

			//先取出特殊部分
			var $wall = $(settings.wallSelector);
		    var corner_left = $wall.find('div.corner_notic');
		    var corner_right = $wall.find('div.corner_stamp');
		    var first_frame = $wall.find('div.first_frame');
		    $wall.empty();
			for(var i=0; i<cols; i++){
				var html = $('<div class="fluid_column"></div>');
				if(cols-1 == i && $.browser.msie && $.browser.version == '6.0') html.addClass('last_fluid_column');
				if(settings.clearboth){
					if(i==0) html.css('margin-left', 0);
					if(i==cols-1) html.css('margin-right', 0);
				}
				$wall.append(html);
			}
			$wall.append('<div class="clear"></div>');
			$wall.find('div.fluid_column:eq(0)').append(corner_left);
			$wall.find('div.fluid_column:eq('+(cols-1)+')').append(corner_right);
			
			//将第一帧加入
			var $col = $wall.find('div.fluid_column');
			first_frame.children().each(function(){
			    //取得最矮的列
			    var min_height=0;
			    var lowest_col=0;
		    	$col.each(function(col_index){
		    	    var height = $(this).height();
		    	    if(col_index == 0){
			    	    min_height = height;
			    	    lowest_col = 0;
		    	    }else{
		    	        if(height < min_height){
		    	            min_height = height;
		    	            lowest_col = col_index;
		    	        }
		    	    }
		    	});

		    	$col.eq(lowest_col).append($(this));
		    	if(typeof($.fn.lazyload) == 'function'){
		    		$(this).find("img.lazy").lazyload();
				}
		    });
			
			Yiipin.ajax_get_goods(settings);
			$(window).bind("scroll",function() {
				if(!Yiipin.fluid_end && !Yiipin.fluid_runing){
					if ($(document).scrollTop() + $(window).height() > $(document).height() - 700) {	
						Yiipin.ajax_get_goods(settings);
					}
				}
			});
			
		},
		ajax_get_goods: function (settings){
			Yiipin.fluid_runing = true;
			if(Yiipin.frame >0) $('div.botSpinner').show();
			$.get(settings.url, {frame:Yiipin.frame, page: settings.page}, function( newElements ) {
				if(newElements == 'false'){
					$('div.paging_panel').show();
					$('div.botSpinner').hide();
					$('div.topSpinner').hide();
					Yiipin.fluid_end = true;
					Yiipin.fluid_runing = false;
					return;
				}
				var newElems = $(newElements);
				var $col = $(settings.wallSelector+' div.fluid_column');
			    newElems.each(function(){
				    //取得最矮的列
				    var min_height=0;
				    var lowest_col=0;
			    	$col.each(function(col_index){
			    	    var height = $(this).height();
			    	    if(col_index == 0){
				    	    min_height = height;
				    	    lowest_col = 0;
			    	    }else{
			    	        if(height < min_height){
			    	            min_height = height;
			    	            lowest_col = col_index;
			    	        }
			    	    }
			    	});

			    	$col.eq(lowest_col).append($(this));
			    	if(typeof($.fn.lazyload) == 'function'){
			    		$(this).find("img.lazy").lazyload();
					}
			    });

			    $('div.topSpinner').hide();
		        $('div.botSpinner').hide();
		        Yiipin.fluid_runing = false;
		        Yiipin.frame ++;
		    });
		}
		
};


$(document).ready(function(){
	//ajax全局加载状态指示
	$("#ajax_loading").ajaxStart(function(){
		$(this).show();
	}).ajaxSuccess(function(){
		$(this).hide();
	});
	
    //dialog窗口始终居中
	$(window).resize(function() {
	    if($(".ui-dialog-content").size()>0) $(".ui-dialog-content").dialog("option", "position", "center");
	}).scroll(function() {
		if($(".ui-dialog-content").size()>0) $(".ui-dialog-content").dialog("option", "position", "center");
	});
	
	//右下角收藏
	$('.collect').click(Yiipin.addFavorite);
    $('#go_top').click(function() {
        $(window).scrollTop(0);
        return false;
    });
    
    var navbar_prepended = false;
	var $navbar = $("div.js-scroll-navbar");
	var $gotop = $("#goTop").css({position: 'absolute',left: $(document).width()-50});
	
    if($navbar.size()>0){
	    var start_y = $navbar.offset().top;
	    var navbar = $navbar.clone();
	
	    $(window).scroll(function() {
	        if($(document).scrollTop() > start_y){
	        	if(!navbar_prepended){
		            navbar.prependTo('body').addClass('fixed-top').css('left', $navbar.offset().left);
		            navbar_prepended = true;
	        	}
	        }
	        else{
	        	navbar.remove();
	        	navbar_prepended = false;
	        }
		    
			$gotop.css({top: $(document).scrollTop() + $(window).height() - 200});
	        if ($(document).scrollTop() > 0) {
	            $gotop.show();
	        }
	        else { 
	            $gotop.hide(); 
	        }
	    });
	}
    Yiipin.search();
	$("#frame_header_tools_searchBox").submit(function() {
        var a = $("#searchKey").val().length;
        var v = $("#searchKey").val();
        if (v == '搜宝贝、人、杂志...') {
            alert('搜索关键词不能为空.');
            return false;
        }
        if (a == 0) {
            alert('搜索关键词不能为空.');
            return false;
        }
        return true;
    });
    
    //顶部菜单
	$('#setting').live('mouseenter', function(){
		$('.add_menu_leo').hide();
		$('#moreConnectBox').css({ top: $(this).offset().top+26, left: $(this).offset().left-1 }).show();
	});

	$('#message').live('mouseenter', function(){
		$('.add_menu_leo').hide();
		$('#moreMessageBox').css({ top: $(this).offset().top+26, left: $(this).offset().left-74 }).show();
	});

	$('.add_menu_leo[id!=messageTipBox]').live('mouseleave', function(){$(this).hide();});

    
	//创建杂志对话框
	$('#createNewMagazine .select').live('click', function(){
		$('#createNewMagazine .options').show();
		$('#ForwardMsg').hide();
		return false;
	});
	//杂志下拉菜单
	$('#createNewMagazine .options li').live('click', function(){
		$('#createNewMagazine .selectText').attr('val', $(this).attr('id')).text($(this).text());
		$('#createNewMagazine .options').hide();
		$('#share_to_group_id').val($(this).attr('id'));
		return false;
	});
	//创建杂志
	$('#createMaga').live('click', function(){
		var name = $('#createMagaValue').val();
		if(name == '' || name == '创建一个杂志') {
			$('#ForwardMsg').text('请输入杂志名称！').show();
			return;
		}
		$.post(Yiipin.config.urls.goods_create_group, {name: name}, function(result){
			if(result == 'false'){
				$('#ForwardMsg').text('哎呀，这个名称已经有人使用了，请换个名称吧！').show();
			}
			else{
				$('#share_to_group_id').val(result);
				$('#createNewMagazine .selectText').attr('val', result).text(name);
				$('#createNewMagazine .options').hide();
				$('#createNewMagazine .options ul').append('<li id="'+result+'" class="border">'+name+'</li>');
			}
		});
		
	});
	//收进杂志
	$('#forwardToMagazine').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		if($('#magaContent').val() == '写点什么，评论一下') $('#magaContent').val('');
		$.post($('#create-goods-form').attr('action'), $('#create-goods-form').serialize(), function(result){
			var data = eval('('+result+')');
			if(data.result == false){
				$('#sharMaga').text(data.message).show();
			}
			else{
				if(typeof(data.url) !== 'undefined') 
					window.top.location.href = data.url;
				else
				{
					$('#ajax-dialog').dialog('close');
					alert('成功收进杂志！');
				}
			}
		});
	});

	//创建杂志
	$('#createMagazine').live('click', function(){
		var name = $('#createMagaName').val();
		if(name == '' || name == '20个字以内') {
			$('#createMagaMsg').text('请输入杂志名称！').show();
			return;
		}
		if($('#share-magazine input[name="category_id"]:checked').size()==0){
			$('#createMagaMsg').text('请选择杂志类别！').show();
			return;
		}
		$.post(Yiipin.config.urls.goods_create_group, $('#share-magazine form').serialize(), function(result){
			if(result == 'false'){
				$('#createMagaMsg').text('哎呀，这个名称已经有人使用了，请换个名称吧！').show();
			}
			else{
				window.top.location.href = Yiipin.config.urls.good_view_width_id +result;
			}
		});
		
	});
	
	//检测新消息
	var checkNewMsg = function(){
			if(!Yiipin.userLogin) return;
			if(Yiipin.fluid_runing) return;
			
    		$.get(Yiipin.config.urls.site_checkmsg, {}, function(result){
        	var data = eval('('+result+')');
        	if(data.hasnew){
            	if(data.fansCount > 0){
                	$('#msgFansCount').text(data.fansCount);
            	}
            	else{
            		$('#msgFansCount').parent().parent().remove();
            	}
            	if(data.sysmsgCount > 0){
                	$('#msgSysmsgCount').text(data.sysmsgCount);
            	}
            	else{
            		$('#msgSysmsgCount').parent().parent().remove();
            	}
            	if(data.likemeCount > 0){
                	$('#msgLikemeCount').text(data.likemeCount);
            	}
            	else{
            		$('#msgLikemeCount').parent().parent().remove();
            	}
        	    $('#messageTipBox').css({ top: $('#message').offset().top+26, left: $('#message').offset().left-74 }).show();
        	}
    	});
	};
	
	

	$('#setAllRead').click(function(){
		$.get(Yiipin.config.urls.site_setallmsgread, {}, function(result){
		    $('#messageTipBox').hide();
		});
	});

	//新分享检测
	var checkNewShares = function(){
		if(!Yiipin.userLogin) return;
		if(Yiipin.fluid_runing) return;

		$.get(Yiipin.config.urls.home_checknewshares, {last_refresh_time: Yiipin.config.timestamp}, function(result){
			var data = eval('('+result+')');
			if(data.count > 0){
			    $('#msgSize').text(data.count);
			    $('#updateFluid').show();
			    if(window.location.href.indexOf('/home') == -1){
			    	$('.navbar_share_count').text(data.count).show();
				    $('#navbar_share_tip').show();
			    }
			}
			else{
				$('#navbar_share_tip').hide();
				$('#updateFluid').hide();
			}
		});
	};
	
	checkNewMsg();
	setInterval(checkNewMsg, 60000);
	checkNewShares();
	setInterval(checkNewShares, 60000);
	
	
	//分享对话框
	$('#shareMeiliDialog').live('click', function(){
		$('.add_menu_leo').hide();
		$("#share-dialog").dialog("open");
	});
	$('#shareMeiliGoods').live('click', function(){
		$("#share-dialog").dialog("close");
		$("#share-goods").dialog("open");
	});
	$('#shareMeiliPic').live('click', function(){
		$("#share-dialog").dialog("close");
		$("#share-pic").dialog("open");
	});
	$('#newMeiliMagazine').live('click', function(){
		$("#share-dialog").dialog("close");
		$("#share-magazine").dialog("open");
	});

	$('#addGoodsSubmit').live('click', function(){
		var url = $('#addGoodsUrl').val();
		if(url == ''){
			$('#linkMessageTips').html('<span class="red">请粘贴或者输入正确的宝贝链接</span>');
			return;
		}
		$('#linkMessageTips').html('正在抓取宝贝信息，请稍候……');
		$.post(Yiipin.config.urls.goods_fetch, {url: url}, function(html){
			if(html != 'false'){
				$("#share-goods").dialog("close");
				$('#ajax-dialog').html(html).dialog({
					'title':'分享宝贝',
			        'autoOpen':true,
					'modal':true,
					'width':'550px'
				});
			}
			else{
				$('#linkMessageTips').html('<span class="red">宝贝链接好像不对哦，换一个试试看</span>');
			}
		});
	});
	
	//分享图片
	$('#uploadFileSubmit').live('change', function() {
                var filename = $(this).val();
                if (!/\.(gif|jpg|png|jpeg|bmp)$/i.test(filename)) {
                    alert('请上传标准图片文件, 我们支持gif,jpg,png和jpeg.');
                    return false;
                } else {
                	$('#submitPicture').submit();
                }
	});
            
	$('#share-pic a.up_photos').live('click', function(){
		$('#uploadFileSubmit').trigger('click');
	});

	//登录对话框
	$('#login-dialog form').submit(function(){
		$.post(Yiipin.config.urls.site_ajaxlogin,$(this).serialize(),function(result){
			if(result == 'true'){
				$('#login-dialog').dialog('close');
				$('#login-status').load(Yiipin.config.urls.site_loginstatus);
				Yiipin.userLogin = true;
			}
			else{
				$('#login-dialog .loginErrorMessage').text('登录失败，请重试').show();
			}
		});
		return false;
	});
	
	//表情
	$('.share_smileys,.toggle_smileys').live('click', function(){
		var btn = $(this);
		$('#twitter_tools_faces_table').css({ position:'absolute', top: $(this).offset().top, left: $(this).offset().left-80 }).show();

		$('#twitter_tools_faces_table').find('.face_list img').unbind('click').bind('click',function(){
			var textarea = btn.parent().parent().parent().find('textarea');console.log(btn.parent().parent().parent());
			textarea.val(textarea.val()+$(this).attr('emotion')).focus();
			$('#twitter_tools_faces_table').hide();
		});
	});

	$('.returnBack').click(function(){$('#twitter_tools_faces_table').hide();});

	//关注杂志
	$('.groupFollow').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get(Yiipin.config.urls.group_follow, {group_id: $(this).attr('group_id'), act: 'on'}, function(){
			btn.removeClass('groupFollow').removeClass('small_btn').addClass('pink_follow');
			btn.text('已关注');
			btn.hover(function(){$(this).text('取消关注');}, function(){$(this).text('已关注')});
		});
	});
	
	$('.pink_follow').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get(Yiipin.config.urls.group_follow, {group_id: $(this).attr('group_id'), act: 'off'}, function(){
			btn.removeClass('pink_follow').addClass('groupFollow').addClass('small_btn');
			btn.html('<em class="small_btnr"></em>+ 加关注').unbind('hover');
		});
	});

	//个人主页的关注杂志
	$('.followbtn').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get(Yiipin.config.urls.group_follow, {group_id: $(this).attr('group_id'), act: 'on'}, function(){
			btn.removeClass('followbtn').removeClass('ex_notfollow').addClass('quitbtn').addClass('ex_notfollow');
			btn.text('已关注');
			btn.hover(function(){$(this).text('取消关注');}, function(){$(this).text('已关注')});
		});
	});
	
	$('.quitbtn').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get(Yiipin.config.urls.group_follow, {group_id: $(this).attr('group_id'), act: 'off'}, function(){
			btn.removeClass('ex_notfollow').removeClass('quitbtn').addClass('ex_follow').addClass('followbtn');
			btn.html('+ 加关注').unbind('hover');
		});
	});

	$('.pink_follow,.quitbtn').live({mouseover: function(){$(this).text('取消关注');}, mouseout:function(){$(this).text('已关注')}});

	//商品图片上的按钮
	$('.np_pic,.goods_pic').live({
	   mouseenter:function(){
		   $(this).find('.like_merge').show();
	   },
	   mouseleave:function(){
		   $(this).find('.like_merge').hide();
	   }
	});

	//评论商品
	$('.js-comment').live('click', function(){
		if(!Yiipin.check_login()) return;
		var data = eval('('+$(this).attr('data')+')');
		$(data.target).show().find('textarea').focus();
		$(data.target).find('.avatar').attr('src', user_avatar_s);
		
//			var obj = $(this).parent().parent().parent();
//			if(obj.attr('class')=='hp_top') obj = obj.parent();
//			obj.find('.poster_cmt,.hp_cmt').show();
//			$('.goods_wall, #wall, #detail_wall').masonry(); 
//			obj.find('.poster_textarea, .comm_box').focus();
//			obj.find('.poster_cmt .avatar32_f img, .hp_cmt .avatar32 img:last').attr('src', user_avatar_s);
		
	});
	
	$('.share_comment_btn').live('click', function(){
		if(Yiipin.check_login()){
			var content = $(this).parent().parent().find('.poster_textarea');
			if(content.val() == ''){
				alert('请输入评论！');
				content.focus();
				return false;
			}
			else{
				var share_id = $(this).parent().parent().parent().parent().parent().attr('share_id');
				var cont = $(this).parent().parent().parent().parent().parent().find('.comment_share');
				
			    $.post(Yiipin.config.urls.share_comment, {share_id: share_id, content: content.val()}, function(html){
			        if(html == 'false'){
				        alert('评论失败，请联系客服');
				        return false;
			        }
			        content.val('');
			        cont.prepend(html);
				});
			}
		}
	});
    //个人主页中的分享评论
	$('.person_share_comment_btn').live('click', function(){
		if(Yiipin.check_login()){
			var content = $(this).parent().parent().parent().find('textarea');
			if(content.val() == ''){
				alert('请输入评论！');
				content.focus();
				return false;
			}
			else{
				var share_id = $(this).parent().parent().parent().parent().parent().attr('share_id');
				var cont = $(this).parent().parent().parent().parent().parent().find('.hp_s_c');
				
			    $.post(Yiipin.config.urls.person_comment, {share_id: share_id, content: content.val()}, function(html){
			        if(html == 'false'){
				        alert('评论失败，请联系客服');
				        return false;
			        }
			        content.val('');
			        cont.prepend(html);
				});
			}
		}
	});
	
	//喜欢商品
	$('.js-like').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var data = eval('('+$(this).attr('data')+')');
		
		var share_id = data.share_id;
		var link = $(this);
		
		if($(this).hasClass('liked')){
			$.get(Yiipin.config.urls.group_like, {share_id: share_id, like: 0}, function(){
				link.removeClass('liked').html('<span class="plm_bgr"></span><em class="lm_love">&nbsp;</em>喜欢');
			});
		}
		else{
			$.get(Yiipin.config.urls.group_like, {share_id: share_id, like: 1}, function(){
				link.addClass('liked').html('<span class="plm_bgr"></span>已喜欢');
			});
		}
	});

	//收进杂志
	$('.poster_forward').live('click', function(){
		if(!Yiipin.check_login()) return;
		var share_id = $(this).parent().parent().parent().parent().attr('share_id');
		$.post(Yiipin.config.urls.goods_collect, {share_id: share_id}, function(html){
			if(html != 'false'){
				$("#share-goods").dialog("close");
				$('#ajax-dialog').html(html).dialog({
					'title':'收进杂志',
			        'autoOpen':true,
					'modal':true,
					'width':'550px'
				});
			}
			else{
				$('#linkMessageTips').html('<span class="red">宝贝链接好像不对哦，换一个试试看</span>');
			}
		});
	});

	//删除分享
	$('.poster_delete').live('click',function(){
		if(!Yiipin.check_login()) return;
		if(confirm('确定要删除这个分享吗？')){
    		var obj = $(this).parent().parent().parent().parent();
    		var share_id = obj.attr('share_id');
    		$.post(Yiipin.config.urls.person_deleteshare, {share_id: share_id}, function(html){
    			if(html == 'true'){
    			    obj.remove();
    			}
    		});
		}
	});
	
	//个人主页上的关注用户
	$('.new_follow').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get(Yiipin.config.urls.misc_act_follow, {user_id: $(this).attr('user_id'), act: 'on'}, function(){
			btn.removeClass('new_follow').addClass('new_notfollow');
			btn.text('已关注');
			btn.hover(function(){$(this).text('取消关注');}, function(){$(this).text('已关注')});
		});
	});
	
	$('.new_notfollow').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get(Yiipin.config.urls.misc_act_follow, {user_id: $(this).attr('user_id'), act: 'off'}, function(){
			btn.removeClass('new_notfollow').addClass('new_follow');
			btn.html('+ 加关注').unbind('hover');
		});
	});

	$('.new_notfollow').live({mouseover: function(){$(this).text('取消关注');}, mouseout:function(){$(this).text('已关注');}});
	
	//用户搜索页上的关注用户
	$('.ex_follow').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get(Yiipin.config.urls.misc_act_follow, {user_id: $(this).attr('user_id'), act: 'on'}, function(){
			btn.removeClass('ex_follow').addClass('ex_notfollow');
			btn.text('已关注');
			btn.hover(function(){$(this).text('取消关注');}, function(){$(this).text('已关注');});
		});
	});
	
	$('.ex_notfollow').live('click', function(){
		if(!Yiipin.check_login()) return;
		
		var btn = $(this);
		$.get(Yiipin.config.urls.misc_act_follow, {user_id: $(this).attr('user_id'), act: 'off'}, function(){
			btn.removeClass('ex_notfollow').addClass('ex_follow');
			btn.html('+ 加关注').unbind('hover');
		});
	});

	$('.ex_notfollow').live({mouseover: function(){$(this).text('取消关注');}, mouseout:function(){$(this).text('已关注');}});
	
	//删除系统消息
	$('.pmsg_one_msg_info_0').live({mouseover: function(){
	    $(this).find('.pmsg_one_msg_info_delete').show();
	}, mouseout:function(){
		$(this).find('.pmsg_one_msg_info_delete').hide();
	}});

	$('.pmsg_one_msg_info_delete').find('a').live('click', function(){
		var id = $(this).attr('msg_id');
		$.post(Yiipin.config.urls.misc_delsysmsg, {id: id}, function(result){
		    if(result == 'true'){
		    	$.fn.yiiListView.update('sysmsg-list');
		    }
		});
	});
	
	//发送站内信息
	$('.ex_message').live('click',function(){
		if(!Yiipin.check_login()) return false;
		
		var iframe = $('<iframe src="" width="100%" height="500" frameborder="0" autoscroll="no"></iframe>');
		var url = Yiipin.config.urls.misc_sendpm;
		if(Yiipin.config.urls.misc_sendpm.indexOf('?') != -1){
			url += '&user_id='+$(this).attr('user_id');
		}
		else{
			url += '?user_id='+$(this).attr('user_id');
		}
		iframe.attr('src', url);
		$('#ajax-dialog').html(iframe).dialog({
			'title':'发送私信',
	        'autoOpen':true,
			'modal':true,
			'width':'620px'
		});
	});
	
	//积分兑换
	$('#btn_exchange').bind('click', function(){
		if(!Yiipin.check_login()) return false;
		
		if(confirm('您确定要兑换该商品吗？')){
			$(this).parents('form').submit();
		}
	});
});

$.fn.iVaryVal=function(iSet,CallBack){
	/*
	 * Minus:点击元素--减小
	 * Add:点击元素--增加
	 * Input:表单元素
	 * Min:表单的最小值，非负整数
	 * Max:表单的最大值，正整数
	 */
	iSet=$.extend({Minus:$('.J_minus'),Add:$('.J_add'),Input:$('.J_input'),Min:0,Max:20},iSet);
	var C=null,O=null;
	//插件返回值
	var $CB={};
	//增加
	iSet.Add.each(function(i){
		$(this).click(function(){
			O=parseInt(iSet.Input.eq(i).val());
			(O+1<=iSet.Max) || (iSet.Max==null) ? iSet.Input.eq(i).val(O+1) : iSet.Input.eq(i).val(iSet.Max);
			//输出当前改变后的值
			$CB.val=iSet.Input.eq(i).val();
			$CB.index=i;
			//回调函数
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		});
	});
	//减少
	iSet.Minus.each(function(i){
		$(this).click(function(){
			O=parseInt(iSet.Input.eq(i).val());
			O-1<iSet.Min ? iSet.Input.eq(i).val(iSet.Min) : iSet.Input.eq(i).val(O-1);
			$CB.val=iSet.Input.eq(i).val();
			$CB.index=i;
			//回调函数
			if (typeof CallBack == 'function') {
				CallBack($CB.val,$CB.index);
		  	}
		});
	});
	//手动
	iSet.Input.bind({
		'click':function(){
			O=parseInt($(this).val());
			$(this).select();
		},
		'keyup':function(e){
			if($(this).val()!=''){
				C=parseInt($(this).val());
				//非负整数判断
				if(/^[1-9]\d*|0$/.test(C)){
					$(this).val(C);
					O=C;
				}else{
					$(this).val(O);
				}
			}
			//键盘控制：上右--加，下左--减
			if(e.keyCode==38 || e.keyCode==39){
				iSet.Add.eq(iSet.Input.index(this)).click();
			}
			if(e.keyCode==37 || e.keyCode==40){
				iSet.Minus.eq(iSet.Input.index(this)).click();
			}
			//输出当前改变后的值
			$CB.val=$(this).val();
			$CB.index=iSet.Input.index(this);
			//回调函数
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		},
		'blur':function(){
			$(this).trigger('keyup');
			if($(this).val()==''){
				$(this).val(O);
			}
			//判断输入值是否超出最大最小值
			if(iSet.Max){
				if(O>iSet.Max){
					$(this).val(iSet.Max);
				}
			}
			if(O<iSet.Min){
				$(this).val(iSet.Min);
			}
			//输出当前改变后的值
			$CB.val=$(this).val();
			$CB.index=iSet.Input.index(this);
			//回调函数
			if (typeof CallBack == 'function') {
                CallBack($CB.val,$CB.index);
            }
		}
	});
}
