<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All Category</span>
    </div>
    @php
        $categories=App\Category::where('category_status',1)->latest()->get();
    @endphp
    <ul>
        @foreach($categories as $cat)
            <li><a href="{{route('categoryByProduct',$cat->id)}}">{{$cat->category_name}}</a></li>
        @endforeach
    </ul>
</div>
