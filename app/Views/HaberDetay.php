<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Haber detay</title>
	<link href="../app/views/assets/stylesheets/style.css" rel="stylesheet">
	<script src="http://bozok.edu.tr/tema/bozok/js/jquery.min.js"></script>
    <script src="http://bozok.edu.tr/Tema/Default/js/jquery.swipebox.min.js"></script>
    <link rel="stylesheet" href="http://bozok.edu.tr/Tema/Default/css/swipebox.min.css" />
    <script type="text/javascript">
        $(document).ready(function () {
            $('.swipebox').swipebox();
        });
    </script>
</head>
<body>
	<base href="http://bozok.edu.tr/"></base>
	
	<?php echo $haberDetay; ?>
</body>
</html>