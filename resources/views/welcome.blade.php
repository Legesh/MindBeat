<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .github_username > input {
                padding: 15px;
                width: 300px;
                border-radius: 10px 0 0px 10px;
                border-right: 0;
                border: 1px solid #ccc;
                font-size: 16px;
            }

            .github_username > button {
                background: #b3e5fc;
                padding: 16px;
                color: #1a73e8;
                cursor: pointer;
                font-size: 16px;
                border: 0;
                border-radius: 0 10px 10px 0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <form class="github_username" action="/" method="get" enctype="multipart/form-data">
                    <input type="text" name="username" value="" placeholder="Input GitHub username here" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br>
                    <div>Push Events - {{ $PushEvent ?? 0 }}</div>
                    <div>Pull Request Events - {{ $PullRequestEvent ?? 0 }}</div>
                    <div>Issue Comment Events - {{ $IssueCommentEvent ?? 0 }}</div>
                    <div>Other events - {{ $Other ?? 0 }}</div>
                    <div>Total - {{ $Total ?? 0 }}</div>
            </div>
        </div>
    </body>
</html>
