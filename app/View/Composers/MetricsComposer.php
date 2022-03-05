<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use App\Models\Story;
use App\Models\User;
use Illuminate\Support\Facades\DB; 

class MetricsComposer
{
    public function compose(View $view)
    {
        
        $total = [
            'users' => User::count(),
            'authors' => Story::get()->unique('user_id')->count(),
            'active_stories' => Story::where('status', 1)->count(),
            'inactive_stories' => Story::where('status', 0)->count()
        ];
        
        $view->with([
            'total'=> $total,
        ]);
    }
}