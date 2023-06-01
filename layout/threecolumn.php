<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        html, body { height:100%;}
        #container { display:flex;height:100%;}
        .column { flex:1}
    </style>
    <h1>THREE COLUMN LAYOUT </h1>
    <div id="container">
        <div class="column"> <?=$column1 ?></div>
        <div class="column"> <?=$column2 ?></div>
        <div class="column"> <?=$column3 ?></div>
    </div>
</body>
</html>