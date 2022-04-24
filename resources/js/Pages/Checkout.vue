<template>
    <div>
        <stripe-checkout
            ref="checkoutRef"
            mode="payment"
            :pk="publishableKey"
            :line-items="lineItems"
            :success-url="successURL"
            :cancel-url="cancelURL"
            @loading="(v) => (loading = v)"
        />
        <button
            class="bg-blue-500 text-white px-5 py-2 rounded"
            @click="submit"
        >
            Pay now!
        </button>
    </div>
</template>

<script>
import { StripeCheckout } from "@vue-stripe/vue-stripe";
export default {
    components: {
        StripeCheckout,
    },
    data() {
        this.publishableKey = process.env.STRIPE_PUBLISHABLE_KEY;
        return {
            loading: false,
            lineItems: [
                {
                    price: "some-price-id", // The id of the one-time price you created in your Stripe dashboard
                    quantity: 1,
                },
            ],
            successURL: "your-success-url",
            cancelURL: "your-cancel-url",
        };
    },
    mounted() {
        this.getSession();
    },
    methods: {
        getSession() {},
        submit() {
            // You will be redirected to Stripe's secure checkout page
            this.$refs.checkoutRef.redirectToCheckout();
        },
    },
};
</script>
