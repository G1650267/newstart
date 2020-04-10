<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:33:"./weapp/Contact/template/show.htm";i:1571728724;}*/ ?>
<script language="javascript" src="/weapp/Contact/template/skin/js/contact.js"></script>
<link rel="stylesheet" type="text/css" href="/weapp/Contact/template/skin/css/contact.css">
<div class="main-im" style="top: <?php echo (isset($contact['data']['top_height']) && ($contact['data']['top_height'] !== '')?$contact['data']['top_height']:'150'); ?>px; z-index: 20190828;">
    <div id="open_im" class="open-im" style="display: <?php if(empty($contact['data']['is_open']) || (($contact['data']['is_open'] instanceof \think\Collection || $contact['data']['is_open'] instanceof \think\Paginator ) && $contact['data']['is_open']->isEmpty())): ?>block<?php else: ?>none<?php endif; ?>;">&nbsp;</div>
    <div class="im_main" id="im_main" style="display: <?php if(!(empty($contact['data']['is_open']) || (($contact['data']['is_open'] instanceof \think\Collection || $contact['data']['is_open'] instanceof \think\Paginator ) && $contact['data']['is_open']->isEmpty()))): ?>block<?php else: ?>none<?php endif; ?>;">
        <div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭">&nbsp;</a></div>
        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo (isset($contact['data']['qq_number']) && ($contact['data']['qq_number'] !== '')?$contact['data']['qq_number']:'10000'); ?>&amp;site=qq&amp;menu=yes" target="_blank"
           class="im-qq qq-a" title="在线QQ客服">
            <div class="qq-container"></div>
            <div class="qq-hover-c"><img class="img-qq" src="/weapp/Contact/template/skin/images/qq.png"></div>
            <span> QQ在线咨询</span></a>
        <div class="im-tel">
            <div><?php echo (isset($contact['data']['description_first']) && ($contact['data']['description_first'] !== '')?$contact['data']['description_first']:'售前咨询'); ?></div>
            <div class="tel-num"><?php echo (isset($contact['data']['telephone_first']) && ($contact['data']['telephone_first'] !== '')?$contact['data']['telephone_first']:'020-00000000'); ?></div>
            <div><?php echo (isset($contact['data']['description_second']) && ($contact['data']['description_second'] !== '')?$contact['data']['description_second']:'售后服务'); ?></div>
            <div class="tel-num"><?php echo (isset($contact['data']['telephone_second']) && ($contact['data']['telephone_second'] !== '')?$contact['data']['telephone_second']:'020-88888888'); ?></div>
        </div>
        <div class="im-footer" style="position:relative">
            <div class="weixing-container">
                <div class="weixing-show" <?php if(!(empty($contact['data']['is_open']) || (($contact['data']['is_open'] instanceof \think\Collection || $contact['data']['is_open'] instanceof \think\Paginator ) && $contact['data']['is_open']->isEmpty()))): ?>style="display: none";<?php else: ?>style="display: block";<?php endif; ?>">
                    <div class="weixing-txt">微信扫一扫<br><?php echo (isset($contact['data']['wechat']) && ($contact['data']['wechat'] !== '')?$contact['data']['wechat']:'关注公众号'); ?></div>
                    <img class="weixing-ma" src="<?php echo (isset($contact['data']['wechat_logo']) && ($contact['data']['wechat_logo'] !== '')?$contact['data']['wechat_logo']:'/weapp/Contact/template/skin/images/weixin.png'); ?>">
                    <div class="weixing-sanjiao"></div>
                    <div class="weixing-sanjiao-big"></div>
                </div>
            </div>
            <div class="go-top"><a href="javascript:;" title="返回顶部"></a></div>
            <div style="clear:both"></div>
        </div>
    </div>
</div>