<?php

namespace App\Http\Controllers;

    use App\Models\Category;
    use App\Models\Contact;
    use App\Models\Post;
    use App\Models\Tag;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class ContactUsFormController extends Controller
    {
        // Create Contact Form
        public function createForm(Request $request)
        {
            return view('contact');
        }

        // Store Contact Form data
        public function ContactUsForm(Request $request)
        {
            // Form validation
            $validatedData = request()->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'subject' => 'required',
                'message' => 'required',
            ]);
            //  Store data in database
            Contact::create($validatedData);

            $request->session()->flash('status',
                'We have received your message and would like to thank you for writing to us. We typically respond within 24 hours.');

//            $posts = Post::published()->orderBy('created_at', 'DESC')->get();
//
//            $clientSearch = $request->input('client-search');
//
//            if ($request->has('client-search')) {
//                $posts = Post::where('title', 'like', "%{$clientSearch}%")->get();
//            }

            return view("welcome", ["posts" => Post::with("tags")->with("categories")->get()]);

//            return view('welcome', [
//                'posts' => $posts,
//                'tags' => Tag::all(),
//                'categories' => Category::all(),
//                'bio' => DB::table('bio')->where('id', 1)->first(),
//            ]);
        }
    }
