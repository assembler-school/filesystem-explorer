<?php

// diferent icons to show in



function showIcons($rootPath)
{
    $rootPath = "./root";
    $extension = strtolower(pathinfo($rootPath, PATHINFO_EXTENSION));

    switch ($extension) {
        case "ico":
        case "gif":
        case "jpg":
        case "jpeg":
        case "jpc":
        case "jp2":
        case "bmp":
        case "tif":
        case "tiff":
        case "avif":
        case "png":
        case "svg":
        case "wbmp":
            $img = "far fa-image";
            break;
        case 'passwd':
        case 'ftpquota':
        case 'sql':
        case 'js':
        case 'json':
        case 'sh':
        case 'config':
        case 'twig':
        case 'tpl':
        case 'md':
        case 'gitignore':
        case 'c':
        case 'cpp':
        case 'cs':
        case 'py':
        case 'rs':
        case 'map':
        case 'lock':
        case 'dtd':
            $img = "far fa-file-code";
            break;
        case 'txt':
        case 'ini':
        case 'conf':
        case 'log':
        case 'htaccess':
            $img = 'far fa-file-text';
            break;
        case 'css':
        case 'less':
        case 'sass':
        case 'scss':
            $img = "fab fa-css3";
            break;
        case 'bz2':
        case 'zip':
        case 'rar':
        case 'gz':
        case 'tar':
        case '7z':
        case 'xz':
            $img = "far fa-file-archive";
            break;
        case 'php':
        case 'php4':
        case 'php5':
        case 'phps':
        case 'phtml':
            $img = "fab fa-php";
            break;
        case 'htm':
        case 'html':
        case 'shtml':
        case 'xhtml':
            $img = "fab fa-html5";
            break;
        case 'xml':
        case 'xsl':
            $img = "far fa-file-excel";
            break;
        case 'wav':
        case 'mp3':
        case 'mp2':
        case 'm4a':
        case 'aac':
        case 'ogg':
        case 'oga':
        case 'wma':
        case 'mka':
        case 'flac':
        case 'ac3':
        case 'tds':
            $img = "far fa-file-audio";
            break;
        case 'm3u':
        case 'm3u8':
        case 'pls':
        case 'cue':
        case 'xspf':
            $img = "fas fa-headphones-alt";
            break;
        case 'avi':
        case 'mpg':
        case 'mpeg':
        case 'mp4':
        case 'm4v':
        case 'flv':
        case 'f4v':
        case 'ogm':
        case 'ogv':
        case 'mov':
        case 'mkv':
        case '3gp':
        case 'asf':
        case 'wmv':
            $img = "far fa-file-video";
            break;
        case 'eml':
        case 'msg':
            $img = "far fa-envelope";
            break;
        case 'csv':
            $img = "fas fa-file-csv";
            break;
        case 'doc':
        case 'docx':
        case 'odt':
            $img = "far fa-file-word";
            break;
        case 'ppt':
        case 'pptx':
            $img = "far fa-file-powerpoint";
            break;
        case 'ttf':
        case 'ttc':
        case 'otf':
        case 'woff':
        case 'woff2':
        case 'eot':
        case 'fon':
            $img = "fas fa-font";
            break;
        case "pdf":
            $img = "far fa-file-pdf";
            break;
        case 'psd':
        case 'ai':
        case 'eps':
        case 'fla':
        case 'swf':
            $img = "far fa-file-image";
            break;
        case 'exe':
        case 'msi':
            $img = "far fa-file";
            break;
        default:
            $img = "far fa-question-circle";
    }

    return $img;
}
