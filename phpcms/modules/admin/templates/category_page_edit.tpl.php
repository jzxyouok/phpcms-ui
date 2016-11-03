<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
include $this->admin_tpl('left');
?>

<div class="admin-content">
<div class="admin-content-body">
  <div class="am-cf am-padding am-padding-bottom-0">
    <div class="am-fl am-cf"> <strong class="am-text-primary am-text-lg">菜单列表</strong> / <small>category</small> </div>
  </div>
  <hr>
  <div class="am-g">
    <div class="am-u-sm-12"> 
      <script type="text/javascript">
<!--
    $(function(){
        $.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
        $("#catname").formValidator({onshow:"<?php echo L('input_catname');?>",onfocus:"<?php echo L('input_catname');?>",oncorrect:"<?php echo L('input_right');?>"}).inputValidator({min:1,onerror:"<?php echo L('input_catname');?>"}).defaultPassed();
        $("#catdir").formValidator({onshow:"<?php echo L('input_dirname');?>",onfocus:"<?php echo L('input_dirname');?>"}).regexValidator({regexp:"^([a-zA-Z0-9]|[_-]){0,30}$",onerror:"<?php echo L('enter_the_correct_catname');?>"}).inputValidator({min:1,onerror:"<?php echo L('input_dirname');?>"}).ajaxValidator({type : "get",url : "",data :"m=admin&c=category&a=public_check_catdir&old_dir=<?php echo $catdir;?>",datatype : "html",cached:false,getdata:{parentid:'parentid'},async:'true',cached:false,success : function(data){ if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('catname_have_exists');?>",onwait : "<?php echo L('connecting');?>"}).defaultPassed();
    })
//-->
</script>
      <form name="myform" id="myform" class="am-form" action="?m=admin&c=category&a=edit" method="post">
        <div class="am-tabs" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"> <a href="#tab1"> 
		  <?php echo L('catgory_basic');?></a> </li>
          <li> <a href="#tab2"> <?php echo L('catgory_createhtml');?></a> </li>
          <li> <a href="#tab3"> <?php echo L('catgory_template');?></a> </li>
          <li> <a href="#tab4"> <?php echo L('catgory_seo');?></a> </li>
          <li> <a href="#tab5"> <?php echo L('catgory_private');?></a> </li>
        </ul>
        <div class="am-tabs-bd">
          <div class="am-tab-panel am-fade am-in am-active" id="tab1">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('parent_category')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
              <?php echo form::select_category('category_content_'.$this->
                                            siteid,$parentid,'name="info[parentid]" class="am-input-sm" id="parentid"',L('please_select_parent_category'),0,-1);?></div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          
		<div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('catname')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
             <input type="text" name="info[catname]" id="catname" class="input-text" value="<?php echo $catname;?>"></div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          
		<div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('catdir')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
             <input type="text" name="info[catdir]" id="catdir" class="input-text" value="<?php echo $catdir;?>"></div>
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
             <textarea name="info[description]" maxlength="255" style="width:300px;height:60px;"><?php echo $description;?></textarea></div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
 
 		<div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('ismenu');?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
             <input type='radio' name='info[ismenu]' value='1' <?php if($ismenu) echo 'checked';?>>
                  <?php echo L('yes');?> &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type='radio' name='info[ismenu]' value='0' <?php if(!$ismenu) echo 'checked';?>>
                  <?php echo L('no');?></div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>

          </div>
          <div class="am-tab-panel am-fade" id="tab2">
          
 		<div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('html_category');?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
             <input type='radio' name='setting[ishtml]' value='1' <?php if($setting['ishtml']) echo 'checked';?>
                                            onClick="$('#category_php_ruleid').css('display','none');$('#category_html_ruleid').css('display','')">
                  <?php echo L('yes');?> &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type='radio' name='setting[ishtml]' value='0' <?php if(!$setting['ishtml']) echo 'checked';?>
                                            onClick="$('#category_php_ruleid').css('display','');$('#category_html_ruleid').css('display','none')">
                  <?php echo L('no');?></div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          
 
 
  		<div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('urlrule_url');?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
             <div id="category_php_ruleid" style="display:<?php if($setting['ishtml']) echo 'none';?>
                                                ">
                    <?php
                            echo form::urlrule('content','category',0,$setting['category_ruleid'],'name="category_php_ruleid"');
                        ?>
                  </div>
                  <div id="category_html_ruleid" style="display:<?php if(!$setting['ishtml']) echo 'none';?>
                                                ">
                    <?php
                            echo form::urlrule('content','category',1,$setting['category_ruleid'],'name="category_html_ruleid"');
                        ?>
                  </div></div>
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
			<?php echo L('page_templates')?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
            	<div id="page_template"></div>
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
 
          </div>
          <div class="am-tab-panel am-fade" id="tab4">
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('meta_title');?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
            	<input name='setting[meta_title]' type='text' id='meta_title' value='<?php echo $setting['meta_title'];?>' size='60' maxlength='60'>
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('meta_keywords');?>： </div>
            <div class="am-u-sm-8 am-u-md-4">
            	<textarea name='setting[meta_keywords]' id='meta_keywords' style="width:90%;height:40px"><?php echo $setting['meta_keywords'];?></textarea>
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('meta_description');?></div>
            <div class="am-u-sm-8 am-u-md-4">
            	<textarea name='setting[meta_description]' id='meta_description' style="width:90%;height:50px"><?php echo $setting['meta_description'];?></textarea>
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
          </div>
          <div class="am-tab-panel am-fade" id="tab5">
          
          
          <div class="am-g am-margin-top">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
			<?php echo L('role_private')?>：
            </div>
            <div class="am-u-sm-8 am-u-md-4">
            	<table width="100%" class="table-list">
                    <thead>
                      <tr>
                        <th align="left" width="200"> <?php echo L('role_name');?></th>
                        <th> <?php echo L('edit');?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                                        $roles = getcache('role','commons');
                                        foreach($roles as $roleid=>
                                                        $rolrname) {
                                        $disabled = $roleid==1 ? 'disabled' : '';
                                        ?>
                      <tr>
                        <td><?php echo $rolrname?></td>
                        <td align="center"><input type="checkbox" name="priv_roleid[]" <?php echo $disabled;?>
                                                                <?php echo $this->
                                                                check_category_priv('init',$roleid);?> value="init,
                                                                <?php echo $roleid;?>" ></td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
            </div>
            <div class="am-hide-sm-only am-u-md-6">*必填</div>
          </div>
         
          </div>
        </div>
        <br>
        <input name="catid" type="hidden" value="<?php echo $catid;?>">
        <input name="type" type="hidden" value="<?php echo $type;?>">
        <input name="pc_hash" type="hidden" value="<?php echo $_SESSION['pc_hash']?>">
        <input name="dosubmit" type="submit" value="<?php echo L('submit')?>" class="am-btn am-btn-primary am-btn-md">
      </form>
    </div>
  </div>
  <!--table_form_off--> </div>
<?php include $this->
            admin_tpl('footer');?>
