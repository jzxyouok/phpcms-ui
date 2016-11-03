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
				<form name="myform" class="am-form" id="myform"
					action="?m=admin&c=category&a=add" method="post">
					<div class="am-tabs" data-am-tabs>
						<ul class="am-tabs-nav am-nav am-nav-tabs">
							<li class="am-active"><a href="#tab1">
		  <?php echo L('catgory_basic');?></a></li>
							<li><a href="#tab2"> <?php echo L('catgory_createhtml');?></a></li>
							<li><a href="#tab3"> <?php echo L('catgory_template');?></a></li>
							<li><a href="#tab4"> <?php echo L('catgory_seo');?></a></li>
							<li><a href="#tab5"> <?php echo L('catgory_private');?></a></li>
							<li><a href="#tab6"> <?php echo L('catgory_readpoint');?></a></li>
						</ul>
						<div class="am-tabs-bd">
							<div class="am-tab-panel am-fade am-in am-active" id="tab1">
								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('add_category_types');?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<input type='radio' name='addtype' value='0' checked
											id="normal_addid"> <?php echo L('normal_add');?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='addtype' value='1'
											onclick="$('#catdir_tr').html(' ');$('#normal_add').html(' ');$('#normal_add').css('display','none');$('#batch_add').css('display','');$('#normal_addid').attr('disabled','true');this.disabled='true'"> <?php echo L('batch_add');?></div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('select_model')?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
            		 <?php
            $model_datas = array();
            foreach ($models as $_k => $_v) {
                if ($_v['siteid'] != $this->siteid)
                    continue;
                $model_datas[$_v['modelid']] = $_v['name'];
            }
            echo form::select($model_datas, $modelid, 'name="info[modelid]" id="modelid" onchange="change_tpl(this.value)"', L('select_model'));
            ?></div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>


								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('parent_category')?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
            		 <?php echo form::select_category('category_content_'.$this->siteid,$parentid,'name="info[parentid]" id="parentid"',L('please_select_parent_category'),0,-1);?></div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('catname')?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<span id="normal_add"><input type="text" name="info[catname]"
											id="catname" class="input-text" value=""></span> <span
											id="batch_add" style="display: none">
											<table width="100%" class="sss">
												<tr>
													<td width="310"><textarea name="batch_add" maxlength="255"
															style="width: 300px; height: 60px;"></textarea></td>
													<td align="left">
        <?php echo L('batch_add_tips');?>
 </td>
												</tr>
											</table>
										</span>
									</div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('catdir')?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<input type="text" name="info[catdir]" id="catdir"
											class="am-input-sm" value="">
									</div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>


								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('catgory_img')?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
            	<?php echo form::images('info[image]', 'image', $image, 'content');?></div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('description')?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<textarea name="info[description]" maxlength="255"
											style="width: 300px; height: 60px;"><?php echo $description;?></textarea>
									</div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('workflow');?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
            <?php

            $workflows = getcache('workflow_' . $this->siteid, 'commons');
            if ($workflows) {
                $workflows_datas = array();
                foreach ($workflows as $_k => $_v) {
                    $workflows_datas[$_v['workflowid']] = $_v['workname'];
                }
                echo form::select($workflows_datas, '', 'name="setting[workflowid]"', L('catgory_not_need_check'));
            } else {
                echo '<input type="hidden" name="setting[workflowid]" value="">';
                echo L('add_workflow_tips');
            }
            ?></div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
										<?php echo L('ismenu');?>：
									</div>
									<div class="am-u-sm-8 am-u-md-4">
										<input type='radio' name='info[ismenu]' value='1' checked> <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
	  									<input type='radio' name='info[ismenu]' value='0'> <?php echo L('no');?>
	  								</div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

							</div>
							<div class="am-tab-panel am-fade" id="tab2">

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('html_category');?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<input type='radio' name='setting[ishtml]' value='1'
											<?php if($setting['ishtml']) echo 'checked';?>
											onClick="$('#category_php_ruleid').css('display','none');$('#category_html_ruleid').css('display','');$('#tr_domain').css('display','');"> <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[ishtml]' value='0'
											<?php if(!$setting['ishtml']) echo 'checked';?>
											onClick="$('#category_php_ruleid').css('display','');$('#category_html_ruleid').css('display','none');$('#tr_domain').css('display','none');"> <?php echo L('no');?></div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('html_show');?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<input type='radio' name='setting[content_ishtml]' value='1'
											<?php if($setting['content_ishtml']) echo 'checked';?>
											onClick="$('#show_php_ruleid').css('display','none');$('#show_html_ruleid').css('display','')"> <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[content_ishtml]' value='0'
											<?php if(!$setting['content_ishtml']) echo 'checked';?>
											onClick="$('#show_php_ruleid').css('display','');$('#show_html_ruleid').css('display','none')"> <?php echo L('no');?></div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('category_urlrules');?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<div id="category_php_ruleid" style="display:<?php if($setting['ishtml']) echo 'none';?>">
	<?php
