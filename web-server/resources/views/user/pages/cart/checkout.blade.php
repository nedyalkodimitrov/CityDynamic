<head>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<div id="checkout">
    <!-- Checkout will insert the payment form here -->
</div>
<script>
    // Initialize Stripe.js
    const stripe = Stripe("{{config('stripe.stripe.key')}}");

    initialize();

    async function initialize() {
        const fetchClientSecret = async () => {
            const response = await fetch("{{route('stripe')}}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{csrf_token()}}"
                },
            });
            const { clientSecret } = await response.json();
            return clientSecret;
        };

        const checkout = await stripe.initEmbeddedCheckout({
            fetchClientSecret,
        });

        checkout.mount('#checkout');
    }
</script>
</body>
