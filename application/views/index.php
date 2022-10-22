<?php
$v = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cơm văn phòng</title>
    <meta name="robots" content="noindex,nofollow" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/cdn_css/cdn_select2.css">
    <link rel="stylesheet" href="/css/footer.css">
    <? foreach ($style as $style) { ?>
        <link rel="stylesheet" href="<?= $style . '?$v=' . $v ?>">
    <? } ?>
    <link rel="stylesheet" href="/css/style_global.css">
</head>

<body>
    <?
    $this->load->view($header);
    $this->load->view($page_name);
    $this->load->view($footer);
    ?>
    <script src="/script/lib/jquery.min.js"></script>
    <script type="text/javascript" src="/script/header_merchant_login.js"></script>
    <? foreach ($js as $js) { ?>
        <script type="text/javascript" src="<?= $js ?>"></script>
    <? } ?>
    <script src="/script/lib/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.form-select').select2({});
        });
    </script>
</body>

</html>