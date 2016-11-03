<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_validator = true;
include $this->admin_tpl('header');
include $this->admin_tpl('left');
?>
    <div class="admin-content">
    <div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf">
            <strong class="am-text-primary am-text-lg">编辑用户</strong> /
            <small>User</small>
        </div>
    </div>
    <hr>
    <div class="am-g">
        <div class="am-u-sm-12">
            <form name="myform" action="?m=admin&c=admin_manage&a=edit&pc_hash=<?php echo $_SESSION['pc_hash'] ?>" class="am-form" method="post" id="myform">
                <input type="hidden" name="info[userid]" value="<?php echo $userid ?>"></input>
                <input type="hidden" name="info[username]" value="<?php echo $username ?>"></input>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        <?php echo L('username') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="text" value="<?php echo $username ?>" class="am-input-sm">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">*必填，</div>
                </div>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        <?php echo L('password') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="password" name="info[password]" class="am-input-sm">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">*必填，</div>
                </div>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        <?php echo L('cofirmpwd') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="password" name="info[pwdconfirm]" class="am-input-sm">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">*必填，</div>
                </div>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        <?php echo L('email') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="text" name="info[email]" value="<?php echo $email ?>" id="email"
                               class="am-input-sm">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">*必填，</div>
                </div>

                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        <?php echo L('realname') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="text" name="info[realname]" value="<?php echo $realname ?>" id="email"
                               class="am-input-sm">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">*必填，</div>
                </div>
                <?php if ($_SESSION['roleid'] == 1) { ?>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right"><?php echo L('userinrole') ?></div>
                        <div class="am-u-sm-8 am-u-md-10">
                            <select data-am-selected="{btnSize: 'sm'}">
                                <?php foreach ($roles as $role) { ?>
                                    <option
                                        value="<?php echo $role['roleid'] ?>" <?php echo(($role['roleid'] == $roleid) ? 'selected' : '') ?>><?php echo $role['rolename'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                <div class="am-margin">
                    <input type="hidden" name="info[admin_manage_code]" value="<?php echo $admin_manage_code ?>"
                           id="admin_manage_code">
                    <input type="hidden" name="pc_hash" value="<?php echo $_SESSION['pc_hash']?>">
                    <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>"
                           class="am-btn am-btn-primary am-btn-xs" id="dosubmit">
                </div>
            </form>
        </div>
    </div>
<?php include $this->admin_tpl('footer'); ?>