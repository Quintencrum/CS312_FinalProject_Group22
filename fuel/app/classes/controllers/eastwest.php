<?php
class Controller_eastwest extends Controller_Template {

    // public $numRowsColumns = "";    //number of rows/columns
    // public $numColors = "";         //number of colors

public function action_index(){ //Probably need to RENAME
    $data = array();
    if(isset($_GET['numRowsColumns']) && isset($_GET['numColors'])){
        $rows = (int) $_GET['numRowsColumns'];
        $colors = (int) $_GET['numColors'];

        //Checking for valid input
        if($rows >= 1 && $rows <=26 && $colors >= 1 && $colors <= 10) {

        }
        else {
            echo "Invalid input choose a number of rows/columns between 1 and 26 and a number of colors between 1 and 10.";
        }


    }
}






//IDK if this belongs here so I will comment this out
public function create_table_upper($numberOfRows, $numberOfColumns) {
    //colors
    $colors = array("red","orange","yellow","green","blue","purple","grey","brown","black","teal");

    echo "<table>";
    for($i = 0;$i < $numberOfRows;$i++) {
        //new row after every other iteration
        if ($i%2 == 0) {
            echo "<tr>";
        }

        //adding two column cells per row
        //echo "<td>Row " . ($i+1) . ", Column 1</td>";

        //adding the color selection
        echo    "<td>
                    <form>
                        <label for='color".($i+1).">Select color ".($i+1).":</label>
                        <select name='color".($i+1)." id='color".($i+1).">";
        $colorsAvailable = $colors;
        
        foreach($colorsAvailable as $colorsAvailable) {
            echo "<option value=\"".$colorsAvailable."\">".$colorsAvailable."</option>";
        }
        echo
                        "</select>
                    </form>
                </td>";

        echo "<td>Row " . ($i+1) . ", Column 2</td>";
        
        //ending row after every other iteration
        if ($i%2 == 1) {
            echo "</tr>";
        }
    }
    echo "</table>";
}


//lower table
public function create_table_lower($n) {
    //letters array
    $letters = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

    echo "<table>";
    for ($i = 0; $i < $n+1; $i++) {  //table rows
      echo "<tr>";
      for ($j = 0; $j < $n+1; $j++) {    //table columns (cells per row)
        //First row letter addition
        if($i == 0 && $j != 0) {    //$i equals zero for first row & $j doesn't equal zero to leave left most cell empty
            echo "<td>" . $letters[$i] . "</td>";
        }
        elseif($i > 0 && $j == 0) { //numbering the left most column starting in row two
            echo "<td>" . ($i - 1) . "</td>";
        }
        else{
            echo "<td>Row " . ($i+1) . ", Column " . ($j+1) . "</td>";
        }
      }
      echo "</tr>";
    }
    echo "</table>";


    
}




}









//Everything below is from orginal eastwest.php file

/*

        if($dir == "east"){
            $this->template->title= 'East Home Page';
            $this->template->css = "east.css";
            $this->template->content = View::forge('eastwest/index.php',$data);
            $this->template->direction = "one?direction=east";
            $this->template->direction2 = "two?direction=east";
        }
        else {
            $this->template->title= 'West Home Page';
            $this->template->css = "west.css";
            $this->template->content = View::forge('eastwest/index.php',$data);
            $this->template->direction = "one?direction=west";
            $this->template->direction2 = "two?direction=west";

        }
    }
    else {
        $this->template->title= 'Home Page';
        $this->template->css = "west.css";
        $this->template->content = View::forge('eastwest/index.php',$data);
        $this->template->direction = "one?direction=west";
        $this->template->direction2 = "two?direction=west";

    }
}       


public function action_one(){
    $data = array();
    if(isset($_GET['direction'])){
        $dir = $_GET['direction'];
        if($dir == "east"){
            $this->template->title= 'East Page One';
            $this->template->css = "east.css";
            $this->template->content = View::forge('eastwest/one.php',$data);
            $this->template->direction = "one?direction=east";
            $this->template->direction2 = "two?direction=east";
        }
        else {
            $this->template->title= 'West Page One';
            $this->template->css = "west.css";
            $this->template->content = View::forge('eastwest/one.php',$data);
            $this->template->direction = "one?direction=west";
            $this->template->direction2 = "two?direction=west";

        }
    }
    else {
        $this->template->title= 'Page One';
        $this->template->css = "west.css";
        $this->template->content = View::forge('eastwest/one.php',$data);
        $this->template->direction = "one?direction=west";
        $this->template->direction2 = "two?direction=west";
    }
}

public function action_two(){
    $data = array();
    $this->template->content = View::forge('eastwest/two',$data);
    if(isset($_GET['direction'])){
        $dir = $_GET['direction'];
        if($dir == "east"){
            $this->template->title= 'East Page Two';
            $this->template->content = View::forge('eastwest/two.php',$data);
            $this->template->css = "east.css";
            $this->template->direction = "one?direction=east";
            $this->template->direction2 = "two?direction=east";
        }
        else {
            $this->template->title= 'West Page Two';
            $this->template->content = View::forge('eastwest/two.php',$data);
            $this->template->css = "west.css";
            $this->template->direction = "one?direction=west";
            $this->template->direction2 = "two?direction=west";

        }
    }

    else {
        $this->template->title= 'Page Two';
        $this->template->css = "west.css";
        $this->template->content = View::forge('eastwest/two.php',$data);
        $this->template->direction = "one?direction=west";
        $this->template->direction2 = "two?direction=west";
    }

}

}
*/