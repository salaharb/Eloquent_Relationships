<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // ONE_TO_ONE
    //----------------------------------------------------
    // $profile = User::find(1)->profile;
    // $user = Profile::find(1)->user;
    // echo $user; // find user from Profile Model
    // echo $profile; // find Profile from User Model
    //----------------------------------------------------
    // ONT_TO_MANY
    //----------------------------------------------------
    // $user = User::find(1); // Assuming user with ID 1
    // $posts = $user->posts;

    // foreach ($posts as $post) {
    //     echo $post->title;
    //     echo $post->content;
    //     // Perform other operations with each post
    // }
    //----------------------------------------------------    
    // ONE_OF_MANY
    //----------------------------------------------------
    // $product = Product::find(1);
    // $latestOrder = $product->latestOrder;
    // if ($latestOrder) {
    //     echo "Latest Order Number: " . $latestOrder->order_number;
    // } else {
    //     echo "No orders found.";
    // }
    //----------------------------------------------------    
    // MANY_TO_MANY
    //----------------------------------------------------
    // $user = User::find(1);

    // foreach ($user->roles as $role) {
    //     echo "Role Name: " . $role->name;
    //     // Perform any other actions or access other properties of the role
    // }


    // $user = User::find(1);

    // foreach ($user->roles as $role) {
    //     echo $role->pivot->role_id;
    // }
    // $user = User::find(1);
    // $rolesIds = [1, 2, 3];
    // $user->roles()->attach($rolesIds);
    // sync() method remove prev data and add new giving data
    // syncWithoutDetach() keep prev data if exist and add new giving data 
    // detach() remove giving data if exist in databese
    // return "attached";
    // return $user->load("roles"); // fetch user with it's role 
    //------------------------------------------------------------
    // Morph one to one 
    //-------------------------------------------------------------
    // $user = User::find(1);
    // $userImage = $user->media;
    // return $userImage;
    // $product = Product::find(1);
    // $productImage = $product->media;
    // return $productImage;
    // $article = Article::find(1);
    // $articleImage = $article->media;
    // return $articleImage;
    //------------------------------------------------------------
    // Morph one of many 
    //-------------------------------------------------------------
    // $user = User::find(1); // Retrieve the user with ID 1
    // $latestImage = $user->latestImage;
    // return $latestImage;
    //------------------------------------------------------------
    // Morph one to many 
    //-------------------------------------------------------------
    // Create a post and associate comments with it
    // $post = Post::create([
    //     'title' => 'My First Post',
    //     'content' => 'This is my first post content.',
    // ]);

    // $comment1 = Comment::create([
    //     'commentable_id' => $post->id,
    //     'commentable_type' => 'App\Models\Post',
    //     'content' => 'Great post!',
    // ]);

    // $comment2 = Comment::create([
    //     'commentable_id' => $post->id,
    //     'commentable_type' => 'App\Models\Post',
    //     'content' => 'I found it very informative.',
    // ]);

    // $post->comments()->saveMany([$comment1, $comment2]);

    // // Create a video and associate comments with it
    // $video = Video::create([
    //     'title' => 'My First Video',
    //     'size' => 'https://example.com/video1',
    // ]);

    // $comment3 = Comment::create([
    //     'commentable_id' => $video->id,
    //     'commentable_type' => 'App\Models\Video',
    //     'content' => 'Nice video!',
    // ]);

    // $comment4 = Comment::create([
    //     'commentable_id' => $video->id,
    //     'commentable_type' => 'App\Models\Video',
    //     'content' => 'I enjoyed watching it.',
    // ]);

    // $video->comments()->saveMany([$comment3, $comment4]);
    // return "Morph one to many relationship work ";



    //------------------------------------------------------------
    // Morph many to many 
    //-------------------------------------------------------------
    // $post = Post::find(1);
    // $tag = Tag::create(['name' => 'Laravel']);
    // $post->tags()->attach($tag);
    // Create a user 
    $user = User::create(['name' => 'John Doe' , "email" => "John1@doe.com" , "password" => "12345678"]);

    // Create a post
    $post = Post::create(['title' => 'My First Post', 'content' => 'Hello, world!']);

    // Create tags
    $tag1 = Tag::create(['name' => 'Technology']);
    $tag2 = Tag::create(['name' => 'Programming']);

    // Associate the user with the post
    $user->posts()->save($post);

    // Associate tags with the post
    $post->tags()->attach([$tag1->id, $tag2->id]);


    return "morph many to many attached";
});

Route::get('/morphMTM', function () {
    // $video = Video::find(1);
    // $comments = $video->comments;
    // return $comments;
    //To retrieve the tags associated with a post:
    $post = Post::find(1);
    $tags = $post->tags;
    return $tags;
    //To access the posts associated with a tag:
    // $tag = Tag::find(1);
    // $posts = $tag->posts;
});

Route::get('/morphOTM', function () {
    // $post = Post::find(2);
    // $comments = $post->comments;
    // foreach ($comments as $comment) {
    //     echo $comment->content."<br/>";
    // }

    $video = Video::find(1);
    $comments = $video->comments;
    foreach ($comments as $comment) {
        echo $comment->content . "<br/>";
    }
});

Route::get("/morphOTO", function () {
    $user = User::find(1);
    $user->media()->create([
        'filename' => 'imageUser.jpg',
        'path' => '/path/to/image.jpg',
    ]);

    // $product = Product::find(1);
    // $product->media()->create([
    //     'filename' => 'imageProduct.jpg',
    //     'path' => '/path/to/image.jpg',
    // ]);

    // $article = Article::find(1);
    // $article->media()->create([
    //     'filename' => 'imageArticle.jpg',
    //     'path' => '/path/to/image.jpg',
    // ]);

    return 'one to one morph relation created ';
});

Route::get("/one-to-many", function () {
    $user = User::create([
        'name' => 'mohamed',
        'email' => 'mohamed@example.com',
        'password' => bcrypt('password123'),
    ]);
    $postsData = [
        [
            'title' => 'Post 1',
            'content' => 'Lorem ipsum dolor sit amet.',
        ],
        [
            'title' => 'Post 2',
            'content' => 'Consectetur adipiscing elit.',
        ],
    ];

    foreach ($postsData as $postData) {
        $post = new Post($postData);
        $user->posts()->save($post);
    }
});

Route::get('/one-to-one', function () {
    $user = User::create([
        'name' => 'salah arbani',
        'email' => 'arbani22@example.com',
        'password' => bcrypt('password123'),
    ]);
    $user->profile()->create([
        "user_id" => $user->id,
        "bio" => "infoo"
    ]);
});

Route::get('/user/profile', [ProfileController::class, 'show']);

// Route::get('/test', function () {
//     return view("posts.posts");
// });
Route::get('/create-user', [UserController::class, 'createUserWithProfile']);
Route::get('/many-many', [UserController::class, 'ManyToMany']);
Route::get('/many-many-index', [UserController::class, 'ManyToManyIndex']);
