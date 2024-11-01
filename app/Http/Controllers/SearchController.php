<?php

    namespace App\Http\Controllers;

    use App\Models\Job;
    use Illuminate\Http\Request;

    class SearchController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Request $request)
        {
            $request->validate([
                'q' => ['required', 'string', 'max:255'],
            ]);

            $jobs = Job::query()
                ->with(['employer', 'tags'])
                ->where('title', 'like', "%{$request->q}%")
                ->get();

            return view('results', [
                'jobs' => $jobs,
            ]);
        }
    }
