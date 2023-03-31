<head>
        <title><?php echo $title ?></title>
        <meta charset="utf-8">
        <meta name="author" content="CS312">
        <meta name="description" content="312 Group Project">
        <meta name="keywords" content="Final Project, HTML5, Group 22, CS312, CSU, Colorado State University">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php echo Asset::css($css) ?>

    </head>
<body>
    <nav>
        <ul>
            <li><a href = "https://cs.colostate.edu:4444/~eid/m1/">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="color_coordinate_generation.php">Color Coordinate Generation</a></li>
        </ul>
    </nav>
    <?php echo $content; ?>
</body>
<footer>
</footer>
