<section class="principle__section">
    <header>
        <h1>القيم والمبادئ</h1>
    </header>
    <div class="row">

        @foreach($principles as $principle)
            <section class="col-12 section @if($loop->index  % 2 != 0) reverse @endif">
                <header class="section__title">
                    <h1>{{ $principle->title }}</h1>
                </header>
                <div class="section__desc">
                    <p>{{ $principle->desc }}</p>
                </div>
                <div class="section__img">
                    <img src="{{ asset('images/principle-1.png') }}">
                </div>
            </section>
        @endforeach

    </div>

    <x-share-section/>
</section>
