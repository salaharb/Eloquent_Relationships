@php
    $user = \App\Models\User::find(10);
    $posts = $user->posts;
@endphp
<h1> User : {{$user->name}} </h1>
@foreach ($posts as $post)
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
@endforeach
