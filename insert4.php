<?php
      $received = trim($_GET['order']) ;
      //echo $received;

      $con = mysqli_connect('localhost', 'root', '', 'mt4');
      $fromId[] = 0;
      $symbol[] = "";
      $lots[] = 0;
      $ordertype[] = 1;
      // $time[] = date("YYYY-mm-dd HH:i:a");
      $pos = explode("|", $received);

      for($i = 0; $i < count($pos)-1; $i++)
      {
            // echo $pos[$i]
            $order = explode("," , $pos[$i]);
            // echo count($order);
            $fromId[$i] = $order[0];
            $symbol[$i] = $order[1];
            $lots[$i] = $order[2];
            $ordertype[$i] = $order[3];
            // $time[$i] = $order[4];
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
                        if(mysqli_query($con, "INSERT INTO hedge_trades (`from_trade`, `symbol`, `lot`, `ordertype`, `timing`) VALUES('$fromId[$i]', '$symbol[$i]', '$lots[$i]', '$ordertype[$i]', now())"))
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