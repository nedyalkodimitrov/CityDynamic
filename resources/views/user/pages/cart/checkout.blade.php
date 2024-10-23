<head>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<div id="checkout">
    <!-- Checkout will insert the payment form here -->
</div>
<script>
    // Initialize Stripe.js
    const stripe = Stripe({{config('services.stripe.key')}});

    initialize();

    async function initialize() {
        const fetchClientSecret = async () => {
            const response = await fetch("{{route('stripe')}}", {
                method: "POST",
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
