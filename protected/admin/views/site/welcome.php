<script type="text/JavaScript">
parent.$('#current_pos').html('欢迎界面');
</script>
<div class="pad-10" id="home_panel">
	<div class="clearfix">
        <div class="col-2 fl">
            <h6>我的个人信息</h6>
            <div class="content">
                您好，<?php echo Yii::app()->user->name ?><br>
                所属角色：<?php echo implode('，', array_keys(Yii::app()->authManager->getRoles(Yii::app()->user->id))); ?> <br>
            </div>
        </div> 
        <div class="col-2 fr">
            <h6>关于我们</h6>
            <div class="content">
            版权所有：武汉千比特网络工作室<br>
            
            官方网站：<a href="http://www.yiipin.com" target="_blank">http://www.yiipin.com/</a>
            </div>
        </div>  
                      
    </div>
	<div class="clearfix">
        <div class="col-2 fl">
            <h6>系统信息</h6>
            <div class="content">
                <table class="table_panel">
                    <tbody>
                    <tr>
                        <th>程序版本：</th>
                        <td><?php echo SOFT_VERSION; ?> (<?php echo SOFT_RELEASE; ?>)</td>
                    </tr>
                    <tr>
                        <th>操作系统及 PHP：</th>
                        <td><?php echo $serverinfo; ?></td>
                    </tr>
                    <tr>
                        <th>服务器软件：</th>
                        <td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td>
                    </tr>
                    <tr>
                        <th>MySQL 版本：</th>
                        <td><?php echo $dbversion; ?></td>
                    </tr>
                    <tr>
                        <th>上传许可：</th>
                        <td><?php echo $fileupload; ?></td>
                    </tr>
                    <tr>
                        <th>当前数据库尺寸：</th>
                        <td><?php echo $dbsize; ?></td>
                    </tr>
                    <tr>
                        <th>主机名：</th>
                        <td><?php echo $_SERVER['SERVER_NAME'] .'('. $_SERVER['SERVER_ADDR'] .':'.$_SERVER['SERVER_PORT'].')'; ?></td>
                    </tr>
                    <!-- tr>
                        <th>软件授权码：</th>
                        <td><?php echo $license_key; ?></td>
                    </tr -->
                    </tbody>
                </table>
            </div>
        </div>   
        <div class="col-2 fr">
            <h6>YiiPin动态</h6>
            <div class="content">
                <script type="text/javascript" src="http://www.yiipin.com/api.php?mod=js&bid=77"></script>
            </div>
        </div>         
        <div class="col-2 fr">
            <h6>安全提示</h6>
            <div class="content" style="color:#ff0000;">
                <?php if(file_exists(Yii::app()->basePath . '/../install')):?>
                <div style="border:1px solid #f00; color:red; font-weight:bold; margin:10px 0; padding:10px;background: #FFFFCB">
                如果安装完成进入正式使用阶段，请删除根目录下的install文件夹，以确保数据安全！
                </div>
                <?php endif;?>
                <script type="text/javascript" src="http://www.yiipin.com/api.php?mod=js&bid=78"></script>
            </div>
        </div>        
    </div>
</div>
