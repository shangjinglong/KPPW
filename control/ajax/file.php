<?php
switch ($ajax){
	case "download":
		keke_file_class::file_down($file_name, $file_path);
		break;
}
