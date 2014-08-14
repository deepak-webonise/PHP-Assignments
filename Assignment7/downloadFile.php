<?php
require_once "includes/require.php";
if(isset($_GET['id']))
			{
				$fileContent = $db->getFileContent($_GET['id']);
				if($_SESSION['userID'] === $fileContent['userId'])
				{
					
					try
					{
						if (file_exists("upload/".$fileContent['name']))
						{
							/*$file = fopen("upload/".$fileContent['name'],"r");
							if($file)
							{
								while (!feof($file)) {
									$content .=fgets($file);
								}
								echo '<textarea cols="60" rows="20" name="content">'.$content.'</textarea>';
							}*/
							// The original.txt
							// We'll be outputting a text
							header('Content-type: plain/text');

							// It will be called downloaded.txt
							header('Content-Disposition: attachment; filename="downloaded.txt"');
							readfile("upload/".$fileContent['name']);
						}
						else
						{
							echo '<p class="text-danger">File Not Found. Please Retry.</p>';
						}
					}
					catch(Exception $e)
					{
						echo $e->getMessage();
					}
				}
				else
				{
					echo '<p class="text-danger">Invalid File Access.</p>';
				}
			}
?>
