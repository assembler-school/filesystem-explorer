

# FileSystem | Journey <!-- omit in toc -->

## Index <!-- omit in toc -->

- [Day 1](#day-1)

- [TODO](#todo)

## Day 1

Metting in the morning debates:
	* 


**User cases:** leave it as generic as possible.

DONE:

* Display all files in root directory.
* Upload file to root directory.
* Display directories on sidebar.
* Basic layout.


## Day 2

Hugo:

* Edit file/folder
* Delete file/folder

Ricard:

* Display file columns with icons.
* Make dynamic path.

**DONE**:

* Display file columns with icons.
* Make dynamic path.
* Session variable for url (GET method).


**TODO**:
 

## Day 3

How to edit, delete and download files:

```
// Delete
echo "<a href=deleteFile.php?delete=./path/to/file.txt >Delete</a>";

// deleteFile.php
$pathToDelete = $_GET["delete"];
unlink($pathToDelete);

header("Location:./index.php");


// Download
echo "<a href=downloadFile.php?download=./path/to/file.txt >Delete</a>";

// deleteFile.php
$pathToDelete = $_GET["delete"];
unlink($pathToDelete);

header("Location:./index.php");



```


## Day 4

· Create folder
· Edit & delete files/directories









-
## TODO

### Files
* (DONE) Calculate MB
* (DONE)Rename folders
* Filename validation
* Clean .scss
* Solve whitespaces in file names
* Use `embed` tag to preview files.
* Not upload if there are no files
* Copy-copy (...) folder name: alert

### Paths
* Get all files in all directories:
`$dirs = array_filter(glob(‘../root/*’), ‘is_dir’);
## Notes

· To transpile .scss to .css files: `sass --watch ./src/assets/styles/main.scss ./src/assets/styles/styles.css`
· Delete file

-
### WISHLIST
* Delete all/some files (checkbox).
* Bottom path functionality.

