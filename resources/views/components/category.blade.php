<!-- =========================================================================
                          quick sell part  start
==================================================================================== -->
<section id="quicksell">
    <div class="container">
        <div class="sells d-flex flex-wrap">
            @foreach (App\Models\categoryadd::all() as $category )
            <div class="items d-flex flex-wrap">
                <div class="text-part">
                    <h5><a style="cursor: pointer" onclick="findByCat.call(this)" data-item-id="{{$category->id}}" class="text-black">{{$category->category_name}}</a></h5>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- =========================================================================
                          quick sell part end
==================================================================================== -->
