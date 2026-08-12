<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>15.3 Smooth Scroll to Top</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>15.3 Smooth Scroll to Top</h1>
            <p>Click the button to smoothly scroll the page back to the top.</p>
        </div>
    </header>

    <main class="container">
        <section class="content-panel">
            <button id="scroll-top-button" class="action-button">Scroll to top</button>
            <div class="scroll-filler">
                <p>Scroll down, then click the button. The page will animate back to the top.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Phasellus faucibus risus enim, eget sollicitudin mauris feugiat sit amet.</p>
                <p>Morbi tempus arcu nec enim pharetra, non dictum massa pellentesque.</p>
                <p>Integer vitae tortor nec nulla tempor condimentum et eu erat.</p>
            </div>
            <p><a href="index.php">Back to demos</a></p>
        </section>
    </main>

    <script>
        $(document).ready(() => {
            $('#scroll-top-button').on('click', () => {
                $('html, body').animate({ scrollTop: 0 }, 600);
            });
        });
    </script>
</body>
</html>
