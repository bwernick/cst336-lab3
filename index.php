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
          $cards[$i] = array("value"=>$i%13, "suit"=>(int)($i/13));
          
        //var_dump($cards);//test line
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
          echo "$curName is currently drawing <br>";
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
        echo "<img src= 'img/$suit/$value' alt = 'Suit:$suit Value:$value'>";
      }
      
      function showHand($hand){
        global $shuff;
        global $cards;
        global $playerNames;
        global $playerHands;
        var_dump($hand);
        for($i = 0; $i < count($hand); $i++){  //iterate through whole hand
          $card = $hand[$i];
          var_dump($card);
          showCard($card["value"], $card["suit"]);  //print each card in hand
        }
      }
      
      function getScore($name){
        global $shuff;
        global $cards;
        global $playerNames;
        global $playerHands;
        
        $score = 0;
<<<<<<< HEAD
        //echo "count($hand)";
        for($i = 0; $i < count($hand); $i++){ //ISSUE: infinite looping for loop
          //$score += $cards[$hand[$i]][$i]["value"];
          echo "in the for loop";
        }
        print("$score is the current score <br>");
=======
        //echo count($playerHands[$name]);
        $playersHand = $playerHands[$name];
        var_dump($playersHand);
        for($i = 0; $i < count($playersHand); $i++){
          
          $cardIndex = $playersHand[$i];
          var_dump($cardIndex);
          $score += $cards[$cardIndex]["value"];
        }
        echo"<br> $score is the current score <br>";
>>>>>>> c5e6b426ca03396288a36159766af6d7df4df187
        return $score;
      }
      
      function showPlayer($name){
        echo "<figure><img src='img/players/$name.png' alt = 'player $name'><figcaption>$name</figcaption></figure>"; //show player image with name below them
      }
      
<<<<<<< HEAD
      //Should work when getScore() works
      /*function getWinner(){
=======
      function getWinner($scores){
>>>>>>> c5e6b426ca03396288a36159766af6d7df4df187
        global $shuff;
        global $cards;
        global $playerNames;
        global $playerHands;
        
<<<<<<< HEAD
        $scores = array();
        for($i=0;$i<4;$i++){
          array_push($scores, getScore($playerHands[$i]));
        }
        
=======

>>>>>>> c5e6b426ca03396288a36159766af6d7df4df187
        $winner = max($scores);
        
        for($i=0;$i<4;$i++){
          if($winner == $scores[$i]){
            $i++;
            echo "<h2>Player $i is the winner!</h2>";
          }
        }
        
      }
      
      function printTable(){  //INFINITE LOOP OF PEPE
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
          echo "<div class='col'>"; //one player per loop
          //player icon and name, to be on the left
          echo "<div class='row'>";
          showPlayer($name);
          echo "</div>";
          
          //player hand, in the middle
          echo "<div class='row'>";
          showHand($playerHands[$name]);
          echo "</div>";
          
          //score, on the right
          echo "<div class='row'>";

          array_push($scores, getScore($name));
          echo "Score: $scores[$i]";
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
      echo "<h3>Execution Time:" . $execution_time . "Mins</h3> <br><br>";  //Print execution time
    ?>
    
    <h3><a href="index.php">Play Again?</a></h3>
    
    <br><br>
    <hr>
    <footer>
      
    </footer>
  </body>
  
</html>
