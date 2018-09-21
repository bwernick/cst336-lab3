<!DOCTYPE html>
<html lang=en>
  <head>
    <title>Silverjack!</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      <h1>Silverjack!</h1>
      <br><br>
    </header>
    <hr>
    
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
      //suit: clubs = 0, diamonds = 1, hearts = 2, spades = 3
      //value: 1-13 maps to Ace through King
      for($i = 0; $i < 52; $i++)
        $cards["$i"] = array("value"=>$i%13+1, "suit"=>(int)($i/13));
      var_dump($cards);//test line

      echo "<br><br>";
      

      $playerNames = array("Thanos", "Pepe", "Ainz", "God"); //player names
      
      $player1 = array(); //players have: hands(array of cards), and name
      $player2 = array();
      $player3 = array();
      $player4 = array();
      
      /*
      function showCard($num, $suit){
                echo "<img src= 'img/$suit/$num' alt = '$suit $num'>";
      }
      
      
      function showHand($hand){
        foreach($hand as $card){  //iterate through whole hand
          showCard($card["value"], $card["suit"]);  //print each card in hand
        }
      }
      
      function getScore($hand){
        $score = 0;
        foreach($array as $card){
          $score += $card["value"];
        }
        return $score;
      }
      
      function showPlayer($num, $name){
        echo "<figure><img src='img/players/$num.png' alt = 'player $num'><figcaption>$Name</figcaption></figure>"; //show player image with name below them
      }
      
      function getWinner(){
        $scores = array();
        for($i=1,$i<=4;$i++){
          array_push($scores, getScore($player.$i));
        }
        
        $winner = max($scores);
        
        for($i=0,$i<4;$i++){
          if($winner == $scores[$i]){
            $i++;
            echo "<h2>Player $i is the winner!</h2>"
          }
          
        }
        
      }
      
      function printTable(){
        for($i=0;$i<4;$i++){
          echo "<div class='col'>"; //one player per loop
            //player icon and name, to be on the left
            echo "<div class='row'>";
            showPlayer($i+1, $playerNames[$i]);
            echo "</div>";
            
            //player hand, in the middle
            echo "<div class='row'>";
            showHand($i+1);
            echo "</div>";
            
            //score, on the right
            echo "<div class='row'>";
            $score.$i = getScore(($player . ($i+1)));
            echo "Score: $score.$i";
            echo "</div>";
          echo "</div>";
        }  
      }
      
      
      //Play Silverjack
      
      
      //Print results
      //Print table of players and their scores
      printTable();
      
      getWinner();
      
      //Todo: calculate time to process and display it
      */
      
    ?>
    
    <h3><a href="index.php">Play Again?</a></h3>
    
    <br><br>
    <hr>
    <footer>
      
    </footer>
  </body>
  
</html>
