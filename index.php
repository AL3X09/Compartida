<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>RSS Reader Demo - jQuery EasyUI</title>
    <link href="jquery-easyui-1.4.5/themes/default/easyui.css" rel="stylesheet" type="text/css"/>
    <link href="jquery-easyui-1.4.5/themes/color.css" rel="stylesheet" type="text/css"/>
    <link href="jquery-easyui-1.4.5/themes/icon.css" rel="stylesheet" type="text/css"/>
	<style type="text/css">
		.rtitle{
			font-size:18px;
			font-weight:bold;
			padding:5px 10px;
			background:#336699;
			color:#fff;
		}
		.icon-channels{
			background:url('images/tree_channels.gif') no-repeat;
		}
		.icon-feed{
			background:url('images/rss.png') no-repeat;
		}
		.icon-rss{
			background:url('images/rss.gif') no-repeat;
		}
	</style>
    <link href="jquery-easyui-1.4.5/demo/demo.css" rel="stylesheet" type="text/css"/>
    <script src="jquery-easyui-1.4.5/jquery.min.js" type="text/javascript"></script>
    <script src="jquery-easyui-1.4.5/jquery.easyui.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function(){
			$('#dg').datagrid({
				onSelect: function(index,row){
					$('#cc').attr('src', row.link);
				},
				onLoadSuccess:function(){
					var rows = $(this).datagrid('getRows');
					if (rows.length){
						$(this).datagrid('selectRow',0);
					}
				}
			});
			$('#t-channels').tree({
				onSelect: function(node){
                    alert("aksk");
					var url = node.attributes.url;
                    alert(url);
					$('#dg').datagrid('load',{
						url: url
					});
				},
				onLoadSuccess:function(node,data){
					if (data.length){
						var id = data[0].children[0].children[0].id;
						var n = $(this).tree('find', id);
						$(this).tree('select', n.target);
					}
				}
			});
		});
	</script>
</head>
<body class="easyui-layout">
	<div region="north" border="false" class="rtitle">
		jQuery EasyUI RSS Reader Demo
	</div>
	<div region="west" title="Channels Tree" split="true" border="false" style="width:200px;background:#EAFDFF;">
		<ul id="t-channels" url="getTyping.php"></ul>
	</div>
	<div region="center" border="false">
		<div class="easyui-layout" fit="true">
			<div region="north" split="true" border="false" style="height:200px">
				<table id="dg" 
						url="get_feed.php" border="false" rownumbers="true"
						fit="true" fitColumns="true" singleSelect="true">
					<thead>
						<tr>
							<th field="Nombre" width="100">Nombre</th>
							<!--<th field="description" width="200">Description</th>
							<th field="pubdate" width="80">Publish Date</th>-->
						</tr>
					</thead>
				</table>
			</div>
			<div region="center" border="false" style="overflow:hidden">
				<iframe id="cc" scrolling="auto" frameborder="0" style="width:100%;height:100%"></iframe>
			</div>
		</div>
	</div>
</body>
</html>