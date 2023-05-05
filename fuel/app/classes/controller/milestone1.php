<?php 
// class Controller_milestone1 extends Controller_Template {

//     // public $numRowsColumns = "";    //number of rows/columns
//     // public $numColors = "";         //number of colors
// public $color_stage_input = false;

// public $template = 'gtemplate';

// public function action_index(){
//     $data = array();
//     $this->template->title = 'Group 22 Home Page';
//     $this->template->css = "styleNew.css";
//     $this->template->content = View::forge('pages/index',$data);
//     $this->template->js = "index.js";

// }

// public function action_about(){
//     $data = array();
//     $this->template->title='Group 22 About Page';
//     $this->template->css="styleAbout.css";   //update
//     $this->template->content=View::forge('pages/about',$data);
//     $this->template->js = "about.js";
// }

// public function action_colorSelector(){
//     $data = array();
//     $this->template->title='Group 22 Color Selector Page';
//     $this->template->css='style.css';
//     $this->template->js = "colorTable.js";
    
//     if($this->color_stage_input == false) {
//         $this->template->content=View::forge('pages/color_coordinate_generation_input',$data);
//     }
//     else {
//         $this->template->content=View::forge('pages/color_coordinate_generation_tables',$data);
//     }
// }

// public function action_tables() {
//     $rows = $_GET['val1'];
//     $colors = $_GET['val2'];
//     $validInput = false;
//     $selectedColors = array();

//     $data = array();
//     $this->template->title='Group 22 Color Selector Page';
//     $this->template->css='style.css';
//     $this->template->js = "colorTable.js";



//     //need to check if input is valid
//     if($rows >= 1 && $rows <=26 && $colors >= 1 && $colors <= 10) {
//         $validInput = true;
//     }    

//     // if valid display tables file


//     if($validInput == false) {
//         $this->template->content=View::forge('pages/color_coordinate_generation_input',$data);
//         echo "Invalid input choose a number of rows/columns between 1 and 26 and a number of colors between 1 and 10.";

//     }
//     else {
//         $this->template->content=View::forge('pages/color_coordinate_generation_tables',$data);
//         //finding selected colors
//         for($i = 0; $i < 10; $i++) {
//             $varName = 'color'.($i+1);
//             if(isset($_POST[$varName])) {
//                 array_push($selectedColors,$_POST[$varName]);
//             }
//             else {
//                 array_push($selectedColors,'');
//             }
//         }

//         //Creating upper table w/o function ---------------------------
//         $colors_string = array("","red","orange","yellow","green","blue","purple","grey","brown","black","teal");//all colors
//         $colors_string = array_slice($colors_string,0,$colors);

//         $table = "<table style='border: 1px solid black;width='100%';'>";
//         $table .= "<tr><th style='width:20%;'>Color</th> <th>Value</th></tr>";  //initial table row

//         //rest of table rows
//         for($i = 0; $i < $colors; $i++) {
//             $table .= "<tr>";   //new table row
//             $table .= "<td style='width:20%;border: 1px solid black;'>";    //new cell
//             //inside left cell
//             $table .= "<form method='post'>";
//             $table .= "<select name='color$i' id='color$i'>";

//             for($j = 0; $j < count($colors_string); $j++) {
//                 $table .= "<option value='$colors_string[$j]'>$colors_string[$j]</option>";
//             }

//             $table .= "</select></form></td>";
//             //inside right cell
//             // $table .= "<td style='width:20%;border: 1px solid black;'><input type='text' name='value$i'></td>";
//             $table .= "<td style='width:20%;border: 1px solid black;'>".$selectedColors[$i]."</td>";
//             $table .= "</tr>";
//         }


//         //--------------------------------------------------------------

//         //Creating lower table w/o function ---------------------------
//         //letters array
//         $letters = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

//         $table2 = "<table style='border: 1px solid black;width='100%';'>";
//         for ($i = 0; $i < $rows+1; $i++) {  //table rows
//             $table2 .= "<tr>";
//         for ($j = 0; $j < $rows+1; $j++) {    //table columns (cells per row)
//             //First row letter addition
//             if($i == 0 && $j != 0) {    //$i equals zero for first row & $j doesn't equal zero to leave left most cell empty
//                 $table2 .= "<td style='border: 1px solid black;width='3.5%';'>" . $letters[$j-1] . "</td>";
//             }
//             elseif($i > 0 && $j == 0) { //numbering the left most column starting in row two
//                 $table2 .= "<td style='border: 1px solid black;width='3.5%';'>" . ($i - 1) . "</td>";
//             }
//             elseif($i == 0 && $j == 0) {    //leaving top left blank
//                 $table2 .= "<td style='border: 1px solid black;width='3.5%';'></td>";
//             }
//             else{
//                 // $table2 .= "<td style='border: 1px solid black;'>(" . ($i+1) . ", " . ($j+1) . ")</td>";
//                 $table2 .= "<td style='border: 1px solid black;width='3.5%';'></td>";

//             }
//         }
//         $table2 .= "</tr>";
//         }
//         $table2 .= "</table>";
//         //--------------------------------------------------------------
//         $tables = $table . "<br><br>" . $table2;


