<title>Logout - Skyrim Hotel</title>
<x-customerLayout>
    <section id="login-section"class="m-nav">
        <div class="container h-ok">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center load-hidden fade-in fade-bottom">
                <form class="bg-white p-5 rounded-5 border shadow-sm col-md-8 col-lg-6 col-xl-4">
                    {{--                    heading--}}
                    <div class="mb-5">
                        <img src="{{asset('images/logo.png')}}" alt="logo" class="img-fluid">
                    </div>
                    {{--                    success icon--}}
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="bi bi-check-circle-fill text-success display-1"></i>
                    </div>
                    {{--                    heading--}}
                    <div class="d-flex flex-column justify-content-center align-items-center mb-5">
                        <div>
                            <h5 class="fw-bold">You have been logged out</h5>
                        </div>
                        <div>
                            <h6>Thank you!</h6>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div class="d-flex align-items-center justify-content-between">
                        <a data-mdb-ripple-init type="button"
                           class="btn btn-tertiary rounded-9 tran-2"
                           href="{{route('customer.home')}}">
                            Home
                        </a>
                        <a data-mdb-ripple-init type="button"
                           class="btn btn-primary rounded-9 tran-2"
                           href="{{route('customer.login')}}">
                            Sign in
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-customerLayout>
