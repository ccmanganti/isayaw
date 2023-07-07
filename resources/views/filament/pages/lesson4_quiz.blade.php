<x-filament::page>
    <link rel="stylesheet" href="../css/quiz.css">
    
    <div class="content-center full-width">
        <div class="content">
            <div class="assessment-form">
                <form action="/assess" method="POST" class="form-assess">
                    @csrf
                    <input type="hidden" name="userid" readonly value="{{ auth()->user()->id }}">
                    <input type="hidden" name="moduleid" readonly value="Module 4">
                    
                    @foreach (\App\Models\Assessment::select('questions')->where('module', 'Module 4')->get() as $question)
                        @foreach ($question['questions'] as $q)
                            <div class="questions">
                                <div class="question">
                                    <label for={{ $loop->index }}>{!! $q['question'] !!}</label>
                                </div>
                                <div class="question-items">
                                    <input type="radio" name={{ 'q'.($loop->index+1) }} value="c1" id={{ 'choice'.($loop->index+1).'1' }} required/><label for={{ 'choice'.($loop->index+1).'1' }} class="empty-choice"> {!! $q['c1'] ?? 'No data' !!} </label>
                                    <input type="radio" name={{ 'q'.($loop->index+1) }} value="c2" id={{ 'choice'.($loop->index+1).'2' }} required/><label for={{ 'choice'.($loop->index+1).'2' }} class="empty-choice"> {!! $q['c2'] ?? 'No data' !!} </label>
                                    <input type="radio" name={{ 'q'.($loop->index+1) }} value="c3" id={{ 'choice'.($loop->index+1).'3' }} required/><label for={{ 'choice'.($loop->index+1).'3' }} class="empty-choice"> {!! $q['c3'] ?? 'No data' !!} </label>
                                    <input type="radio" name={{ 'q'.($loop->index+1) }} value="c4" id={{ 'choice'.($loop->index+1).'4' }} required/><label for={{ 'choice'.($loop->index+1).'4' }} class="empty-choice"> {!! $q['c4'] ?? 'No data' !!} </label>
                                </div>
                            </div>    
                        @endforeach    
                        <button class="formSubmit">Submit your answers ✓</button>
                    @endforeach
                </form>

                @if ((\App\Models\Assessment::select('questions')->where('module', 'Module 4')->first()) == null)
                    <p>No Published Assessment. Please contact the website administrator.</p>
                @endif
            </div>
        </div>    
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="../js/style.js"></script>
</x-filament::page>
