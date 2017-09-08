<h3>Eine neue Nachricht ist eingegangen</h3>

<strong>{{ $post->author->name }} schreibt:</strong>

<h4>{{ $post->title }}</h4>

<div>{!! nl2br($post->content) !!}</div>

<p>
    -- <br/>
    <small>Diese E-Mail wurde automatisch generiert.</small>
</p>