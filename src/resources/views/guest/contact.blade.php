<title>Contact - Skyrim Hotel</title>
<x-guestLayout>
    <section id="login-section" class="m-nav">
        <div class="container mh-screen">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center hero-section">
                <form class="bg-white p-5 rounded border shadow col-12 col-md-8 col-lg-6 col-xl-4
                load-hidden fade-in">
                    {{--                    heading--}}
                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <h6 class="display-6 text-primary fw-bold">Contact Us</h6>
                    </div>

                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="name" class="form-control"/>
                        <label class="form-label" for="name">Name</label>
                    </div>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="email" class="form-control"/>
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- Message input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <textarea class="form-control" id="message" rows="4"></textarea>
                        <label class="form-label" for="message">Message</label>
                    </div>

                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="button"
                            class="btn btn-primary rounded btn-block mb-4">Send
                    </button>

                </form>
            </div>
        </div>
    </section>
</x-guestLayout>
