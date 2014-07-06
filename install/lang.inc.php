<?php

define('UC_VERNAME', '中文版');

$lang = array(

	'SC_GBK' => '简体中文版',
	'TC_BIG5' => '繁体中文版',
	'SC_UTF8' => '简体中文 UTF8 版',
	'TC_UTF8' => '繁体中文 UTF8 版',
	'EN_ISO' => 'ENGLISH ISO8859',
	'EN_UTF8' => 'ENGLIST UTF-8',

	'title_install' => SOFT_NAME.' 安装向导',
	'agreement_yes' => '我同意',
	'agreement_no' => '我不同意',
	'notset' => '不限制',
    'php_version_too_low'=>'PHP版本不满足要求，至少需要5.1.6版本，建议安装5.2.4以上版本，且不能使用PHP5.3.0以上版本（程序保护机制限制）',
        
	'message_title' => '提示信息',
	'error_message' => '错误信息',
	'message_return' => '返回',
	'return' => '返回',
	'install_wizard' => '安装向导',
	'config_nonexistence' => '配置文件不存在',
	'nodir' => '目录不存在',
	'short_open_tag_invalid' => '对不起，请将 php.ini 中的 short_open_tag 设置为 On，否则无法继续安装。',
	'redirect' => '浏览器会自动跳转页面，无需人工干预。<br>除非当您的浏览器没有自动跳转时，请点击这里',
	'auto_redirect' => '浏览器会自动跳转页面，无需人工干预',
	'database_errno_2003' => '无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044' => '无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045' => '无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_errno_1064' => 'SQL 语法错误',

	'dbpriv_createtable' => '没有CREATE TABLE权限，无法继续安装',
	'dbpriv_insert' => '没有INSERT权限，无法继续安装',
	'dbpriv_select' => '没有SELECT权限，无法继续安装',
	'dbpriv_update' => '没有UPDATE权限，无法继续安装',
	'dbpriv_delete' => '没有DELETE权限，无法继续安装',
	'dbpriv_droptable' => '没有DROP TABLE权限，无法安装',

	'db_not_null' => '数据库中已经安装过 UCenter, 继续安装会清空原有数据。',
	'db_drop_table_confirm' => '继续安装会清空全部原有数据，您确定要继续吗?',

	'writeable' => '可写',
	'unwriteable' => '不可写',
	'old_step' => '上一步',
	'new_step' => '下一步',

	'database_errno_2003' => '无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044' => '无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045' => '无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_connect_error' => '数据库连接错误',

	'step_env_check_title' => '开始安装',
	'step_env_check_desc' => '环境以及文件目录权限检查',
	'step_db_init_title' => '安装数据库',
	'step_db_init_desc' => '正在执行数据库安装',

	'step1_file' => '目录文件',
	'step1_need_status' => '所需状态',
	'step1_status' => '当前状态',
	'not_continue' => '请将以上红叉部分修正再试',

	'tips_dbinfo' => '填写数据库信息',
	'tips_dbinfo_comment' => '',
	'tips_admininfo' => '填写管理员信息',
	'step_ext_info_title' => '安装成功',
	'step_ext_info_comment' => '点击进入登陆',

	'ext_info_succ' => '安装成功',
	'install_submit' => '提交',
	'install_locked' => '安装锁定，已经安装过了，如果您确定要重新安装，请到服务器上删除<br /> '.str_replace(ROOT_PATH, '', $lockfile),
	'error_quit_msg' => '您必须解决以上问题，安装才可以继续',

	'step_app_reg_title' => '设置运行环境',
	'step_app_reg_desc' => '检测服务器环境以及设置 UCenter',
	'tips_ucenter' => '请填写 UCenter 相关信息',
	'tips_ucenter_comment' => 'UCenter 是 Comsenz 公司产品的核心服务程序，YIIPIN 的安装和运行依赖此程序。如果您已经安装了 UCenter，请填写以下信息。否则，请到 <a href="http://www.discuz.com/" target="blank">Comsenz 产品中心</a> 下载并且安装，然后再继续。',

	'advice_mysql_connect' => '请检查 mysql 模块是否正确加载',
	'advice_fsockopen' => '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能，如果已开启请确认该函数未被列入禁用函数(disable_functions设置项)',
	'advice_gethostbyname' => '是否php配置中禁止了gethostbyname函数。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents' => '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml_parser_create' => '该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',

	'ucurl' => 'UCenter 的 URL',
	'ucpw' => 'UCenter 创始人密码',
	'ucip' => 'UCenter 的IP地址',
	'ucenter_ucip_invalid' => '格式错误，请填写正确的 IP 地址',
	'ucip_comment' => '绝大多数情况下您可以不填',

	'tips_siteinfo' => '请填写站点信息',
	'sitename' => '站点名称',
	'siteurl' => '站点 URL',
        
    'tips_license' => '请填写软件授权信息',
    'tips_license_comment' => '本软件是商业软件，需要获得授权码才能安装使用。如需测试，请访问http://demo.yiipin.com',
    'license_key' => '授权码',
    'license_license_key_invalid' => '授权码不正确',

	'forceinstall' => '强制安装',
	'dbinfo_forceinstall_invalid' => '当前数据库当中已经含有同样表前缀的数据表，您可以修改“表名前缀”来避免删除旧的数据，或者选择强制安装。强制安装会删除旧数据，且无法恢复',

	'click_to_back' => '点击返回上一步',
	'adminemail' => '系统信箱 Email',
	'adminemail_comment' => '用于发送程序错误报告',
	'dbhost_comment' => '数据库服务器地址, 一般为 localhost',
	'tablepre_comment' => '同一数据库运行多个YIIPIN程序时，请修改前缀',
	'forceinstall_check_label' => '我要删除数据，强制安装 !!!',

	'uc_url_empty' => '您没有填写 UCenter 的 URL，请返回填写',
	'uc_url_invalid' => 'URL 格式错误',
	'uc_url_unreachable' => 'UCenter 的 URL 地址可能填写错误，请检查',
	'uc_ip_invalid' => '无法解析该域名，请填写站点的 IP',
	'uc_admin_invalid' => 'UCenter 创始人密码错误，请重新填写',
	'uc_data_invalid' => '通信失败，请检查 UCenter 的URL 地址是否正确 ',
	'uc_dbcharset_incorrect' => 'UCenter 数据库字符集与当前应用字符集不一致',
	'uc_api_add_app_error' => '向 UCenter 添加应用错误',
	'uc_dns_error' => 'UCenter DNS解析错误，请返回填写一下 UCenter 的 IP地址',

	'ucenter_ucurl_invalid' => 'UCenter 的URL为空，或者格式错误，请检查',
	'ucenter_ucpw_invalid' => 'UCenter 的创始人密码为空，或者格式错误，请检查',
	'siteinfo_siteurl_invalid' => '站点URL为空，或者格式错误，请检查',
	'siteinfo_sitename_invalid' => '站点名称为空，或者格式错误，请检查',
	'dbinfo_dbhost_invalid' => '数据库服务器为空，或者格式错误，请检查',
	'dbinfo_dbname_invalid' => '数据库名为空，或者格式错误，请检查',
	'dbinfo_dbuser_invalid' => '数据库用户名为空，或者格式错误，请检查',
	'dbinfo_dbpw_invalid' => '数据库密码为空，或者格式错误，请检查',
	'dbinfo_adminemail_invalid' => '系统邮箱为空，或者格式错误，请检查',
	'dbinfo_tablepre_invalid' => '数据表前缀为空，或者格式错误，请检查',
	'admininfo_username_invalid' => '管理员用户名为空，或者格式错误，请检查',
	'admininfo_email_invalid' => '管理员Email为空，或者格式错误，请检查',
	'admininfo_password_invalid' => '管理员密码为空，请填写',
	'admininfo_password2_invalid' => '两次密码不一致，请检查',

	'username' => '管理员账号',
	'email' => '管理员 Email',
	'password' => '管理员密码',
	'password_comment' => '管理员密码不能为空',
	'password2' => '重复密码',

	'admininfo_invalid' => '管理员信息不完整，请检查管理员账号，密码，邮箱',
	'dbname_invalid' => '数据库名为空，请填写数据库名称',
	'tablepre_invalid' => '数据表前缀为空，或者格式错误，请检查',
	'admin_username_invalid' => '非法用户名，用户名长度不应当超过 15 个英文字符，且不能包含特殊字符，一般是中文，字母或者数字',
	'admin_password_invalid' => '密码和上面不一致，请重新输入',
	'admin_email_invalid' => 'Email 地址错误，此邮件地址已经被使用或者格式无效，请更换为其他地址',
	'admin_invalid' => '您的信息管理员信息没有填写完整，请仔细填写每个项目',
	'admin_exist_password_error' => '该用户已经存在，如果您要设置此用户为网站的管理员，请正确输入该用户的密码，或者请更换论坛管理员的名字',

	'uc_version_incorrect' => '您的 UCenter 服务端版本过低，请升级 UCenter 服务端到最新版本，并且升级，下载地址：http://www.comsenz.com/ 。',
	'config_unwriteable' => '安装向导无法写入配置文件, 请设置 protected/config/ucenter.php 程序属性为可写状态(777)',

	'install_in_processed' => '正在安装...',
	'install_succeed' => '安装成功，点击进入',
	'install_founder_contact' => '进入下一步填写联系方式',

	'license' => '<div class="license"><h1>中文版授权协议 适用于中文用户</h1>

<p>版权所有 (c) 2012，武汉千比特网络工作室保留所有权利。</p>

<p>感谢您选择 YIIPIN 产品。希望我们的努力能为您提供一个高效快速和强大的购物分享网站解决方案。</p>

<p>YIIPIN 中文全称为 易拼，意为“更容易的血拼(shopping，购物)”。</p>

<p>武汉千比特网络工作室保留所有权利为 YIIPIN 产品的开发商，依法独立拥有 YIIPIN 产品著作权（中国国家版权局著作权登记号 2006SR11895）。YIIPIN官方网址为 http://www.yiipin.com，官方讨论区网址为 http://www.yiipin.com/bbs/。</p>

<p>YIIPIN 著作权已在中华人民共和国国家版权局注册，著作权受到法律和国际公约保护。使用者：无论个人或组织、盈利与否、用途如何（包括以学习和研究为目的），均需仔细阅读本协议，在理解、同意、并遵守本协议的全部条款后，方可开始使用 YIIPIN 软件。</p>

<p>本授权协议适用且仅适用于 YIIPIN 1.x.x 版本，武汉千比特网络工作室拥有对本授权协议的最终解释权。</p>

<h3>I. 协议许可的权利</h3>
<ol>
<li>您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用。</li>
<li>您可以在协议规定的约束和限制范围内修改 YIIPIN 源代码(如果被提供的话)或界面风格以适应您的网站要求。</li>
<li>您拥有使用本软件构建的论坛中全部会员资料、文章及相关信息的所有权，并独立承担与文章内容的相关法律义务。</li>
<li>获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的授权类型中确定的技术支持期限、技术支持方式和技术支持内容，自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，相关意见将被作为首要考虑，但没有一定被采纳的承诺或保证。</li>
</ol>

<h3>II. 协议规定的约束和限制</h3>
<ol>
<li>未获商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目或实现盈利的网站）。购买商业授权请登陆http://www.yiipin.com参考相关说明，也可以致电18672330383了解详情。</li>
<li>不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。</li>
<li>无论如何，即无论用途如何、是否经过修改或美化、修改程度如何，只要使用 YIIPIN 的整体或任何部分，未经书面许可，论坛页面页脚处的 YIIPIN 名称和武汉千比特网络工作室网站（http://www.yiipin.com） 的链接都必须保留，而不能清除或修改。</li>
<li>禁止在 YIIPIN 的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。</li>
<li>如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。</li>
</ol>

<h3>III. 有限担保和免责声明</h3>
<ol>
<li>本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。</li>
<li>用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。</li>
<li>康盛创想（北京）科技有限公司不对使用本软件构建的论坛中的文章或信息承担责任。</li>
</ol>

<p>有关 YIIPIN 最终用户授权协议、商业授权与技术服务的详细内容，均由 YIIPIN 官方网站独家提供。康盛创想（北京）科技有限公司拥有在不事先通知的情况下，修改授权协议和服务价目表的权力，修改后的协议或价目表对自改变之日起的新授权用户生效。</p>

<p>电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始安装 YIIPIN，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</p></div>',

	'uc_installed' => '您已经安装过 UCenter，如果需要重新安装，请删除 data/install.lock 文件',
	'i_agree' => '我已仔细阅读，并同意上述条款中的所有内容',
	'supportted' => '支持',
	'unsupportted' => '不支持',
	'max_size' => '支持/最大尺寸',
	'project' => '项目',
	'ucenter_required' => '所需配置',
	'ucenter_best' => '最佳配置',
	'curr_server' => '当前服务器',
	'env_check' => '环境检查',
	'os' => '操作系统',
	'php' => 'PHP 版本',
	'attachmentupload' => '附件上传',
	'unlimit' => '不限制',
	'version' => '版本',
	'gdversion' => 'GD 库',
	'pdo' => 'PDO 库',
	'pdo_mysql' => 'PDO_MYSQL 库',
	'curlversion' => 'CURL 库',
    'zend_optimizer'=>'Zend Optimizer',
	'memcache' => 'Memcache 库',
	'apc' => 'APC 库',
	'allow' => '允许',
	'unix' => '类Unix',
	'diskspace' => '磁盘空间',
	'priv_check' => '目录、文件权限检查',
	'func_depend' => '函数依赖性检查',
	'func_name' => '函数名称',
	'check_result' => '检查结果',
	'suggestion' => '建议',
	'advice_mysql' => '请检查 mysql 模块是否正确加载',
	'advice_fopen' => '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents' => '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml' => '该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',
	'none' => '无',

	'dbhost' => '数据库服务器',
	'dbuser' => '数据库用户名',
	'dbpw' => '数据库密码',
	'dbname' => '数据库名',
	'tablepre' => '数据表前缀',

	'ucfounderpw' => '创始人密码',
	'ucfounderpw2' => '重复创始人密码',

	'init_log' => '初始化记录',
	'clear_dir' => '清空目录',
	'select_db' => '选择数据库',
	'create_table' => '建立数据表',
	'succeed' => '成功',

	'testdata' => '安装测试数据',
	'testdata_check_label' => '是',
	'install_test_data' => '正在安装测试数据',

	'method_undefined' => '未定义方法',
	'database_nonexistence' => '数据库操作对象不存在',
	'founder_contact' => '<h4>关于《YIIPIN改善计划》的说明</h4>

	为了不断改进产品质量，改善用户体验，YIIPIN改善计划，该系统有利于我们分析用户使用操作习惯，进而帮助我们在未来的版本中对产品进行改进，设计出更符合用户需求的新功能。

	该系统不会收集站点敏感信息，不收集用户资料，不存在安全风险，并且经过实际测试不会影响网站的运行效率。

	您安装使用本版本表示您同意加入《YIIPIN改善计划》，YIIPIN运营部门会通过对站点的分析为您提供运营指导建议，我们将提示您如何根据站点运行情况开启功能，如何进行合理的功能配置，以及提供其他的一些运营经验等。

	为了方便我们和您沟通运营策略，请您留下常用的网络联系方式',
	'skip_current' => '跳过本步',

);

$msglang = array(
	'config_nonexistence' => '您的 config.inc.php 不存在, 无法继续安装, 请用 FTP 将该文件上传后再试。',
);



?>
