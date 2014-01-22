<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $template['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo add_theme_css(array('assets/css/bootstrap.min.css','assets/css/bootstrap-theme.min.css'))?>
    <?php echo $template['metadata'];?>
    <?php //if(isset($template['partials']['head'])){echo $template['partials']['head'];}?>
    <style>
    <?php //if(isset($template['partials']['customstyle'])){echo $template['partials']['customstyle'];}?>
    </style>
</head>
<body>
    <div class="container">
        <?php if(isset($template['partials']['menu'])){echo $template['partials']['menu'];}?>