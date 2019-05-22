  <head>
    <title>Laravelチュートリアル</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    
    <style>
            html, body {
                background-color: #fff;
								background-image: url('/image/free-pattern-tileable-wood.jpg');
								/* color: #fff; */
                font-family: 'Raleway', sans-serif;
                font-weight: 500;
                margin: 0;
            }
            .pink{
                background: pink;
                height: 100px;
                text-align: center;
                line-height: 100px;
            }
            .errors {
                width: 300px;
                font-size: 20px;
                /* color: #e95353;
                border: 10px solid #e95353;
                background-color: #f2dede; */
            }
            .complete {
                padding-left: 10px;
                width: 290px;
                font-size: 12px;
                color: #2a88bd;
                border: 1px solid #2a88bd;
                background-color: #a6e1ec;
            }

    </style>
  
  </head>
  <body class="p-3">
  @yield('content')
  </body>
