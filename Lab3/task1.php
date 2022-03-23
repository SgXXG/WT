<?php

class FormBuilder {

    private $text;
    public function Generate()
    {
        echo
        "   <!DOCTYPE HTML>
            <html>
            <head>
                <meta charset = 'utf-8'>
                <title> task 1 </title>
            </head>
            <body>
                $this->text
            </body>
            </html>
            ";
    }

    public function AddTextField($str, $str1){
        $this->text.=
        "       <label for='fname'>$str:</label>
                <input type='text' id='fname' name='fname' value='$str1'> <br>
            ";
    }

    public function GetRadioGroup($str, $str1){
        foreach ($str1 as $c)
        $this->text.=
        "       <label for='fname'>$c:</label>
                <input type='radio' id='fname' name='$c'><br> ";
    }

    public function GetPage($text, $rg){
        echo
        "
            <!DOCTYPE HTML>
            <html>
            <head>
                <meta charset = 'utf-8'>
                <title> task 1 </title>
            </head>
            <body>
                $text
                $rg    
            </body>
            </html>
        ";
    }
}

$formBuilder = new FormBuilder();
$formBuilder->AddTextField('Name', 'Value');
$formBuilder->GetRadioGroup('Radio Name', ['A', 'B']);

$formBuilder->Generate();


