<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
include $this->admin_tpl('left', 'admin');
?>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">友情链接</strong> /
                <small>category</small>
            </div>
        </div>
        <hr>
        <div class="am-g">
            <div class="am-u-sm-12">
                <div class="pad-lr-10">
                    <table width="100%" cellspacing="0" class="search-form">
                        <tbody>
                        <tr>
                            <td>
                                <div class="explain-col">
                                    <?php echo L('all_linktype') ?>: &nbsp;&nbsp; <a
                                        href="?m=link&c=link"><?php echo L('all') ?></a>
                                    &nbsp;&nbsp; <a href="?m=link&c=link&typeid=0">默认分类</a>&nbsp;
                                    <?php
                                    if (is_array($type_arr)) {
                                        foreach ($type_arr as $typeid => $type) {
                                            ?><a
                                            href="?m=link&c=link&typeid=<?php echo $typeid; ?>"><?php echo $type; ?></a>&nbsp;
                                        <?php }
                                    } ?>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <form class="am-form" name="myform" id="myform" action="?m=link&c=link&a=listorder"
                          method="post">
                        <table class="am-table am-table-hover table-main">
                            <thead>
                            <tr>
                                <th><input type="checkbox" value=""
                                           id="check_box" onclick="selectall('linkid[]');"></th>
                                <th><?php echo L('listorder') ?></th>
                                <th><?php echo L('link_name') ?></th>
                                <th><?php echo L('logo') ?></th>
                                <th><?php echo L('typeid') ?></th>
                                <th><?php echo L('link_type') ?></th>
                                <th><?php echo L('status') ?></th>
                                <th><?php echo L('operations_manage') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (is_array($infos)) {
                                foreach ($infos as $info) {
                                    ?>
                                    <tr>
                                        <td><input type="checkbox"
                                                   name="linkid[]" value="<?php echo $info['linkid'] ?>"></td>
                                        <td><input
                                                name='listorders[<?php echo $info['linkid'] ?>]' type='text'
                                                size='3' value='<?php echo $info['listorder'] ?>'
                                                class="input-text-c"></td>
                                        <td><a href="<?php echo $info['url']; ?>"
                                               title="<?php echo L('go_website') ?>"
                                               target="_blank"><?php echo new_html_special_chars($info['name']) ?></a>
                                        </td>
                                        <td><?php if ($info['linktype'] == 1) { ?><?php if ($info['passed'] == '1') { ?>
                                                <img
                                                src="<?php echo $info['logo']; ?>" width=83
                                                height=31><?php } else echo $info['logo'];
                                            } ?></td>
                                        <td><?php echo $type_arr[$info['typeid']]; ?></td>
                                        <td><?php if ($info['linktype'] == 0) {
                                                echo L('word_link');
                                            } else {
                                                echo L('logo_link');
                                            } ?></td>
                                        <td><?php if ($info['passed'] == '0') { ?><a
                                                href='?m=link&c=link&a=check&linkid=<?php echo $info['linkid'] ?>'
                                                onClick="return confirm('<?php echo L('pass_or_not') ?>')"><font
                                                    color=red><?php echo L('audit') ?></font></a><?php } else {
                                                echo L('passed');
                                            } ?></td>
                                        <td><a href="###"
                                               onclick="edit(<?php echo $info['linkid'] ?>, '<?php echo new_addslashes(new_html_special_chars($info['name'])) ?>')"
                                               title="<?php echo L('edit') ?>"><?php echo L('edit') ?></a> | <a
                                                href='?m=link&c=link&a=delete&linkid=<?php echo $info['linkid'] ?>'
                                                onClick="return confirm('<?php echo L('confirm', array('message' => new_addslashes(new_html_special_chars($info['name'])))) ?>')"><?php echo L('delete') ?></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                </div>
                <div class="btn">
                    <input name="dosubmit" type="submit" class="am-btn am-btn-primary am-btn-xs"
                           value="<?php echo L('listorder') ?>">&nbsp;&nbsp;<input
                        type="submit" class="am-btn am-btn-primary am-btn-xs" name="dosubmit"
                        onClick="document.myform.action='?m=link&c=link&a=delete'"
                        value="<?php echo L('delete') ?>"/>
                </div>
                <div id="pages"><?php echo $pages ?></div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        function edit(id, name) {
            window.top.art.dialog({id: 'edit'}).close();
            window.top.art.dialog({
                title: '<?php echo L('edit')?> ' + name + ' ',
                id: 'edit',
                iframe: '?m=link&c=link&a=edit&linkid=' + id,
                width: '700',
                height: '450'
            }, function () {
                var d = window.top.art.dialog({id: 'edit'}).data.iframe;
                var form = d.document.getElementById('dosubmit');
                form.click();
                return false;
            }, function () {
                window.top.art.dialog({id: 'edit'}).close()
            });
        }
        function checkuid() {
            var ids = '';
            $("input[name='linkid[]']:checked").each(function (i, n) {
                ids += $(n).val() + ',';
            });
            if (ids == '') {
                window.top.art.dialog({
                    content: "<?php echo L('before_select_operations')?>",
                    lock: true,
                    width: '200',
                    height: '50',
                    time: 1.5
                }, function () {
                });
                return false;
            } else {
                myform.submit();
            }
        }
        //向下移动
        function listorder_up(id) {
            $.get('?m=link&c=link&a=listorder_up&linkid=' + id, null, function (msg) {
                if (msg == 1) {
                    //$("div [id=\'option"+id+"\']").remove();
                    alert('<?php echo L('move_success')?>');
                } else {
                    alert(msg);
                }
            });
        }
    </script>
    <?php include $this->admin_tpl('footer', 'admin'); ?>
