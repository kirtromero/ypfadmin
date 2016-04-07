<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Scene;
use App\Affiliate;
use App\Feed;
use App\Site;
use App\Tag;
use App\Thumbnail;

class ScanFeeds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scan:feeds {affiliate_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan dump feeds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $site_id = 1;
        $affiliate_id = $this->argument('affiliate_id');

        $feed = Feed::where("affiliate_id","=", $affiliate_id)->orderBy("updated_at", "DESC")->skip(1)->first();

        $xml = simplexml_load_file($feed->url, 'SimpleXMLElement', LIBXML_NOCDATA);

        $feed->url = $feed->url;
        $feed->save();

        foreach ($xml->channel->item as $key => $item)
        {
            $count = Scene::where('link',"=", $item->link)->count();

            if($count == 0)
            {
                $scene = new Scene();
                $scene->title = $item->title;
                $scene->embed = $item->embed;
                $scene->site_id = $site_id;
                $scene->affiliate_id = $affiliate_id;
                $scene->duration = $item->duration;
                $scene->link = $item->link;
                $scene->primary_thumbnail = $item->thumb;
                $scene->save();

                $tags = trim($item->keywords);
                $tagsAr = explode(",", $tags);
                $textAr = array_filter($tagsAr, 'trim');
                $tagIds = array();

                foreach($textAr as $tagtext)
                {
                    $slug = str_slug($tagtext, "-");
                    $tagCount = Tag::where('slug', '=', $slug)->count();
                    if($tagCount == 0)
                    {
                        $tag = new Tag;
                        $tag->name = str_replace("-"," ",$tagtext);
                        $tag->slug = $slug;
                        $tag->save();

                        $tagIds[] = $tag->id;
                    }
                    else
                    {
                        $tag = Tag::where('slug', '=', $slug)->first();
                        $tagIds[] = $tag->id;
                    }

                }

                $scene->tag()->sync($tagIds);

                $thumbnail = new Thumbnail;
                $thumbnail->url = $item->thumb;
                $thumbnail->scene_id = $scene->id;
                $thumbnail->save();
            }
            else
            {
                $scene = Scene::where('link',"=", $item->link)->first();
                $scene->title = $item->title;
                $scene->embed = $item->embed;
                $scene->site_id = $site_id;
                $scene->affiliate_id = $affiliate_id;
                $scene->duration = $item->duration;
                $scene->link = $item->link;
                $scene->primary_thumbnail = $item->thumb;
                $scene->save();
            }
        }
    }
}
