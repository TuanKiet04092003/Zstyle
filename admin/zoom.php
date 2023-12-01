<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="zoom.css">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="zoom.js"></script>
  
<form action="zoom.php" method="post" class="layoutform" enctype="multipart/form-data"></form> 
<button name="button" onclick="takeScreenShot()">Snapshot</button>
<div id="container">
    <div id="leftmenu">
      Left Side
      <div class="drag">
      </div>
      <div class="drag">
      </div>
      <div class="drag">
      </div>
      Drag----------->
            &
      Click Snapshot
    </div>
    <div id="rightcontainer">
        Right Side
    </div>
</div>

</form>
</body>
</html>