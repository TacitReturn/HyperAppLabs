<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }
</style>

<p>
    Hi {{ $post->user->name }}. Just droping by to let you know that a new post has been created!<br />
    <strong>{{ $post->title }}</strong>
    <br />
    <a class="text-dark"
       href="{{ route("blog-post.show", $post->id) }}">
        View Post
    </a>
</p>

