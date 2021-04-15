<div class="card" style="width: 18rem;">
  @if ($post->image)
  <img src="/storage/post_images/{{ $post->image }}" class="card-img-top" alt="">
  @endif
  <div class="card-body">
    <h5 class="card-title">
      <a href="{{ route('post', $post) }}">{{ $post->title }}</a>
    </h5>
    <p class="card-text">Κατηγορία: {{ $post->category->title }}</p>
    <p class="card-text">Συντάκτης: {{ $post->user->name }}</p>
    <p class="card-text">{{ $post->body }}</p>
  </div>
</div>