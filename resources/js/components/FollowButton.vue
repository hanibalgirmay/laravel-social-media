<template>
    <div>
        <button
            @click="followUser"
            class="ml-3 btn btn-primary"
            v-text="buttonText"
        ></button>
    </div>
</template>

<script>
export default {
    props: ["userid", "follows"],
    data() {
        return {
            status: this.follows
        };
    },
    methods: {
        followUser(e) {
            e.preventDefault();

            axios
                .post("/follow/" + this.userid)
                .then(res => {
                    console.log(res.data);
                    this.status = !this.status;
                })
                .catch(err => {
                    console.error(err);
                    if (err.response.status === 401) {
                        window.location = "/login";
                    }
                });
            console.log(e);
        }
    },
    computed: {
        buttonText() {
            return this.status ? "Unfollow" : "Follow";
        }
    },

    mounted() {
        console.log("Component mounted.");
        // console.log(this.user);
    }
};
</script>
