<?php /*a:3:{s:75:"D:\phpStudy\PHPTutorial\WWW\ptls\application\admin\view\config\setting.html";i:1543828512;s:73:"D:\phpStudy\PHPTutorial\WWW\ptls\application\admin\view\index_layout.html";i:1543828512;s:70:"D:\phpStudy\PHPTutorial\WWW\ptls\application\admin\view\inputItem.html";i:1543828512;}*/ ?>
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
    <div class="layui-card-body">
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($groupArray) || $groupArray instanceof \think\Collection || $groupArray instanceof \think\Paginator): $i = 0; $__LIST__ = $groupArray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="<?php if($key==$group): ?>layui-this<?php endif; ?>"><a href="<?php echo url('admin/config/setting',['group'=>$key]); ?>"><?php echo htmlentities($vo); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="layui-tab-content">
                <blockquote class="layui-elem-quote news_search">
                    模板调用方法：config('变量名')
                </blockquote>
                <form class="layui-form form-horizontal" action="<?php echo url('admin/config/setting',['group'=>$group]); ?>" method="post">
                    <?php if(is_array($fieldList) || $fieldList instanceof \think\Collection || $fieldList instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;switch($vo['type']): case "text": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "number": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <input type="number" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "switch": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" lay-skin="switch" lay-text="ON|OFF" value="<?php echo htmlentities($vo['value']); ?>" <?php if(1==$vo[ 'value' ]): ?>checked='' <?php endif; ?>> </div>
        <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "array": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <textarea name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" class="layui-textarea"><?php echo htmlentities($vo['value']); ?></textarea>
    </div>
    <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "checkbox": ?>
<div class="layui-form-item" pane="">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>][]" lay-skin="primary" title="<?php echo htmlentities($v); ?>" value="<?php echo htmlentities($key); ?>" <?php if(in_array($key,$vo[ 'value' ])): ?>checked='' <?php endif; ?>>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
        <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "radio": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="radio" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" value="<?php echo htmlentities($key); ?>" title="<?php echo htmlentities($v); ?>" <?php if($key==$vo [ 'value' ]): ?>checked='' <?php endif; ?>>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
        <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "select": ?>
<div class="layui-form-item">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <select name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]">
            <option value=""></option>
            <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($key); ?>" <?php if($key==$vo[ 'value' ]): ?>selected="" <?php endif; ?>><?php echo htmlentities($v); ?> </option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "datetime": ?>
<div class="layui-form">
    <div class="layui-form-item">
        <label class=""><?php echo htmlentities($vo['title']); ?></label>
        <div class="layui-form-field-label">
            <input type="text" class="layui-input test-item" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" value="<?php echo htmlentities($vo['value']); ?>">
        </div>
        <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
    </div>
