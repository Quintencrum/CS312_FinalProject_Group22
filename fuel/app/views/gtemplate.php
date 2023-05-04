<head>
        <meta charset="utf-8">
        <title><?php $title ?></title>
        <meta name="author" content="CS312">
        <meta name="description" content="A homepage for lab 2">
        <meta name="keywords" content="Final Project, HTML5, Group 22, CS312, CSU, Colorado State University">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php echo Asset::css($css) ?>

    </head>
<body>
    <nav>
        <ul>
            <li><a href="https://www.cs.colostate.edu:4444/~qcrum/m1/index.php/milestone1/index">Home</a></li>
            <li><a href="https://www.cs.colostate.edu:4444/~qcrum/m1/index.php/milestone1/about">About</a></li>
            <li><a href="https://www.cs.colostate.edu:4444/~qcrum/m1/index.php/milestone1/colorSelector">Color Coordinate Generation</a></li>
        </ul>
    </nav>
    <?php echo $content; ?>
</body>
<footer>
</footer>
