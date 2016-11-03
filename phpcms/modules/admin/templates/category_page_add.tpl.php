<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
include $this->admin_tpl('left');
?>

<div class="admin-content">
<div class="admin-content-body">
  <div class="am-cf am-padding am-padding-bottom-0">
    <div class="am-fl am-cf"> <strong class="am-text-primary am-text-lg">菜单添加</strong> / <small>category_add</small> </div>
  </div>
  <hr>
  <div class="am-g">
    <div class="am-u-sm-12">
      <form name="myform" class="am-form" id="myform" action="?m=admin&c=category&a=add&pc_hash=<?php echo $_SESSION['pc_hash']?>"
					method="post">
        <div class="am-tabs" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1"><?php echo L('catgory_basic');?></a></li>
          <li><a href="#tab2"><?php echo L('catgory_createhtml');?></a></li>
          <li><a href="#tab3"><?php echo L('catgory_template');?></a></li>
          <li><a href="#tab4"><?php echo L('catgory_seo');?></a></li>
          <li><a href="#tab5"><?php echo L('catgory_private');?></a></li>
        </ul>
        <div class="am-tabs-bd">
        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('add_category_types');?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type='radio' class="am-input-sm" name='addtype' value='0' checked
											id="normal_addid">
              <?php echo L('normal_add');?>&nbsp;&nbsp;&nbsp;&nbsp;
              <input type='radio' name='addtype' value='1'
											onclick="$('#catdir_tr').html(' ');$('#normal_add').html(' ');$('#normal_add').css('display','none');$('#batch_add').css('display','');$('#normal_addid').attr('disabled','true');this.disabled='true'">
              <?php echo L('batch_add');?> </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('parent_category')?>： </div>
            <div class="am-u-sm-8 am-u-md-4"> <?php echo form::select_category('category_content_'.$this->siteid,$parentid,'name="info[parentid]" id="parentid"',L('please_select_parent_category'),0,-1);?> </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('catname')?>： </div>
            <div class="am-u-sm-8 am-u-md-4"> <span id="normal_add">
              <input type="text" name="info[catname]" id="catname" class="am-input-sm"
												value="">
              </span> <span id="batch_add" style="display: none">
              <table width="100%" class="sss">
                <tr>
                  <td width="310"><textarea name="batch_add" maxlength="255"
																style="width: 300px; height: 60px;"></textarea></td>
                  <td align="left"><?php echo L('batch_add_tips');?></td>
                </tr>
              </table>
              </span> </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('catdir')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type="text" name="info[catdir]" id="catdir"
											class="am-input-sm" value="">
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('catgory_img')?>： </div>
            <div class="am-u-sm-8 am-u-md-4"> <?php echo form::images('info[image]', 'image', $image, 'content');?> </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('description')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <textarea name="info[description]" maxlength="255"
												style="width: 300px; height: 60px;"><?php echo $description;?></textarea>
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('ismenu');?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type='radio' name='info[ismenu]' value='1' checked>
              <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
              <input type='radio' name='info[ismenu]' value='0'>
              <?php echo L('no');?> </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
        </div>
        <div class="am-tab-panel am-fade" id="tab2">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('html_category');?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input type='radio' name='setting[ishtml]' value='1'
											<?php if($setting['ishtml']) echo 'checked';?>
											onClick="$('#category_php_ruleid').css('display','none');$('#category_html_ruleid').css('display','')">
              <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
              <input type='radio' name='setting[ishtml]' value='0'
											<?php if(!$setting['ishtml']) echo 'checked';?>
											onClick="$('#category_php_ruleid').css('display','');$('#category_html_ruleid').css('display','none')">
              <?php echo L('no');?></div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('urlrule_url');?>： </div>
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
        </div>
        <div class="am-tab-panel am-fade" id="tab3">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('available_styles');?>： </div>
            <div class="am-u-sm-8 am-u-md-4"> <?php echo form::select($template_list, $setting['template_list'], 'name="setting[template_list]" id="template_list" onchange="load_file_list(this.value)"', L('please_select'))?></div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('page_templates')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <div id="page_template"></div>
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
        </div>
        <div class="am-tab-panel am-fade" id="tab4">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('meta_title');?> </div>
            <div class="am-u-sm-8 am-u-md-4">
              <input name='setting[meta_title]' type='text'
											id='meta_title' value='<?php echo $setting['meta_title'];?>'
											size='60' maxlength='60'>
            </div>
            <div class="am-hide-sm-only am-u-md-6">针对搜索引擎设置的标题</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('meta_keywords');?> </div>
            <div class="am-u-sm-8 am-u-md-4">
              <textarea name='setting[meta_keywords]' id='meta_keywords'
												style="width: 100%; height: 50px"><?php echo $setting['meta_keywords'];?></textarea>
            </div>
            <div class="am-hide-sm-only am-u-md-6">关键字中间用半角逗号隔开</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('meta_description');?> </div>
            <div class="am-u-sm-8 am-u-md-4">
              <textarea name='setting[meta_description]'
												id='meta_description' style="width: 100%; height: 50px"><?php echo $setting['meta_description'];?></textarea>
            </div>
            <div class="am-hide-sm-only am-u-md-6">针对搜索引擎设置的网页描述</div>
          </div>
        </div>
        <div class="am-tab-panel am-fade" id="tab5">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('role_private')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <table width="100%" class="table-list">
                <thead>
                  <tr>
                    <th align="left" width="200"><?php echo L('role_name');?></th>
                    <td><?php echo L('edit');?></td>
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
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right"> <?php echo L('group_private')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <table width="100%" class="table-list">
                <thead>
                  <tr>
                    <th align="left" width="200"><?php echo L('group_name');?></th>
                    <td><?php echo L('allow_vistor');?></td>
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
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
            <div class="am-hide-sm-only am-u-md-6"></div>
          </div>
        </div>
        <div class="am-margin">
          <input name="catid" type="hidden" value="<?php echo $catid;?>">
          <input name="type" type="hidden" value="<?php echo $type;?>">
          <input name="dosubmit" type="submit" class="am-btn am-btn-primary am-btn-md" value="<?php echo L('submit')?>">
        </div>
      </form>
    </div>
  </div>
</div>
<?php include $this->admin_tpl('footer');?>
