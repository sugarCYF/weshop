<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/adminStatic/css/font.css">
        <link rel="stylesheet" href="/adminStatic/css/xadmin.css">
        <script type="text/javascript" src="/adminStatic/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/adminStatic/js/xadmin.js"></script>
        <script src="/adminStatic/js/jquery-1.9.1.min.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            td{
                padding-left: 3px;
            }
        </style>

    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                    <input type="hidden" name="goods_id" value="{{$goods_id}}">
                    <div class="layui-form-item">
                      <table id="table-form">
                          <tr>
                              <input type="hidden" name="goods_id[]" value="{{$goods_id}}">
                          @foreach($catData_struct as $k => $v)
                                  <td>{{$v['name']}}:
                                      <select name="attr_val[]" id="">
                                          @foreach($v['child'] as $key => $val)
                                              <option value="{{$key}}">{{$val}}</option>
                                          @endforeach
                                      </select>
                                  </td>
                              @endforeach
                              <td>价格: <input type="text" name="price[]" required class="layui-input"></td>
                              <td>库存: <input type="text" name="num[]" required class="layui-input" ></td>
                              <td><a href="javascript:;" class="add-tr">+</a></td>
                          </tr>
                          <tr>
                              @foreach($catData_struct as $k => $v)
                                  <td>{{$v['name']}}:
                                      <select name="attr_val[]" id="">
                                          @foreach($v['child'] as $key => $val)
                                              <option value="{{$key}}">{{$val}}</option>
                                          @endforeach
                                      </select>
                                  </td>
                              @endforeach
                              <td>价格: <input type="text" name="price[]" required class="layui-input"></td>
                              <td>库存: <input type="text" name="num[]" required class="layui-input" ></td>
                              <td><a href="javascript:;" class="del-tr">-</a></td>
                          </tr>
                          <tr>
                              @foreach($catData_struct as $k => $v)
                                  <td>{{$v['name']}}:
                                      <select name="attr_val[]" id="">
                                          @foreach($v['child'] as $key => $val)
                                              <option value="{{$key}}">{{$val}}</option>
                                          @endforeach
                                      </select>
                                  </td>
                              @endforeach
                              <td>价格: <input type="text" name="price[]" required class="layui-input"></td>
                              <td>库存: <input type="text" name="num[]" required class="layui-input" ></td>
                              <td><a href="javascript:;" class="del-tr">-</a></td>
                          </tr>
                          <tr>
                              @foreach($catData_struct as $k => $v)
                                  <td>{{$v['name']}}:
                                      <select name="attr_val[]" id="">
                                          @foreach($v['child'] as $key => $val)
                                              <option value="{{$key}}">{{$val}}</option>
                                          @endforeach
                                      </select>
                                  </td>
                              @endforeach
                              <td>价格: <input type="text" name="price[]" required class="layui-input"></td>
                              <td>库存: <input type="text" name="num[]" required class="layui-input" ></td>
                              <td><a href="javascript:;" class="del-tr">-</a></td>
                          </tr>
                          <tr>
                              @foreach($catData_struct as $k => $v)
                                  <td>{{$v['name']}}:
                                      <select name="attr_val[]" id="">
                                          @foreach($v['child'] as $key => $val)
                                              <option value="{{$key}}">{{$val}}</option>
                                          @endforeach
                                      </select>
                                  </td>
                              @endforeach
                              <td>价格: <input type="text" name="price[]" required class="layui-input"></td>
                              <td>库存: <input type="text" name="num[]" required class="layui-input" ></td>
                              <td><a href="javascript:;" class="del-tr">-</a></td>
                              <td>
                                  <button type="button" class="layui-btn add-tr del-tr" style="margin-top: 5px;">+</button>
                              </td>
                          </tr>
                      </table>
                      <div class="layui-form-item" style="margin-top: 20px;">
                          <label for="L_repass" class="layui-form-label"></label>
                          <button class="layui-btn" lay-filter="add" lay-submit="">生成货品</button>
                      </div>
                  </div>
              </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                form.verify({
                    nikename: function(value) {
                        if (value.length < 5) {
                            return '昵称至少得5个字符啊';
                        }
                    },
                    pass: [/(.+){6,12}$/, '密码必须6到12位'],
                    repass: function(value) {
                        if ($('#L_pass').val() != $('#L_repass').val()) {
                            return '两次密码不一致';
                        }
                    }
                });

                //监听提交
                form.on('submit(add)',
                function(data) {
                    console.log(data.field);
                    //发异步，把数据提交给php
                    // layer.alert("增加成功", {
                    //     icon: 6
                    // },
                    // function() {
                    //     //关闭当前frame
                    //     xadmin.close();
                    //
                    //     // 可以对父窗口进行刷新
                    //     xadmin.father_reload();
                    // });
                    // return false;
                });

            });

<<<<<<< HEAD
            $('.del-tr').click(function(){
                $(this).parents('tr').remove();
            })
=======
            $('.add-tr').click(function(){
                var str = $(this).parents('tr').html();
                str = '<tr>'+str+'<tr/>';
                str = str.replace('+', '-');
                $(this).parents('table').append(str);
            });
>>>>>>> upstream/master

        </script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>




