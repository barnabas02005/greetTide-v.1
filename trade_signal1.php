<?php
$received = trim($_GET['order']) ;
//echo $received;

$con = mysqli_connect('localhost', 'root', '', 'mt4');
// $ticket[] = 0;
$symbol[] = "";
$lots[] = 0;
$ordertype[] = 1;
$Ea_name[] = "";
$timeframe[] = "";
$tfDigit[] = 0;
// $time[] = date("YYYY-mm-dd HH:i:a");
// $orderprofit[] = 0;
$pos = explode("|", $received);

for($i = 0; $i < count($pos)-1; $i++)
{
			// echo $pos[$i]
			$order = explode("," , $pos[$i]);
			// echo count($order);
			// $ticket[$i] = $order[0];
			$symbol[$i] = $order[0];
			$lots[$i] = $order[1];
			$ordertype[$i] = $order[2];
			$Ea_name[$i] = $order[3];
			$timeframe[$i] = $order[4];
			$tfDigit[$i] = $order[5];
			// $time[$i] = $order[4];
			// $orderprofit[$i] = $order[5];
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
									if(mysqli_query($con, "INSERT INTO mt4order (`symbol`, `lots`, `ordertype`,`Ea`,`timeframe`,`tf_digit`, `time`) VALUES('$symbol[$i]', '$lots[$i]', '$ordertype[$i]', '$Ea_name[$i]', '$timeframe[$i]', '$tfDigit[$i]', now())"))
									{
												// echo "2";
												//INSERT INTO mt4order (ticket, symbol, ordertype, price) VALUES('$ticket[$i]', '$symbol[$i]', '$ordertype[$i]', '$price[$i]')"
									}
									else 
									{
												echo "Error: " . $sql . "<br>" . mysqli_error($con);
												echo '0';
									}
						}
						echo '1';
			// } else echo '0';
}
mysqli_close($con);
?>