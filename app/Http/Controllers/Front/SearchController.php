<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\Page;
use App\Models\Faq;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function search(Request $request)
    {
        $q = $request->get('q', '');
        $services = collect();
        $products = collect();
        $posts = collect();
        $faqs = collect();
        $total = 0;

        if (strlen($q) >= 2) {
            $term = '%' . $q . '%';

            $services = Service::whereTranslationLike('title', $term)
                ->orWhereTranslationLike('description', $term)
                ->with('translations')->get();

            $products = Product::whereTranslationLike('title', $term)
                ->orWhereTranslationLike('description', $term)
                ->with('translations')->get();

            $posts = Post::published()
                ->whereTranslationLike('title', $term)
                ->orWhereTranslationLike('content', $term)
                ->with('translations', 'category')->get();

            $faqs = Faq::whereTranslationLike('question', $term)
                ->orWhereTranslationLike('answer', $term)
                ->with('translations')->get();

            $total = $services->count() + $products->count() + $posts->count() + $faqs->count();
        }

        $data = compact('q', 'services', 'products', 'posts', 'faqs', 'total');
        $data['title'] = $q ? __('translate.search_results') . ': ' . $q : __('translate.search');

        return view('frontend.search', $data);
    }
}
