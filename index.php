<?php
// シンプルMVCコントローラー
// 予約後：contents,content,models,model,view,<TableName>['RecordName']
$params = @explode('/', $_GET['model']);
$contents = @array_shift($params);
if($contents=='') {
	$contents = "news" ;
}

//コンテンツから必要なモデル,ビューを生成する
include ('./contents/'.$contents.'.php');
$ret = content() ;
extract($ret);

foreach($models as $model) {
	include ('./models/'.$model.'.php');
	$ret = model($params);
	extract($ret);
}
include ('./views/'.$view.'.html');
?>
