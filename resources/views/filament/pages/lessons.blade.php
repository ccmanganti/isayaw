<x-filament::page>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="description" content="Learn folk dances with iSAYAW App.">
    <meta name="keywords" content="iSAYAW, folk-dances, learning-app">
    <link rel="canonical" href="https://isayaw.com">
    <meta name="robots" content="index,follow">
    <meta property="og:title" content="iSAYAW App">
    <meta property="og:description" content="Learn folk dances using iSAYAW App's modules and assessment features. Elevate your learnings and track your progress.">
    <meta property="og:url" content="https://isayaw.com/module-2-lesson-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/lesson.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <div class="full-width">

        {{-- ONBOARDING --}}
        <div class="onboarding" id="onboarding" style="@if(Auth::user()->onboarding === 1) display:none; @else display:block; @endif">
            <div class="tutorial-1" id="tutorial-welcome">
                <video src="../img/onboarding/welcome.mp4" autoplay muted loop class="tutorial-welcome"></video>
            </div>
            <div class="tutorial-2" id="tutorial-2">
                <img src="../img/onboarding/study.gif" class="tutorial-study">
            </div>
            <div class="tutorial-3" id="tutorial-3">
                <img src="../img/onboarding/unlock.gif" class="tutorial-unlock">
            </div>
            <div class="tutorial-progress">
                <p id="progress1" class="current-progress">.</p>
                <p id="progress2">.</p>
                <p id="progress3">.</p>
            </div>
            <div class="tutorial-details">
                <p class="tutorial-title" id="tutorial-title">Welcome to iSAYAW!</p>
                <p class="tutorial-desc" id="tutorial-desc">
                   Your <b class="onboarding-intro" style="color: #ec7763;">I</b>nteractive <b class="onboarding-intro" style="color: #ec7763;">S</b>upplemental <b class="onboarding-intro" style="color: #ec7763;">A</b>ssistant <b class="onboarding-intro" style="color: #ec7763;">Y</b>ou can <b class="onboarding-intro" style="color: #ec7763;">A</b>ccess via the <b class="onboarding-intro" style="color: #ec7763;">W</b>eb
                </p>
            </div>
            <div class="tutorial-continue">
                <div class="arrow-continue" id="next-tutorial">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>    
                </div>
            </div>
        </div>

        <div class="tutorial" id="tutorial" style="@if(Auth::user()->onboarding === 1) display:none; @else display:block; @endif">
            <div class="tutor-contain" id="tutor-contain">
                <div class="tutorial-container" id="tutorial-contain">
                    <div class="tutor-content" id="tutor-content">
                        <h2 class="isayaw-instructions">How to use the iSAYAW App</h2>
                        <video src="../img/onboarding/tutorial.mp4" autoplay muted loop class="tutorial-vid"></video>
                        <div class="instruct">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, repellat quasi reprehenderit temporibus dolorem corporis! Porro molestias voluptatum repudiandae itaque quam vitae eius molestiae sit illum, recusandae error eum non!</p>
                            <br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi facere corrupti excepturi ipsa architecto optio repellendus nostrum minima quasi, voluptatem eum molestiae temporibus dolores veritatis libero doloremque officiis, natus nemo.</p>
                        </div>
                    </div>
                    <div class="tutorial-next" id="tutorial-next">
                        <p>Okay</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODULES --}}
        {{-- <div class="showcase" style="@if(Auth::user()->onboarding === 1) display:flex; @else display:none; @endif">
            <img src="../img/logo1.png" alt="iSayaw" class="showcase">
        </div> --}}

        <div class="greetings" id="greetings" style="@if(Auth::user()->onboarding === 1) display:flex; @else display:none; @endif">
            <div class="greeting-container">
                <div class="greeting-con">
                    <span class="greet">Hi {{ explode(' ',trim(auth()->user()->name))[0] }},</span>
                    <span class="greeting">Great to see you again!</span>
                </div>
            </div>
                
            <img src="../img/logo1.png" alt="iSayaw" class="showcase">
            <div class="user-prog">
                <span class="prog-label">Modules Progressed:</span>
                <span class="prog">{{ (((auth()->user()->progress)/5)*100)."%" }}</span>
            </div>
            <div class="continue-btn">
                <a href="{{ ('/module-').auth()->user()->progress.('-lesson-1') }}" class="continue">
                    <span class="start-read">
                        @if (auth()->user()->progress > 1) Continue @else Start @endif Reading
                    </span>
                    @if (auth()->user()->progress > 1)
                        <span class="progress-read">
                            &lpar;Module @if (auth()->user()->progress < 6) {{auth()->user()->progress}} @else {{auth()->user()->progress-1}} @endif &rpar;
                        </span>
                    @endif
                </a>
            </div>    
        </div>

        {{-- <div class="stats" style="@if(Auth::user()->onboarding === 1) display:flex; @else display:none; @endif">
            <div class="stat1">

            </div>
        </div> --}}

        {{-- Module Navigation --}}
        <div class="module-nav" id="module-nav" style="@if(Auth::user()->onboarding === 1) display:flex; @else display:none; @endif">
            <a href="javascript: void(0)" class="nav-module" id="nav-module">Modules</a>
            <a href="javascript: void(0)" class="nav-module inactive" id="nav-exe">Exercises</a>
        </div>
        <div id="modules" style="@if(Auth::user()->onboarding === 1) display:flex; @else display:none; @endif">
            <a href="@if(Auth::user()->progress < 1) javascript: void(0) @endif /module-1-lesson-1" class="@if(Auth::user()->progress < 1) lessonLinkDisable @endif lesson-link" data-aos="flip-down" data-aos-offset="50">
                <div class="lesson lesson1">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Module I</p>
                        <p class="progress-module-desc">Abbreviations and Signs Used</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 1) ../img/progress/module_icon2.png @else ../img/progress/1.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>

            <a href="@if(Auth::user()->progress < 2) javascript: void(0) @endif /module-2-lesson-1" class="@if(Auth::user()->progress < 2) lessonLinkDisable @endif lesson-link" data-aos="flip-down" data-aos-offset="50">
                <div class="lesson lesson2 @if(Auth::user()->progress < 2) lessonDisable @endif">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Module II</p>
                        <p class="progress-module-desc">Fundamental Positions of Arms and Feet in Folk Dance</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 2) ../img/progress/module_icon2.png @else ../img/progress/2.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>

            <a href="@if(Auth::user()->progress < 3) javascript: void(0) @endif /module-3-lesson-1" class="@if(Auth::user()->progress < 3) lessonLinkDisable @endif lesson-link" data-aos="flip-down" data-aos-offset="50">
                <div class="lesson lesson3 @if(Auth::user()->progress < 3) lessonDisable @endif">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Module III</p>
                        <p class="progress-module-desc">Common  Dance Terms</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 3) ../img/progress/module_icon2.png @else ../img/progress/3.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>

            <a href="@if(Auth::user()->progress < 4) javascript: void(0) @endif /module-4-lesson-1" class="@if(Auth::user()->progress < 4) lessonLinkDisable @endif lesson-link" data-aos="flip-down" data-aos-offset="50">
                <div class="lesson lesson4 @if(Auth::user()->progress < 4) lessonDisable @endif">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Module IV</p>
                        <p class="progress-module-desc">Fundamental Folk Dance Steps</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 4) ../img/progress/module_icon2.png @else ../img/progress/4.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>

            <a href="@if(Auth::user()->progress < 5) javascript: void(0) @endif /module-5-lesson-1" class="@if(Auth::user()->progress < 5) lessonLinkDisable @endif lesson-link" data-aos="flip-down" data-aos-offset="50">
                <div class="lesson lesson5 @if(Auth::user()->progress < 5) lessonDisable @endif">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Module V</p>
                        <p class="progress-module-desc">Dance Formations</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 5) ../img/progress/module_icon2.png @else ../img/progress/5.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>
        </div>

        {{-- EXERCISES --}}
        <div id="exercises" style="@if(Auth::user()->onboarding === 1) display:flex; @else display:none; @endif">
            <a href="@if(Auth::user()->progress < 1) javascript: void(0) @endif /module-1-assessment" class="@if(Auth::user()->progress < 1) lessonLinkDisable @endif assessment-link inactive">
                <div class="lesson exercise1">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Assessment I</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 1) ../img/progress/module_icon2.png @else ../img/progress/exam.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>

            <a href="@if(Auth::user()->progress < 2) javascript: void(0) @endif /module-2-assessment" class="@if(Auth::user()->progress < 2) lessonLinkDisable @endif assessment-link inactive">
                <div class="lesson exercise2 @if(Auth::user()->progress < 2) lessonDisable @endif">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Assessment II</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 2) ../img/progress/module_icon2.png @else ../img/progress/exam.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>

            <a href="@if(Auth::user()->progress < 3) javascript: void(0) @endif /module-3-assessment" class="@if(Auth::user()->progress < 3) lessonLinkDisable @endif assessment-link inactive">
                <div class="lesson exercise3 @if(Auth::user()->progress < 3) lessonDisable @endif">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Assessment III</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 3) ../img/progress/module_icon2.png @else ../img/progress/exam.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>

            <a href="@if(Auth::user()->progress < 4) javascript: void(0) @endif /module-4-assessment" class="@if(Auth::user()->progress < 4) lessonLinkDisable @endif assessment-link inactive">
                <div class="lesson exercise4 @if(Auth::user()->progress < 4) lessonDisable @endif">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Assessment IV</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 4) ../img/progress/module_icon2.png @else ../img/progress/exam.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>

            <a href="@if(Auth::user()->progress < 5) javascript: void(0) @endif /module-5-assessment" class="@if(Auth::user()->progress < 5) lessonLinkDisable @endif assessment-link inactive">
                <div class="lesson exercise5 @if(Auth::user()->progress < 5) lessonDisable @endif">
                    <div class="lesson-titles">
                        <p class="progress-module-title">Assessment V</p>
                    </div>
                    <div class="module-icon-wrap">
                        <img src="@if(Auth::user()->progress < 5) ../img/progress/module_icon2.png @else ../img/progress/exam.png @endif" alt="" class="module-icon">
                    </div>
                </div>
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="../js/style.js"></script>
</x-filament::page>
