<?php
/**
 * Created by PhpStorm.
 * User: riima
 * Date: 16/03/2017
 * Time: 15:11
 */

$conversion = array(
    'A' => 'Y',
    'B' => 'P',
    'C' => 'L',
    'D' => 'T',
    'E' => 'A',
    'F' => 'V',
    'G' => 'K',
    'H' => 'R',
    'I' => 'E',
    'J' => 'Z',
    'K' => 'G',
    'L' => 'M',
    'M' => 'S',
    'N' => 'H',
    'O' => 'U',
    'P' => 'B',
    'Q' => 'X',
    'R' => 'N',
    'S' => 'C',
    'T' => 'D',
    'U' => 'I',
    'V' => 'J',
    'W' => 'F',
    'X' => 'Q',
    'Y' => 'O',
    'Z' => 'W',
);

$string = "J.A.I.M.E.L.E.S.L.I.C.O.R.N.E.S";

function translator($string,$conversion){
    $newstring = array();

    $pieces  = explode('.',$string);

    for ($i=0; $i < sizeof($pieces); $i++){
        foreach ($conversion as $key => $value) {
            if ($key==$pieces[$i]){
                array_push($newstring,$value);
            }
        }
    }
    $end = implode('.',$newstring);

}

function login(){
    $userinfo = array(
        'Plop'=>'1234'
    );
    if(isset($_POST['username'])) {
        if($userinfo[$_POST['username']] == $_POST['password']) {
            $_SESSION['username'] = $_POST['username'];

        }else {
            print("You're not a member of this site !");
        }
    }
}
session_start();
login();
//translator($string,$conversion);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Al-Bhed translator</title>
    <meta charset="utf-8" />
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <link href="css/main.css" media="all" rel="stylesheet" type="text/css" />

</head>
<body>
    <h1>LOGIN PAGE</h1>

    <form id="form" class="col s6"  action="translator-login.php" method="POST">
        <div class="input-field col s6">
            <input type="text" name="username" value="">
            <label for="username">Username</label>
        </div>
        <div class="input-field col s6">
            <input id="password" type="password" class="validate" name="password" value="">
            <label for="password">Password</label>
        </div>
        <p>
            <input type="checkbox" id="test5" />
            <label for="test5">Remember me!</label>
        </p>
        <button class="btn waves-effect waves-light" type="submit" name="submit" value="Login">LOGIN
            <i class="material-icons right">send</i>
        </button>
        <?php if($_SESSION['username']): ?>
            <p>WELCOME MY FRIEND</p>
            <p>You are logged in as <?=$_SESSION['username']?></p>
            <button href="?logout=1" class="btn waves-effect waves-light" type="submit" name="submit" value="Logout">LOGOUT
                <i class="material-icons right">send</i>
            </button>
        <?php endif; ?>
    </form>
</body>
</html>