//         echo $tables;
//     }

// }


// }



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
        $table = "<header><script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><header>";
        $table .= "<h3 id='insh' style = 'color:red'></h3><table id = 'toptable' style='border: 1px solid black;width=90%; height:10%'>";

        //rest of table rows
        for($i = 0; $i < $colors; $i++) {
            if ($i == 0) {
                $table .= "<tr class = '$i' id = 'pselect'>";
            }
            else {
                $table .= "<tr class = '$i'>";   //new table row
            }
            $table .= "<td style='width:20%;border: 1px solid black;'>";    //new cell
            //inside left cell
            $table .= "<form method='post'>";
            if ($i == 0) { //first radio button checked by default
                $table .= "<div id='dsel' class = 'divy'><input id='selected' class='rbutt' type=radio checked><select class='sels' style = 'width:80%;'>";
            }
            else {
                $table .= "<div class = 'divy'><input class = 'rbutt' type=radio><select class='sels' style = 'width:80%;'>";
            }
            $rloop = 0;
            for($j = 0; $j < 10; $j++) {
                $ind = $j + $i;
                if ($ind >= 10) {
                    $ind = 0 + $rloop;
                    $rloop++;
                }
                $table .= "<option class='nchoice' value='$colors_string[$ind]'>$colors_string[$ind]</option>";
            }

            $table .= "</select></div></form></td>";
            //inside right cell
            $table .= "<td id ='$i' style='width:80%;border: 1px solid black;'></td>";
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
                    $lt = $letters[$j-1];
                    $nb = $i-1;
                    $table2 .= "<td class = 'clckable' id = '$lt$nb' style='border: 1px solid black;'></td>";

                }
            }
            $table2 .= "</tr>";
        }
        $table2 .= "</table>";
        //--------------------------------------------------------------
        $table2 .= "<script>
                $(document).ready(function () {
                    $('.sels').click(function () {
                        $(this).data('og', this.value);
                            }).change(function () {
                                var indic = -2;
                                var newdiv = this.parentElement;
                                var divs = document.getElementsByClassName('divy');
                                var color = newdiv.getElementsByTagName('select')[0].value;
                                for (let j = 0; j < divs.length; j++) {
                                    var dcheck = divs[j].getElementsByTagName('select')[0].value;
                                    if (color == dcheck) {
                                        indic++;
                                    }
                                }
                                if (indic < 0) {
                                    var clid = this.parentElement.parentElement.parentElement.parentElement;
                                    var colsq = clid.lastChild.innerHTML;
                                    vals = colsq.replaceAll(',', ' ');
                                    let arr = vals.split(/ /);
                                    if (colsq.length > 0) {
                                        for (let i = 0; i < arr.length; i++) {
                                            var cell = document.getElementById(arr[i]);
                                            cell.className = '';
                                            $(cell).addClass(color + ' colored clckable');
                                        }
                                    }
                                }
                                else {
                                    $(this).val($(this).data('og'));
                                    document.getElementById('insh').innerHTML = 'Invalid input - no two color selectors can match, please choose a different color!';
                                }
                        
                    });
                });

                $(document).ready(function () {
                    $('.rbutt').click(function () {
                        var old = document.getElementById('selected');
                        old.checked = false;
                        old.removeAttribute('id');
                        old.parentElement.removeAttribute('id');
                        var oldtr = old.parentElement.parentElement.parentElement.parentElement;
                        oldtr.removeAttribute('id');
                        $(this).checked = true;
                        this.setAttribute('id','selected');
                        this.parentElement.setAttribute('id','dsel');
                        var newtr = this.parentElement.parentElement.parentElement.parentElement;
                        newtr.setAttribute('id', 'pselect');
                    });
                });


                $(document).ready(function () {
                    $('.clckable').click(function () {
                        var ntval = $(this).attr('id');
                        var row = document.getElementById('pselect');
                        var colid = $(row).attr('class');
                        var test = document.getElementById(colid);
                        if (!$(this).hasClass('colored')){
                            var vals = test.innerHTML;
                            if (vals.length == 0) {
                                vals = ntval;
                            }
                            else {
                                vals = vals.replaceAll(',', ' ');
                                let arr = vals.split(/ /);
                                if (arr.length == 1) {
                                    arr[1] = ntval;
                                    vals = '';
                                    arr.sort();
                                    vals = arr[0] + ',' + arr[1];
                                }
                                else {
                                    vals = vals + ' ' + ntval;
                                    let tarr = vals.split(/ /);
                                    vals = '';
                                    tarr.sort();
                                    for (let i = 0; i < tarr.length; i++) {
                                        if ((i+1) == tarr.length) {
                                            vals = vals + tarr[i];
                                        }
                                        else {
                                            vals = vals + tarr[i] + ',';
                                        }
                                    }
                                }
                            }
                            test.innerHTML = vals;
                        }
                        var color = document.getElementById('dsel').getElementsByTagName('select')[0].value;
                        $(this).addClass(color + ' colored');
                        
                        



                        
                    });
                });
                </script>";
        $tables = $table . "<br>" . $table2;
        echo $tables;


        
    }
}


}

?>
