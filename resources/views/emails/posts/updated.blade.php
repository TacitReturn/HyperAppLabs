<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }
</style>

<p>
    Updates have recently been made to {{ $post->title }}. Check it out here.<br />
    <br />
    <a class="text-dark"
       href="{{ route("blog-post.show", $post->id) }}">
        View Post
    </a>
</p>

