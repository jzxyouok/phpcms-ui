<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2016 <?php echo L('copyright'); ?></p>
</footer>
</div>
<!-- content end -->
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?php echo ADMIN_PATH_JS?>amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo ADMIN_PATH_JS?>jquery.min.js"></script>
<!--<![endif]-->
<script src="<?php echo ADMIN_PATH_JS?>amazeui.min.js"></script>
<script src="<?php echo ADMIN_PATH_JS?>app.js"></script>
</body>
</html>