<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
include $this->admin_tpl('left');
?>
    <div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">系统设置</strong> /
                <small>config</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12">
                <!-- 配置开始 -->
                <form action="?m=admin&c=setting&a=save" class="am-form"
                      method="post">
                    <div class="am-tabs am-margin" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1">基本配置</a></li>
                            <li><a href="#tab2">安全配置</a></li>
                            <li><a href="#tab3">PHPSSO</a></li>
                            <li><a href="#tab4">邮箱配置</a></li>
                            <li><a href="#tab5">connect</a></li>
                        </ul>
                        <div class="am-tabs-bd">
                            <!-- 基本配置 -->
                            <div class="am-tab-panel am-fade am-in am-active" id="tab1">

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_admin_email') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setting[admin_email]" id="admin_email" size="30"
                                               value="<?php echo $admin_email ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_category_ajax') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setting[category_ajax]" id="category_ajax" size="5"
                                               value="<?php echo $category_ajax ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_gzip') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <label><input name="setconfig[gzip]" value="1" type="radio"
                                                <?php echo ($gzip == '1') ? ' checked' : '' ?>> <?php echo L('setting_yes') ?>
                                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input name="setconfig[gzip]" value="0" type="radio"
                                                <?php echo ($gzip == '0') ? ' checked' : '' ?>> <?php echo L('setting_no') ?>
                                        </label>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_attachment_stat') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <label><input name="setconfig[attachment_stat]" value="1"
                                                      type="radio"
                                                <?php echo ($attachment_stat == '1') ? ' checked' : '' ?>> <?php echo L('setting_yes') ?>
                                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input name="setconfig[attachment_stat]" value="0"
                                                      type="radio"
                                                <?php echo ($attachment_stat == '0') ? ' checked' : '' ?>> <?php echo L('setting_no') ?>
                                        </label>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo L('setting_attachment_stat_desc') ?>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_js_path') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[js_path]" id="js_path" size="50"
                                               value="<?php echo JS_PATH ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_css_path') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[css_path]" id="css_path" size="50"
                                               value="<?php echo CSS_PATH ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_img_path') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[img_path]" id="img_path" size="50"
                                               value="<?php echo IMG_PATH ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_upload_url') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[upload_url]" id="upload_url" size="50"
                                               value="<?php echo $upload_url ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>

                            </div>
                            <!-- 安全配置 -->
                            <div class="am-tab-panel am-fade" id="tab2">

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_admin_log') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <label><input name="setconfig[admin_log]" value="1"
                                                      type="radio" <?php echo ($admin_log == '1') ? ' checked' : '' ?>> <?php echo L('setting_yes') ?>
                                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input name="setconfig[admin_log]" value="0"
                                                      type="radio" <?php echo ($admin_log == '0') ? ' checked' : '' ?>> <?php echo L('setting_no') ?>
                                        </label>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*</div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_error_log') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                        <label><input name="setconfig[errorlog]" value="1"
                                                      type="radio" <?php echo ($errorlog == '1') ? ' checked' : '' ?>> <?php echo L('setting_yes') ?>
                                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input name="setconfig[errorlog]" value="0"
                                                      type="radio" <?php echo ($errorlog == '0') ? ' checked' : '' ?>> <?php echo L('setting_no') ?>
                                        </label>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_error_log_size') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setting[errorlog_size]" id="errorlog_size" size="5"
                                               value="<?php echo $errorlog_size ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">MB</div>
                                </div>

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_maxloginfailedtimes') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setting[maxloginfailedtimes]" id="maxloginfailedtimes"
                                               size="10" value="<?php echo $maxloginfailedtimes ?>"/>
                                    </div>
                                    <div class="am-u-sm-12 am-u-md-6">*</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_minrefreshtime') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setting[minrefreshtime]" id="minrefreshtime" size="10"
                                               value="<?php echo $minrefreshtime ?>"/>
                                    </div>
                                    <div class="am-u-sm-12 am-u-md-6">*</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('admin_url') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[admin_url]" id="admin_url" size="30"
                                               value="<?php echo $admin_url ?>"/>
                                    </div>
                                    <div class="am-u-sm-12 am-u-md-6"><?php echo L('admin_url_tips') ?></div>
                                </div>

                            </div>
                            <!-- PHPSSO配置 -->
                            <div class="am-tab-panel am-fade" id="tab3">

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_phpsso') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                        <label><input name="setconfig[phpsso]" value="1" type="radio"
                                                <?php echo ($phpsso == '1') ? ' checked' : '' ?>> <?php echo L('setting_yes') ?>
                                        </label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label><input name="setconfig[phpsso]" value="0" type="radio"
                                                <?php echo ($phpsso == '0') ? ' checked' : '' ?>> <?php echo L('setting_no') ?>
                                        </label>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_phpsso_appid') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[phpsso_appid]" id="phpsso_appid" size="30"
                                               value="<?php echo $phpsso_appid ?>"/>
                                    </div>
                                </div>

                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_phpsso_phpsso_api_url') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[phpsso_api_url]" id="phpsso_api_url"
                                               size="50" value="<?php echo $phpsso_api_url ?>"/>
                                    </div>
                                </div>
                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_phpsso_auth_key') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[phpsso_auth_key]" id="phpsso_auth_key"
                                               size="50" value="<?php echo $phpsso_auth_key ?>"/>
                                    </div>
                                </div>
                                <div class="am-g am-margin-top-sm">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_phpsso_version') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4 am-u-end">
                                        <input type="text" class="am-input-sm"
                                               name="setconfig[phpsso_version]" id="phpsso_version" size="2"
                                               value="<?php echo $phpsso_version ?>"/>
                                    </div>
                                </div>

                            </div>
                            <!-- 邮箱配置 -->
                            <div class="am-tab-panel am-fade" id="tab4">

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('mail_type') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <label><input name="setting[mail_type]" checkbox="mail_type"
                                                      value="1" onclick="showsmtp(this)" type="radio"
                                                <?php echo $mail_type == 1 ? ' checked' : '' ?>><?php echo L('mail_type_smtp') ?>
                                        </label>
                                        <label><input name="setting[mail_type]" checkbox="mail_type"
                                                      value="0" onclick="showsmtp(this)" type="radio"
                                                <?php echo $mail_type == 0 ? ' checked' : '' ?>
                                                <?php if (substr(strtolower(PHP_OS), 0, 3) == 'win') echo 'disabled'; ?> /> <?php echo L('mail_type_mail') ?>
                                        </label>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('mail_server') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-ms"
                                               name="setting[mail_server]" id="mail_server" size="30"
                                               value="<?php echo $mail_server ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('mail_port') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-ms"
                                               name="setting[mail_port]" id="mail_port" size="30"
                                               value="<?php echo $mail_port ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('mail_from') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-ms"
                                               name="setting[mail_from]" id="mail_from" size="30"
                                               value="<?php echo $mail_from ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('mail_auth') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <label><input name="setting[mail_auth]" checkbox="mail_auth"
                                                      value="1" type="radio"
                                                <?php echo $mail_auth == 1 ? ' checked' : '' ?>> <?php echo L('mail_auth_open') ?>
                                        </label>
                                        <label><input name="setting[mail_auth]" checkbox="mail_auth"
                                                      value="0" type="radio"
                                                <?php echo $mail_auth == 0 ? ' checked' : '' ?>> <?php echo L('mail_auth_close') ?>
                                        </label>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('mail_user') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-ms"
                                               name="setting[mail_user]" id="mail_from" size="30"
                                               value="<?php echo $mail_from ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('mail_password') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="password" class="am-input-ms"
                                               name="setting[mail_password]" id="mail_password" size="30"
                                               value="<?php echo $mail_password ?>"/>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('mail_test') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        <input type="text" class="am-input-ms" name="mail_to"
                                               id="mail_to" size="30" value=""/> <br/> <input
                                            type="button" class="am-btn am-btn-primary am-btn-xs"
                                            onClick="javascript:test_mail();"
                                            value="<?php echo L('mail_test_send') ?>">
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填</div>
                                </div>

                            </div>
                            <!-- connect配置 -->
                            <div class="am-tab-panel am-fade" id="tab5">

                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_snda_enable') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        APP key <input type="text" class="am-input-sm"
                                                       name="setconfig[snda_akey]" id="snda_akey"
                                                       value="<?php echo $snda_akey ?>"/> APP secret key <input
                                            type="text" class="am-input-sm" name="setconfig[snda_skey]"
                                            id="snda_skey" value="<?php echo $snda_skey ?>"/> <a
                                            href="http://code.snda.com/index/oauth"
                                            target="_blank"><?php echo L('click_register') ?></a>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_connect_sina') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        App key <input type="text" class="am-input-sm"
                                                       name="setconfig[sina_akey]" id="sina_akey" size="20"
                                                       value="<?php echo $sina_akey ?>"/> App secret key <input
                                            type="text" class="am-input-sm" name="setconfig[sina_skey]"
                                            id="sina_skey" size="40" value="<?php echo $sina_skey ?>"/>
                                        <a
                                            href="http://open.t.sina.com.cn/wiki/index.php/<?php echo L('connect_micro') ?>"
                                            target="_blank"><?php echo L('click_register') ?></a>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_connect_qq') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        App key <input type="text" class="am-input-sm"
                                                       name="setconfig[qq_akey]" id="qq_akey" size="20"
                                                       value="<?php echo $qq_akey ?>"/> App secret key <input
                                            type="text" class="am-input-sm" name="setconfig[qq_skey]"
                                            id="qq_skey" size="40" value="<?php echo $qq_skey ?>"/> <a
                                            href="http://open.t.qq.com/"
                                            target="_blank"><?php echo L('click_register') ?></a>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>
                                <div class="am-g am-margin-top">
                                    <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                        <?php echo L('setting_connect_qqnew') ?>
                                    </div>
                                    <div class="am-u-sm-8 am-u-md-4">
                                        App I D &nbsp;<input type="text" class="am-input-sm"
                                                             name="setconfig[qq_appid]" id="qq_appid" size="20"
                                                             value="<?php echo $qq_appid; ?>"/> App key <input
                                            type="text"
                                            class="am-input-sm" name="setconfig[qq_appkey]"
                                            id="qq_appkey" size="40" value="<?php echo $qq_appkey; ?>"/>
                                        <?php echo L('setting_connect_qqcallback') ?> <input type="text"
                                                                                             class="input-text"
                                                                                             name="setconfig[qq_callback]"
                                                                                             id="qq_callback" size="40"
                                                                                             value="<?php echo $qq_callback; ?>"/>
                                        <a href="http://connect.qq.com"
                                           target="_blank"><?php echo L('click_register') ?></a>
                                    </div>
                                    <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="am-margin">
                        <input type="hidden" name="pc_hash" value="<?php echo $_SESSION['pc_hash']; ?>">
                        <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>"
                               class="am-btn am-btn-primary am-btn-md">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 配置结束 -->
<?php include $this->admin_tpl('footer'); ?>