<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo L('admin_site_title')?></title>
    <meta name="description" content="">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="<?php echo ADMIN_PATH_IMG?>favicon.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo ADMIN_PATH_IMG?>app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="<?php echo ADMIN_PATH_CSS?>amazeui.min.css"/>
    <link rel="stylesheet" href="<?php echo ADMIN_PATH_CSS?>admin.css">
    <link rel="stylesheet" href="<?php echo ADMIN_PATH_CSS?>app.css">
    <script type="text/javascript" src="<?php echo JS_PATH?>jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>formvalidator.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>admin_common.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>content_addtop.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>dialog.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>form_ajax.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>search_common.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH?>member_common.js"></script>

    <script type="text/javascript">
        var pc_hash = '<?php echo $_SESSION['pc_hash']?>'
    </script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>Amaze UI</strong> <small>后台管理模板</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
           <li><a href="?m=admin&c=category&a=public_cache&menuid=43&module=admin"> 更新缓存 </a></li>
           <li><a href="?m=content&c=create_html&a=category&pc_hash=<?php echo $_SESSION['pc_hash']?>"> 生成首页</a></li>
           <li><a href="<?php echo WEB_PATH.'index.php'?>" target="_blank"><span class="am-icon-home"> 网站首页</a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="?m=admin&c=admin_manage&a=edit&userid=<?php echo $userid?>&pc_hash=<?php echo $_SESSION['pc_hash'];?>"><span class="am-icon-user"></span> <?php echo $admin_username?> 资料</a></li>
                    <li><a href="?m=admin&c=setting&a=init&pc_hash=<?php echo $_SESSION['pc_hash']?>"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="?m=admin&c=index&a=public_logout"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>
