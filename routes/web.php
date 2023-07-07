<?php

use Illuminate\Support\Facades\Route;
use App\Models\Assess1;
use App\Models\Score;
use App\Models\Assessment;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
});

Route::get('/reset', function () {
    $users = User::all();
    // $user = User::where('id', 1)->first();

    foreach ($users as $user){
        $user->onboarding = null;
        $user->progress = 1;    
        $user->score1 = null;
        $user->score2 = null;
        $user->score3 = null;
        $user->score4 = null;
        $user->score5 = null;
        $user->save();    
        Score::where('userid', $user->id)->delete();
    }
});

Route::get('/assessment-results', function(){
    return view('assess_results');
})->name('assess_results');

Route::get('/onboarding', function(){
    $user = User::find(auth()->user()->id);
    $user->onboarding = 1;
    $user->save();
    return;
})->name('onboarding');



Route::post('/assess', function(){

    $ans_num = count(Assessment::select('questions')->where('module', request('moduleid'))->get()[0]['questions']);
    $ans_user = [];
    $ans_right = 0;
    
    for($user_ans = 1; $user_ans <= $ans_num; $user_ans++){
        array_push($ans_user, request('q'.$user_ans));
        if(Assessment::select('questions')->where('module', request('moduleid'))->get()[0]['questions'][$user_ans-1]['answer'] == request('q'.$user_ans)){
            $ans_right += 1;
        }
    }

    // //////////////////////////////////////////////////////////////////////////////

    // Request all items
    if(Score::where('userid', '=', auth()->user()->id)->where('module', request('moduleid'))->count() >= 1){
        
        if(Score::where('userid', '=', auth()->user()->id)->where('module', request('moduleid'))->first()->highscore <= ($ans_num/2) && $ans_right > ($ans_num/2) && auth()->user()->progress != 5){
            $user = User::find(auth()->user()->id);
            $user->progress +=1;
            $user->save();
        }
        if(Score::where('userid', '=', auth()->user()->id)->where('module', request('moduleid'))->first()->highscore < $ans_right){
            $ans_new = Score::where('userid', '=', auth()->user()->id)->where('module', request('moduleid'))->first();
            $ans_new->highscore = $ans_right;
            $ans_new->save();

            $off_ans = User::find(auth()->user()->id);
            if (auth()->user()->progress == 1 || request('moduleid') == 'Module 1'){
                $off_ans->score1 = $ans_right;
            } else if (auth()->user()->progress == 2 || request('moduleid') == 'Module 2'){
                $off_ans->score2 = $ans_right;
            } else if (auth()->user()->progress == 3 || request('moduleid') == 'Module 3'){
                $off_ans->score3 = $ans_right;
            } else if (auth()->user()->progress == 4 || request('moduleid') == 'Module 4'){
                $off_ans->score4 = $ans_right;
            } else if (auth()->user()->progress == 5 || request('moduleid') == 'Module 5'){
                $off_ans->score5 = $ans_right;
            }
            $off_ans->save();
        }
    } else{
        Score::create([
            'userid' => request('userid'),
            'module' => request('moduleid'),
            'highscore' => $ans_right,
        ]);

        if(($ans_right > $ans_num/2) && auth()->user()->progress != 5){
            $user = User::find(auth()->user()->id);
            $user->progress += 1;
            $user->save();
        }

        $off_ans = User::find(auth()->user()->id);
            if (auth()->user()->progress == 1 || request('moduleid') == 'Module 1'){
                $off_ans->score1 = $ans_right;
            } else if (auth()->user()->progress == 2 || request('moduleid') == 'Module 2'){
                $off_ans->score2 = $ans_right;
            } else if (auth()->user()->progress == 3 || request('moduleid') == 'Module 3'){
                $off_ans->score3 = $ans_right;
            } else if (auth()->user()->progress == 4 || request('moduleid') == 'Module 4'){
                $off_ans->score4 = $ans_right;
            } else if (auth()->user()->progress == 5 || request('moduleid') == 'Module 5'){
                $off_ans->score5 = $ans_right;
            }
            $off_ans->save();
    }
    if($ans_right > $ans_num/2){
        $result = '1';
    } else{
        $result = '0';
    }
    // return redirect()->route('assess1results')->with(['results' => $rightAnswers, 'over' => count($answers), 'pass' => $result]);
    return redirect()->route('assess_results')->with(['results' => $ans_right, 'over' => $ans_num, 'pass' => $result, 'module' => request('moduleid')]);
});
