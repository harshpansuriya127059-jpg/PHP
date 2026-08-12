<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>15.1 AJAX Navigation Menu</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>15.1 AJAX Navigation Menu</h1>
            <p>Load content dynamically when the user clicks a menu item.</p>
        </div>
    </header>

    <main class="container">
        <section class="content-panel">
            <nav class="demo-nav">
                <a href="#" class="ajax-link active" data-section="home">Home</a>
                <a href="#" class="ajax-link" data-section="blog">Blog</a>
                <a href="#" class="ajax-link" data-section="products">Products</a>
                <a href="#" class="ajax-link" data-section="about">About</a>
            </nav>
            <div id="content" class="panel-body" aria-live="polite">
                <div class="loader">Loading content...</div>
            </div>
            <p><a href="index.php">Back to demos</a></p>
        </section>
    </main>

    <script>
        const contentRoutes = {
            home: 'data/home.json',
            blog: 'data/blog.json',
            products: 'data/products.json',
            about: 'data/about.json'
        };

        function showError(message) {
            $('#content').html(`<div class="error-message">${message}</div>`);
        }

        function renderContent(data) {
            const items = (data.items || []).map(item => {
                return `<li><strong>${item.title}</strong><p>${item.details || ''}</p></li>`;
            }).join('');

            $('#content').html(`
                <h3>${data.title}</h3>
                <p>${data.description}</p>
                <ul class="item-list">${items}</ul>
            `);
        }

        function loadSection(section) {
            const url = contentRoutes[section];
            if (!url) {
                showError('Section not found.');
                return;
            }

            $('#content').html('<div class="loader">Loading content...</div>');

            $.ajax({
                url,
                method: 'GET',
                dataType: 'json',
                success(response) {
                    renderContent(response);
                },
                error(_, status, error) {
                    showError(`Failed to load content: ${status} ${error}`);
                }
            });
        }

        $(document).ready(() => {
            $('.ajax-link').on('click', function (event) {
                event.preventDefault();
                const section = $(this).data('section');
                $('.ajax-link').removeClass('active');
                $(this).addClass('active');
                loadSection(section);
            });

            loadSection('home');
        });
    </script>
</body>
</html>
