<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			<?php
			$songcount = 5678;
			print "			I love music.
						I have $songcount total songs,
						which is over 567 hours of music!";
			?>
		</p>
		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

			<ol>
				<?php
				$newspages = $_GET["newspages"];
				if($newspages > 0 and $newspages < 5){
					$newspages = $newspages;
				} else{
					$newspages = 5;
				}

				$news_pages = array("https://www.billboard.com/archive/article/201910","https://www.billboard.com/archive/article/201910","https://www.billboard.com/archive/article/201909",
														"https://www.billboard.com/archive/article/201908","https://www.billboard.com/archive/article/201907");
				for ($i = 0; $i < $newspages; $i++) {	 ?>
			    <li><a href=<?= $news_pages[$i] ?>> 2019-<?= 11-$i ?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
				$artist = file("favorite.txt");
				$artistlink = file("favoritelinks.txt");
				for ($i=0; $i < count($artist) ; $i++) { ?>
					<li><a href = <?= $artistlink[$i] ?>> <?= $artist[$i] ?> </a> </li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				$musics = glob("lab5/musicPHP/songs/*.mp3");
				$musiclinks = file("musiclinks.txt");
				usort($musics);
				for ($i=0; $i < count($musics) ; $i++) { ?>
					<li class="mp3item">
						<a href= <?= $musiclinks[$i]  ?>>
						<?php
						$music = basename($musics[$i]);
						print_r($music);
						?>
					</a>
					<?php
					$size = filesize($musics[$i])/1024;
					$size = floor($size);
					echo " ($size)KB";
					echo "<br />"; ?>
					</li>
				<?php } ?>

				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$m3u = glob("lab5/musicPHP/songs/*.m3u");
				foreach ($m3u as $list) {
					$m3ubase = basename($list); ?>
					<li class="playlistitem"> <?php echo $m3ubase; echo "<br/>" ?>
						<ul>
					<?php
					$lines = file($list);
					shuffle($lines);
					foreach ($lines as $inside) {
						if ($inside[0] != "#"){ ?>
							<li> <?php echo $inside; echo "<br/>" ?> </li>
						<?php } ?>
				<?php	}?>
			</ul>
			<?php	}?>
					</ul>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
