var app = new Vue({
    el: '#app',
    data: {
        items: [],
        loading: false
    },
    methods: {
        load (service) {
            this.loading = true

            axios.get('/api/news/' + service)
                .then((response) => {
                    this.items = response.data
                    this.loading = false
                })
        }
    },
    mounted () {
        this.load('hackernews')
    }
})