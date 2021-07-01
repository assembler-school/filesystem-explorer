`#html` `#css` `#js` `#php` `#master-in-software-engineering`

# PHP Local FileSystem explorer <!-- omit in toc -->

<p>
  <img alt="preview" src="./documentation/process/Screenshot 2021-07-01 at 12.14.58.png" />
</p>

> This current repository is the result of developing a Local FileSystem using PHP. With this application, you'll be able to navigate through all directories, upload files, editing their names, previewing and deleting them. Besides that, this application also offers you the option of editing file/directory names as well.

> Even though this is an already-working application, there are still some functionalities that can be implemented so keep an eye to this repo for more news!

## Index <!-- omit in toc -->

- [Requirements](#requirements)
- [Installing](#installing)
- [Built with](#built-with)
- [Resources](#resources)
- [TODO](#todo)
- [Bugs](#bugs)

## Requirements

- You cannot use file PHP third-party libraries
- You will not be able to use global variables in PHP.
- You must use GIT
- You must use the PHP v8
- Create a clear and orderly directory structure
- Both the code and the comments must be written in English
- Use the camelCase code style to define variables and functions
- In the case of using HTML, never use inline styles
- In the case of using different programming languages ​​always define the implementation in separate terms
- Remember that it is important to divide the tasks into several sub-tasks so that in this way you can associate each particular step of the construction with a specific commit
- You should try as much as possible that the commits and the planned tasks are the same
  Delete files that are not used or are not necessary to evaluate the project

## Installing

First, choose the location in your computer and clone this repo like so:

_This location must be inside your XAMP or MAMP so that you can open your local server_

```bash

git clone https://github.com/Ricard-Garcia/filesystem-explorer.git

```

This application uses some dependencies so, after cloning the repo, run the following instruction:

```bash

npm install

```

In case you'll like to change the styles, run the following instruction:

```bash

sass --watch ./src/assets/styles/main.scss ./src/assets/styles/styles.css

```

### Folders structure

Notice that \**the home directory will *root* folder* so you'll need to keep this folder inside _src_ to make the application work.

```bash

repo
 ├── documentation
 ├── node_modules
 ├── .gitignore
 └── src
      └── root
           └── (All your files and folders)

```

## Built with

\* HTML

\* CSS

\* JS (jQuery)

\* PHP

## Resources

### FileSystem

- [PHP FileSystem Docs](https://www.php.net/manual/en/ref.filesystem.php)
- [File system](https://es.wikipedia.org/wiki/Administrador_de_archivos)
- [PHP FileSystem W3C](https://www.w3schools.com/php/php_ref_filesystem.asp)

### PHP

- [Get current directory / getcwd()](https://www.php.net/manual/en/function.getcwd.php)
- [Get last item in array / end()](https://www.php.net/manual/es/function.end.php)
- [Scan current directory / scandir()](https://www.php.net/manual/en/function.scandir.php)
- [Remove files / unlink()](https://www.php.net/manual/en/function.unlink.php)
- [Remove directories / rmdir()](https://www.php.net/manual/es/function.rmdir.php)
- [Remove directories / mkdir()](https://www.php.net/manual/en/function.mkdir.php)
- [Navigate from current path / dirname()](https://www.php.net/manual/es/function.dirname.php)

### Refs 👀

- [FileRun](https://filerun.com/)
- [Monsta FTP](https://alternativeto.net/software/monsta-ftp/about/)
- [Filestash](https://alternativeto.net/software/nuage-app/about/)
- [FileRun](https://alternativeto.net/software/filerun--file-manager/)
- [Angular Filemanager](https://awesomeopensource.com/project/joni2back/angular-filemanager)
- [JCampbell File Manager](https://github.com/jcampbell1/simple-file-manager)

### Others

- [Recursive functions](https://www.geeksforgeeks.org/recursive-functions/)
- [HTML arrows](https://www.w3schools.com/charsets/ref_utf_arrows.asp)

### Libraries

- [Bootstrap](https://getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [Fontawesome](https://fontawesome.com/)
- [Iconscout](https://iconscout.com/)

## TODO 🤝

- Create folder / upload file to certain path.
- Show all navigation tree in left sidebar.
- Preview file with `<embed>`/`<iframe>`.
- Delete all/some files using checkboxes.
- Support more file extensions (icons).
- Label files and filter them.
- Responsive design.

## Bugs 🚨

- Reading whitespaces.
- Small jump when in root folder.

## Contributors ✨ <!-- omit in toc -->

👤 [Hugo Duran](https://github.com/Hugo05Duran)
👤 [Ricard Garcia](https://github.com/Ricard-Garcia)
