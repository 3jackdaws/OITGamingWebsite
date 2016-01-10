
    <?php
    sleep(2);
    $ng = $_POST["game"];
    if(strlen($ng) < 60)
    {
        $game = $ng;
        $fout = fopen("./suggested_games.txt", "a");
        if(filesize("./suggested_games.txt") > 1)
        {
            $game = ";" . $ng;
        }

        if(fwrite($fout, $game))
        {
            echo "Thank you for suggesting <i>$ng</i>.";
        }
        else
        {
            echo "There was a problem processing your suggestion.";
        }
    }
    else
    {
        echo "Your suggestion is too large.";
    }
    ?>