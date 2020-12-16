<div id="notfound">
    <div class="notfound">
        <img 
            src="{{ uploads_url($error_image) }}"
            
            alt="">
        <div class="notfound-404">            
            <h1>{{ $title }}</h1>
        </div>
        
        <p>{!! $content_text !!}</p>
        <a class="btn btn-lg" 
            style="background-color: {{ $button_color }}; color: {{ $button_text_color }};" 
            href="{{ $button_url }}">
            {{ $button_text }}
        </a>
    </div>
</div>
