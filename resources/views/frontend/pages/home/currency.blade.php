<!-- Start Currency Section  -->
<section class="currency" style="background-image: url({{ asset('images/header-bg.png') }});">
    <div class="currency_content row">

        @foreach($rates->take(3) as $rate)
            <article class="box col-lg-3 col-md-3 col-sm-5  col-12">
                <div class="box__item title">
                    <span>@if(isset($rate->name)) {{ $rate->name }} @endif</span>
                    <span></span>
                </div>
                <div class="box__item sale">
                    <span>بيع</span>
                    <span>@if(isset($rate->sale)) {{ $rate->sale }} @endif</span>
                </div>
                <div class="box__item buy">
                    <span>شراء</span>
                    <span>@if(isset($rate->buy)) {{ $rate->buy }} @endif</span>
                </div>
            </article>
        @endforeach

        <button class="btn btn-outline-primary col-lg-2 col-md-2 col-sm-5  col-12">تحويل العملات</button>
    </div>

</section>
<!-- End Landing Section -->
