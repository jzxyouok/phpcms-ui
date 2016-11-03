<?php
    defined('IN_ADMIN') or exit('No permission resources.');
    $show_validator = true;
    include $this->admin_tpl('header');
    include $this->admin_tpl('left');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
        $("#password").formValidator({empty:true,onshow:"<?php echo L('not_change_the_password_please_leave_a_blank')?>",onfocus:"<?php echo L('password').L('between_6_to_20')?>"}).inputValidator({min:6,max:20,onerror:"<?php echo L('password').L('between_6_to_20')?>"});
        $("#pwdconfirm").formValidator({empty:true,onshow:"<?php echo L('not_change_the_password_please_leave_a_blank')?>",onfocus:"<?php echo L('input').L('passwords_not_match')?>",oncorrect:"<?php echo L('passwords_match')?>"}).compareValidator({desid:"password",operateor:"=",onerror:"<?php echo L('input').L('passwords_not_match')?>"});
        $("#email").formValidator({onshow:"<?php echo L('input').L('email')?>",onfocus:"<?php echo L('email').L('format_incorrect')?>",oncorrect:"<?php echo L('email').L('format_right')?>"}).regexValidator({regexp:"email",datatype:"enum",onerror:"<?php echo L('email').L('format_incorrect')?>"});
    })
</script>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">添加用户</strong> /
                <small>User</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form name="myform" action="?m=admin&c=admin_manage&a=add" class="am-form" method="post">
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        <?php echo L('username') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="text" name="info[username]" class="am-input-sm">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6">*必填，</div>
                </div>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                       <?php echo L('password') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="password"  name="info[password]" class="am-input-sm">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6"></div>
                </div>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                       <?php echo L('cofirmpwd') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                        <input type="password" name="info[pwdconfirm]" class="am-input-sm" value="">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6"></div>
                </div>
                <div class="am-g am-margin-top">
                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                        <?php echo L('email') ?>
                    </div>
                    <div class="am-u-sm-8 am-u-md-4">
                    <input type="text" name="info[email]" value="" class="am-input-sm">
                    </div>
                    <div class="am-hide-sm-only am-u-md-6"></div>
                </div>
                    <div class="am-g am-margin-top">
                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                            <?php echo L('realname') ?>
                        </div>
                        <div class="am-u-sm-8 am-u-md-4">
                            <input type="text" name="info[realname]" value="" class="am-input-sm">
                        </div>
                        <div class="am-hide-sm-only am-u-md-6"></div>
                    </div>
                    <?php if ($_SESSION['roleid'] == 1) { ?>
                        <div class="am-g am-margin-top">
                            <div class="am-u-sm-4 am-u-md-2 am-text-right"><?php echo L('userinrole') ?></div>
                            <div class="am-u-sm-8 am-u-md-10">
                                    <select data-am-selected="{btnSize: 'sm'}" name="info[roleid]">
                                    <?php foreach ($roles as $role) { ?>
                                        <option
                                            value="<?php echo $role['roleid'] ?>" <?php echo(($role['roleid'] == $roleid) ? 'selected' : '') ?>><?php echo $role['rolename'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="am-margin">
                         <input type="hidden" name="info[admin_manage_code]" value="<?php echo $admin_manage_code?>" id="admin_manage_code">
                         <input type="hidden" name="pc_hash" value="<?php echo $_SESSION['pc_hash']?>">
                         <input name="dosubmit" class="am-btn am-btn-primary am-btn-sm" type="submit" value="<?php echo L('submit') ?>">
                    </div>
                </form>
            </div>
        </div>
<?php include $this->admin_tpl('footer');?>

