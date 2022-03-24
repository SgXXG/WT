<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
</head>
<body>
<?php

class FormBuilder {
    public const METHOD_POST = 0;
    public const METHOD_GET  = 1;

    protected string $formText;
    private string $submitText;

    public function __construct(int $methodType, string $action, string $submitText) {
        $methodName = '';
        switch ($methodType){
            case self::METHOD_POST: {
                $methodName = 'post';
                break;
            }
            case self::METHOD_GET: {
                $methodName = 'get';
                break;
            }
            default: {
                throw new InvalidArgumentException('Invalid method type value!');
            }
        }

        $this->formText =
            "<form method=\"$methodName\" action=\"$action\">";

        $this->submitText = $submitText;
    }

    public function addTextField(string $name, string $label, string $defaultValue){
        $this->addLabelFor($name, $label);
        $this->formText .=
            "<input type=\"text\" name=\"$name\" value=\"$defaultValue\" ><br>";
    }

    public function addRadioGroup(string $name, string $label, array $values){
        $this->addLabelFor($name, $label);
        foreach ($values as $value) {
            $this->formText .=
                "<input type=\"radio\" name=\"$name\" value=\"$value\" >";
        }
        $this->formText .= '<br>';
    }

    public function addSelectList(string $name, string $label, array $values, int $selectedIndex = 0){
        $this->addLabelFor($name, $label);
        $this->formText .= "<select name=\"$name\">";
        foreach ($values as $index => $value) {
            $this->formText .=
                '<option ' . ($selectedIndex == $index++ ? 'selected="selected"' : '') .
                "value=\"$value\">$value</option>";
        }
        $this->formText .= '</select><br>';
    }

    public function getForm(){
        echo $this->formText . "
            <input type=\"submit\" value=\"$this->submitText\" >
            </form>
        ";
    }

    protected function addLabelFor(string $name, $text){
        $this->formText .=
            "<label for=\"$name\" >$text</label>";
    }
}

class SafeFormBuilder extends FormBuilder {
    public function addTextField(string $name, string $label, string $defaultValue){
        $value = $defaultValue;
        if(isset($_POST[$name]))
            $value = $_POST[$name];

        parent::addTextField($name, $label, $value);
    }

    public function addRadioGroup(string $name, string $label, array $values){
        if(!isset($_POST[$name])) {
            parent::addRadioGroup($name, $label, $values);
        }
        else {
            $this->addLabelFor($name, $label);
            foreach ($values as $value) {
                $selectedValue = $value == $_POST[$name] ? ' checked ' : '';
                $this->formText .=
                    "<input type=\"radio\" name=\"$name\" value=\"$value\" $selectedValue>";
            }
            $this->formText .= '</br>';
        }
    }

    public function addSelectList(string $name, string $label, array $values, int $selectedIndex = 0){

        if(!isset($_POST[$name]) || ($index = array_search($_POST[$name], $values)) == false)
            parent::addSelectList($name, $label, $values, $selectedIndex);
        else {
            parent::addSelectList($name, $label, $values, $index);
        }
    }
}

/*foreach ($_POST as $key => $item) {
    echo "$key => $item<br>";
}*/

$formBuilder = new SafeFormBuilder(FormBuilder::METHOD_POST, '/destination.php', 'Send me!');
$formBuilder->addTextField('someTextField', 'Enter text: ', 'Value');
$formBuilder->addRadioGroup('radioGroup', 'Radio: ', ['A', 'B', 'C', 'D', 'E']);
$formBuilder->addSelectList('selectList', 'Select list:', ['Black', 'White', 'Yellow', 'Blue', 'Red']);
$formBuilder->getForm();

?>
</body>
</html>
