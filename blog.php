<?php
error_reporting(0);

function parseArticle($file_content) {
	$lines = explode(PHP_EOL, $file_content);
	$parsed_data = [
		"Title" => null,
		"Content" => "",
	];

	$is_content = false;

	foreach ($lines as $line) {
		$line = trim($line);

		if ($is_content) {
			$parsed_data["Content"] .= $line . PHP_EOL;
			continue;
		}

		if (strpos($line, "Title:") === 0) {
			$parsed_data["Title"] = trim(str_replace("Title:", "", $line));
		}

		if (strpos($line, "Content:") === 0) {
			$is_content = true;
		}
	}

	return $parsed_data;
}

$is_not_found = false;

if (isset($_GET["id"])) {
	$article_id = $_GET["id"];
    $art = "articles/article". $article_id . ".txt";
    $file_content = file_get_contents($art);
	if ($file_content === false) {
		$is_not_found = true;
	} else {
		$parsed_article = parseArticle($file_content);
		$title = $parsed_article["Title"];
		$content = $parsed_article["Content"];
	}
} else {
	$articles = scandir("articles");
	$article_list = "";

	foreach ($articles as &$article) {
		if ($article == "." || $article == "..") {
        	continue;
    	}

    	$art = "articles/". $article;
    	$file_content = file_get_contents($art);
		$parsed_article = parseArticle($file_content);
		$article_id = str_replace(".txt", "", $article);
		$article_list .= "<span><a href='blog.php?id=" . $article_id . "'>" . $parsed_article["Title"] . "</a></span><br>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "templates/head.php"; ?>
</head>
<body>
    <div id="top">
	    <div id="main">
		    <?php include "templates/header.php"; ?>
		    <div id="subject">
		        <article class="content">
                    <?php
					    if (isset($_GET["id"])) {
							if ($is_not_found) {
								echo "<h2>Article not found</h2>";
								echo "<p>The provided article was not found. Maybe you want back to <a href='https://sech1p.ovh'>main page</a>?</p>";
							} else {
								echo "<h2>". $title. "</h2>";
								echo $content;
							}
						} else {
							echo $article_list;
						}
					?>
    		    </article>
	    	</div>
		    <?php include "templates/footer.php"; ?>
    	</div>
    </div>
</body>
</html>