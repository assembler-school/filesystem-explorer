# PHP Local FileSystem explorer  :technologist:

In this project we have created a system file explorer that allows the user to navigate, create directories and upload files in the same way as he would in his usual operating system.

The file explorer is a tool that allows you to directly view and manipulate the files and directories associated with a path, so we must take into account from which path the user starts and which path they can access.

## Technologies used

**For development**

- HTML
- CSS
- JS
- PHP

**For design and planning**
- [Figma](https://www.figma.com/);

## Before start

Before start this project we have created:

* **Wireframes of out files explorer**

_Wireframe_ 

<img width="789" alt="Captura de pantalla 2023-01-17 a las 16 24 28" src="https://user-images.githubusercontent.com/115942758/213027634-c7e34342-bd89-4ae5-a396-633ef17f0e77.png">

_Final Page_

<img width="1319" alt="Captura de pantalla 2023-01-17 a las 23 12 05" src="https://user-images.githubusercontent.com/115942758/213032659-ed9a4e8b-37f7-47a7-9ab9-7a7e5a28e404.png">

**Comparison of the original design (Wireframe) with the final result of the project**

As you can see, during the work we have modificated the page for better UX and UI design:

- Added buton "Sing out" if the user want close the session,
- Added folder "Trash" if the user want to restore deleted file in the future,
- The content of the file now we can see in pop-up after "click" at the file(in the wireframe if was situated at rhe right part of display),
- We will be relocated to editor-page if we want to edit file in text format (.txt),
- We will be relocated to search-page if we want to find any file r folder (enter the "first enter" in "search)


* **Use case diagram**

<img width="793" alt="Captura de pantalla 2023-01-17 a las 22 39 33" src="https://user-images.githubusercontent.com/115942758/213028040-f01fc371-5080-4ab3-bec3-deab2ba0741c.png">

**Comparison of the use case diagram with the actions that the user can finally perform:

- Log in - yes, Sign up - no;
- If you want Upload file, first you need to choose folder and just then a file;
- Added options: edit text file, relocate files between folders, create subfolders



## Organizationd and distribution of the tasks

Sush as [**Valentino Traverso**](https://github.com/valentraverso) has more expirience in PHP, he has taken the leading role in this project. 

*_The biggest part_* of the time we have used *peer coding* to see together how work diferent PHP methods and share experience:
- Interfaces for Log in/Sign out, General Files Explorer page, Edit .txt document;

Then, we shared tasks:
[**Valentino Traverso**](https://github.com/valentraverso): created functions to search files and folders in subfolders;
[**Iuliia Shikhanova**](https://github.com/IuliiaNova): created functions to move files between folders


## Sources of information :bulb:

PHP official [website](https://www.php.net/)


## Goals of the project

- Understand how works PHP in the real project,
- Using of fetch to pass dates from PHP to JS,
- Improve our knowledges in logic and programming,
- Understand what is a file system and how it works,


## Authors :pencil2:

This project was made for [Assembler Institute of Technology](https://assemblerinstitute.com/) by:
[**Valentino Traverso**](https://github.com/valentraverso) and 
[**Iuliia Shikhanova**](https://github.com/IuliiaNova)
