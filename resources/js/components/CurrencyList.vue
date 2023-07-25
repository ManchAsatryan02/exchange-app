<template>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table caption-top">
                <caption>List of currencies</caption>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Symbol</th>
                        <th scope="col">Name</th>
                        <th scope="col">Symbol Native</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name Plural</th>
                        <th scope="col">History</th>
                    </tr>
                </thead>
                <tbody id="listContent">
                    <tr v-for="(item, index) in currencies" :key="index">
                        <th scope="row">{{ item.id }}</th>
                        <td>{{ item.symbol }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.symbol_native }}</td>
                        <td>{{ item.code }}</td>
                        <td>{{ item.name_plural }}</td>
                        <td>
                            <router-link :to="'/currency/history/'+item.code+'/'+getYesterdayFormatted()" class="btn btn-success">View More</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'CurrencyList',
        created() {
            this.makeApiRequest();
        },
        data() {
            return {
                currencies: {},
            };
        },
        methods: {
            makeApiRequest() {
                this.$http.get('/get-currency-list')
                    .then(response => {
                        this.currencies = response.data;
                    })
                    .catch(error => {
                        console.error(error);
                    });
                },
                getYesterdayFormatted() {
                    const today = new Date();
                    const yesterday = new Date(today);
                    yesterday.setDate(today.getDate() - 1);

                    const year = yesterday.getFullYear();
                    const month = String(yesterday.getMonth() + 1).padStart(2, '0');
                    const day = String(yesterday.getDate()).padStart(2, '0');

                    const formattedDate = `${year}-${month}-${day}`;
                    return formattedDate;
                },
        },
    }
</script>