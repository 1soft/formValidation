<?php
$password = isset($_GET['password']) ? $_GET['password'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$url = isset($_GET['url']) ? $_GET['url'] : '';
$extra = '';

if(isset($_GET['spotsession'])){
    $extra = '<input type="hidden" name="spotsession" value="'.$_GET['spotsession'].'" />';
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title></title>
</head>
<body>

<form id="login" method="post" action="<?php echo $url ?>">
    <input type="hidden" name="email" value="<?php echo $email ?>" />
    <input type="hidden" name="password" value="<?php echo $password ?>" />
    <?php echo $extra;?>
</form>
<script type="text/javascript">
    document.getElementById('login').submit();
</script>
</body>
</html>
