<!DOCTYPE html>
<html>

<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <title>Slide Show</title>
  <style>
    #slideShowImages { /* The following CSS rules are optional. */
      border: 1px gray solid;
      background-color: lightgray;
    }   
  
    #slideShowImages img { /* The following CSS rules are optional. */
      border: 0.8em black solid;
      padding: 3px;
    }   
  </style>
</head>

<body>
  <div id="slideShowImages">
    <img src="images/caption1.jpg" alt="Slide 1" />
    <img src="images/caption.jpg" alt="Slide 2" />
    <img src="images/caption2.gif" alt="Slide 3" />    
    <img src="images/pic2.jpg" alt="Slide 4" />
  </div>  
  <button id="slideShowButton"></button> <!-- Optional button element. -->
  <script src="slideShow.js"></script>
</body>

</html>