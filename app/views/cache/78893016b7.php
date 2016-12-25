<?php
// source: show.latte.php

use Latte\Runtime as LR;

class Template78893016b7 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>圣诞快乐！</title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<form role="form">
			<div class="form-group">
				<label for="exampleInputEmail1">标题</label>
				<input type="text" class="form-control title" id="title" placeholder="" name="title">
			</div>
			
			<div class="checkbox">
				<label>
				  <input type="checkbox" name="status" id="status" value="true"> 是否显示
				</label>
			</div>
			<button type="button" class="btn btn-default">提交</button>
		</form>
		<br>
<?php
		if ($items) {
?>		<table class="table table-striped">
		 	<?php
			$iterations = 0;
			foreach ($items as $item) {
?>

				<tr><td><?php echo LR\Filters::escapeHtmlText($item->title) /* line 49 */ ?></td><td style="text-align: right;"><button type="button" class="btn btn-danger" data-id=<?php
				echo LR\Filters::escapeHtmlAttrUnquoted($item->id) /* line 49 */ ?>>删除</button></td></tr>
<?php
				$iterations++;
			}
?>
		</table>
<?php
		}
?>
	</div>
	
	<script type="text/javascript">
		
		$('.btn-default').click(function() {
			var title = $("#title").val();
			var status = $("#status").val();
			$.get('/home/create?title='+title+'&status='+status, function(data) {
				console.log(data);
				if (data.code == 200) {
					location.href = location.href;
				} else {
					alert('提交失败');
				}
				
			}, 'json')
		})

		$('.btn-danger').click(function() {
			var id = $(this).data('id');
			$.get('/home/delete?id='+id, function(data) {
				console.log(data);
				if (data.code == 200) {
					location.href = location.href;
				} else {
					alert('操作失败');
				}
				
			}, 'json')
		})
	</script>
</body>
</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['item'])) trigger_error('Variable $item overwritten in foreach on line 48');
		
	}

}
