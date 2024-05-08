<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />



    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
    <nav>
            <div class="logo"> <a href="http://nathalie-mota.local/">   <img src="<?php echo get_template_directory_uri() . '/assets/images/logo.jpg'; ?>" alt="logo" /></a></div>
            <div class="openMenu"><i class="fa fa-bars"></i></div>
            <?php get_template_part('partials/modal-contact'); ?>

            <ul class="mainMenu">
                <li><a href="http://nathalie-mota.local/">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#" id="modalBtn">Contact</a></li>
                <div class="closeMenu"><i class="fa fa-times"></i></div>
            </ul>

        </nav>
</header>


</body>    
