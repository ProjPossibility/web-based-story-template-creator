<?php
if(isset($_GET['download']) && $_GET['download'])
{
	header('Content-Disposition: attachment; filename="example.php"');
}
?>
<html>
    <head>
        <title>Story Board</title>
        <link rel="stylesheet" type="text/css" href="css/jquery.svg.css">
        <link rel="stylesheet" type="text/css" href="css/jquery.ui.all.css">
		<link href=' http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/storyboard.css">
        <style type="text/css">
		            @import "css/jquery.svg.css";
        </style>
    </head>

    <body>
        <div class="outer">
            <div class="header">Storyboard</div>
            <div class="buttons">
                <button id="addImage">Image</button>
                <button id="addVideo">Video</button>
                <button id="addText">Text</button>
                <button id="addRect">Rectangle</button>

                <button id="addCircle">Circle</button>
                <button id="addLine">Line</button>
                <button id="addPolygon">Polygon</button>

                <button id="undo" style="display: none">Undo</button>
                <button id="clear">Clear Board</button>
            </div>

            <div id="container" style="height: 500px; border: 2px solid #ff0000;">
            </div>
        </div>
        <div>
        <a href="http://ss12.vairavanlaxman.com/Prasanna/jquery.php?download=1">Save</a>
        </div>

        <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.svg.js"></script>
        <script type="text/javascript" src="js/jquery.svgdom.js"></script>
        <script type="text/javascript" src="js/jquery.svganim.js"></script>
        <script type="text/javascript" src="js/ui/jquery.ui.core.js"></script>
        <script type="text/javascript" src="js/ui/jquery.ui.widget.js"></script>

        <script type="text/javascript" src="js/ui/jquery.ui.mouse.js"></script>
        <script type="text/javascript" src="js/ui/jquery.ui.draggable.js"></script>
        <script type="text/javascript" src="js/ui/jquery.ui.resizable.js"></script>
        <script type="text/javascript" src="js/ui/jquery.ui.position.js"></script>

        <script type="text/javascript" src="js/storyboard.js"></script>
    </body>

</html>