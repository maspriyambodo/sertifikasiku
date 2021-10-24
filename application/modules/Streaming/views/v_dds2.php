<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #video-stream{
                border-radius: 15px;
            }
/*            #video-stream iframe {
                pointer-events: none;
            }*/
        </style>
    </head>
    <body>
        <iframe id="iframe_bgndVideo" class="playerBox" src="https://www.youtube-nocookie.com/embed/DDmib3q9q4g" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0" style="width: 100%;height:600px;"></iframe>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            document.getElementById("ytPlayer").addEventListener("contextmenu", function (event) {
                event.preventDefault();
                event.stopPropagation();
            });
        </script>
    </body>
</html>
