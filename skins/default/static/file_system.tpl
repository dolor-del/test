<div class="file_system_style" style="width: 1170px; margin: 20px auto">
	<?php
	if (isset($_GET['link'])) {
		foreach(scandir($_GET['link']) as $v) {
			if (is_dir($_GET['link'].'/'.$v)) {
				echo '<a href="?link='.(isset($_GET['link']) ? $_GET['link'].'/'.$v : $v).'"><i class="fa fa-folder" aria-hidden="true"></i> '.$v.'</a><br>';
			} else echo '<i class="fa fa-file-code-o" aria-hidden="true"></i> '.$v.'<br>';
		}
	} else {
		foreach (scandir('.') as $v) {
			if(is_dir($v)) {
				echo '<a href="?link='.$v.'"><i class="fa fa-folder" aria-hidden="true"></i> '.$v.'</a><br>';
			} else echo '<i class="fa fa-file-code-o" aria-hidden="true"></i> '.$v.'<br>';
		}
	}
	?>
</div>