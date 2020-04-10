<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:47:"./application/admin/template/archives\index.htm";i:1573115083;}*/ ?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>内容管理</title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon1111.ico" media="screen"/>
    <!-- <link rel="stylesheet" href="/public/plugins/ztree/css/amazeui.min.css"> -->
    <link rel="stylesheet" href="/public/plugins/ztree/css/iframe.css?v=<?php echo $version; ?>">
    <link rel="stylesheet" href="/public/plugins/ztree/css/zTreeStyle/zTreeStyle.css?v=<?php echo $version; ?>" type="text/css">
    <link href="/public/static/admin/font/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/public/static/admin/css/left_nav_tree.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/public/static/admin/js/jquery.js"></script>
    <script src="/public/static/admin/js/jquery.layout-latest.min.js"></script>
    <script type="text/javascript" src="/public/plugins/ztree/js/jquery.ztree.core.min.js"></script>
    <script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js"></script>
    <!--[if lt IE 9]>
    <script src="/public/static/admin/js/html5shiv.js"></script>
    <script src="/public/static/admin/js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        .ztree li{
            line-height: 22px;
        }
        .ztree .node_name{
            font-size: 13px !important;
           
        }
    </style>

    <script type="text/javascript">
        var myLayout;
        $(document).ready(function () {
            myLayout = $("body").layout({
            /*  全局配置 */
                closable:                   true    /* 是否显示点击关闭隐藏按钮*/
            ,   resizable:                  true    /* 是否允许拉动*/
            ,   maskContents:               true    /* 加入此参数，框架内容页就可以拖动了*/
            /*  顶部配置 */
            ,   north__spacing_open:        0       /* 顶部边框大小*/
            /*  底部配置 */
            ,   south__spacing_open:        0       /* 底部边框大小*/
            /*  some pane-size settings*/
            ,   west__minSize:              200     /*左侧最小宽度*/
            ,   west__maxSize:              500     /*左侧最大宽度*/
            /*  左侧配置 */
            ,   west__slidable:             false
            ,   west__animatePaneSizing:    false
            ,   west__fxSpeed_size:         "slow"  /* 'fast' animation when resizing west-pane*/
            ,   west__fxSpeed_open:         1000    /* 1-second animation when opening west-pane*/
            ,   west__fxSettings_open:      { easing: "easeOutBounce" } // 'bounce' effect when opening*/
            ,   west__fxName_close:         "none"  /* NO animation when closing west-pane*/
            ,   stateManagement__enabled:   false   /*是否读取cookies*/
            ,   showDebugMessages:          false 
            }); 
        });

        var zNodes = <?php echo $zNodes; ?>;
        var setting = {
            view:{
                dblClickExpand:false
                ,showLine:true
                 ,showIcon: false
            },
            data:{
                simpleData:{
                    enable:true
                }
            },
            callback:{
                beforeExpand:beforeExpand
                ,onExpand:onExpand
                ,onClick:onClick
            }
        };
        var curExpandNode=null;
        function beforeExpand(treeId,treeNode) {
            var pNode=curExpandNode?curExpandNode.getParentNode():null;
            var treeNodeP=treeNode.parentTId?treeNode.getParentNode():null;
            var zTree=$.fn.zTree.getZTreeObj("tree");
            for(var i=0,l=!treeNodeP?0:treeNodeP.children.length;i<l; i++){
                if(treeNode!==treeNodeP.children[i]){zTree.expandNode(treeNodeP.children[i],false);}
            };
            while (pNode){
                if(pNode===treeNode){break;}
                pNode=pNode.getParentNode();
            };
            if(!pNode){singlePath(treeNode);}
        };
        function singlePath(newNode) {
            if (newNode === curExpandNode) return;
            if (curExpandNode && curExpandNode.open==true) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (newNode.parentTId === curExpandNode.parentTId) {
                    zTree.expandNode(curExpandNode, false);
                } else {
                    var newParents = [];
                    while (newNode) {
                        newNode = newNode.getParentNode();
                        if (newNode === curExpandNode) {
                            newParents = null;
                            break;
                        } else if (newNode) {
                            newParents.push(newNode);
                        }
                    }
                    if (newParents!=null) {
                        var oldNode = curExpandNode;
                        var oldParents = [];
                        while (oldNode) {
                            oldNode = oldNode.getParentNode();
                            if (oldNode) {
                                oldParents.push(oldNode);
                            }
                        }
                        if (newParents.length>0) {
                            zTree.expandNode(oldParents[Math.abs(oldParents.length-newParents.length)-1], false);
                        } else {
                            zTree.expandNode(oldParents[oldParents.length-1], false);
                        }
                    }
                }
            }
            curExpandNode = newNode;
        };

        function onExpand(event,treeId,treeNode){curExpandNode=treeNode;};
        
        function onClick(e,treeId,treeNode){
            var zTree=$.fn.zTree.getZTreeObj("tree");
            zTree.expandNode(treeNode,null,null,null,true);
        }

        $(function(){
            $.fn.zTree.init($("#tree"),setting,zNodes);
            $(".ui-layout-north li:first-child").click();
        });
    </script>

    <script type="text/javascript">
        function quick_release()
        {
            //iframe窗
            layer.open({
                type: 2,
                title: '快捷发布文档',
                fixed: true, //不固定
                shadeClose: false,
                shade: 0.3,
                maxmin: true, //开启最大化最小化按钮
                area: ['600px', '520px'],
                content: "//<?php echo \think\Request::instance()->host(); ?><?php echo \think\Request::instance()->baseFile(); ?>?m=admin&c=Archives&a=release&iframe=1&lang=<?php echo \think\Request::instance()->param('lang'); ?>"
            });
        }
    </script>
</head>
<body>
    <div class="ui-layout-west">
<!--        <h3><a href="javascript:void(0);" onclick="quick_release();"><i class="fa fa-chevron-left"></i>快捷发布文档</a></h3>-->
        <div id="tree" class="ztree"></div>
    </div>
    <div class="ui-layout-center"><iframe name="content_body" id="content_body" src="//<?php echo \think\Request::instance()->host(); ?><?php echo \think\Request::instance()->baseFile(); ?>?m=admin&c=Archives&a=index_archives&lang=<?php echo \think\Request::instance()->param('lang'); ?>" width="100%" height="100%" frameborder="0"></iframe></div>
</body>
</html>