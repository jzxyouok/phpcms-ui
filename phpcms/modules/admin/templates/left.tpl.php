<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="?m=admin&c=index&pc_hash=<?php echo $_SESSION['pc_hash'];?>"><span class="am-icon-home"></span> 后台首页</a></li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 系统配置 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-nav">
                        <li><a href="?m=admin&c=setting&pc_hash=<?php echo $_SESSION['pc_hash'];?>" class="am-cf"> 网站配置</a></li>
                        <li><a href="?m=admin&c=site&pc_hash=<?php echo $_SESSION['pc_hash'];?>"> 基本信息</a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-category'}"><span class="am-icon-bars"></span> 栏目管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-category">
                        <li><a href="?m=admin&c=category&a=init&pc_hash=<?php echo $_SESSION['pc_hash'];?>" class="am-cf"> 栏目列表</a></li>
                        <li><a href="?m=admin&c=category&a=add&&s=0&pc_hash=<?php echo $_SESSION['pc_hash']?>" class="am-cf"> <?php echo L('add_category') ?></a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-model'}"><span class="am-icon-bars"></span> <?php echo L('model_manage') ?><span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-model">
                        <li><a href="?m=content&c=sitemodel&a=init&pc_hash=<?php echo $_SESSION['pc_hash']?>"> 模型列表</a></li>
                        <li><a href="?m=content&c=sitemodel&a=add&pc_hash=<?php echo $_SESSION['pc_hash']?>"><?php echo L('add_model') ?></a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-admin'}"><span class="am-icon-user-plus"></span> 管理员管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-admin">
                        <li><a href="?m=admin&c=admin_manage&a=init&pc_hash=<?php echo $_SESSION['pc_hash'];?>" class="am-cf"> 管理员管理</a></li>
                        <li><a href="?m=admin&c=role&a=init&pc_hash=<?php echo $_SESSION['pc_hash']?>" class="am-cf"> 角色管理</a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-member'}"><span class="am-icon-user-plus"></span> 会员管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-member">
                        <li><a href="?m=member&c=member_group&a=manage&pc_hash=<?php echo $_SESSION['pc_hash'];?>" class="am-cf">会员组管理</a></li>
                        <li><a href="?m=member&c=member&a=manage&pc_hash=<?php echo $_SESSION['pc_hash'];?>" class="am-cf"> 会员管理</a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-news'}"><span class="am-icon-file"></span> 新闻管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-news">
                        <li><a href="#" class="am-cf"> 账号列表</a></li>
                        <li><a href="#" class="am-cf"> 添加账号</a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-pro'}"><span class="am-icon-file"></span> 产品管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-pro">
                        <li><a href="#" class="am-cf"> 账号列表</a></li>
                        <li><a href="#" class="am-cf"> 添加账号</a></li>

                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-msg'}"><span class="am-icon-file"></span> 留言管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-msg">
                        <li><a href="#" class="am-cf"> 留言列表</a></li>
                        <li><a href="#" class="am-cf"> 留言审核</a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-pay'}"><span class="am-icon-paypal"></span> 支付管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-pay">
                        <li><a href="#" class="am-cf"> 模版选择</a></li>
                        <li><a href="#" class="am-cf"> 添加模版</a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-template'}"><span class="am-icon-file"></span> 模版管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-template">
                        <li><a href="#" class="am-cf"> 模版选择</a></li>
                        <li><a href="#" class="am-cf"> 添加模版</a></li>
                    </ul>
                </li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-server'}"><span class="am-icon-server"></span> 服务管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub" id="collapse-server">
                        <li><a href="#" class="am-cf"> 模版选择</a></li>
                        <li><a href="#" class="am-cf"> 添加模版</a></li>
                    </ul>
                </li>
                <li><a href="?m=link&c=link&a=init&pc_hash=<?php echo $_SESSION['pc_hash'];?>"><span class="am-icon-link"></span> 友情链接</a></li>
                <li><a href="http://www.kancloud.cn/szpengjian/peng_cms/226311" target="_blank"><span class="am-icon-book"></span> 操作手册</a></li>
                <li><a href="?m=admin&c=index&a=public_logout"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告</p>
                    <p>时光静好，与君语；细水流年，与君同。</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->