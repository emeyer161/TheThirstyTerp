<?php namespace App\Repositories;

use App\Post;
use App\Tag;

use Illuminate\Support\Str;

class PostsRepository extends Repository
{
	// public function __construct()
	// {
 //        // $this->model = Post::class;
	// 	// $this->model = 'App\Post';
	// }

    public static function model()
    {
        return Post::class;
    }

	public function create(array $data)
	{
        $post           = Post::create( $data );
        $post->slug     = Str::slug($post->title);
        $post->user_id  = \Auth::user()['id'];
        $post->save();
        
        if(isset($data['tags'])){
            !is_array($data['tags'])
                ? $data['tags'] = explode(',', str_replace(" ", "", $data['tags']))
                : null;

            $tag_ids = array();
            foreach($data['tags'] as $key=>$tagname){
                $tag_ids[$key] = Tag::firstOrCreate( ['name'=>$tagname] )['id'];
            }
    		$post->tags()->attach( $tag_ids ); 
        }

		return $this->getBySlug($post->slug); // Publish event 'post_created': Redis will tell NodeJS, who will tell the users
	}

	public function update(array $data, $slug)
    {
    	$tag_ids = array();
        if(isset($data['tags'])){
            !is_array($data['tags'])
                ? $data['tags'] = explode(',', str_replace(" ", "", $data['tags']))
                : null;
            
    		foreach($data['tags'] as $key=>$tagname){
    		    $tag_ids[$key] = Tag::firstOrCreate( ['name'=>$tagname] )['id'];
    		}
        }

		$post = Post::where('slug',$slug)->first();
		$post->fill( array(
            'title'     => $data['title'], 
            'body'      => $data['body'],
            'video_id'  => $data['video_id']
        ))->save();
		$post->tags()->detach();
		$post->tags()->attach( $tag_ids );

        return $this->getBySlug($post->slug); // Publish event 'post_updated': Redis will tell NodeJS, who will tell the users
    }

	public function getAll($sort = "desc")
	{
		$posts = $this->_postsRelationships()
	            ->orderBy('id', $sort)
	            ->paginate(20); 

	    return $posts;
	}

    public function getAllWithTag($id, $sort = "desc")
    {
        $taggedPosts = Tag::find($id)->posts->lists('id')->toArray();

        $posts = $this->_postsRelationships()
                ->whereIn('id', $taggedPosts)
                ->orderBy('id', $sort)
                ->paginate(20);  

        return $posts;
    }

    public function getAllByUser($id, $sort = "desc")
    {
        return $this->_postsRelationships()
        		->where('user_id', $id)
        		->orderBy('id', $sort)
        		->paginate(20);
    } 

	public function getBySlug(string $slug)
	{
		$post = $this->_postsRelationships()
			->where('slug',$slug)->first();

		return $this->_cleanTags($post);
	}

    function _postsRelationships()
    {
        return Post::with([
                'user'=>function($query){
                    $query->select('id','user_name');
                },
                'tags'=>function($query){
                    $query->select('name');
                },
                'comments'=>function($query){
                    $query->with(['user'=>function($q){
                        $q->select('id','user_name');
                    }]);
                }]);
    }

    function _cleanTags($post){
        $tags = $post->tags->toArray();
        if(!empty($tags)){
            $tempTags       = call_user_func_array('array_merge_recursive', $tags)['name'];
            $post->tagsClean = is_array($tempTags) ? $tempTags : [$tempTags];
        } else {
            $post->tagsClean = [];
        }
        return $post;
    }
}