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
        /*var_dump($shuff);//test line
        echo "<br><br>";*/
        
        $cards = array();//$cards implements value & suit for each card
        //Find the info for a card by knowing its number, applying divison and mod
        //suit: clubs = 0, diamonds = 1, hearts = 2, spades = 3
        //value: 1-13 maps to Ace through King
        for($i = 0; $i < 52; $i++)
          $cards["$i"] = array("value"=>$i%13+1, "suit"=>(int)($i/13));
        /*var_dump($cards);//test line
  
        echo "<br><br>";*/
        
  
        $playerNames = array("Thanos", "Pepe", "Ainz", "God"); //player names
        $Thanos = array();
        $Pepe = array();
        $Ainz = array();
        $God = array();
        $playerHands = array($Thanos, $Pepe, $Ainz, $God);
        
        //Deal hands
        $shuffCount = 0;
        for($i = 0; $i < 4; $i++){
          while(getScore($playerHands[$playerNames[$i]]) < 37){
            array_push($playerHands[$playerNames[$i]], $cards[$shuff[$shuffCount]]);
            $shuffCount++;
          }
        }
              
        //Print results
        //Print table of players and their scores
        printTable();
        
        getWinner();
        

    
      }
      
      
      function showCard($value, $suit){
        echo "<img src= 'img/$suit/$value' alt = '$suit $value'>";
      }
      
      
      function showHand($hand){
        foreach($hand as $card){  //iterate through whole hand
          showCard($card["value"], $card["suit"]);  //print each card in hand
        }
      }
      
      function getScore($hand){//NEED TO FIX FOREACH LOOPS
        $score = 0;
        foreach($hand as $card){
          $score += $card["value"];
        }
        return $score;
      }
      
      function showPlayer($name){
        echo "<figure><img src='img/players/$name.png' alt = 'player $name'><figcaption>$name</figcaption></figure>"; //show player image with name below them
      }
      
      function getWinner(){
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
      
      function printTable(){
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

      //Todo: calculate time to process and display it
      
      $time_end = microtime(true);  //end of script run
      $execution_time = ($time_end - $time_start)/60; //get executiion time in minutes and seconds
      echo "<h3>Execution Time:" . $execution_time . "Mins</h3> <br><br>";  //Print execution time
    ?>
    
    <h3><a href="index.php">Play Again?</a></h3>
    
    <br><br>
    <hr>
    <footer>
      
    </footer>
  </body>
  
</html>
