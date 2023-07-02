<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<p>Hi {{ $post->user->name }}. A new post has been created!
    <a href="{{ route('posts.show', ['post' => $post->id])  }}">View Post</a>
</p>

