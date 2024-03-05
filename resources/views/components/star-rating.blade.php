<style>
.dsdf li i{
  color: rgb(255, 170, 0);
}
</style>
<ul class="d-flex dsdf">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $avgStar)
            <li><a><i class="fas fa-star"></i></a></li>
        @elseif ($avgStar - $i + 1 >= 0.5)
            <li><a><i class="fas fa-star-half-alt"></i></a></li>
        @else
            <li><a><i class="far fa-star"></i></a></li>
        @endif
    @endfor
</ul>

