<?php
class Controller_eastwest extends Controller_Template {

    public $numRowsColumns = "";    //number of rows/columns
    public $numColors = "";         //number of colors

public function action_index(){ //Probably need to RENAME
    $data = array();
    if(isset($_GET['numRowsColumns']) && isset($_GET['numColors'])){
        $rows = (int) $_GET['numRowsColumns'];
        $cols = (int) $_GET['numColors'];

        //Checking for valid input
        if($rows >= 1 && $rows <=26 && $colors >= 1 && $colors <= 10) {
            
        }


    }
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