<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- 换用MDUI -->
    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">

    <!-- vue-quill-editor -->
    <link rel="stylesheet" href="/css/quill.core.css" />
    <link rel="stylesheet" href="/css/quill.snow.css" />
    <link rel="stylesheet" href="/css/quill.bubble.css" />

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Laravel 6.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Articles</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://v4.bootcss.com/docs/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <!--
    <link rel="icon" href="https://v4.bootcss.com/docs/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://v4.bootcss.com/docs/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    -->
    <link rel="manifest" href="">
    <link rel="mask-icon" href="/favicon.ico" color="">
    <link rel="icon" href="/favicon.ico">
    <meta name="msapplication-config" content="">
    <meta name="theme-color" content="#2196f3">
    <script>
        // CSRF_Token
        var csrf_token = '{{ csrf_token() }}'
    </script>
    <style>
        body::before {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 105%;
            height: 105%;
            margin: -30px;
            overflow: hidden;
            content: "&nbsp;";
            background-image: url(/bg/77619497_p0.png);
            background-position: center;
            background-size: cover;
            /* 
             * https://developer.mozilla.org/en-US/docs/Web/CSS/filter-function/saturate
             */
            /* filter: saturate(180%) blur(20px); */
            filter: saturate(180%) blur(20px) grayscale(50%);
            /* https://www.apple.com.cn/ac/localnav/5/styles/ac-localnav.built.css */
            /* transition: background-image 2s cubic-bezier(0.28, 0.11, 0.32, 1); */
            z-index: -99;
        }

        .body-bg-remove-light::before {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 105%;
            height: 105%;
            margin: -30px;
            overflow: hidden;
            content: "&nbsp;";
            background-image: url(/bg/77619497_p0.png);
            background-position: center;
            background-size: cover;
            /* 
             * https://developer.mozilla.org/en-US/docs/Web/CSS/filter-function/saturate
             */
            /* filter: saturate(100%) blur(20px) brightness(0.7); */
            filter: saturate(100%) brightness(0.7) blur(20px) grayscale(50%);
            /* https://www.apple.com.cn/ac/localnav/5/styles/ac-localnav.built.css */
            /* transition: background-image 2s cubic-bezier(0.28, 0.11, 0.32, 1); */
            z-index: -99;
        }

        footer {
            height: fit-content;
            width: 100%;
        }

        .padding-for-avatar {
            padding: 0 16px 0 0;
        }

        #userCardImg {
            height: 210px;
            width: 210px;
        }

        .user-img-shadow {
            box-shadow: 0 4px 45px -8px rgba(0, 0, 0, .35)
        }

        .user-img-shadow-darkmode {
            box-shadow: 0 4px 45px -8px rgba(255, 255, 255, .35)
        }

        .comment-author {
            text-decoration-line: none;
            color: inherit;
        }

        .comment-author:hover {
            text-decoration-line: none;
            color: inherit;
        }

        .comment-reply {
            min-width: 0;
            min-height: 0;
            margin: 0 16px 16px 56px;
            padding: 0;
            background-color: rgba(0, 0, 0, 0.05);
        }

        .mdui-overlay {
            z-index: initial;
        }
    </style>
</head>