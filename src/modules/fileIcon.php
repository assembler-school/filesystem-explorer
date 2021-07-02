<?php
// Return icon string on given path
function getFileIcon($fType)
{
    // Assign correct icon
    switch ($fType):
        case "directory":
            return "folder";
            break;
        case "doc":
            return "file-word";
            break;
        case "csv":
            return "file-csv";
            break;
        case "jpg":
            return "file-image";
            break;
        case "jpeg":
            return "file-image";
            break;
        case "heic":
            return "file-image";
            break;
        case "png":
            return "file-image";
            break;
        case "txt":
            return "file-alt";
            break;
        case "rtf":
            return "file-alt";
            break;
        case "ppt":
            return "file-powerpoint";
            break;
        case "odt":
            return "file-alt";
            break;
        case "pdf":
            return "file-pdf";
            break;
        case "zip":
            return "file-archive";
            break;
        case "rar":
            return "file-archive";
            break;
        case "exe":
            return "exe";
            break;
        case "svg":
            return "file-image";
            break;
        case "mp3":
            return "file-music";
            break;
        case "x-wav":
            return "file-audio";
            break;
        case "mp4":
            return "file-audio";
            break;
        case "plain":
            return "file-code";
            break;
        default:
            return "question-circle";
            break;
    endswitch;
}
