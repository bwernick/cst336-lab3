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
    $shuff = array(); //$shuff determines the order in which cards will be drawn
    $cards = array();//$cards implements value & suit for each card from shuff
    $playerNames = array("Thanos", "Pepe", "Ainz", "God"); //player names
    $playerHands = array("Thanos"=>$Thanos, "Pepe"=>$Pepe, "Ainz"=>$Ainz, "God"=>$God);
    
        
      function play(){
        global $shuff;
        global $cards;
        global $playerNames;
        global $playerHands;
        
        //Set up deck order and cards array
        for($i = 1; $i <= 52; $i++)
          $shuff[] = $i;
        
        for($i = 0; $i < 52; $i++){//Fisher-Yates shuffle
          $j = rand(0,51);
          $temp = $shuff[$i];
          $shuff[$i] = $shuff[$j];
          $shuff[$j] = $temp;
        }
        //var_dump($shuff);//test line
        echo "<br><br>";
        
        //Find the info for a card by knowing its number, applying divison and mod
        //suit: clubs = 0, diamonds = 1, hearts = 2, spades = 3 --> Translates to folder names
        //value: 1-13 maps to Ace through King --> Translates to .png names
        for($i = 0; $i < 52; $i++)
          $cards[$i] = array("value"=>($i%13)+1, "suit"=>(int)($i/13));
          
        var_dump($cards);//test line
        echo "<br><br>";
        
        $Thanos = array();
        $Pepe = array();
        $Ainz = array();
        $God = array();
        
        //Deal hands
        $shuffCount = 0;
        //echo "Start of for/while <br>";
        for($i = 0; $i < 4; $i++){//For each player, draw cards until cutoff
          $curName = $playerNames[$i];
          //echo "$curName is currently drawing <br>";
          while(getScore($curName) < 37){//FIXED
            $playerHands[$curName][] = $shuff[$shuffCount];
            $shuffCount++;
            //var_dump($playerHands[$curName]);
          }
        }
              
        //Print results, return array of scores, feeds to getWinner and winner is got
        getWinner(printTable());
        
        
        
      }
      
      
      function showCard($value, $suit){
        $value++;
        echo "<div class='cards'><img src='img/$suit/$value.png' alt='Suit: $suit Value: $value' style='width=75px'></div>";
      }
      
      function showHand($hand){
        global $shuff;
        global $cards;
        global $playerNames;
        global $playerHands;
        //var_dump($hand);
        for($i = 0; $i < count($hand); $i++){  //iterate through whole hand
          $card = $hand[$i];
          //var_dump($card);
          showCard($cards[$card]["value"], $cards[$card]["suit"]);  //print each card in hand
        }
      }
      
      function getScore($name){
        global $shuff;
        global $cards;
        global $playerNames;
        global $playerHands;
        
        $score = 0;
        //echo count($playerHands[$name]);
        $playersHand = $playerHands[$name];
        //var_dump($playersHand);
        for($i = 0; $i < count($playersHand); $i++){
          
          $cardIndex = $playersHand[$i];
          //var_dump($cardIndex);
          $score += $cards[$cardIndex]["value"];
        }
        //echo"<br> $score is the current score <br>";
        return $score;
      }
      
      function showPlayer($name){
        echo "<figure><img src='img/players/$name.png' alt = 'player $name'><figcaption><b>$name</b></figcaption></figure>"; //show player image with name below them
      }
      
      function getWinner($scores){
        global $shuff;
        global $cards;
        global $playerNames;
        global $playerHands;
        
        $max = 0;
        for($i = 0; $i < 4; $i++){
          if($scores[$i] > $max && $scores[$i] <= 42){
            $max = $scores[$i];
          }
        }
        
        for($i=0;$i<4;$i++){
          if($max == $scores[$i]){
            $i++;
            echo "<h2>Player $i is the winner!</h2>";
          }
        }
        
      }
      
      //echos divs for use as a table for players, cards, and score
      function printTable(){
        global $shuff;
        global $cards;
        global $playerNames;
        global $playerHands;
        
        $scores = array();
        for($i=0;$i<4;$i++){
          array_push($scores, getScore($playerNames[$i]));
        }
        
        for($i=0;$i<4;$i++){
          $name = $playerNames[$i];
          echo "<div class='table'>"; //one player per loop
            //player icon and name, to be on the left
            echo "<div class='playerCell'>";
            showPlayer($name);
            echo "</div>";
            
            //player hand, in the middle
            echo "<div class='cardCell'>";
            showHand($playerHands[$name]);
            echo "</div>";
            
            //score, on the right
            echo "<div class='scoreCell'>";
            array_push($scores, getScore($name));
            echo "<b>Score: $scores[$i]</b>";
            echo "</div>";
          echo "</div>";
        }
        return $scores;
      }
      
      //Play Silverjack
      $time_start = microtime(true); //Start of script run
      
      play();
      
      $time_end = microtime(true);  //end of script run
      $execution_time = ($time_end - $time_start)/60; //get execution time in minutes and seconds
      echo "<h3>Execution Time:" . $execution_time . " Mins</h3> <br><br>";  //Print execution time
    ?>
    
    <h3><a href="index.php">Play Again?</a></h3>
    
    <br><br>
    <hr>
    <footer>
      
    </footer>
  </body>
  
</html>
