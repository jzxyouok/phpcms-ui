<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
include $this->admin_tpl('left');
?>
    <div class="admin-content">
    <div class="admin-content-body">
    <div class="am-cf am-padding am-padding-bottom-0">
        <div class="am-fl am-cf">
            <strong class="am-text-primary am-text-lg">模版列表</strong> /
            <small>list</small>
        </div>
    </div>
    <hr>
    <div class="am-g">
        <div class="am-u-sm-12">
            <form class="am-form">
                <table class="am-table am-table-hover table-main">
                    <thead>
                    <tr>
                        <th width="80">Siteid</th>
                        <th><?php echo L('site_name') ?></th>
                        <th><?php echo L('site_dirname') ?></th>
                        <th><?php echo L('site_domain') ?></th>
                        <th align="center"><?php echo L('godaddy') ?></th>
                        <th width="150"><?php echo L('operations_manage') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (is_array($list)) :
                        foreach ($list as $v) :
                            ?>
                            <tr>
                                <td width="80" align="center"><?php echo $v['siteid'] ?></td>
                                <td align="center"><?php echo $v['name'] ?></td>
                                <td align="center"><?php echo $v['dirname'] ?></td>
                                <td align="center"><?php echo $v['domain'] ?></td>
                                <td align="center"><?php if ($v['siteid'] != 1) { ?><?php echo pc_base::load_config('system', 'html_root') ?>/<?php echo $v['dirname'];
                                    } else {
                                        echo '/';
                                    } ?></td>
                                <td align="center">
                                    <a href="?m=admin&c=site&a=edit&siteid=<?php echo $v['siteid']; ?>&pc_hash=&pc_hash=<?php echo $_SESSION['pc_hash'] ?>"><?php echo L('edit') ?></a></a>
                                    <a href="?m=admin&c=site&a=del&siteid=<?php echo $v['siteid'] ?>&pc_hash=&pc_hash=<?php echo $_SESSION['pc_hash'] ?>"
                                       onclick="return confirm('<?php echo new_addslashes(new_html_special_chars(L('confirm', array('message' => $v['name'])))) ?>')"><?php echo L('delete') ?></a>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>

        </div>
    </div>
    <div id="pages"><?php echo $pages ?></div>
<?php include $this->admin_tpl('footer'); ?>