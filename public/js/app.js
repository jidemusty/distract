var app = new Vue({
    el: '#app',
    data: {
        items: []
    },
    methods: {
        load (service) {
            axios.get('/api/news/' + service)
                .then((response) => {
                    this.items = response.data
                })
        }
    },
    mounted () {
        this.load('hackernews')
    }
})