/*
    Document   : storyboard
    Created on : Jul 20, 2010, 7:22:00 PM
    Author     : dhaval
*/


$(document).ready(function(){
    var drawNodes = [];
    var drawArea = null;
    var start = null;
    var outline = null;
    var offset = null;
    var shape = "rect";
    
    //alert("asdf");
    var newPosition = function(e, ui){
    //console.log("Dragged element stopped at [" + ui.position.top + ", " + ui.position.left + "]");
    };

    var dragOpts = {
        containment: "parent",
        stop: newPosition
    };

    var resizeOpts = {
        autoHide: true,
        containment: "#container"
    };

    $("#addRect").click(function(){
        shape = 'rect';
    });

    $("#addPolygon").click(function(){
        shape = 'polygon';
    });

    $("#addCircle").click(function(){
        shape = 'circle';
    });

    $("#addLine").click(function(){
        shape = 'line';
    });

    function startDrag(event) {
        offset = ($.browser.msie ? {
            left: 0,
            top: 0
        } : $('#container').offset());
        if (!$.browser.msie) {
            offset.left -= document.documentElement.scrollLeft || document.body.scrollLeft;
            offset.top -= document.documentElement.scrollTop || document.body.scrollTop;
        }
        start = {
            X: event.clientX - offset.left,
            Y: event.clientY - offset.top
            };
    }

    function dragging(event) {
        if (!start) {
            return;
        }
        if (!outline) {
            outline = drawArea.rect(0, 0, 0, 0,
            {
                fill: 'none',
                stroke: '#c0c0c0',
                strokeWidth: 1,
                strokeDashArray: '2,2'
            });
            $(outline).mouseup(endDrag);
        }
        drawArea.change(outline, {
            x: Math.min(event.clientX - offset.left, start.X),
            y: Math.min(event.clientY - offset.top, start.Y),
            width: Math.abs(event.clientX - offset.left - start.X),
            height: Math.abs(event.clientY - offset.top - start.Y)
            });
    }

    function endDrag(event) {
        if (!start) {
            return;
        }
        $(outline).remove();
        outline = null;
        drawShape(start.X, start.Y,event.clientX - offset.left, event.clientY - offset.top);
        start = null;
    }

    function drawShape(x1, y1, x2, y2) {
        var left = Math.min(x1, x2);
        var top = Math.min(y1, y2);
        var right = Math.max(x1, x2);
        var bottom = Math.max(y1, y2);
        var settings = {
            fill: "red",
            stroke: "blue",
            strokeWidth: 1
        };

        var node = null;
        if (shape == 'rect') {

            drawNodes[drawNodes.length] = $("<div/>").addClass("draggable").addClass("ui-widget-content").addClass("resizable").css("width", (right-left)).css("height", (bottom-top)).css("position", "absolute").css("top", top).css("left", left).appendTo($("#container")).svg({
                onLoad: function(svg){
                    svg.rect(0, 0, '100%', '100%', settings);
                }
            }).draggable(dragOpts);
        }
        else if (shape == 'circle') {
            var r = Math.min(right - left, bottom - top) / 2;
            drawNodes[drawNodes.length] = $("<div/>").addClass("draggable").addClass("resizable").css("width", (r*2)).css("height", (r*2)).css("position", "absolute").css("top", top).css("left", left).appendTo($("#container")).svg({
                onLoad: function(svg){
                    svg.circle(r, r, r, settings);
                }
            }).draggable(dragOpts);
        }
        else if (shape == 'ellipse') {
            var rx = (right - left) / 2;
            var ry = (bottom - top) / 2;
            node = drawArea.ellipse(left + rx, top + ry, rx, ry, settings);
        }
        else if (shape == 'line') {
            x1 = 0;
            y1 = 0;
            x2 = (right-left);
            y2 = (bottom-top);

            drawNodes[drawNodes.length] = $("<div/>").addClass("draggable").addClass("resizable").css("width", (right-left)).css("height", (bottom-top)).css("position", "absolute").css("top", top).css("left", left).appendTo($("#container")).svg({
                onLoad: function(svg){
                    svg.line(x1, y1, x2, y2, settings);
                }
            }).draggable(dragOpts);
            }
            else if (shape == 'polyline') {
                node = drawArea.polyline([[(x1 + x2) / 2, y1], [x2, y2],
                    [x1, (y1 + y2) / 2], [x2, (y1 + y2) / 2], [x1, y2],
                    [(x1 + x2) / 2, y1]], $.extend(settings, {
                        fill: 'none'
                    }));
            }
            else if (shape == 'polygon') {
                x1 = 0;
                y1 = 0;
                x2 = (right - left);
                y2 = (bottom-top);
                drawNodes[drawNodes.length] = $("<div/>").addClass("draggable").addClass("resizable").css("width", (right-left)).css("height", (bottom-top)).css("position", "absolute").css("top", top).css("left", left).appendTo($("#container")).svg({
                    onLoad: function(svg){
                        svg.polygon([[(x1 + x2) / 2, y1], [x2, y1], [x2, y2],[(x1 + x2) / 2, y2], [x1, (y1 + y2) / 2]], settings);
                    }
                }).draggable(dragOpts);
        }

        $("body").trigger("click");
        };

        function loadSvg(){
            $("#container").svg({
                onLoad: function(svg) {
                    drawArea = svg;
                    var surface = svg.rect(0, 0, '100%', '100%', {
                        id: 'surface',
                        fill: 'white'
                    });
                    $(surface).mousedown(startDrag).mousemove(dragging).mouseup(endDrag);
                }
            });
        }

        function addEventsToSvg(){
            var svg = $('#container').svg('get');
            $('circle', svg.root()).live('click', svgClicked).
            live('mouseover', svgOver).live('mouseout', svgOut);
            $('rect:not(#surface)', svg.root()).live('click', svgClicked).
            live('mouseover', svgOver).live('mouseout', svgOut);
            $('line', svg.root()).live('click', svgClicked).
            live('mouseover', svgOver).live('mouseout', svgOut);
            $('polygon', svg.root()).live('click', svgClicked).
            live('mouseover', svgOver).live('mouseout', svgOut);
        }

        function svgOver(e, ui) {
            //$(this).css("cursor", "move");
            $(this).attr('stroke', 'lime');
        }

        function svgOut() {
            //$(this).css("cursor", "default");
            $(this).attr('stroke', 'black');
        }

        function svgClicked() {
        }

        loadSvg();
        addEventsToSvg();
        $(".draggable").draggable(dragOpts);
        $(".resizable").resizable(resizeOpts);

        $("#addImage").click(function(){
            $("<img/>")
            .attr("src", "C:\Users\rEx\Desktop\snuffles.jpg")
            .css("width", "100%")
            .css("height", "100%")
            .appendTo($("<div/>")
                .css("width", 100)
                .css("height", 100)
                .addClass("ui-widget-content")
                .addClass("draggable")
                .addClass("resizable")
                .attr("nodeid", drawNodes.length)
                .appendTo($("#container"))
                .draggable(dragOpts)
                .resizable(resizeOpts));

            drawNodes[drawNodes.length] = $("[nodeid='"+drawNodes.length+"']");
        });

        $("#addText").click(function(){
            $("<textarea/>")
            .css("width", "100%")
            .css("position", "absolute")
            .appendTo($("<div/>")
                .css("padding-top", 10)
                .css("background-color", "lightgray")
                .css("display", "inline-block")
                .addClass("ui-widget-content")
                .addClass("draggable")
                .attr("nodeid", drawNodes.length)
                .appendTo($("#container"))
                .draggable(dragOpts));

            drawNodes[drawNodes.length] = $("[nodeid='"+drawNodes.length+"']");
        });

        $("#addVideo").click(function(){
            $("<embed/>")
            .attr("src", "http://www.youtube.com/v/HvHOCqbA6rE")
            .attr("type","application/x-shockwave-flash")
            .attr("wmode", "transparent")
            .attr("width", "100%")
            .attr("height", "100%")
            .appendTo($("<div/>")
                .css("width", 200)
                .css("height", 200)
                .css("padding-top", 10)
                .css("padding-bottom", 15)
                .addClass("ui-widget-content")
                .addClass("draggable")
                .attr("nodeid", drawNodes.length)
                .appendTo($("#container"))
                .draggable(dragOpts)
                .resizable(resizeOpts));

            drawNodes[drawNodes.length] = $("[nodeid='"+drawNodes.length+"']");
        });

        $('#undo').click(function() {
            if (!drawNodes.length) {
                return;
            }
            drawArea.remove(drawNodes[drawNodes.length - 1]);
            drawNodes.splice(drawNodes.length - 1, 1);
        });

        function removeNode(index){
            drawArea.remove(drawNodes[index]);
            drawNodes.splice(index, 1);
        }

        $("#clear").click(function(){
            while (drawNodes.length) {
                $('#undo').trigger('click');
            }
        });
});