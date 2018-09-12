<?php
$url = '/admin'.Url::getCurrentUrl(array('action', 'id'));
require_once('template/_header.php');
?>
<h1>Quản lý doanh nghiệp</h1>
<p>Thông tin doanh nghiệp được cập nhật thành công!!!<br />
<a href="<?php echo $url; ?>">Quay trở lại trang quản lý doanh nghiệp.</a></p>
<?php require_once('template/_footer.php'); ?>