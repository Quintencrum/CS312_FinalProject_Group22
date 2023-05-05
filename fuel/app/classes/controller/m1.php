<?php
class Controller_milestone1 extends Controller_Template {

public $color_stage_input = false;

public $template = 'gtemplate';

public function action_index(){
    $data = array();
    $this->template->title = 'Group 22 Home Page';
    $this->template->css = "styleNew.css";
    $this->template->content = View::forge('pages/index',$data);
}

public function action_about(){
    $data = array();
    $this->template->title='Group 22 About Page';
    $this->template->css="styleAbout.css";   //update
    $this->template->content=View::forge('pages/about',$data);
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
    $btwh = $rows * 50;
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
        echo "<h2 style = 'color:red'>Invalid input choose a number of rows/columns between 1 and 26 and a number of colors between 1 and 10.</h2>";

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
        // $colors_string = array_slice($colors_string,0,$colors);
        $table = "<header><script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><header>";
        $table .= "<table id = 'toptable' style='border: 1px solid black;width=100%;'>";
        //$table .= "<tr><th style='width:20%;'>Color</th> <th>Value</th></tr>";  //initial table row

        //rest of table rows
        for($i = 0; $i < $colors; $i++) {
            $table .= "<tr>";   //new table row
            $table .= "<td style='width:20%;border: 1px solid black;'>";    //new cell
            //inside left cell
            $table .= "<form method='post'>";
            if ($i == 0) { //first radio button checked by default
                $table .= "<input id = 'selected' class = 'rbutt' type=radio checked><select style = 'width:80%;' name='color$i' id='color$i'>";
            }
            else {
                $table .= "<input class = 'rbutt' type=radio><select style = 'width:80%;' name='color$i' id='color$i'>";
            }
            $rloop = 0;
            for($j = 0; $j < 10; $j++) {
                $ind = $j + $i;
                if ($ind >= 10) {
                    $ind = 0 + $rloop;
                    $rloop++;
                }
                $table .= "<option value='$colors_string[$ind]'>$colors_string[$ind]</option>";
            }

            $table .= "</select></form></td>";
            //inside right cell
            // $table .= "<td style='width:20%;border: 1px solid black;'><input type='text' name='value$i'></td>";
            $table .= "<td style='width:80%;border: 1px solid black;'></td>";
            $table .= "</tr>";
        }

        //--------------------------------------------------------------

        //Creating lower table w/o function ---------------------------
        //letters array
        $letters = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

        $table2 = "<table id = 'bottomtable' style='border: 1px solid black; width: $btwh; height: $btwh; table-layout:fixed;'><br><br>";
        $btwh = ($btwh / ($rows * $rows));
        for ($i = 0; $i < $rows+1; $i++) {  //table rows
            $table2 .= "<tr style = 'width: $btwh; height: $btwh;'>";
            for ($j = 0; $j < $rows+1; $j++) {    //table columns (cells per row)
                //First row letter addition
                if($i == 0 && $j != 0) {    //$i equals zero for first row & $j doesn't equal zero to leave left most cell empty
                    $table2 .= "<td style='border: 1px solid black;'>" . $letters[$j-1] . "</td>";
                }
                elseif($i > 0 && $j == 0) { //numbering the left most column starting in row two
                    $table2 .= "<td style='border: 1px solid black;'>" . ($i - 1) . "</td>";
                }
                elseif($i == 0 && $j == 0) {    //leaving top left blank
                    $table2 .= "<td style='border: 1px solid black;'></td>";
                }
                else{
                    // $table2 .= "<td style='border: 1px solid black;'>(" . ($i+1) . ", " . ($j+1) . ")</td>";
                    $table2 .= "<td id = '$i,$j' style='border: 1px solid black;'></td>";

                }
            }
            $table2 .= "</tr>";
        }
        $table2 .= "</table>";
        //--------------------------------------------------------------
        $table2 .= "<script>
                $(document).ready(function () {
                    $('.rbutt').click(function () {
                        console.log('we made it');
                        document.getElementById('selected').checked = false;
                        document.getElementById('selected').removeAttribute('id');
                        $(this).checked = true;
                        this.setAttribute('id','selected');
                    });
                });
                </script>";
        $tables = $table . "<br>" . $table2;
        echo $tables;


        
    }
}


}

?>
