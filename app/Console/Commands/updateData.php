<?php

namespace App\Console\Commands;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Tags;
use App\Media;

class updateData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:Update {time}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update instagram untuk masuk keadalam local database';

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

        $this->info('Checking for new sparkle...');
        $client = new Client();
        $tags= Tags::where('update_internal',$this->argument('time'))->get();
        
        foreach ($tags as $tag){
                $counts=0;
                $this->info('Checking for more rainbow unicorn... at Wonder cave of '.$tag->tag);
                $next_cursor = "";
            do{

                $res = $client->get('https://www.instagram.com/explore/tags/'.$tag->tag.'/?__a=1' . (!empty($next_cursor) ? '&max_id='. $next_cursor : ''));
                $obj=json_decode($res->getBody());

                foreach ($obj->tag->media->nodes as $a)
                {
                        $usernames = $client->get('https://www.instagram.com/p/'.$a->code.'/?__a=1');
                $objUsr=json_decode($usernames->getBody());


                    $med = Media::where('ig_id',$a->id)->where('tag_id',$tag->id)->first();
                    $this->info('swimming at lake of crystal...');
                    if(empty($med))
                    {
                        $med= new Media;
                        $this->info('throw old crystal, change with new more shiny crystal');
                    }
                    $this->info('clenaing new found crystal');
                    $med->ig_id=$a->id; 
                    
                    $med->owner_id=$a->owner->id; 
                    $med->thumbnail_src=$a->thumbnail_src;
                    $med->is_video=$a->is_video;
                    $med->code=$a->code;
                    $med->username = $objUsr->graphql->shortcode_media->owner->username;
                    if($objUsr->graphql->shortcode_media->location)
                    {
                    $med->location = $objUsr->graphql->shortcode_media->location->name;      
                    }
                    $this->info("med:".json_encode($med));
                    $med->date=Carbon::createFromTimestamp($a->date);

                    echo !empty($a->caption) ? $med->caption=$a->caption : ""; 
                    
                    $med->likes=$a->likes->count; 

                    $med->tag_id=$tag->id;

                    $med->display_src=$a->display_src;
                   
                     $this->info('Crafting crystal sword...');
                    $med->save();
                   
                    $this->info('adding more cystal element to inventory');

                    $counts++;
                }
                $next_cursor = "";
                if($obj->tag->media->page_info->has_next_page) {
                    $next_cursor = $obj->tag->media->page_info->end_cursor;
                    $this->info('Hold on! still searching, we already found '.$counts.' nyan-cats...');
                }
            }
            while(!empty($next_cursor));
            $this->info('Adventure is finish, we found:'.$counts." Awsomeness at ".$tag->tag." Planet");
            $tag->last_upd=Carbon::now();
            $tag->save();
            $this->info('Marked '.$tag->tag." Mountain with Our Awesome Flag!");
        }
        // echo $res->getStatusCode(); // 200
        // echo $res->getBody();
        
        
         
    }
}
