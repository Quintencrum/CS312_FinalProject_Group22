<!DOCTYPE html>
<html>
    <header>
        <h1>Team 22</h1>
        <h2>Color Coordinate Generation:</h2>
    <header>
    <body>
        <?php echo Form::open(['action' => 'index.php/m1/tables', 'method' => 'get']); ?>
        <?php echo Form::label('Enter a number of rows/columns:', 'val1'); ?>
        <?php echo Form::input('val1'); ?>
        <?php echo Form::label('Enter a number of colors:', 'val2'); ?>
        <?php echo Form::input('val2'); ?>
        <?php echo Form::submit('submit', 'Submit'); ?>
        <?php echo Form::close(); ?>
        <!-- <a href="https://www.cs.colostate.edu:4444/~qcrum/m1/index.php/m1/tables?">Submit</a> -->
    </body>
</html>