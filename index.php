<!DOCTYPE html>
<html lang=en>
  <head>
    <title>Silverjack!</title>
  </head>
  <body>
    <?php
      //Set up deck order and cards array
      $shuff = array();//$shuff determines the order in which cards will be drawn
      for($i = 0; $i < 52; $i++)
        $shuff[] = $i;
      var_dump($shuff);//test line
      echo "<br><br>";
      
      for($i = 0; $i < 52; $i++){//Fisher-Yates shuffle
        $j = rand(0,51);
        $temp = $shuff[$i];
        $shuff[$i] = $shuff[$j];
        $shuff[$j] = $temp;
      }
      var_dump($shuff);//test line
      echo "<br><br>";
      
      $cards = array();//$cards implements value & suit for each card
      //Find the info for a card by knowing its number, applying divison and mod
      //suit: clubs = 1, diamonds = 2, hearts = 3, spades = 4
      //value: 1-13 maps to Ace through King
      for($i = 0; $i < 52; $i++)
        $cards["$i"] = array("value"=>$i%13, "suit"=>(int)($i/13)+1);
      var_dump($cards);//test line
      echo "<br><br>";
      
      //Play Silverjack
      
      //Print results
      
    ?>
    <h1><a href="index.php">Play Again!</a></h1>
  </body>
  
</html>
