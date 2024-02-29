<title>Login - Skyrim Hotel</title>
<x-customerLayout>
    <section id="login-section" class="m-nav">
        <div class="container h-ok">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center load-hidden fade-in fade-bottom">
                <form class="bg-white p-5 rounded-5 border shadow-sm col-md-8 col-lg-6 col-xl-4">
                    {{--                    heading--}}
                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <h6 class="display-6 text-primary fw-bold">Login</h6>
                    </div>
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="email" class="form-control"/>
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="pwd" class="form-control"/>
                        <label class="form-label" for="pwd">Password</label>
                    </div>

                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4 justify-content-between">
                        <div class="col d-flex justify-content-start">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember" checked/>
                                <label class="form-check-label" for="remember"> Remember me </label>
                            </div>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <!-- Simple link -->
                            <a href="#!">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="button"
                            class="btn btn-primary btn-block mb-4 rounded-9 tran-2">
                        Sign in
                    </button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="{{route('customer.signup')}}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-customerLayout>
