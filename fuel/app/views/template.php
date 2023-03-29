<head>
        <meta charset="utf-8">
        <title><?php $title ?></title>
        <meta name="author" content="CS312">
        <meta name="description" content="A homepage for lab 2">
        <meta name="keywords" content="Homepage, HTML5, Quinten Crum, CS312, CSU, Colorado State University">
        
        <?php echo Asset::css($css) ?>

    </head>
<body>
<nav class="center, col">        

            <br/>
            <a class="link" href="https://www.cs.colostate.edu:4444/~qcrum/cs312/fuelviews/index.php/eastwest/index">Home!</a> ----     
            <a class="link" href="https://www.cs.colostate.edu:4444/~qcrum/cs312/fuelviews/index.php/eastwest/index?direction=east">East</a>----
            <a class="link" href="https://www.cs.colostate.edu:4444/~qcrum/cs312/fuelviews/index.php/eastwest/index?direction=west">West</a> ----
            <?php echo '<a class="link" href="https://www.cs.colostate.edu:4444/~qcrum/cs312/fuelviews/index.php/eastwest/'.$dirOne.'">One</a> ----' ?>
            <?php echo '<a class="link" href="https://www.cs.colostate.edu:4444/~qcrum/cs312/fuelviews/index.php/eastwest/'.$dirTwo.'">Two</a> ----' ?>            <br/>
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
