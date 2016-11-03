<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
include $this->admin_tpl('left');
?>
<div class="admin-content">
	<div class="admin-content-body">
		<div class="am-cf am-padding am-padding-bottom-0">
			<div class="am-fl am-cf">
				<strong class="am-text-primary am-text-lg">编辑用户</strong> / <small>User</small>
			</div>
		</div>
		<hr>
		<div class="am-g">
			<div class="am-u-sm-12 am-u-md-6">
				<div class="am-btn-toolbar">
					<div class="am-btn-group am-btn-group-md">
						<a href="?m=admin&c=admin_manage&a=add&pc_hash=<?php echo $_SESSION['pc_hash']?>" class="am-btn am-btn-default">
							<span class="am-icon-plus"></span> 新增管理员
						</a>
					</div>
				</div>
			</div>
			<form class="am-form">
				<table class="am-table am-table-hover table-main">
					<thead>
						<tr>
							<th><?php echo L('userid') ?></th>
							<th><?php echo L('username') ?></th>
							<th><?php echo L('userinrole') ?></th>
							<th><?php echo L('lastloginip') ?></th>
							<th><?php echo L('lastlogintime') ?></th>
							<th><?php echo L('email') ?></th>
							<th><?php echo L('realname') ?></th>
							<th><?php echo L('operations_manage') ?></th>
						</tr>
					</thead>
					<tbody>
                        <?php $admin_founders = explode(',', pc_base::load_config('system', 'admin_founders')); ?>
                        <?php
                        if (is_array($infos)) {
                            foreach ($infos as $info) {
                                ?>
                         <tr>
							<td><?php echo $info['userid'] ?></td>
							<td><?php echo $info['username'] ?></td>
							<td><?php echo $roles[$info['roleid']] ?></td>
							<td><?php echo $info['lastloginip'] ?></td>
							<td><?php echo $info['lastlogintime'] ? date('Y-m-d H:i:s', $info['lastlogintime']) : '' ?></td>
							<td><?php echo $info['email'] ?></td>
							<td><?php echo $info['realname'] ?></td>
							<td>
							<a href="?m=admin&c=admin_manage&a=edit&userid=<?php echo $info['userid']?>&pc_hash=<?php echo $_SESSION['pc_hash']?>"><?php echo L('edit') ?></a>
                                        <?php if (!in_array($info['userid'], $admin_founders)) { ?>
                                            <a
								href="javascript:confirmurl('?m=admin&c=admin_manage&a=delete&userid=<?php echo $info['userid'] ?>', '<?php echo L('admin_del_cofirm') ?>')"><?php echo L('delete') ?></a>
                                        <?php } else { ?>
                                            <font color="#cccccc"><?php echo L('delete') ?></font>
                                        <?php } ?> | <a
								href="javascript:void(0)"
								onclick="card(<?php echo $info['userid'] ?>)"><?php echo L('ht_card') ?></a>
							</td>
						</tr>
                        <?php
                            }
                        }
                        ?>
                        </tbody>
				</table>
				<div id="pages"><?php echo $pages ?></div>
			</form>
		</div>
	</div>
<?php echo include $this->admin_tpl('footer'); ?>
