<!DOCTYPE html>
<html>
<head>
    <title>jQuery Mouse and Keyboard Events</title>
</head>
<body>
    <h2>jQuery Mouse and Keyboard Events</h2>

    <button id="btn">Click Me</button>
    <p id="message">Move the mouse here and type in the box.</p>
    <input type="text" id="name" placeholder="Type something">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#btn').click(function () {
                $('#message').text('Button clicked!');
            });

            $('#message').mouseenter(function () {
                $('#message').text('Mouse lakhan na vistar ma gayu che .');
            });

            $('#message').mouseleave(function () {
                $('#message').text('Mouse dabi taraf che ');
            });

            $('#name').keydown(function () {
                $('#message').text('tamee key dabavi rahya cho');
            });

            $('#name').keyup(function () {
                $('#message').text('You typed: ' + $(this).val());
            });
        });
    </script>
</body>
</html>
