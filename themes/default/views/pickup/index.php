<?php
$this->pageTitle = '安装书签栏拾宝工具';
$this->breadcrumbs=array(
	'安装书签栏拾宝工具',
);

?>

<div class="container_12" id="main">
			
								<div class="grid_12">

	<div class="box_shadow mt14 p13">
		<h3 class="f24 mb14">安装书签栏拾宝工具</h3>
		<div class="r">
			<a class="menu_leo cursor other_rel">其他浏览器版本<span class="redarrow"></span></a>
			<ul class="add_menu_leo select_browser none" style="display: none;margin-top:35px">
				<li><a class="cursor"><span class="i1"></span>火狐浏览器</a></li>
				<li><a class="cursor"><span class="i2"></span>IE浏览器</a></li>
				<li><a class="cursor"><span class="i3"></span>搜狗浏览器</a></li>
				<li><a class="cursor"><span class="i4"></span>safari浏览器</a></li>
				<li><a class="cursor"><span class="i5"></span>360安全浏览器</a></li>
				<li><a class="cursor"><span class="i6"></span>谷歌浏览器</a></li>
				<li><a class="cursor"><span class="i7"></span>360极速浏览器</a></li>
				<li><a class="cursor"><span class="ipad"></span>iPad、iPhone</a></li>
			</ul>
		</div>
		<div class="for_pc">
			<div class="left use_left">
				<div class="ml72">
					<div class="f16n">把这个拖到你的浏览器书签</div>
					<div class="mt10 pr">
						<a href="javascript:void((function(){var%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','<?php echo $this->createAbsoluteUrl('/pickup/js', array('v'=>'')); ?>'+Math.random()*99999999);document.body.appendChild(e)})());" class="pickup_tool pr block ml10">✚ <?php echo Yii::app()->name ?></a>
						<div class="arrow_top pa none" style="display: none;"></div>
					</div>
				</div>
				<div class="ml14 mt20">
					<img alt="<?php echo Yii::app()->name ?>拾宝贝工具" src="<?php echo THEME_DIR ?>/images/screen.jpg">
				</div>
			</div>
			<div class="use_r left">
				<div class="firefox none">
					<h3 class="f16 ff l30">火狐浏览器</h3>
					<p class="f14n l22 mt14">
						<b>使用方法:</b><br>
						浏览网页时，点击书签栏中的“✚ <?php echo Yii::app()->name ?>”，选择你喜欢的图片完成收集。
					</p>
					<p class="f14n l22 mt14">
						<b>没有书签栏?</b><br>
						请打开菜单“显示”，点击“显示书签栏” 
					</p>
				</div><!-- end firefox  -->
				<div style="display:none;" class="ie">
					<h3 class="f16 ie l30">IE浏览器</h3>
					<p class="f14 l22 mt14">如果不能拖拽左边的粉色按钮，请在按钮上点击右键，选择“添加到收藏夹”。</p>
					<p class="f14n l22 mt14">
						<b>使用方法:</b><br>
						浏览网页时，点击书签栏中的“✚ <?php echo Yii::app()->name ?>”，选择你喜欢的图片完成收集。
					</p>
					<p class="f14n l22 mt14">
						<b>没有书签栏?</b><br>
						请打开菜单“查看”→“工具栏”，勾选其中的 “收藏夹栏”。
					</p>
				</div><!-- end ie  -->
				<div style="display:none;" class="sogou">
					<h3 class="f16 sgou l30">搜狗浏览器</h3>
					<p class="f14 l22 mt14">如果不能拖拽左边的粉色按钮，请在按钮上点击右键，选择“添加到收藏夹”。</p>
					<p class="f14n l22 mt14">
						<b>使用方法:</b><br>
						浏览网页时，点击书签栏中的“✚ <?php echo Yii::app()->name ?>”，选择你喜欢的图片完成收集。
					</p>
					<p class="f14n l22 mt14">
						<b>没有书签栏?</b><br>
						请打开菜单“查看”→“工具栏”，勾选其中的 “收藏夹栏”
					</p>
				</div><!-- end sougou  -->
				<div style="display:none;" class="safari">
					<h3 class="f16 saf l30">safari浏览器</h3>
					<p class="f14n l22 mt14">
						<b>使用方法:</b><br>
						浏览网页时，点击书签栏中的“✚ <?php echo Yii::app()->name ?>”，选择你喜欢的图片完成收集。
					</p>
					<p class="f14n l22 mt14">
						<b>没有书签栏?</b><br>
						打开菜单“显示”，点击“显示书签栏”
					</p>
				</div><!-- end safari  -->
				<div style="display:none;" class="360safe">
					<h3 class="f16 s360 l30">360安全浏览器</h3>
					<p class="f14 l22 mt14">如果不能拖拽左边的粉色按钮，请在按钮上点击右键，选择“添加到收藏夹”。</p>
					<p class="f14n l22 mt14">
						<b>使用方法:</b><br>
						浏览网页时，点击书签栏中的“✚ <?php echo Yii::app()->name ?>”，选择你喜欢的图片完成收集。
					</p>
					<p class="f14n l22 mt14">
						<b>没有书签栏?</b><br>
						请打开菜单“查看”→“工具栏”，勾选其中的 “收藏夹栏”
					</p>
				</div><!-- end 360safe  -->
				<div style="display:none;" class="chrome">
					<h3 class="f16 gchrome l30">谷歌浏览器</h3>
					<p class="f14n l22 mt14">
						<b>使用方法:</b><br>
						浏览网页时，点击书签栏中的“✚ <?php echo Yii::app()->name ?>”，选择你喜欢的图片完成收集。
					</p>
					<p class="f14n l22 mt14">
						<b>没有书签栏?</b><br>
						请打开菜单“显示”，点击“显示书签栏”
					</p>
				</div><!-- end google chrome  -->
				<div style="display:none;" class="360rp">
					<h3 class="f16 c360 l30">360极速浏览器</h3>
					<p class="f14 l22 mt14">如果不能拖拽左边的粉色按钮，请在按钮上点击右键，选择“添加到收藏夹”。</p>
					<p class="f14n l22 mt14">
						<b>使用方法:</b><br>
						浏览网页时，点击书签栏中的“✚ <?php echo Yii::app()->name ?>”，选择你喜欢的图片完成收集。
					</p>
					<p class="f14n l22 mt14">
						<b>没有书签栏?</b><br>
						请在浏览器“设置”→“标签设置”中，取消勾选“在新标签里开打收藏夹里的网址”选项
					</p>
				</div><!-- end 360极速  -->
			</div>
			<div class="clear"></div>
		</div>
		<div class="mb14 for_ipad none">
			<h3 class="f16 ipad l30">iPad、iPhone</h3>
			<p class="f14n l22 mt14"><b>使用方法：</b><br>第一步：将这一页添加到书签</p>
			<div class="mt14">
				<img alt="" src="<?php echo THEME_DIR ?>/images/sc_ipad_1.png" class="box_shadow">
			</div>
			<p class="f14n mt14">第二步：全选并拷贝如下代码</p>
			<div class="select_copy mt10">
				<input value="javascript:void((function(){var%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','<?php echo Yii::app()->request->getHostInfo();?>/pickup/js?v='+Math.random()*99999999);document.body.appendChild(e)})());">
			</div>
			<p class="f14n mt14">第三步：编辑书签，点击第二行的“x”删除原内容，并把刚才复制的代码粘贴进去：</p>
			<div class="mt14">
				<img alt="" src="<?php echo THEME_DIR ?>/images/sc_ipad_2.png" class="box_shadow">
			</div>
		</div><!-- iPad、iPhone  -->
	</div>
