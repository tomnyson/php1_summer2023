<html>

<head>
    <title>php demo</title>
</head>

<body>
    <?
	// comment
	# commenet
	/*
		multi lines
	 */
	echo "<h1>render from php </h1>";
	// echo phpinfo();
	/**
	 * khai bao bien
	 */
	$a = 1;
	$b = true;
	$c = 1.1;
	$ten = "Lê Hồng Sơn";
	echo $a . "</br>";
	echo $b . "</br>";
	echo $c . "</br>";
	echo "<h2>" . $ten . "</h2></br>";
	?>
    <?php
	echo "<h1>render from php </h1>";
	// cong 2 so a, b in ra ket qua;
	$soThu1 =  10;
	$soThu2 =  30;
	$tong = $soThu1 + $soThu2;
	echo "<h1>Tổng 2 số là: $tong </h2>"
	?>

    <h1>hello world</h1>
    <?php 
	 /**
	  * nhập vào 2 cạnh a , b tính chu vi và diện tích của của hình chữ nhật
	  
	  */
	?>
</body>

</html>