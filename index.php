<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
 <HEAD>
  <TITLE> ZTREE DEMO </TITLE>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="lib/zTree/css/zTreeStyle/zTreeStyle.css" type="text/css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
     
  <style>
	body {
	background-color: white;
	margin:0; padding:0;
	text-align: center;
	}
	div, p, table, th, td {
		list-style:none;
		margin:0; padding:0;
		color:#333; font-size:12px;
		font-family:dotum, Verdana, Arial, Helvetica, AppleGothic, sans-serif;
	}
	#testIframe {margin-left: 10px;}
  </style>

<script type="text/javascript" src="lib/zTree/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="lib/zTree/js/jquery.ztree.core.js"></script>  
   
<!--<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>-->
<script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="text/javascript" charset="utf-8" src="lib/utf8_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="lib/utf8_ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="lib/utf8_ueditor/lang/zh-cn/zh-cn.js"></script>
     
<SCRIPT type="text/javascript" >
  <!--
	var zTree;
	var demoIframe;

	var setting = {
		view: {
			dblClickExpand: false,
			showLine: true,
			selectedMulti: false
		},
		data: {
			simpleData: {
				enable:true,
				idKey: "id",
				pIdKey: "pId",
				rootPId: ""
			}
		},
		callback: {
			beforeClick: function(treeId, treeNode) {
				var zTree = $.fn.zTree.getZTreeObj("tree");
				if (treeNode.isParent) {
					zTree.expandNode(treeNode);
					return false;
				} else {
					demoIframe.attr("src",treeNode.file + ".html");
					return true;
				}
			},
            onClick: function(treeId, treeNode) {
                var treeObj = $.fn.zTree.getZTreeObj("tree");
  
                treeObj.selectNode(treeNode);
            }
		}
	};

	var zNodes =[
/*		{id:1, pId:0, name:"[core] 基本功能 演示", open:true},
		{id:101, pId:1, name:"最简单的树 --  标准 JSON 数据", file:"core/standardData"},
		{id:102, pId:1, name:"最简单的树 --  简单 JSON 数据", file:"core/simpleData"},
		{id:103, pId:1, name:"不显示 连接线", file:"core/noline"},
		{id:104, pId:1, name:"不显示 节点 图标", file:"core/noicon"}*/
	];

	$(document).ready(function(){
		var t = $("#tree");
		t = $.fn.zTree.init(t, setting, zNodes);
		//demoIframe = $("#testIframe");
		//demoIframe.bind("load", loadReady);
		var zTree = $.fn.zTree.getZTreeObj("tree");
		zTree.selectNode(zTree.getNodeByParam("id", 101));

	});

	function loadReady() {
		var bodyH = demoIframe.contents().find("body").get(0).scrollHeight,
		htmlH = demoIframe.contents().find("html").get(0).scrollHeight,
		maxH = Math.max(bodyH, htmlH), minH = Math.min(bodyH, htmlH),
		h = demoIframe.height() >= maxH ? minH:maxH ;
		if (h < 530) h = 530;
		demoIframe.height(h);
	}

  //-->
  </SCRIPT>
 </HEAD>

<BODY>
    
<TABLE border=0 height=600px align=left>
	<TR>
        <TD width=250px align=left valign=top style="BORDER-RIGHT: #999999 1px dashed">
            <div id="datepicker"></div>
            <ul id="tree" class="ztree" style="width:250px; height:460px; overflow:auto;"></ul>
        </TD>
		<TD width=770px align=left valign=top>
            <h1 id="editor_title">demo</h1>
            <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
        </TD>
	</TR>
</TABLE>


<script type="text/javascript">
    
    $( "#datepicker" ).datepicker({
        
      //altField: "#editor_title",
      //altFormat: "DD, d MM, yy",
    
      dateFormat:'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      showOtherMonths: true,
      selectOtherMonths: true,
      showButtonPanel: true,
        
      onSelect: function (dateText, inst) {
        var dateArys = new Array();   
        var dateArys = dateText.split('-');
          
        var year = {name: dateArys[0]};
        var month = {name: dateArys[1]};
        var day = {name: dateArys[2]};
        
        var treeObj = $.fn.zTree.getZTreeObj("tree");

        yearNode = treeObj.getNodeByParam("name", dateArys[0], null);
        if (!yearNode)
        {
            yearNode = treeObj.addNodes(null, year);
        }
          
        yearNode = treeObj.getNodeByParam("name", dateArys[0], null);
        monthNode = treeObj.getNodeByParam("name", dateArys[1], yearNode);
        if (!monthNode)
        {
            monthNode = treeObj.addNodes(yearNode, month);
        }
          
        monthNode = treeObj.getNodeByParam("name", dateArys[1], yearNode);
        dayNode = treeObj.getNodeByParam("name", dateArys[2], monthNode);
        if (!dayNode)
        {
            dayNode = treeObj.addNodes(monthNode, day);
        }
          
        dayNode = treeObj.getNodeByParam("name", dateArys[2], monthNode);
        treeObj.selectNode(dayNode);
    }
        
    });
    
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
  
</script>
</BODY>
</HTML>
