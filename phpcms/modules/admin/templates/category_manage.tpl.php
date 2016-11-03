<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
include $this->admin_tpl('left');
?>
<div class="admin-content">
	<div class="admin-content-body">
		<div class="am-cf am-padding am-padding-bottom-0">
			<div class="am-fl am-cf">
				<strong class="am-text-primary am-text-lg">菜单列表</strong> / <small>category</small>
			</div>
		</div>
		<hr>
		<div class="am-g">
			<div class="am-u-sm-12">
				<form name="myform" class="am-form"
					action="?m=admin&c=category&a=listorder" method="post">
					<table class="am-table am-table-hover table-main">
						<thead>
							<tr>
								<th><?php echo L('listorder');?></th>
								<th>catid</th>
								<th><?php echo L('catname');?></th>
								<th><?php echo L('category_type');?></th>
								<th><?php echo L('modelname');?></th>
								<th><?php echo L('items');?></th>
								<th><?php echo L('vistor');?></th>
								<th><?php echo L('domain_help');?></th>
								<th><?php echo L('operations_manage');?></th>
							</tr>
						</thead>
						<tbody>
    <?php echo $categorys;?>
    </tbody>
					</table>

					<div class="btn">
						<input type="hidden" name="pc_hash"
							value="<?php echo $_SESSION['pc_hash'];?>" /> <input
							type="submit" class="am-btn am-btn-primary am-btn-md" name="dosubmit"
							value="<?php echo L('listorder')?>" />
					</div>

			</div>
		</div>
	</div>
	</form>
<?php include $this->admin_tpl('footer');?>
