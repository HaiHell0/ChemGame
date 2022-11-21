<?php

class card
{
    private string $value1;
    private string $imgURL1;
    private string $value2;
    private string $imgURL2;


    public function __construct(string $value1, string $imgURL1, string $value2, string $imgURL2)
    {
        $this->value1 = $value1;
        $this->imgURL1 = $imgURL1;
        $this->value2 = $value2;
        $this->imgURL2 = $imgURL2;
    }

    public function get_value1(): string
    {
        return $this->value1;
    }
    public function get_imgURL1(): string
    {
        return $this->imgURL1;
    }

    public function get_value2(): string
    {
        return $this->value2;
    }
    public function get_imgURL2(): string
    {
        return $this->imgURL2;
    }
}
class game
{
    private $card_list = array();
    public static function load_resources($id): void
    {
        $config = json_decode(file_get_contents(__DIR__ . '/config.json'), true);
        //echo $config["games"][0]["cards"][0]["value1"];
        $cards = $config["games"][$id]["cards"];

        foreach ($cards as $card) {
            $temp = new card($card["value1"], $card["imgURL1"], $card["value2"], $card["imgURL1"]);
            $card_list[] = $temp;
        }
        echo ('<div id="game">');
        foreach ($card_list as $card) {

            echo ('<div class ="gamecard" id=' . $card->get_value1() . '-' . $card->get_value2() . '>Default picture</div>');
            echo ('<div class ="gamecard" id=' . $card->get_value2() . '-' . $card->get_value1() . '>Default picture</div>');
        }
        echo ('</div>');
    }
    public static function create($true): void
    {
        //load form
        echo ('
        	<div class="container">
                <h1>Matching game custom game</h1>
                
                    <form action="" method="POST" enctype="multipart/form-data">
                    <label for="game-name">Name of the game</label>
                    <input type="textbox" id="game-name" name="game-name" placeholder="name of the game"><br>
                    
                    
                    <button type="button" id="addcouple">Click to add couple</button>
                    <div id="img"></div><br>
                
                    <input type="submit" value="Create Game" name="submit">
                </form>
	</div>
   
        ');
    }
}
if (isset($_GET["game-id"])) {
    game::load_resources($_GET["game-id"]);
}
if (isset($_GET["create"])) {
    game::create($_GET["create"]);
}



?>
<script src="./MatchingGame/MatchingGame.js"></script>
<script>

</script>