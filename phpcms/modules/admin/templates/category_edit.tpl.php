<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
include $this->admin_tpl('left');
?>
<script type="text/javascript">
    <!--
    $(function () {
        $.formValidator.initConfig({
            formid: "myform", autotip: true, onerror: function (msg, obj) {
                window.top.art.dialog({content: msg, lock: true, width: '200', height: '50'}, function () {
                    this.close();
                    $(obj).focus();
                })
            }
        });
        $("#modelid").formValidator({
            onshow: "<?php echo L('select_model');?>",
            onfocus: "<?php echo L('select_model');?>",
            oncorrect: "<?php echo L('input_right');?>"
        }).inputValidator({min: 1, onerror: "<?php echo L('select_model');?>"}).defaultPassed();
        $("#catname").formValidator({
            onshow: "<?php echo L('input_catname');?>",
            onfocus: "<?php echo L('input_catname');?>",
            oncorrect: "<?php echo L('input_right');?>"
        }).inputValidator({min: 1, onerror: "<?php echo L('input_catname');?>"}).defaultPassed();
        $("#catdir").formValidator({
            onshow: "<?php echo L('input_dirname');?>",
            onfocus: "<?php echo L('input_dirname');?>"
        }).regexValidator({
            regexp: "^([a-zA-Z0-9、-]|[_]){0,30}$",
            onerror: "<?php echo L('enter_the_correct_catname');?>"
        }).inputValidator({min: 1, onerror: "<?php echo L('input_dirname');?>"}).ajaxValidator({
            type: "get",
            url: "",
            data: "m=admin&c=category&a=public_check_catdir&old_dir=<?php echo $catdir;?>",
            datatype: "html",
            cached: false,
            getdata: {parentid: 'parentid'},
            async: 'false',
            success: function (data) {
                if (data == "1") {
                    return true;
                } else {
                    return false;
                }
            },
            buttons: $("#dosubmit"),
            onerror: "<?php echo L('catname_have_exists');?>",
            onwait: "<?php echo L('connecting');?>"
        }).defaultPassed();
        $("#url").formValidator({
            onshow: " ",
            onfocus: "<?php echo L('domain_name_format');?>",
            tipcss: {width: '300px'},
            empty: true
        }).inputValidator({onerror: "<?php echo L('domain_name_format');?>"}).regexValidator({
            regexp: "http:\/\/(.+)\/$",
            onerror: "<?php echo L('domain_end_string');?>"
        });
        $("#template_list").formValidator({
            onshow: "<?php echo L('template_setting');?>",
            onfocus: "<?php echo L('template_setting');?>",
            oncorrect: "<?php echo L('input_right');?>"
        }).inputValidator({min: 1, onerror: "<?php echo L('template_setting');?>"}).defaultPassed();
    })
    //-->
