<?php
      $received = trim($_GET['order']) ;
      //echo $received;

      $con = mysqli_connect('localhost', 'root', '', 'mt4');
      $symbol[] = "";
      $buyPrice[] = 0;
      $sellPrice[] = 0;
      $highestPrice[] = 0;
      $lowestPrice[] = 0;
      //$time[] = date("YYYY-mm-dd HH:i:a");
      $pos = explode("|", $received);

      for($i = 0; $i < count($pos)-1; $i++)
      {
            // echo $pos[$i]
            $order = explode("," , $pos[$i]);
            // echo count($order);
            $symbol[$i] = $order[0];
            $buyPrice[$i] = $order[1];
            $sellPrice[$i] = $order[2];
            $highestPrice[$i] = $order[3];
            $lowestPrice[$i] = $order[4];
            
      }

      if (mysqli_connect_error())
      {
            // echo '0';
            echo "Failed in connecting to database!";
            echo mysqli_connect_error();
      }
      else
      {
            
                  for($i = 0; $i < count($pos) - 1; $i++)
                  {
                        if(mysqli_query($con, "INSERT INTO prices (`symbol`, `buy_price`,`sell_price`,`highest_price`, `lowest_price`, `date`) VALUES('$symbol[$i]', '$buyPrice[$i]', '$sellPrice[$i]', '$highestPrice[$i]', '$lowestPrice[$i]', now())"))
                        {
                              // echo "2";
                              //INSERT INTO mt4order (ticket, symbol, ordertype, price) VALUES('$ticket[$i]', '$symbol[$i]', '$ordertype[$i]', '$price[$i]')"
                        }
                        else{
                              echo "Error: " . $sql . "<br>" . mysqli_error($con);
                              echo '0';
                        }
                  }
                  echo '1';
            
      }
      mysqli_close($con);
?>