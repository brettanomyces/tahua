<template>
    <div class="container">
        <table v-if="transactions && transactions.length" class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Tags</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="transaction in transactions">
                    <td>{{transaction.date}}</td>
                    <td>{{transaction.description}}</td>
                    <td>{{transaction.amount}}</td>
                    <td>{{transaction.tags}}</td>
                </tr>
            </tbody>
        </table>

        <ul v-if="errors && errors.length">
            <li v-for="error in errors">
                {{error.message}}
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data: () => ({
            transactions: [],
            errors: []
        }),

        created() {
            axios.get(`http://tahua.app/api/transactions`)
                .then(response => {
                    this.transactions = response.data
                })
                .catch(e => {
                    this.errors.push(e)
                })
        }
    }
</script>
