<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprinto darbas III</title>
    <link rel="stylesheet" href="/app10/src/views/normalise.css">
    <link rel="stylesheet" href="/app10/src/views/style.css">
</head>
<body>


<?php
$request = $_SERVER['REQUEST_URI'];
 
print($request);
print('<br>');
$rout_prefix = "/app10";
switch ($request) {
    case $rout_prefix . '/' :
        require __DIR__ . '/src/views/index.php';
        break;
    case $rout_prefix . '' :
        require __DIR__ . '/src/views/index.php';
        break;
  
   
    case $rout_prefix . '/Continents' :
        require __DIR__ . '/src/views/1.php';
        break;
    case $rout_prefix . '/index' :
        require __DIR__ . '/src/views/index.php';
        break;

    case $rout_prefix . '/Country' :
            require __DIR__ . '/src/views/3.php';
            break;   
    case preg_filter('/delete=[0-9]+/', '$0', $request): 
            require __DIR__ . '/src/views/1.php'; 
            break;
    case preg_filter('/updatable=[0-9]+/', '$0', $request): 
            require __DIR__ . '/src/views/1.php';
            break;
    case preg_filter('/contin=[a-zA-Z0-9._-]+/', '$0', $request):
            require __DIR__ . '/src/views/1.php';
            break;
        // case $rout_prefix . '/projektai?updatable=6' :
        //     require __DIR__ . '/projektai?updatable=6';
        //     break;
    case $rout_prefix . '/CountryAll' :
            require __DIR__ . '/src/views/2.php';
            break;

    case $rout_prefix . '/CountryAll?' :
            require __DIR__ . '/src/views/2.php';
            break;
//updatable-2
    case preg_filter('/delete=[0-9]+/', '$0', $request): 
            require __DIR__ . '/src/views/2.php'; 
            break;
    case preg_filter('/updatable2=[0-9]+/', '$0', $request): 
            require __DIR__ . '/src/views/2.php';
            break;
    case preg_filter('/updatable3=[0-9]+/', '$0', $request): 
            require __DIR__ . '/src/views/2.php';
            break;
    case preg_filter('/country1=[a-zA-Z0-9._-]+/', '$0', $request):
            require __DIR__ . '/src/views/2.php';
            break;
            
//updatable-3
    case preg_filter('/delete=[0-9]+/', '$0', $request): 
                require __DIR__ . '/src/views/3.php'; 
                break;
    case preg_filter('/updatable3=[0-9]+/', '$0', $request): 
                require __DIR__ . '/src/views/3.php';
                break;
    case preg_filter('/name33=[a-zA-Z0-9._-]+/', '$0', $request):
                require __DIR__ . '/src/views/3.php';
                break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;

    case $rout_prefix . '/About' :
        require __DIR__ . '/src/views/about.php';
        break;
}
?>

    
</body>
</html>


