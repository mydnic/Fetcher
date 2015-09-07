<?php

namespace App\Console\Commands;

use App\Article;
use App\Source;
use Carbon\Carbon;
use DOMDocument;
use Feeds;
use Illuminate\Console\Command;

class FetchSources extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sources:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
        $sources = Source::all();

        foreach ($sources as $source) {
            $feed  = Feeds::make($source->feed_url);
            $items = $feed->get_items();

            foreach ($items as $item) {
                $article            = Article::firstOrNew(['link' => $item->get_permalink()]);
                $article->source_id = $source->id;
                $article->title     = $item->get_title();
                $article->content   = $item->get_description();
                $article->date      = Carbon::createFromFormat('j F Y, g:i a', $item->get_date());

                if (!empty($article->content)) {
                    // Disable HTML 5 related errors
                    libxml_use_internal_errors(true);

                    $doc = new DOMDocument();
                    $doc->loadHTML($article->content);
                    $imageTags = $doc->getElementsByTagName('img');

                    foreach ($imageTags as $tag) {
                        $src = $tag->getAttribute('src');
                        if (strpos($src, ".jpg") or strpos($src, ".png") or strpos($src, ".jpeg")) {
                            $article->image_url = $src;
                            break;
                        }
                    }
                }

                $article->save();
            }
        }
    }
}
