<?php list($share_count, $group_count, $user_count) = $this->getCount();?>

<div class="searchTopBox">
		<div class="searchTop">
			<ul class="search_tab">
				<li class="<?php if($this->action->id == 'index') echo 'current red'; ?> br1d"><a href="<?php echo $this->createUrl('/search/index', array('filter'=>'goods', 'searchKey'=>$_GET['searchKey'])); ?>"><span><?php echo $share_count ?></span>宝贝</a></li>
				<li class="<?php if($this->action->id == 'magazine') echo 'current red'; ?> br1d"><a href="<?php echo $this->createUrl('/search/index', array('filter'=>'magazine', 'searchKey'=>$_GET['searchKey'])); ?>"><span><?php echo $group_count ?></span>杂志</a></li>
				<li class="<?php if($this->action->id == 'user') echo 'current red'; ?>"><a href="<?php echo $this->createUrl('/search/index', array('filter'=>'user', 'searchKey'=>$_GET['searchKey'])); ?>"><span><?php echo $user_count ?></span>用户</a></li>
			</ul>
			<div class="search_num break-word gray left">
				<span><samp>&mdash;</samp></span>搜索关键词：
				<samp><?php echo htmlspecialchars($_GET['searchKey']); ?></samp>
			</div>
			<div></div>
			<div class="clear"></div>
		</div>
	</div>