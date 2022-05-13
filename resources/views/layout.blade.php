<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BLOG</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="/css/style.css">
{{--    <link rel="stylesheet" href="/css/bootstrap.min.css">--}}


</head>
<body>
{{--   20% --}}
<div id="left_side" class="left_side">
    <div class="logos">
        <p onclick="location.href='#'" style="cursor: pointer;" class="h25">logo</p>
        <div onclick="location.href='#'" style="cursor: pointer;" class="h15" role="tooltip" aria-hidden="false"
             aria-describedby="1" aria-labelledby="1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Home">
                <path
                    d="M4.5 10.75v10.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-5.5c0-.14.11-.25.25-.25h3.5c.14 0 .25.11.25.25v5.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-10.5M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9"
                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <div onclick="location.href='#'" style="cursor: pointer;" class="h15" role="tooltip" aria-hidden="false"
             aria-describedby="5" aria-labelledby="5">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Write">
                <path
                    d="M14 4a.5.5 0 0 0 0-1v1zm7 6a.5.5 0 0 0-1 0h1zm-7-7H4v1h10V3zM3 4v16h1V4H3zm1 17h16v-1H4v1zm17-1V10h-1v10h1zm-1 1a1 1 0 0 0 1-1h-1v1zM3 20a1 1 0 0 0 1 1v-1H3zM4 3a1 1 0 0 0-1 1h1V3z"
                    fill="currentColor"></path>
                <path
                    d="M17.5 4.5l-8.46 8.46a.25.25 0 0 0-.06.1l-.82 2.47c-.07.2.12.38.31.31l2.47-.82a.25.25 0 0 0 .1-.06L19.5 6.5m-2-2l2.32-2.32c.1-.1.26-.1.36 0l1.64 1.64c.1.1.1.26 0 .36L19.5 6.5m-2-2l2 2"
                    stroke="currentColor">
                </path>
            </svg>
        </div>
        <div onclick="location.href='#'" style="cursor: pointer;" class="h15">
            <img alt="Profile" class="l ci gk si sj go" src="/contact.jpg" width="32" height="32">
        </div>
        <div onclick="location.href='#'" style="cursor: pointer;" class="h15">
            <img alt="Profile" class="l ci gk si sj go" src="/profile.jpg" width="32" height="32">
        </div>
    </div>

</div>


<div id="middle_side" class="middle_side">
    {{--   50% --}}
    @yield('content')

</div>


<div id="right_side" class="right_side">
    {{--   30% --}}
    <div>
        <a href="/get-premium-plan" type="text" id="premium-box" class="premium-box">Get Premium plan</a>
    </div>
    <div>
        <input type="text" id="search-box" class="search-box" placeholder="search">
    </div>
    <div class="suggested-posts">
        <div class="suggested-post" onclick="location.href='#'">
            <p class="title">Title</p>
            <p>Description ttttttttt tttttttttttttt dddddddddddddd ppppppppppppppp mmmmmmmmmmmmmmmmmmmm</p>
        </div>

    </div>


</div>
</body>

<script>
    function search() {
        var search_box = document.getElementById('search-box').value;
        window.location = '/?search=' + search_box;
    }

    document.querySelector('#search-box').addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
            search();
        }
    });
</script>
</html>
