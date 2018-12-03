<?php /*a:2:{s:71:"D:\phpStudy\PHPTutorial\WWW\ptls\application\admin\view\menu\index.html";i:1543828512;s:73:"D:\phpStudy\PHPTutorial\WWW\ptls\application\admin\view\index_layout.html";i:1543828512;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>YZNCMS后台管理系统</title>
    <meta name="author" content="YZNCMS">
    <link rel="stylesheet" href="/ptls/public/static/layui/css/layui.css">
    <link rel="stylesheet" href="/ptls/public/static/admin/css/admin.css">
    <link rel="stylesheet" href="/ptls/public/static/admin/font/iconfont.css">
    <script src="/ptls/public/static/layui/layui.js"></script>
    <script src="/ptls/public/static/jquery/jquery.min.js"></script>
<script type="text/javascript">
//全局变量
var GV = {
    'image_upload_url': '<?php echo !empty($image_upload_url) ? htmlentities($image_upload_url) :  url("attachment/attachments/upload", ["dir" => "images", "module" => request()->module()]); ?>',
    'WebUploader_swf': '/ptls/public/static/webuploader/Uploader.swf',
    'upload_check_url': '<?php echo !empty($upload_check_url) ? htmlentities($upload_check_url) :  url("attachment/Attachments/check"); ?>',
};
</script>
</head>
<body class="childrenBody">
    
<div class="layui-card">
    <div class="layui-card-header">菜单管理</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <table class="layui-hide" id="table" lay-filter="table"></table>
            <script type="text/html" id="toolbarDemo">
                <div class="layui-btn-container">
                <a class="layui-btn layui-btn-sm" href="<?php echo url('admin/menu/add'); ?>">新增后台菜单</a>
              </div>
            </script>
            <script type="text/html" id="barTool">
                <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
                <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="add">添加</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
            </script>
        </div>
    </div>
</div>

    
<script>
layui.use('table', function() {
    var table = layui.table,
        $ = layui.$;
    table.render({
        elem: '#table',
        toolbar: '#toolbarDemo',
        url: '<?php echo url("admin/menu/index"); ?>',
        cols: [
            [
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
                { field: 'id', width: 70, title: 'ID' },
                { field: 'title', title: '菜单名称' },
                { field: 'status', title: '状态', templet: '<div>{{#  if(d.status){ }} 显示 {{#  } else { }} <font color="#FF0000">隐藏</font> {{#  } }} </div>' },
                { fixed: 'right', width: 160, title: '操作', toolbar: '#barTool' }
            ]
        ],
    });
    $('#Table-Refresh').on('click', function() {
        table.reload("table");
    });

    //监听单元格编辑
    table.on('edit(table)', function(obj) {
        var value = obj.value,data = obj.data;
        $.post('<?php echo url("menu/listorder"); ?>', { 'id': data.id,'value':value }, function(data) {
            if (data.code == 1) {
                layer.msg(data.msg);
            }else{
                layer.msg(data.msg);
            }

        })
    });

    //监听行工具事件
    table.on('tool(table)', function(obj) {
        var data = obj.data;
        //console.log(obj);
        if (obj.event === 'del') {
            layer.confirm('确定删除这条数据？', { icon: 3, title: '提示' }, function(index) {
                layer.close(index);
                $.post('<?php echo url("menu/delete"); ?>', { 'id': data.id }, function(data) {
                    if (data.code == 1) {
                        if (data.url) {
                            layer.msg(data.msg + ' 页面即将自动跳转~');
                        } else {
                            layer.msg(data.msg);
                        }
                        setTimeout(function() {
                            if (data.url) {
                                location.href = data.url;
                            } else {
                                location.reload();
                            }
                        }, 1500);
                    } else {
                        layer.msg(data.msg);
                        setTimeout(function() {
                            if (data.url) {
                                location.href = data.url;
                            }
                        }, 1500);
                    }

                });
            });
        } else if (obj.event === 'add') {
            window.open('<?php echo url("menu/add"); ?>' + "?parentid=" + data.id, '_self')

        } else if (obj.event === 'edit') {
            window.open('<?php echo url("menu/edit"); ?>' + "?id=" + data.id, '_self')
        }
    });
});
</script>

</body>

</html>