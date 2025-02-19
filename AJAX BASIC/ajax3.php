<?php
    include 'conn.php';
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'fetch_data.php',
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (data.length > 0) {
                        console.log(data);
                        var content = '';
                        $.each(data, function(index, item) {
                            content += '<div class="col-lg-4 col-md-6 col-sm-12 d-flex justify-content-center mb-4">';
                            content += '<div class="card shadow-sm w-100" style="max-width: 18rem; height: 100%;">';
                            content += '<img src="' + item.img + '" class="card-img-top" alt="Image">';
                            content += '<div class="card-body d-flex flex-column" style="min-height: 250px;">';
                            content += '<h5 class="card-title">' + item.p1 + '</h5>';
                            content += '<p class="card-text text-muted flex-grow-1">' + item.p2 + '</p>';
                            content += '</div>';
                            content += '</div>';
                            content += '</div>';
                        });
                        $('#data-container').html('<div class="container mt-5"><div class="row">' + content + '</div></div>');
                    } else {
                        $('#data-container').html('<p class="text-center text-danger">No data found.</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>    
    <style>
    body, html {
        min-height: 100vh;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    footer {
        margin-top: auto;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .card {
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    footer{
        bottom: 0;
    }
</style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ajax3.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="data-container"></div>
    
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>Static Footer Text &copy; 2025</p>
    </footer>
</body>
</html>
