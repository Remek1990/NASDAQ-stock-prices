<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nasdaq stock prices</title>
	<script src="Jquery/jquery-3.3.1.min.js"></script>
        <script src="javascript/script.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>Nasdaq current stock prices</h1>
	</header>
	<div class="info">
            <p class='message_form'></p>
	</div>
	<div id="wrap">
	<!-- change data-action (make an appropriate directory path to nasdaq.php)
	It should always end with /php/nasdaq.php and start from the folder in which the whole project is set up-->
            <form id="form_id" data-action="/datanyze/php/nasdaq.php" action="" method="post" autocomplete="off">
                <input id="search" name="form[stock]" type="text" placeholder="Enter NASDAQ stock symbol">
                <input id="search_submit" value="Send" type="submit" name="form[submit]">
	  </form>
	</div>
        <div class="description">
            <p>Enter a stock symbol and click <b>"Search"</b> or hit <b>"Enter"</b> to find out its current value.</p>
	</div>
</body>
</html>
