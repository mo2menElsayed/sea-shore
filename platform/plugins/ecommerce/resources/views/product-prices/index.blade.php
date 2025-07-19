@extends($layout ?? BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    @if (0)
        <x-core::alert type="warning">
            {!! BaseHelper::clean(trans('plugins/ecommerce::product-prices.warning_prices')) !!}
        </x-core::alert>
    @endif

    @include('core/table::base-table')
@endsection
