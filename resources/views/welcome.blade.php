<?php
    use Gemini\Laravel\Facades\Gemini;
    use Gemini\Data\Content;
    class ResAI{
        public $model;
        function __construct(){
            $this->model = Gemini::chat($model = "gemini-2.0-flash")->startChat(history: [
                Content::parse(part: "
                You are an AI agent on a Resume making website, and your name is Baltimore. 
                You are here to assist the user with making a resume using Latex.
                You will recieve text from the user, definig their attributes and what they want in their resume.
                You will be provided with an initial .tex document which you can edit some parts of to make the .tex document to user's will.   
                ")
            ]);
        }
        function genText($inp): string{
            return $this->model->sendMessage($inp)->text();
        }
    }
    $mymodel = new ResAI();
    
?>
<x-layout>
    <?php
        echo $mymodel->genText("Address the user. Keep it short. Keep it formal. Ask the user for basic information, [
            Name (Required), 
            Email (Required), 
            Contact (Required),
            Website (Optional), 
            Website Name (Optional),
            Other Link to their profiles (Github, Linkedin, etc) (Optional),
            Ask for these details one by one.
            ]") . "<br><br>";
        echo $mymodel->genText("User's response: {Suresh}, if the name is valid, then continue, else don't") . "<br><br>";
        echo $mymodel->genText("User's response: {suus@gmail.com}, if the name is valid, then continue, else don't") . "<br><br>";
        echo $mymodel->genText("User's response: {s12388}, if the name is valid, then continue, else don't") . "<br><br>";
        echo $mymodel->genText("User's response: {928812388}, if the name is valid, then continue, else don't") . "<br><br>";
        echo $mymodel->genText("User's response: {No}, if the name is valid, then continue, else don't") . "<br><br>";
        echo $mymodel->genText("User's response: {No}, if the name is valid, then continue, else don't") . "<br><br>";

        

        $texdoc =  $mymodel->genText("Now give the user a .tex document without any comments without anything else, just the .tex code");
        $index = 0;
        while($texdoc[$index++] != '\\'){}
        $texdoc = substr($texdoc, $index - 1, -4);
    ?>
    <form action="https://www.overleaf.com/docs" method="post" target="_blank">
        <textarea rows="8" cols="60" name="snip">
            @php
                $length = strlen($texdoc);
                for($i = 0; $i < $length; $i++) {
                    if($texdoc[$i] == '\\') echo "\n";
                    echo $texdoc[$i];
                }
            @endphp
        </textarea>
    <input type="submit" value="Open in Overleaf">
    </form>
</x-layout>