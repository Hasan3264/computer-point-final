<div class="header row" style="margin-bottom: 20px;">
    <button class="btn col-xl-3 col-lg-3 col-12 ght">
        <div class="hgj d-flex" style="justify-content: space-between;">
            <h5>Filture</h5> <i class="bi bi-distribute-vertical"></i>
        </div>
    </button>
</div>
<title>Filture With Brands</title>
<div class="jkg">
    <form>
        <select class="js-example-basic-single" name="state" id="brands" style="width: 100%">
            <option value="">Filture By Brands Name</option>
            @php
            $uniqueBrandNames = App\Models\Product::where('category_id', $subId)->pluck('brands')->unique();
            @endphp
              {{$uniqueBrandNames}}
            @foreach ($uniqueBrandNames as $brandId)
            @php
            $brand = App\Models\Brands::find($brandId);
            @endphp
            <option value="{{ $brand->id }}" @isset($_GET['brands']) @if ($brand->id == $_GET['brands'])
                selected
                @endif
                @endisset>{{ $brand->name }}</option>
            @endforeach

        </select>
        <div class="mt-4">
            <select class="example-basic-single" name="state" id="sort" style="width: 100%" style="background: none">
                <option value="">Sort By:</option>
                <option value="1" @isset($_GET['sort']) @if ( $_GET['sort'] == 1)
                    selected
                    @endif
                    @endisset>Low to High</option>
                <option value="2" @isset($_GET['sort']) @if ( $_GET['sort'] == 2)
                selected
                @endif
                @endisset>High to Low</option>

            </select>
        </div>
        <h2 class="ssssh2 mb-2">Filture With Price:-</h2>

        <div class="form_group">
            <label for="min">Min:</label>
            <input required class="border border-spacing-1 rounded-sm leading-8 px-1 w-full" type="number" name="min"
                id="min" value="{{ isset($_GET['min']) ? $_GET['min'] : '0' }}" min="0">
        </div>

        <div class="form_group mt-3">
            <label for="">Max: </label>
            <input required class="border border-spacing-1 rounded-sm leading-8 px-1 w-full" type="number" name="max"
                {{ old('max') }} id="max" value="{{ isset($_GET['max']) ? $_GET['max'] : '1000000' }}" max="1000000" >
        </div>
        <div class="form_group mt-3">
            <span id="search_minmax" class="btn btnsss btn-light">Submit</span>
        </div>

    </form>
</div>
