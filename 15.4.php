<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>15.4 Retrieve Response Headers</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>15.4 Retrieve Response Headers</h1>
            <p>Use getResponseHeader to read header values from an AJAX response.</p>
        </div>
    </header>

    <main class="container">
        <section class="content-panel">
            <button id="load-headers-button" class="action-button">Load headers</button>
            <div id="header-info" class="header-info"></div>
            <p><a href="index.php">Back to demos</a></p>
        </section>
    </main>

    <script>
        function loadResponseHeaders() {
            $('#header-info').text('Loading headers...');

            $.ajax({
                url: 'data/about.json',
                method: 'GET',
                dataType: 'json',
                complete(jqXHR) {
                    const contentType = jqXHR.getResponseHeader('Content-Type') || 'not available';
                    const contentLength = jqXHR.getResponseHeader('Content-Length') || 'not available';
                    const lastModified = jqXHR.getResponseHeader('Last-Modified') || 'not available';
                    const etag = jqXHR.getResponseHeader('ETag') || 'not available';

                    $('#header-info').html(
                        `Content-Type: ${contentType}\n` +
                        `Content-Length: ${contentLength}\n` +
                        `Last-Modified: ${lastModified}\n` +
                        `ETag: ${etag}`
                    );
                },
                error() {
                    $('#header-info').text('Unable to retrieve resource headers.');
                }
            });
        }

        $(document).ready(() => {
            $('#load-headers-button').on('click', loadResponseHeaders);
        });
    </script>
</body>
</html>
