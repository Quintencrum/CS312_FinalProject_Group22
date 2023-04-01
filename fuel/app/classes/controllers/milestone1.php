<?php
class Controller_milestone1 extends Controller_Template {

    // public $numRowsColumns = "";    //number of rows/columns
    // public $numColors = "";         //number of colors
    public $color_stage_input = false;

    public $template = 'gtemplate';

// public function create_table_upper($numberOfRows, $numberOfColumns) {
//     //colors
//     $colors = array("red","orange","yellow","green","blue","purple","grey","brown","black","teal");

//     $table = "<table>";
//     $table .= "<tr><th style='width:20%;'>Color</th> <th>Value</th></tr>";  //initial table row

//     //rest of table rows
//     for($i = 0; $i < $numberOfRows; $i++) {
//         $table .= "<tr>";   //new table row
//         $table .= "<td>";    //new cell
//         //inside left cell
//         $table .= "<select name='color$i'>";

//         for($j = 0; $j < count($colors); $j++) {
//             $table .= "<option value='$colors[$j]'>$colors[$j]</option>";
//         }

//         $table .= "</select></td>";
//         //inside right cell
//         $table .= "<td><input type='text' name='value$i'></td>";
//         $table .= "</tr>";
//     }    


//     return $table;
// }

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
    $rows = $_GET['val1'];
    $colors = $_GET['val2'];
    $validInput = false;
    $selectedColors = array();

    $data = array();
    $this->template->title='Group 22 Color Selector Page';
    $this->template->css='style.css';
    

    //need to check if input is valid
    if($rows >= 1 && $rows <=26 && $colors >= 1 && $colors <= 10) {
        $validInput = true;
    }    

    // if valid display tables file


    if($validInput == false) {
        $this->template->content=View::forge('pages/color_coordinate_generation_input',$data);
        echo "Invalid input choose a number of rows/columns between 1 and 26 and a number of colors between 1 and 10.";

    }
    else {
        $this->template->content=View::forge('pages/color_coordinate_generation_tables',$data);
        //finding selected colors
        for($i = 0; $i < 10; $i++) {
            $varName = 'color'.($i+1);
            if(isset($_POST[$varName])) {
                array_push($selectedColors,$_POST[$varName]);
            }
            else {
                array_push($selectedColors,'');
            }
        }

        //Creating upper table w/o function ---------------------------
        $colors_string = array("red","orange","yellow","green","blue","purple","grey","brown","black","teal");//all colors
        $colors_string = array_slice($colors_string,0,$colors);

        $table = "<table style='border: 1px solid black;width='100%';'>";
        $table .= "<tr><th style='width:20%;'>Color</th> <th>Value</th></tr>";  //initial table row

        //rest of table rows
        for($i = 0; $i < $colors; $i++) {
            $table .= "<tr>";   //new table row
            $table .= "<td style='width:20%;border: 1px solid black;'>";    //new cell
            //inside left cell
            $table .= "<form method='post'>";
            $table .= "<select name='color$i' id='color$i'>";

            for($j = 0; $j < count($colors_string); $j++) {
                $table .= "<option value='$colors_string[$j]'>$colors_string[$j]</option>";
            }

            $table .= "</select></form></td>";
            //inside right cell
            // $table .= "<td style='width:20%;border: 1px solid black;'><input type='text' name='value$i'></td>";
            $table .= "<td style='width:20%;border: 1px solid black;'>".$selectedColors[$i]."</td>";
            $table .= "</tr>";
        }


        //--------------------------------------------------------------
        
        //Creating lower table w/o function ---------------------------
        //letters array
        $letters = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

        $table2 = "<table style='border: 1px solid black;width='100%';'>";
        for ($i = 0; $i < $rows+1; $i++) {  //table rows
            $table2 .= "<tr>";
        for ($j = 0; $j < $rows+1; $j++) {    //table columns (cells per row)
            //First row letter addition
            if($i == 0 && $j != 0) {    //$i equals zero for first row & $j doesn't equal zero to leave left most cell empty
                $table2 .= "<td style='border: 1px solid black;width='3.5%';'>" . $letters[$j-1] . "</td>";
            }
            elseif($i > 0 && $j == 0) { //numbering the left most column starting in row two
                $table2 .= "<td style='border: 1px solid black;width='3.5%';'>" . ($i - 1) . "</td>";
            }
            elseif($i == 0 && $j == 0) {    //leaving top left blank
                $table2 .= "<td style='border: 1px solid black;width='3.5%';'></td>";
            }
            else{
                // $table2 .= "<td style='border: 1px solid black;'>(" . ($i+1) . ", " . ($j+1) . ")</td>";
                $table2 .= "<td style='border: 1px solid black;width='3.5%';'></td>";

            }
        }
        $table2 .= "</tr>";
        }
        $table2 .= "</table>";
        //--------------------------------------------------------------
        $tables = $table . "<br><br>" . $table2;


        echo $tables;
    }

}
}

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
