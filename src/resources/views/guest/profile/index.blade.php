<title>My profile - Skyrim Hotel</title>
<x-guestLayout>
    <section id="profile-section" class="m-nav">
        <div class="container position-relative">
            {{--alert create account--}}
            @if (session('success'))
                @include('partials.flashMsgSuccess')
            @endif
            <div class="row py-5 justify-content-center">
                {{--                MENU--}}
                <div class="col-10 col-lg-3 p-4 border rounded-5 shadow-sm">
                    @include('partials.guestProfile')
                </div>
                {{--                MENU--}}

                {{--                CONTENT--}}
                <div class="col-10 col-lg-9 pt-4 ps-4 ms-0 ms-lg-auto">
                    <div>
                        <h4 class="text-primary fw-bold">Profile</h4>
                    </div>
                </div>
                {{--                CONTENT--}}
            </div>
        </div>
    </section>
</x-guestLayout>
