<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Laravel Scraper</title>

    <style>
        .wrapper>.card:first-child .card-header {
            background-color: orange;
            color: white;
        }

        .wrapper>.card: :nth-child(2) .card-header {
            background-color: red;
            color: white;
        }

        .wrapper>.card: :nth-child(3) .card-header {
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-5 wrapper">
                {{-- @foreach ($titles as $key => $title)
                    <div class="card text-center mt-4">
                        <h5 class="card-header">{{ $title->textContent }}</h5>
                        <div class="card-body">
                            <p class="card-text">{{ $desc[$key]->textContent }}</p>
                        </div>
                    </div>
                @endforeach --}}
                {{-- <h1>{{ $postTitle }}</h1> --}}

                <?php
                
                include 'simple_html_dom.php';
                $html = new simple_html_dom();
                $options = [
                    // 'http' => [
                    //     'method' => 'GET',
                    //     'header' =>
                    //         "Accept-language: en\r\n" .
                    //         "Cookie: foo=bar\r\n" . // check function.stream-context-create on php.net
                    //         "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n", // i.e. An iPad
                    // ],
                    [
                        'Accept-language' => 'en',
                        'Cookie' => 'foo=bar',
                        'User-Agent' => 'Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10',
                    ];

                ];
                
                // fetch webpage content
                $context = stream_context_create($options);
                $html = file_get_html('https://www.facebook.com/TheOnion/posts/10161293093844497', false, $context);
                
                // Find all images
                foreach ($html->find('div.xdj266r x11i5rnm xat24cr x1mh8g0r x1vvkbs x126k92a') as $element) {
                    echo $element . '<br>';
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>
