<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    <script>
        var ws = new WebSocket('ws://' + window.location.hostname + ':2346');
        ws.onmessage = function (payload) {
            console.log(payload);
        };
        ws.onopen = function () {
            ws.send("test!");
            console.log('opend')
        };
        ws.onclose = function(evt){console.log("WebSocketClosed!");};
        ws.onerror = function(evt){console.log("WebSocketError!");};
    </script>
    </body>
</html>
