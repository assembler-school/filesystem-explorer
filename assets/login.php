<?php

$username = 'admin';
$inputPassword = '123456';

if ( !empty( $_POST[ 'user' ] ) && !empty( $_POST[ 'password' ] ) ) {

    if ( $_POST[ 'user' ] === $username && $_POST[ 'password' ] === $inputPassword ) {

        session_start();

        $_SESSION[ 'user' ] = $_POST[ 'user' ];

        header( 'Location: ../root' );
    } else {
        header( 'Location: ../index.php?msg=errorLogin' );
    }

}else{
    header( 'Location: ../index.php?msg=emptyFields');
}

?>