<?php
defined('IN_ADMIN') or exit('No permission resources.');
include PC_PATH.'modules'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'header.tpl.php';
?>	
			<div class="am-u-sm-12">
				<div class="am-u-sm-6">
						<h6><?php echo L('personal_information')?></h6>
						<table class="am-table am-table-bd am-table-bdrs am-table-hover">
                                <tbody>
                                    <tr>
                                        <td><?php echo L('main_hello')?></td>
                                        <td><?php echo $admin_username?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo L('main_role')?></td>
                                        <td><?php echo $rolename?></td>
                                    </tr>
                                    <tr>
                                       
                                        <td><?php echo L('main_last_logintime')?></td>
                                        <td><?php echo date('Y-m-d H:i:s',$logintime)?></td>
                                    </tr>
                                    <tr>
                                       
                                        <td><?php echo L('main_last_loginip')?></td>
                                        <td><?php echo $loginip?></td>
                                    </tr>
                                </tbody>
                         </table>
				</div>
				<div class="am-u-sm-6">
						<h6><?php echo L('main_shortcut')?></h6>
						<table class="am-table am-table-bd am-table-bdrs am-table-hover">
                                <tbody>
                                    
                                </tbody>
                         </table>
				</div>
			</div>
		<div class="am-u-sm-12">
				<div class="am-u-sm-6">
						<h6><?php echo L('main_sysinfo')?></h6>
						<table class="am-table am-table-bd am-table-bdrs am-table-hover">
                                <tbody>
                                    <tr>
                                        
                                        <td><?php echo L('main_version')?></td>
                                        <td><?php echo PC_VERSION?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td><?php echo L('main_os')?></td>
                                        <td><?php echo $sysinfo['os']?></td>
                                    </tr>
                                    <tr>
                                       
                                        <td><?php echo L('main_web_server')?></td>
                                        <td><?php echo $sysinfo['web_server']?></td>
                                    </tr>
                                    <tr>
                                       
                                        <td><?php echo L('main_sql_version')?></td>
                                        <td><?php echo $sysinfo['mysqlv']?></td>
                                    </tr>
                                    <tr>
                                       
                                        <td><?php echo L('main_upload_limit')?></td>
                                        <td><?php echo $sysinfo['fileupload']?></td>
                                    </tr>
                                </tbody>
                         </table>
				</div>
				<div class="am-u-sm-6">
						<h6><?php echo L('main_product_team')?></h6>
						<table class="am-table am-table-bd am-table-bdrs am-table-hover">
                                <tbody>
                                    <tr>
                                        
                                        <td><?php echo L('main_copyright')?></td>
                                        <td><?php echo $product_copyright?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td><?php echo L('main_product_dev')?></td>
                                        <td><?php echo $programmer;?></td>
                                    </tr>
                                    <tr>
                                       
                                        <td><?php echo L('main_product_ui')?><?php echo $designer;?></td>
                                        <td><?php echo $designer;?></td>
                                    </tr>
                                    <tr>
                                       
                                        <td><?php echo L('main_product_qq')?></td>
                                        <td>718349985</td>
                                    </tr>
                                    <tr>
                                       
                                        <td><?php echo L('main_product_sales')?></td>
                                        <td>1091464203</td>
                                    </tr>
                                </tbody>
                         </table>
				</div>
		</div>

