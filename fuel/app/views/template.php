<head>
        <meta charset="utf-8">
        <title><?php $title ?></title>
        <meta name="author" content="CS312">
        <meta name="description" content="A homepage for lab 2">
        <meta name="keywords" content="Final Project, HTML5, Group 22, CS312, CSU, Colorado State University">
        
        <?php echo Asset::css($css) ?>

    </head>
<body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="color_coordinate_generation">Color Coordinate Generation</a></li>
        </ul>
    </nav>

    <?php echo '<h1>'.$title.'</h1>' ?>
    <?php echo Asset::img($img1)?>
    <?php echo $content; ?>
</body>
<footer class="container, center">
<?php echo Asset::img($img2)?>
    <br>
    <br>
    <h4 class="center">
        This homepage was created for CS312!
    </h4>

</footer>
