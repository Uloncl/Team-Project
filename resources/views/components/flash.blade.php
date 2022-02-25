@if (session()->has('success'))
    <div x-data="{ show: true}"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="alert alert-primary fixed-bottom border border-primary rounded position-absolute bottom-0 end-0 w-25 ms-3">
        <p>{{ session('success') }}</p>
    </div>
@endif