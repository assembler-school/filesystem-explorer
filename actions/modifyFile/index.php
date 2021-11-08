<?php 

# Verify this file is called from POST request
$action = isset($_POST) && isset($_POST['action']) ? $_POST['action'] : null; 

require_once('../../config.php');
require_once(ROOT.'utils/getFolderContent.php');

# Depends on the action POST, we can: 
# - Rename file
# - Move file to another dir
# - Edit file if it allows

/**
 * Rename File. We can use rename() method.
 * It takes oldname or olddir & newname or new dir
 * Can be use it to move files between folders
 */
$rootPath = ROOT."drive";
$path = $rootPath."/".$_POST['currentPath'];

if ($action === 'rename') {
  $currentName = $path."/".$_POST['currentName'];
  $newName = $path."/".$_POST['newName'];
  rename($currentName, $newName);
}

if ($action === 'moveFile') {
  $currentPath = $path."/".$_POST['currentName'];
  $newPath = $rootPath.$_POST['newPath']."/".$_POST['currentName'];

  rename($currentPath, $newPath);
}

?>

<?php 
  # Simple test
  $fileName = 'hello.txt';
  $dirPath = 'test';
  var_dump(getFolderContent(ROOT.ROOT_DIRECTORY));
?>

<div>
  <h1><?php echo $fileName; ?></h1>
  <p><?php echo "$dirPath/$fileName"; ?></p>

  <form method="post">
    <input type="hidden" name="action" value="rename">
    <input type="hidden" name="currentPath" value="<?php echo $dirPath; ?>" />
    <input type="hidden" name="currentName" value="<?php echo $fileName; ?>" />
    <input type="text" name="newName" value="<?php echo $fileName; ?>">
    <button type="submit">Rename file</button>
  </form>

  <form method="post">
    <input type="hidden" name="action" value="movefile">
    <input type="hidden" name="currentName" value="<?php echo $fileName; ?>" />
    <input type="hidden" name="currentPath" value="<?php echo $dirPath; ?>" />
    <input for="inputPath" type="text" name="newPath" value="<?php echo $dirPath; ?>" />
    <label id="inputPath">Dont add slash at the end "/"</label>
    <button type="submit">Move location</button>
  </form>

</div>