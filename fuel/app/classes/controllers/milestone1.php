<?php
class Controller_milestone1 extends Controller_Template {

    // public $numRowsColumns = "";    //number of rows/columns
    // public $numColors = "";         //number of colors
    public $color_stage_input = false;

    public $template = 'gtemplate';

public function action_index(){
    $data = array();
    $this->template->title = 'Group 22 Home Page';
    $this->template->css = 'style.css';
    $this->template->content = View::forge('pages/index',$data);
}

public function action_about(){
    $data = array();
    $this->template->title='Group 22 About Page';
    $this->template->css='style.css';   //update
    $this->template->content=View::forge('pages/About',$data);
}

public function action_colorSelector(){
    $data = array();
    $this->template->title='Group 22 Color Selector Page';
    $this->template->css='style.css';
    
    if($this->color_stage_input == false) {
        $this->template->content=View::forge('pages/color_coordinate_generation_input',$data);
    }
    else {
        $this->template->content=View::forge('pages/color_coordinate_generation_tables',$data);
    }
}

public function action_tables() {
    $val1 = $_GET['val1'];
    $val2 = $_GET['val2'];

    $data = array();
    $this->template->title='Group 22 Color Selector Page';
    $this->template->css='style.css';
    

    //need to check if input is valid

    // if valid display tables file
    if(isset($val1)) {
        $color_stage_input = true;
    }


    if($color_stage_input == false) {
        $this->template->content=View::forge('pages/color_coordinate_generation_input',$data);
    }
    else {
        $this->template->content=View::forge('pages/color_coordinate_generation_tables',$data);
    }

}



}

/*
Previous controller work here:
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





*/




/*

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

*/