echo form::urlrule('content', 'category', 0, $setting['category_ruleid'], 'name="category_php_ruleid"');
?>
	</div>
										<div id="category_html_ruleid" style="display:<?php if(!$setting['ishtml']) echo 'none';?>">
	<?php
echo form::urlrule('content', 'category', 1, $setting['category_ruleid'], 'name="category_html_ruleid"');
?>
	</div>
									</div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('show_urlrules');?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<div id="show_php_ruleid" style="display:<?php if($setting['content_ishtml']) echo 'none';?>">
	  <?php
echo form::urlrule('content', 'show', 0, $setting['category_ruleid'], 'name="show_php_ruleid"');
?>
	</div>
										<div id="show_html_ruleid" style="display:<?php if(!$setting['content_ishtml']) echo 'none';?>">
	  <?php
echo form::urlrule('content', 'show', 1, $setting['category_ruleid'], 'name="show_html_ruleid"');
?>
	</div>
									</div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>

								<div class="am-g am-margin-top">
									<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('create_to_rootdir');?>： </div>
									<div class="am-u-sm-8 am-u-md-4">
										<input type='radio' name='setting[create_to_html_root]'
											value='1'
											<?php if($setting['create_to_html_root']) echo 'checked';?>> <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
	  <input type='radio' name='setting[create_to_html_root]' value='0'
											<?php if(!$setting['create_to_html_root']) echo 'checked';?>> <?php echo L('no');?>
	  （<?php echo L('create_to_rootdir_tips');?>）</div>
									<div class="am-hide-sm-only am-u-md-6">*必填</div>
								</div>


							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('domain')?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<input type="text" name="info[url]" id="url"
										class="am-input-sm" size="50" value="">
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>
						</div>

						<div class="am-tab-panel am-fade" id="tab3">
							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        			<?php echo L('available_styles');?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
                    <?php echo form::select($template_list, $setting['template_list'], 'name="setting[template_list]" id="template_list" onchange="load_file_list(this.value)"', L('please_select'))?></div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>
							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        			<?php echo L('category_index_tpl')?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<div id="category_template"></div>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>

							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        			<?php echo L('category_list_tpl')?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<div id="list_template"></div>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>
							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        			<?php echo L('content_tpl')?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<div id="show_template"></div>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>

						</div>
						<div class="am-tab-panel am-fade" id="tab4">
							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        			<?php echo L('meta_title');?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<input name='setting[meta_title]' type='text' id='meta_title'
										value='<?php echo $setting['meta_title'];?>' size='60'
										maxlength='60'>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>

							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        				<?php echo L('meta_keywords');?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<textarea name='setting[meta_keywords]' id='meta_keywords'
										style="width: 90%; height: 40px"><?php echo $setting['meta_keywords'];?></textarea>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>

							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        				<?php echo L('meta_description');?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<textarea name='setting[meta_description]'
										id='meta_description' style="width: 90%; height: 50px"><?php echo $setting['meta_description'];?></textarea>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>
						</div>
						<div class="am-tab-panel am-fade" id="tab5">
							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
            				<?php echo L('role_private')?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<table width="100%" class="table-list">
										<thead>
											<tr>
												<th align="left"><?php echo L('role_name');?></th>
												<th><?php echo L('view');?></th>
												<th><?php echo L('add');?></th>
												<th><?php echo L('edit');?></th>
												<th><?php echo L('delete');?></th>
												<th><?php echo L('listorder');?></th>
												<th><?php echo L('push');?></th>
												<th><?php echo L('move');?></th>
											</tr>
										</thead>
										<tbody>
				<?php
    $roles = getcache('role', 'commons');
    foreach ($roles as $roleid => $rolrname) {
        $disabled = $roleid == 1 ? 'disabled' : '';
        ?>
		  		<tr>
												<td><?php echo $rolrname?></td>
												<td align="center"><input type="checkbox"
													name="priv_roleid[]" <?php echo $disabled;?>
													value="init,<?php echo $roleid;?>"></td>
												<td align="center"><input type="checkbox"
													name="priv_roleid[]" <?php echo $disabled;?>
													value="add,<?php echo $roleid;?>"></td>
												<td align="center"><input type="checkbox"
													name="priv_roleid[]" <?php echo $disabled;?>
													value="edit,<?php echo $roleid;?>"></td>
												<td align="center"><input type="checkbox"
													name="priv_roleid[]" <?php echo $disabled;?>
													value="delete,<?php echo $roleid;?>"></td>
												<td align="center"><input type="checkbox"
													name="priv_roleid[]" <?php echo $disabled;?>
													value="listorder,<?php echo $roleid;?>"></td>
												<td align="center"><input type="checkbox"
													name="priv_roleid[]" <?php echo $disabled;?>
													value="push,<?php echo $roleid;?>"></td>
												<td align="center"><input type="checkbox"
													name="priv_roleid[]" <?php echo $disabled;?>
													value="move,<?php echo $roleid;?>"></td>
											</tr>
			  <?php }?>

			 </tbody>
									</table>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>

							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        				<?php echo L('group_private')?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<table width="100%" class="table-list">
										<thead>
											<tr>
												<th align="left"><?php echo L('group_name');?></th>
												<th><?php echo L('allow_vistor');?></th>
												<th><?php echo L('allow_contribute');?></th>
											</tr>
										</thead>
										<tbody>
			<?php