</div>

<script type="text/javascript">
	$('.pickup_tool').hover(function(){
		$('.arrow_top').show();		
	},function(){
		$('.arrow_top').hide();
	});
	var t, $select_browser = $('.select_browser');
	$('.other_rel').hover(function(){
		clearTimeout(t);
		$select_browser.show();	
	},function(){
		t = setTimeout(function(){$select_browser.hide();},10);
		$select_browser.mouseenter(function(){ clearTimeout(t); })
					.mouseleave(function(){ $(this).hide(); });	
	});
	var browser_type = ['firefox', 'ie', 'sogou', 'safari', '360safe', 'chrome', '360rp', 'for_ipad'];
	function getCurrentBrowser(){
		var ua = navigator.userAgent.toLowerCase();
		if (/(iphone|ipad)/i.test(ua)) {
			$('.for_pc').hide();
			return 'for_ipad';
		}
		$('.pc').show();
		if (ua.indexOf('se 2.x') != -1) return 'sogou';
		else if (ua.indexOf('360se') != -1) return '360safe';
		else if (ua.indexOf('360ee') != -1) return '360rp';
		else if (ua.indexOf('msie') != -1) return 'ie';
		else if (ua.indexOf('chrome') != -1) return 'chrome';
		else if (ua.indexOf('safari') != -1) return 'safari';
		else return 'firefox';
	}
	var currentBrowser = getCurrentBrowser();
	$('.' +currentBrowser ).show();
	
	$select_browser.children('li').each(function(i) {
		$(this).click(function(){
			$('.' +currentBrowser).hide();
			currentBrowser = browser_type[i];
			currentBrowser != 'for_ipad' ? $('.for_pc').show() : $('.for_pc').hide();
			$('.'+browser_type[i]).show();
			$select_browser.hide();	
		});
	});
</script>

					
						<div class="clear"></div>
	</div>