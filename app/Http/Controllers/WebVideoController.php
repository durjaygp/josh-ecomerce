<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Sabre\DAV\Client;

class WebVideoController extends Controller
{
    public function index()
    {
        $category = VideoCategory::whereStatus(1)->get();
        $videos = Video::latest()->whereStatus(1)->paginate(16);
        return view('video.home.index',compact('category','videos'));
    }

    public function category($slug)
    {
        $category = VideoCategory::where('slug',$slug)->first();
        $videos = Video::latest()->whereStatus(1)->where('video_category_id',$category->id)->paginate(16);
        return view('video.home.index',compact('category','videos'));
    }

    public function details($slug)
    {
        $video = Video::where('slug',$slug)->first();

        $videofile = url('/video/stream/' . $video->video);
      //$videofile = "https://nx60960.your-storageshare.de/remote.php/dav/files/jsbtechweb/video/".$video->video;
        $videos = Video::latest()->whereStatus(1)->get();
        return view('video.video.details',compact('video','videofile','videos'));
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->query('query');
            $videos = Video::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->take(10)
                ->get();

            $output = '<ul class="list-group">';
            if (count($videos) > 0) {
                foreach ($videos as $video) {
                    $output .= '<li class="list-group-item"><a href="/video/' . $video->slug . '">' . $video->name . '</a></li>';
                }
            } else {
                $output .= '<li class="list-group-item">No results found</li>';
            }
            $output .= '</ul>';

            return response()->json($output);
        }
    }
}