$group_cache = getcache('grouplist', 'member');
foreach ($group_cache as $_key => $_value) {
    if ($_value['groupid'] == 1)
        continue;
    ?>
		  		<tr>
												<td><?php echo $_value['name'];?></td>
												<td align="center"><input type="checkbox"
													name="priv_groupid[]"
													value="visit,<?php echo $_value['groupid'];?>"></td>
												<td align="center"><input type="checkbox"
													name="priv_groupid[]"
													value="add,<?php echo $_value['groupid'];?>"></td>
											</tr>
			<?php }?>
			 </tbody>
									</table>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>
						</div>

						<div class="am-tab-panel am-fade" id="tab6">
							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        				<?php echo L('contribute_add_point');?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<input name='setting[presentpoint]' type='text' value='1'
										size='5' maxlength='5' style='text-align: center'>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>
							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        				<?php echo L('default_readpoint');?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<input name='setting[defaultchargepoint]' type='text' value='0'
										size='4' maxlength='4' style='text-align: center'> <select
										name="setting[paytype]"><option value="0"><?php echo L('readpoint');?></option>
										<option value="1"><?php echo L('money');?></option></select> <?php echo L('readpoint_tips');?>
					</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>

							<div class="am-g am-margin-top">
								<div class="am-u-sm-4 am-u-md-2 am-text-right">
        				<?php echo L('repeatchargedays');?>： </div>
								<div class="am-u-sm-8 am-u-md-4">
									<input name='setting[repeatchargedays]' type='text' value='1'
										size='4' maxlength='4' style='text-align: center'> <?php echo L('repeat_tips');?>&nbsp;&nbsp;
        <font color="red"><?php echo L('repeat_tips2');?></font>
								</div>
								<div class="am-hide-sm-only am-u-md-6">*必填</div>
							</div>

						</div>
					</div>
					<div class="am-margin">
						<input name="catid" type="hidden" value="<?php echo $catid;?>"> <input
							name="pc_hash" type="hidden"
							value="<?php echo $_SESSION['pc_hash']?>"> <input name="dosubmit"
							type="submit" value="<?php echo L('submit')?>"
							class="am-btn am-btn-primary am-btn-md">
					</div>
				</form>
			</div>
	<script language="JavaScript">
		<!--
		window.top.$('#display_center_id').css('display','none');
		function change_tpl(modelid) {
			if(modelid) {
				$.getJSON('?m=admin&c=category&a=public_change_tpl&modelid='+modelid, function(data){$('#template_list').val(data.template_list);$('#category_template').html(data.category_template);$('#list_template').html(data.list_template);$('#show_template').html(data.show_template);});
			}
		}
		function load_file_list(id) {
			if(id=='') return false;
			$.getJSON('?m=admin&c=category&a=public_tpl_file_list&style='+id+'&catid=<?php echo $parentid?>', function(data){$('#category_template').html(data.category_template);$('#list_template').html(data.list_template);$('#show_template').html(data.show_template);});
		}
		<?php if($modelid) echo "change_tpl($modelid)";?>
		//-->
	</script>
<?php include $this->admin_tpl('footer');?>