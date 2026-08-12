<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>15.2 Red Background Styling</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>15.2 Red Background Styling</h1>
            <p>Use jQuery selectors to set background color to red on specific elements.</p>
        </div>
    </header>

    <main class="container">
        <section class="content-panel">
            <h2>Select Elements and Make Them Red</h2>
            <h3 id="red-heading">Heading Example</h3>
            <p class="color-paragraph">Paragraph example to demonstrate selector styling.</p>
            <button id="red-bg-button" class="action-button">Set red background</button>
            <p><a href="index.php">Back to demos</a></p>
        </section>
    </main>

    <script>
        $(document).ready(() => {
            $('#red-bg-button').on('click', () => {
                $('h3, .color-paragraph, #red-bg-button').css('background-color', 'red');
                $('h3, .color-paragraph, #red-bg-button').css('color', '#fff');
            });
        });
    </script>
</body>
</html>
