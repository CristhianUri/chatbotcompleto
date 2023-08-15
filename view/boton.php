<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
   .wave-button{
    position: relative;
    border: #333 2px;
}
.wave-button::before,
.wave-button::after{
    content: "";
    position: absolute;
    top: 2px;
    left: 4px;
    width: 45px;
    height: 45px;
    border-radius: 30%;
    background-color: #0d6efd;
    opacity: 0;
    border: #333 2px;
    animation: onda 1.7s infinite;
}
.wave-button img{
    position: relative;
    z-index: 2;
   border: #333 2px;
}
@keyframes onda {
    0%{
        transform: scale(1);
    }
    15%{
        opacity: 1;
    }
    100%{
        transform: scale(2.5);
    }
}
</style>
</head>
<body>

<button class="wave-button" >Haz clic</button>


    
</body>
</html>