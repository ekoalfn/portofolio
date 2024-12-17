<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Position;
use App\Models\Career;
use App\Models\PositionCareers;
use App\Models\IpTracker;
use App\Models\Demo;
use Artesaos\SEOTools\Facades\SEOTools;

class WebController extends Controller
{
    public function home()
    {
    //      Artisan::call('cache:clear');
    //   Artisan::call('route:cache');
    //   Artisan::call('config:cache');
    //   Artisan::call('config:clear');


        SEOTools::setTitle('Senior Full Stack Developer| Cahyo Saputro', false);
        SEOTools::setDescription('Jasa Pembuatan Website dan Aplikasi Mobile dan IOS Semarang & Salatiga');
        SEOTools::opengraph()->setUrl('https://cahyosaputro.my.id');
        SEOTools::setCanonical('https://cahyosaputro.my.id');
        SEOTools::opengraph()->addProperty('type', 'articles');

        SEOTools::jsonLd()->addImage('https://cahyosaputro.my.id/web/img/yan-afriyoko.png');
        $blogs = Blog::with('categoryBlogs', 'users')->where('publish', 1)->latest()->take(5)->get();
        
        
        $portfolios = [
             [
                'title' => "Simtaka Apps",
                'description' => "Laravel | VueJs",
                'image' => "./web/img/portofolio/cahyo/simtaka.png",
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web'
                ]
            ],
             [
                'title' => "E bpn",
                'description' => "Php | Codeigniter | Bootstrap",
                'image' => "./web/img/portofolio/cahyo/ebpn.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                    'mobile'
                ]
            ],
             [
                'title' => "Inilah News Portal",
                'description' => "Laravel | NextJs | RESTful API ",
                'image' => "./web/img/portofolio/cahyo/inilah.png",
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web'
                ]
            ],
             [
                'title' => "Javabica Online Shop",
                'description' => "Laravel | Nuxt | RESTful API ",
                'image' => "./web/img/portofolio/cahyo/javabica.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web'
                ]
            ],
            [
                'title' => "Nifty Educate Blockchain Application",
                'description' => "Laravel | Web3 | ReactJs",
                'image' => "./web/img/portofolio/cahyo/niftyeducate.png",
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web'
                ]
            ],
            [
                'title' => "Sidokoe",
                'description' => "Laravel | Tailwind | PHP",
                'image' => "./web/img/portofolio/cahyo/sidokoe.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                    'mobile'
                ]
            ],
        ];

        return view('web.home', compact('blogs','portfolios'));
    }

    public function portofolio()
    {
        SEOTools::setTitle('portofolio - Senior Full Stack Developer| Cahyo Saputro', false);
        SEOTools::setDescription('Jasa Pembuatan Website dan Aplikasi Mobile dan IOS Semarang Salatiga');
        SEOTools::opengraph()->setUrl('https://cahyosaputro.my.id');
        SEOTools::setCanonical('https://cahyosaputro.my.id');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://cahyosaputro.my.id/web/img/photos/fullstack-developer-dimas.png');

        $portfolios = [
             [
                'title' => "Inilah News Portal",
                'description' => "Laravel | NextJs | RESTful API ",
                'image' => "./web/img/portofolio/cahyo/inilah.png",
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                    'mobile'
                ]
            ],
             [
                'title' => "Javabica Online Shop",
                'description' => "Laravel | Nuxt | RESTful API ",
                'image' => "./web/img/portofolio/cahyo/javabica.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                    'mobile'
                ]
            ],
            [
                'title' => "Road To Virtuosity",
                'description' => "Laravel | Bootstrap | PHP",
                'image' => "./web/img/portofolio/cahyo/rtv.png",
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web'
                ]
                ],
            [
                'title' => "Nifty Educate Blockchain Application",
                'description' => "Laravel | Web3 | ReactJs",
                'image' => "./web/img/portofolio/cahyo/niftyeducate.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web'
                ]
            ],
            [
                'title' => "Sidokoe",
                'description' => "Laravel | VueJs | Inertia",
                'image' => "./web/img/portofolio/cahyo/sidokoe.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                ]
            ],
            [
                'title' => "Simtaka",
                'description' => "Laravel | VueJs | Tailwind",
                'image' => "./web/img/portofolio/cahyo/simtaka.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                ]
            ],
            [
                'title' => "Simperkab",
                'description' => "Laravel | Openlayer | Tailwind",
                'image' => "./web/img/portofolio/cahyo/simperkab.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                ]
            ],
            [
                'title' => "E-BPN",
                'description' => "Codeigniter | Bootstrap | Restful API",
                'image' => "./web/img/portofolio/cahyo/ebpn.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                ]
            ],
            [
                'title' => "Inowfashion",
                'description' => "Laravel | VueJs | Inertia",
                'image' => "./web/img/portofolio/cahyo/inowfashion.png", 
                'url' => "https://www.upwork.com/freelancers/~01a593edbb46b2e4d1",
                'category' => [
                    'web',
                ]
            ],
        ];


        return view('web.portofolio', compact("portfolios"));
    }


    public function article(Request $request)
    {

        SEOTools::setTitle('Artikel - Senior Full Stack Developer| Robby Birham', false);
        SEOTools::setDescription('Jasa Pembuatan Website dan Aplikasi Mobile dan IOS Semarang');
        SEOTools::opengraph()->setUrl('https://robbybirham.id');
        SEOTools::setCanonical('https://robbybirham.id');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://robbybirham.id/web/img/photos/fullstack-developer-dimas.png');
        $keyword = $request->get('search');
        $categorySlug = $request->get('category');
        if (!empty($keyword)) {
            $blogs = Blog::with('categoryBlogs', 'users')->where('publish', 1)->where('title', 'like', "%$keyword%")->latest()->paginate(10);
        } else if (!empty($categorySlug)) {
            $blogs = Blog::with('categoryBlogs', 'users')
                ->where('publish', 1)
                ->whereHas('categoryBlogs', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                })
                ->latest()->paginate(10);
            // dd($blogs);
        } else {
            $blogs = Blog::with('categoryBlogs', 'users')->where('publish', 1)->latest()->paginate(10);
        }


        $blogTop = Blog::with('categoryBlogs', 'users')->where('publish', 1)->take(3)->get();
        $categories = Category::orderBy('id', 'desc')->get();

        return view('web.blogs.index', compact('blogs', 'categories', 'blogTop', 'categorySlug'));
    }

    public function detail_article($slug)
    {


        $blog = Blog::with('categoryBlogs', 'users')->where('slug', $slug)->first();
        SEOTools::setTitle($blog->seo_title, false);
        SEOTools::setDescription($blog->seo_description);
        SEOTools::opengraph()->setUrl('https://robbybirham.id');
        SEOTools::setCanonical('https://robbybirham.id');
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage('https://robbybirham.id/web/img/photos/fullstack-developer-dimas.png');

        $checkIp = IpTracker::where('ip_address', request()->ip())->where('blog_id', $blog->id)->exists();
        if (!$checkIp) {
            IpTracker::create([
                'ip_address' => request()->ip(),
                'blog_id' => $blog->id,
            ]);
        }

        $blogTop = Blog::with('categoryBlogs', 'users')->where('publish', 1)->take(3)->get();
        $categories = Category::orderBy('id', 'desc')->get();

        return view('web.blogs.detail', compact('blog', 'categories', 'blogTop'));
    }
}
