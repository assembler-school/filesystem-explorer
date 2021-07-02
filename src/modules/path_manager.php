<?php
function getRootPath()
{
  $rootPath = getcwd();
  $rootPath .= "/root";
  $rootPath = str_replace("\\", "/", $rootPath);
  return $rootPath;
}

function getRoothPathFrModules()
{
  $rootPath = getcwd();
  $rootPath = dirname($rootPath, 2);
  $rootPath = str_replace("\\", "/", $rootPath);
  $rootPath .= "/root";
  return $rootPath;
}

function getRootRelativePath($currentPath)
{
  $expPath = explode("/", $currentPath);
  $startIndexRootPath = array_search("root", $expPath, true);
  $rootRelativePath = "./";
  for ($i = $startIndexRootPath; $i < count($expPath); $i++) {
    $rootRelativePath .=  $expPath[$i] . "/";
  }
  return $rootRelativePath;
}

function removeLastDirectoryPath($directoryPath)
{
  $expFolderPath = explode("/", $directoryPath);
  $baseDirectoryPath = "";
  for ($i = 0; $i < count($expFolderPath) - 1; $i++) {
    $baseDirectoryPath .=  $expFolderPath[$i] . "/";
  }
  return $baseDirectoryPath;
}
