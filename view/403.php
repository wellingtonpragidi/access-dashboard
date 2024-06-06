<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Acesso negado</title>
<link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet" />
<style>html{background-color:#000121;font-family:'Roboto',sans-serif}.maincontainer{position:relative;top:-50px;transform:scale(0.8);background:url(img/error-pages/bg-haunted-house.png);background-repeat:no-repeat;background-position:center;background-size:700px 600px;width:800px;height:600px;margin:0 auto;display:grid}.foregroundimg{position:relative;width:100%;top:-230px;z-index:5}.errorcode{position:relative;top:-200px;font-family:'Creepster',cursive;color:#fff;text-align:center;font-size:6em;letter-spacing:.1em}.errortext{position:relative;top:-260px;color:#FBD130;text-align:center;text-transform:uppercase;font-size:1.8em}.bat{opacity:0;position:relative;transform-origin:center;z-index:3}.bat:nth-child(1){top:380px;left:120px;transform:scale(0.5);animation:13s 1s flyBat1 infinite linear}.bat:nth-child(2){top:280px;left:80px;transform:scale(0.3);animation:8s 4s flyBat2 infinite linear}.bat:nth-child(3){top:200px;left:150px;transform:scale(0.4);animation:12s 2s flyBat3 infinite linear}.body{position:relative;width:50px;top:12px}.wing{width:150px;position:relative;transform-origin:right center}.leftwing{left:30px;animation:.8s flapLeft infinite ease-in-out}.rightwing{left:-180px;transform:scaleX(-1);animation:.8s flapRight infinite ease-in-out}@keyframes flapLeft{0%{transform:rotateZ(0)}50%{transform:rotateZ(10deg) rotateY(40deg)}100%{transform:rotateZ(0)}}@keyframes flapRight{0%{transform:scaleX(-1) rotateZ(0)}50%{transform:scaleX(-1) rotateZ(10deg) rotateY(40deg)}100%{transform:scaleX(-1) rotateZ(0)}}@keyframes flyBat1{0%{opacity:1;transform:scale(0.5)}25%{opacity:1;transform:scale(0.5) translate(-400px,-330px)}50%{opacity:1;transform:scale(0.5) translate(400px,-800px)}75%{opacity:1;transform:scale(0.5) translate(600px,100px)}100%{opacity:1;transform:scale(0.5) translate(100px,300px)}}@keyframes flyBat2{0%{opacity:1;transform:scale(0.3)}25%{opacity:1;transform:scale(0.3) translate(200px,-330px)}50%{opacity:1;transform:scale(0.3) translate(-300px,-800px)}75%{opacity:1;transform:scale(0.3) translate(-400px,100px)}100%{opacity:1;transform:scale(0.3) translate(100px,300px)}}@keyframes flyBat3{0%{opacity:1;transform:scale(0.4)}25%{opacity:1;transform:scale(0.4) translate(-350px,-330px)}50%{opacity:1;transform:scale(0.4) translate(400px,-800px)}75%{opacity:1;transform:scale(0.4) translate(-600px,100px)}100%{opacity:1;transform:scale(0.4) translate(100px,300px)}}#webship{position:absolute;bottom:18px;right:18px;}#webship img{width:150px}</style>
<link rel="icon" href="favicon.ico">
</head>
<body>
<div class="maincontainer">
  <div class="bat">
    <img class="wing leftwing" 
         src="img/error-pages/bat-wing.png" />
    <img class="body"
         src="img/error-pages/bat-body.png" />
    <img class="wing rightwing"
         src="img/error-pages/bat-wing.png" />
  </div>
  <div class="bat">
    <img class="wing leftwing" 
         src="img/error-pages/bat-wing.png" />
    <img class="body"
         src="img/error-pages/bat-body.png" />
    <img class="wing rightwing"
         src="img/error-pages/bat-wing.png" />
  </div>
  <div class="bat">
    <img class="wing leftwing" 
         src="img/error-pages/bat-wing.png" />
    <img class="body"
         src="img/error-pages/bat-body.png" />
    <img class="wing rightwing"
         src="img/error-pages/bat-wing.png" />
  </div>
  <img class="foregroundimg" src="img/error-pages/haunted-house.png" />
  
</div>
<h1 class="errorcode">ERRO 403</h1>
<div class="errortext">ACESSO NEGADO!</div>

<div id="webship">
    <img src="webship.png" alt="webship">
</div>
</body>
</html>