</script>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">栏目编辑</strong> /
                <small>category</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form name="myform" id="myform" action="?m=admin&c=category&a=edit" method="post">
                    <div class="am-tabs" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li class="am-active"><a href="#tab1"><?php echo L('catgory_basic'); ?></a></li>
                            <li><a href="#tab2"><?php echo L('catgory_createhtml'); ?></a></li>
                            <li><a href="#tab3"><?php echo L('catgory_template'); ?></a></li>
                            <li><a href="#tab4"><?php echo L('catgory_seo'); ?></a></li>
                            <li><a href="#tab5"><?php echo L('catgory_private'); ?></a></li>
                            <li><a href="#tab6"><?php echo L('catgory_readpoint'); ?></a></li>
                        </ul>
                            <div class="am-tabs-bd">
                                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                    <table class="am-table">
                                        <tr>
                                            <td><?php echo L('select_model') ?>：</td>
                                            <td>
                                                <?php
                                                $category_items = getcache('category_items_' . $modelid, 'commons');
                                                $disabled = $category_items[$catid] ? 'disabled' : '';
                                                $models = getcache('model', 'commons');
                                                $model_datas = array();
                                                foreach ($models as $_k => $_v) {
                                                    if ($_v['siteid'] != $this->siteid) continue;
                                                    $model_datas[$_v['modelid']] = $_v['name'];
                                                }
                                                echo form::select($model_datas, $modelid, 'name="info[modelid]" id="modelid" data-am-selected="{btnSize: \'sm\'}" ' . $disabled, L('select_model'));
                                                echo L('modelid_edit_tips');
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('parent_category') ?>：</td>
                                            <td>
                                                <?php echo form::select_category('category_content_' . $this->siteid, $parentid, 'name="info[parentid]" id="parentid" data-am-selected="{btnSize: \'sm\'}"', L('please_select_parent_category'), 0, -1); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('catname') ?>：</td>
                                            <td><input type="text" name="info[catname]" id="catname" class="am-input-sm"
                                                       value="<?php echo $catname; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('catdir') ?>：</td>
                                            <td><input type="text" name="info[catdir]" id="catdir" class="am-input-sm"
                                                       value="<?php echo $catdir; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('catgory_img') ?>：</td>
                                            <td><?php echo form::images('info[image]', 'image', $image, 'content'); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('description') ?>：</td>
                                            <td>
                                            <textarea name="info[description]" maxlength="255"
                                                      style="width:300px;height:60px;"><?php echo $description; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('workflow'); ?>：</td>
                                            <td>
                                                <?php
                                                $workflows = getcache('workflow_' . $this->siteid, 'commons');
                                                if ($workflows) {
                                                    $workflows_datas = array();
                                                    foreach ($workflows as $_k => $_v) {
                                                        $workflows_datas[$_v['workflowid']] = $_v['workname'];
                                                    }
                                                    echo form::select($workflows_datas, $setting['workflowid'], 'name="setting[workflowid]"', L('catgory_not_need_check'));
                                                } else {
                                                    echo '<input type="hidden" name="setting[workflowid]" value="">';
                                                    echo L('add_workflow_tips');
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('ismenu'); ?>：</td>
                                            <td>
                                                <input type='radio' name='info[ismenu]'
                                                       value='1' <?php if ($ismenu) echo 'checked'; ?>> <?php echo L('yes'); ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type='radio' name='info[ismenu]'
                                                       value='0' <?php if (!$ismenu) echo 'checked'; ?>> <?php echo L('no'); ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="am-tab-panel am-fade" id="tab2">
                                    <table class="am-table">
                                        <tr>
                                            <td><?php echo L('html_category'); ?>：</th>
                                            <td>
                                                <input type='radio' name='setting[ishtml]'
                                                       value='1' <?php if ($setting['ishtml']) echo 'checked'; ?>
                                                       onClick="$('#category_php_ruleid').css('display','none');$('#category_html_ruleid').css('display','');$('#tr_domain').css('display','');"> <?php echo L('yes'); ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type='radio' name='setting[ishtml]'
                                                       value='0' <?php if (!$setting['ishtml']) echo 'checked'; ?>
                                                       onClick="$('#category_php_ruleid').css('display','');$('#category_html_ruleid').css('display','none');$('#tr_domain').css('display','none');"> <?php echo L('no'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('html_show'); ?>：</td>
                                            <td>
                                                <input type='radio' name='setting[content_ishtml]'
                                                       value='1' <?php if ($setting['content_ishtml']) echo 'checked'; ?>
                                                       onClick="$('#show_php_ruleid').css('display','none');$('#show_html_ruleid').css('display','')"> <?php echo L('yes'); ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type='radio' name='setting[content_ishtml]'
                                                       value='0' <?php if (!$setting['content_ishtml']) echo 'checked'; ?>
                                                       onClick="$('#show_php_ruleid').css('display','');$('#show_html_ruleid').css('display','none')"> <?php echo L('no'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('category_urlrules'); ?>：</td>
                                            <td>
                                                <div id="category_php_ruleid"
                                                     style="display:<?php if ($setting['ishtml']) echo 'none'; ?>">
                                                    <?php
                                                    echo form::urlrule('content', 'category', 0, $setting['category_ruleid'], 'name="category_php_ruleid"');
                                                    ?>
                                                </div>
                                                <div id="category_html_ruleid"
                                                     style="display:<?php if (!$setting['ishtml']) echo 'none'; ?>">
                                                    <?php
                                                    echo form::urlrule('content', 'category', 1, $setting['category_ruleid'], 'name="category_html_ruleid"');
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('show_urlrules'); ?>：</td>
                                            <td>
                                                <div id="show_php_ruleid"
                                                     style="display:<?php if ($setting['content_ishtml']) echo 'none'; ?>">
                                                    <?php
                                                    echo form::urlrule('content', 'show', 0, $setting['show_ruleid'], 'name="show_php_ruleid"');
                                                    ?>
                                                </div>
                                                <div id="show_html_ruleid"
                                                     style="display:<?php if (!$setting['content_ishtml']) echo 'none'; ?>">
                                                    <?php
                                                    echo form::urlrule('content', 'show', 1, $setting['show_ruleid'], 'name="show_html_ruleid"');
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('create_to_rootdir'); ?>：</td>
                                            <td>
                                                <input type='radio' name='setting[create_to_html_root]'
                                                       value='1' <?php if ($setting['create_to_html_root']) echo 'checked'; ?> > <?php echo L('yes'); ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type='radio' name='setting[create_to_html_root]'
                                                       value='0' <?php if (!$setting['create_to_html_root']) echo 'checked'; ?> > <?php echo L('no'); ?>
                                                （<?php echo L('create_to_rootdir_tips'); ?>）
                                            </td>
                                        </tr>
                                        <tr id="tr_domain" style="display:<?php if (!$setting['ishtml']) echo 'none'; ?>">
                                            <td><?php echo L('domain') ?>：</td>
                                            <td><input type="text" name="info[url]" id="url" class="input-text" size="50"
                                                       value="<?php if (preg_match('/^http:\/\/([a-z0-9\-\.]+)\/$/i', $url)) echo $url; ?>">
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="am-tab-panel am-fade" id="tab3">
                                    <table class="am-table">
                                        <tr>
                                            <td><?php echo L('available_styles'); ?>：</td>
                                            <td>
                                                <?php echo form::select($template_list, $setting['template_list'], 'name="setting[template_list]" id="template_list" onchange="load_file_list(this.value)"', L('please_select')) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('category_index_tpl') ?>：</td>
                                            <td id="category_template">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('category_list_tpl') ?>：</td>
                                            <td id="list_template">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('content_tpl') ?>：</td>
                                            <td id="show_template">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo '模板应用到子栏目'; ?></td>
                                            <td><input type='radio' name='template_child' value='1'> <?php echo L('yes'); ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type='radio' name='template_child' value='0'
                                                       checked> <?php echo L('no'); ?></td>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="am-tab-panel am-fade" id="tab4">
                                    <table class="am-table">
                                        <tr>
                                            <td><?php echo L('meta_title'); ?></td>
                                            <td><input name='setting[meta_title]' type='text' id='meta_title'
                                                       value='<?php echo $setting['meta_title']; ?>' size='60'
                                                       maxlength='60'></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('meta_keywords'); ?></td>
                                            <td><textarea name='setting[meta_keywords]' id='meta_keywords'
                                                          style="width:90%;height:40px"><?php echo $setting['meta_keywords']; ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('meta_description'); ?></td>
                                            <td><textarea name='setting[meta_description]' id='meta_description'
                                                          style="width:90%;height:50px"><?php echo $setting['meta_description']; ?></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="am-tab-panel am-fade" id="tab5">
                                    <table class="am-table">
                                        <tr>
                                            <td><?php echo L('role_private') ?>：</td>
                                            <td>
                                                <table width="100%" class="table-list">
                                                    <thead>
                                                    <tr>
                                                        <th align="left"><?php echo L('role_name'); ?></th>
                                                        <th><?php echo L('view'); ?></th>
                                                        <th><?php echo L('add'); ?></th>
                                                        <th><?php echo L('edit'); ?></th>
                                                        <th><?php echo L('delete'); ?></th>
                                                        <th><?php echo L('listorder'); ?></th>
                                                        <th><?php echo L('push'); ?></th>
                                                        <th><?php echo L('move'); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $roles = getcache('role', 'commons');
                                                    foreach ($roles as $roleid => $rolrname) {
                                                        $disabled = $roleid == 1 ? 'disabled' : '';

                                                        ?>
                                                        <tr>
                                                            <td><?php echo $rolrname ?></td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_roleid[]" <?php echo $disabled; ?> <?php echo $this->check_category_priv('init', $roleid); ?>
                                                                                      value="init,<?php echo $roleid; ?>">
                                                            </td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_roleid[]" <?php echo $disabled; ?> <?php echo $this->check_category_priv('add', $roleid); ?>
                                                                                      value="add,<?php echo $roleid; ?>">
                                                            </td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_roleid[]" <?php echo $disabled; ?> <?php echo $this->check_category_priv('edit', $roleid); ?>
                                                                                      value="edit,<?php echo $roleid; ?>">
                                                            </td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_roleid[]" <?php echo $disabled; ?> <?php echo $this->check_category_priv('delete', $roleid); ?>
                                                                                      value="delete,<?php echo $roleid; ?>">
                                                            </td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_roleid[]" <?php echo $disabled; ?> <?php echo $this->check_category_priv('listorder', $roleid); ?>
                                                                                      value="listorder,<?php echo $roleid; ?>">
                                                            </td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_roleid[]" <?php echo $disabled; ?> <?php echo $this->check_category_priv('push', $roleid); ?>
                                                                                      value="push,<?php echo $roleid; ?>">
                                                            </td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_roleid[]" <?php echo $disabled; ?> <?php echo $this->check_category_priv('move', $roleid); ?>
                                                                                      value="move,<?php echo $roleid; ?>">
                                                            </td>
                                                        </tr>
                                                    <?php } ?>

                                                    </tbody>
                                                </table>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan=2>
                                                <hr style="border:1px dotted #F2F2F2;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('group_private') ?>：</td>
                                            <td>
                                                <table width="100%" class="table-list">
                                                    <thead>
                                                    <tr>
                                                        <th align="left"><?php echo L('group_name'); ?></th>
                                                        <th><?php echo L('allow_vistor'); ?></th>
                                                        <th><?php echo L('allow_contribute'); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $group_cache = getcache('grouplist', 'member');
                                                    foreach ($group_cache as $_key => $_value) {
                                                        if ($_value['groupid'] == 1) continue;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $_value['name']; ?></td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_groupid[]" <?php echo $this->check_category_priv('visit', $_value['groupid'], 0); ?>
                                                                                      value="visit,<?php echo $_value['groupid']; ?>">
                                                            </td>
                                                            <td align="center"><input type="checkbox"
                                                                                      name="priv_groupid[]" <?php echo $this->check_category_priv('add', $_value['groupid'], 0); ?>
                                                                                      value="add,<?php echo $_value['groupid']; ?>">
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('apply_to_child'); ?></td>
                                            <td><input type='radio' name='priv_child' value='1'> <?php echo L('yes'); ?>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type='radio' name='priv_child' value='0'
                                                       checked> <?php echo L('no'); ?></td>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="am-tab-panel am-fade" id="tab6">
                                    <table class="am-table">
                                        <tr>
                                            <td><?php echo L('contribute_add_point'); ?></td>
                                            <td><input name='setting[presentpoint]' type='text'
                                                       value='<?php echo $setting['presentpoint']; ?>' size='5'
                                                       maxlength='5'
                                                       style='text-align:center'> <?php echo L('contribute_add_point_tips'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('default_readpoint'); ?></td>
                                            <td><input name='setting[defaultchargepoint]' type='text'
                                                       value='<?php echo $setting['defaultchargepoint']; ?>' size='4'
                                                       maxlength='4' style='text-align:center'> <select
                                                    name="setting[paytype]">
                                                    <option
                                                        value="0" <?php if (!$setting['paytype']) echo 'selected'; ?>><?php echo L('readpoint'); ?></option>
                                                    <option
                                                        value="1" <?php if ($setting['paytype']) echo 'selected'; ?>><?php echo L('money'); ?></option>
                                                </select> <?php echo L('readpoint_tips'); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo L('repeatchargedays'); ?></td>
                                            <td>
                                                <input name='setting[repeatchargedays]' type='text'
                                                       value='<?php echo $setting['repeatchargedays']; ?>' size='4'
                                                       maxlength='4'
                                                       style='text-align:center'> <?php echo L('repeat_tips'); ?>&nbsp;&nbsp;
                                                <font color="red"><?php echo L('repeat_tips2'); ?></font></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>


                            <div class="am-margin">
                                <input type="hidden" name="pc_hash" value="<?php echo $_SESSION['pc_hash']?>">
                                <input name="catid" type="hidden" value="<?php echo $catid; ?>">
                                <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>" class="am-btn am-btn-primary am-btn-md">
                            </div>
                        </div>
                </form>
            </div>

        </div>
        <!--table_form_off-->
    </div>

    <script language="JavaScript">
        <!--
        window.top.$('#display_center_id').css('display', 'none');
        $(function () {
            var url = $('#url').val();
            if (!url.match(/^http:\/\//)) $('#url').val('');
        })
        function load_file_list(id) {
            if (id == '') return false;
            $.getJSON('?m=admin&c=category&a=public_tpl_file_list&style=' + id + '&catid=<?php echo $catid?>', function (data) {
                $('#category_template').html(data.category_template);
                $('#list_template').html(data.list_template);
                $('#show_template').html(data.show_template);
            });
        }
        <?php if (isset($setting['template_list']) && !empty($setting['template_list'])) echo "load_file_list('" . $setting['template_list'] . "')"?>
        //-->
    </script>
    <?php
        include $this->admin_tpl('footer');
    ?>