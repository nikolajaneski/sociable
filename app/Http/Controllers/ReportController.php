<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Mail\PostReportedMail;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {
        Mail::to('support@sociable.com')
                ->send(new PostReportedMail([
                    'post' => $post,
                    'user' => auth()->user()
                ]));

        return back();
        
    }
}
