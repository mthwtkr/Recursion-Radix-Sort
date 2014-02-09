<!doctype HTML>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="description" content="" />
	<title>Radix Sort</title>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/dark-hive/jquery-ui.css"/>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"/>
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	
	<script>
	$(document).ready(function(){
	
	});
	</script>
</head>
<!-- PHP DECLARE FUNCTIONS AND VARIABLES -->
<?php
	// Generate random array
	// $size - how many elements
	// $min - minimum value for elements
	// $max - maximum value for elements
	function random_array($size, $min, $max)
	{
		for ($index = 0; $index < $size; $index++) 
		{
			$rand_value = rand($min, $max);
			$array[] = $rand_value;	
		}
		return $array;
	}

	// Build queue with 10 slots (0-9)
	function build_queue()
	{
		for ($index=0; $index < 10; $index++) 
		{ 
			$queue[$index] = [];
		}

		return $queue;
	}


	function reset_array($queue)
	{
		$queue_len = count($queue);

		for ($key = 0; $key < $queue_len; $key++)
		{
			for ($value = 0; $value < count($queue[$key]); $value++) 
			{ 
				$array[] = $queue[$key][$value];
			}
		}

		return $array;
	}

	function radix_recursion($array, $mod, $divisor)
	{
		if ($mod <= 100000)
		{
			$array_len = count($array);
			$queue = build_queue();

			for ($index = 0; $index < $array_len; $index++) 
			{ 
				$remainder = ($array[$index] % $mod) / $divisor;

				switch ((int)$remainder)
				{
					case 0:
						$queue[0][] = $array[$index];
						break;
					case 1:
						$queue[1][] = $array[$index];
						break;
					case 2:
						$queue[2][] = $array[$index];
						break;
					case 3:
						$queue[3][] = $array[$index];
						break;
					case 4:
						$queue[4][] = $array[$index];
						break;
					case 5:
						$queue[5][] = $array[$index];
						break;
					case 6:
						$queue[6][] = $array[$index];
						break;
					case 7:
						$queue[7][] = $array[$index];
						break;
					case 8:
						$queue[8][] = $array[$index];
						break;
					case 9:
						$queue[9][] = $array[$index];
						break;
					default:
						$queue[9][] = $array[$index];
				}
			}
			$array = reset_array($queue);

			$mod *= 10;
			$divisor *= 10;

			$array = radix_recursion($array, $mod, $divisor);

			return $array;
		}
		return $array;
	}

	function radix_sort($array)
	{
		// Declare Variables
		$mod = 10;
		$divisor = 1;

		return radix_recursion($array, $mod, $divisor);
	}

	// Declare Variables
	$array_size = 100000;
	$min = 0;
	$max = 10000;
?>
<!-- END OF PHP DECLARATIONS -->
<body>
	<div class="container">
	    <?php
	    	$time_start = microtime(true);

	    	$random_array = random_array($array_size, $min, $max);
	    	var_dump($random_array);

	    	$sorted_array = radix_sort($random_array);
	    	var_dump($sorted_array);

	    	$time_end = microtime(true);
			$time = $time_end - $time_start;
			echo "Ran scirpt in $time seconds";
	    ?>
	</div> <!--End of #container -->
</body>
</html>