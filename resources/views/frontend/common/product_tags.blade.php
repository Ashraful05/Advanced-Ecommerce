@php
    $tags_english = \App\Models\Product::groupby('product_tag_english')->select('product_tag_english')->get();
    $tags_bangla = \App\Models\Product::groupby('product_tag_bangla')->select('product_tag_bangla')->get();
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="tag-list">
            @if(Session::get('language')=='english')
                @foreach($tags_english as $tag_english)
                <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag_english->product_tag_english) }}">{{ str_replace(',',' ',$tag_english->product_tag_english)  }}</a>
                @endforeach
            @else
                @foreach($tags_bangla as $tag_bangla)
                <a class="item active" title="Phone" href="{{ url('product/tag/'.$tag_bangla->product_tag_bangla) }}">{{ str_replace(',',' ',$tag_bangla->product_tag_bangla) }}</a>
                @endforeach
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
