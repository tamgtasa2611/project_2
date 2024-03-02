<x-adminLayout>
    <div class="p-3">
        <div class="position-relative">
            {{--alert create account--}}
            @if (session('success'))
                @include('partials.flashMsgSuccess')
            @endif

            ABC
        </div>
    </div>
</x-adminLayout>
