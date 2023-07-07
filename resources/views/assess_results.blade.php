@if (session()->get('results') === null)
    <script>window.location.href = "/";</script>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Results</title>
    <link rel="stylesheet" href="../css/results.css">

</head>
<body>
    <div class="content">
        <img src="@if(session()->get('pass') == 1) /img/result.gif @else /img/resultx.gif @endif" alt=""  class="results-img">
        @if(session()->get('pass') == 1)
            <p class="results-text">Congrats {{ explode(' ',trim(auth()->user()->name))[0]}}!</p>
        @else
            <p class="results-text">Score should be more than 50%.</p>
        @endif
        <p class="results-text score">Score: {{ session()->get('results') }}/{{ session()->get('over') }}</p>
        @if(session()->get('module') == 'Module 1')
            <a href="/module-1-assessment" class="result-options retry">Retry</a>
            @if(auth()->user()->progress > 1)
                <a href="/module-2-lesson-1" class="result-options next">Next Module</a>
            @endif
        @elseif(session()->get('module') == 'Module 2')
            <a href="/module-2-assessment" class="result-options retry">Retry</a>
            @if(auth()->user()->progress > 2)
                <a href="/module-3-lesson-1" class="result-options next">Next Module</a>
            @endif
        @elseif(session()->get('module') == 'Module 3')
            <a href="/module-3-assessment" class="result-options retry">Retry</a>
            @if(auth()->user()->progress > 3)
                <a href="/module-4-lesson-1" class="result-options next">Next Module</a>
            @endif
        @elseif(session()->get('module') == 'Module 4')
            <a href="/module-4-assessment" class="result-options retry">Retry</a>
            @if(auth()->user()->progress > 4)
                <a href="/module-5-lesson-1" class="result-options next">Next Module</a>
            @endif            
        @endif
        <a href="/" class="result-options home">Home</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="../js/style.js"></script>
</body>
</html>





