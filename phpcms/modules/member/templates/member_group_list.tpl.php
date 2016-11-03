<?php defined('IN_ADMIN') or exit('No permission resources.');?>
<?php

include $this->admin_tpl('header', 'admin');
include $this->admin_tpl('left', 'admin');
?>
<div class="admin-content">
	<div class="admin-content-body">
		<div class="am-cf am-padding am-padding-bottom-0">
			<div class="am-fl am-cf">
				<strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small>
			</div>
		</div>
		<hr>
		<div class="am-g">
			 <div class="am-u-sm-12">
				<form name="myform" class="am-form" id="myform"
					action="?m=member&c=member_group&a=delete" method="post"
					onsubmit="check();return false;">
					<table class="am-table am-table-hover table-main">
						<thead>
							<tr>
								<th><input type="checkbox" value="" id="check_box"
									onclick="selectall('groupid[]');"></th>
								<th>ID</th>
								<th><?php echo L('sort')?></th>
								<th><?php echo L('groupname')?></th>
								<th><?php echo L('issystem')?></th>
								<th><?php echo L('membernum')?></th>
								<th><?php echo L('starnum')?></th>
								<th><?php echo L('pointrange')?></th>
								<th><?php echo L('allowattachment')?></th>
								<th><?php echo L('allowpost')?></th>
								<th><?php echo L('member_group_publish_verify')?></th>
								<th><?php echo L('allowsearch')?></th>
								<th><?php echo L('allowupgrade')?></th>
								<th><?php echo L('allowsendmessage')?></th>
								<th><?php echo L('operation')?></th>
							</tr>
						</thead>
						<tbody>
                            <?php
                            foreach ($member_group_list as $k => $v) {
                                ?>
                                <tr>
								<td><?php if(!$v['issystem']) {?><input
									type="checkbox" value="<?php echo $v['groupid']?>"
									name="groupid[]"><?php }?></td>
								<td><?php echo $v['groupid']?></td>
								<td><input type="text"
									name="sort[<?php echo $v['groupid']?>]" class="input-text-c"
									size="1" value="<?php echo $v['sort']?>">

								</th>
								<td title="<?php echo $v['description']?>"><?php echo $v['name']?></td>
								<td><?php echo $v['issystem'] ? L('icon_unlock') : L('icon_locked')?></td>
								<td><?php echo $v['membernum']?>

								</th>
								<td><?php echo $v['starnum']?></td>
								<td><?php echo $v['point']?></td>
								<td><?php echo $v['allowattachment'] ? L('icon_unlock') : L('icon_locked')?></td>
								<td><?php echo $v['allowpost'] ? L('icon_unlock') : L('icon_locked')?></td>
								<td><?php echo $v['allowpostverify'] ? L('icon_unlock') : L('icon_locked')?></td>
								<td><?php echo $v['allowsearch'] ? L('icon_unlock') : L('icon_locked')?></td>
								<td><?php echo $v['allowupgrade'] ? L('icon_unlock') : L('icon_locked')?></td>
								<td><?php echo $v['allowsendmessage'] ? L('icon_unlock') : L('icon_locked')?></td>
								<td><a
									href="javascript:edit(<?php echo $v['groupid']?>, '<?php echo $v['name']?>')">[<?php echo L('edit')?>]</a></td>
							</tr>
                            <?php
                            }
                            ?>
						</tbody>
					</table>

					<div class="btn">
						<label for="check_box"><?php echo L('select_all')?>/<?php echo L('cancel')?></label>
						<input type="submit" class="am-btn am-btn-primary am-btn-xs" name="dosubmit"
							value="<?php echo L('delete')?>"
							onclick="return confirm('<?php echo L('sure_delete')?>')" /> <input
							type="submit" class="am-btn am-btn-primary am-btn-xs" name="dosubmit"
							onclick="document.myform.action='?m=member&c=member_group&a=sort&pc_hash=<?php echo $_SESSION['pc_hash']?>'"
							value="<?php echo L('sort')?>" />
					</div>
					<div id="pages"><?php echo $pages?></div>

			</div>
		</div>
		</form>
		<div id="PC__contentHeight" style="display: none">160</div>
	</div>
</div>
<?php include $this->admin_tpl('footer','admin');?>