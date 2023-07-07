<x-filament::page>
    <link rel="preload" href="../css/style.css" as="style" />
    <link rel="preload" href="../css/lesson.css" as="style" />
    <link rel="preload" href="../js/lesson.js" as="script" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/lesson.css">


    
    <div class="content-center full-width" id="module">
        <div class="lesson-content">
            {!! \App\Models\Lesson::where('module', 'Module 5')->skip(0)->first()->content ?? 'No Published Lessons. Please contact the website administrator.' !!}
        </div>
        <div class="next-previous">
            <a href="/module-4-assessment" class="previous">&lt; Prev</a>
            <a href="/module-5-assessment" class="next">Next &gt;</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="../js/lesson.js"></script>
    <script>
        // $('#module').innerHtml = 
    </script>
</x-filament::page>
