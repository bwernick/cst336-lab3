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
      function play(){
        //Set up deck order and cards array
        $shuff = array();//$shuff determines the order in which cards will be drawn
        for($i = 1; $i <= 52; $i++)
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
        //suit: clubs = 0, diamonds = 1, hearts = 2, spades = 3 --> Translates to folder names
        //value: 1-13 maps to Ace through King --> Translates to .png names
        for($i = 0; $i < 52; $i++)
          $cards["$i"] = array("value"=>$i%13+1, "suit"=>(int)($i/13));
          
        var_dump($cards);//test line
        echo "<br><br>";
        
        $playerNames = array("Thanos", "Pepe", "Ainz", "God"); //player names

        $playerHands = array($Thanos=>array(), $Pepe=>array(),$Ainz=>array(),$God=>array());
        
        //Deal hands
        $shuffCount = 0;
        for($i = 0; $i < 4; $i++){//For each player, draw cards until cutoff
          while(getScore($playerHands[$playerNames[$i]]) < 37){//THESE LINES PREVENT PAGE FROM LOADING
            array_push($playerHands[$playerNames[$i]],$cards[$shuff[$shuffCount]]);
            $shuffCount++;
          }
          echo "Player $playerNames[$i] draws cards";//Test line
        }
              
        //Print results
        //Print table of players and their scores
        printTable($playerNames, $playerHands);
        
        getWinner($playerNames, $playerHands);
        
      }
      
      
      function showCard($value, $suit){
        echo "<img src= 'img/$suit/$value' alt = '$suit $value'>";
      }
      
      function showHand($hand){
        for($i = 0; $i < count($hand); $i++){  //iterate through whole hand
          showCard($hand[$i["value"]], $hand[$i["suit"]]);  //print each card in hand
        }
      }
      
      function getScore($hand){
        $score = 0;
        for($i = 0; i < count($hand); $i++){
          $score += $hand[$i["value"]];
        }
        print("$score is the current score <br>");
        return $score;
      }
      
      function showPlayer($name){
        echo "<figure><img src='img/players/$name.png' alt = 'player $name'><figcaption>$name</figcaption></figure>"; //show player image with name below them
      }
      
      function getWinner($playerNames, $playerHands){
        $scores = array();
        for($i=0;$i<4;$i++){
          array_push($scores, getScore($player.$i));
        }
        
        $winner = max($scores);
        
        for($i=0;$i<4;$i++){
          if($winner == $scores[$i]){
            $i++;
            echo "<h2>Player $i is the winner!</h2>";
          }
        }
        
      }
      
      function printTable($playerNames, $playerHands){//INFINITE LOOP OF PEPE
        for($i=0;$i<4;$i++){
          echo "<div class='col'>"; //one player per loop
            //player icon and name, to be on the left
            echo "<div class='row'>";
            showPlayer($playerNames[$i]);
            echo "</div>";
            
            //player hand, in the middle
            echo "<div class='row'>";
            showHand($playerHands[$playerNames[$i]]);
            echo "</div>";
            
            //score, on the right
            echo "<div class='row'>";
            $score.$i = getScore(($playerHands[$playerNames[$i]]));
            echo "Score: $score.$i";
            echo "</div>";
          echo "</div>";
        }  
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
