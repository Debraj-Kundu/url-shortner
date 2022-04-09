<?php
    include 'db.php';
    $conn = new Database();

    $conn = $conn->connect();

    $tb = "SELECT * FROM url_short";
    $query = $conn->query($tb);
    $urls = [];
    if($query){
        $result = $query;
        while($row = $result->fetch_row()) {
            $urls[] = $row;
        }
    }else{
        echo "Error occured";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <title>Url shortner</title>
</head>
<body>
    <header>
        <h1 style="letter-spacing: 2px; font-family: 'Permanent Marker', cursive; font-weight: 700; font-size: 56px;">URL <span style="letter-spacing: 2px; font-family: 'Permanent Marker', cursive;color: #8C38FF;font-size: 56px; margin-right: 7px;">s</span>HORTNER</h1>
    </header>
    <main>
    <section class="form">
			<form action="./add/index.php" method="post" autocomplete="off">
				<input type="text" name="long_url" id="long_url" placeholder="url enter kariye" />
				<input type="submit" value="Short Karo!" />
			</form>
		</section>
    </main>
    <section class="urls">
		<?php $idx=1; foreach ($urls as $url) : ?>
			<div class="url">
				<div class="id">
					<?= $idx++; ?>
				</div>
				<div class="short_url">
					<a href="http://localhost/url/r/?id=<?=$url[0]?>" target="_blank">
                    http://localhost/url/r/?id=<?= $url[0]; ?>
					</a>
				</div>
				<div class="long_url">
					<p><?= $url[1]; ?></p>
				</div>
                <form style="margin-left: 7px;" action="./delete/index.php" method="POST">
                    <input  type="hidden" name="id" value="<?=$url[0]?>">
                    <input type="submit" value="Delete" style="display: block;padding: 8px 12px;appearance: none;border: none;outline: none;background: none;cursor: pointer;background-color: #8C38FF;color: #FFF;font-weight: 700;border-radius: 8px ;">
                </form>
			</div>
		<?php endforeach; ?>
	</section>
</body>
</html>


