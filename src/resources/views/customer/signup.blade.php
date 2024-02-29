<title>Sign up - Skyrim Hotel</title>
<x-customerLayout>
    <section id="signup-section" class="m-nav">
        <div class="container h-ok">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center load-hidden fade-in fade-bottom">
                <form class="bg-white p-5 rounded-5 border shadow-sm col-md-8 col-lg-6 col-xl-4">
                    {{--                    heading--}}
                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <h6 class="display-6 text-primary fw-bold">Register</h6>
                    </div>
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="first_name" class="form-control"/>
                                <label class="form-label" for="first_name">First name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="last_name" class="form-control"/>
                                <label class="form-label" for="last_name">Last name</label>
                            </div>
                        </div>
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

                    <!-- Number input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="number" id="phone" class="form-control"/>
                        <label class="form-label" for="phone">Phone number</label>
                    </div>

                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="button"
                            class="btn btn-primary btn-block mb-4 rounded-9 tran-2">
                        Sign up
                    </button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Already a member? <a href="{{route('customer.login')}}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-customerLayout>

