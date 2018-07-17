<byu-menu slot="nav" collapsed>
    @foreach($categories as $category)
            @if($category->children()->count() > 0)
                @include('layouts.front.category-sub', ['subs' => $category->children])
            @else
                <a @if(request()->segment(2) == $category->slug) class="active" @endif href="{{route('front.category.slug', $category->slug)}}">{{$category->name}} </a>
            @endif
    @endforeach
</byu-menu>