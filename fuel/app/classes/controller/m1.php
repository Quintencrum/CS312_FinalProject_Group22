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
        $table = "<header><script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><header>";
        $table .= "<table id = 'toptable' style='border: 1px solid black;width=100%;'>";

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
                $table .= "<div id='dsel'><input id='selected' class='rbutt' type=radio checked><select class='sels' style = 'width:80%;'>";
            }
            else {
                $table .= "<div><input class = 'rbutt' type=radio><select class='sels' style = 'width:80%;'>";
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

                // $(document).ready(function () {
                //     $('option').click(function () {
                //         console.log('newcolor');
                //     });
                // });

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
                        this.setAttribute('selected','sel');
                        this.parentElement.setAttribute('id','dsel');
                        var newtr = this.parentElement.parentElement.parentElement.parentElement;
                        newtr.setAttribute('id', 'pselect');
                    });
                });

                // $(document).ready(function () {
                //     $('.sels').click(function () {

                //     });
                // });

                $(document).ready(function () {
                    $('.clckable').click(function () {
                        var ntval = $(this).attr('id');
                        var row = document.getElementById('pselect');
                        var colid = $(row).attr('class');
                        var test = document.getElementById(colid);
                        if (!$(this).hasClass('colored')){
                            var vals = test.innerHTML;
                            let lar = vals.split(/ /);
                            console.log(lar.length);
                            if (vals.length == 0) {
                                vals = ntval;
                            }
                            else if (lar.length == 1) {
                                vals = vals + ' ' + ntval;
                                let arr = vals.split(/ /);
                                vals = '';
                                arr.sort();
                                for (let i = 0; i < arr.length; i ++) {
                                    if (i==0) {
                                        vals = arr[i] + ',';
                                    }
                                    else {
                                        vals = vals + arr[i];
                                    }
                                }
                            }
                            else {
                                console.log(vals);
                                console.log(vals);
                                vals = vals+ntval;
                                console.log(vals);
                                let arr = vals.split(/, /);
                                vals = '';
                                console.log(arr);
                                arr.sort();
                                console.log(arr);
                                console.log(arr.length);
                                for (let i = 0; i < arr.length; i ++) {
                                    if (i==0) {
                                        vals = vals + arr[i] + ',';
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
