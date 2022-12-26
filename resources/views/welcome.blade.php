<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{-- https://codeshack.io/poll-voting-system-php-mysql/ --}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            /* .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            } */

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
        }
    </style>

    <style>
        * {
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            background-color: #FFFFFF;
            margin: 0;
        }

        .navtop {
            background-color: #3f69a8;
            height: 60px;
            width: 100%;
            border: 0;
        }

        .navtop div {
            display: flex;
            margin: 0 auto;
            width: 1000px;
            height: 100%;
        }

        .navtop div h1,
        .navtop div a {
            display: inline-flex;
            align-items: center;
        }

        .navtop div h1 {
            flex: 1;
            font-size: 24px;
            padding: 0;
            margin: 0;
            color: #ecf0f6;
            font-weight: normal;
        }

        .navtop div a {
            padding: 0 20px;
            text-decoration: none;
            color: #c5d2e5;
            font-weight: bold;
        }

        .navtop div a i {
            padding: 2px 8px 0 0;
        }

        .navtop div a:hover {
            color: #ecf0f6;
        }

        .content {
            width: 1000px;
            margin: 0 auto;
        }

        .content h2 {
            margin: 0;
            padding: 25px 0;
            font-size: 22px;
            border-bottom: 1px solid #ebebeb;
            color: #666666;
        }

        .home .create-poll {
            display: inline-block;
            text-decoration: none;
            background-color: #38b673;
            font-weight: bold;
            font-size: 14px;
            border-radius: 5px;
            color: #FFFFFF;
            padding: 10px 15px;
            margin: 15px 0;
        }

        .home .create-poll:hover {
            background-color: #32a367;
        }

        .home table {
            width: 100%;
            padding-top: 30px;
            border-collapse: collapse;
        }

        .home table thead {
            background-color: #ebeef1;
            border-bottom: 1px solid #d3dae0;
        }

        .home table thead td {
            padding: 10px;
            font-weight: bold;
            color: #767779;
            font-size: 14px;
        }

        .home table tbody tr {
            border-bottom: 1px solid #d3dae0;
        }

        .home table tbody tr:nth-child(even) {
            background-color: #fbfcfc;
        }

        .home table tbody tr:hover {
            background-color: #376ab7;
        }

        .home table tbody tr:hover td {
            color: #FFFFFF;
        }

        .home table tbody tr:hover td:nth-child(1) {
            color: #FFFFFF;
        }

        .home table tbody tr td {
            padding: 10px;
        }

        .home table tbody tr td:nth-child(1) {
            color: #a5a7a9;
        }

        .home table tbody tr td.actions {
            padding: 8px;
            text-align: right;
        }

        .home table tbody tr td.actions .view,
        .home table tbody tr td.actions .edit,
        .home table tbody tr td.actions .trash {
            display: inline-flex;
            text-align: right;
            text-decoration: none;
            color: #FFFFFF;
            padding: 10px 12px;
            border-radius: 5px;
        }

        .home table tbody tr td.actions .trash {
            background-color: #b73737;
        }

        .home table tbody tr td.actions .trash:hover {
            background-color: #a33131;
        }

        .home table tbody tr td.actions .edit {
            background-color: #37afb7;
        }

        .home table tbody tr td.actions .edit:hover {
            background-color: #319ca3;
        }

        .home table tbody tr td.actions .view {
            background-color: #37b770;
        }

        .home table tbody tr td.actions .view:hover {
            background-color: #31a364;
        }

        .update form {
            padding: 15px 0;
            display: flex;
            flex-flow: column;
            width: 400px;
        }

        .update form label {
            display: inline-flex;
            width: 100%;
            padding: 10px 0;
            margin-right: 25px;
        }

        .update form input,
        .update form textarea {
            padding: 10px;
            width: 100%;
            margin-right: 25px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
        }

        .update form textarea {
            height: 200px;
        }

        .update form input[type="submit"] {
            display: block;
            background-color: #38b673;
            border: 0;
            font-weight: bold;
            font-size: 14px;
            color: #FFFFFF;
            cursor: pointer;
            width: 200px;
            margin-top: 15px;
            border-radius: 5px;
        }

        .update form input[type="submit"]:hover {
            background-color: #32a367;
        }

        .delete .yesno {
            display: flex;
        }

        .delete .yesno a {
            display: inline-block;
            text-decoration: none;
            background-color: #38b673;
            font-weight: bold;
            color: #FFFFFF;
            padding: 10px 15px;
            margin: 15px 10px 15px 0;
            border-radius: 5px;
        }

        .delete .yesno a:hover {
            background-color: #32a367;
        }

        .poll-vote form {
            display: flex;
            flex-flow: column;
        }

        .poll-vote form label {
            padding-bottom: 10px;
        }

        .poll-vote form input[type="radio"] {
            transform: scale(1.1);
        }

        .poll-vote form input[type="submit"],
        .poll-vote form a {
            display: inline-block;
            padding: 8px;
            border-radius: 5px;
            background-color: #38b673;
            border: 0;
            font-weight: bold;
            font-size: 14px;
            color: #FFFFFF;
            cursor: pointer;
            width: 150px;
            margin-top: 15px;
        }

        .poll-vote form input[type="submit"]:hover,
        .poll-vote form a:hover {
            background-color: #32a367;
        }

        .poll-vote form a {
            text-align: center;
            text-decoration: none;
            background-color: #37afb7;
            margin-left: 5px;
        }

        .poll-vote form a:hover {
            background-color: #319ca3;
        }

        .poll-result .wrapper {
            display: flex;
            flex-flow: column;
        }

        .poll-result .wrapper .poll-question {
            width: 50%;
            padding-bottom: 5px;
        }

        .poll-result .wrapper .poll-question p {
            margin: 0;
            padding: 5px 0;
        }

        .poll-result .wrapper .poll-question p span {
            font-size: 14px;
        }

        .poll-result .wrapper .poll-question .result-bar {
            display: flex;
            height: 25px;
            min-width: 5%;
            background-color: #38b673;
            border-radius: 5px;
            font-size: 14px;
            color: #FFFFFF;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content home">
            <h2>Polls</h2>
            <p>Welcome to the home page! You can view the list of polls below.</p>
            <a href="{{url('/create')}}" class="create-poll">Create Poll</a>
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Title</td>
                        <td>Answers</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($polls as $poll)
                        <tr>
                            <td> {{ $poll->id }}</td>
                            <td>{{ $poll->title }} </td>
                            <td>
                                @foreach ($poll->poll_answers as $item)
                                    {{ $item->title }},
                                @endforeach
                            </td>
                            <td class="actions">
                                <a href="{{ url('show/'.$poll->id)  }}" class="view" title="View Poll">Afficher</a>
                                <a href="delete.php?id={{ $poll->id }}" class="trash" title="Delete Poll">Modifier<i
                                        class="fas fa-trash fa-xs"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
