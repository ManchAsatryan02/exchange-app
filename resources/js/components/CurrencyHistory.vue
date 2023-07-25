<template>
    <div class="container my-3">
        <div class="row justify-content-center">
            <h2>History of {{ this.$route.params.slug }} in {{ this.$route.params.slug_date }}</h2>
            <hr>            
            <div class="col-md-4">
                <form>
                    <label class="my-1 mr-2" for="selectDate">Date</label>
                    <select @change="setDate" class="form-control my-1 mr-sm-2" id="selectDate">
                        <option v-for="date in dateOptions" :key="date" :value="date" :selected="date == this.$route.params.slug_date">{{ date }}</option>
                    </select>

                    <label class="my-1 mr-2" for="selectBaseCode">Base Currency (Code)</label>
                    <select @change="setBaseCode" class="form-control my-1 mr-sm-2" id="selectBaseCode">
                        <option v-for="(item, index) in items.data" :key="index" :value="item.code" :selected="item.code == this.$route.params.slug">{{ item.code }}</option>
                    </select>

                    <button @click="getHistory" type="button" class="btn btn-sm btn-success my-1">See Result</button>
                </form>
            </div>
            <div class="col-md-4 offset-md-4">
                <table class="table caption-top">
                    <thead>
                        <tr>
                            <th scope="col">Code</th>
                            <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody id="listContent">
                        <tr v-for="(item, index) in items.data" :key="index">
                            <td><router-link class="btn btn-sm btn-success" :to="'/currency/history/' + item.code + '/' + this.$route.params.slug_date">1 {{ item.code }} =</router-link></td>
                            <td>{{ item.value+' '+this.$route.params.slug  }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'CurrencyHistory',
        created() {
            this.generateDateOptions();
            this.makeApiRequest();
        },
        data() {
            return {
                items: {},
                selectedDate: '', 
                dateOptions: [],
            };
        },
        methods: {
            makeApiRequest() {
                this.$http
                    .get('/get-currency-histyory/'+this.$route.params.slug+'/'+this.$route.params.slug_date)                       
                        .then(response => {
                            this.items = response.data;
                        })
                        .catch(error => {
                            console.error(error);
                        });
            },

            getHistory() {
                this.$route.params.slug_date = document.getElementById('selectDate').value;
                this.$route.params.slug = document.getElementById('selectBaseCode').value;
                const newURL = '/currency/history/'+document.getElementById('selectBaseCode').value+'/'+document.getElementById('selectDate').value;
                window.history.pushState({}, '', newURL);
                this.makeApiRequest();
            },

            generateDateOptions() {
                const today = new Date();
                const dateOptions = [];

                for (let i = 1; i < 30; i++) {
                    const date = new Date(today); 
                    date.setDate(date.getDate() - i);
                    const formattedDate = this.formatDate(date);
                    dateOptions.push(formattedDate); 
                }

              this.dateOptions = dateOptions; 
                this.selectedDate = dateOptions[0];
            },
            
            formatDate(date) {
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                return `${year}-${month}-${day}`;
            },
            
        }
    }
</script>