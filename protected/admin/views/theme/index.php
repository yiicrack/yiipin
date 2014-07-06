<?php
$this->breadcrumbs=array(
	'主题设置',
);?>
<form id="myform" name="myform" action="" method="post">
    <div class="pad-10"><div style="padding:10px; background:#f9f9f9">温馨提示：<ol>
    <li>1. 这里可以选择网站的主题，设定后即时生效，请注意检查前台是否正常。</li>
    <li>2. 主题下载回来请解压到 ./themes目录下面，每个文件夹对应一个主题，下面有info.php和thumb.jpg等文件。</li>
    </ol>
    </div></div>
	<div class="pad-10">
	    <?php foreach($themes as $name=>$data):?>
	    <div class="theme-block">
	        <div class="theme-block-thumb">
	            <img width="200" height="200" src="<?php echo $data['thumb']; ?>" />
	        </div>
	        <div class="theme-block-name">
	            <label><input <?php if($name == $current) echo 'checked="checked"'; ?> type="radio" name="theme" value="<?php echo $name; ?>" />
	            <?php echo $data['name']; ?></label>
            </div>
	    </div>
	    <?php endforeach; ?>
	    <div class="bk15"></div>
		<div class="btn">
			<input type="submit" value="保存设置" class="button" id="dosubmit">
		</div>
	</div>
</form>