<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<p>Hi {{ $post->user->name }}. A new post has been created!<br />
    {{ $post->title }}<br />
    <a class="text-dark"
       href="{{ route("blog-post.show", $post->id) }}">
        View Post
    </a>
</p>

