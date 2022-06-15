<div class="card">

    <div class="d-flex justify-content-between align-items-center pe-3">

        {{-- Table Title --}}
        {{ $title }}

    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">

            {{-- Table Header --}}
            <thead>{{ $thead }}</thead>

            {{-- Table Body --}}
            <tbody class="table-border-bottom-0">{{ $tbody }}</tbody>

        </table>
    </div>
</div>