</div>
<script type="text/javascript">
layui.use(['laydate'], function() {
    var laydate = layui.laydate;
    lay('.test-item').each(function() {
        laydate.render({
            elem: this,
            trigger: 'click',
            type: 'datetime'
        });
    });

});
</script>
<?php break; case "textarea": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <textarea placeholder="请输入<?php echo htmlentities($vo['title']); ?>" class="layui-textarea" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo htmlentities($vo['value']); ?></textarea>
    </div>
    <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "image": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-image">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): ?>
                    <div class="file-item thumbnail">
                        <img data-original="<?php echo htmlentities(get_file_path($vo['value'])); ?>" src="<?php echo htmlentities((get_thumb($vo['value']) ?: '/ptls/public/static/admin/img/none.png')); ?>" width="100" style="max-height: 100px;">
                        <i class="iconfont icon-close remove-picture" data-id="<?php echo htmlentities($vo['value']); ?>"></i>
                    </div>
                <?php endif; ?>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="false" data-watermark='' data-thumb='' data-size="<?php echo config('upload_image_size'); ?>" data-ext="<?php echo config('upload_image_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div class="layui-clear"></div>
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传单张图片</div>
        </div>
    </div>
    <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "images": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <div class="js-upload-images">
            <div id="file_list_<?php echo htmlentities($vo['name']); ?>" class="uploader-list">
                <?php if(!(empty($vo['value']) || (($vo['value'] instanceof \think\Collection || $vo['value'] instanceof \think\Paginator ) && $vo['value']->isEmpty()))): if(is_array(explode(',',$vo['value'])) || explode(',',$vo['value']) instanceof \think\Collection || explode(',',$vo['value']) instanceof \think\Paginator): $i = 0; $__LIST__ = explode(',',$vo['value']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <div class="file-item thumbnail">
                        <img data-original="<?php echo htmlentities(get_file_path($v)); ?>" src="<?php echo htmlentities((get_thumb($v) ?: '/ptls/public/static/admin/img/none.png')); ?>" width="100" style="max-height: 100px;">
                        <i class="iconfont icon-close remove-picture" data-id="<?php echo htmlentities($vo['value']); ?>"></i>
                        <i class="iconfont icon-yidong move-picture"></i>
                    </div>
                  <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
            <input type="hidden" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-multiple="true" data-watermark='' data-thumb='' data-size="<?php echo config('upload_image_size'); ?>" data-ext="<?php echo config('upload_image_ext'); ?>" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>">
            <div class="layui-clear"></div>
            <div id="picker_<?php echo htmlentities($vo['name']); ?>"><i class="layui-icon layui-icon-upload"></i> 上传多张图片</div>
        </div>
    </div>
    <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; case "Ueditor": ?>
<div class="layui-form-item layui-form-text">
    <label class=""><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-form-field-label">
        <script type="text/javascript" src="/ptls/public/static/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" src="/ptls/public/static/ueditor/ueditor.all.js"></script>
        <script type="text/javascript">
        layui.use([], function() {
            var <?php echo htmlentities($vo['fieldArr']); ?><?php echo htmlentities($vo['name']); ?> = UE.getEditor('<?php echo htmlentities($vo['fieldArr']); ?><?php echo htmlentities($vo['name']); ?>', {
                initialFrameWidth:null,
                initialFrameHeight: 250,
                serverUrl: "<?php echo url('attachment/Ueditor/run'); ?>"
            });
        })
        </script>
        <script type="text/plain" id="<?php echo htmlentities($vo['fieldArr']); ?><?php echo htmlentities($vo['name']); ?>" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo $vo['value']; ?></script>
    </div>
    <div class="layui-form-mid layui-word-aux"><?php if($vo['remark']): ?><?php echo $vo['remark']; ?>，<?php endif; ?>调用方式：<code>config('<?php echo htmlentities($vo['name']); ?>')</code></div>
</div>
<?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
<script type="text/javascript" src="/ptls/public/static/webuploader/webuploader.min.js"></script>
<link rel="stylesheet" href="/ptls/public/static/webuploader/webuploader.css">
<script type="text/javascript">
jQuery(document).ready(function() {
    // 文件上传集合
    var webuploader = [];
    // 当前上传对象
    var curr_uploader = {};
    $('.js-upload-image,.js-upload-images').each(function() {
        var $input_file = $(this).find('input');
        var $input_file_name = $input_file.attr('id');
        // 图片列表
        var $file_list = $('#file_list_' + $input_file_name);
        // 缩略图参数
        var $thumb = $input_file.data('thumb');
        // 水印参数
        var $watermark = $input_file.data('watermark');
        // 是否多图片上传
        var $multiple = $input_file.data('multiple');
        // 允许上传的后缀
        var $ext = $input_file.data('ext');
        // 图片限制大小
        var $size = $input_file.data('size');
        // 优化retina, 在retina下这个值是2
        var ratio             = window.devicePixelRatio || 1;
        // 缩略图大小
        var thumbnailWidth    = 100 * ratio;
        var thumbnailHeight   = 100 * ratio;

        var uploader = WebUploader.create({
            // 选完图片后，是否自动上传。
            auto: true,
            // 去重
            duplicate: true,
            // 不压缩图片
            resize: false,
            compress: false,
            // swf文件路径
            swf: GV.WebUploader_swf,
            pick: {
                id: '#picker_' + $input_file_name,
                multiple: $multiple
            },
            server: GV.image_upload_url,
            // 图片限制大小
            fileSingleSizeLimit: $size,
            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: $ext,
                mimeTypes: 'image/jpg,image/jpeg,image/bmp,image/png,image/gif'
            },
            // 自定义参数
            formData: {
                thumb: $thumb,
                watermark: $watermark
            }

        })
        //console.log(uploader);
        // 当有文件添加进来的时候
        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                    '<div id="' + file.id + '" class="file-item js-gallery thumbnail">' +
                    '<img>' +
                    '<div class="info">' + file.name + '</div>' +
                    '<i class="iconfont icon-close remove-picture"></i>' +
                    ($multiple ? '<i class="fa fa-fw fa-arrows move-picture"></i>' : '') +
                    '<div class="progress progress-mini remove-margin active">' +
                    '<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>' +
                    '</div>' +
                    '<div class="file-state img-state"><div class="layui-bg-blue">正在读取...</div>' +
                    '</div>'
                ),
                $img = $li.find('img');

            if ($multiple) {
                $file_list.append( $li );
            } else {
                $file_list.html( $li );
                $input_file.val('');
            }
            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100
            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }
                $img.attr( 'src', src );
            }, thumbnailWidth, thumbnailHeight );
            // 设置当前上传对象
            curr_uploader = uploader;
        });

        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $percent = $( '#'+file.id ).find('.progress-bar');
            console.log($percent);
            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功
        uploader.on( 'uploadSuccess', function( file, response ) {
            var $li = $( '#'+file.id );
            if (response.code==0) {
                if ($multiple) {
                    if ($input_file.val()) {
                        $input_file.val($input_file.val() + ',' + response.id);
                    } else {
                        $input_file.val(response.id);
                    }
                    $li.find('.remove-picture').attr('data-id', response.id);
                } else {
                    $input_file.val(response.id);
                }
            }
            $li.find('.file-state').html('<div class="layui-bg-green">'+response.info+'</div>');
            $li.find('img').attr('data-original', response.path);
            // 上传成功后，再次初始化图片查看功能
            //Dolphin.viewer();

            // 文件上传成功后的自定义回调函数
            //if (window['dp_image_upload_success'] !== undefined) window['dp_image_upload_success']();
            // 文件上传成功后的自定义回调函数
            //if (window['dp_image_upload_success_'+$input_file_name] !== undefined) window['dp_image_upload_success_'+$input_file_name]();
        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ) {
            var $li = $( '#'+file.id );
            $li.find('.file-state').html('<div class="bg-danger">服务器错误</div>');

            // 文件上传出错后的自定义回调函数
            //if (window['dp_image_upload_error'] !== undefined) window['dp_image_upload_error']();
            // 文件上传出错后的自定义回调函数
            //if (window['dp_image_upload_error_'+$input_file_name] !== undefined) window['dp_image_upload_error_'+$input_file_name]();
        });

        // 文件验证不通过
        uploader.on('error', function (type) {
            switch (type) {
                case 'Q_TYPE_DENIED':
                    layer.alert('图片类型不正确，只允许上传后缀名为：'+$ext+'，请重新上传！', {icon: 5})
                    break;
                case 'F_EXCEED_SIZE':
                    layer.alert('图片不得超过'+ $size +'kb，请重新上传！', {icon: 5})
                    break;
            }
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            setTimeout(function(){
                $( '#'+file.id ).find('.progress').remove();
            }, 500);

            // 文件上传完成后的自定义回调函数
            //if (window['dp_image_upload_complete'] !== undefined) window['dp_image_upload_complete']();
            // 文件上传完成后的自定义回调函数
            //if (window['dp_image_upload_complete_'+$input_file_name] !== undefined) window['dp_image_upload_complete_'+$input_file_name]();
        });

        // 删除图片
        $file_list.delegate('.remove-picture', 'click', function(){
            $(this).closest('.file-item').remove();
            if ($multiple) {
                var ids = [];
                $file_list.find('.remove-picture').each(function () {
                    ids.push($(this).data('id'));
                });
                $input_file.val(ids.join(','));
            } else {
                $input_file.val('');
            }
            // 删除后，再次初始化图片查看功能
            //Dolphin.viewer();
        });

        // 将上传实例存起来
        webuploader.push(uploader);

        // 如果是多图上传，则实例化拖拽
        /*if ($multiple) {
            $file_list.sortable({
                connectWith: ".uploader-list",
                handle: '.move-picture',
                stop: function () {
                    var ids = [];
                    $file_list.find('.remove-picture').each(function () {
                        ids.push($(this).data('id'));
                    });
                    $input_file.val(ids.join(','));
                    // 拖拽排序后，重新初始化图片查看功能
                    Dolphin.viewer();
                }
            }).disableSelection();
        }*/


    });
});
</script>
                    <?php if(count($fieldList)): ?>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn ajax-post" lay-submit="" lay-filter="*" target-form="form-horizontal">立即提交</button>
                        </div>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

    
<script type="text/javascript" src="/ptls/public/static/admin/js/common.js"></script>
<script>
layui.use(['element', 'form'], function() {
    var form = layui.form,
        element = layui.element,
        $ = layui.jquery;
});
</script>

</body>

</html>