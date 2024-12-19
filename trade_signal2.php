<?php
      $received = trim($_GET['order']) ;
      //echo $received;

      $con = mysqli_connect('localhost', 'root', '', 'mt4');
      $ticket[] = 0;
      $symbol[] = "";
      $lots[] = 0;
      $ordertype[] = 1;
      $entryprice[] = 0;
      $hedgeprice[] = 0;
      $orderprofit[] = 0;
      $hedging[] = 0;
      $close_trade[] = 0;
      $trade_taken[] = 0;
      $original_trade[] = 0;
      $original_trade[] = 0;
      $manually_taken[] = 0;
      $time[] = date("YYYY-mm-dd HH:i:a");
      $pos = explode("|", $received);

      for($i = 0; $i < count($pos)-1; $i++)
      {
            // echo $pos[$i]
            $order = explode("," , $pos[$i]);
            // echo count($order);
            $ticket[$i] = $order[0];
            $symbol[$i] = $order[1];
            $lots[$i] = $order[2];
            $ordertype[$i] = $order[3];
            $entryprice[$i] = $order[4];
            $hedgeprice[$i] = $order[5];
            $orderprofit[$i] = $order[6];
            $hedging[$i] = $order[7];
            $close_trade[$i] = $order[8];
            $trade_taken[$i] = $order[9];
            $original_trade[$i] = $order[10];
            $manually_taken[$i] = $order[11];
            $time[$i] = $order[12];
      }

      if (mysqli_connect_error())
      {
            // echo '0';
            echo "Failed in connecting to database!";
            echo mysqli_connect_error();
      }
      else
      {
            // if(mysqli_query($con, "TRUNCATE mt4.mt4order"))
            // {
                  for($i = 0; $i < count($pos) - 1; $i++)
                  {
                        if(mysqli_query($con, "INSERT INTO mt4order (`ticket`, `symbol`, `lots`, `ordertype`, `entryprice`, `hedgeprice`, `orderprofit`, `hedging`, `close_trade`, `trade_taken`, `original_trade`, `manually_taken`, `time`) VALUES('$ticket[$i]', '$symbol[$i]', '$lots[$i]', '$ordertype[$i]', '$entryprice[$i]', '$hedgeprice[$i]', '$orderprofit[$i]', '$hedging[$i]','$close_trade[$i]', '$trade_taken[$i]', '$original_trade[$i]', '$manually_taken[$i]', '$time[$i]')"))
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
            // } else echo '0';
      }
      mysqli_close($con);
?>

