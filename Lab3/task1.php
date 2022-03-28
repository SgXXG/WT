<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 1</title>
</head>
<body>
<?php

class FormBuilder {
    public const METHOD_POST = 0;
    public const METHOD_GET  = 1;

    private string $formText;
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
            "<input type=\"text\" name=\"$name\" value=\"$defaultValue\" /></br>";
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

    private function addLabelFor(string $name, $text){
        $this->formText .=
            "<label for=\"$name\" >$text</label>";
    }
}

$formBuilder = new FormBuilder(FormBuilder::METHOD_POST, '/task1.php', 'Send me!');
$formBuilder->addTextField('someTextField', 'Enter text: ', 'Value');
$formBuilder->addRadioGroup('radioGroup', 'Radio: ', ['A', 'B', 'C', 'D', 'E']);
$formBuilder->addSelectList('selectList', 'Select list:', ['Black', 'White', 'Yellow', 'Blue', 'Red']);
$formBuilder->getForm();

?>
</body>
</html>
