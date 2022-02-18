<!--<x-app>-->

<!--

this code taken from here

https://www.bing.com/api/maps/sdkrelease/mapcontrol/isdk/loadmapasync#HTML

should be cleanly integrated into app.js and app.css

-->

<html>
    <head>
        <title>loadmapasyncHTML</title>
        <style type='text/css'>body{margin:0;padding:0;overflow:hidden;font-family:'Segoe UI',Helvetica,Arial,Sans-Serif}</style>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=AnjJYWrg1k5GYbX6LTEzzoa6fJnBE0fWTLdDGfqvBcI6m5-9512OFRlW7FdkHuvF'></script>
        <script type='text/javascript'>
                var map;
                function loadMapScenario() {
                    map = new Microsoft.Maps.Map(document.getElementById('myMap'), {});
                }


        </script>
    </head>
    <body onload='loadMapScenario();'>
        <div id='printoutPanel'></div>

        <div id='myMap' style='width: 100vw; height: 100vh;'></div>
    </body>
</html>


<!--</x-app>-->
