<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .absoluteCart{
        position: fixed;
        top: 4em;
        right: 0;
        width: 35%;
        height: 70%;
        background: #f1ffa1;
        box-shadow: 0 0 4em blue;
        display: grid;
        justify-content: center;
        transition: all 0.3s linear ; 
        transform: translate(110%);
        overflow-y: auto;
        }
        .show-cart {
        transform: translate(0);
        }
            </style>
</head>
<body>
<button class="btn btn-primary me-2" id="panier"><span class="font-size"><i class="uil uil-shopping-cart-alt ">panier d'achat</i></span></button>
<div class="absoluteCart m-2 p-1"></div>

<script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./javascript/panie.js"></script> 
</body>
</html>