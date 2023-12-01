@if (isset($checkbox))
    <input type="checkbox" class="form-check-input check-box-custom checkboxsize" id="bookingCheckbox "
        name="{{ $checkbox }}" />
@endif

@if (isset($edit))
    <a href="{{ $edit }}" class="btn btn-primary btn-sm mr-2">
        <i class="fas fa-pencil-alt icon-md"></i> Edit
    </a>
@endif

@if (isset($delete))
    <button class="btn btn-danger btn-sm mr-2" onclick="onRemoveRecord({{$delete}})">
        <i class="fas fa-pencil-alt icon-md"></i> Remove
    </button>
@endif

{{-- @if (isset($modelBnt))
    <a href="javascript:void(0)"
        class="btn btn-primary btn-sm detailPopupModal"
        onclick="detailPopupOpen('{{$modelBnt['row']->id}}')"
        title="More Info"
        id="modal_{{$modelBnt->id}}"
        data-id="{{$modelBnt->id}}"
        data-order-status="{{$modelBnt->status}}"
        data-note="{{$modelBnt->note}}"
        data-email="{{$modelBnt->user->email}}"
        data-room="{{$modelBnt->room->name}}"
        data-first-name="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->first_name) ? $modelBnt->bookingDetail->first()->first_name : null)}}"
        data-last-name="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->last_name) ? $modelBnt->bookingDetail->first()->last_name : null)}}"
        data-contact="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->contact_no) ? $modelBnt->bookingDetail->first()->contact_no : null) }}"
        data-age="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->age) ? $modelBnt->bookingDetail->first()->age : null) }}"
        data-address="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->address) ? $modelBnt->bookingDetail->first()->address : null) }}"
        data-country="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->country_id) ? $modelBnt->bookingDetail->first()->country_id : null) }}"
        data-state="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->state_id) ? $modelBnt->bookingDetail->first()->state_id : null) }}        "
        data-city="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->city) ? $modelBnt->bookingDetail->first()->city : null) }}"
        data-zipcode="{{($modelBnt->bookingDetail->first() && isset($modelBnt->bookingDetail->first()->zipcode) ? $modelBnt->bookingDetail->first()->zipcode : null) }}"
        data-note="{{($modelBnt->note)}}"
        data-payment-brand="{{($modelBnt->payment && isset($modelBnt->payment->brand) ? $modelBnt->payment->brand : null) }}"
        data-payment-card="{{($modelBnt->payment && isset($modelBnt->payment->card_number) ? $modelBnt->payment->card_number : null) }}"
        data-payment-expiry-month="{{($modelBnt->payment && isset($modelBnt->payment->expiry_month) ? $modelBnt->payment->expiry_month : null) }}"
        data-payment-expiry="{{($modelBnt->payment && isset($modelBnt->payment->expiry_year) ? $modelBnt->payment->expiry_year : null) }}">
            {{$modelBnt['text']}}
    </a>
@endif

@if (isset($contactUsModelBnt))
    <a href="javascript:void(0)"
        class="btn btn-primary btn-sm detailPopupModal"
        onclick="detailPopupOpen('{{$contactUsModelBnt->id}}')"
        title="More Info"
        id="modal_{{$contactUsModelBnt->id}}"
        data-id="{{$contactUsModelBnt->id}}"
        data-full_name="{{$contactUsModelBnt->full_name}}"
        data-email="{{$contactUsModelBnt->email}}"
        data-phone="{{$contactUsModelBnt->phone}}"
        data-start_date="{{$contactUsModelBnt->startDate}}"
        data-end_date="{{$contactUsModelBnt->endDate}}"
        data-number_of_guiest="{{$contactUsModelBnt->number_of_guiest}}"
        data-special_request="{{$contactUsModelBnt->special_request}}"
        data-message="{{$contactUsModelBnt->message}}"
        data-created_at="{{$contactUsModelBnt->created_at}}"
        data-updated_at="{{$contactUsModelBnt->updated_at}}">
            Details
    </a>
@endif

@if (isset($image))
    <a href="{{ $image }}" class="btn btn-success btn-sm mr-2" title="Image Upload">
        <i class="fas fa-file-image icon-md"></i> Image
    </a>
@endif --}}

{{-- @if (isset($view))
    <a href="{{ $view }}" class="btn btn-primary btn-sm mr-2">
        <i class="fa-regular fa-eye icon-md"></i> View
    </a>
@endif --}}
