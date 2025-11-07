<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CatSpace Laravel 🐾')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #87CEEB 0%, #B0E0E6 50%, #E0F6FF 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #212121;
            min-height: 100vh;
            padding: 0;
            margin: 0;
        }
        .container {
            margin-top: 50px;
            margin-bottom: 50px;
            max-width: 1200px;
        }
        .cat-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 30px;
            transition: transform .2s;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .cat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .btn-custom {
            background-color: #1976d2;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }
        .btn-custom:hover {
            background-color: #1565c0;
            color: #fff;
        }
        .cat-title {
            font-weight: 700;
            color: #1976d2;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .cat-subtitle {
            font-size: 1rem;
            color: #666;
            margin-bottom: 30px;
        }
        .cat-name-list {
            font-weight: 700;
            color: #212121;
            font-size: 1.25rem;
            margin-bottom: 10px;
        }
        .cat-breed {
            color: #888;
            font-size: 0.95rem;
            margin-bottom: 15px;
        }
        .list-group-item {
            border: none;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
            color: #212121;
        }
        .list-group-item:last-child {
            border-bottom: none;
        }
        .list-group-item strong {
            color: #212121;
            font-weight: 700;
        }
        .paw-orange {
            display: inline-block;
            font-size: 1.2em;
            filter: hue-rotate(15deg) saturate(1.8) brightness(1.2);
            text-shadow: 0 0 2px rgba(255, 140, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
